<?php

/* * *****************************************************************************

  Ghi chú:hoàn thành ngày 29-07-2015
  Copyright :Hồ Minh Trí

 * ***************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

if(!$info_content['ajax_show_manager']){

	?>
	<script type="text/javascript" src="<?php echo base_url().ADMIN_DIR_TEMPLATE; ?>js/ajax/product.js"></script>
	<script language="javascript">
				(function($){

				$.alert_authorization_body=function(){

				$('#content').delegate('#content .alert_authorization_add','click',function(){
				alert("<?php echo $info_content['alert_authorization_add_product']; ?>");
						return false;
				});
						$('#content').delegate('#content .alert_authorization_delete','click',function(){
				alert("<?php echo $info_content['alert_authorization_delete_product']; ?>");
						return false;
				});
						$('#content').delegate('#content .alert_authorization_update','click',function(){
				alert("<?php echo $info_content['alert_authorization_update_product']; ?>");
						return false;
				});
						return this;
				};
				})(jQuery);
				$$(document).ready(function(){
		$$.alert_authorization_body();
				data_tables_aoColumnDefs=[
				{
				"bSearchable"       :false,
						"bSortable"         :false,
						"aTargets"          :[0]
				},
				{
				"sSortDataType"     :"dom-div",
						"bSearchable"       :true,
						"aTargets"          :[1]
				},
				{
				"sSortDataType"     :"dom-div",
						"bSearchable"       :true,
						"aTargets"          :[2]
				},
	<?php

	$td_col=0;

	if($info_content['bool_active']['category']){

		?>
					{
					"sSortDataType"     :"dom-div",
							"bSearchable"       :true,
							"aTargets"          :[3]
					},
		<?php

	}
	else
		$td_col++;

	if($info_content['bool_active']['quantity']){

		?>
					{
					"sSortDataType"     :"dom-div",
							"sType"             :"numeric",
							"bSearchable"       :false,
							"aTargets"          :[<?php echo 4 - $td_col ?>]
					},
		<?php

	}
	else
		$td_col++;

	if($info_content['bool_active']['prominent']){

		?>
					{
					"sSortDataType"     :"dom-div-public",
							"bSearchable"       :false,
							"aTargets"          :[<?php echo 5 - $td_col ?>]
					},
		<?php

	}
	else
		$td_col++;

	?>
				{
				"sSortDataType"     :"dom-div-public",
						"bSearchable"       :false,
						"aTargets"          :[<?php echo 6 - $td_col ?>]
				},
				{
				"sSortDataType"     :"dom-div",
						"sType"             :"numeric",
						"bSearchable"       :false,
						"aTargets"          :[<?php echo 7 - $td_col ?>]
				},
				{
				"bSearchable"       :false,
						"bSortable"         :false,
						"aTargets"          :[<?php echo 8 - $td_col ?>]
				},
				{
				"bSearchable"       :false,
						"bSortable"         :false,
						"aTargets"          :[<?php echo 9 - $td_col ?>]
				},
				{
				"bSearchable"       :false,
						"bSortable"         :false,
						"aTargets"          :[<?php echo 10 - $td_col ?>]
				}
				]
				$$("#data_tables_sort").data_table_custom({"aaSorting":[[1,"asc"]]});
		});
	</script> 

	<div id="content">

		<div class="title_admin_body">
			<div class="title_admin_body_left">
				<div class="title_admin_body_right">
					<div class="title_admin_content_left"><?php echo $title_function; ?></div>                
					<div class="title_admin_content_right">
						<div class="title_admin_content_right_1">
							<?php if($info_content['bool_active']['category']){ ?>

								<span><?php echo $info_content['product_control_filter']; ?></span>
								<select name="select_category_product" class="ajax_select_filter">
									<option value="all">&nbsp;&nbsp;&nbsp;<?php echo $info_content['option_select_all']; ?></option>
									<?php echo $category_product; ?>
								</select>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="function_admin_body">
			<div class="function_admin_body_left">
				<div class="function_admin_body_right">
					<?php echo ($authorization['add']) ? "<a class='add_all_admin_site' title='".$info_content['action_add']."' href='".base_url().ADMIN_DIR_VIRTUAL."/".element('menu_class',$sub_menu['add'],false)."/".element('sub_menu_function',$sub_menu['add'],false)."'>".$info_content['action_add']."</a>" : "<a class='alert_authorization_add add_all_admin_site' title='".$info_content['action_add']."' href='#' onclick='return false'>".$info_content['action_add']."</a>"

					?>
					<a class="<?php echo ($authorization['delete']) ? "delete_items_menu" : "alert_authorization_delete" ?> delete_all_admin_site" title="<?php echo $info_content['action_delete'] ?>"><?php echo $info_content['action_delete'] ?></a>
					<a class="<?php echo ($authorization['update']) ? "update_items_menu" : "alert_authorization_update" ?> update_all_admin_site" title="<?php echo $info_content['action_update'] ?>"><?php echo $info_content['action_update'] ?></a>
				</div>
			</div>
		</div>

		<div class="content_admin_body">
			<form name="form_manager_content" id="form_manager_content" action="" method="post">
				<input type="hidden" id="hidden_input_menu_class" value="<?php echo $info_content['active_menu_class']; ?>"/>
				<input type="hidden" id="hidden_input_update"        value="<?php echo element('menu_class',$sub_menu['update'],false)."/".element('sub_menu_function',$sub_menu['update'],false) ?>"/>
				<input type="hidden" id="hidden_input_authorization" value=""/>

				<table id="data_tables_sort" class="content_admin_body_table" cellspacing="0px" cellpadding="0px">
					<thead>
						<tr>
							<th width="35" class="right"><input type="checkbox" id="chkCheckAll"/></th>

							<th width="75"><?php echo $info_content['product_id'] ?></th>

							<th width="185"><?php echo $info_content['product_name'] ?></th>

							<?php if($info_content['bool_active']['category']){ ?>

								<th width="120"><?php echo $info_content['cate_name'] ?></th>
								<?php

							}

							if($info_content['bool_active']['quantity']){

								?>

								<th width="70"><?php echo $info_content['product_number'] ?></th>
								<?php

							}

							if($info_content['bool_active']['prominent']){

								?>

								<th width="55"><?php echo $info_content['product_prominent'] ?></th>
							<?php } ?>

							<th width="60"><?php echo $info_content['product_public'] ?></th>

							<th width="60"><?php echo $info_content['product_order'] ?></th>

							<th width="65"><?php echo $info_content['product_img'] ?></th>

							<th width="40" class="right"><?php echo $info_content['action_update'] ?></th>

							<th width="40" class="right"><?php echo $info_content['action_delete'] ?></th>
						</tr>
					</thead>

					<tfoot>
						<tr>
							<th class="right"></th>

							<th><?php echo $info_content['product_id'] ?></th>

							<th><?php echo $info_content['product_name'] ?></th>

							<?php if($info_content['bool_active']['category']){ ?>

								<th><?php echo $info_content['cate_name'] ?></th>
								<?php

							}

							if($info_content['bool_active']['quantity']){

								?>

								<th><?php echo $info_content['product_number'] ?></th>
								<?php

							}

							if($info_content['bool_active']['prominent']){

								?>

								<th><?php echo $info_content['product_prominent'] ?></th>
							<?php } ?>

							<th><?php echo $info_content['product_public'] ?></th>

							<th><?php echo $info_content['product_order'] ?></th>

							<th><?php echo $info_content['product_img'] ?></th>

							<th class="right"><?php echo $info_content['action_update'] ?></th>

							<th class="right"><?php echo $info_content['action_delete'] ?></th>
						</tr>
						</thead>

					<tbody>
						<?php

					}
					if(is_array($product)){

						for($i=0; $i < count($product); $i++){

							?>
							<tr class="gradeC">
								<td>
									<div align="center">
										<input type="checkbox" name="checkbox[<?php echo element('product_id',$product[$i],''); ?>]" class="chkCheck" id="check_<?php echo element('product_id',$product[$i],''); ?>" />
									</div>
								</td>

								<td>
									<div align="left" class="title_table_important">
										<a  title="<?php echo $info_content['product_buy'].custom_htmlspecialchars(element('product_buy',$product[$i],'')); ?>"><?php echo element('product_id',$product[$i],''); ?></a>
									</div>
								</td>

								<td>
									<div align="left" class="title_table_database">
										<a title="<?php echo ($info_content['bool_active']['price']) ? $info_content['product_price'].custom_htmlspecialchars(number_format(element('product_price',$product[$i],''))." VNĐ") : ""; ?>" href="<?php echo base_url()."detailproduct/".element('menu_class',$product[$i],'')."/".element('cate_alias',$product[$i],'')."/".element('product_alias',$product[$i],'')."/".element('product_id',$product[$i],'').URL_SUFFIX ?>" target="_blank" style="cursor:pointer;"><?php echo element('product_name',$product[$i],''); ?></a>
									</div>
								</td>

								<?php if($info_content['bool_active']['category']){ ?>
									<td>
										<div align="center">
											<?php echo element('cate_name',$product[$i],''); ?>
										</div>
									</td>
									<?php

								}

								if($info_content['bool_active']['quantity']){

									?>
									<td>
										<div align="center">
											<?php echo number_format(element('product_number',$product[$i],'')); ?>
										</div>
									</td>
									<?php

								}

								if($info_content['bool_active']['prominent']){

									?>

									<td>
										<?php

										$prominent=(element('product_prominent',$product[$i],'') == 1) ? "ajax_prominent_yes" : "ajax_prominent_no";
										echo ($authorization['update']) ? "<div align='center' class='".$prominent." ajax_update_prominent' update_prominent_param='".element('product_id',$product[$i],'')."' >&nbsp;</div> " : "<div align='center' class='".$prominent."' >&nbsp;</div>";

										?>
									</td>
								<?php } ?>

								<td>
									<?php

									$public=(element('product_public',$product[$i],'') == 1) ? "ajax_public_yes" : "ajax_public_no";
									echo ($authorization['update']) ? "<div align='center' class='".$public." ajax_update_public' update_public_param='".element('product_id',$product[$i],'')."' >&nbsp;</div> " : "<div align='center' class='".$public."' >&nbsp;</div>";

									?>
								</td>

								<td>
									<?php

									echo ($authorization['update']) ? "<div align='center' class='ajax_update_order_input' update_order_param='".element('product_id',$product[$i],'')."' >".element('product_order',$product[$i],'')."</div> " : "<div align='center'>".element('product_order',$product[$i],'')."</div>";

									?>
								</td>

								<td>
									<div align="center">
										<?php

										$arr_product_img=@unserialize(element('product_img',$product[$i],array()));
										if(is_array($arr_product_img) && (!empty($arr_product_img))){
											$j=0;
											foreach($arr_product_img as $key=> $value){

												?>
												<a class="lightbox_admin" <?php echo ($j != 0) ? "style='display:none'" : "" ?> rel="<?php echo element('product_id',$product[$i],'') ?>" href="<?php echo base_src_img($value); ?>">
													<img alt="<?php echo custom_htmlspecialchars(element('product_name',$product[$i],'')) ?>"  src="<?php echo base_src_img($value); ?>"/>
												</a>
												<?php

												$j++;
											}
										}
										else{

											?>
											<a class="lightbox_admin"  rel="<?php echo element('product_id',$product[$i],'') ?>" href="<?php echo base_src_img(''); ?>">
												<img alt="<?php echo custom_htmlspecialchars(element('product_name',$product[$i],'')) ?>" src="<?php echo base_src_img(''); ?>"/>
											</a>
											<?php

										}

										?>
									</div>
								</td>

								<td>
									<div align="center">
										<a class="<?php echo ($authorization['update']) ? "" : "alert_authorization_update" ?>" title="<?php echo $info_content['action_update'] ?>" href="<?php echo ($authorization['update']) ? base_url().ADMIN_DIR_VIRTUAL."/".element('menu_class',$sub_menu['update'],false)."/".element('sub_menu_function',$sub_menu['update'],false)."/".element('product_id',$product[$i],'') : "#"; ?>">
											<img alt="update" width="18" height="18" src="<?php echo base_url().ADMIN_DIR_TEMPLATE; ?>images/action/update.png"/>
										</a>
									</div>
								</td>

								<td>
									<div align="center">
										<a delete_param="<?php echo element('product_id',$product[$i],'') ?>" class="<?php echo ($authorization['delete']) ? "ajax_delete_item" : "alert_authorization_delete" ?>" title="<?php echo $info_content['action_delete'] ?>">
											<img alt="delete" width="18" height="18" src="<?php echo base_url().ADMIN_DIR_TEMPLATE; ?>images/action/delete.png"/>
										</a>
									</div>
								</td>

							</tr>
							<?php

						}
					}
					if(!$info_content['ajax_show_manager']){

						?>        
					</tbody>
				</table>
			</form>
		</div>

		<div class="function_admin_body">
			<div class="function_admin_body_left">
				<div class="function_admin_body_right">
					<?php echo ($authorization['add']) ? "<a class='add_all_admin_site' title='".$info_content['action_add']."' href='".base_url().ADMIN_DIR_VIRTUAL."/".element('menu_class',$sub_menu['add'],false)."/".element('sub_menu_function',$sub_menu['add'],false)."'>".$info_content['action_add']."</a>" : "<a class='alert_authorization_add add_all_admin_site' title='".$info_content['action_add']."' href='#' onclick='return false'>".$info_content['action_add']."</a>"

					?>
					<a class="<?php echo ($authorization['delete']) ? "delete_items_menu" : "alert_authorization_delete" ?> delete_all_admin_site" title="<?php echo $info_content['action_delete'] ?>"><?php echo $info_content['action_delete'] ?></a>
					<a class="<?php echo ($authorization['update']) ? "update_items_menu" : "alert_authorization_update" ?> update_all_admin_site" title="<?php echo $info_content['action_update'] ?>"><?php echo $info_content['action_update'] ?></a>
				</div>
			</div>
		</div>
	</div>
	<?php

	echo $info_content['message_session_flash'];
	echo $this->session->flashdata('add_update_product');
}

?>