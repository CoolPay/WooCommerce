<?php

class WC_CoolPay_Ideal extends WC_CoolPay_Instance {
    
    public $main_settings = NULL;
    
    public function __construct() {
        parent::__construct();
        
        // Get gateway variables
        $this->id = 'ideal';
        
        $this->method_title = 'CoolPay - iDEAL';
        
        $this->setup();
        
        $this->title = $this->s('title');
        $this->description = $this->s('description');
        
        add_filter( 'woocommerce_coolpay_cardtypelock_ideal', array( $this, 'filter_cardtypelock' ) );
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
                'title' => __( 'Enable', 'woo-ideal' ),
                'type' => 'checkbox', 
                'label' => __( 'Enable iDEAL payment', 'woo-ideal' ),
                'default' => 'no'
            ), 
            '_Shop_setup' => array(
                'type' => 'title',
                'title' => __( 'Shop setup', 'woo-ideal' ),
            ),
                'title' => array(
                    'title' => __( 'Title', 'woo-ideal' ),
                    'type' => 'text', 
                    'description' => __( 'This controls the title which the user sees during checkout.', 'woo-ideal' ),
                    'default' => __('iDEAL', 'woo-ideal')
                ),
                'description' => array(
                    'title' => __( 'Customer Message', 'woo-ideal' ),
                    'type' => 'textarea', 
                    'description' => __( 'This controls the description which the user sees during checkout.', 'woo-ideal' ),
                    'default' => __('Pay with iDEAL', 'woo-ideal')
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
        return 'ideal';
    }
}
