<?php
/**
 *
 * @author     Gaviasthemes Team     
 * @copyright  Copyright (C) 2021 gaviasthemes. All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 * 
 */
	get_header(); 
?>

<section id="wp-main-content" class="clearfix main-page">
	<?php do_action('tevily_before_page_content'); ?>
	<div class="main-page-content">
		<div class="content-page">      
			<div id="wp-content" class="wp-content clearfix">
				<?php 
					if(class_exists('GVA_Layout_Frontend')){
						do_action('tevily/layouts/archive/post');
					}else{
						get_template_part('templates/blog/archive');
					}
				?>
			</div>    
		</div>      
	</div>   
	<?php do_action('tevily_after_page_content'); ?>
</section>

<?php get_footer(); ?>

