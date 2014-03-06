# Code Architecture

## Option 1: Static methods in the global namespace

### Register a basic form

    register_form( 'my-form-id', $args );
    
### Register a generic field

    register_field( 'address-1', $args );
    
Or add the field directly to an already registered form

    register_field( 'address-1', 'my-form-id', $args );
    // Its possible (though questionable?) to have mutable arguments and detect $args using is_array()

## Option 2: Object Instantiation

### Create a basic form as an instance of `WP_Form`

    $form = new WP_Form( array(
        'id' => 'my-id', // Optional, could be auto-generated. Not really needed, other than for CSS purposes
        'post_types' => array( 'post', 'page', 'my-cpt-slug' ), // Optional. Auto-registers metabox for these post types
        'metabox_callback' => array( $this, 'my_metabox_cb' ), // Optional. Used to override default metabox behaviour
        'save_post_callback' => array( $this, 'my_save_post_cb' ), // Optional. Used to override default meta save
    ) );


### Create a new, reusable text field. 

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
    
### Register a field with an existing form

    $form->register_field( $text_field_1 );
    
### Register an anonymous field

    $form->register_field( new WP_Text_Field( 'my_text_field_3' ) );
    
### Register a bunch of fields

    $form->register_fields( array(
        $text_field_1,
        $text_field_2,
        new WP_Text_Field( 'my_text_field_3' )
    ) );
    
### Get a field

    $first_field = $form->get_field_at( 0 );
    
### Specify the position of a field

    $form->add_field_at( 0, $text_field_0 ); // will insert at the "top" of the field list
    
    $third_field = $form->get_field_at( 2 );
    $form->add_field_before( $third_field );
    
### Remove a field

    $form->remove_field( $my_text_field_0 );
    $my_text_field_2 = $form->remove_field_at( 1 );
