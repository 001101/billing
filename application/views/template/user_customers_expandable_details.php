<h4><i class="fa fa-users"></i>&nbsp;Clients Affiliated to <?php echo $user_info->user_fname.' '.$user_info->user_lname; ?></h4>
<hr>
<table id="tbl_customers_<?php echo $user_info->user_id; ?>" class="table table-striped table-bordered" width="100%">
	<thead class="table-erp">
		<tr>
			<td width="95%">Client Name</td>
			<td width="5%"><center>Affiliated?</center></td>
		</tr>
	</thead>
	<tbody>
		<?php foreach($customers as $customer) { ?>
			<tr>
				<td><?php echo $customer->company_name; ?></td>

				<td><center><button name="btn_assign" type="button" class="btn <?php echo ($customer->is_assign==1 ? 'btn-success' : 'btn-danger'); ?>" value="<?php echo $customer->customer_id; ?>"><i class="<?php echo ($customer->is_assign==1 ? 'fa fa-check' : 'fa fa-times'); ?>"></i></button></center></td>
			</tr>
		<?php } ?>
	</tbody>
</table>