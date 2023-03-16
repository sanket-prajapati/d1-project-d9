<?php
namespace Drupal\config_impoter_entity\Plugin;
use Drupal\Component\Plugin\PluginInspectionInterface;
/**
 * Defines an interface for Importer plugins.
 */
interface ImporterPluginInterface extends PluginInspectionInterface {
 /**
 * Performs the import. Returns TRUE if the import was successful or FALSE otherwise.
 *
 * @return bool
 * */
 public function import();
}