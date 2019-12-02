<?php

/* * ***************************************************************************

  Ghi chú:hoàn thành ngày 28-07-2015
  Copyright :Hồ Minh Trí

 * ************************************************************************** */

if(!defined('BASEPATH'))
	exit('No direct script access allowed');

?>
<div class="header_banner_left">
	<?php echo $banner; ?>
</div>
<div class="header_banner_right">
    <!--Begin Div Language -->
	<?php $this->load->view($template_view_language,$data_language); ?>
    <!--End Div Language -->
	<?php

	if(is_array($menu) && !empty($menu)){

		?>
		<div class="header_menu_sub">
			<ul>
				<?php

				$i=0;
				foreach($menu as $key=> $value){
					$string_class=($i === 0) ? "class='first'" : "";

					?>
					<li <?php echo $string_class; ?>>
						<a title="<?php echo custom_htmlspecialchars(element('menu_name',$value,'')); ?>" href="<?php echo element('menu_url',$value,'#') ?>"><?php echo element('menu_name',$value,''); ?></a>
					</li>
					<?php

					$i++;
				}

				?>    
			</ul>
		</div>
		<?php

	}

	?>

    <div class="header_social">
        <div id="share_link_header" class="addthis_toolbox addthis_default_style">
            <a class="addthis_button_facebook"></a>
            <a class="addthis_button_zingme"></a>
            <a class="addthis_button_twitter"></a>
            <a class="addthis_button_favorites"></a>
            <a class="addthis_button_google"></a>
        </div>
    </div>
</div>