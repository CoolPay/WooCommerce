<?php

class WC_CoolPay_PayPal extends WC_CoolPay_Instance {
    
    public $main_settings = NULL;
    
    public function __construct() {
        parent::__construct();
        
        // Get gateway variables
        $this->id = 'paypal';
        
        $this->method_title = 'CoolPay - PayPal';
        
        $this->setup();
        
        $this->title = $this->s('title');
        $this->description = $this->s('description');
        
        add_filter( 'woocommerce_coolpay_cardtypelock_paypal', array( $this, 'filter_cardtypelock' ) );
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
                'title' => __( 'Enable', 'woo-paypal' ),
                'type' => 'checkbox', 
                'label' => __( 'Enable PayPal payment', 'woo-paypal' ),
                'default' => 'no'
            ), 
            '_Shop_setup' => array(
                'type' => 'title',
                'title' => __( 'Shop setup', 'woo-paypal' ),
            ),
                'title' => array(
                    'title' => __( 'Title', 'woo-paypal' ),
                    'type' => 'text', 
                    'description' => __( 'This controls the title which the user sees during checkout.', 'woo-paypal' ),
                    'default' => __('PayPal', 'woo-paypal')
                ),
                'description' => array(
                    'title' => __( 'Customer Message', 'woo-paypal' ),
                    'type' => 'textarea', 
                    'description' => __( 'This controls the description which the user sees during checkout.', 'woo-paypal' ),
                    'default' => __('Pay with PayPal', 'woo-paypal')
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
        return 'paypal';
    }
}
