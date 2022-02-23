<?php

class Breadcrumbs extends \Elementor\Widget_Base
{

	public function __construct($data = [], $args = null) {
		parent::__construct($data, $args);
		
		wp_register_script( 'breadcrumbs_js',  plugins_url( '/OBPress_Breadcrumbs/widget/assets/js/breadcrumbs.js'), [ 'elementor-frontend' ], '1.0.0', true );

		wp_register_style( 'breadcrumbs_css', plugins_url( '/OBPress_Breadcrumbs/widget/assets/css/breadcrumbs.css') );        
	}

	public function get_script_depends()
	{
		return ['breadcrumbs_js'];
	}

	public function get_style_depends()
	{
		return ['breadcrumbs_css'];
	}
	
	public function get_name()
	{
		return 'Breadcrumbs';
	}

	public function get_title()
	{
		return __('Breadcrumbs', 'plugin-name');
	}

	public function get_icon()
	{
		return 'fa fa-calendar';
	}

	public function get_categories()
	{
		return ['OBPress'];
	}
	
	protected function _register_controls()
	{
		$this->start_controls_section(
			'content_section',
			[
				'label' => __('Content', 'OBPress_Breadcrumbs'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'obpress_custom_breadcrumbs_name', [
				'label' => __( 'Breadcrumb name', 'OBPress_Breadcrumbs' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Breadcrumb name' , 'OBPress_Breadcrumbs' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'obpress_custom_breadcrumbs_location', [
				'label' => __( 'Breadcrumb location', 'OBPress_Breadcrumbs' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'input_type' => 'url',
				'placeholder' => esc_html__( 'https://your-link.com', 'plugin-name' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'obpress_custom_breadcrumbs',
			[
				'label' => __( 'Breadcrumbs', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ obpress_custom_breadcrumbs_name }}}',
			]
		);

		$this->end_controls_section();


		$this->start_controls_section(
			'colors_section',
			[
				'label' => __('Colors', 'plugin-name'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'obpress_custom_breadcrumbs_name_color',
			[
				'label' => __('Breadcrumbs Name Color', 'OBPress_Breadcrumbs'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#6E6E6E',
				'selectors' => [
					'.breadcrumbs .custom_breadcrumb' => 'color: {{obpress_custom_breadcrumbs_name_color}}',
				],
			]
		);

		$this->add_control(
			'obpress_custom_breadcrumbs_name_active_color',
			[
				'label' => __('Breadcrumbs Name Active Color', 'OBPress_Breadcrumbs'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#000000',
				'selectors' => [
					'.breadcrumbs .last_breadcrumb' => 'color: {{obpress_custom_breadcrumbs_name_active_color}}',
				],
			]
		);

		$this->add_control(
			'obpress_custom_breadcrumbs_slash_color',
			[
				'label' => __('Breadcrumbs Slash Color', 'OBPress_Breadcrumbs'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#000000',
				'selectors' => [
					'.breadcrumbs .breadcrumb_slash' => 'color: {{obpress_custom_breadcrumbs_slash_color}}',
				],
			]
		);

		$this->add_control(
			'obpress_custom_breadcrumbs_name_hover_color',
			[
				'label' => __('Breadcrumbs Hover Color', 'OBPress_Breadcrumbs'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#6E6E6E',
				'selectors' => [
					'.breadcrumbs .custom_breadcrumb:hover' => 'color: {{obpress_custom_breadcrumbs_name_hover_color}}',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'typography_section',
			[
				'label' => __('Typography', 'OBPress_Breadcrumbs'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'breadcrumbs_name_typography',
				'label' => __( 'Breadcrumbs Name', 'OBPress_Breadcrumbs' ),
				'selector' => '.custom_breadcrumb',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'breadcrumbs_name_active_typography',
				'label' => __( 'Breadcrumbs Name Active', 'OBPress_Breadcrumbs' ),
				'selector' => '.last_breadcrumb',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'breadcrumbs_slash_typography',
				'label' => __( 'Breadcrumbs Slash', 'OBPress_Breadcrumbs' ),
				'selector' => '.breadcrumb_slash',
			]
		);

		$this->end_controls_section();

	}

	protected function render()
	{
		ini_set("xdebug.var_display_max_children", '-1');
		ini_set("xdebug.var_display_max_data", '-1');
		ini_set("xdebug.var_display_max_depth", '-1');

		$settings = $this->get_settings_for_display();

		require_once(WP_PLUGIN_DIR . '/OBPress_Breadcrumbs/widget/assets/templates/template.php');
	}
}
