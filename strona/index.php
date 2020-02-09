<!DOCTYPE html>
<html>
<head>
<style>
.img
{
	height:200px;
	width:200px;
}
</style>
  <title>Upload Image</title>
</head>
<body>
  <form action="upload.php" method="post" enctype="multipart/form-data">
        Select Image File to Upload:
      <input type="file" name="file">
      <input type="submit" name="submit" value="Upload">
  </form>
  <hr>
  
<div id="magic">
  <?php
  // Include the database configuration file
  include 'config.php';
  // Get images from the database
  $query = $db->query("SELECT file_name FROM images ORDER BY uploaded_on DESC");
  if($query->num_rows > 0){
      while($row = $query->fetch_assoc()){
          $imageURL = 'uploads/'.$row["file_name"];
		  
  ?>
      <img class="img" src="<?= $imageURL; ?>" />
	  <br>
  <?php }} ?>
</div>
 </body>
</html>
