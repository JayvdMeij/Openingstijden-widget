<?php
namespace Elementor;

class Widget_Openinghours extends \Elementor\Widget_Base {

	//naam widget
	public function get_name() {
		return 'openingstijden-widget';
	}
	
	//title widget
	public function get_title() {
		return 'Openingstijden-Widget';
	}
	
	//icon van de widget
	public function get_icon() {
		return 'lcons lcons-hours';
	}
	
	//welke categorie komt de widget
	public function get_categories() {
		return [ 'basic' ];
	}

	//css toevoegen
	public function get_style_depends() {
		return [ 'l-w-oh' ];
	}

	//javascript toevoegen
	public function get_script_depends() {
		return [ 'l-w-oh-js' ];
	}

	public function widget_files() {

	}
	
	//begin aanmaken velden
	protected function register_controls() {

		//alle tijden waar je uit kunt kiezen
		$open_hours
			= [
				'00:00'    => __('00:00', 'openingstijden'),
				'00:30'    => __('00:30', 'openingstijden'),
				'01:00'    => __('1:00', 'openingstijden'),
				'01:30'    => __('1:30', 'openingstijden'),
				'02:00'    => __('2:00', 'openingstijden'),
				'02:30'    => __('2:30', 'openingstijden'),
				'03:00'    => __('3:00', 'openingstijden'),
				'03:30'    => __('3:30', 'openingstijden'),
				'04:00'    => __('4:00', 'openingstijden'),
				'04:30'    => __('4:30', 'openingstijden'),
				'05:00'    => __('5:00', 'openingstijden'),
				'05:30'    => __('5:30', 'openingstijden'),
				'06:00'    => __('6:00', 'openingstijden'),
				'06:30'    => __('6:30', 'openingstijden'),
				'07:00'    => __('7:00', 'openingstijden'),
				'07:30'    => __('7:30', 'openingstijden'),
				'08:00'    => __('8:00', 'openingstijden'),
				'08:30'    => __('8:30', 'openingstijden'),
				'09:00'    => __('9:00', 'openingstijden'),
				'09:30'    => __('9:30', 'openingstijden'),
				'10:00'    => __('10:00', 'openingstijden'),
				'10:30'    => __('10:30', 'openingstijden'),
				'11:00'    => __('11:00', 'openingstijden'),
				'11:30'    => __('11:30', 'openingstijden'),
				'12:00'    => __('12:00', 'openingstijden'),
				'12:30'    => __('12:30', 'openingstijden'),
				'13:00'    => __('13:00', 'openingstijden'),
				'13:30'    => __('13:30', 'openingstijden'),
				'14:00'    => __('14:00', 'openingstijden'),
				'14:30'    => __('14:30', 'openingstijden'),
				'15:00'    => __('15:00', 'openingstijden'),
				'15:30'    => __('15:30', 'openingstijden'),
				'16:00'    => __('16:00', 'openingstijden'),
				'16:30'    => __('16:30', 'openingstijden'),
				'17:00'    => __('17:00', 'openingstijden'),
				'17:30'    => __('17:30', 'openingstijden'),
				'18:00'    => __('18:00', 'openingstijden'),
				'18:30'    => __('18:30', 'openingstijden'),
				'19:00'    => __('19:00', 'openingstijden'),
				'19:30'    => __('19:30', 'openingstijden'),
				'20:00'    => __('20:00', 'openingstijden'),
				'20:30'    => __('20:30', 'openingstijden'),
				'21:00'    => __('21:00', 'openingstijden'),
				'21:30'    => __('21:30', 'openingstijden'),
				'22:00'    => __('22:00', 'openingstijden'),
				'22:30'    => __('22:30', 'openingstijden'),
				'23:00'    => __('23:00', 'openingstijden'),
				'23:30'    => __('23:30', 'openingstijden'),
				'24:00'    => __('24:00', 'openingstijden'),
			];

			//content tab aanmaken
        $this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Content', 'openingstijden' ),
				'tab' => \Elementor\controls_Manager::TAB_CONTENT,
			]
		);
		
		//togle om titel te laten zien
		$this->add_control(
			'show_title',
			[
				'label' => __( 'Laat titel zien', 'openingstijden' ),
				'type' => \Elementor\controls_Manager::SWITCHER,
				'label_on' => __( 'Ja', 'openingstijden' ),
				'label_off' => __( 'Nee', 'openingstijden' ),
				'return_value' => 'yes',
				'default' => 'on',
			]
		);
        
		//invultveld voor titel
        $this->add_control(
			'widget_title',
			[
				'label' => __( 'Titel', 'openingstijden' ),
				'type' => \Elementor\controls_Manager::TEXT,
				'default' => __( 'Openingstijden', 'openingstijden' ),
				'placeholder' => __( 'Type je titel hier', 'openingstijden' ),
				'condition' => [
					'show_title' => 'yes',
				],
			]
        );
        
		//HTML tag voor titel
        $this->add_control(
			'widget_title_tag',
			[
				'label' => __( 'HTML Tag', 'openingstijden' ),
				'type' => \Elementor\controls_Manager::SELECT,
				'default' => 'h2',
				'options' => [
					'h1'  => __( 'H1', 'openingstijden' ),
					'h2' => __( 'H2', 'openingstijden' ),
					'h3' => __( 'H3', 'openingstijden' ),
					'h4' => __( 'H4', 'openingstijden' ),
					'H5' => __( 'H5', 'openingstijden' ),
					'p' => __( 'P', 'openingstijden' ),
					'span' => __( 'span', 'openingstijden' ),
				],
				'condition' => [
					'show_title' => 'yes',
				],
			]
		);

		//voegt stijl keuze toe tussen 3 stijlen
		$this->add_control(
			'style',
			[
				'label' => __( 'Style', 'openingstijden' ),
				'type' => \Elementor\controls_Manager::SELECT,
                'default' => 'Style 1',
				'options' => [
					'1'  => __( 'Style 1', 'openingstijden' ),
					'2' => __( 'Style 2', 'openingstijden' ),
					'5' => __('Simple list', 'openingstijden'),

				],			
			]
		);

		//voegt toggle toe voor foto in style 1 en 2
		$this->add_control(
			'show_image',
			[
				'label' => __( 'Show image', 'openingstijden' ),
				'type' => \Elementor\controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'your-plugin' ),
				'label_off' => __( 'No', 'your-plugin' ),
				'return_value' => 'yes',
				'default' => 'yes',
				'condition' => [
					'style' => ['1', '2'],
				],
			]
		);

		//voegt de foto zelf toe
		$this->add_control(
			'image',
			[
				'label' => __( 'Choose Image', 'openingstijden' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'style' => ['1', '2'],
					'show_image' => 'yes',
				],

			]
		);

		/* Style 2*/

		$this->add_control(
			'icon',
			[
				'label' => __( 'Icon', 'text-domain' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-clock',
					'library' => 'solid',
				],
				'condition' => [
					'style' => '2',
				],
			]
		);

		$this->add_control(
			's2_subtitle_open',
			[
				'label' => __( 'Subtitle (Open)', 'openingstijden' ),
				'type' => \Elementor\controls_Manager::TEXT,
				'default' => __( 'Subtitle', 'openingstijden' ),
				'placeholder' => __( 'Subtitle', 'openingstijden' ),
				'condition' => [
					'style' => '2',
				],
			]
		);
		
		$this->add_control(
			's2_cta_open',
			[
				'label' => __( 'Call To Action (Open)', 'openingstijden' ),
				'type' => \Elementor\controls_Manager::TEXT,
				'default' => __( '0800 1234 5678', 'openingstijden' ),
				'placeholder' => __( 'Type je call to action hier', 'openingstijden' ),
				'condition' => [
					'style' => '2',
				],
			]
		);
		
		$this->add_control(
			's2_subtitle_closed',
			[
				'label' => __( 'Subtitle (Gesloten)', 'openingstijden' ),
				'type' => \Elementor\controls_Manager::TEXT,
				'default' => __( 'Subtitle', 'openingstijden' ),
				'placeholder' => __( 'Subtitle', 'openingstijden' ),
				'condition' => [
					'style' => '2',
				],
			]
		);
		
		$this->add_control(
			's2_cta_closed',
			[
				'label' => __( 'Call To Action (Gesloten)', 'openingstijden' ),
				'type' => \Elementor\controls_Manager::TEXT,
				'default' => __( 'hello@example.com', 'openingstijden' ),
				'placeholder' => __( 'Type je call to action hier', 'openingstijden' ),
				'condition' => [
					'style' => '2',
				],
			]
        );

        $this->end_controls_section();
        
		//dagen tab aanmaken voor repeater
        $this->start_controls_section(
			'repeater_rows',
			[
				'label' => __( 'Dagen', 'openingstijden' ),
				'tab' => \Elementor\controls_Manager::TAB_CONTENT,
			]
		);
        
		//repeater variabel
        $repeater = new \Elementor\Repeater();

		//dagen van de week keuze
		$repeater->add_control(
			'day',
			[
				'label' => __( 'Dag', 'openingstijden' ),
				'type' => \Elementor\controls_Manager::SELECT,
                'default' => 'Maandag',
				'options' => [
					'Maandag'  => __( 'Maandag', 'openingstijden' ),
					'Dinsdag' => __( 'Dinsdag', 'openingstijden' ),
					'Woensdag' => __( 'Woensdag', 'openingstijden' ),
					'Donderdag' => __( 'Donderdag', 'openingstijden' ),
					'Vrijdag' => __( 'Vrijdag', 'openingstijden' ),
					'Zaterdag' => __( 'Zaterdag', 'openingstijden' ),
					'Zondag' => __( 'Zondag', 'openingstijden' ),
				],			]
		);

		//open/gesloten toggle
		$repeater->add_control(
			'open',
			[
				'label' => __( 'Open', 'openingstijden' ),
				'type' => \Elementor\controls_Manager::SWITCHER,
				'label_on' => __( 'Open', 'openingstijden' ),
				'label_off' => __( 'Gesloten', 'openingstijden' ),
				'return_value' => 'on',
				'default' => 'on',
			]
		);

		//open tijd keuze
		$repeater->add_control(
			'time-open',
			[
				'label' => __( 'Open', 'openingstijden' ),
				'type' => \Elementor\controls_Manager::SELECT,
                'default' => '09:00',
				'options' =>
					$open_hours,
				'condition' => [
					'open' => 'on',
				],
			]
		);

		//gesloten tijd keuze
		$repeater->add_control(
			'time-closed',
			[
				'label' => __( 'Gesloten', 'openingstijden' ),
				'type' => \Elementor\controls_Manager::SELECT,
                'default' => '17:00 ',
				'options' =>
					$open_hours,
				'condition' => [
					'open' => 'on',
				],
			]
		);

		//voegt de repeater zelf toe
		$this->add_control(
			'list',
			[
				'label' => __( 'Dagen', 'openingstijden' ),
				'type' => \Elementor\controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
                        'day' => __( 'Maandag', 'openingstijden' ),
					],
				],
				'title_field' => '{{{ day }}}',
			]
        );
        
		$this->end_controls_section();
		
		//voegt stijl tab toe
		$this->start_controls_section(
            'style_section',
            [
                'label' => __( 'Style', 'openingstijden' ),
                'tab' => \Elementor\controls_Manager::TAB_STYLE,
            ]
        );
		
		//voegt border radius toe in stijl
		$this->add_responsive_control(
			'box_border_radius',
			[
				'label' => __( 'Border Radius', 'elementor-pro' ),
				'type' => \Elementor\controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .l-oh .today' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}; border-collapse: separate !important;',
					'{{WRAPPER}} .l-oh' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		//------------------------------------------------------------------------------------
		$this->add_control(
			'background_color',
			[
				'label' => __( 'Background Color', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .l-oh.s-2' => 'background: {{VALUE}}',
				],
				'condition' => [
					'style' => '2',
				],
			]
		);

		$this->add_control(
			'icon_color',
			[
				'label' => __( 'Icon Color', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .l-oh.s-2 .l-oh-icon-wrap i:before' => 'color: {{VALUE}}',
				],
				'condition' => [
					'style' => '2',
				],
			]
		);

		$this->add_control(
			'text_color',
			[
				'label' => __( 'Text Color', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .l-oh.s-2 .l-oh-text-wrap a' => 'color: {{VALUE}}',
					'{{WRAPPER}} .l-oh.s-2 .l-oh-text-wrap h1' => 'color: {{VALUE}}',
					'{{WRAPPER}} .l-oh.s-2 .l-oh-text-wrap h2' => 'color: {{VALUE}}',
					'{{WRAPPER}} .l-oh.s-2 .l-oh-text-wrap h3' => 'color: {{VALUE}}',
					'{{WRAPPER}} .l-oh.s-2 .l-oh-text-wrap h4' => 'color: {{VALUE}}',
					'{{WRAPPER}} .l-oh.s-2 .l-oh-text-wrap h5' => 'color: {{VALUE}}',
					'{{WRAPPER}} .l-oh.s-2 .l-oh-text-wrap p' => 'color: {{VALUE}}',
				],
				'condition' => [
					'style' => '2',
				],
			]
		);

		$this->add_responsive_control(
			'icon_size',
			[
				'label' => __( 'Size', 'layoutor' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 6,
						'max' => 300,
					],
				],
				'default' => ['px','60'],
				'selectors' => [
					'{{WRAPPER}} .l-oh.s-2 .l-oh-icon-wrap' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'icon_padding',
			[
				'label' => __( 'Padding', 'layoutor' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'selectors' => [
					'{{WRAPPER}} .l-oh.s-2 .l-oh-icon-wrap i' => 'padding: {{SIZE}}{{UNIT}};',
				],
				'range' => [
					'em' => [
						'min' => 0,
						'max' => 5,
					],
				],
			]
		);
		//----------------------------------------------------------------------------------------------

	}

	/**
	 * Add styling
	 */

	protected function render() {
        $settings = $this->get_settings(); ?>
		<div class="l-oh s-<?php echo $settings['style']; ?>">
		<?php if($settings['style'] === '1') {
			if($settings['show_image'] != 'yes') {
				if($settings['show_title'] != 'yes') { } else { ?>
					<div class="l-oh-title">
					<<?php echo $settings['widget_title_tag'];?>>
					<?php echo $settings['widget_title'] ?>
					</<?php echo $settings['widget_title_tag']; ?>>
					</div>
				<?php }
			} else { ?>
				<div class="l-oh-img-wrap">
				<img src="<?php echo $settings['image']['url'];?>"/>
				<?php if($settings['show_title'] != 'yes') { } else { ?>
					<div class="l-oh-img-title">
					<<?php echo $settings['widget_title_tag'];?>>
					<?php echo $settings['widget_title']; ?>
					</<?php echo $settings['widget_title_tag'];?>>
					</div>
					<?php } ?>
				</div>
			<?php } ?>
			
			<div class="l-oh-table">
			<?php
			foreach($settings['list'] as $days) {
				if($days['open'] != 'on') { ?>
					<div id="<?php echo $days['day']; ?>">
						<div class="day"><?php echo $days['day']; ?></div>
						<div class="tw">
							<div>Gesloten</div>
						</div>
					</div>
				<?php } else { ?>
					<div class="l-oh-d-<?php echo $days['day']; ?> indicator">
						<div class="day"><?php echo $days['day']; ?></div>
						<div class="tw">
							<div class="opens"><?php echo $days['time-open']; ?></div>
							<div class="spacer">-</div>
							<div class="closes"><?php echo $days['time-closed']; ?></div>
						</div>
					</div>
				<?php }
			} ?>
			</div>
		<?php }
		if($settings['style'] === '2') { ?>
			<div class="l-oh-icon-wrap">
				<?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?>
			</div>
			<div class="l-oh-text-wrap openorclosed">
				<div class="text-open">
					<h4><?php echo $settings['s2_subtitle_open']; ?></h4>
					<h3><?php echo $settings['s2_cta_open']; ?></h3>
				</div>
				<div class="text-closed">
					<h4><?php echo $settings['s2_subtitle_closed']; ?></h4>
					<h3><?php echo $settings['s2_cta_closed']; ?></h3>
				</div>
			</div>
			<?php
			foreach($settings['list'] as $days) {
				if($days['open'] != 'on') { ?>
					<div id="<?php echo $days['day']; ?>" class="hidden">
						<div class="day"><?php echo $days['day']; ?></div>
						<div class="tw">
							<div>Gesloten</div>
						</div>
					</div>
				<?php } else { ?>
					<div id="<?php echo $days['day']; ?>" class="hidden">
						<div class="day"><?php echo $days['day']; ?></div>
						<div class="tw">
							<div class="opens"><?php echo $days['time-open']; ?></div>
							<div class="spacer">-</div>
							<div class="closes"><?php echo $days['time-closed']; ?></div>
						</div>
					</div>
				<?php }
			} ?>
		<?php
		}
		if($settings['style'] === '5') {
			if($settings['show_title'] != 'yes') { } else { ?>
				<<?php echo $settings['widget_title_tag']; ?>>
				<?php echo $settings['widget_title']; ?>
				</<?php echo $settings['widget_title_tag']; ?>>
				<?php } ?>
				
				<div class="l-oh-table">
				<?php 
				foreach($settings['list'] as $days) {
					if($days['open'] != 'on') { ?>
						<div id="<?php echo $days['day']; ?>">
							<div class="day"><?php echo $days['day']; ?></div>
							<div class="tw">
								<div>Gesloten</div>
							</div>
						</div>
					<?php } else { ?>
						<div id="<?php echo $days['day']; ?>">
							<div class="day"><?php echo $days['day']; ?></div>
							<div class="tw">
								<div class="opens"><?php echo $days['time-open']; ?></div>
								<div class="spacer">-</div>
								<div class="closes"><?php echo $days['time-closed']; ?></div>
							</div>
						</div>
					<?php }
				} ?>
				</div>
		<?php } ?>
		</div>	

<?php		
	}
	
	
	
	
}