<?php

/**
 * Class WP_Taxonomy_Storage
 *
 * @todo Implement get_value() and update_value()
 */
class WP_Taxonomy_Storage extends WP_Storage_Base {

  /**
   *
   */
  const PREFIX = 'taxonomy_';

  /**
   * @return mixed $value
   */
  function get_value() {
    return null;
  }

  /**
   * @param string $field_name
   * @param null|mixed $value
   */
  function update_value( $value = null ) {

  }

  /**
   * Taxonomy Terms are the Field names.
   *
   * @param string $field_name
   * @return string
   */
  function field_key( $field_name ) {
    return $field_name;
  }

}
