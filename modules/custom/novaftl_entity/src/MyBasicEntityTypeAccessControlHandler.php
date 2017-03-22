<?php

namespace Drupal\novaftl_entity;

use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;

/**
 * Access controller for the My basic entity type entity.
 *
 * @see \Drupal\novaftl_entity\Entity\MyBasicEntityType.
 */
class MyBasicEntityTypeAccessControlHandler extends EntityAccessControlHandler {

  /**
   * {@inheritdoc}
   */
  protected function checkAccess(EntityInterface $entity, $operation, AccountInterface $account) {
    /** @var \Drupal\novaftl_entity\Entity\MyBasicEntityTypeInterface $entity */
    switch ($operation) {
      case 'view':
        return AccessResult::allowedIfHasPermission($account, 'view published my basic entity type entities');

      case 'update':
        return AccessResult::allowedIfHasPermission($account, 'edit my basic entity type entities');

      case 'delete':
        return AccessResult::allowedIfHasPermission($account, 'delete my basic entity type entities');
    }

    // Unknown operation, no opinion.
    return AccessResult::neutral();
  }

  /**
   * {@inheritdoc}
   */
  protected function checkCreateAccess(AccountInterface $account, array $context, $entity_bundle = NULL) {
    return AccessResult::allowedIfHasPermission($account, 'add my basic entity type entities');
  }

}
