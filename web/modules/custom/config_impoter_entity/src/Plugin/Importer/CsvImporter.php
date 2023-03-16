<?php
namespace Drupal\config_impoter_entity\Plugin\Importer;
use Drupal\Core\StringTranslation\StringTranslationTrait;
use Drupal\config_impoter_entity\Plugin\ImporterBase;
use Drupal\Core\Form\FormStateInterface;
/**
 * Product importer from a CSV format.
 *
 * @Importer(
 * id = "csv",
 * label = @Translation("CSV Importer")
 * )
 */
class CsvImporter extends ImporterBase {
 use StringTranslationTrait;
  /**
  * {@inheritdoc}
  */
  public function import() {
    $products = $this->getData();
    if (!$products) {
      return FALSE;
    }
    foreach ($products as $product) {
      $this->persistProduct($product);
    }
    return TRUE;
  }
    /**
     * {@inheritdoc}
     */
  public function defaultConfiguration() {
    return [
    'file' => [],
    ];
  }
  
  /**
  * {@inheritdoc}
  */
  public function buildConfigurationForm(array $form,FormStateInterface $form_state) {
    $form['file'] = [
      '#type' => 'managed_file',
      '#default_value' => $this->configuration['file'],
      '#title' => $this->t('File'),
      '#description' => $this->t('The CSV file containing the product records.'),
      '#required' => TRUE,
      '#upload_location' => 'public://',
      '#upload_validators' => [
        'file_validate_extensions' => ['csv'],
       ],

    ];
    return $form;
  }

  /**
  * {@inheritdoc}
  */
  public function submitConfigurationForm(array &$form, FormStateInterface $form_state) {
    $this->configuration['file'] = $form_state->getValue('file');
  }
} 
