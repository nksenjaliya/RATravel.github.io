<?php
$_rand      = wp_rand(5);
$thumbnail  = isset($settings['image_size']) && $settings['image_size'] ? $settings['image_size'] : 'tevily_medium';
$post_id    = $post['ID'];
$ba_post    = BABE_Post_types::get_post($post_id);
$url        = BABE_Functions::get_page_url_with_args($post_id, $_GET);
$image      = wp_get_attachment_image_src(get_post_thumbnail_id($post_id), $thumbnail);
if ( !isset($ba_post['discount_price_from']) || !isset($ba_post['price_from']) || !isset($ba_post['discount_date_to']) || !isset($ba_post['discount']) ) {
   $prices = BABE_Post_types::get_post_price_from($post_id);
} else {
   $prices = $ba_post;
}

?>

<div class="booking-block-2 ba-block-item">
   <div class="babe-block-content">
      
      <div class="post-image">
         <?php if(has_post_thumbnail($post_id)){ ?>
            <a class="post-link" href="<?php echo esc_url($url) ?>">
               <img src="<?php echo esc_url($image[0]) ?>" alt="<?php echo esc_attr( $post['post_title'] ) ?>">
            </a>
         <?php } ?>  

         <?php 
            $discount = isset($post['discount']) && $post['discount'] ? $post['discount'] : false;
            $featured = isset($ba_post['tevily_booking_featured'] ) ? $ba_post['tevily_booking_featured'] : false;
            if($discount || $featured){
               echo '<div class="item-labels">';
                  if($discount){
                     echo '<span class="item-label item-discount">' . esc_html($discount) . '% ' . esc_html__( 'off', 'tevily' ) . '</span>';
                  }
                  if($featured){
                     echo '<span class="item-label item-featured">' . esc_html__( 'Featured', 'tevily' ) . '</span>';
                  }
               echo '</div>';   
            }
         ?>

         <?php if(class_exists('Tevily_Addons_Wishlist_Ajax')){ 
            echo Tevily_Addons_Wishlist_Ajax::html_icon($post_id);
         } ?>

      </div>

        <div class="booking-content">
            <div class="content-inner">
               
               <div class="content-top">
                  <?php echo BABE_Rating::post_stars_rendering($post_id); ?>

                  <?php 
                  $images = isset($ba_post['images']) && $ba_post['images'] ? $ba_post['images'] : false;
                  $video  = isset($ba_post['tevily_booking_video']) ? $ba_post['tevily_booking_video'] : false;
                  if($video || $images): ?>
                     <div class="ba-media">

                        <?php if($images){
                           $i = 1;
                           foreach($images as $image){ 
                              $classes = ($i>1) ? 'hidden' : 'ba-gallery';
                              if( isset(wp_get_attachment_image_src($image['image_id'], 'full')[0]) ){ ?>
                                 <a class="<?php echo esc_attr($classes) ?>" href="<?php echo esc_url(wp_get_attachment_image_src($image['image_id'], 'full')[0]) ?>" data-elementor-lightbox-slideshow="<?php echo esc_attr($_rand) ?>">
                                    <?php 
                                       if($i == 1){
                                          echo '<i class="las la-camera"></i>';
                                          echo '<span>' . count($images) . '</span>';
                                       }
                                    ?>
                                 </a>
                              <?php }  
                              $i = $i + 1;
                           }
                        } ?>

                        <?php if($video){ ?>
                           <a class="ba-video popup-video" href="<?php echo esc_url($video) ?>"><i class="las la-video"></i></a>
                        <?php } ?>

                     </div>
                  <?php endif; ?>
               </div>

               <h3 class="title">
                  <a href="<?php echo esc_url( $url ); ?>"><?php echo apply_filters( 'translate_text', $post['post_title'] ); ?></a>
               </h3>
               
               <?php 
                  $address = isset($ba_post['address']) ? $ba_post['address'] : false;
                  if($address){ ?>
                  <div class="ba-address">
                     <i class="fas fa-map-marker-alt"></i><span><?php echo esc_html( $address['address'] ); ?></span>
                  </div>
               <?php } ?>

               <div class="ba-price">
                  <label><?php echo esc_html__('From', 'tevily'); ?></label>
                  <span class="item_info_price_new"><?php echo BABE_Currency::get_currency_price($prices['discount_price_from']); ?></span>
                  <?php if($prices['discount_price_from'] < $prices['price_from']){ ?>
                     <span class="item_info_price_old"><?php echo BABE_Currency::get_currency_price($prices['price_from'])  ?></span>
                  <?php } ?>
               </div>
            </div>   

            <div class="ba-meta">
               <div class="meta-left">
                  <?php
                     $av_times = BABE_Post_types::get_post_av_times($ba_post);
                     $guests   = isset($ba_post['guests']) ? $ba_post['guests'] : false;
                     if (!empty( $av_times)){
                        echo '<span class="item-days item-meta"><i class="las la-clock"></i><span>' . BABE_Post_types::get_post_duration($ba_post) . '</span></span>';
                     }
                     if ($guests){
                        echo '<span class="item-user item-meta"><i class="las la-user-friends"></i><span>' . $guests . '</span></span>';
                     }
                  ?>
               </div>
               <div class="meta-right">
                  <a href="<?php echo the_permalink($post_id) ?>"><?php echo esc_html__('Explore', 'tevily') ?></a>
               </div>   
            </div>

        </div>
    </div>
</div>