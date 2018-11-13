<?php

class WC_CoolPay_paysafecard extends WC_CoolPay_Instance {
    
    public $main_settings = NULL;
    
    public function __construct() {
        parent::__construct();
        
        // Get gateway variables
        $this->id = 'paysafecard';
        
        $this->method_title = 'CoolPay - paysafecard';
        
        $this->setup();
        
        $this->title = $this->s('title');
        $this->description = $this->s('description');
        
        add_filter( 'woocommerce_coolpay_cardtypelock_paysafecard', array( $this, 'filter_cardtypelock' ) );
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
                'title' => __( 'Enable', 'woo-paysafecard' ),
                'type' => 'checkbox', 
                'label' => __( 'Enable paysafecard payment', 'woo-paysafecard' ),
                'default' => 'no'
            ), 
            '_Shop_setup' => array(
                'type' => 'title',
                'title' => __( 'Shop setup', 'woo-paysafecard' ),
            ),
                'title' => array(
                    'title' => __( 'Title', 'woo-paysafecard' ),
                    'type' => 'text', 
                    'description' => __( 'This controls the title which the user sees during checkout.', 'woo-paysafecard' ),
                    'default' => __('paysafecard', 'woo-paysafecard')
                ),
                'description' => array(
                    'title' => __( 'Customer Message', 'woo-paysafecard' ),
                    'type' => 'textarea', 
                    'description' => __( 'This controls the description which the user sees during checkout.', 'woo-paysafecard' ),
                    'default' => __('Pay with paysafecard', 'woo-paysafecard')
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
        return 'paysafecard';
    }
}
