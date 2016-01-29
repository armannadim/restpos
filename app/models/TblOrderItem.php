<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

/**
 * Description of TblOrderItem
 *
 * @author NAseq
 */
class TblOrderItem extends Eloquent implements UserInterface, RemindableInterface {

    use UserTrait,
        RemindableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tbl_order_item';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    
    public function Order() {
        return $this->belongsTo('TblOrder', 'id_order', 'id');
    } 
    public function Food() {
        return $this->belongsTo('Item', 'id_food_items', 'id');
    } 
    
}
