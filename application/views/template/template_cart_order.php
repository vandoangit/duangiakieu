<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 27-07-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined("BASEPATH"))
	exit("No direct script access allowed");

?>
<fieldset>
    <legend style="margin-left:10px;padding:0px 5px;font-weight:bold;">Thông Tin Khách Hàng</legend>
    <ul style="list-style-type:none;padding:0px;line_height:25px;">
        <li style="clear:both;overflow:hidden;"><label style="width:75px;float:left;">Họ Tên:</label><span><?php echo $data_template["order_name"]; ?></span></li>
        <li style="clear:both;overflow:hidden;"><label style="width:75px;float:left;">Email:</label><span><?php echo $data_template["order_email"]; ?></span></li>
        <li style="clear:both;overflow:hidden;"><label style="width:75px;float:left;">Điện Thoại:</label><span><?php echo $data_template["order_phone"]; ?></span></li>
        <li style="clear:both;overflow:hidden;"><label style="width:75px;float:left;">Địa Chỉ:</label><span><?php echo $data_template["order_address"]; ?></span></li>
    </ul>
    <div style="padding-left:15px;line_height:25px;">
		<?php echo $data_template["order_content"]; ?>
    </div>
</fieldset>

<?php

if(isset($data_template["product"]) && is_array($data_template["product"]) && !empty($data_template["product"])){

	foreach($data_template["product"] as $key=> $value){

		?>
		<br/>
		<fieldset>
			<legend style="margin-left:10px;padding:0px 5px;font-weight:bold;"><?php echo element("product_name",$value,""); ?></legend>
			<ul style="list-style-type:none;padding:0px;line_height:25px;">
				<li style="clear:both;overflow:hidden;"><label style="width:105px;float:left;"><b>Mã Sản Phẩm:</b></label><span><b><?php echo element("product_id",$value,""); ?></b></span></li>
				<li style="clear:both;overflow:hidden;"><label style="width:105px;float:left;"><b>Tên Sản Phẩm:</b></label><span><b><?php echo element("product_name",$value,""); ?></b></span></li>
				<li style="clear:both;overflow:hidden;"><label style="width:105px;float:left;"><b>Giá Sản Phẩm:</b></label><span><b><?php echo number_format(element("cart_price",$value,0))." VNĐ"; ?></b></span></li>
				<li style="clear:both;overflow:hidden;"><label style="width:105px;float:left;"><b>Danh Mục:</b></label><span><b><?php echo element("cate_name",$value,""); ?></b></span></li>
				<li style="clear:both;overflow:hidden;"><label style="width:105px;float:left;"><b>Số Lượng:</b></label><span><b><?php echo element("cart_quantity",$value,""); ?></b></span></li>
				<?php if(element('product_color',$value['options'],'') != ''){ ?>
					<li style="clear:both;overflow:hidden;"><label style="width:105px;float:left;"><b>Màu Sắc:</b></label><span><b><?php echo element("product_color",$value["options"],""); ?></b></span></li>
				<?php } ?>

				<?php if(element('product_size',$value['options'],'') != ''){ ?>
					<li style="clear:both;overflow:hidden;"><label style="width:105px;float:left;"><b>Kích Thước:</b></label><span><b><?php echo element("product_size",$value["options"],""); ?></b></span></li>
				<?php } ?>
			</ul>

			<div style="padding-left:15px;line_height:25px;">
				<?php echo element("product_headline",$value,""); ?>
			</div>
		</fieldset>
		<?php

	}
}

?>