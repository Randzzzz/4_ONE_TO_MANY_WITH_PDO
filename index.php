<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="css/index.css">
  <link rel="stylesheet" href="css/header.css">
</head>

<body>
  <div class="title">
    <h1>Welcome To Music Artists Management System</h1>
  </div>
  <div class="form">
    <div class="items">
      <form action="core/handleForms.php" method="POST">
        <h3>Add new artist here!</h3>
        <p>
          <label for="firstName">First Name:</label>
          <input type="text" name="firstName" required>
        </p>
        <p>
          <label for="lastName">Last Name:</label>
          <input type="text" name="lastName" required>
        </p>
        <p>
          <label for="stageName">Stage Name:</label>
          <input type="text" name="stageName" required>
        </p>
        <p>
          <label for="gender">Gender:</label>
          <input type="text" name="gender" required>
        </p>
        <p>
          <label for="email">Email:</label>
          <input type="text" name="email" required>
          <input id="insertBtn" type="submit" name="insertArtistBtn">
        </p>

      </form>
    </div>
  </div>
  <div class="container">
    <table>
      <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Stage Name</th>
        <th>Gender</th>
        <th>Email</th>
        <th>Date Added</th>
        <th>Action</th>
      </tr>
      <?php $getAllArtist = getAllArtist($pdo); ?>
      <?php foreach ($getAllArtist as $row) { ?>
        <tr>
          <td><?php echo $row['first_name']; ?></td>
          <td><?php echo $row['last_name']; ?></td>
          <td><?php echo $row['stage_name']; ?></td>
          <td><?php echo $row['gender']; ?></td>
          <td><?php echo $row['email']; ?></td>
          <td><?php echo $row['date_added']; ?></td>
          <td>
            <a href="viewmusics.php?artist_id=<?php echo $row['artist_id']; ?>">View Musics</a> |
            <a href="editartist.php?artist_id=<?php echo $row['artist_id']; ?>">Edit</a> |
            <a href="deleteartist.php?artist_id=<?php echo $row['artist_id']; ?>">Delete</a>
          </td>
        </tr>
      <?php } ?>
    </table>
  </div>
</body>

</html>