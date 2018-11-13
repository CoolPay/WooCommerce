<?php

class WC_CoolPay_Swish extends WC_CoolPay_Instance {
    
    public $main_settings = NULL;
    
    public function __construct() {
        parent::__construct();
        
        // Get gateway variables
        $this->id = 'swish';
        
        $this->method_title = 'CoolPay - Swish';
        
        $this->setup();
        
        $this->title = $this->s('title');
        $this->description = $this->s('description');
        
        add_filter( 'woocommerce_coolpay_cardtypelock_swish', array( $this, 'filter_cardtypelock' ) );
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
                'title' => __( 'Enable', 'woo-swish' ),
                'type' => 'checkbox', 
                'label' => __( 'Enable Swish payment', 'woo-swish' ),
                'default' => 'no'
            ), 
            '_Shop_setup' => array(
                'type' => 'title',
                'title' => __( 'Shop setup', 'woo-swish' ),
            ),
                'title' => array(
                    'title' => __( 'Title', 'woo-swish' ),
                    'type' => 'text', 
                    'description' => __( 'This controls the title which the user sees during checkout.', 'woo-swish' ),
                    'default' => __('Swish', 'woo-swish')
                ),
                'description' => array(
                    'title' => __( 'Customer Message', 'woo-swish' ),
                    'type' => 'textarea', 
                    'description' => __( 'This controls the description which the user sees during checkout.', 'woo-swish' ),
                    'default' => __('Pay with Swish', 'woo-swish')
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
        return 'swish';
    }
}
