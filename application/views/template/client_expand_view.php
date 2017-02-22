<div id="customer_expand_<?php echo $customer_id; ?>" style="padding: 1%;border: 1px solid darkgray;margin: 1%;">

    <div class="row">

        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-12">
                    <h4 style="margin-top: 0px;"><b>Company Profile</b></h4><hr />
                    <div class="col-lg-5">
                    Company / Client name : <br />
                    <b style="font-size: 16px;"><?php echo $customer_info[0]->company_name; ?></b>

                    <br /><br />

                    Trade name : <br />
                    <b style="font-size: 16px;"><?php echo $customer_info[0]->trade_name; ?></b>

                    <br /><br />

                    Office Address : <br />
                    <?php echo $customer_info[0]->office_address; ?>

                    <br /><br />
                    Billing Address : <br />
                    <?php echo $customer_info[0]->billing_address; ?>

                    <br /><br />
                    Contact Person : <br />
                    <?php echo $customer_info[0]->contact_person; ?>

                    <br /><br />
                    Designation : <br />
                    <?php echo $customer_info[0]->designation; ?>

                    <br /><br />
                    Tax type : <br />
                    <?php echo $customer_info[0]->tax_type; ?>

                    </div>
                    <div class="col-lg-2">
                    <img class="img-responsive image" name="img_customer_photo" src="<?php echo $customer_info[0]->photo_path; ?>" alt="Image" width="100%">

                    <br /><br />
                    Contact No. : <br />
                    <b><?php echo $customer_info[0]->contact_no; ?></b>

                    <br /><br />
                    Email : <br />
                    <?php echo $customer_info[0]->email_address; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
