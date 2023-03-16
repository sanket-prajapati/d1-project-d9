<?php
namespace Drupal\javascript_accordion\Controller;
use Drupal\Core\Controller\ControllerBase;

class ajaxWithXML extends ControllerBase{
    public function ajaxDemo(){
        $build['myElement'] = [
            '#theme' => 'ajax-cd-display',
            '#title' => 'Ajax example',
        ];
        $build['myElement']['#attached']['library'][] = 'javascript_accordion.accordion';
        return $build;
    }
}