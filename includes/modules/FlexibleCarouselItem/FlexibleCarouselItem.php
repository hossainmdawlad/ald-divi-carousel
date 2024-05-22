<?php
require_once ( ALDC_MAIN_DIR . '/functions/extends.php');

class FlexibleCarouselItem extends ET_Builder_Module {

	public $slug       = 'aldc_flexible_carousel_item';
	public $vb_support = 'on';
	public $type       = 'child';
	// Module item's attribute that will be used for module item label on modal
	public $child_title_var          = 'title';
	public $child_title_fallback_var = 'admin_label';
	


	protected $module_credits = array(
		'module_uri' => 'https://www.inspiredmelissa.com/',
		'author'     => 'Hossain Md Awlad',
		'author_uri' => 'https://www.technoviable.com/',
	);

	public function init() {
		$this->name = esc_html__( 'Carousel Item', 'et_builder' );
		$this->whitelisted_fields = array(
			'id',
			'layout',
			'admin_label',
			'module_id',
			'module_class',
		);
		$this->main_css_element = '%%order_class%%.splide__slide';
		$this->custom_css_options = array();
		add_action( 'wp_footer', array( $this, 'js_frontend_preview' ) );
	}
	public function get_settings_modal_toggles(){
		return array(
			'general'  => array(
					'toggles' => array(
							'main_content' => esc_html__( 'Main Content', 'et_builder' ),
					),
			),
		);
	}

	public function get_fields() {
		// global $et_pb_rendering_column_content, $et_pb_predefined_module_index;

		$general = array(
			'title' => array(
				'label'           	=> esc_html__( 'Title', 'et_builder' ),
				'type'            	=> 'text',
				'option_category' 	=> 'basic_option',
				'description'     	=> esc_html__( 'Title entered here will appear inside the module.', 'et_builder' ),
				'toggle_slug'     	=> 'main_content',
			),
			'content' => array(
				'label'           => esc_html__( 'Content', 'et_builder' ),
				'type'            => 'tiny_mce',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Content entered here will appear inside the module.', 'et_builder' ),
				'toggle_slug'     => 'main_content',
			),
			
		);
		return array_merge(
			$general,
		);
	}

	public function render( $attrs, $content = null, $render_slug ) {
		$title 				=	$this->props['title']; 
		$content			=	$this->props['content'];
		
		$output =  sprintf( '<li class="splide__slide">%2$s</li>', 
							$title,
							et_core_sanitized_previously( $content )
						);
		return $output;

	}

	protected function _render_module_wrapper( $output = '', $render_slug = '' ) {
		return $output;
	}
}

new FlexibleCarouselItem;
