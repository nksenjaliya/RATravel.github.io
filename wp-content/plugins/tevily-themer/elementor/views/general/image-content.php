<?php
  use Elementor\Group_Control_Image_Size;
  use Elementor\Icons_Manager;

  $settings = $this->get_settings_for_display();
  $skin = $settings['style'];
  $title_text = $settings['title_text'];
  $description_text = $settings['description_text'];
  $this->add_render_attribute( 'block', 'class', [ 'gsc-image-content', $settings['style'] ] );
  $header_tag = 'h2';
	
  $this->add_render_attribute( 'title_text', 'class', 'title' );
  $this->add_render_attribute( 'description_text', 'class', 'desc' );


  $this->add_inline_editing_attributes( 'title_text', 'none' );
  $this->add_inline_editing_attributes( 'description_text' );

?>
		
	<?php if($skin == 'skin-v1'){ ?>
		<div <?php echo $this->get_render_attribute_string( 'block' ) ?>>
		  
		 	<?php if (!empty($settings['image']['url'])) : ?>
				<div class="image">
					<?php
						$image_html = Group_Control_Image_Size::get_attachment_image_html($settings, 'image');
						echo $image_html;
					?>
				</div>
		 	<?php endif; ?>

			<?php if( !empty($settings['title_text']) && !empty($settings['subtitle_text']) ) : ?>
				<div class="box-content">
					<?php 
						if($settings['subtitle_text']){ 
							echo '<div class="sub-title">' . $settings['subtitle_text'] . '</div>';
						}
						if($title_text){ 
						  echo '<' . esc_attr($header_tag) . ' ' . $this->get_render_attribute_string( 'title_text' ) . '>';
							 echo '<span>' . $title_text . '</span>';
						  echo '</' . esc_attr($header_tag) .'>';
						}
					?>   
				</div>
			<?php endif; ?>

			<?php 
				 $has_icon = ! empty( $settings['selected_icon']['value']);
			?>
			
			<div class="icon_box_content">
				<div class="content-inner">
					<?php if($has_icon){ ?>
						<div class="ib-icon">
	                  <?php Icons_Manager::render_icon( $settings['selected_icon'], [ 'aria-hidden' => 'true' ] ); ?>
	               </div>
					<?php } ?>
					<div class="ib-content">
						<?php if($settings['icon_box_title']){ ?>
							<h3 class="title"><?php echo esc_html($settings['icon_box_title']) ?></h3>
						<?php } ?>
						<?php if($settings['icon_box_desc']){ ?>
							<div class="desc"><?php echo esc_html($settings['icon_box_desc']) ?></div>
						<?php } ?>
					</div>
				</div>
			</div>

			<?php $this->gva_render_link_overlay($settings['link']); ?>
		</div>
	<?php } ?>  
	 

	<?php if($skin == 'skin-v2'){ ?>
		<div <?php echo $this->get_render_attribute_string( 'block' ) ?>>
			<?php if (!empty($settings['image']['url'])) : ?>
				<div class="image">
					<?php
						$image_html = Group_Control_Image_Size::get_attachment_image_html($settings, 'image');
						echo $image_html;
					?>
				</div>
			<?php endif; ?>
			<div class="box-content">
				<?php if($title_text){ ?>
					<<?php echo esc_attr($header_tag) ?> <?php echo $this->get_render_attribute_string( 'title_text' ); ?>>
						<?php echo $title_text; ?>
					</<?php echo esc_attr($header_tag) ?>>
				<?php } ?>
				
				<?php if(!empty($settings['link']['url'])){ ?>
					<?php 
					$this->gva_render_link_html($settings['link_text'], $settings['link'], 'btn-white');
					?>
				<?php } ?>
			</div>  
		</div>
	<?php } ?> 

	<?php if($skin == 'skin-v3'){ ?>
		<div <?php echo $this->get_render_attribute_string( 'block' ) ?>>
			<?php if (!empty($settings['image']['url'])) : ?>
				<div class="image">
					<?php
					  $image_html = Group_Control_Image_Size::get_attachment_image_html($settings, 'image');
					  $this->gva_render_link_html($image_html, $settings['link']);
					?>
				</div>
			<?php endif; ?>
			<div class="shape-1"></div>
			<div class="shape-2"></div>
		</div>
<?php } ?>

