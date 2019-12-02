<?php
/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 02-08-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
    exit('No direct script access allowed');
?>
<div class="comment_page">
<?php
if(is_array($comment_product) && !empty($comment_product)){
?>    
    <div class="comment_content">
    <?php
    foreach($comment_product as $key=>$value){
    ?>
        <div class="comment_item">
            <div class="comment_item_top">
                <span class="comment_item_name"><a href="mailto:<?php echo custom_htmlspecialchars(element('comment_email',$value));?>" title="<?php echo custom_htmlspecialchars(element('comment_title',$value));?>"><?php echo element('comment_name',$value);?></a></span>
                <span class="comment_item_date"><?php echo date('d/m/Y H:i:s',strtotime(element('comment_create_date',$value)));?></span>
            </div>
            
            <div class="comment_item_bottom">
                <div class="border_top">
                    <div class="border_top_left">
                        <div class="border_top_right">&nbsp;</div>
                    </div>
                </div>
                
                <div class="border_middle">
                    <div class="border_middle_left">
                        <div class="border_middle_right">
                            <h2 class="comment_item_title"><?php echo element('comment_title',$value);?></h2>
                            <p class="comment_item_content"><?php echo element('comment_content',$value);?></p>
                            <p class="comment_item_email"><a href="mailto:<?php echo custom_htmlspecialchars(element('comment_email',$value));?>" title="<?php echo custom_htmlspecialchars(element('comment_title',$value));?>"><?php echo element('comment_email',$value);?></a></p>
                        </div>
                    </div>
                </div>
                
                <div class="border_bottom">
                    <div class="border_bottom_left">
                        <div class="border_bottom_right">&nbsp;</div>
                    </div>
                </div>
            </div>
        </div>    
    <?php
    }
    ?>       
    </div>
<?php
}
?>
    <div class="comment_form">
        
        <div class="comment_form_top">
            <h4><?php echo $info_content['info_comment']; ?></h4>
        </div>
        
        
        <div class="comment_form_message">
        <?php
        $arr_message_comment=$this->session->userdata('message_insert_comment');
        if(is_array($arr_message_comment) && !empty($arr_message_comment)){
        ?>
            <ul>
            <?php
            foreach($arr_message_comment as $key=>$value){
            ?>
                <li><?php echo $value; ?></li>
            <?php
            }
            ?>    
            </ul>
        <?php
        }
        ?> 
        </div>
        
        <?php
        if(!$this->session->userdata('message_comment'.$info_content['comment_product_news'])){
        ?>
        <form action="" method="post" name="form_comment" id="form_comment">
            <div class="comment_form_middle">     
                <ul class="ul_comment_form">
                    <li>
                        <input name="txt_comment_name"  id="txt_comment_name"  type="text" value="<?php echo set_value('txt_comment_name',$info_content['comment_name']); ?>" onfocus="if(this.value=='<?php echo $info_content['comment_name']; ?>')this.value=''" onblur="if(this.value=='')this.value='<?php echo $info_content['comment_name']; ?>'" class="input_comment"/>
                        <span class="space_comment_form">&nbsp;</span>
                        <input name="txt_comment_email" id="txt_comment_email" type="text" value="<?php echo set_value('txt_comment_email',$info_content['comment_email']); ?>" onfocus="if(this.value=='<?php echo $info_content['comment_email']; ?>')this.value=''" onblur="if(this.value=='')this.value='<?php echo $info_content['comment_email']; ?>'" class="input_comment"/>
                    </li>

                    <li>
                        <input name="txt_comment_title" id="txt_comment_title" type="text" value="<?php echo set_value('txt_comment_title',$info_content['comment_title']); ?>" onfocus="if(this.value=='<?php echo $info_content['comment_title']; ?>')this.value=''" onblur="if(this.value=='')this.value='<?php echo $info_content['comment_title']; ?>'" class="input_comment"/>
                        <span class="space_comment_form">&nbsp;</span>
                        <input name="txt_comment_captcha" id="txt_comment_captcha" type="text" value="<?php echo $info_content['comment_captcha'];?>" onfocus="if(this.value=='<?php echo $info_content['comment_captcha']; ?>')this.value=''" onblur="if(this.value=='')this.value='<?php echo $info_content['comment_captcha']; ?>'" class="input_comment_captcha"/>
                        <span id="ajax_captcha_comment">&nbsp;</span>
                    </li>

                    <li>
                        <textarea name="txt_comment_content" id="txt_comment_content" onfocus="if(this.value=='<?php echo $info_content['comment_content']; ?>')this.value=''" onblur="if(this.value=='')this.value='<?php echo $info_content['comment_content']; ?>'" class="textarea_comment" ><?php echo set_value('txt_comment_content',$info_content['comment_content']); ?></textarea>
                    </li>                                                
                </ul>
            </div>

            <div class="comment_form_button">
                <div class="comment_form_button_body">
                    <a id="button_submit_comment" param_id_product_news="<?php echo $info_content['comment_product_news']; ?>" class="button_comment" title="<?php echo $info_content['button_comment_send'];?>"><?php echo $info_content['button_comment_send'];?></a>
                    <a id="button_reset_comment" class="button_comment" title="<?php echo $info_content['button_comment_reset'];?>"><?php echo $info_content['button_comment_reset'];?></a>
                </div>
            </div>    
        </form>
        <?php
        }
        ?>
    </div>
</div>
<?php
$this->session->unset_userdata('message_insert_comment'); 
?>