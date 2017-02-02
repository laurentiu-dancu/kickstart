<?php

namespace Drupal\novaftl_with_love\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a block to test caching.
 *
 * @Block(
 *   id = "novaftl_with_love_block",
 *   admin_label = @Translation("novaFTL With Love Block")
 * )
 */
class WithLoveBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $build = [
      '#theme' => 'novaftl_with_love_theme',
      '#content' => t('Drupal is ❤. Made with Drupal.'),
    ];

    return $build;
  }

}