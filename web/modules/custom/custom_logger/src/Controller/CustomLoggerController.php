<?php

namespace Drupal\custom_logger\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Returns responses for custom_logger routes.
 */
class CustomLoggerController extends ControllerBase {

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
