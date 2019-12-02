<?php
/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 12-10-2014
  Copyright :Hồ Minh Trí

 * ************************************************************************** */
?>

<li class="remove_district">
    <label class="label_content_district"><?php echo $info_content['district_category'];?></label>
    <select name="txt_district_category" id="txt_district_category" class="validate[custom_select[-1]] select_text_district">
        <?php
        if(is_array($district) && !empty($district)){
            ?>
            <option value="-1"><?php echo "&nbsp;&nbsp;&nbsp;".$info_content['option_select'];?></option>
            <?php
            foreach($district as $key=> $value){
                ?>
                <option value="<?php echo element('district_name',$value,'');?>">&nbsp;&nbsp;&nbsp;&#187;&nbsp;<?php echo element('district_name',$value,'');?></option>
                <?php
            }
        }
        else{
            ?>
            <option value="-1"><?php echo "&nbsp;&nbsp;&nbsp;".$info_content['option_select'];?></option>
            <?php
        }
        ?>
    </select>
</li>