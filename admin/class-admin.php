<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 */
namespace Get_Directions\Admin;

class Admin
{
    /**
     * The ID of this plugin.
     *
     */
    private  $plugin_name ;
    /**
     * The version of this plugin.
     *
     */
    private  $version ;
    /**
     * Initialize the class and set its properties.
     *
     */
    public function __construct( $plugin_name, $version )
    {
        $this->plugin_name = $plugin_name;
        $this->version = $version;
    }
    
    public function connect_message(
        $message,
        $user_first_name,
        $plugin_title,
        $user_login,
        $site_link,
        $freemius_link
    )
    {
        return sprintf(
            __( 'Hi %1$s' ) . ',<br>' . __( 'Never miss an important update -- opt-in to our security and feature updates notifications related to %2$s, and non-sensitive diagnostic tracking to help me improve %2$s sent via %5$s', 'get-directions' ),
            $user_first_name,
            '<b>' . $plugin_title . '</b>',
            '<b>' . $user_login . '</b>',
            $site_link,
            $freemius_link
        );
    }
    
    /**
     * Register the widget
     */
    public function register_custom_widgets()
    {
        register_widget( 'Get_Directions\\Includes\\Get_Directions_Widget' );
    }
    
    public function display_admin_notice()
    {
        if ( !$this->can_display_admin_notice() ) {
            return;
        }
        $user_id = get_current_user_id();
        $um = get_user_meta( $user_id, 'wfea_dismissed_notices', true );
        
        if ( !isset( $um['wfea_notice_1'] ) || true !== $um['wfea_notice_1'] ) {
            global  $wpdb ;
            $results = $wpdb->get_results( 'SHOW VARIABLES LIKE \'max_allowed_packet\';' );
            $notice = esc_html__( 'Get Directions Map Plugin is END OF LIFE support is discontuning - find an alternatuve map plugin and remove this one', 'get-directions' );
            printf( '<div id="wfea_notice_1" class="wfea_notice notice is-dismissible notice-warning"><p>%s</p></div>', $notice );
        }
    
    }
    
    public static function can_display_admin_notice()
    {
        // Don't display notices to users that can't do anything about it.
        if ( !function_exists( 'wp_get_current_user' ) ) {
            include ABSPATH . 'wp-includes/pluggable.php';
        }
        if ( !current_user_can( 'install_plugins' ) ) {
            return false;
        }
        // Notices are only displayed on the dashboard, plugins, tools, and settings admin pages.
        $page = get_current_screen()->base;
        $display_on_pages = array(
            'dashboard',
            'plugins',
            'tools',
            'options-general',
            'settings_page_widget-for-eventbrite-api-settings'
        );
        if ( !in_array( $page, $display_on_pages ) ) {
            return false;
        }
        return true;
    }

}