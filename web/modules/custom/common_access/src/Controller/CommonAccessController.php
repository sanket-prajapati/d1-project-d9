<?php

namespace Drupal\common_access\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Returns responses for common_access routes.
 */
class CommonAccessController extends ControllerBase {

  /**
   * Builds the response.
   */
  public function build() {

    $build['content'] = [
      '#type' => 'item',
      '#markup' => $this->t('It works!'),
    ];

    return $build;
  }

}
