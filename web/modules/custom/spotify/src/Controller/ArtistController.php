<?php

namespace Drupal\spotify\Controller;

use Drupal\Core\Controller\ControllerBase;

class ArtistController extends ControllerBase
{

  private mixed $artistService;

  public function __construct()
  {
    $this->artistService = \Drupal::service('spotify.artist_service');
  }

  public function index(string $id)
  {
    $data = $this->artistService->get($id);
    return [
      '#theme' => "artist_list",
      '#artist' => $data['artist'],
      '#albums' => $data['albums'],
      '#title' => $this->t('List Artist')
    ];
  }
}
