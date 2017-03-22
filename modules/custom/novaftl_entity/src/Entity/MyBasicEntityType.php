<?php

namespace Drupal\novaftl_entity\Entity;

use Drupal\Core\Entity\EntityStorageInterface;
use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Entity\EntityChangedTrait;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\user\UserInterface;

/**
 * Defines the My basic entity type entity.
 *
 * @ingroup novaftl_entity
 *
 * @ContentEntityType(
 *   id = "my_basic_entity_type",
 *   label = @Translation("My basic entity"),
 *   handlers = {
 *     "view_builder" = "Drupal\Core\Entity\EntityViewBuilder",
 *     "list_builder" = "Drupal\novaftl_entity\MyBasicEntityTypeListBuilder",
 *     "views_data" = "Drupal\novaftl_entity\Entity\MyBasicEntityTypeViewsData",
 *
 *     "form" = {
 *       "default" = "Drupal\novaftl_entity\Form\MyBasicEntityTypeForm",
 *       "add" = "Drupal\novaftl_entity\Form\MyBasicEntityTypeForm",
 *       "edit" = "Drupal\novaftl_entity\Form\MyBasicEntityTypeForm",
 *       "delete" = "Drupal\novaftl_entity\Form\MyBasicEntityTypeDeleteForm",
 *     },
 *     "access" = "Drupal\novaftl_entity\MyBasicEntityTypeAccessControlHandler",
 *     "route_provider" = {
 *       "html" = "Drupal\novaftl_entity\MyBasicEntityTypeHtmlRouteProvider",
 *     },
 *   },
 *   base_table = "my_basic_entity_type",
 *   admin_permission = "administer my basic entity type entities",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "name",
 *     "uuid" = "uuid",
 *   },
 *   links = {
 *     "canonical" = "/admin/structure/my_basic_entity_type/{my_basic_entity_type}",
 *     "add-form" = "/admin/structure/my_basic_entity_type/add",
 *     "edit-form" = "/admin/structure/my_basic_entity_type/{my_basic_entity_type}/edit",
 *     "delete-form" = "/admin/structure/my_basic_entity_type/{my_basic_entity_type}/delete",
 *     "collection" = "/admin/structure/my_basic_entity_type",
 *   },
 *   field_ui_base_route = "my_basic_entity_type.settings"
 * )
 */
class MyBasicEntityType extends ContentEntityBase implements MyBasicEntityTypeInterface {

  use EntityChangedTrait;

  /**
   * {@inheritdoc}
   */
  public static function preCreate(EntityStorageInterface $storage_controller, array &$values) {
    parent::preCreate($storage_controller, $values);
    $values += array(
      'user_id' => \Drupal::currentUser()->id(),
    );
  }

  /**
   * {@inheritdoc}
   */
  public function getName() {
    return $this->get('name')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setName($name) {
    $this->set('name', $name);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public static function baseFieldDefinitions(EntityTypeInterface $entity_type) {
    $fields = parent::baseFieldDefinitions($entity_type);

    $fields['name'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Name'))
      ->setDescription(t('The name of the My basic entity type entity.'))
      ->setSettings(array(
        'max_length' => 50,
        'text_processing' => 0,
      ))
      ->setDefaultValue('')
      ->setDisplayOptions('view', array(
        'label' => 'above',
        'type' => 'string',
        'weight' => -4,
      ))
      ->setDisplayOptions('form', array(
        'type' => 'string_textfield',
        'weight' => -4,
      ))
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    return $fields;
  }

}
