<?php

/**
 * Class WP_Meta_Storage
 */
class WP_Meta_Storage extends WP_Storage_Base {

  /**
   *
   */
  const PREFIX = 'meta_';

  /**
   * @var bool|string - Meta type such as 'post', 'user' and 'comment' (in future, other.)
   */
  var $meta_type = false;

  /**
   * @return mixed $value
   */
  function get_value() {
    return get_metadata( $this->meta_type, $this->object_id(), $this->field_key( $field_name ), true );
  }

  /**
   * @param string $field_name
   * @param null|mixed $value
   */
  function update_value( $field_name, $value = null ) {
    update_metadata( $this->meta_type, $this->object_id(), $this->field_key( $field_name ), esc_sql( $value ) );
  }

  /**
   * Get Meta Key
   *
   * @param string $field_name
   * @return string
   */
  function field_key( $field_name ) {
    return "_wp[{$field_name}]";
  }

}
