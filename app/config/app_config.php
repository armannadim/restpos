<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$config = Configuration::all();
foreach ($config as $data) {    
    $app_config[$data['name']] = $data['value'];
}

return $app_config;