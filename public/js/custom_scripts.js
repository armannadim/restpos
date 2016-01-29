/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

jQuery(document).ready(function($) {
    /*### TEXT AREA EDITOR ###*/
    $('.textarea').wysihtml5({
        "font-styles": true, //Font styling, e.g. h1, h2, etc. Default true
        "emphasis": true, //Italics, bold, etc. Default true
        "lists": true, //(Un)ordered lists, e.g. Bullets, Numbers. Default true
        "html": false, //Button which allows you to edit the generated HTML. Default false
        "link": false, //Button to insert a link. Default true
        "image": true, //Button to insert an image. Default true,
        "color": true, //Button to change color of font          
        "stylesheets": false
    });
    /*### END TEXT AREA EDITOR ###*/
    /*### DATATABLES ###*/

    $('#users').dataTable({
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": "user_DT",
        "aaSorting": [[3, "desc"]],
        "aoColumns": [
            {'sWidth': '5%', 'sClass': 'center'},
            {'sWidth': '20%', 'sClass': 'center'},
            {'sWidth': '20%', 'sClass': 'center'},
            {'sWidth': '20%', 'sClass': 'center'},
            {'sWidth': '20%', 'sClass': 'center'},
            {'sWidth': '10%', 'sClass': 'center'},
            {'sWidth': '5%', 'sClass': 'center icon', "bSortable": false},
        ],
        //"sPaginationType": "bootstrap"
    }).makeEditable({
        sUpdateURL: "updateUsers"
    });


    var oTableItems = $('#items').dataTable({
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": "item_DT",
        "aoColumns": [
            {sName: 'id', 'sWidth': '5%', 'sClass': 'center'},
            {sName: 'name', 'sWidth': '20%', 'sClass': 'center'},
            {sName: 'details', 'sWidth': '20%', 'sClass': 'center'},
            {sName: 'regular_price', 'sWidth': '20%', 'sClass': 'center'},
            {sName: 'discounted_price', 'sWidth': '20%', 'sClass': 'center'},
            {sName: 'discount_percentage', 'sWidth': '10%', 'sClass': 'center'},
            {sName: 'food_category', 'sWidth': '5%', 'sClass': 'center'},
            {sName: 'action', 'sWidth': '5%', 'sClass': 'center icon', "bSortable": false},
        ],
        "fnRowCallback": function(nRow, aData, iDisplayIndex) {
            $(nRow).attr("id", aData["id"]); // Change row ID attribute to match database row id
            return nRow;
        }
        //"sPaginationType": "bootstrap"
    }).makeEditable({
        sUpdateURL: function(value, settings)
        {
            var columnId = oTableItems.fnGetPosition(this)[2];
            var sColumnTitle = oTableItems.fnSettings().aoColumns[columnId].sName;
            var rowId = $(this).closest('tr[id]').attr('id');
            $.ajax({
                type: "POST",
                url: 'updateItems/' + rowId,
                data: "column=" + sColumnTitle + "&id=" + rowId + "&value=" + value,
                success: function() {
                    oTableItems.fnDraw();
                }
            })
            return value;
        }
    });

    var oTableItemsCustom = $('#custom_items').dataTable({
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": "custom_item_DT",
        "aoColumns": [
            {sName: 'id', 'sWidth': '5%', 'sClass': 'center'},
            {sName: 'name', 'sWidth': '20%', 'sClass': 'center'},
            {sName: 'details', 'sWidth': '20%', 'sClass': 'center'},
            {sName: 'regular_price', 'sWidth': '20%', 'sClass': 'center'},
            {sName: 'discounted_price', 'sWidth': '20%', 'sClass': 'center'},
            {sName: 'discount_percentage', 'sWidth': '10%', 'sClass': 'center'},
            {sName: 'food_category', 'sWidth': '5%', 'sClass': 'center'},
            {'sClass': 'center'},
            {sName: 'action', 'sWidth': '5%', 'sClass': 'center icon', "bSortable": false},
        ],
        //"sPaginationType": "bootstrap"
    }).makeEditable({
        sUpdateURL: function(value, settings)
        {
            var columnId = oTableItemsCustom.fnGetPosition(this)[2];
            var sColumnTitle = oTableItemsCustom.fnSettings().aoColumns[columnId].sName;
            var rowId = $(this).closest('tr[id]').attr('id');
            $.ajax({
                type: "POST",
                url: 'updateCustomItems/' + rowId,
                data: "column=" + sColumnTitle + "&id=" + rowId + "&value=" + value,
                success: function() {
                    oTableItemsCustom.fnDraw();
                }
            })
            return value;
        }
    });


    $('#config').dataTable({
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": "config_DT",
        "pagingType": "simple_numbers",
        "aaSorting": [[0, "asc"], [3, false]],
        "aoColumns": [
            {'sClass': 'left'},
            {'sClass': 'center'},
            {'sClass': 'center'},
            {'sClass': 'center icon', "bSortable": false},
        ],
        //"sPaginationType": "bootstrap"
    }).makeEditable({
        sUpdateURL: "updateConfig"
    });


    var oTableClients = $('#clients').dataTable({
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": "clients_DT",
        "aoColumns": [
            {'sName': 'id','sClass': 'center'},
            {'sName': 'firstname','sClass': 'center'},
            {'sName': 'lastname','sClass': 'center'},
            {'sName': 'surname','sClass': 'center'},
            {'sName': 'identity','sClass': 'center'},
            {'sName': 'address','sClass': 'center'},
            {'sName': 'city','sClass': 'center'},
            {'sName': 'country','sClass': 'center'},
            {'sName': 'lastvisit','sClass': 'center'},
            {'sName': 'created_by','sClass': 'center'},
            {'sName': 'created_at','sClass': 'center'},
            {'sName': 'action','sClass': 'center icon', "bSortable": false},
        ],
        "fnRowCallback": function(nRow, aData, iDisplayIndex) {
            $(nRow).attr("id", aData["id"]); // Change row ID attribute to match database row id
            return nRow;
        }
        //"sPaginationType": "bootstrap"
    }).makeEditable({
        sUpdateURL: function(value, settings)
        {
            var columnId = oTableClients.fnGetPosition(this)[2];
            var sColumnTitle = oTableClients.fnSettings().aoColumns[columnId].sName;
            var rowId = $(this).closest('tr[id]').attr('id');
            $.ajax({
                type: "POST",
                url: 'updateCustomItems/' + rowId,
                data: "column=" + sColumnTitle + "&id=" + rowId + "&value=" + value,
                success: function() {
                    oTableClients.fnDraw();
                }
            })
            return value;
        }
    });

    $('#invoice').dataTable({
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": "invoice_DT",
        "aaSorting": [[3, "desc"]],
        "aoColumns": [
            {'sWidth': '8%', 'sClass': 'center'},
            {'sWidth': '8%', 'sClass': 'center'},
            {'sWidth': '8%', 'sClass': 'center'},
            {'sWidth': '12%', 'sClass': 'center'},
            {'sWidth': '9%', 'sClass': 'center'},
            {'sWidth': '10%', 'sClass': 'center'},
            {'sWidth': '10%', 'sClass': 'center'},
            {'sWidth': '10%', 'sClass': 'center'},
            {'sWidth': '10%', 'sClass': 'center'},
            {'sWidth': '10%', 'sClass': 'center'},
            {'sWidth': '5%', 'sClass': 'center icon', "bSortable": false},
        ],
        "dom": 'T<"clear">lfrtip',
        "tableTools": {
            "sSwfPath": "../js/datatables/swf/copy_csv_xls_pdf.swf",
        }
        //"sPaginationType": "bootstrap"
    }).makeEditable({
        sUpdateURL: "updateInvoice"
    });

    $('#invoice_line tfoot th').each(function(i)
    {
        var title = $('#invoice_line thead th').eq($(this).index()).text();
        if (i == 10)
            return;
        // or just var title = $('#sample_3 thead th').text();
        var serach = '<input style="width:100%!important" type="text" placeholder="' + title + '" />';
        $(this).html('');
        $(serach).appendTo(this).keyup(function() {
            invoice_line.fnFilter($(this).val(), i)
        })
    });
    var invoice_line = $('#invoice_line').dataTable({
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": "sales_DT",
        "aaSorting": [[3, "desc"]],
        "aoColumns": [
            {'sWidth': '8%', 'sClass': 'center'},
            {'sWidth': '8%', 'sClass': 'center'},
            {'sWidth': '8%', 'sClass': 'center'},
            {'sWidth': '12%', 'sClass': 'center'},
            {'sWidth': '9%', 'sClass': 'center'},
            {'sWidth': '10%', 'sClass': 'center'},
            {'sWidth': '10%', 'sClass': 'center'},
            {'sWidth': '10%', 'sClass': 'center'},
            {'sWidth': '10%', 'sClass': 'center'},
            {'sWidth': '10%', 'sClass': 'center'},
            {'sWidth': '5%', 'sClass': 'center icon', "bSortable": false},
        ],
        "dom": 'T<"clear">lfrtip',
        "tableTools": {
            "sSwfPath": "../js/datatables/swf/copy_csv_xls_pdf.swf",
        }
        //"sPaginationType": "bootstrap"
    });


    /*### END DATATABLES ###*/
    /*### FORM SUBMIT ###*/



    /*### END FORM SUBMIT ###*/
});
function submit(item_id) {
    //var abc = $('.tab-pane active').parent().next('div').find('.hidden:eq(0)').val();
    var table_id = $("div.active > input:hidden").val();
    var frm = $('#addItemToOrder');
    //frm.serialize()+
    var data = 'item_id=' + item_id + '&table_id=' + table_id;
    console.log(data);
    $.ajax({
        type: 'POST',
        url: 'addItemToOrder',
        data: data,
        dataType: 'json'
    })
            .done(function(data) {
                window.location.reload();

                console.log(data);
            });
}

