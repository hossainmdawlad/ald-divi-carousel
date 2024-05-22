<?php

class ALDC_FlexibleCarousel extends ET_Builder_Module {

	public $slug       = 'aldc_flexible_carousel';
	public $vb_support = 'on';
	public $child_slug = 'aldc_flexible_carousel_item';

	protected $module_credits = array(
		'module_uri' => 'https://www.inspiredmelissa.com/',
		'author'     => 'Hossain Md Awlad',
		'author_uri' => 'https://www.technoviable.com/',
	);

	public function init() {
		$this->name = esc_html__( 'Flexible Carousel', 'aldc-ald-divi-carousel' );
	}

	public function get_fields() {
		$general = array(
			'per_page' => array(
				'label'           	=> esc_html__( 'Slide Per Page', 'et_builder' ),
				'type'            	=> 'text',
				'option_category' 	=> 'basic_option',
				'description'     => esc_html__( 'Example: 2', 'et_builder' ),
				'toggle_slug'     	=> 'main_content',
				// 'default'=>'2',
			),
			'side_padding' => array(
				'label'           => esc_html__( 'Side Padding', 'et_builder' ),
				'type'            => 'range',
				'range_settings'=>array(
					'min'=>0,
					'max'=>100,
					'step'=>1,
				),
				'validate_unit'=>true,
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Example: 5rem', 'et_builder' ),
				'toggle_slug'     => 'main_content',
				// 'default'=>'2rem',
			),
			'gap' => array(
				'label'           	=> esc_html__( 'Slide Gap', 'et_builder' ),
				'type'            	=> 'text',
				'option_category' 	=> 'basic_option',
				'description'     => esc_html__( 'Example: 2rem', 'et_builder' ),
				'toggle_slug'     	=> 'main_content',
				// 'default'=>'0rem',
			),
			'breakpoints_768' => array(
				'label'           	=> esc_html__( 'Breakpoints 768', 'et_builder' ),
				'type'            	=> 'text',
				'option_category' 	=> 'basic_option',
				'description'     => esc_html__( 'Example: 2', 'et_builder' ),
				'toggle_slug'     	=> 'main_content',
				// 'default'=>'2',
			),
			'breakpoints_480' => array(
				'label'           	=> esc_html__( 'Breakpoints 480', 'et_builder' ),
				'type'            	=> 'text',
				'option_category' 	=> 'basic_option',
				'description'     => esc_html__( 'Example: 2', 'et_builder' ),
				'toggle_slug'     	=> 'main_content',
				// 'default'=>'1',
			),
			
		);
		return $general;
	}

	public function render( $attrs, $content = null, $render_slug ) {
		$dataSplide = [
			"type"   => 'loop',
			"perPage" => $attrs['per_page'],
			"padding"=> $attrs['side_padding'],
			"gap"=>$attrs['gap'],
			// "focus"  => 'center',
			"lazyLoad"=> 'nearby',
			"breakpoints"=> [
				768=> [
					"perPage"=> $attrs['breakpoints_768'],
				],
				480=> [
					"perPage"=> $attrs['breakpoints_480'],
				],
			],
			"classes"=> [
				"pagination"=> "splide__pagination custom-pagination",
				"arrows"=> "splide__arrows custom-arrows",
				"prev"=> "splide__arrow--prev custom-prev",
				"next"=> "splide__arrow--next custom-next"
			  ],
			"pagination"=> false,
		];
		$dataSplideJson = json_encode($dataSplide);

		$output = sprintf(
			'<div class="splide" data-splide=\'%2$s\'><div class="splide__track">
				<ul class="splide__list">
					%1$s
				</ul>
			</div></div>',
			$this->content,
			$dataSplideJson,
		);

		return $output;
	}

	// protected function _render_module_wrapper( $output = '', $render_slug = '' ) {
	// 	return $output;
	// }

	function js_frontend_preview() {
		?><script>
		window.<?php echo $this->slug; ?>_preview = function(args) {
			// var layout = 'evr_layout_' + args.layout;
			// return '<div class="' + layout + '">Testimonial ' + args.id + '</div>';
		}
		</script><?php
	}
}

new ALDC_FlexibleCarousel;
