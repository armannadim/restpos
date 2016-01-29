
@include('static.meta')
{{ HTML::script('plugins/jquery-1.8.3.min.js'); }}
{{ HTML::script('js/datatables/jquery.datatables.min.js'); }}
<div class="page-content pos">
    <div class="content">
        {{ Form::open(array('url'=>'addItemToOrder', 'id' => 'addItemToOrder')) }}
        {{ Form::close() }}
        <div class="top">
            <div class="row-fluid">
                <div class="span12">
                    <div id="menu" class="accordion">
                        @foreach($categories as $cat)
                        <div class="accordion-group">
                            <div class="accordion-heading"> <a href="#{{$cat->name}}" data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed"> {{$cat->view}} <i class="icon-plus"></i> </a> </div>
                            <div class="accordion-body collapse" id="{{$cat->name}}" style="height: 0px;">
                                <div class="accordion-inner"> 

                                    @foreach ($items as $item)
                                    @if($item->food_category_id===$cat->id)
                                    {{ Form::hidden('id_food_items', $item->id) }}
                                    <div class="buttons">
                                        <a class="twitter" href="javascript:;" onclick="javascript:submit({{$item->id}});"><img src="{{URL::to($item->image)}}" /></a>
                                        <br><span>{{$item->name}}</span>
                                    </div>
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @endforeach                        
                    </div>
                </div>
            </div>
        </div>        
        <div class="bottom_POS" id="order_table_div">            
            <div class="row-fluid">

                <div class="span8">
                    <div class="grid simple">
                        <div class="grid-title no-border">
                            <h4>Order by  <span class="semi-bold">Tables</span></h4>
                            <div class="tools">
                                <a href="javascript:;" class="collapse"></a>                                
                                <a href="javascript:;" class="reload"></a>                                
                            </div>
                        </div>
                        <div class="grid-body no-border" >
                            <div class="scroller" data-height="300px" data-always-visible="1">
                                <div class="tabbable tabs-left">
                                    <ul class="nav nav-tabs" id="tab-01">
                                        @foreach ($tables as $table)
                                        <li class="{{$table->id===1 ? 'active':''}}"><a href="#{{$table->id}}" id="{{$table->name}}">{{$table->name}}</a></li>
                                        @endforeach
                                    </ul>
                                    <div id="tabs" class="tab-content">
                                        @foreach ($tables as $table)                                        
                                        <div class="tab-pane {{$table->id===1 ? 'active':''}}" id="{{$table->id}}">                                            
                                            {{ Form::hidden('table_id', $table->id) }}
                                            <script>
                                                        $("#order_table_{{$table->id}}").dataTable();</script>
                                            <div class="row-fluid">
                                                <div class="span12">
                                                    <table class="table no-more-tables" id="order_table_{{$table->id}}">
                                                        <thead>
                                                            <tr>                                                                           
                                                                <th width="2%">No</th>
                                                                <th >Item of {{$table->show_name}}</th>
                                                                <th width="15%">Unit Price</th>
                                                                <th width="5%">Quantity</th>
                                                                <th width="5%">Discount</th>
                                                                <th width="20%">Total Price</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            {{--*/ $sub_total = 0 /*--}}                                                            
                                                            @foreach($ordered_item as $oi)
                                                            @if($table->id === $oi->table_id)
                                                            <tr>
                                                                <td valign="middle">{{$oi->table_id}}</td>
                                                                <td valign="middle"><span class="muted">{{$oi->name}}</span></td>
                                                                <td><span class="muted">{{$oi->unit_price}}</span></td>
                                                                <td valign="middle">{{$oi->quantity}}</td>
                                                                <td valign="middle">{{$oi->discount}}</td>
                                                                <td valign="middle">{{$oi->total_price}}</td>
                                                            </tr> 
                                                            {{--*/ $sub_total = $sub_total + $oi->total_price /*--}}
                                                            {{--*/ $order_id = $oi->id_order /*--}}
                                                            @endif
                                                            @endforeach                                                            
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                        <script>
                                                    $("#{{$table->name}}").click(function() {
                                            $("span#tbl_name").text("{{$table->show_name}}");
                                                    $("input[name=order_id]").val("{{$order_id}}");
                                                    $("#subTotal").val("{{$sub_total}}");
                                                    var sub_total = parseInt($('input[name=subTotal]').val());
                                                    var iva = parseInt($("input[name=iva]").val());
                                                    var discount = parseInt($('input[name=discount]').val('0'));
                                                    var total = sub_total + ((iva * sub_total) / 100);
                                                    $("input[name=total]").val(total);
                                            });</script>
                                        @endforeach
                                    </div>      
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                
                <div class="span4">
                    <div class="grid simple">
                        <div class="grid-title no-border">
                            <h4><span id="tbl_name" class="bold"></span></h4>
                            <input type="hidden" name="order_id" value=""/>
                            <div class="tools">
                                <a href="javascript:;" class="collapse"></a>                                
                                <a href="javascript:;" class="reload"></a>                                
                            </div>
                        </div>
                        <div class="grid-body no-border" style="height:300px!important; text-align: right;">
                            <div class="row-fluid span7">
                                <div class="control-group btnCust">                                                                               
                                    <label class="control-label">Sub Total</label>                                      
                                    <input readonly style="float:right!important;" class="currency span6 auto" id="subTotal" name="subTotal" type="text" data-a-dec="." data-a-sep="," value="">                                        
                                </div>
                                <div class="control-group btnCust">                                        
                                    <label class="control-label">IVA(%)</label>     
                                    <input style="float:right!important;" class="span6 auto" name="iva" type="text" data-a-dec="." data-a-sep="," value="21">                                        
                                </div>
                                <div class="control-group btnCust input-group">                                        
                                    <label class="control-label">Discount</label>     
                                    <input style="float:right!important" class="currency span6 auto" name="discount" type="text" data-a-dec="." data-a-sep="," value="0"> 


                                </div>                                
                                <script>
                                            $("input[name=iva], input[name=subTotal], input[name=discount]").on('keyup change', function(){
                                    var iva = parseInt($("input[name=iva]").val());
                                            //calculate iva
                                            var sub_total = parseInt($('input[name=subTotal]').val());
                                            var discount = parseInt($('input[name=discount]').val());
                                            var total = (sub_total + ((iva * sub_total) / 100))
                                            if (discount > 0 && discount < total){
                                    var total = total - discount;
                                    }
                                    //console.log(total);
                                    $('input[name=total]').val(total);
                                    })
                                </script>
                                <div class="control-group btnCust">                                        
                                    <label class="control-label">Total</label>
                                    <input style="float:right!important;" class="currency span6 auto " name="total" type="text" data-a-dec="." data-a-sep="," readonly="readonly">                                        
                                </div>
                            </div>
                            <div class="row-fluid span12">
                                <span></span>
                                <button class="btn btn-primary btn-cons span5" type="button" onclick="submit_final_order_save()">
                                    <i class="icon-save"></i>
                                    Save
                                </button>
                                <button class="btn btn-danger btn-cons span5" type="button" onclick="submit_final_order_paid()">
                                    <i class="icon-warning-sign"></i>
                                    Paid
                                </button>
                                <button class="btn btn-info btn-cons span5" type="button" onclick="submit_final_order_print_client()">
                                    <i class="icon-print"></i>
                                    Print Client
                                </button>
                                <button class="btn btn-info btn-cons span5" type="button" onclick="submit_final_order_kitchen()">
                                    <i class="icon-print"></i>
                                    Print Kitchen
                                </button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('static.meta_foot')
