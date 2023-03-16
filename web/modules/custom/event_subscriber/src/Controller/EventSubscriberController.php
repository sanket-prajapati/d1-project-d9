<?php

namespace Drupal\event_subscriber\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Returns responses for Event_subscriber routes.
 */
class EventSubscriberController extends ControllerBase {

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
