<?php
namespace Drupal\common_access\Access;

use Drupal\Core\Routing\Access\AccessInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;

class CommonAccessCheck implements AccessInterface{
    public function access(AccountInterface $account){
        return $account->hasPermission('view contact entity') ? AccessResult:: allowed() : AccessResult:: forbidden();
    }
}