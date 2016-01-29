<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Clients
 *
 * @author NAseq
 */

use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class TableDistribution extends Eloquent{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'table_distribution';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    
    public function TblOrder() {
        return $this->hasMany('TblOrder', 'table_id');
    }
}