<?php if($skin == 'skin-v4'){ ?>
  <div <?php echo $this->get_render_attribute_string( 'block' ) ?>>
	 <?php if (!empty($settings['image']['url'])) : ?>
		<div class="image">
			 <?php
				$image_html = Group_Control_Image_Size::get_attachment_image_html($settings, 'image');
				$this->gva_render_link_html($image_html, $settings['link']);
			 ?>
		</div>
	 <?php endif; ?>
	 <div class="box-content">
		<div class="content-inner">
			<?php if($title_text){ ?>
				<<?php echo esc_attr($header_tag) ?> <?php echo $this->get_render_attribute_string( 'title_text' ); ?>>
					<?php $this->gva_render_link_html($title_text, $settings['link']); ?>
				</<?php echo esc_attr($header_tag) ?>>
			<?php } ?>
			<div <?php echo $this->get_render_attribute_string( 'description_text' ); ?>><?php echo wp_kses($description_text, true); ?></div>
			<?php if(!empty($settings['link']['url'])){ ?>
			  <div class="read-more">
				 <?php $this->gva_render_link_html('<span>' . esc_html__( 'Read More', 'tevily-themer' ) . '</span>', $settings['link'], 'btn-inline'); ?>
			  </div>
			<?php } ?>
		</div>	
	 </div>  
  </div>
<?php } ?> 

<?php if($skin == 'skin-v5'){ ?>
	<div <?php echo $this->get_render_attribute_string( 'block' ) ?>>
	  
	  <?php if (!empty($settings['image']['url'])) : ?>
		 <div class="image">
			<?php 
			  $image_url = $settings['image']['url']; 
			  $image_html = '<img src="' . esc_url($image_url) .'" alt="'. esc_attr($settings['title_text']) . '" />';
			  $this->gva_render_link_html($image_html, $settings['link']);
			?>  
		 </div>
	  <?php endif; ?>

	  <?php if (!empty($settings['image_second']['url'])) : ?>
		 <div class="image-second">
			<div class="line-color"></div>
			<div class="image-second-inner">
			  <?php 
				 $image_url_second = $settings['image_second']['url']; 
				 $image_html = '<img src="' . esc_url($image_url_second) .'" alt="'. esc_attr($settings['title_text']) . '" />';
				 $this->gva_render_link_html($image_html, $settings['link']); 
			  ?>  
			</div>  
		 </div>
	  <?php endif; ?>

	</div>
<?php } ?>  

<?php if($skin == 'skin-v6'){ ?>
  <div <?php echo $this->get_render_attribute_string( 'block' ) ?>>
	 <div class="box-content">
		<div class="content-inner">
			<?php if($title_text){ ?>
				<<?php echo esc_attr($header_tag) ?> <?php echo $this->get_render_attribute_string( 'title_text' ); ?>>
					<?php $this->gva_render_link_html($title_text, $settings['link']); ?>
				</<?php echo esc_attr($header_tag) ?>>
			<?php } ?>
			<div <?php echo $this->get_render_attribute_string( 'description_text' ); ?>><?php echo wp_kses($description_text, true); ?></div>
			<?php if(!empty($settings['link']['url'])){ ?>
			  <div class="read-more">
				 <?php $this->gva_render_link_html('<span>' . esc_html__( 'Read More', 'tevily-themer' ) . '</span>', $settings['link'], 'btn-white'); ?>
			  </div>
			<?php } ?>
		</div>
		<?php if(!empty($settings['image']['url'])){ ?>
			<span class="bg-image" style="background-image:url('<?php echo $settings['image']['url']; ?>')"></span>
		<?php } ?>
	 </div>  
  </div>
<?php } ?> 

<?php if($skin == 'skin-v7'){ ?>
  <div <?php echo $this->get_render_attribute_string( 'block' ) ?>>
	 <?php if (!empty($settings['image']['url'])) : ?>
		<div class="image">
			 <?php
				$image_html = Group_Control_Image_Size::get_attachment_image_html($settings, 'image');
				$this->gva_render_link_html($image_html, $settings['link']);
			 ?>
		</div>
	 <?php endif; ?>
	 <div class="box-content">
		<?php if($title_text){ ?>
			<<?php echo esc_attr($header_tag) ?> <?php echo $this->get_render_attribute_string( 'title_text' ); ?>>
				<?php $this->gva_render_link_html($title_text, $settings['link']); ?>
			</<?php echo esc_attr($header_tag) ?>>
		<?php } ?>
		<div <?php echo $this->get_render_attribute_string( 'description_text' ); ?>><?php echo wp_kses($description_text, true); ?></div>
		<?php if(!empty($settings['link']['url'])){ ?>
		  <div class="read-more">
			 <?php $this->gva_render_link_html('<span>' . $settings['link_text'] . '</span>', $settings['link'], 'btn-inline'); ?>
		  </div>
		<?php } ?>
	 </div>  
  </div>
<?php } ?> 