<?php

class ALDC_HelloWorld extends ET_Builder_Module {

	public $slug       = 'aldc_hello_world';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://www.inspiredmelissa.com/',
		'author'     => 'Hossain Md Awlad',
		'author_uri' => 'https://www.technoviable.com/',
	);

	public function init() {
		$this->name = esc_html__( 'Hello World', 'aldc-ald-divi-carousel' );
	}

	public function get_fields() {
		return array(
			'content' => array(
				'label'           => esc_html__( 'Content', 'aldc-ald-divi-carousel' ),
				'type'            => 'tiny_mce',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Content entered here will appear inside the module.', 'aldc-ald-divi-carousel' ),
				'toggle_slug'     => 'main_content',
			),
		);
	}

	public function render( $attrs, $content = null, $render_slug ) {
		return sprintf( '<h1>%1$s</h1>', $this->props['content'] );
	}
}

new ALDC_HelloWorld;
