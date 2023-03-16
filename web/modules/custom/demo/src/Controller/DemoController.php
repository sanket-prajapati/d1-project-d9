<?php

namespace Drupal\demo\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Returns responses for demo routes.
 */
class DemoController extends ControllerBase {

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
