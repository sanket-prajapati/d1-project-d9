<?php

namespace Drupal\example_fieldwidget\Plugin\Field\FieldWidget;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Field\Annotation\FieldWidget;
use Drupal\Core\Annotation\Translation;

/**
 * Plugin implementation of the 'example_widget' widget.
 *
 * @FieldWidget(
 *   id = "example_widget",
 *   module = "example_fieldwidget",
 *   label = @Translation("Demo widget"),
 *   field_types = {
 *     "text",
 *     "demo_field_type",
 *   }
 * )
 */
class ExampleFieldWidget extends WidgetBase {

  /**
   * {@inheritdoc}
   */
  // public static function defaultSettings() {
  //   return [
  //     'size' => 60,
  //     'code_size' => 5, 
  //     'placeholder' => [
  //       'number' => '',
  //       'code' => '', 
  //     ]
  //   ] + parent::defaultSettings();
  // }
  public static function defaultSettings() {
    return [
      'size' => 60,
      'placeholder' =>  '',
    ] + parent::defaultSettings();
  }

  /**
   * {@inheritdoc}
   */
  public function settingsForm(array $form, FormStateInterface $form_state) {
    $elements = [];

    $elements['size'] = [
      '#type' => 'number',
      '#title' => t('Size of textfield'),
      '#default_value' => $this->getSetting('size'),
      '#required' => TRUE,
      '#min' => 1,
    ];
    $elements['placeholder'] = [
      '#type' => 'textfield',
      '#title' => t('Placeholder'),
      '#default_value' => $this->getSetting('placeholder'),
      '#description' => t('Text that will be shown inside the field until a value is entered. This hint is usually a sample value or a brief description of the expected format.'),
    ];
    $elements['placeholder'] = [
      '#type' => 'details',
      '#title' => $this->t('Placeholder'),
      '#description' => $this->t('Text that will be shown inside the field until a value is entered. This hint is usually a sample value or a brief description of the expectedformat.'),
    ]; 
    // $elements['code_size'] = [
    //   '#type' => 'number',
    //   '#title' => $this->t('Size of plate code textfield'),
    //   '#default_value' => $this->getSetting('code_size'),
    //   '#required' => TRUE,
    //   '#min' => 1,
    //   '#max' => $this->getFieldSetting('code_max_length'),
    // ]; 
    // $placeholder_settings = $this->getSetting('placeholder');
    // $elements['placeholder']['number'] = [
    //   '#type' => 'textfield',
    //   '#title' => $this->t('Number field'),
    //   '#default_value' => $placeholder_settings['number'],
    // ];
    // $elements['placeholder']['code'] = [
    //   '#type' => 'textfield',
    //   '#title' => $this->t('Code field'),
    //   '#default_value' => $placeholder_settings['code'],
    // ]; 

    return $elements;
  }

  /**
   * {@inheritdoc}
   */
  public function settingsSummary() {
    $summary = [];

    $summary[] = t('Textfield size: @size', ['@size' => $this->getSetting('size')]);
    if (!empty($this->getSetting('placeholder'))) {
      $summary[] = t('Placeholder: @placeholder', ['@placeholder' => $this->getSetting('placeholder')]);
    }

    return $summary;
  }

  /**
   * {@inheritdoc}
   */
  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {
    $element['value'] = $element + [
      '#type' => 'textfield',
      '#default_value' => isset($items[$delta]->value) ? $items[$delta]->value : NULL,
      '#size' => $this->getSetting('size'),
      '#placeholder' => $this->getSetting('placeholder'),
      '#maxlength' => $this->getFieldSetting('max_length'),
    ];

    return $element;
  }

}
