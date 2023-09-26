<?php

namespace DynamicContentForElementor\Includes\Skins;

if (!\defined('ABSPATH')) {
    exit;
    // Exit if accessed directly
}
class Show_Favorites_Skin_DualCarousel extends \DynamicContentForElementor\Includes\Skins\Skin_DualCarousel
{
    /**
     * Register Controls Actions
     *
     * @return void
     */
    protected function _register_controls_actions()
    {
        add_action('elementor/element/dce-dynamic-show-favorites/section_query/after_section_end', [$this, 'register_controls_layout']);
        add_action('elementor/element/dce-dynamic-show-favorites/section_dynamicposts/after_section_end', [$this, 'register_additional_dualcarousel_controls']);
        add_action('elementor/element/dce-dynamic-show-favorites/section_dynamicposts/after_section_end', [$this, 'register_additional_carousel_controls']);
    }
}
