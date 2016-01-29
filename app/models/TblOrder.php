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
class TblOrder extends Eloquent implements UserInterface, RemindableInterface {

    use UserTrait,
        RemindableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tbl_order';
    protected $primaryKey = 'id_order';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    
    public function Table() {
        return $this->belongsTo('TableDistribution', 'table_id', 'id');
    } 
    
    public function TblOrderItem() {
        return $this->hasMany('TblOrderItem', 'id_order');
    }
    
}
