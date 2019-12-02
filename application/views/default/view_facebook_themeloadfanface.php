<?php
/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 18-09-2014
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
    exit('No direct script access allowed');

if($url_fanface != ""){
    ?>
    <div class="fb-like-box" data-href="<?php echo $url_fanface;?>" data-width="974" data-height="400" data-colorscheme="light" data-show-faces="true" data-header="false" data-stream="false" data-show-border="false"></div>
    <?php
}
?>