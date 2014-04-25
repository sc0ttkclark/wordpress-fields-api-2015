<?php

/**
 * Class WP_Field_View_Base
 * @mixin WP_Field_Base
 */

abstract class WP_Field_View_Base extends WP_Metadata_Base {

  /**
   * @var WP_Field_Base
   */
  var $field;

  /**
   * @var array
   */
  var $features = array();

  /**
   * @param array $view_name
   * @param array $args
   */
  function __construct( $view_name, $args = array() ) {
    $args['view_name'] = $view_name;
    parent::__construct( $args );
  }

  /**
   * @return string
   */
  function get_field_html() {
    return '<li>' . $this->field->field_name . '</li>';
  }

  /**
   * Delegate accesses for missing poperties to the $field property
   *
   * @param string $property_name
   * @return mixed
   */
  function __get( $property_name ) {
    return property_exists( $this->field, $property_name )
      ? $this->field->$property_name
      : null;
  }

  /**
   * Delegate accesses for missing poperties to the $field property
   *
   * @param string $property_name
   * @param mixed $value
   * @return mixed
   */
  function __set( $property_name, $value ) {
    return property_exists( $this->field, $property_name )
      ? $this->field->$property_name = $value
      : null;
  }

  /**
   * Delegate calls for missing methods to the $field property
   *
   * @param string $method_name
   * @param array $args
   * @return mixed
   */
  function __call( $method_name, $args = array() ) {
    return method_exists( $this->field, $method_name )
      ? call_user_func_array( array( $this->field, $method_name ), $args )
      : null;
  }



}
