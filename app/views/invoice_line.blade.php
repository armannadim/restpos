<!DOCTYPE html>
<!--
This project has been created by Aseq A Arman Nadim.
Anyone can use this project and its contents but with permission of the author of this project.
Email: armannadim@msn.com
-->


@extends('layout.master')
@section('content')

@include('static.sidebar')
<!-- BEGIN PAGE CONTAINER-->
<div class="page-content">

    <div class="clearfix"></div>
    <div class="content">
        <ul class="breadcrumb"></ul>
        <div class="page-title">
            <h3>Invoice </h3>
        </div>
        <div class="row-fluid spacing-bottom">
            <div class="span12">
                <div class="grid simple">
                    <div class="grid-title no-border">
                        <h4>Sales<span class="semi-bold"> List</span></h4>
                        <div class="tools"> <a href="javascript:;" class="collapse"></a> <!--<a href="#grid-config" data-toggle="modal" class="config"></a>--> <a href="javascript:;" class="reload"></a> <!--<a href="javascript:;" class="remove"></a>--> </div>
                    </div>
                    <div class="grid-body no-border"> <br />
                        <div class="row-fluid">
                            <div class="span12">
                                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-condensed table-bordered" id="invoice_line">
                                    <thead>
                                        <tr>
                                            <th width="5%">ID</th>
                                            <th width="5%">Client ID</th>
                                            <th width="5%">Order ID</th>
                                            <th width="10%">Date</th>
                                            <th width="10%">Total Item</th>
                                            <th width="10%">Total Price</th>
                                            <th width="15%">Special Discount(%)</th>	
                                            <th width="10%">Final Price</th>	
                                            <th width="15%">Paid by</th>
                                            <th width="10%">Attended by</th>                                            
                                            <th width="5%">Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Client ID</th>
                                            <th>Order ID</th>
                                            <th>Date</th>
                                            <th>Total Item</th>
                                            <th>Total Price</th>
                                            <th>Special Discount(%)</th>	
                                            <th>Final Price</th>	
                                            <th>Paid by</th>
                                            <th>Attended by</th>                                            
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <tr>			
                                            <td></td>
                                            <td></td>
                                            <td></td>			
                                            <td></td>
                                            <td></td>
                                            <td></td>            
                                            <td></td>    
                                            <td></td>  
                                            <td></td>
                                            <td></td>            
                                            <td></td>                                               
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>            
        </div>        
    </div>
</div>
@stop
