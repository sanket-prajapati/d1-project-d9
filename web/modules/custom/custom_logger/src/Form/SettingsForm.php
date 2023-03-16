<?php

namespace Drupal\custom_logger\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

use Drupal\custom_logger\services\newLoggerService;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Configure custom_logger settings for this site.
 */
class SettingsForm extends ConfigFormBase {

  protected $logger;

  public function __construct(newLoggerService $logger){
    $this->logger = $logger;
  }

  public static function create(ContainerInterface $container) {
    return new static(
    // Injecting service 'custom_logger.newLogger' from services.yml file
    // This will call class newLoggerService
      $container->get('custom_logger.newLogger')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'custom_logger_settings';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return ['custom_logger.settings'];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['example'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Example'),
      '#default_value' => $this->config('custom_logger.settings')->get('example'),
    ];
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    if ($form_state->getValue('example') != 'example') {
      $form_state->setErrorByName('example', $this->t('The value is not correct.'));
    }
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {

    $message="Your configuration form is sumbitted.";
    // \Drupal::logger('my_module')->notice($message);
    // \Drupal::logger('custom_logger')->notice($message);//works
    $this->logger->doStuff($message);
    // custom_logger.logger.channel.hello_world
    \Drupal::service('logger.factory')->get('hello_world')->error('This is my error message');//works
    \Drupal::service('logger.factory')->get('hello_world')->notice('This is my notice message');//works
    
    $this->config('custom_logger.settings')
      ->set('example', $form_state->getValue('example'))
      ->save();
    parent::submitForm($form, $form_state);
  }

}
