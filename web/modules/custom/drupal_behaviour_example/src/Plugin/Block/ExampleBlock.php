<?php

namespace Drupal\drupal_behaviour_example\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides an example block.
 *
 * @Block(
 *   id = "drupal_behaviour_example_example",
 *   admin_label = @Translation("Example"),
 *   category = @Translation("drupal_behaviour_example")
 * )
 */
class ExampleBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $build['content'] = [
      '#markup' => $this->t('It works!'),
    ];
    return $build;
  }

}
