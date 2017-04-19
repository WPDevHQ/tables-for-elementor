<?php
namespace ElementorTables\Modules\Tables\Widgets;

use Elementor\Element_Base;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Table_Standard extends Widget_Base {

	/**
	 * @var \WP_Query
	 */
	private $query = null;

	protected $_has_template_content = false;
	
	public function get_name() {
		return 'standard-table';
	}

	public function get_title() {
		return __( 'Standard Table', 'elementor-tables' );
	}

	public function get_icon() {
		return 'eicon-table';
	}

	public function get_categories() {
		return [ 'table-elements' ];
	}
	
	protected function _register_controls() {
		$this->start_controls_section(
			'column_1_title',
			[
				'label' => __( 'First Option Title', 'elementor-tables' ),
			]
		);

		$this->add_control(
			'title1',
			[
				'label' => __( 'Title', 'elementor-tables' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your title', 'elementor-tables' ),
				'default' => __( 'Elementor', 'elementor-tables' ),
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title1_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .table-cell.first-column h3.column-table-title',
			]
		);

		$this->add_control(
			'view',
			[
				'label' => __( 'View', 'elementor-tables' ),
				'type' => Controls_Manager::HIDDEN,
				'default' => 'traditional',
			]
		);		
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'option_1_button',
			[
				'label' => __( 'Option 1 Button', 'elementor-tables' ),
			]
		);
		
		$this->add_control(
			'button1_cta',
			[
				'label' => __( 'CTA Text', 'elementor-tables' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Download Now', 'elementor-tables' ),
				'default' => __( 'Download Now!', 'elementor-tables' ),
			]
		);		
		
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'border1',
				'label' => __( 'Border', 'elementor-tables' ),
				'placeholder' => '1px',
				'default' => '1px',
				'selector' => '{{WRAPPER}} .table-cell.first-column a.btn',
			]
		);

		$this->add_control(
			'border1_radius',
			[
				'label' => __( 'Border Radius', 'elementor-tables' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .table-cell.first-column a.btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'button1_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .table-cell.first-column a.btn',
			]
		);

		$this->end_controls_section();
		
		$this->start_controls_section(
			'column_2_title',
			[
				'label' => __( 'Second Option Title', 'elementor-tables' ),
			]
		);

		$this->add_control(
			'title2',
			[
				'label' => __( 'Title', 'elementor-tables' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your title', 'elementor-tables' ),
				'default' => __( 'Elementor Pro', 'elementor-tables' ),
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title2_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .table-cell.second-column h3.column-table-title',
			]
		);

		$this->add_control(
			'view',
			[
				'label' => __( 'View', 'elementor-tables' ),
				'type' => Controls_Manager::HIDDEN,
				'default' => 'traditional',
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'option_2_button',
			[
				'label' => __( 'Option 2 Button', 'elementor-tables' ),
			]
		);
		
		$this->add_control(
			'button2_cta',
			[
				'label' => __( 'CTA Text', 'elementor-tables' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'View Details', 'elementor-tables' ),
				'default' => __( 'View Details!', 'elementor-tables' ),
			]
		);		
		
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'button2_border',
				'label' => __( 'Border', 'elementor-tables' ),
				'placeholder' => '2px',
				'default' => '2px',
				'selector' => '{{WRAPPER}} .table-cell.second-column a.btn',
			]
		);

		$this->add_control(
			'button2_radius',
			[
				'label' => __( 'Border Radius', 'elementor-tables' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .table-cell.second-column a.btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'button2_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .table-cell.second-column a.btn',
			]
		);

		$this->end_controls_section();
		
		$this->start_controls_section(
			'table_features',
			[
				'label' => __( 'Features', 'elementor-tables' ),
			]
		);
		
		$this->add_control(
			'feature_compare',
			[
				'label' => __( 'Icon Or Text', 'vividi' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'icon',
				'options' => [
					'icon' => __( 'Icon', 'elementor-tables' ),
					'text' => __( 'Text', 'elementor-tables' ),
				],
			]
		);
		
		$this->add_control(
			'features_list',
			[
				'label' => '',
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'text' => __( 'Feature #1', 'elementor-tables' ),
						'option1_icon' => 'fa fa-check',
						'option2_icon' => 'fa fa-check',
					],
					[
						'text' => __( 'Feature #2', 'elementor-tables' ),
						'option1_icon' => 'fa fa-check',
						'option2_icon' => 'fa fa-check',
					],
					[
						'text' => __( 'Feature #3', 'elementor-tables' ),
						'option1_icon' => '',
						'option2_icon' => 'fa fa-check',
					],
				],
				'fields' => [
					[
						'name' => 'text',
						'label' => __( 'Feature Name', 'elementor-tables' ),
						'type' => Controls_Manager::TEXTAREA,
						'label_block' => true,
						'placeholder' => __( 'Feature Name', 'elementor-tables' ),
						'default' => __( 'Feature Name', 'elementor-tables' ),
					],
					[
						'name' => 'option1_text',
						'label' => __( 'Supported or Not: Text', 'elementor-tables' ),
						'type' => Controls_Manager::TEXT,
						'label_block' => true,
						'default' => '',
					],
					[
						'name' => 'option1_icon',
						'label' => __( 'Supported or Not: Icon', 'elementor-tables' ),
						'type' => Controls_Manager::ICON,
						'label_block' => true,
						'default' => 'fa fa-check',
					],
					[
						'name' => 'option2_text',
						'label' => __( 'Supported or Not: Text', 'elementor-tables' ),
						'type' => Controls_Manager::TEXT,
						'label_block' => true,
						'default' => '',
					],
					[
						'name' => 'option2_icon',
						'label' => __( 'Supported or Not: Icon', 'elementor-tables' ),
						'type' => Controls_Manager::ICON,
						'label_block' => true,
						'default' => 'fa fa-check',
					],
				],
				'title_field' => '{{{ text }}}',
			]
		);		

		$this->end_controls_section();

		$this->start_controls_section(
			'column1_title_style',
			[
				'label' => __( 'First Option', 'elementor-tables' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_control(
			'title1_bg',
			[
				'label' => __( 'Background Color', 'elementor-tables' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
				    'type' => Scheme_Color::get_type(),
				    'value' => Scheme_Color::COLOR_1,
				],
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .table-cell.first-column' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'title1_color',
			[
				'label' => __( 'Title Color', 'elementor-tables' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
				    'type' => Scheme_Color::get_type(),
				    'value' => Scheme_Color::COLOR_1,
				],
				'default' => '#333333',
				'selectors' => [
					'{{WRAPPER}} .table-cell.first-column h3.column-table-title' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'button1_color',
			[
				'label' => __( 'Button Text', 'elementor-tables' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
				    'type' => Scheme_Color::get_type(),
				    'value' => Scheme_Color::COLOR_1,
				],
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .table-cell.first-column a.btn' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'button1_hover',
			[
				'label' => __( 'Button Text Hover', 'elementor-tables' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
				    'type' => Scheme_Color::get_type(),
				    'value' => Scheme_Color::COLOR_1,
				],
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .table-cell.first-column a.btn:hover' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'button1_bg',
			[
				'label' => __( 'Button BG', 'elementor-tables' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
				    'type' => Scheme_Color::get_type(),
				    'value' => Scheme_Color::COLOR_1,
				],
				'default' => '#30305b',
				'selectors' => [
					'{{WRAPPER}} .table-cell.first-column a.btn' => 'background-color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'button1_bg_hover',
			[
				'label' => __( 'Button BG Hover', 'elementor-tables' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
				    'type' => Scheme_Color::get_type(),
				    'value' => Scheme_Color::COLOR_1,
				],
				'default' => '#30305b',
				'selectors' => [
					'{{WRAPPER}} .table-cell.first-column a.btn:hover' => 'background-color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'button1_border_hover',
			[
				'label' => __( 'Button Border Hover', 'elementor-tables' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
				    'type' => Scheme_Color::get_type(),
				    'value' => Scheme_Color::COLOR_1,
				],
				'default' => '#30305b',
				'selectors' => [
					'{{WRAPPER}} .table-cell.first-column a.btn:hover' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'icon1_color',
			[
				'label' => __( 'Icon Color', 'elementor-tables' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
				    'type' => Scheme_Color::get_type(),
				    'value' => Scheme_Color::COLOR_1,
				],
				'default' => '#333333',
				'selectors' => [
					'{{WRAPPER}} .table-cell.first-icon i' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();
		
		$this->start_controls_section(
			'column2_title_style',
			[
				'label' => __( 'Second Option', 'elementor-tables' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_control(
			'title2_bg',
			[
				'label' => __( 'Background Color', 'elementor-tables' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
				    'type' => Scheme_Color::get_type(),
				    'value' => Scheme_Color::COLOR_1,
				],
				'default' => '#30305b',
				'selectors' => [
					'{{WRAPPER}} .table-cell.second-column' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'title2_color',
			[
				'label' => __( 'Title Color', 'elementor-tables' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
				    'type' => Scheme_Color::get_type(),
				    'value' => Scheme_Color::COLOR_1,
				],
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .table-cell.second-column h3.column-table-title' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'button2_color',
			[
				'label' => __( 'Button Text', 'elementor-tables' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
				    'type' => Scheme_Color::get_type(),
				    'value' => Scheme_Color::COLOR_1,
				],
				'default' => '#85bafc',
				'selectors' => [
					'{{WRAPPER}} .table-cell.second-column a.btn' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'button2_hover',
			[
				'label' => __( 'Button Text Hover', 'elementor-tables' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
				    'type' => Scheme_Color::get_type(),
				    'value' => Scheme_Color::COLOR_1,
				],
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .table-cell.second-column a.btn:hover' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'button2_bg',
			[
				'label' => __( 'Button BG', 'elementor-tables' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
				    'type' => Scheme_Color::get_type(),
				    'value' => Scheme_Color::COLOR_1,
				],
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .table-cell.second-column a.btn' => 'background-color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'button2_bg_hover',
			[
				'label' => __( 'Button BG Hover', 'elementor-tables' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
				    'type' => Scheme_Color::get_type(),
				    'value' => Scheme_Color::COLOR_1,
				],
				'default' => '#85bafc',
				'selectors' => [
					'{{WRAPPER}} .table-cell.second-column a.btn:hover' => 'background-color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'button2_border_hover',
			[
				'label' => __( 'Button Border Hover', 'elementor-tables' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
				    'type' => Scheme_Color::get_type(),
				    'value' => Scheme_Color::COLOR_1,
				],
				'default' => '#85bafc',
				'selectors' => [
					'{{WRAPPER}} .table-cell.second-column a.btn:hover' => 'border-color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'icon2_color',
			[
				'label' => __( 'Icon Color', 'elementor-tables' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
				    'type' => Scheme_Color::get_type(),
				    'value' => Scheme_Color::COLOR_1,
				],
				'default' => '#333333',
				'selectors' => [
					'{{WRAPPER}} .table-cell.second-icon i' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'features_style',
			[
				'label' => __( 'Features', 'elementor-tables' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_control(
			'features_color',
			[
				'label' => __( 'Color', 'elementor-tables' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
				    'type' => Scheme_Color::get_type(),
				    'value' => Scheme_Color::COLOR_1,
				],
				'default' => '#333333',
				'selectors' => [
					'{{WRAPPER}} .table-cell.cell-feature' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'features_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .table-cell.cell-feature',
			]
		);

		$this->end_controls_section();
	}
		
	protected function render() {
		$settings = $this->get_settings();
		$title1 = $settings['title1'];
		$title2 = $settings['title2'];
		
		$button1 = $settings['button1_cta'];
		$button2 = $settings['button2_cta'];
	?>
	<div id="el-tables" class="table">
		<div class="table-cell"></div>
		<div class="table-cell first-column">
			<h3 class="column-table-title">
				<?php echo $title1; ?>
			</h3>
			<a href="" class="btn"><?php echo $button1; ?></a>
		</div>
		<div class="table-cell second-column">
			<h3 class="column-table-title">
				<?php echo $title2; ?>
			</h3>
			<a href="" class="btn"><?php echo $button2; ?></a>
		</div>
		<?php foreach ( $settings['features_list'] as $feature ) : ?>
			<div class="table-cell cell-feature">
				<?php echo $feature['text']; ?>
			</div>
			<div class="table-cell first-icon">
				<i class="<?php echo esc_attr( $feature['option1_icon'] ); ?>"></i>
				<p class="first-text"><?php echo esc_attr( $feature['option1_text'] ); ?></p>
			</div>
			<div class="table-cell second-icon">
				<i class="<?php echo esc_attr( $feature['option2_icon'] ); ?>"></i>
				<p class="second-text"><?php echo esc_attr( $feature['option2_text'] ); ?></p>
			</div>
		<?php endforeach; ?>			
			
	</div>
	<?php		
	}	

	protected function _content_template() {}
}