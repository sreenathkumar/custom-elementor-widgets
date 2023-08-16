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
    public function get_name(){
        return 'sk-marquee';
    }

    //plugin title
    public function get_title(){
        return esc_html__('Marquee', 'text-domain');
    }

    //plugin icon
    public function get_icon(){
        return 'eicon-flash';
    }

    // public function get_custom_help_url() {}

    //plugin categories
    public function get_categories(){
        return ['sk_tools'];
    }

    //plugin javascript
    public function get_script_depends(){
        return ['skt_marquee'];
    }

    //plugin css
    public function get_style_depends(){
        return ['skt_marquee_style'];
    }

    protected function register_controls(){
        $this->start_controls_section('content_section',[
            'label'=> esc_html('Content', 'text-domain'),
            'tab'=> \Elementor\Controls_Manager::TAB_CONTENT,
        ]);
    }

    protected function render(){
    }

    protected function content_template(){
    }
}
