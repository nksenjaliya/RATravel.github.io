<?php
if(!defined('ABSPATH')){ exit; }

use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Image_Size;
use Elementor\Repeater;

class GVAElement_Team extends GVAElement_Base{

   const NAME = 'gva-team';
   const TEMPLATE = 'general/team/';
   const CATEGORY = 'tevily_general';

   public function get_name() {
      return self::NAME;
   }

   public function get_categories() {
      return array(self::CATEGORY);
   }

    
   public function get_title() {
      return __('Team', 'tevily-themer');
   }

   public function get_keywords() {
      return [ 'team', 'meet', 'carousel', 'grid' ];
   }

   public function get_script_depends() {
      return [
         'swiper',
         'gavias.elements',
      ];
   }

   public function get_style_depends() {
      return array('swiper');
   }

   protected function register_controls() {
      $this->start_controls_section(
         'section_content',
         [
            'label' => __('Content', 'tevily-themer'),
         ]
      );

      $repeater = new Repeater();

      $repeater->add_control(
         'image',
         [
            'label'      => __('Choose Image', 'tevily-themer'),
            'default'    => [
               'url' => GAVIAS_TEVILY_PLUGIN_URL . 'elementor/assets/images/team-1.jpg',
            ],
            'type'       => Controls_Manager::MEDIA,
            'show_label' => false,
         ]
      );
      $repeater->add_control(
         'name',
         [
            'label'       => __('Name', 'tevily-themer'),
            'type'        => Controls_Manager::TEXT,
            'label_block' => true,
         ]
      );
      $repeater->add_control(
         'position',
         [
            'label'       => __('Position', 'tevily-themer'),
            'type'        => Controls_Manager::TEXT,
            'label_block' => true,
         ]
      );
      $repeater->add_control(
         'link',
         [
            'label'      => __('Link', 'tevily-themer'),
            'placeholder' => __( 'https://your-link.com', 'tevily-themer' ),
            'type'       => Controls_Manager::URL,
         ]
      );
      $repeater->add_control(
         'facebook',
         [
            'label'      => __('Facebook Link', 'tevily-themer'),
            'type'       => Controls_Manager::URL,
         ]
      );

      $repeater->add_control(
         'twitter',
         [
            'label'      => __('Twitter Link', 'tevily-themer'),
            'type'       => Controls_Manager::URL,
         ]
      );
      $repeater->add_control(
         'instagram',
         [
            'label'      => __('Instagram Link', 'tevily-themer'),
            'type'       => Controls_Manager::URL,
         ]
      );
      $repeater->add_control(
         'pinterest',
         [
            'label'      => __('Pinterest Link', 'tevily-themer'),
            'type'       => Controls_Manager::URL,
         ]
      );

      $this->add_control(
         'team_content',
         [
            'label'       => __('Team Content Item', 'tevily-themer'),
            'type'        => Controls_Manager::REPEATER,
            'fields'      => $repeater->get_controls(),
            'title_field' => '{{{ name }}}',
            'default'     => array(
               array(
                  'name'         => esc_html__('Jessica Brown', 'tevily-themer'),
                  'position'     => esc_html__('Consultant', 'tevily-themer'),
                  'image'  => [
                     'url' => GAVIAS_TEVILY_PLUGIN_URL . 'elementor/assets/images/team-1.jpg',
                  ],
                  'facebook'     => ['url' => '#'],
                  'twitter'      => ['url' => '#'],
                  'instagram'    => ['url' => '#'],
                  'pinterest'    => ['url' => '#']
               ),
               array(
                  'name'  => esc_html__('Yoni Albert', 'tevily-themer'),
                  'position'     => esc_html__('Consultant', 'tevily-themer'),
                  'image'  => [
                     'url' => GAVIAS_TEVILY_PLUGIN_URL . 'elementor/assets/images/team-2.jpg',
                  ],
                  'facebook'     => ['url' => '#'],
                  'twitter'      => ['url' => '#'],
                  'instagram'    => ['url' => '#'],
                  'pinterest'    => ['url' => '#']
               ),
               array(
                  'name'  => esc_html__('Christine Eve', 'tevily-themer'),
                  'position'     => esc_html__('Consultant', 'tevily-themer'),
                  'image'  => [
                     'url' => GAVIAS_TEVILY_PLUGIN_URL . 'elementor/assets/images/team-3.jpg',
                  ],
                  'facebook'     => ['url' => '#'],
                  'twitter'      => ['url' => '#'],
                  'instagram'    => ['url' => '#'],
                  'pinterest'    => ['url' => '#']
               ),
               array(
                  'name'  => esc_html__('David Hardson', 'tevily-themer'),
                  'position'     => esc_html__('Consultant', 'tevily-themer'),
                  'image'  => [
                     'url' => GAVIAS_TEVILY_PLUGIN_URL . 'elementor/assets/images/team-4.jpg',
                  ],
                  'facebook'     => ['url' => '#'],
                  'twitter'      => ['url' => '#'],
                  'instagram'    => ['url' => '#'],
                  'pinterest'    => ['url' => '#']
               ),
               array(
                  'name'  => esc_html__('Fred Andrew', 'tevily-themer'),
                  'position'     => esc_html__('Consultant', 'tevily-themer'),
                  'image'  => [
                     'url' => GAVIAS_TEVILY_PLUGIN_URL . 'elementor/assets/images/team-5.jpg',
                  ],
                  'facebook'     => ['url' => '#'],
                  'twitter'      => ['url' => '#'],
                  'instagram'    => ['url' => '#'],
                  'pinterest'    => ['url' => '#']
               ),
               array(
                  'name'  => esc_html__('Sarah Rose', 'tevily-themer'),
                  'position'     => esc_html__('Consultant', 'tevily-themer'),
                  'image'  => [
                     'url' => GAVIAS_TEVILY_PLUGIN_URL . 'elementor/assets/images/team-6.jpg',
                  ],
                  'facebook'     => ['url' => '#'],
                  'twitter'      => ['url' => '#'],
                  'instagram'    => ['url' => '#'],
                  'pinterest'    => ['url' => '#']
               ),
            ),
         ]
      );

      $this->add_control(
         'layout',
         [
            'label'   => __( 'Layout Display', 'tevily-themer' ),
            'type'    => Controls_Manager::SELECT,
            'default' => 'grid',
            'options' => [
               'grid'      => __( 'Grid', 'tevily-themer' ),
               'carousel'  => __( 'Carousel', 'tevily-themer' )
            ]
         ]
      );
       $this->add_control(
         'image_size',
         [
            'label'   => __( 'Image Size', 'tevily-themer' ),
            'type'    => Controls_Manager::SELECT,
            'default' => 'full',
            'options' => $this->get_thumbnail_size()
         ]
      );
        
      $this->end_controls_section();

      $this->add_control_carousel(false, array('layout' => 'carousel'));

      $this->add_control_grid(array('layout' => 'grid'));

   }

   protected function render(){
      $settings = $this->get_settings_for_display();
      printf('<div class="gva-element-%s gva-element">', $this->get_name());
      if(!empty($settings['layout'])){
         include $this->get_template(self::TEMPLATE . $settings['layout'] . '.php');
      }
      print '</div>';
   }

}

$widgets_manager->register(new GVAElement_Team());
