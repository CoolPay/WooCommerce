<?php

class WC_CoolPay_Vipps extends WC_CoolPay_Instance {
    
    public $main_settings = NULL;
    
    public function __construct() {
        parent::__construct();
        
        // Get gateway variables
        $this->id = 'vipps';
        
        $this->method_title = 'CoolPay - Vipps';
        
        $this->setup();
        
        $this->title = $this->s('title');
        $this->description = $this->s('description');
        
        add_filter( 'woocommerce_coolpay_cardtypelock_vipps', array( $this, 'filter_cardtypelock' ) );
    }

    
    /**
    * init_form_fields function.
    *
    * Initiates the plugin settings form fields
    *
    * @access public
    * @return array
    */
    public function init_form_fields()
    {
        $this->form_fields = array(
            'enabled' => array(
                'title' => __( 'Enable', 'woo-vipps' ),
                'type' => 'checkbox', 
                'label' => __( 'Enable Vipps payment', 'woo-vipps' ),
                'default' => 'no'
            ), 
            '_Shop_setup' => array(
                'type' => 'title',
                'title' => __( 'Shop setup', 'woo-vipps' ),
            ),
                'title' => array(
                    'title' => __( 'Title', 'woo-vipps' ),
                    'type' => 'text', 
                    'description' => __( 'This controls the title which the user sees during checkout.', 'woo-vipps' ),
                    'default' => __('Vipps', 'woo-vipps')
                ),
                'description' => array(
                    'title' => __( 'Customer Message', 'woo-vipps' ),
                    'type' => 'textarea', 
                    'description' => __( 'This controls the description which the user sees during checkout.', 'woo-vipps' ),
                    'default' => __('Pay with Vipps', 'woo-vipps')
                ),
        );
    }
   
    
    /**
    * filter_cardtypelock function.
    *
    * Sets the cardtypelock
    *
    * @access public
    * @return string
    */
    public function filter_cardtypelock( )
    {
        return 'vipps';
    }
}
