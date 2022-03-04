<?php

namespace Drupal\spotify\Services;

class ArtistService
{
  /**
   * @var SpotifyServices
   */
  private $spotifyServices;

  public function __construct()
  {
    $this->spotifyServices = \Drupal::service('spotify.spotify_services');
  }

  public function get(string $id){
    $albums = $this->spotifyServices->getAlbumByArtist($id);
    $albumsTracks = [];
    foreach ($albums['items'] as $album){
      $album['tracks'] = $this->spotifyServices->getTracksByAlbum($album['id']);
      $albumsTracks[] = $album;
    }
    return [
      'artist' => $this->spotifyServices->getArtist($id),
      'albums' => $albumsTracks
    ];
  }
}
