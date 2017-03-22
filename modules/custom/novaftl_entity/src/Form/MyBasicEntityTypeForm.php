<?php

namespace Drupal\novaftl_entity\Form;

use Drupal\Core\Entity\ContentEntityForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Form controller for My basic entity type edit forms.
 *
 * @ingroup novaftl_entity
 */
class MyBasicEntityTypeForm extends ContentEntityForm {

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    /* @var $entity \Drupal\novaftl_entity\Entity\MyBasicEntityType */
    $form = parent::buildForm($form, $form_state);

    $entity = $this->entity;

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    $entity = &$this->entity;

    $status = parent::save($form, $form_state);

    switch ($status) {
      case SAVED_NEW:
        drupal_set_message($this->t('Created the %label My basic entity type.', [
          '%label' => $entity->label(),
        ]));
        break;

      default:
        drupal_set_message($this->t('Saved the %label My basic entity type.', [
          '%label' => $entity->label(),
        ]));
    }
    $form_state->setRedirect('entity.my_basic_entity_type.canonical', ['my_basic_entity_type' => $entity->id()]);
  }

}
