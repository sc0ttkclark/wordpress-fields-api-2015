<?php

/**
 * Class WP_Core_Storage
 */
class WP_Core_Storage extends WP_Storage_Base {

  /**
   * @param string $field_name
   * @return mixed $value
   */
  function get_value( $field_name ) {
    return $this->has_field( $field_name ) ? $this->object->{$field_name} : null;
  }

  /**
   * @param string $field_name
   * @param null|mixed $value
   */
  function update_value( $field_name, $value = null ) {
    if ( $this->has_field( $field_name ) && 0 < intval( $this->object_id() ) ) {
      /**
       * @var wpdb $wpdb
       */
      global $wpdb;
      $wpdb->update(
        $wpdb->posts,
        array( $field_name => $value ),
        array( 'ID' => $this->object_id()
      ));
    }
  }

  /**
   * @param $field_name
   * @return bool
   */
  function has_field( $field_name ) {
    return property_exists( $this->object, $field_name ) && parent::has_field( $field_name );
  }

}
