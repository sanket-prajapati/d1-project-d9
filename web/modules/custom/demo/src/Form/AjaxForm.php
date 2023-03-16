<?php

namespace Drupal\demo\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides a Demo form.
 */
class AjaxForm extends FormBase {

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

    \Drupal::database()->insert('Ajax_form')
      -> fields([
        'name'=> $form_state->getValue('name'),
        'message'=> $form_state->getValue('message'),
      ])
      ->execute();
    // $this->messenger()->addStatus($this->t('The message has been sent.'));
    \Drupal::messenger()->addMessage('The message has been sent.');
    // $form_state->setRedirect('<front>');//works go to front page but not use with ajax
  }

}