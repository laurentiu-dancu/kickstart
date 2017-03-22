<?php

namespace Drupal\novaftl_entity\Entity;

use Drupal\views\EntityViewsData;

/**
 * Provides Views data for My basic entity type entities.
 */
class MyBasicEntityTypeViewsData extends EntityViewsData {

  /**
   * {@inheritdoc}
   */
  public function getViewsData() {
    $data = parent::getViewsData();

    // Additional information for Views integration, such as table joins, can be
    // put here.

    return $data;
  }

}
