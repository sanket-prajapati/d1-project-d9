<?php

namespace Drupal\config_impoter_entity\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBase;
use Drupal\Core\Url; 

/**
 * Defines the Example impoter entity.
 *
 * @ConfigEntityType(
 *   id = "example_impoter",
 *   label = @Translation("Example impoter"),
 *   handlers = {
 *     "view_builder" = "Drupal\Core\Entity\EntityViewBuilder",
 *     "list_builder" = "Drupal\config_impoter_entity\exampleImpoterListBuilder",
 *     "form" = {
 *       "add" = "Drupal\config_impoter_entity\Form\exampleImpoterForm",
 *       "edit" = "Drupal\config_impoter_entity\Form\exampleImpoterForm",
 *       "delete" = "Drupal\config_impoter_entity\Form\exampleImpoterDeleteForm"
 *     },
 *     "route_provider" = {
 *       "html" = "Drupal\config_impoter_entity\exampleImpoterHtmlRouteProvider",
 *     },
 *   },
 *   config_export = {
 *     "id",
 *     "label"
 *   },
 *   config_prefix = "example_impoter",
 *   admin_permission = "administer site configuration",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label",
 *     "uuid" = "uuid"
 *   },
 *   links = {
 *     "canonical" = "/admin/structure/example_impoter/{example_impoter}",
 *     "add-form" = "/admin/structure/example_impoter/add",
 *     "edit-form" = "/admin/structure/example_impoter/{example_impoter}/edit",
 *     "delete-form" = "/admin/structure/example_impoter/{example_impoter}/delete",
 *     "collection" = "/admin/structure/example_impoter"
 *   }
 * )
 */
class exampleImpoter extends ConfigEntityBase implements exampleImpoterInterface {

  /**
   * The Example impoter ID.
   *
   * @var string
   */
  protected $id;

  /**
   * The Example impoter label.
   *
   * @var string
   */
  protected $label;

  /**
   * The URL from where the import file can be retrieved.
   *
   * @var string
   */
  protected $url;
  /**
   * The plugin ID of the plugin to be used for processing this import.
   *
   * @var string
   */
  protected $plugin;
  /**
   * Whether or not to update existing products if they have already been imported.
   *
   * @var bool
   */
  protected $update_existing = TRUE;
  /**
   * The source of the products.
   *
   * @var string
   * */
  protected $source;
  /**
   * {@inheritdoc}
   */
  public function getUrl() {
  return $this->url ? Url::fromUri($this->url) : NULL;
  }
  /**
   * {@inheritdoc}
   */
  public function getPluginId() {
  return $this->plugin;
  }
  /**
   * {@inheritdoc}
   */
  public function updateExisting() {
  return $this->update_existing;
  }
  /**
   * {@inheritdoc}
   */
  public function getSource() {
  return $this->source;
  }

}
