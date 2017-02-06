<?php

namespace Drupal\novaftl_404\Controller;

class NovaFtl404Controller {
  public function page404() {
    return [
      '#theme' => 'novaftl_page_404'
    ];
  }
}
