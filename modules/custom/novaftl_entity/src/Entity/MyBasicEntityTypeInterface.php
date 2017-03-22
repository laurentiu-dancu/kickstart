<?php

namespace Drupal\novaftl_entity\Entity;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface for defining My basic entity type entities.
 *
 * @ingroup novaftl_entity
 */
interface MyBasicEntityTypeInterface extends  ContentEntityInterface {

  // Add get/set methods for your configuration properties here.

  /**
   * Gets the My basic entity type name.
   *
   * @return string
   *   Name of the My basic entity type.
   */
  public function getName();

  /**
   * Sets the My basic entity type name.
   *
   * @param string $name
   *   The My basic entity type name.
   *
   * @return \Drupal\novaftl_entity\Entity\MyBasicEntityTypeInterface
   *   The called My basic entity type entity.
   */
  public function setName($name);

}
