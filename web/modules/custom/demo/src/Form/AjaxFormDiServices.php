<?php

namespace Drupal\demo\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Database\Connection;
use Drupal\Core\Messenger\MessengerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides a Demo form.
 */
class AjaxFormDiServices extends FormBase {

  protected $messenger;
  protected $database;

  public function __construct(){
    $this->database = \Drupal::service('demo.db');
  }
  // public function __construct(Connection $database, MessengerInterface $messenger){
  //   $this->database=$database;
  //   $this->messenger=$messenger;
  // }

  // public static function create(ContainerInterface $container) {
  //   return new static(
  //     $container->get('demo.db'),//not works
  //     $container->get('messenger')//not works
  //   );
  // }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'demo_ajax';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    $form['name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Name'),
      '#required' => TRUE,
    ];
    $form['message'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Message'),
      '#required' => TRUE,
    ];

    //only Three changes make form by ajax
    //1.You need to set wrapper id for ajax
    $form['#prefix'] = '<div id="my-form-wrapper-id">';
    $form['#suffix'] = '</div>';
    
    $form['actions'] = [
      '#type' => 'actions',
    ];

    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Send'),
      '#attributes' => [
        'class' => [
            'btn',
            'btn-md',
            'btn-primary',
            //2.Use Ajax class
            'use-ajax-submit'
        ]
      ],
      //3.Use wrapper id
      '#ajax' => [
        'wrapper' => 'my-form-wrapper-id',
      ],
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    if(empty($form_state->getValue('name'))){
      $form_state->setErrorByName('name', $this->t('Please Enter your name'));
    }
    elseif(mb_strlen($form_state->getValue('message')) < 10) {
      $form_state->setErrorByName('message', $this->t('Message should be at least 10 characters.'));
    }
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {

    //Pass the data to class db_insert's method getData
    $this->database->setData($form_state);
    // $this->messenger()->addStatus($this->t('The message has been sent.'));
    \Drupal::messenger()->addMessage('The message has been sent.');
    // $form_state->setRedirect('<front>');//works go to front page but not use with ajax
  }

}