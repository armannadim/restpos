<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ItemController
 *
 * @author NAseq
 */
class ItemController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        if (Auth::check()) {
            return View::make('user_management');
        }
        return View::make('login');
    }

    public function new_item() {
        if (Auth::check()) {
            $food_cat = FoodCategory::all()->lists('view', 'id');


            return View::make('item_new', array('food_cat' => $food_cat));
        }
        return View::make('login');
    }

    public function item_list() {
        if (Auth::check()) {
            $food_cat = FoodCategory::all()->lists('view', 'id');

            return View::make('items', array('food_cat' => $food_cat));
        }
        return View::make('login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        if (Auth::check()) {
            $this->layout->content = View::make('user_management');
            return $this->layout;
        }
        return View::make('login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        $data = Input::all();

        // validate the info, create rules for the inputs
        $rules = array(
            'name' => 'required', // make sure the email is an actual email
            'details' => 'required', // password can only be alphanumeric and has to be greater than 3 characters
            'regular_price' => 'required|numeric',
            'discounted_price' => 'required|numeric',
            'discount_percentage' => 'required|numeric',
        );

        // run the validation rules on the inputs from the form
        $validator = Validator::make($data, $rules);

        // if the validator fails, redirect back to the form
        if ($validator->fails()) {
            return Redirect::back()
                            ->withErrors($validator) // send back all errors to the login form
                            ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form            
        } else {

            $item = new Item();
            $item->name = $data['name'];
            $item->details = $data['details'];
            $item->regular_price = $data['regular_price'];
            $item->discounted_price = $data['discounted_price'];
            $item->discount_percentage = $data['discount_percentage'];
            $item->food_category_id = $data['food_category_id'];

            if (Input::file('image')->isValid()) {
                $destinationPath = public_path() . '\img\uploads\items'; // upload path
                $extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
                $fileName = 'cat_' . $item->food_category_id . '_' . $item->name . '.' . $extension; // renameing image
                Input::file('image')->move($destinationPath, $fileName); // uploading file to given path
            } else {
                return Redirect::back()->with('message', 'uploaded file is not valid !');
            }
            $item->image = '\img\uploads\items\\' . $fileName;
            $item->save();
            return Redirect::back()->with('message', 'New Item added succesfully !');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function getItem($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        $data = Request::all();
        $columns = Schema::getColumnListing('food_items');
        $modify_column_name = strtolower($data['column']);
        $value = $data['value'];
        if (in_array($modify_column_name, $columns)) {
            Item::where('id', '=', $id)->update(array($modify_column_name => $value));
            return $modify_column_name;
        }
        return $data;
    }

    public function updateCustom($id) {
        $data = Request::all();
        $columns = Schema::getColumnListing('customized_food_item');
        $modify_column_name = strtolower($data['column']);
        $value = $data['value'];
        if (in_array($modify_column_name, $columns)) {
            CustomItem::where('id', '=', $id)->update(array($modify_column_name => $value));
            return $modify_column_name;
        }
        return $data;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        //
    }

    public function listAll() {
        $items = Item::select(array(
                    'food_items.id',
                    'food_items.name',
                    'food_items.details',
                    'food_items.regular_price',
                    'food_items.discounted_price',
                    'food_items.discount_percentage',
                    'food_category.name as category',
                ))
                ->leftJoin('food_category', 'food_items.food_category_id', '=', 'food_category.id');

        return Datatables::of($items)
                        ->filter_column('id', 'where', 'food_items.id', '=', '$1')
                        ->add_column('edit', '<a href="{{ URL::route(\'item_edit\', array($id)) }}"><i class="icon-edit"></i></a>&nbsp;&nbsp;<a href="{{ URL::route(\'item_delete\', array($id)) }}"><i class="icon-trash"></i></a>')
                        ->make();
    }

    public function listAll_Custom() {
        $items = CustomItem::select(array(
                    'customized_food_item.id',
                    'customized_food_item.name',
                    'customized_food_item.details',
                    'customized_food_item.price',
                    'customized_food_item.discounted_price',
                    'customized_food_item.discount_percentage',
                    'customized_food_item.created_at',
                    'food_category.name',
                ))
                ->leftJoin('food_category', 'customized_food_item.food_category_id', '=', 'food_category.id');

        return Datatables::of($items)
                        ->filter_column('id', 'where', 'customized_food_item.id', '=', '$1')
                        ->add_column('edit', '<a href="{{ URL::route(\'item_edit\', array($id)) }}"><i class="icon-edit"></i></a>&nbsp;&nbsp;<a href="{{ URL::route(\'item_delete\', array($id)) }}"><i class="icon-trash"></i></a>')
                        ->make();
    }

    /**
     * Get Item list by food_category ID.
     *
     * @param  int  $id_category     
     * @return array result
     */
    public function getCustomItemByCategory($id_category) {
        $items = Item::select(array(
                            'customized_food_item.*',
                            'food_category.name',
                        ))
                        ->leftJoin('food_category', 'customized_food_item.food_category_id', '=', 'food_category.id')->get();

        return $items;
    }

    /**
     * Get Item list by food_item ID.
     *
     * @param  int  $id     
     * @return array result
     */
    public function getCustomItemById($id) {
        $items = Item::select(array(
                    'customized_food_item.*',
                    'food_category.name',
                ))
                ->leftJoin('food_category', 'customized_food_item.food_category_id', '=', 'food_category.id')
                ->where('customized_food_item.food_category_id', '=', $id)
                ->get();

        return $items;
    }

    /**
     * Get Item list by price range.
     *
     * @param  int  $start - Price range initial
     * @param  int  $end
     * @return array result
     */
    public function getItemByPriceRange($start, $end) {
        
    }

    public function OtherConfig() {
        
    }

    public function getAllItem() {
        //$results = DB::select('select food_items.*, food_category.name as category from food_items, food_category');
        $results = DB::table('food_items')->get();
        return $results;
        /* $items = Item::select(array(
          'food_items.*',
          'food_category.name as category',
          ))
          ->leftJoin('food_category', 'food_items.food_category_id', '=', 'food_category.id')
          ->get();

          return $items; */
    }

    /**
     * Get Item list by food_category ID.
     *
     * @param  int  $id_category     
     * @return array result
     */
    public function getItemByCategory($id_category) {
        $items = Item::select(array(
                            'food_items.*',
                            'food_category.name',
                        ))
                        ->leftJoin('food_category', 'food_items.food_category_id', '=', 'food_category.id')->get();

        return $items;
    }

    /**
     * Get Item list by food_item ID.
     *
     * @param  int  $id     
     * @return array result
     */
    public function getItemById($id) {
        $items = Item::find($id);
        return $items;
    }

}
