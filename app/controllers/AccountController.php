<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AccountController
 *
 * @author NAseq
 */
class AccountController extends BaseController {

    public function index() {
        if (Auth::check()) {
            return View::make('statistics');
        }
        return View::make('login');
    }

    public function getInvoice() {
        if (Auth::check()) {
            return View::make('invoice');
        }
        return View::make('login');
    }

    public function listInvoice() {
        $invoice = Invoice::select(array(
                    'invoice.id',
                    'invoice.client_id',
                    'invoice.order_id',
                    'invoice.created_at',
                    'invoice.total_item',
                    'invoice.total_price',
                    'invoice.special_discount',
                    'invoice.discounted_price',
                    'invoice.paid_by',
                    'invoice.issued_by',
        ));

        return Datatables::of($invoice)
                        ->filter_column('id', 'where', 'invoice.id', '=', '$1')
                        ->add_column('edit', '<a href="{{ URL::route(\'item_edit\', array($id)) }}"><i class="icon-edit"></i></a>&nbsp;&nbsp;<a href="{{ URL::route(\'item_delete\', array($id)) }}"><i class="icon-trash"></i></a>')
                        ->make();
    }

    public function getSales() {
        if (Auth::check()) {
            return View::make('invoice_line');
        }
        return View::make('login');
    }

    public function listSales() {
        $items = InvoiceLine::select(array(
                    'invoice_line.id',
                    'invoice_line.id_category',
                    'invoice_line.id_item',
                    'invoice_line.id_invoice',
                    'invoice_line.regular_price',
                    'invoice_line.quantity',
                    'invoice_line.discount',
                    'invoice_line.final_price',
                    'invoice_line.created_at',
                    'food_category.name as category',
                    'food_items.name as item'
                ))
                ->leftJoin('food_category', 'invoice_line.id_category', '=', 'food_category.id')
                ->leftJoin('food_items', 'invoice_line.id_item', '=', 'food_Items.id');


        return Datatables::of($items)
                        ->add_column('edit', '<a href="{{ URL::route(\'item_edit\', array($id)) }}"><i class="icon-edit"></i></a>&nbsp;&nbsp;<a href="{{ URL::route(\'item_delete\', array($id)) }}"><i class="icon-trash"></i></a>')
                        ->make();
    }

    public function update($id) {
        
    }

}
