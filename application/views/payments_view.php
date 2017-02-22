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
        html {
                zoom: 85%;
            }

            .panel.panel-default .panel-heading {
                border-color: transparent;
            }

            .row-border .form-group {
                padding: 5px 0;
            }
            
            .modal-content {
                border: 1px solid #404040;
            }

            .panel {
                border: none;
                -webkit-box-shadow: 0px 0px 12px -1px rgba(156,151,156,1);
                -moz-box-shadow: 0px 0px 12px -1px rgba(156,151,156,1);
                box-shadow: 0px 0px 12px -1px rgba(156,151,156,1);
            }

            .breadcrumb {
                margin-bottom: 0!important;
            }    

            .toolbar{
                float: left;
            }

            td.details-control {
                background: url('assets/img/Folder_Closed.png') no-repeat center center;
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

            @keyframes spin {
                from { transform: scale(1) rotate(0deg); }
                to { transform: scale(1) rotate(360deg); }
            }

            @-webkit-keyframes spin2 {
                from { -webkit-transform: rotate(0deg); }
                to { -webkit-transform: rotate(360deg); }
            }
    </style>
</head>

<body class="animated-content" style="font-family: tahoma;">

<?php echo $_top_navigation; ?>

<div id="wrapper">
    <div id="layout-static">


        <?php echo $_side_bar_navigation; ?>


        <div class="static-content-wrapper white-bg">
            <div class="static-content">
                <div class="page-content"><!-- #page-content -->

                    <ol class="breadcrumb"  style="margin-bottom: 0;">
                        <li><a href="Dashboard">Dashboard</a></li>
                        <li><a href="Payments">Payments</a></li>
                    </ol>
                    <div class="container-fluid">
                        <div id="payments_list"> 
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <b style="color: white; font-size: 12pt;"><i class="fa fa-bars"></i>&nbsp; Payments</b>
                                </div>
                                <div class="panel-body">
                                    <table id="tbl_payments" class="table-striped custom-design" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Receipt #</th>
                                                <th>Client</th>
                                                <th>Payment Date</th>
                                                <th>
                                                    <center>Action</center>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                                <div class="panel-footer"></div>
                            </div>
                        </div>

                        <div id="payment_trans">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <b style="color: white; font-size: 12pt;"><i class="fa fa-bars"></i>&nbsp; Payment Transaction</b>
                                </div>
                                <div class="panel-body">
                                    <div style="border: 1px solid #c0c0c0; padding: 20px 0px 30px 0px; margin-bottom: 10px;">
                                        <div class="row" style="margin-bottom: 10px;">
                                            <div class="container-fluid">
                                                <form>
                                                    <div class="col-xs-12 col-sm-5">
                                                        <strong>Receipt #:</strong>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                                 <i class="fa fa-code"></i>
                                                            </span> 
                                                            <input type="text" class="form-control" name="">
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-4 col-sm-offset-3">
                                                        <strong>Payment Date:</strong><br>
                                                        <div class="input-group">
                                                            <input type="text" name="date_invoice" class="date-picker form-control" value="<?php echo date("m/d/Y"); ?>" placeholder="Date Invoice" data-error-msg="Please set the date this items are issued!" required>
                                                             <span class="input-group-addon">
                                                                 <i class="fa fa-calendar"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="container-fluid">
                                                <form>
                                                    <div class="col-xs-12 col-sm-5">
                                                        <strong>Payment Method:</strong><br>
                                                            <select id="cbo_payment_method" class="form-control" style="width: 100%;">
                                                                <?php foreach($methods as $method) { ?>
                                                                    <option value="<?php echo $method->payment_method_id; ?>">
                                                                        <?php echo $method->payment_method; ?>
                                                                    </option>
                                                                <?php } ?>
                                                            </select>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-offset-7">
                                                        
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="border: 1px solid #c0c0c0; padding: 10px 20px 30px 20px;">
                                        <div class="row">
                                            <div class="container-fluid">
                                                <strong>Client:</strong><br>
                                                <select id="cbo_customers" class="form-control" style="width: 100%;">
                                                    <?php foreach ($customers as $customer) { ?>
                                                        <option value="<?php echo $customer->customer_id ?>"><?php echo $customer->company_name; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div><br>
                                        <div class="row">
                                            <div class="container-fluid">
                                                <table id="tbl_receivables" class="table table-striped table-bordered" cellspacing="0" width="100%" style="font-font:tahoma;border: 1px solid #c0c0c0;">
                                                        <thead>
                                                        <tr>
                                                            <th width="12%">Billing Date</th>
                                                            <th width="12%">Due Date</th>
                                                            <th width="30%">Remarks</th>
                                                            <th width="12%" style="text-align: right;">Amount Due</th>
                                                            <th width="14%">Payment</th>
                                                            <th width="5%">Action</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>

                                                        </tbody>
                                                        <tfoot>
                                                        <tr>
                                                            <td colspan="6" style="height: 50px;">&nbsp;</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3" align="right"><b>Total : </b></td>
                                                            <td id="td_total_payables" align="right"><b>0.00</b></td>
                                                            <td id="td_total_payments" align="right"><b>0.00</b></td>
                                                            <td></td>
                                                        </tr>

                                                        </tfoot>
                                                    </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-footer">
                                    <button id="btn_save" class="btn btn-primary"><i class="fa fa-floppy-o"></i>&nbsp;Save</button>
                                    <button id="btn_cancel" class="btn btn-default">Cancel</button>
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
        var _cboCustomers, _cboPayments;
        var initializeControls=function(){
            dt=$('#tbl_payments').DataTable({
                "dom": '<"toolbar">frtip',
                "bLengthChange":false,
                "ajax" : "Payments/transactions/list",
                "columns": [

                    { targets:[0],data: "receipt_no" },
                    { targets:[1],data: "payment_date" },
                    { targets:[1],data: "company_name" },
                    {
                        targets:[2],
                        render: function (data, type, full, meta){
                            var btn_edit='<button class="btn btn-primary btn-sm" name="edit_info"  style="margin-left:-15px;" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil"></i> </button>';
                            var btn_trash='<button class="btn btn-danger btn-sm" name="remove_info" style="margin-right:0px;" data-toggle="tooltip" data-placement="top" title="Move to trash"><i class="fa fa-trash-o"></i> </button>';

                            return '<center>'+btn_edit+'&nbsp;'+btn_trash+'</center>';
                        }
                    }
                ]
            });

            _cboCustomers=$("#cbo_customers").select2({
                placeholder: "Please select Client.",
                allowClear: true
            });

            _cboPayments=$("#cbo_payment_method").select2({
                placeholder: "Please select Payment Method.",
                allowClear: true
            });

             $('.date-picker').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true

            });

            _cboCustomers.select2('val',null);
            _cboPayments.select2('val',null);

            var createToolBarButton=function(){
                var _btnNew='<button class="btn btn-primary"  id="btn_new" style="text-transform: capitalize;font-family: Tahoma, Georgia, Serif;" data-toggle="modal" data-target="" data-placement="left" title="New payment" >'+ '<i class="fa fa-plus-circle"></i> New Payment</button>';
                $("div.toolbar").html(_btnNew);
            }();

            $('#payment_trans').hide();
        }();

        var bindEventHandlers=function(){
            $('#btn_new').on('click',function(){
                showList(false);
            });

            $('#btn_cancel').on('click',function(){
                showList(true);
            });
        }();

        var showList=function(txn){
            if(txn === true) {
                $('#payment_trans').hide();
                $('#payments_list').show();
            } else {
                $('#payment_trans').show();
                $('#payments_list').hide();
            }
        };
    });



</script>


</body>


</html>