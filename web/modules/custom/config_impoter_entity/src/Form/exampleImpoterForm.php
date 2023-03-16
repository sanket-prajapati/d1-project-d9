<?php

namespace Drupal\config_impoter_entity\Form;

use Drupal\Core\Entity\EntityForm;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;

use Drupal\Core\Messenger\MessengerInterface;
use Drupal\config_impoter_entity\Plugin\ImporterManager;
use Symfony\Component\DependencyInjection\ContainerInterface; 

/**
 * Class exampleImpoterForm.
 */
class exampleImpoterForm extends EntityForm {


  /**
   * @var \Drupal\config_impoter_entity\Plugin\ImporterManager
   */
  protected $importerManager;
  /**
   * ImporterForm constructor.
   *
   * @param \Drupal\config_impoter_entity\Plugin\ImporterManager $importerManager
   * @param \Drupal\Core\Messenger\MessengerInterface $messenger
   */
  public function __construct(ImporterManager $importerManager, MessengerInterface $messenger) {
    $this->importerManager = $importerManager;
    $this->messenger = $messenger;
  }
  /**
   * {@inheritdoc}
   * */
  public static function create(ContainerInterface $container){
    return new static(
      $container->get('config_impoter_entity.importer_manager'),
      $container->get('messenger')
    );
  } 



  /**
   * {@inheritdoc}
   */
  public function form(array $form, FormStateInterface $form_state) {
    $form = parent::form($form, $form_state);

    /** @var \Drupal\config_impoter_entity\Entity\exampleImpoter $importer */
    $importer = $this->entity; 

    // $example_impoter = $this->entity;
    $form['label'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Label'),
      '#maxlength' => 255,
      '#default_value' => $importer->label(),
      '#description' => $this->t("Label for the Example impoter."),
      '#required' => TRUE,
    ];

    $form['id'] = [
      '#type' => 'machine_name',
      '#default_value' => $importer->id(),
      '#machine_name' => [
        'exists' => '\Drupal\config_impoter_entity\Entity\exampleImpoter::load',
      ],
      '#disabled' => !$importer->isNew(),
    ];

    $form['url'] = [
      '#type' => 'url',
      '#default_value' => $importer->getUrl() instanceof Url ? $importer->getUrl()->toString() : '',
      '#title' => $this->t('Url'),
      '#description' => $this->t('The URL to the import resource'),
      '#required' => TRUE,
    ];
    $definitions = $this->importerManager->getDefinitions();
    $options = [
      'json plugin1',
      'json plugin2',
    ];
    foreach ($definitions as $id => $definition) {
      $options[$id] = $definition['label'];
    }
    $form['plugin'] = [
      '#type' => 'select',
      '#title' => $this->t('Plugin'),
      '#default_value' => $importer->getPluginId(),
      '#options' => $options,
      '#description' => $this->t('The plugin to be used with
      this importer.'),
      '#required' => TRUE,
    ];
      $form['update_existing'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Update existing'),
      '#description' => $this->t('Whether to update existing
      products if already imported.'),
      '#default_value' => $importer->updateExisting(),
      ];
      $form['source'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Source'),
      '#description' => $this->t('The source of the products.'),
      '#default_value' => $importer->getSource(),
      ]; 

    /* You will need additional form elements for your custom properties. */

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    $importer = $this->entity;
    $status = $importer->save();

    switch ($status) {
      case SAVED_NEW:
        $this->messenger()->addMessage($this->t('Created the %label Example impoter.', [
          '%label' => $importer->label(),
        ]));
        break;

      default:
        $this->messenger()->addMessage($this->t('Saved the %label Example impoter.', [
          '%label' => $importer->label(),
        ]));
    }
    $form_state->setRedirectUrl($importer->toUrl('collection'));
  }

}