/*NOT IMPLEMENTED IN FUNCTION */
function submit_final_order_save() {
//var abc = $('.tab-pane active').parent().next('div').find('.hidden:eq(0)').val();
    var table_id = $("div.active > input:hidden").val();
    var order_id = $("input[name=order_id]").val();
    var vat = $("input[name=iva]").val();
    var discount = $("input[name=discount]").val();
    var sub_total = $("input[name=subTotal]").val();
    var total_price = $("input[name=total_price]").val();

    var data = 'order_id=' + order_id + '&total_price=' + total_price + '&sub_total=' + sub_total + '&vat=' + vat + '&global_discount=' + discount + '&table_id=' + table_id;

    $.ajax({
        type: 'POST',
        url: 'SaveOrder',
        data: data,
        dataType: 'json'
    })
            .done(function(data) {
                window.location.reload();
                console.log(data);
            });
}

function submit_final_order_paid() {

}

function submit_final_order_print_client() {

    console.log();
    var id_order = $('input[name=order_id]').val();
    var discount = $('input[name=discount]').val();
    var iva = $('input[name=iva]').val();
    var total = $('input[name=total]').val();
    var subTotal = $('input[name=subTotal]').val();
    var sendData = {order_id: id_order, discount: discount, iva: iva, subTotal: subTotal, total: total}
    $.ajax({
        type: "POST",
        cache: false,
        url: "printOrderClient",
        data: sendData,
        success: function(data) {

            console.log(data);

        }
    })
            .done(function(data) {
                myFunction('printOrderClient', 'post', sendData);
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                alert('No response from server');
            });

}

function submit_final_order_print_kitchen() {

}
/*NOTIMPLEMENTED IN FUNCTION*/
/* SUPLIMENTARY FUNCTION TO GET THE PDF FROM SERVER WITH INVOICE DATA */
function myFunction(action, method, input) {
    'use strict';
    var form;
    form = $('<form />', {
        action: action,
        method: method,
        style: 'display: none;',
        target: '_blank'
    });
    if (typeof input !== 'undefined' && input !== null) {
        $.each(input, function(name, value) {
            $('<input />', {
                type: 'hidden',
                name: name,
                value: value
            }).appendTo(form);
        });
    }
    form.appendTo('body').submit();
}