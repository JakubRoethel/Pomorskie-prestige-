<?php
/**
 * The Template for displaying Apply button.
 *
 * This template can be overridden by copying it to yourtheme/filters/apply-button.php.
 *
 * @see https://filtereverything.pro/resources/templates-overriding/
 */

if ( ! defined('WPINC') ) {
    wp_die();
}

$set_id = isset( $set['ID'] ) ? esc_html( $set['ID'] ) : 0;
?>
<div class="wpc-filters-section wpc-filters-section-<?php echo $set_id; ?> wpc-filter-layout-submit-button">
    <a class="wpc-filters-submit-button" href="<?php echo esc_url( $apply_url ); ?>"><?php
        $button_text = isset( $set['apply_button_text']['value'] ) ? esc_html( $set['apply_button_text']['value'] ) : esc_html__('Aplikuj', 'filter-everything');
        echo $button_text;
    ?></a>
    <a class="wpc-filters-reset-button" href="<?php echo esc_attr( $reset_url ) ?>"><?php
        $reset_button_text = isset( $set['reset_button_text']['value'] ) ? esc_html( $set['reset_button_text']['value'] ) : esc_html__('Zresetuj', 'filter-everything');
        echo $reset_button_text;
    ?></a>
</div>
