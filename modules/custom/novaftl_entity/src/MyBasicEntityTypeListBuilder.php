<?php

namespace Drupal\novaftl_entity;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityListBuilder;
use Drupal\Core\Routing\LinkGeneratorTrait;
use Drupal\Core\Url;

/**
 * Defines a class to build a listing of My basic entity type entities.
 *
 * @ingroup novaftl_entity
 */
class MyBasicEntityTypeListBuilder extends EntityListBuilder {

  use LinkGeneratorTrait;

  /**
   * {@inheritdoc}
   */
  public function buildHeader() {
    $header['id'] = $this->t('My basic entity type ID');
    $header['name'] = $this->t('Name');
    return $header + parent::buildHeader();
  }

  /**
   * {@inheritdoc}
   */
  public function buildRow(EntityInterface $entity) {
    /* @var $entity \Drupal\novaftl_entity\Entity\MyBasicEntityType */
    $row['id'] = $entity->id();
    $row['name'] = $this->l(
      $entity->label(),
      new Url(
        'entity.my_basic_entity_type.edit_form', array(
          'my_basic_entity_type' => $entity->id(),
        )
      )
    );
    return $row + parent::buildRow($entity);
  }

}
