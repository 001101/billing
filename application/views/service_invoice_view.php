<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from avenxo.kaijuthemes.com/ui-typography.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 06 Jun 2016 12:09:25 GMT -->
<head>
    <meta charset="utf-8">
    <title>JCORE - <?php echo $title; ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="description" content="Avenxo Admin Theme">
    <meta name="author" content="">


    <?php echo $_def_css_files; ?>

    <link rel="stylesheet" href="assets/plugins/spinner/dist/ladda-themeless.min.css">

    <link type="text/css" href="assets/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet">
    <link type="text/css" href="assets/plugins/datatables/dataTables.themify.css" rel="stylesheet">
    <link href="assets/plugins/datapicker/datepicker3.css" rel="stylesheet">

    <link href="assets/plugins/select2/select2.min.css" rel="stylesheet">

    <!--/twitter typehead-->
    <link href="assets/plugins/twittertypehead/twitter.typehead.css" rel="stylesheet">

    <style>
        html{
            zoom: 0.82;
            zoom: 82%;
        }

        #span_invoice_no{
            min-width: 50px;
        }

        #span_invoice_no:focus{
            border: 3px solid orange;
            background-color: yellow;
        }

        .panel {
            border: none!important;
            -webkit-box-shadow: 0px 0px 12px -1px rgba(156,151,156,1);
            -moz-box-shadow: 0px 0px 12px -1px rgba(156,151,156,1);
            box-shadow: 0px 0px 12px -1px rgba(156,151,156,1);
        }

        .alert {
            border-width: 0;
            border-style: solid;
            padding: 24px;
            margin-bottom: 32px;
        }
        .alert-danger, .alert-danger h1, .alert-danger h2, .alert-danger h3, .alert-danger h4, .alert-danger h5, .alert-danger h6, .alert-danger small {
            color: #dd191d;
        }

        .alert-danger {
            color: #dd191d;
            background-color: #f9bdbb;
            border-color: #e84e40;
        }




        #tbl_items td,#tbl_items tr,#tbl_items th{
            table-layout: fixed;
            border: 1px solid gray;
            border-collapse: collapse;
        }

        .toolbar{
            float: left;
        }

        td.details-control {
            background: url('assets/img/print.png') no-repeat center center;
            cursor: pointer;
        }

        tr.details td.details-control {
            background: url('assets/img/Folder_Opened.png') no-repeat center center;
        }

        .child_table{
            padding: 5px;
            border: 1px #ff0000 solid;
        }

        .glyphicon.spinning {
            animation: spin 1s infinite linear;
            -webkit-animation: spin2 1s infinite linear;
        }

        .select2-container{
            min-width: 100%;
            z-index: 9999999999;
        }

        .dropdown-menu > .active > a,.dropdown-menu > .active > a:hover{
            background-color: dodgerblue;
        }

        @keyframes spin {
            from { transform: scale(1) rotate(0deg); }
            to { transform: scale(1) rotate(360deg); }
        }

        @-webkit-keyframes spin2 {
            from { -webkit-transform: rotate(0deg); }
            to { -webkit-transform: rotate(360deg); }
        }

        .custom_frame{

            border: 1px solid lightgray;
            margin: 1% 1% 1% 1%;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
        }

        .numeric{
            text-align: right;
        }

        /* .container-fluid {
             padding: 0 !important;
         }

         .panel-body {
             padding: 0 !important;
         }*/

        #btn_new {
            margin-top: 10px;
            margin-bottom: 10px;
            text-transform: uppercase!important;
        }

        @media screen and (max-width: 480px) {

            table{
                min-width: 800px;
            }

            .dataTables_filter{
                min-width: 800px;
            }

            .dataTables_info{
                min-width: 800px;
            }

            .dataTables_paginate{
                float: left;
                width: 100%;
            }
        }


        .form-group {
            margin-bottom: 15px;
        }


    </style>
</head>

<body class="animated-content"  style="font-family: tahoma;">

<?php echo $_top_navigation; ?>

