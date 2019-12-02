<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 27-07-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined("BASEPATH"))
	exit("No direct script access allowed");

?>
<fieldset>
    <legend style="margin-left:10px;padding:0px 5px;font-weight:bold;">Thông Tin Người Gửi</legend>
    <ul style="list-style-type:none;padding:0px;line_height:25px;">
        <li style="clear:both;overflow:hidden;"><label style="width:75px;float:left;">Tổ Chức:</label><span><?php echo $data_template["contact_company"]; ?></span></li>
        <li style="clear:both;overflow:hidden;"><label style="width:75px;float:left;">Họ Tên:</label><span><?php echo $data_template["contact_name"]; ?></span></li>
        <li style="clear:both;overflow:hidden;"><label style="width:75px;float:left;">Email:</label><span><?php echo $data_template["contact_email"]; ?></span></li>
        <li style="clear:both;overflow:hidden;"><label style="width:75px;float:left;">Điện Thoại:</label><span><?php echo $data_template["contact_phone"]; ?></span></li>
        <li style="clear:both;overflow:hidden;"><label style="width:75px;float:left;">Địa Chỉ:</label><span><?php echo $data_template["contact_address"]; ?></span></li>
    </ul>
</fieldset>

<br/>
<fieldset>
    <legend style="margin-left:10px;padding:0px 5px;font-weight:bold;">Nội Dung Liên Hệ</legend>
    <p style="width:250px;text-decoration:underline;">Tiêu Đề: <b><?php echo $data_template['contact_header']; ?></b></p>
    <div style="padding-left:15px;line_height:25px;">
		<?php echo $data_template["contact_content"]; ?>
    </div>
</fieldset>