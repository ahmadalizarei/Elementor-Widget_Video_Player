<?php
namespace Elementor;

use Elementor\Modules\DynamicTags\Module as TagsModule;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Elementor Awesome-Video-Player widget.
 *
 *
 * @since 1.0.0
 */
class Awesome_Video_Player extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve tilt widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'Awesome-Video-Player';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve tilt widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Awesome Video Player', 'elementor' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve tilt widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-play-o';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the video widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * @since 2.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'basic' ];
	}

	/**
	 * Get widget keywords.
	 *
	 * Retrieve the list of keywords the widget belongs to.
	 *
	 * @since 2.1.0
	 * @access public
	 *
	 * @return array Widget keywords.
	 */
	public function get_keywords() {
		return [ 'Video Player', 'css','wordpress','elementor','widget', 'video', 'zarei' ];
	}
	

	/**
	 * Register video widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 3.1.0
	 * @access protected
	 */
	protected function register_controls() {
		$this->start_controls_section(
			'settings',
			[
				'label' => __( 'Settings', 'elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'insert_path',
			[
				'label' => __( 'External URL', 'elementor' ),
				'type' => Controls_Manager::SWITCHER,
				
			]
		);

		$this->add_control(
			'video_path',
			[
				'label' => __( 'Choose Video', 'elementor' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				  'default' => [
                        'url' => "",
                    ],	
				'condition' => [
					'insert_path' => '',
				],
			]
		);

		$this->add_control(
			'video_url',
			[
				'label' => __( 'URL', 'elementor' ),
				'type' => Controls_Manager::URL,
				'autocomplete' => false,
				'options' => false,
				'label_block' => true,
				'show_label' => false,
				'dynamic' => [
					'active' => true,
					'categories' => [
						TagsModule::POST_META_CATEGORY,
						TagsModule::URL_CATEGORY,
					],
				],
				'media_type' => 'video',
				'placeholder' => __( 'Enter your URL', 'elementor' ),
				  'default' => [
                        'url' => '',
                    ],
				'condition' => [
					'insert_path' => 'yes',
				],
			]
		);
 
    


            $this->add_control(
                'show_separate',
                [
                    'label' => __( 'Show Separate', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => __( 'Yes', 'your-plugin' ),
                    'label_off' => __( 'No', 'your-plugin' ),
                    'return_value' => 'Yes',
                    'default' => 'No',
                ]
            );
	
	

   $this->add_responsive_control(
                'Border_Corners',
                [
                    'label' => __('Border Corners', 'plugin-domain' ),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%' ],
                    'description' => 'Default: 0%',
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 200,
                            'step' => 1,
                        ],
                        '%' => [
                            'min' => 0,
                            'max' => 100,
                        ],
                    ],
                    'default' => [
                        'unit' => '%',
                        'size' => 0,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .your-element ' => 'border-radius: {{SIZE}}{{UNIT}};',
                    ],
							'condition' => [
					'show_separate' => '',
				],
                ]
            );
			
			   $this->add_responsive_control(
                'Border_Top_Right_Corner',
                [
                    'label' => __('Border Top Right Corner', 'plugin-domain' ),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%' ],
                    'description' => 'Default: 0%',
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 200,
                            'step' => 1,
                        ],
                        '%' => [
                            'min' => 0,
                            'max' => 100,
                        ],
                    ],
                    'default' => [
                        'unit' => '%',
                        'size' => 0,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .your-element ' => 'border-top-right-radius: {{SIZE}}{{UNIT}};',
                    ],
						'condition' => [
					'show_separate' => 'Yes',
				],
                ]
            );
			   $this->add_responsive_control(
                'Border_Top_Left_Corner',
                [
                    'label' => __('Border Top Left Corner', 'plugin-domain' ),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%' ],
                    'description' => 'Default: 0%',
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 200,
                            'step' => 1,
                        ],
                        '%' => [
                            'min' => 0,
                            'max' => 100,
                        ],
                    ],
                    'default' => [
                        'unit' => '%',
                        'size' => 0,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .your-element ' => 'border-top-left-radius: {{SIZE}}{{UNIT}};',
                    ],
							'condition' => [
					'show_separate' => 'Yes',
				],
                ]
            );
			   $this->add_responsive_control(
                'Border_Bottom_Left_Corner',
                [
                    'label' => __('Border Bottom Left Corner', 'plugin-domain' ),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%' ],
                    'description' => 'Default: 0%',
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 200,
                            'step' => 1,
                        ],
                        '%' => [
                            'min' => 0,
                            'max' => 100,
                        ],
                    ],
                    'default' => [
                        'unit' => '%',
                        'size' => 0,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .your-element ' => 'border-bottom-left-radius: {{SIZE}}{{UNIT}};',
                    ],
							'condition' => [
					'show_separate' => 'Yes',
				],
                ]
            );
			   $this->add_responsive_control(
                'Border_Bottom_Right_Corner',
                [
                    'label' => __('Border Bottom Right Corner', 'plugin-domain' ),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%' ],
                    'description' => 'Default: 0%',
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 200,
                            'step' => 1,
                        ],
                        '%' => [
                            'min' => 0,
                            'max' => 100,
                        ],
                    ],
                    'default' => [
                        'unit' => '%',
                        'size' => 0,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .your-element ' => 'border-bottom-right-radius: {{SIZE}}{{UNIT}};',
                    ],
							'condition' => [
					'show_separate' => 'Yes',
				],
                ]
            );

			  // Width
            $this->add_responsive_control(
                'video_width',
                [
                    'label' => __( 'Width', 'plugin-domain' ),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%' ],
                    'description' => 'Default: 100%',
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 1000,
                            'step' => 1,
                        ],
                        '%' => [
                            'min' => 0,
                            'max' => 100,
                        ],
                    ],
                    'default' => [
                        'unit' => '%',
                        'size' => 100,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .your-element ' => 'width: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            // Height
            $this->add_responsive_control(
                'video_height',
                [
                    'label' => __( 'Height', 'plugin-domain' ),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%' ],
                    'description' => 'Default: 230px',
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 1000,
                            'step' => 1,
                        ],
                        '%' => [
                            'min' => 0,
                            'max' => 100,
                        ],
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 230,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .your-element ' => 'height: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            // Padding
            $this->add_responsive_control(
                'video_padding',
                [
                    'label' => __( 'Padding', 'plugin-domain' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'default' => [
                        'top' => 0,
                        'right' => 0,
                        'bottom' => 0,
                        'left' => 0,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .your-element ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            // Margin
            $this->add_responsive_control(
                'video_margin',
                [
                    'label' => __( 'Margin', 'plugin-domain' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'default' => [
                        'top' => 0,
                        'right' => 0,
                        'bottom' => 0,
                        'left' => 0,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .your-element ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
		
		}
	/**
	 * Render tilt widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
	$settings = $this->get_settings_for_display();
	if($settings['video_path']['url']!==null)
    $lnk= $settings['video_path']['url'];
	else
	$lnk= $settings['video_url']['url'];
	?>
			
        
	
	

<video class="your-element" controls>
  <source src=<?php echo $lnk ?> type="video/mp4">
  Your browser does not support the video tag.
</video>

	
		<?php
        

		
		
	}
}
Plugin::instance()->widgets_manager->register_widget_type( new Awesome_Video_Player () );