<div id="wrapper">
    <div id="layout-static">


        <?php echo $_side_bar_navigation;

        ?>


        <div class="static-content-wrapper white-bg">


            <div class="static-content"  >
                <div class="page-content"><!-- #page-content -->

                    <ol class="breadcrumb"  style="margin-bottom: 0;">
                        <li><a href="Dashboard">Dashboard</a></li>
                        <li><a href="Service_invoices">Service Invoice</a></li>
                    </ol>


                    <div class="container-fluid"">
                    <div data-widget-group="group1">
                        <div class="row">
                            <div class="col-md-12">



                                <div id="div_service_invoice">

                                    <div class="panel panel-default" style="border: 3px solid #00a546;min-height: 650px;border-radius:0px;">
                                        <a data-toggle="collapse" data-parent="#accordionA" href="#collapseTwo"><div class="panel-heading" style="background: #2ecc71;border-bottom: 1px solid lightgrey;"><b style="color: white; font-size: 12pt;"><i class="fa fa-bars"></i> Service Invoice</b></div></a>


                                        <div class="panel-body table-responsive">

                                            <table id="tbl_service_invoice" class="custom-design table-striped" cellspacing="0" width="100%" style="">
                                                <thead class="">
                                                <tr>
                                                    <th></th>
                                                    <th>Invoice #</th>
                                                    <th>Invoice Date</th>
                                                    <th>Due Date</th>
                                                    <th>Customer</th>
                                                    <th>Remarks</th>
                                                    <th><center>Action</center></th>
                                                </tr>
                                                </thead>
                                                <tbody>



                                                </tbody>
                                            </table>
                                        </div>





                                        <!-- <div class="panel-footer"></div> -->
                                    </div>

                                </div>


                                <div id="div_service_info_fields" style="display: none;">


                                    <div class="panel panel-default" style="border: 4px solid #2980b9;border-radius: 8px;">


                                        <!-- <div class="pull-right">
                                            <h4 class="sales_invoice_title" style="margin-top: 0%;"></h4>
                                            <div class="btn btn-green" style="margin-left: 10px;">
                                                <strong><a id="btn_receive_so" href="#" style="text-decoration: none; color: white;">Create from Sales Order</a></strong>
                                            </div>
                                        </div> -->
                                        <div class="panel-heading">
                                             <b style="color: white; font-size: 12pt;"><i class="fa fa-bars"></i>&nbsp; Service Invoice</b>
                                        </div>
                                        <div class="panel-body" style="padding-bottom: 0%;padding-top: 0%;">
                                            <div class="row" style="padding: 1%;margin-top: 0%;font-family: "Source Sans Pro", "Segoe UI", "Droid Sans", Tahoma, Arial, sans-serif">
                                            <form id="frm_sales_invoice" role="form" class="form-horizontal">

                                                <h4 style="margin-bottom: 6px;"><b>Invoice # : <span id="span_invoice_no">INV-XXXX</span></b></h4>
                                                <div style="border: 1px solid #a0a4a5;padding: 1%;border-radius: 5px;">

                                                    <div class="row">
                                                        <div class="col-sm-8">
                                                            Customer : <br />
                                                            <select name="customer" id="cbo_customers" data-error-msg="Customer is required." required>
                                                                <option value="0">[ Create New Customer ]</option>
                                                                <?php foreach($customers as $customer){ ?>
                                                                    <option value="<?php echo $customer->customer_id; ?>"><?php echo $customer->company_name; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-2 col-sm-offset-2">
                                                            Invoice Date : <br />
                                                            <div class="input-group">
                                                                <input type="text" name="date_invoice" class="date-picker form-control" value="<?php echo date("m/d/Y"); ?>" placeholder="Date Invoice" data-error-msg="Please set the date this items are issued!" required>
                                                                 <span class="input-group-addon">
                                                                     <i class="fa fa-calendar"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-8">
                                                            Address :<br>
                                                            <textarea class="form-control" id="txt_address" type="text" name="address" placeholder="Customer Address"></textarea>
                                                        </div>

                                                        <div class="col-sm-2 col-sm-offset-2">
                                                            Due Date : <br />
                                                            <div class="input-group">
                                                                <input type="text" name="date_due" class="date-picker form-control" value="<?php echo date("m/d/Y"); ?>" placeholder="Date Due" data-error-msg="Please set the date this items are issued!" required>
                                                                 <span class="input-group-addon">
                                                                     <i class="fa fa-calendar"></i>
                                                                </span>

                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                            </form>
                                        </div>


                                        <div style="border: 1px solid #a0a4a5;padding: 1%;border-radius: 0px;">

                                            <label class="control-label" style="font-family: Tahoma;"><strong>Search Items / Services :</strong></label>

                                            <div class="row">
                                             <div class="col-lg-10" style="padding-right: 0%;">

                                                 <div id="custom-templates">
                                                     <input class="typeahead" type="text" placeholder="Search here" style="width: 100%;">
                                                 </div><br />
                                             </div>
                                             <div class="col-lg-2" style="padding-left: 5px;">
                                                 <button id="btn_browse" class="btn-primary btn" style="width: 100%;text-transform: none;"><i class="fa fa-search"></i> Browse Services</button>

                                             </div>
                                         </div>



                                            <form id="frm_items">
                                                <div class="table-responsive"  style="min-height: 200px;padding: 1px;">
                                                    <table id="tbl_items" class="custom-design table-striped" cellspacing="0" width="100%" style="font-font:tahoma;">

                                                        <thead class="">
                                                        <tr>

                                                            <th width="10%">Qty</th>
                                                            <th width="30%">Description</th>
                                                            <th width="30%">Notes</th>
                                                            <th width="15%" style="text-align: right;">Service Fee</th>
                                                            <th width="5%"><center>Action</center></th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>

                                                        </tbody>
                                                        <tfoot>
                                                        <tr>
                                                            <td colspan="5" style="height: 50px;">&nbsp;</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3" style="text-align: right;"><strong><i class="glyph-icon icon-star"></i> Total Service Fee :</strong></td>
                                                            <td align="right" colspan="2" id="td_total_service_fee" color="red">0.00</td>

                                                        </tr>

                                                        </tfoot>



                                                    </table>
                                                </div>
                                            </form>

                                        </div>



                                        <div class="row">
                                            <div class="container-fluid">

                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><br />
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            <label control-label><strong>Remarks :</strong></label>
                                                            <div class="col-lg-12" style="padding: 0%;">
                                                                <textarea name="remarks" class="form-control" placeholder="Remarks"></textarea>
                                                            </div>
                                                        </div>

                                                    </div>



                                                </div>
                                            </div>
                                        </div>
                                        <br />
                                    </div>


                                    <div class="panel-footer" >
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <button id="btn_save" class="btn-primary btn" style="text-transform: capitalize;font-family: Tahoma, Georgia, Serif;"><span class=""></span>Save Changes</button>
                                                <button id="btn_cancel" class="btn-default btn" style="text-transform: capitalize;font-family: Tahoma, Georgia, Serif;">Cancel</button>
                                            </div>
                                        </div>
                                    </div>



                                </div>




                            </div>




                        </div>
                    </div>
                </div>
            </div> <!-- .container-fluid -->

        </div> <!-- #page-content -->
    </div>


    <div id="modal_confirmation" class="modal fade" tabindex="-1" role="dialog"><!--modal-->
        <div class="modal-dialog modal-sm">
            <div class="modal-content"><!---content--->
                <div class="modal-header ">
                    <button type="button" class="close"   data-dismiss="modal" aria-hidden="true">X</button>
                    <h4 class="modal-title" style="color: white;"><span id="modal_mode"> </span>Confirm Deletion</h4>

                </div>

                <div class="modal-body">
                    <p id="modal-body-message">Are you sure you want to delete?</p>
                </div>

                <div class="modal-footer">
                    <button id="btn_yes" type="button" class="btn btn-danger" data-dismiss="modal" style="text-transform: capitalize;font-family: Tahoma, Georgia, Serif;">Yes</button>
                    <button id="btn_close" type="button" class="btn btn-default" data-dismiss="modal" style="text-transform: capitalize;font-family: Tahoma, Georgia, Serif;">No</button>
                </div>
            </div><!---content---->
        </div>
    </div><!---modal-->



    <footer role="contentinfo">
        <div class="clearfix">
            <ul class="list-unstyled list-inline pull-left">
                <li><h6 style="margin: 0;">&copy; 2017 - JDEV IT Business Solutions</h6></li>
            </ul>
            <button class="pull-right btn btn-link btn-xs hidden-print" id="back-to-top"><i class="ti ti-arrow-up"></i></button>
        </div>
    </footer>




</div>
</div>


</div>


<?php echo $_switcher_settings; ?>
<?php echo $_def_js_files; ?>

<script src="assets/plugins/spinner/dist/spin.min.js"></script>
<script src="assets/plugins/spinner/dist/ladda.min.js"></script>


<script type="text/javascript" src="assets/plugins/datatables/jquery.dataTables.js"></script>
<script type="text/javascript" src="assets/plugins/datatables/dataTables.bootstrap.js"></script>




<!-- Date range use moment.js same as full calendar plugin -->  
<script src="assets/plugins/fullcalendar/moment.min.js"></script>
<!-- Data picker -->
<script src="assets/plugins/datapicker/bootstrap-datepicker.js"></script>

<!-- Select2 -->
<script src="assets/plugins/select2/select2.full.min.js"></script>



<!-- twitter typehead -->
<script src="assets/plugins/twittertypehead/handlebars.js"></script>
<script src="assets/plugins/twittertypehead/bloodhound.min.js"></script>
<script src="assets/plugins/twittertypehead/typeahead.bundle.js"></script>
<script src="assets/plugins/twittertypehead/typeahead.jquery.min.js"></script>

<!-- touchspin -->
<script type="text/javascript" src="assets/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js"></script>

<!-- numeric formatter -->
<script src="assets/plugins/formatter/autoNumeric.js" type="text/javascript"></script>
<script src="assets/plugins/formatter/accounting.js" type="text/javascript"></script>

<script>
    $(document).ready(function(){
        var dt; var _cboCustomers;

        var initializeControls=function(){

            dt=$('#tbl_service_invoice').DataTable({
                "dom": '<"toolbar">frtip',
                "bLengthChange":false,
                "order": [[ 1, "asc" ]],
                "pageLength":15,
                "ajax" : "Service_invoices/transaction/invoice-list",
                "columns": [
                    {
                        "targets": [0],
                        "class":          "details-control",
                        "orderable":      false,
                        "data":           null,
                        "defaultContent": ""
                    },
                    { targets:[1],data: "invoice_no" },
                    { targets:[2],data: "date_invoice" },
                    { targets:[3],data: "date_due" },
                    { targets:[4],data: "company_name" },
                    { targets:[5],data: "remarks" },
                    {
                        targets:[6],
                        render: function (data, type, full, meta){
                            var btn_edit='<button class="btn btn-primary btn-sm" name="edit_info"  style="margin-left:0px;" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil"></i> </button>';
                            var btn_trash='<button class="btn btn-red btn-sm" name="remove_info" style="margin-right:0px;" data-toggle="tooltip" data-placement="top" title="Move to trash"><i class="fa fa-trash-o"></i> </button>';

                            return '<center> '+btn_edit+"&nbsp;"+btn_trash+' </center>';
                        }
                    }
                ]

            });




            var createToolBarButton=function(){
                var _btnNew='<button class="btn btn-primary" id="btn_new" style="text-transform: none;font-family: Tahoma, Georgia, Serif; " data-toggle="modal" data-target="#salesInvoice" data-placement="left" title="New Service Invoice" >'+
                    '<i class="fa fa-plus-circle"></i> New Service Invoice</button>';
                $("div.toolbar").html(_btnNew);
            }();

        }();





        var bindEventHandlers=function(){

            $('#btn_new').click(function(){
                showList(false);
            });

            $('#btn_cancel').click(function(){
                showList(true);
            });

            _cboCustomers=$("#cbo_customers").select2({
                placeholder: "Please select branch.",
                allowClear: true
            });


        }();



        var showList=function(b){
            if(b){
                $('#div_service_invoice').show();
                $('#div_service_info_fields').hide();
            }else{
                $('#div_service_invoice').hide();
                $('#div_service_info_fields').show();
            }
        };



    });



</script>


</body>


</html>