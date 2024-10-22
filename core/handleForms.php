<?php

require_once 'dbConfig.php';
require_once 'models.php';

if (isset($_POST['insertArtistBtn'])) {

  $query = insertArtist($pdo, $_POST['firstName'], $_POST['lastName'], $_POST['stageName'], $_POST['gender'], $_POST['email']);

  if ($query) {
    header("Location: ../index.php");
  } else {
    echo "Insertion failed";
  }

}

if (isset($_POST['editArtistBtn'])) {
  $query = updateArtist($pdo, $_POST['firstName'], $_POST['lastName'], $_POST['stageName'], $_POST['gender'], $_POST['email'], $_GET['artist_id']);

  if ($query) {
    header("Location: ../index.php");
  } else {
    echo "Edit failed";
    ;
  }

}

if (isset($_POST['deleteArtistBtn'])) {
  $query = deleteArtist($pdo, $_GET['artist_id']);

  if ($query) {
    header("Location: ../index.php");
  } else {
    echo "Deletion failed";
  }
}

if (isset($_POST['insertNewMusicBtn'])) {
  $query = insertMusic($pdo, $_POST['title'], $_POST['genre'], $_POST['dateRelease'], $_POST['countryArea'], $_GET['artist_id']);

  if ($query) {
    header("Location: ../viewmusics.php?artist_id=" . $_GET['artist_id']);
  } else {
    echo "Insertion failed";
  }
}

if (isset($_POST['editMusicBtn'])) {
  $query = updateMusic($pdo, $_POST['title'], $_POST['genre'], $_POST['dateRelease'], $_POST['countryArea'], $_GET['music_id']);

  if ($query) {
    header("Location: ../viewmusics.php?artist_id=" . $_GET['artist_id']);
  } else {
    echo "Update failed";
  }

}

if (isset($_POST['deleteMusicBtn'])) {
  $query = deleteMusic($pdo, $_GET['music_id']);

  if ($query) {
    header("Location: ../viewmusics.php?artist_id=" . $_GET['artist_id']);
  } else {
    echo "Deletion failed";
  }
}
?>