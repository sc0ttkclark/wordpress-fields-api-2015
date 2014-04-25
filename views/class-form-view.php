<?php

/**
 * Class WP_Form_View
 */
class WP_Form_View extends WP_Form_View_Base {

  /**
   * @return string
   */
  function get_form_html() {
    return $this->get_form_fields_html();
  }

  /**
   * @return string
   */
  function get_form_fields_html() {
    /**
     * @var WP_Field_Base $field
     */
    foreach( $this->form->fields as $field_name => $field ) {

      $fields_html[] = $field->get_field_html();
    }
    return implode( "\n", $fields_html );
  }

}
