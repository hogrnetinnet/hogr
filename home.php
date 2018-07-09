<?php 
session_start();

if(empty($_SESSION['email'])) {
  header("Location: index.php");
  exit();
}
#include "function.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">

    <!-- Website CSS style -->
    <link rel="stylesheet" type="text/css" href="style2.css">
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">

    <!-- Website Font style -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    
    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

   <link rel="stylesheet" type="text/css" href="style/style.css">
  </head>
  <body>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-14">
      <nav class="navbar navbar-default">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"> Social network</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="profile.php">Profile <span class="sr-only">(current)</span></a></li>
        <li><a href="home.php">Home</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <?php

             include"db.php";
             $sqli="SELECT * from topic";
             $res=mysqli_query($conn, $sqli);
             while ($row=mysqli_fetch_array($res)) {
               $topic_id=$row['topic_id'];
              $topic_name=$row['topic_name'];
               
             
           echo  "<li><a href='topic.php?topic=$topic_id'>$topic_name</a></li>";
             } ?>
          </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Search</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Setting <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="logout.php">logout</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
    </div>
  </div><!-- /.row -->
</div><!-- /.container -->

<div class="container">
      <div class="row">
        <div class="col-md-3">
           <?php
           include "function.php";
        include"db.php";
    $user=$_SESSION["email"];
    $get_users="SELECT * from usern where email='$user' ";
 
    $run=mysqli_query($conn, $get_users);
    $row=mysqli_fetch_array($run);
    $user_id=$row["user_id"];
    $Username=$row["Username"];
    $Gender=$row["Gender"];
    $user_image=$row["user_image"];
    $user_date=$row["user_date"];
     $firstname=$row["firstname"];
      $lastname=$row["lastname"];

   $post="SELECT * from posts where user_id='$user_id' ";
  
    $run=mysqli_query($conn, $post);
    $rowe=mysqli_num_rows($run);
      //mesgae select 
    $mesgae="SELECT * from message where receiver='$user_id' and status='unread' order by 1 desc ";
    $rune=mysqli_query($conn, $mesgae);
    $row=mysqli_num_rows($rune);
         ?>
        <div class="well">
          <div class="card hovercard">
        <div class="card-background">
            <img class="card-bkimg" alt="" src="http://lorempixel.com/100/100/people/9/">
            <!-- http://lorempixel.com/850/280/people/9/ -->
        </div>
        <div class="useravatar">
            <img alt="" src="<?php echo $user_image; ?>">
        </div>
        <div class="card-info"> <span class="card-title"></span><p><?php echo $Username; ?></p>

        </div>
        

    </div>
    <p><?php echo $Username;  ?></p>
    <p><?php echo $Gender;  ?></p>
    <p><?php echo $user_date;  ?></p>
    <p><?php echo $lastname;  ?></p>
    <p><?php echo $firstname;  ?></p>
        </div>
      </div>
         <div class="col-md-6">
         <div class="well">
           <div class="box">
             <div class="box box-header">
               <p>hogr</p>
               <div class="box-body">
                <form  class="form-horizontal" action="home.php?id=<?php echo $user_id; ?>" method="post">
    <div class="form-group">
      <input class="form-control" type="text" name="title" placeholder="your name">
    <textarea class="form-control" name="content" placeholder="What is happen on your day"></textarea>
    <select class="selectpicker" name="topic">
    <option>Select topic</option>
    <?php  gettopics(); ?>
    </select>
    <button type="submit" name="sub" class="btn btn-primary">Post</button>
    <?php  insertpost() ?>
</div>

  </form>
                
               </div>
             </div>
           </div>
         </div>
         <!--main area for posing-->
        
                   <?php 
           
           global $conn;
          global $user_id;
                $get_post="SELECT * from postss  where user_id='$user_id' ORDER BY post_id desc";
   $SrNo=0;
         $res=mysqli_query($conn, $get_post);
             while ($row=mysqli_fetch_array($res)) {
              $post_id=$row["post_id"];
              $user_id=$row["user_id"];
              $topic_id=$row["topic_id"];
              $post_title=$row["post_title"];
              $post_content=$row["post_content"];
              $post_date=$row["post_date"];
              $SrNo++;

    $get_users="SELECT * from usern where user_id='$user_id' and posts='yes'";
    $ress=mysqli_query($conn, $get_users);
             while ($row=mysqli_fetch_array($ress)){ 
                $username =$row['Username'];
                $user_image =$row['user_image'];
                

  

?>    
                    
                 <div class="well">
                  <?php echo $SrNo++;  ?>
                   <p><?php echo $Username; ?></p>
                   <p><?php echo $post_date; ?></p>
                 <p><?php echo $post_title; ?></p>
               
                   <p class="btn_more"><?php echo $post_content; 
                         

                   ?>
                   
                    
                   </p>
                  
                 </div>
            
          <?php } } ?>
             <!--main area for posing-->
       </div>

          <div id="fff" class="col-md-3">
         <div class="well"></div>
        </div>
      </div>
    </div>
  

          



<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript">
  $(document).ready(function() {
$(".btn-pref .btn").click(function () {
    $(".btn-pref .btn").removeClass("btn-primary").addClass("btn-default");
    // $(".tab").addClass("active"); // instead of this do the below 
    $(this).removeClass("btn-default").addClass("btn-primary");   
});
});
    </script>

 <script>  
 $(document). ready(function()  {
  var readMoreHTML= $(".btn_more").html();
  var readLessHTML=readMoreHTML.substr(0,100);
  if (readMoreHTML.length > 100) {
    $(".btn_more").html(readLessHTML).append("<a href=''>show more </a>");
  }else {
   $(".btn_more").html(readMoreHTML);
  }
        $("body"). on("click",".readmore",function(event){
          event.preventdefault();
          $(this). parent(".btn_more"),html(readMoreHTML).append("<a href=''>show less </a>")
        });
        $("body"). on("click",".readless",function(event){
          event.preventdefault();
          $(this). parent(".btn_more"),html(readMoreHTML.substr(0,100)).append
          ("<a href=''>show more </a>")
        });
 });
 </script>


</body>
   </html>