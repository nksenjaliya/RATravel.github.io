<?php
/**
 * $Desc
 *
 * @author     Gaviasthemes Team     
 * @copyright  Copyright (C) 2020 Gaviasthemes. All Rights Reserved.
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
               if (class_exists('Tribe__Events__Main') && (tribe_is_event() || tribe_is_event_category() || tribe_is_in_main_loop() || (function_exists('tec_is_view') && tec_is_view()) || 'tribe_events' == get_post_type() || is_singular( 'tribe_events' ))) {
                  get_template_part('/tribe-events/single');
               }elseif(is_archive('tribe_event')){
                  get_template_part('/tribe-events/archive');
               }else{
                  if(class_exists('GVA_Layout_Frontend')){
                     do_action('tevily/layouts/page');
                  }else{
                     get_template_part('templates/page/single');
                  }
               }
            ?>
         </div>    
      </div>      
   </div>   
   <?php do_action('tevily_after_page_content'); ?>
</section>

<?php get_footer(); ?>