<?php
namespace Drupal\productentity\Annotation;
use Drupal\Component\Annotation\Plugin;
/**
 * Defines an Importer item annotation object.
 *
 * @see \Drupal\products\Plugin\ImporterManager
 *
 * @Annotation
 */
class Importer extends Plugin {
  /**
  * 
  * The plugin ID.
  * @var string
  */
  public $id;
  /**
   * The label of the plugin.
   *
   * @var \Drupal\Core\Annotation\Translation
   *
   * @ingroup plugin_translatable
   */
  public $label;
}