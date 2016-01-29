<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PosController
 *
 * @author NAseq
 */
class PosController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        if (Auth::check()) {
            $tables = $this->getTables();
            $items = App::make("ItemController")->getAllItem();
            $category = FoodCategory::all();
            $ordered_item = $this->getAllOrderedItem();
            return View::make('POS/pos', array('tables' => $tables, 'items' => $items, 'categories' => $category, 'ordered_item' => $ordered_item));
        }
        return View::make('login');
    }

    public function getTables() {
        $results = DB::select('select * from table_distribution');
        return $results;
    }

    public function addItemToOrder() {

        $order_id = DB::table('tbl_order')
                ->where('table_id', $_POST['table_id'])
                ->where('status', '1')
                ->pluck('id_order');

        /* foreach($tbl_order as $t){
          $order_id = $t->id;
          } */

        if ($order_id === "" || $order_id === null) {

            $order = new TblOrder();
            $order->table_id = $_POST['table_id'];
            $order->created_by = Auth::user()->id;
            $order->save();
            $order_id = $order->id;
            /* CREATE ORDER and get the newly inserted order ID */
        } else {
            /* RETURN msg */
        }
        /* GETTING ITEM DETAILS TO ADD IN THE ORDER */
        $item_details = Item::find($_POST['item_id']);
        $item_desc = $item_details->details;
        $discount_percentage = $item_details->discount_percentage;
        $food_category_id = $item_details->food_category_id;
        $image = $item_details->image;
        $name = $item_details->name;
        $regular_price = $item_details->regular_price;

        $order_line_check = DB::table('tbl_order_item')
                ->where('id_order', '=', $order_id)
                ->where('id_food_items', '=', $_POST['item_id'])
                ->where('status', '=', '0')
                ->first();
        if (is_null($order_line_check)) {
            /* ADDING TO THE ORDER LINES */
            $order_line = new TblOrderItem();
            $order_line->id_order = $order_id;
            $order_line->id_food_items = $_POST['item_id'];
            $order_line->unit_price = $regular_price;
            $order_line->quantity = 1;
            $order_line->discount = $discount_percentage;
            $order_line->total_price = $regular_price;
        } else {
            /* UPDATE ORDER ITEMS [IN CASE OF ADDING SAME ITEMS THAT EXISTS IN THE ORDER ] */
            $order_line = TblOrderItem::find($order_line_check->id);
            $order_line->quantity = $order_line_check->quantity + 1;
            $order_line->total_price = $order_line_check->total_price + $regular_price;
        }
        $order_line->save();



        //This query may be will not necesary
        //$tbl_order_items = TblOrderItem::whereRaw('id_food_items = ? AND id_order = ?', array($_POST['item_id'], $tbl_order))->count();
        /* Add items to the tbl_order_items table. No matter if this item allready in the list or not. The table will be generated but doing group by option. */

        return $item_details;
        //To check if the current table has any order running
        //select * from tbl_order where table_id = 1 AND status = 1
        //Check if the item selected is already in the same order
        //select * from tbl_order_item, tbl_order tor WHERE id_food_items = '1' AND tor.id_order = ''
    }

    /* Function removeItemFromOrder 
     * This function will be used to remove a item from the order
     * This functions recieves $_POST array from the POS view
     *  */

    public function removeItemFromOrder() {
        $order_id = DB::table('tbl_order')
                ->where('table_id', $_POST['table_id'])
                ->where('status', '1')
                ->pluck('id_order');

        $order_line_check = DB::table('tbl_order_item')
                ->where('id_order', '=', $order_id)
                ->where('id_food_items', '=', $_POST['item_id'])
                ->where('status', '=', '0')
                ->first();

        $order_line = TblOrderItem::find($order_line_check->id);
        $order_line->quantity = $order_line_check->quantity + 1;
        $order_line->total_price = $order_line_check->total_price + $regular_price;
    }

    public function getAllOrderedItem() {
        $items = TblOrderItem::select(array(
                    'tbl_order_item.*',
                    'food_items.name',
                    'tbl_order.table_id'
                ))
                ->leftJoin('food_items', 'tbl_order_item.id_food_items', '=', 'food_items.id')
                ->leftJoin('tbl_order', 'tbl_order_item.id_order', '=', 'tbl_order.id_order')
                ->get();

        return $items;
    }

    /* FINALIZE ORDER */

    public function saveOrder() {
        $order_id = $_POST['order_id'];
        $order = TblOrder::find($order_id);
        $order->total_price = $_POST['total'];
        $order->vat = $_POST['vat'];
        $order->global_discount = $_POST['discount'];
        $order->save();
    }

    public function saveAsPaidOrdered() {
        $order_id = $_POST['order_id'];
        $order = TblOrder::find($order_id);
        $order->status = '0';
        $order->save();
    }

    /* This will print invoice */

    public function printOrderClient() {
        $data = Request::all();

        $id_order = $data['order_id'];


        TblOrder::where('id_order', '=', $id_order)->update(array('total_price' => $data['subTotal'], 'vat' => $data['iva'], 'global_discount' => $data['discount']));
        $config = Configuration::All();
        foreach ($config as $value) {
            $$value['name'] = $value['value'];
            echo $$value['name'] . "<br>";
        }
        /* Variables */
        //restaurent_name
        //address
        //nif
        //default_lang
        //owner
        //email
        //web
        //phone
        //phone2
        $order = TblOrder::with("Table", "TblOrderItem")->find($id_order);
        $html = "<html><body><div style='width: 200px;font-size:10px;'>"
                . "<header style='text-align:center;'>"
                . "<span style='font-size:14px;font-weight:bold;'>$restaurent_name</span><br><span style='font-size:12px;'>$address</span></header><br>";
        $html .= "<div style='text-align:center;'><table style='margin:auto;font-size:10px;'><thead><tr><td>No</td><td>Items</td><td>Price/u</td><td>Quantity</td><td>Total</td></tr></thead>"
                . "<tbody>";
        $count = 1;
        $total_price = 0;
        foreach ($order->tbl_order_item as $value) {
            $item = Item::find($value['id_food_items']);
            $total_item_price = $value['unit_price'] * $value['quantity'];
            $html .= "<tr><td>" . $count . "</td><td>" . $item['name'] . "</td><td>" . $value['unit_price'] . "</td><td>" . $value['quantity'] . "</td><td>" . $total_item_price . "</td></tr>";

            $count ++;
            $total_price = $total_price + $total_item_price;
        }
        $html .= "<tr><td style='border-top:1pt dotted black;'></td><td style='border-top:1pt dotted black;'>sub total</td><td style='border-top:1pt dotted black;'></td><td style='border-top:1pt dotted black;'></td><td style='border-top:1pt dotted black;'>" . $total_price . "</td></tr>";
        if ($data['discount'] !== 0) {
            $html .= "<tr><td></td><td>Discount</td><td></td><td></td><td>" . $data['discount'] . "</td></tr>";
        }
        $iva = ($total_price - $data['discount']) * 0.21;
        $html .= "<tr><td></td><td>IVA(21%)</td><td></td><td></td><td>" . $iva . "</td></tr>";
        $html .= "<tr><td style='border-top:1pt solid black;'></td><td style='border-top:1pt solid black;'>Total</td><td style='border-top:1pt solid black;'></td><td style='border-top:1pt solid black;'></td><td style='border-top:1pt solid black;'>" . ($total_price + $iva) . "</td></tr>";

        $html = $html . "</tbody></table></div></div></body><html>";

        return PDF::load($html, '', 'portrait')->show();
        //return $html;
    }

    /* Copy for the chef */

    public function printOrderKitchen() {
        File::requireOnce('plugins/escpos/Escpos.php');


        /* $items = array(
          new item("Example item #1", "4.00"),
          new item("Another thing", "3.50"),
          new item("Something else", "1.00"),
          new item("A final item", "4.45"),
          );
          $subtotal = new item('Subtotal', '12.95');
          $tax = new item('A local tax', '1.30');
          $total = new item('Total', '14.25', true);
          /* Start the printer
          $logo = new EscposImage("images/escpos-php.png");
          $printer = new Escpos();
          /* Print top logo
          $printer->setJustification(Escpos::JUSTIFY_CENTER);
          $printer->graphics($logo);
          /* Name of shop
          $printer->selectPrintMode(Escpos::MODE_DOUBLE_WIDTH);
          $printer->text("ExampleMart Ltd.\n");
          $printer->selectPrintMode();
          $printer->text("Shop No. 42.\n");
          $printer->feed();
          /* Title of receipt
          $printer->setEmphasis(true);
          $printer->text("SALES INVOICE\n");
          $printer->setEmphasis(false);
          /* Items
          $printer->setJustification(Escpos::JUSTIFY_LEFT);
          $printer->setEmphasis(true);
          $printer->text(new item('', '$'));
          $printer->setEmphasis(false);
          foreach ($items as $item) {
          $printer->text($item);
          }
          $printer->setEmphasis(true);
          $printer->text($subtotal);
          $printer->setEmphasis(false);
          $printer->feed();
          /* Tax and total
          $printer->text($tax);
          $printer->selectPrintMode(Escpos::MODE_DOUBLE_WIDTH);
          $printer->text($total);
          $printer->selectPrintMode();
          /* Footer
          $printer->feed(2);
          $printer->setJustification(Escpos::JUSTIFY_CENTER);
          $printer->text("Thank you for shopping at ExampleMart\n");
          $printer->text("For trading hours, please visit example.com\n");
          $printer->feed(2);
          $printer->text(date('l jS \of F Y h:i:s A') . "\n");
          /* Cut the receipt and open the cash drawer
          $printer->cut();
          $printer->pulse(); */
    }

    /* END FINALIZE ORDER */

    public static function generateInvoice($order_id) {
        $order = TblOrder::with('TblOrderItem', 'Table')->find($order_id);
        $newInvoice = new Invoice();
        $newInvoice->client_id = $order_id;
        $newInvoice->order_id = $order_id;
        $newInvoice->total_price = "";
        $newInvoice->special_discount = "";
        $newInvoice->vat = "";
        $newInvoice->total_item = "";
        $newInvoice->issued_by = Auth::id();
        $newInvoice->paid_by = "";

        $newInvoice->save();
    }

}
