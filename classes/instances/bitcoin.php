<?php

class WC_CoolPay_Bitcoin extends WC_CoolPay_Instance {
    
    public $main_settings = NULL;
    
    public function __construct() {
        parent::__construct();
        
        // Get gateway variables
        $this->id = 'bitcoin';
        
        $this->method_title = 'CoolPay - Bitcoin';
        
        $this->setup();
        
        $this->title = $this->s('title');
        $this->description = $this->s('description');
        
        add_filter( 'woocommerce_coolpay_cardtypelock_bitcoin', array( $this, 'filter_cardtypelock' ) );
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
                'title' => __( 'Enable', 'woo-bitcoin' ),
                'type' => 'checkbox', 
                'label' => __( 'Enable Bitcoin payment', 'woo-bitcoin' ),
                'default' => 'no'
            ), 
            '_Shop_setup' => array(
                'type' => 'title',
                'title' => __( 'Shop setup', 'woo-bitcoin' ),
            ),
                'title' => array(
                    'title' => __( 'Title', 'woo-bitcoin' ),
                    'type' => 'text', 
                    'description' => __( 'This controls the title which the user sees during checkout.', 'woo-bitcoin' ),
                    'default' => __('Bitcoin', 'woo-bitcoin')
                ),
                'description' => array(
                    'title' => __( 'Customer Message', 'woo-bitcoin' ),
                    'type' => 'textarea', 
                    'description' => __( 'This controls the description which the user sees during checkout.', 'woo-bitcoin' ),
                    'default' => __('Pay with Bitcoin', 'woo-bitcoin')
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
        return 'bitcoin';
    }
}
