<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 02-08-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

if(is_array($language) && !empty($language)){

	?>
	<div id="language_default">
		<?php

		foreach($language as $key=> $value){

			?>
			<div class="item_language">
				<a title="<?php echo custom_htmlspecialchars(element("language_name",$value,'')) ?>" href="<?php echo base_url()."language/".element('language_id',$value,'').URL_SUFFIX ?>">
					<img alt="<?php echo custom_htmlspecialchars(element("language_name",$value,'')) ?>" src="<?php echo base_src_img(element("language_img",$value,'')) ?>"/>
				</a>
			</div>
			<?php

		}

		?>
	</div>
	<?php

}

?>