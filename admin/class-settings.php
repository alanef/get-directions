<?php

namespace Get_Directions\Admin;

use  AlanEFPluginDonation\PluginDonation ;
/**
 * Class Settings
 * @package Get_Directions\Admin
 */
class Settings
{
    private  $options_key = "get-directions-settings" ;
    /**
     * Settings constructor.
     *
     * @param string $plugin_name
     * @param string $version plugin version.
     * @param \Freemius $freemius Freemius SDK.
     */
    public function __construct( $plugin_name, $version, $freemius )
    {
        // Init CMB2 ( consider if needed elsewhere )
        require_once GET_DIRECTIONS_PLUGIN_DIR . 'includes/vendor/cmb2/init.php';
        $this->plugin_name = $plugin_name;
        $this->version = $version;
        $this->freemius = $freemius;
        $this->donation = new PluginDonation(
            'get-directions',
            'settings_page_get-directions-settings',
            'get-directions/get-directions.php',
            admin_url( 'options-general.php?page=get-directions-settings' ),
            'Get Directions Map',
            $freemius
        );
        add_filter( 'plugindonation_lib_strings', array( $this, 'set_strings' ) );
    }
    
    public function register_settings()
    {
        /**
         * Registers options page menu item and form.
         */
        $options = array(
            'id'           => 'get-directions_option_metabox',
            'title'        => esc_html__( 'MapQuest - Get Directions', 'get-directions' ),
            'object_types' => array( 'options-page' ),
            'option_key'   => $this->options_key,
            'parent_slug'  => 'options-general.php',
        );
        $cmb_options = new_cmb2_box( $options );
        /*
         * Options fields ids only need
         * to be unique within this box.
         * Prefix is not needed.
         */
        $infomsg = '';
        
        if ( $this->freemius->is_free_plan() ) {
            ob_start();
            echo  '<table class="form-table"><tbody>' ;
            $this->donation->display();
            echo  '</tbody></table>' ;
            $infomsg .= ob_get_clean();
        }
        
        $infomsg .= '<p>' . sprintf( __( 'Welcome. To use this plugin add the widget or shortcode to your website <br>
            You will also need to obtain and store MapQuest API Key, see the tab for that. <br><br>
            For more detailed setup and usage instructions visit <a class="button-secondary" target="_blank" href="https://fullworks.net/technical-documentation/get-directions-usage-instructions" >this page.</a><br>
            Support for the <strong>free</strong> version is provided <a class="button-secondary" href="https://wordpress.org/support/plugin/get-directions" target="_blank">here on WordPress.org.</a><br>
			<br>
			Get a FREE trial of the Pro version - <a href="%1$s">click here</a> 
			<ul style="list-style-type:disc;">
				<li>7 day free trial</li>
				<li>Multi map pins, by post or custom post,easily build a geo directory</li>
				<li>Different map skins</li>
				<li>Direct support</li>
			</ul>
			', 'get-directions' ), $this->freemius->get_trial_url() );
        $cmb_options->add_field( array(
            'before'      => '<h2>' . __( 'Information', 'get-directions' ) . '</h2>',
            'after_field' => $infomsg,
            'id'          => 'info_text',
            'type'        => 'title',
            'tab'         => 'info',
        ) );
        $infomsg = '<p>' . sprintf( esc_html__( 'Sign up to a MapQuest Plan using this %1$slink%2$s', 'get-directions' ), '<a href="https://developer.mapquest.com/plan_purchase/steps/business_edition/business_edition_free/register" target="_blank">', '</a>' ) . '</p>' . sprintf( esc_html__( 'Then login to MapQuest Developers and create an API key using this %1$slink%2$s', 'get-directions' ), '<a href="https://developer.mapquest.com/user/me/apps" target="_blank">', '</a>' ) . '</p>';
        $cmb_options->add_field( array(
            'before'      => '<h2>' . esc_html__( 'MapQuest API Keys', 'get-directions' ) . '</h2>',
            'after_field' => $infomsg,
            'id'          => 'key_text',
            'type'        => 'title',
            'tab'         => 'key',
        ) );
        $cmb_options->add_field( array(
            'name'       => esc_html__( 'Consumer Key', 'get-directions' ),
            'desc'       => esc_html__( 'Copy and paste your consumer key here', 'get-directions' ),
            'id'         => 'consumer_key',
            'type'       => 'text',
            'attributes' => array(
            'type' => 'password',
        ),
            'tab'        => 'key',
        ) );
    }
    
    public function set_strings( $strings )
    {
        $strings = array(
            esc_html__( 'Gift a Donation', 'get-directions' ),
            // 0
            esc_html__( 'Hi, I\'m Alan and you are using the free version of this plugin.', 'get-directions' ),
            // 1
            esc_html__( 'There is a paid for version, but if you are going to just use the free version then a great way to support the ongoing provision of the free version is to gift me a small donation', 'get-directions' ),
            // 2
            esc_html__( 'Gift a donation: select your desired option', 'get-directions' ),
            // 3
            esc_html__( 'My Bitcoin donation wallet', 'get-directions' ),
            // 4
            esc_html__( 'Gift a donation via PayPal', 'get-directions' ),
            // 5
            esc_html__( 'My Bitcoin Cash address', 'get-directions' ),
            // 6
            esc_html__( 'My Ethereum address', 'get-directions' ),
            // 7
            esc_html__( 'My Dogecoin address', 'get-directions' ),
            // 8
            esc_html__( 'Contribute', 'get-directions' ),
            // 9
            esc_html__( 'Contribute to the Open Source Project in other ways', 'get-directions' ),
            // 10
            esc_html__( 'Submit a review', 'get-directions' ),
            // 11
            esc_html__( 'Translate to your language', 'get-directions' ),
            // 12
            esc_html__( 'SUBMIT A REVIEW', 'get-directions' ),
            // 13
            esc_html__( 'If you are happy with the plugin then we would love a review. Even if you are not so happy feedback is always useful, but if you have issues we would love you to make a support request first so we can try and help.', 'get-directions' ),
            // 14
            esc_html__( 'SUPPORT FORUM', 'get-directions' ),
            // 15
            esc_html__( 'Providing some translations for a plugin is very easy and can be done via the WordPress system. You can easily contribute to the community and you don\'t need to translate it all.', 'get-directions' ),
            // 16
            esc_html__( 'TRANSLATE INTO YOUR LANGUAGE', 'get-directions' ),
            // 17
            esc_html__( 'As an open source project you are welcome to contribute to the development of the software if you can. The development plugin is hosted on GitHub.', 'get-directions' ),
            // 18
            esc_html__( 'CONTRIBUTE ON GITHUB', 'get-directions' ),
            // 19
            esc_html__( 'Get Support', 'get-directions' ),
            // 20
            esc_html__( 'WordPress SUPPORT FORUM', 'get-directions' ),
            // 21
            esc_html__( 'Hi I\'m Alan and I support the free version of the plugin', 'get-directions' ),
            // 22
            esc_html__( 'for you.  You have been using the free plugin for a while now and WordPress has probably been through several updates by now. So I\'m asking if you can help keep the free version available, by donating a very small amount of cash. If you can that would be a fantastic help to keeping this plugin updated.', 'get-directions' ),
            // 23
            esc_html__( 'Donate via this page', 'get-directions' ),
            // 24
            esc_html__( 'Remind me later', 'get-directions' ),
            // 25
            esc_html__( 'I have already donated', 'get-directions' ),
            // 26
            esc_html__( 'I don\'t want to donate, dismiss this notice permanently', 'get-directions' ),
            // 27
            esc_html__( 'Hi I\'m Alan and you have been using this free version of this plugin', 'get-directions' ),
            // 28
            esc_html__( 'for a while - that is awesome! Could you please do me a BIG favor and give it a 5-star rating on WordPress? Just to help spread the word and boost my motivation..', 'get-directions' ),
            // 29
            esc_html__( 'OK, you deserve it', 'get-directions' ),
            // 30
            esc_html__( 'Maybe later', 'get-directions' ),
            // 31
            esc_html__( 'Already done', 'get-directions' ),
            // 32
            esc_html__( 'No thanks, dismiss this request', 'get-directions' ),
            // 33
            esc_html__( 'Donate to Support', 'get-directions' ),
            // 34
            esc_html__( 'Settings', 'get-directions' ),
            // 35
            esc_html__( 'Help Develop', 'get-directions' ),
        );
        return $strings;
    }

}