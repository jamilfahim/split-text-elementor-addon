<?php
namespace Jhfahim_Addon_Split_Text;

use Elementor\Widget_Base;
use Elementor\Repeater;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Elementor Hero Section Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Splite_Text_animation_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve oEmbed widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'Split-Text-Animation';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Hero Section widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Split Text Animation', 'jhfahim' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Hero Section widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-animation-text';
	}

	/**
	 * Get custom help URL.
	 *
	 * Retrieve a URL where the user can get more information about the widget.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget help URL.
	 */
	public function get_custom_help_url() {
		return 'https://developers.elementor.com/docs/widgets/';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the oEmbed widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'general' ];
	}

	/**
	 * Get widget keywords.
	 *
	 * Retrieve the list of keywords the oEmbed widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget keywords.
	 */
	public function get_keywords() {
		return [ 'Scroll Text Animation', 'url', 'link' ];
	}

	/**
	 * Register oEmbed widget controls.
	 *
	 * Add input fields to allow the user to customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {

		$this->start_controls_section(
			'dazzel-text-section',
			[
				'label' => esc_html__( 'Content', 'jhfahim' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'split_title',
			[
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'label' => esc_html__( 'Text', 'textdomain' ),
				'placeholder' => esc_html__( 'Enter your text', 'textdomain' ),
				'default' => esc_html__( 'Enter your text', 'textdomain' ),
			]
		);

      
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'label' => esc_html__( 'Typography', 'textdomain' ),
				'selector' => '{{WRAPPER}} .split-text .title',
			]
		);

		$this->add_control(
			'animation_effect',
			[
				'label' => esc_html__( 'Border Style', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'Reveal_From_Bottom',
				'options' => [
					'Reveal_From_Bottom' => esc_html__( 'Reveal From Bottom', 'textdomain' ),
					'Reveal_From_Top' =>  esc_html__('Reveal From Top', 'softtechit'),
					'Fade_From_Top' =>  esc_html__('Fade From Top', 'softtechit'),
					'Twist_From_Bottom'  =>  esc_html__('Twist From Bottom', 'softtechit'),
					'Twist_From_Top' => esc_html__('Twist From Top', 'softtechit'),
					'Reveal_Single_Letter_From_Bottom' => esc_html__('Reveal Single Letter From Bottom', 'softtechit'),
					'Reveal_Single_Letter_From_Top' =>  esc_html__('Reveal Single Letter From Top', 'softtechit'),
				],
				
			]
		);
		
		$this->add_control(
			'alignment',
			[
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'label' => esc_html__( 'Alignment', 'textdomain' ),
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'textdomain' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'textdomain' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'textdomain' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'center',
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}} .split-text .title' => 'text-align: {{VALUE}};',
				],
			]
		);

	
		$this->add_control(
			'content_color',
			[
				'label' => esc_html__( 'Text Color', 'elementor-list-widget' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#000',
				'selectors' => [
					'{{WRAPPER}} .split-text .title' => 'color: {{VALUE}};',
				],
			]
		);


		// $this->add_control(
		// 	'fill_speed',
		// 	[
		// 		'label' => esc_html__( 'Fill Speed', 'textdomain' ),
		// 		'type' => \Elementor\Controls_Manager::NUMBER,
		// 		'min' => 0,
		// 		'max' => 100,
		// 		'default' => 1,
		// 	]
		// );

		$this->end_controls_section();


	}

	/**
	 * Render oEmbed widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();
		$animation_text_content = $settings['split_title'];
		$animation_text_effect = $settings['animation_effect'];
		

	   $output = '';
		
            if( $animation_text_effect === 'Reveal_Single_Letter_From_Bottom'){
                $output .= '<div class="split-text">
                <h1 class="title p-5">'.$animation_text_content.'</h1>
              </div>';
              
            }elseif( $animation_text_effect === 'Reveal_From_Bottom'){
                $output .= '<div class="split-text">
                <h1 class="title p-3" >'.$animation_text_content.'</h1>
              </div>';
            
            }elseif( $animation_text_effect === 'Fade_From_Top'){
					$output .= '<div class="split-text">
					<h1 class="title p-2" >'.$animation_text_content.'</h1>
				 </div>';
			
			  }
				
				elseif( $animation_text_effect === 'Reveal_From_Top'){
                $output .= '<div class="split-text">
                <h1 class="title p-4"">'.$animation_text_content.'</h1>
              </div>';
           
            }elseif( $animation_text_effect === 'Twist_From_Bottom'){
                $output .= '<div class="split-text">
                <h1 class="title p-7" >'.$animation_text_content.'</h1>
              </div>';
           
            }elseif( $animation_text_effect === 'Twist_From_Top'){
                $output .= '<div class="split-text">
                <h1 class="title p-8" >'.$animation_text_content.'</h1>
              </div>';
           
            } elseif( $animation_text_effect === 'Reveal_Single_Letter_From_Top'){
                $output .= '<div class="split-text" >
                <h1 class="title p-6">'.$animation_text_content.'</h1>
            </div>';
           
            }else {
                $output .= '<div class="split-text">
                <h1 class="title"> '.$animation_text_content.'</h1>
            </div>';
            }

	echo $output;



	}

	
}