<?php
   if (!defined('ABSPATH')) {
      exit; 
   }
   global $tevily_post;
   if (!$tevily_post){
      return;
   }

   $title = $settings['title_text'];
   $posttags = get_the_tags($tevily_post->ID);
?>
   
<div class="post-tags">
   <?php 
      if($posttags){ 
         if($title){
            echo '<span class="title">' . esc_html($title) . ':</span>';
         }
         foreach($posttags as $tag){
            echo '<a href="' . esc_url(get_term_link($tag->term_id)) . '">';
               echo $tag->name;
            echo '</a>';
         }
      }
   ?>
</div>      

