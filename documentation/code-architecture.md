# Code Architecture

##Create a basic form as an instance of `WP_Form`

    $form = new WP_Form( array(
        'id' => 'my-id', // Optional, could be auto-generated. Not really needed, other than for CSS purposes
        'post_types' => array( 'post', 'page', 'my-cpt-slug' ), // Optional. Auto-registers metabox for these post types
        'metabox_callback' => array( $this, 'my_metabox_cb' ), // Optional. Used to override default metabox behaviour
        'save_post_callback' => array( $this, 'my_save_post_cb' ), // Optional. Used to override default meta save
    ) );


##Create a new, reusable text field. 

Do we want to keep a single, generic `WP_Form_Field` object to keep the WP_ namespace relatively uncluttered? 

    $text_field_1 = new WP_Form_Field( 'text', 'my_text_field_1', array(
        'label' => __( 'Enter Name' )
    ) );
    
Or do we create a more nested object hierarchy that inherits from and extends `WP_Form_Field`?

    $text_field_2 = new WP_Text_Field( 'my_text_field_2' );
    
Which allows perhaps some easier extension by developers

    class TA_Custom_Text_Field extends WP_Text_Field {
        public function __construct( $id, $args ){
            parent::__construct( $id, $args );
        }
    }
    
