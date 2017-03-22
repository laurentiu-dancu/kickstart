<?php

/**
 * @file
 * Contains my_basic_entity_type.page.inc.
 *
 * Page callback for My basic entity type entities.
 */

use Drupal\Core\Render\Element;

/**
 * Prepares variables for My basic entity type templates.
 *
 * Default template: my_basic_entity_type.html.twig.
 *
 * @param array $variables
 *   An associative array containing:
 *   - elements: An associative array containing the user information and any
 *   - attributes: HTML attributes for the containing element.
 */
function template_preprocess_my_basic_entity_type(array &$variables) {
  // Fetch MyBasicEntityType Entity Object.
  $my_basic_entity_type = $variables['elements']['#my_basic_entity_type'];

  // Helpful $content variable for templates.
  foreach (Element::children($variables['elements']) as $key) {
    $variables['content'][$key] = $variables['elements'][$key];
  }
}
