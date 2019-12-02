<?php
/* * *****************************************************************************

  Ghi chú:hoàn thành ngày 29-07-2015
  Copyright :Hồ Minh Trí

 * ***************************************************************************** */

if(!defined('BASEPATH'))
    exit('No direct script access allowed');
?>
<div class="title_order_detail"><?php echo $info_content['info_order_detail'];?></div>
<div class="customer_info_order">
    <ul>
        <li class="clear"><label><?php echo $info_content['order_id']?></label>:&nbsp;<span style="color:#F00;font-size:14px;"><?php echo element('order_id',$order,'')?></span></li>
        <li><label><?php echo $info_content['order_name']?></label>&nbsp;:&nbsp;<span><?php echo element('order_name',$order,'');?></span></li>
        <li class="clear"><label><?php echo $info_content['order_phone']?></label>&nbsp;:&nbsp;<span><?php echo element('order_phone',$order,'');?></span></li>
        <li><label><?php echo $info_content['order_email']?></label>&nbsp;:&nbsp;<span><a title="<?php echo custom_htmlspecialchars(element('order_email',$order,''));?>" href="mailto:<?php echo element('order_email',$order,'');?>"><?php echo element('order_email',$order,'');?></a></span></li>
        <li class="clear"><label><?php echo $info_content['delivery_name']?></label>&nbsp;:&nbsp;<span><?php echo element('delivery_name',$order,'');?></span></li>
        <li><label><?php echo $info_content['payment_name']?></label>&nbsp;:&nbsp;<span><?php echo element('payment_name',$order,'');?></span></li>
        <li class="clear"><label><?php echo $info_content['order_create_date']?></label>&nbsp;:&nbsp;<span><?php echo date("d-m-Y H:i:s",strtotime(element('order_create_date',$order,'')));?></span></li>
        <li><label><?php echo $info_content['order_update_date']?></label>&nbsp;:&nbsp;<span><?php echo date("d-m-Y H:i:s",strtotime(element('order_update_date',$order,'')));?></span></li>
        <li class="clear"><label><?php echo $info_content['order_address']?></label>&nbsp;:&nbsp;<span><?php echo element('order_address',$order,'');?></span></li>
        <li><label><?php echo $info_content['cate_name_order']?></label>&nbsp;:&nbsp;<span><?php echo element('cate_name',$order,'');?></span></li>
    </ul>
</div>
<div class="add_product_into_order" insert_param="<?php echo element('order_id',$order,'')?>">&nbsp;</div>
<div class="product_info_order">
    <table class="table_order_detail" cellspacing="0px" cellpadding="0px">
        <thead>
            <tr>                               
                <th width="30">TT</th>

                <th width="80"><?php echo $info_content['order_detail_code']?></th>

                <th width="250"><?php echo $info_content['order_detail_name']?></th>  

                <th width="140"><?php echo $info_content['order_detail_price']?></th>

                <th width="80"><?php echo $info_content['order_detail_number']?></th>

                <th width="190"><?php echo $info_content['order_detail_total_price']?></th>

                <th width="40"><?php echo $info_content['action_delete']?></th>
            </tr>
        </thead>

        <tbody>
            <?php
            if(is_array($order_detail)){

                for($i=0; $i < count($order_detail); $i++){
                    ?>
                    <tr>
                        <td>
                            <div align="center">
                                <?php echo $i + 1;?>
                            </div>
                        </td>

                        <td>
                            <div align="center">
                                <?php echo element('order_detail_code',$order_detail[$i],'');?>
                            </div>
                        </td>

                        <td>
                            <div align="left" >
                                <?php
                                echo element('order_detail_name',$order_detail[$i],'');

                                if(element('order_detail_color',$order_detail[$i],'') != ''){
                                    ?>
                                    &nbsp;<b style="color:#DD2234;">(<?php echo element('order_detail_color',$order_detail[$i],'');?>)</b>
                                    <?php
                                }
                                ?>
                            </div>
                        </td>

                        <td>
                            <div align="center">
                                <?php echo number_format(element('order_detail_price',$order_detail[$i],'0'))." VNĐ";?>
                            </div>
                        </td>

                        <td>
                            <div align="center" class="ajax_update_order_detail_number_input" update_order_detail_number_param="<?php echo element('order_detail_id',$order_detail[$i],'')?>">
                                <?php echo element('order_detail_number',$order_detail[$i],'');?>
                            </div>
                        </td>

                        <td>
                            <div align="center" class="ajax_order_detail_total_price">
                                <?php echo number_format(element('order_detail_price',$order_detail[$i],'0') * (element('order_detail_number',$order_detail[$i],'')))." VNĐ";?>
                            </div>
                        </td>

                        <td>
                            <div align="center">
                                <a delete_param="<?php echo element('order_id',$order_detail[$i],'')."/".element('order_detail_id',$order_detail[$i],'')?>" class="ajax_delete_order_detail" title="<?php echo $info_content['action_delete']?>">
                                    <img alt="delete" width="18" height="18" src="<?php echo base_url().ADMIN_DIR_TEMPLATE;?>images/action/delete.png"/>
                                </a>
                            </div>
                        </td>
                    </tr>
                    <?php
                }
            }
            ?>      
        </tbody>
    </table>
</div>
<div class="total_price_order">
    <span><?php echo $info_content['order_total_price']?></span>
    <span class="total_price ajax_order_total_price"><?php echo number_format(element('order_total_price',$order,'0'))." VNĐ";?></span>  
</div>
