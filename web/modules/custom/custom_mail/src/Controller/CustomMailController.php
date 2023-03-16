<?php

namespace Drupal\custom_mail\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Returns responses for custom_mail routes.
 */
class CustomMailController extends ControllerBase {

  /**
   * Builds the response.
   */
  public function build() {
    $current_user = \Drupal::currentUser();
    $roles = $current_user->getRoles();

    if(in_array('administrator',$roles)){
      $mailManager = \Drupal::service('plugin.manager.mail');
      $module = 'MODULENAME';
      $key = 'general_mail';
      $to = "aman@gmail.com";
      $params['message'] = "This is the message";
      $params['subject'] = "Mail subject";
      $langcode = \Drupal::currentUser()->getPreferredLangcode();
      $send = true;
      $result = $mailManager->mail($module, $key, $to, $langcode, $params, NULL, $send);
      if ($result['result'] !== true) {
        \Drupal::Messenger()->addMessage(t('There was a problem sending your message and it was not sent.'), 'error');
      }
      else {
        \Drupal::Messenger()->addMessage(t('Your message has been sent.'));
      }
    }
    $build['content'] = [
      '#type' => 'item',
      '#markup' => $this->t('It works!'),
    ];

    return $build;
  }

}
