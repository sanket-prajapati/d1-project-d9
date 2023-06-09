<?php

namespace Drupal\config_impoter_entity\Entity;

use Drupal\Core\Config\Entity\ConfigEntityInterface;
use Drupal\Core\Url;

/**
 * Provides an interface for defining Example impoter entities.
 */
interface exampleImpoterInterface extends ConfigEntityInterface {

  // Add get/set methods for your configuration properties here.
  /**
    * Returns the Url where the import can get the data from.
  *
  * @return Url
  */
  public function getUrl();
   /**
   * Returns the Importer plugin ID to be used by this importer.
   *
   * @return string
   */
  public function getPluginId();
  /**
   * Whether or not to update existing products if they have already been imported.
   *
   * @return bool
   */
  public function updateExisting();
  /**
   * Returns the source of the products.
   *
   * @return string
   */
  public function getSource();

  

}
