<?php
namespace ovabrw_product_elementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class ovabrw_product_price extends Widget_Base {

	public function get_name() {		
		return 'ovabrw_product_price';
	}

	public function get_title() {
		return esc_html__( 'Product Price', 'ova-brw' );
	}

	public function get_icon() {
		return 'eicon-product-price';
	}

	public function get_categories() {
		return [ 'ovabrw-product' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'section_demo',
			[
				'label' => esc_html__( 'Demo', 'ova-brw' ),
			]
		);
			$arr_product 	= array( '0' => esc_html__( 'Choose Product' ) );
			$products 		= ovabrw_get_products_rental();

			if ( ! empty( $products ) && is_array( $products ) ) {
				foreach( $products as $product_id ) {
					$arr_product[$product_id] = get_the_title( $product_id );
				}
			} else {
				$arr_product[''] = esc_html__( 'There are no rental products', 'ova-brw' );
			}

			$this->add_control(
				'product_id',
				[
					'label' 	=> esc_html__( 'Choose Product', 'ova-brw' ),
					'type' 		=> \Elementor\Controls_Manager::SELECT,
					'default' 	=> '0',
					'options' 	=> $arr_product,
				]
			);

			$this->add_control(
				'product_template',
				[
					'label' 	=> esc_html__( 'Choose Template', 'ova-brw' ),
					'type' 		=> \Elementor\Controls_Manager::SELECT,
					'default' 	=> 'modern',
					'options' 	=> [
						'modern' 	=> esc_html__( 'Modern', 'ova-brw' ),
						'classic' 	=> esc_html__( 'Classic', 'ova-brw' )
					],
				]
			);

		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_price_style',
			[
				'label' 	=> esc_html__( 'Price', 'ova-brw' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
				'condition' => [
					'product_template' => 'classic'
				]
			]
		);

			$this->add_control(
				'wc_style_warning',
				[
					'type' 	=> Controls_Manager::RAW_HTML,
					'raw' 	=> esc_html__( 'The style of this widget is often affected by your theme and plugins. If you experience any such issue, try to switch to a basic theme and deactivate related plugins.', 'ova-brw' ),
					'content_classes' => 'elementor-panel-alert elementor-panel-alert-info',
				]
			);

			$this->add_responsive_control(
				'text_align',
				[
					'label' => esc_html__( 'Alignment', 'ova-brw' ),
					'type' 	=> Controls_Manager::CHOOSE,
					'options' => [
						'left' => [
							'title' => esc_html__( 'Left', 'ova-brw' ),
							'icon' 	=> 'eicon-text-align-left',
						],
						'center' => [
							'title' => esc_html__( 'Center', 'ova-brw' ),
							'icon' 	=> 'eicon-text-align-center',
						],
						'right' => [
							'title' => esc_html__( 'Right', 'ova-brw' ),
							'icon' 	=> 'eicon-text-align-right',
						],
					],
					'selectors' => [
						'{{WRAPPER}}' => 'text-align: {{VALUE}}',
					],
				]
			);

			$this->add_control(
				'price_color',
				[
					'label' 	=> esc_html__( 'Color', 'ova-brw' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .price' => 'color: {{VALUE}}',
					],
				]
			);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' 	 	=> 'typography',
					'selector' 	=> '{{WRAPPER}} .price',
				]
			);

			$this->add_responsive_control(
				'price_padding',
				[
					'type' 			=> \Elementor\Controls_Manager::DIMENSIONS,
					'label' 		=> esc_html__( 'Padding', 'ova-brw' ),
					'size_units' 	=> [ 'px', 'em', '%' ],
					'selectors' 	=> [
						'{{WRAPPER}} .ovabrw-price' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'price_margin',
				[
					'type' 			=> \Elementor\Controls_Manager::DIMENSIONS,
					'label' 		=> esc_html__( 'Margin', 'ova-brw' ),
					'size_units' 	=> [ 'px', 'em', '%' ],
					'selectors' 	=> [
						'{{WRAPPER}} .ovabrw-price' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();
	}

	protected function render() {
		$settings 	= $this->get_settings();
		$product_id = $settings['product_id'];
		$template 	= $settings['product_template'];

		global $product;

		if ( ! $product ) {
			$product = wc_get_product( $product_id );
		}

    	if ( ! $product || ! $product->is_type('ovabrw_car_rental') ) {
			?>
			<div class="ovabrw_elementor_no_product">
				<span><?php echo $this->get_title(); ?></span>
			</div>
			<?php
			return;
		}

		if ( $template === 'modern' ): ?>
			<div class="ovabrw-modern-product">
				<?php ovabrw_get_template( 'modern/single/detail/ovabrw-product-price.php' ); ?>
			</div>
		<?php else:
			$product_id = $product->get_id();
		?>
			<div class="elementor-price">
				<?php ovabrw_get_template( 'single/price.php', array( 'id' => $product_id ) ); ?>
			</div>
		<?php endif;
	}
}