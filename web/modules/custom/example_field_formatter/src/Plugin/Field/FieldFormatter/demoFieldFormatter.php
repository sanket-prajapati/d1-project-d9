<?php
namespace Drupal\example_field_formatter\Plugin\Field\FieldFormatter;

use Drupal\Component\Utility\HTML;
use Drupal\Core\Field\FieldItemInterface;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Plugin implementation of the 'demo_field_formatter' formatter.
 * 
 * @FieldFormatter(
 *   id= "demo_field_formatter",
 *   label = @Translation("Heading h3"),
 *   field_types = {
 *     "text_long",
 *     "demo_field_type",
 * }
 * )
 */

class demoFieldFormatter extends FormatterBase{
  /**
   * {@inheritdoc}
   */
  public static function defaultSettings(){
    return [
        'concatenated' => 1, 
        //Implement default settings
    ] + parent::defaultSettings();
  }


  /**
   * {@inheritdoc}
   */
  public function settingsForm(array $form, FormStateInterface $form_state){
    return [
      //Implement settings form.
      'concatenated' => [
        '#type' => 'checkbox',
        '#title' => $this->t('Concatenated'),
        '#description' => $this->t('Whether to concatenate the code and number into a single string separated by a space. Otherwise the two are broken up into separate span tags.'),
        '#default_value' => $this->getSetting('concatenated'),
      ],
    ] + parent::settingsForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function settingsSummary(){
    $summary = [];
    //Implement settings summary.
    $summary[] = $this->t('Concatenated: @value', ['@value' =>(bool) $this->getSetting('concatenated') ? $this->t('Yes') : $this->t('No')]);
    return $summary;
  }

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode){
    $elements= [];
    foreach($items as $delta => $item){
        $elements[$delta] = [
            '#type' => 'markup',
            '#markup' => '<h3>'. $item->value. '</h3>',
        ];
    }
    return $elements;
  }

  /**
   * Generate the output appropriate for one field item.
   * 
   * @param \Drupal\Core\Field\FieldItemInterface $item
   *   one field item.
   * 
   * @return string
   *   The textual output generated.
   */


  public function viewValue(FieldItemInterface $item){
    return [
      '#markup' => $item->value,
    ];
  }
}
