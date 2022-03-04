<?php

namespace Drupal\spotify\Controller;

use Drupal\Core\Controller\ControllerBase;

class ReleasesController extends ControllerBase
{
  private mixed $releaseService;

  public function __construct()
  {
    $this->releaseService = \Drupal::service('spotify.releases_service');
  }

  public function index()
  {
    $releases = $this->releaseService->get();
    return [
      '#theme' => "releases_list",
      '#items' => $releases,
      '#title' => $this->t('List Releases')
    ];
  }

}
