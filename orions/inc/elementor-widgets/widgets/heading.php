<?php

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

class Heading extends \Elementor\Widget_Base

{

    public function get_name()
    {
        return 'orions_heading';
    }

    public function get_title()
    {
        return esc_html__('Heading', 'orions');
    }

    public function get_icon()
    {
        return 'eicon-heading';
    }

    public function get_categories()
    {
        return ['gfxpartner'];
    }

    protected function register_controls()
    {

        // heading content - start

        $this->start_controls_section(
            'heading_content',
            [
                'label' => esc_html__('Content', 'orions'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        orions_heading_data_controls($this);

        $this->end_controls_section();

        // heading content - end

        // heading style - start

        $this->start_controls_section(
            'heading_style',
            [
                'label' => esc_html__('Style', 'orions'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        orions_heading_style_controls($this);

        $this->end_controls_section();

        // heading style - end

    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();

        orions_heading($settings);
    }
}
