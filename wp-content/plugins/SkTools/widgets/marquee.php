<?php

/**
 * Elementor Marquee Widget.
 * Created by Sreenath Kumar
 * 8/15/2023
 * 12:00 AM
 * 
 */

namespace SK_Tools\ElementorWidgets\Widgets;

use Elementor\Widget_Base;

class Sk_Marquee extends Widget_Base
{

    //plugin name
    public function get_name()
    {
        return 'sk-marquee';
    }

    //plugin title
    public function get_title()
    {
        return __('Marquee', 'text-domain');
    }

    //plugin icon
    public function get_icon()
    {
        return 'eicon-flash';
    }

    // public function get_custom_help_url() {}

    //plugin categories
    public function get_categories()
    {
        return ['sk_tools'];
    }

    //plugin javascript
    public function get_script_depends()
    {
        return ['marquee'];
    }

    //plugin css
    public function get_style_depends()
    {
        return ['marquee_style'];
    }

    protected function register_controls()
    {
        //Start the content section
        $this->start_controls_section('content_section', [
            'label' => __('Content', 'text-domain'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]);

        //marquee message feild
        $this->add_control(
            'marquee_text',
            [
                'label' => __('Marquee Text', 'text-domain'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Enter your text', 'text-domain'),
                'default' => __('This is a marquee text', 'text-domain'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );
        //marquee message feild
        $this->add_control(
            'marquee_speed',
            [
                'label' => __('Marquee Speed', 'text-domain'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'placeholder' => __('5', 'text-domain'),
                'min' => 5,
                'max' => 50,
                'default' => 5,
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        ?>
        <?php echo "<marquee class='marquee' scrollAmount='" . $settings['marquee_speed'] . "' >" ?>
        <?php echo $settings['marquee_text']; ?>
        </marquee>
    <?php
    }

    protected function content_template()
    {
    
    }
}
