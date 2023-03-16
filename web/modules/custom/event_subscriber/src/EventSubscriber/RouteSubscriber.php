<?php

namespace Drupal\event_subscriber\EventSubscriber;

use Drupal\Core\Routing\RouteSubscriberBase;
use Symfony\Component\Routing\RouteCollection;

class RouteSubscriber extends RouteSubscriberBase {

  /**
  * {@inheritdoc}
  */
  protected function alterRoutes(RouteCollection $collection) {
    // // Change path '/user/login' to '/login'.
    // if ($route = $collection->get('user.login')) {
    //   $route->setPath('/login');
    // }
    // // Always deny access to '/user/logout'.
    // // Note that the second parameter of setRequirement() is a string.
    // if ($route = $collection->get('user.logout')) {
    //   $route->setRequirement('_access', 'FALSE');
    // }

    // if($route = $collection->get('demo.ajax')){
        // Change path demo/ajax to demo/ajax/change
    //     $route->setPath('/demo/ajax/change');
    //     // You can check by /demo/ajax path will not found and on new path it will show page
    // }
    // if($route = $collection->get('demo.ajax')) {
    //     $route->setRequirement('_access', 'FALSE');//It's works, and show Access denied
    // }

  }
}