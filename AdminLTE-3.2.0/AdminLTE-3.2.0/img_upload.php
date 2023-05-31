<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Upload Image File</title>
  </head>
  <body>
    <form action="" method="post" enctype="multipart/form-data">      
    <!-- <label for="image">Image : </label> -->
    <input type="file" name="uploadfile"> <br> <br>
    <input type="submit" name="submit" value="upload file">Submit</input>
    </form>
  </body>
</html>
<?php
  @$filename=$_FILES["uploadfile"]["name"];
  @$tempname=$_FILES["uploadfile"]["tmp_name"];
  $folder="images/".$filename;
  echo $folder;
  move_uploaded_file($tempname,$folder);
?>
