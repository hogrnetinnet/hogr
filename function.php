 <?php


include "db.php";

    function gettopics (){
      GLOBAL $conn;
$sqli="SELECT * from topic";
             $res=mysqli_query($conn, $sqli);
             while ($row=mysqli_fetch_array($res)) {
               $topic_id=$row['topic_id'];
              $topic_name=$row['topic_name'];
               
             
           echo  "<option value ='$topic_id'>$topic_name</option>";
             } 


    }

      function insertpost(){
      	if (isset($_POST['sub'])) {
      		global $conn;
      		global $user_id;
      		$title  =addslashes ($_POST['title']);
      		$content  =addslashes($_POST['content']);
      		$topic=$_POST["topic"];




      		   if ($content=='' &&  $title=='') {
      		   
      		   	echo "<script>alert('failed')</script>";
      		   	exit();
      		   }else {
      		   	$sqli="INSERT into postss (user_id,topic_id,post_title,post_content,post_date) values ('$user_id','$topic','$title', '$content', NOW())";
      		   	$rese=mysqli_query($conn, $sqli);
      		   	if ($rese) {
      		   		
      		   		$updates="UPDATE usern set posts='yes' where user_id='$user_id '";
      		   		$reset=mysqli_query($conn, $updates);
      		   	}
      		   }
      	}
      } 






          
?>



