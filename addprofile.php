
<?PHP
include"db.php";
  if(!empty($_FILES['Upload']))
  {
    
    $path = "uploads/";
    $path = $path . basename( $_FILES['uploaded_file']['name']);
    if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $path)) {
      echo "The file ".  basename( $_FILES['uploaded_file']['name']). 
      " has been uploaded";
    } else{
        echo "There was an error uploading the file, please try again!";
    }
    $sqli="UPDATE usern set user_image='$uploaded_file'";
    mysqli_query($conn, $sqli);
  }
?>