<?php
/**
 * The Template for displaying filter checkboxes.
 *
 * This template can be overridden by copying it to yourtheme/filters/checkboxes.php.
 *
 * $set - array, with the Filter Set parameters
 * $filter - array, with the Filter parameters
 * $url_manager - object, of the UrlManager PHP class
 * $terms - array, with objects of all filter terms except excluded
 *
 * @see https://filtereverything.pro/resources/templates-overriding/
 */

if ( ! defined('WPINC') ) {
    wp_die();
}
$args = [
    'hide' => $view_args['ask_to_select_parent']
];

?>
<div class="<?php echo flrt_filter_class( $filter ); // Already escaped ?>" data-fid="<?php echo esc_attr( $filter['ID'] ); ?>">
    <?php flrt_filter_header( $filter, $terms ); // Safe, escaped ?>
    <div class="<?php echo esc_attr( flrt_filter_content_class( $filter ) ); ?>">
        <?php if( $filter['search'] === 'yes' && ! empty( $terms ) && $view_args['ask_to_select_parent'] === false ):  ?>
        <div class="wpc-filter-search-wrapper wpc-filter-search-wrapper-<?php echo esc_attr( $filter['ID'] ); ?>">
            <input class="wpc-filter-search-field" type="text" value="" placeholder="<?php esc_html_e('Search', 'filter-everything' ) ?>" />
            <button class="wpc-search-clear" type="button" title="<?php esc_html_e('Clear search', 'filter-everything' ) ?>"><span class="wpc-search-clear-icon">&#215;</span></button>
        </div>
        <?php endif; ?>
        <ul class="wpc-filters-ul-list wpc-filters-checkboxes wpc-filters-list-<?php echo esc_attr( $filter['ID'] ); ?>"><?php

            if( ! empty( $terms ) || $view_args['ask_to_select_parent'] ):

                 if( $view_args['ask_to_select_parent'] !== false ) { ?>
                     <li><?php echo esc_html( $view_args['ask_to_select_parent'] ); ?></li>
                <?php } else {

                     $args = array(
                         'url_manager'  => $url_manager,
                         'filter'       => $filter,
                         'show_count'   => $set['show_count']['value'],
                         'set'          => $set
                     );

                     echo flrt_walk_terms_tree($terms, $args);
                 }
            else:

                if( ! flrt_is_filter_request() ){
                    ?><li><?php esc_html_e('There are no terms yet', 'filter-everything' );


                    if( flrt_is_debug_mode() ){
                        echo '&nbsp;'.flrt_help_tip(
                                esc_html__('Possible reasons: 1) Filter\'s criteria doesn\'t contain any terms yet and you have to add them 2) Terms may be created, but no one post that should be filtered attached to these terms 3) You excluded all possible terms in Filter\'s options.', 'filter-everything')
                            );
                    }
                }else{
                    esc_html_e('N/A', 'filter-everything' );
                }

                ?></li><?php

            endif;

?>      </ul>
        <?php  if ( isset( $filter['more_less'] ) && $filter['more_less'] === 'yes' ): ?>
            <a class="wpc-see-more-control wpc-toggle-a" href="javascript:void(0);" data-fid="<?php echo esc_attr( $filter['ID'] ); ?>"><?php esc_html_e('See more', 'filter-everything' ); ?></a>
            <a class="wpc-see-less-control wpc-toggle-a" href="javascript:void(0);" data-fid="<?php echo esc_attr( $filter['ID'] ); ?>"><?php esc_html_e('See less', 'filter-everything' ); ?></a>
        <?php endif;  ?>
    </div>
</div>