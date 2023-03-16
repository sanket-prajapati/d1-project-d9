<?php

namespace Drupal\access_module\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Access\AccessResult;
use Drupal\Core\Session\AccountInterface;

/**
 * Returns responses for access_module routes.
 */
class AccessModuleController extends ControllerBase {

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

  public function access(AccountInterface $account){
    return AccessResult::allowedIf(
      $account->hasPermission('view contact entity')//works if you check in incognito mode then It will show access denied
    );
  }
  

}
