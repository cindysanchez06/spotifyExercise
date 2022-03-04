<?php


namespace Drupal\spotify\Services;

class ReleasesService
{
  /**
   * @var SpotifyServices
   */
  private $spotifyServices;

  public function __construct()
  {
    $this->spotifyServices = \Drupal::service('spotify.spotify_services');;
  }

  public function get(){
    $items = $this->spotifyServices->getReleases();
    return $items['albums']['items'];
  }

}
