<?php

/**
 * Class WP_Form_View_Base
 */

abstract class WP_Form_View_Base extends WP_Metadata_Base {

  /**
   * @var WP_Form
   */
  var $form;

  function __construct( $view_name, $form ) {
    $this->form = $form;
  }


}
