<?php

/**
 * Class WP_Storage_Base
 */

abstract class WP_Storage_Base extends WP_Metadata_Base {
  /**
   *
   */
  const OBJECT_ID = 'unspecified';

  /**
   * @var WP_Post|WP_User|object
   */
  var $object;

  /**
   * @var WP_Field_Base
   */
  var $owner;

  /**
   * $storage_arg names that should not get a prefix.
   *
   * Intended to be used by subclasses.
   *
   * @return array
   */
  function NO_PREFIX() {
    return array(
      'object',
      'owner',
    );
  }

  /**
   * @param string $field_name
   * @return mixed $value
   */
  function get_value( $field_name ) {
    return null;
  }

  /**
   * @param string $field_name
   * @param null|mixed $value
   */
  function update_value( $field_name, $value = null ) {
  }

  /**
   * Name used for field key.
   *
   * Most common example of a field key would be a meta key.
   *
   * @param string $field_name
   * @return string
   */
  function field_key( $field_name ) {
    return "_{$field_name}";
  }

  /**
   * @return int
   */
  function object_id() {
    return $this->object->{self::OBJECT_ID};
  }

  /**
   * @param $object_id
   */
  function set_object_id( $object_id ) {
    if ( property_exists( $this->object, self::OBJECT_ID ) ) {
      $this->object->{self::OBJECT_ID} = $object_id;
    }
  }

  /**
   *
   * @param $field_name
   * @return bool
   */
  function has_field( $field_name ) {
    return true;
  }

}




