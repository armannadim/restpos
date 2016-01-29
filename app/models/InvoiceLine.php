<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Invoice Lines
 *
 * @author NAseq
 */
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class InvoiceLine extends Eloquent implements UserInterface, RemindableInterface {

    use UserTrait,
        RemindableTrait;
 
    
    protected $table = "invoice_line";
}
