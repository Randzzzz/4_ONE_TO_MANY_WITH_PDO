<?php

function insertArtist($pdo, $first_name, $last_name, $stage_name, $gender, $email)
{

  $sql = "INSERT INTO artist_records (first_name, last_name, 
		stage_name, gender, email) VALUES(?,?,?,?,?)";

  $stmt = $pdo->prepare($sql);
  $executeQuery = $stmt->execute([
    $first_name,
    $last_name,
    $stage_name,
    $gender,
    $email
  ]);

  if ($executeQuery) {
    return true;
  }
}

function updateArtist($pdo, $first_name, $last_name, $stage_name, $gender, $email, $artist_id)
{

  $sql = "UPDATE artist_records
				SET first_name = ?,
					last_name = ?,
					stage_name = ?,
					gender = ?, 
					email = ?
				WHERE artist_id = ?
			";
  $stmt = $pdo->prepare($sql);
  $executeQuery = $stmt->execute([$first_name, $last_name, $stage_name, $gender, $email, $artist_id]);

  if ($executeQuery) {
    return true;
  }

}

function deleteArtist($pdo, $artist_id)
{
  $deleteArtist = "DELETE FROM artist_records WHERE artist_id = ?";
  $deleteStmt = $pdo->prepare($deleteArtist);
  $executeDeleteQuery = $deleteStmt->execute([$artist_id]);

  if ($executeDeleteQuery) {
    $sql = "DELETE FROM artist_records WHERE artist_id = ?";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$artist_id]);

    if ($executeQuery) {
      return true;
    }

  }

}

function getAllArtist($pdo)
{
  $sql = "SELECT * FROM artist_records";
  $stmt = $pdo->prepare($sql);
  $executeQuery = $stmt->execute();

  if ($executeQuery) {
    return $stmt->fetchAll();
  }
}

function getArtistByID($pdo, $artist_id)
{
  $sql = "SELECT * FROM artist_records WHERE artist_id = ?";
  $stmt = $pdo->prepare($sql);
  $executeQuery = $stmt->execute([$artist_id]);

  if ($executeQuery) {
    return $stmt->fetch();
  }
}

function getMusicsByArtist($pdo, $artist_id)
{

  $sql = "SELECT 
				music_records.music_id AS music_id,
				music_records.title AS title,
				music_records.genre AS genre,
				music_records.date_release AS date_release,
				music_records.country_area AS country_area,
				music_records.date_added AS date_added,
				CONCAT(artist_records.first_name,' ',artist_records.last_name) AS artist_owner
			FROM music_records
			JOIN artist_records ON music_records.artist_id = artist_records.artist_id
			WHERE music_records.artist_id = ? 
			ORDER BY music_records.music_id ASC;
			";

  $stmt = $pdo->prepare($sql);
  $executeQuery = $stmt->execute([$artist_id]);
  if ($executeQuery) {
    return $stmt->fetchAll();
  }
}




function insertMusic($pdo, $title, $genre, $date_release, $country_area, $artist_id)
{
  $sql = "INSERT INTO music_records (title, genre, date_release, country_area, artist_id) VALUES (?,?,?,?,?)";
  $stmt = $pdo->prepare($sql);
  $executeQuery = $stmt->execute([$title, $genre, $date_release, $country_area, $artist_id]);
  if ($executeQuery) {
    return true;
  }

}

function getMusicByID($pdo, $music_id)
{
  $sql = "SELECT 
				music_records.music_id AS music_id,
				music_records.title AS title,
				music_records.genre AS genre,
				music_records.date_release AS date_release,
				music_records.country_area AS country_area,
				music_records.date_added AS date_added,
				CONCAT(artist_records.first_name,' ',artist_records.last_name) AS artist_owner 
			FROM music_records
			JOIN artist_records ON music_records.artist_id = artist_records.artist_id
			WHERE music_records.music_id = ? 
      ORDER BY music_records.music_id ASC";

  $stmt = $pdo->prepare($sql);
  $executeQuery = $stmt->execute([$music_id]);
  if ($executeQuery) {
    return $stmt->fetch();
  }
}


function updateMusic($pdo, $title, $genre, $date_release, $country_area, $music_id)
{
  $sql = "UPDATE music_records
			        SET title = ?,
                genre = ?,
                date_release = ?,
                country_area = ?
			WHERE music_id = ?
			";
  $stmt = $pdo->prepare($sql);
  $executeQuery = $stmt->execute([$title, $genre, $date_release, $country_area, $music_id]);

  if ($executeQuery) {
    return true;
  }
}


function deleteMusic($pdo, $music_id)
{
  $sql = "DELETE FROM music_records WHERE music_id = ?";
  $stmt = $pdo->prepare($sql);
  $executeQuery = $stmt->execute([$music_id]);
  if ($executeQuery) {
    return true;
  }
}


?>