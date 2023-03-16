<?php

namespace Drupal\cache_api_example\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Returns responses for cache_api_example routes.
 */
class CacheApiExampleController extends ControllerBase {

  /**
   * Builds the response.
   */
  public function build() {
    // $cache = \Drupal::cache();
    // $cache->set('my_cache_entry_cid', 'my_value');
    // $cache = \Drupal::cache('render');
    // // $data = $cache->get('my_cache_entry_cid'); 
    // dump($cache);
    // exit;
    $build['content'] = [
      '#type' => 'item',
      '#markup' => $this->t('It works!'),
    ];

    return $build;
  }

}
