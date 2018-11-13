<?php

class WC_CoolPay_Trustly extends WC_CoolPay_Instance {
    
    public $main_settings = NULL;
    
    public function __construct() {
        parent::__construct();
        
        // Get gateway variables
        $this->id = 'trustly';
        
        $this->method_title = 'CoolPay - Trustly';
        
        $this->setup();
        
        $this->title = $this->s('title');
        $this->description = $this->s('description');
        
        add_filter( 'woocommerce_coolpay_cardtypelock_trustly', array( $this, 'filter_cardtypelock' ) );
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
                'title' => __( 'Enable', 'woo-trustly' ),
                'type' => 'checkbox', 
                'label' => __( 'Enable Trustly payment', 'woo-trustly' ),
                'default' => 'no'
            ), 
            '_Shop_setup' => array(
                'type' => 'title',
                'title' => __( 'Shop setup', 'woo-trustly' ),
            ),
                'title' => array(
                    'title' => __( 'Title', 'woo-trustly' ),
                    'type' => 'text', 
                    'description' => __( 'This controls the title which the user sees during checkout.', 'woo-trustly' ),
                    'default' => __('Bank Payment with Trustly', 'woo-trustly')
                ),
                'description' => array(
                    'title' => __( 'Customer Message', 'woo-trustly' ),
                    'type' => 'textarea', 
                    'description' => __( 'This controls the description which the user sees during checkout.', 'woo-trustly' ),
                    'default' => __('Pay with Trustly - Bank payment', 'woo-trustly')
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
        return 'trustly';
    }
}
