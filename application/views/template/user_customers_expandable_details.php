<div style="padding: 0% 3% 0% 3%;">
	<h4 style="float: left;"><i class="fa fa-users"></i>&nbsp;Clients Affiliated to <strong><?php echo $user_info->user_fname.' '.$user_info->user_lname; ?></strong></h4>
	
	<table id="tbl_customers_<?php echo $user_info->user_id; ?>" class="table-striped custom-design" width="100%">
		<thead style="border: 1px solid #aaa;">
			<tr>
				<td width="95%" style="padding: 5px; border-right: 1px solid #aaa;">Client Name</td>
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
</div>