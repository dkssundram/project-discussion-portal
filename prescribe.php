<!DOCTYPE html>
<?php
include('func1.php');
$sid='';
$ID='';
$appdate='';
$apptime='';
$fname = '';
$lname= '';
$faculty = $_SESSION['dname'];
if(isset($_GET['sid']) && isset($_GET['ID']) && ($_GET['appdate']) && isset($_GET['apptime']) && isset($_GET['fname']) && isset($_GET['lname'])) {
$sid = $_GET['sid'];
  $ID = $_GET['ID'];
  $fname = $_GET['fname'];
  $lname = $_GET['lname'];
  $appdate = $_GET['appdate'];
  $apptime = $_GET['apptime'];
}



if(isset($_POST['prescribe']) && isset($_POST['sid']) && isset($_POST['ID']) && isset($_POST['appdate']) && isset($_POST['apptime']) && isset($_POST['lname']) && isset($_POST['fname'])){
  $appdate = $_POST['appdate'];
  $apptime = $_POST['apptime'];
  // $disease = $_POST['disease'];
  // $allergy = $_POST['allergy'];
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $sid = $_POST['sid'];
  $ID = $_POST['ID'];
  $feedback = $_POST['feedback'];
  
  $query=mysqli_query($con,"insert into feedtb(faculty,sid,ID,fname,lname,appdate,apptime,feedback) values ('$faculty','$sid','$ID','$fname','$lname','$appdate','$apptime','$feedback')");
    if($query)
    {
      echo "<script>alert('Feedback given successfully!');</script>";
    }
    else{
      echo "<script>alert('Unable to process your request. Try again!');</script>";
    }
  // else{
  //   echo "<script>alert('GET is not working!');</script>";
  // }initial
  // enga error?
}

?>

<html lang="en">
  <head>


    <!-- Required meta tags -->
    <meta charset="utf-8">
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />
    <meta name="viewport" content="width=device-width, -scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap CSS -->
    
        <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
      <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
  <a class="navbar-brand" href="#"><i class="fa fa-user-plus" aria-hidden="true"></i> Project Discussion Portal </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <style >
    .bg-primary {
    background: -webkit-linear-gradient(left, #3931af, #00c6ff);
}
.list-group-item.active {
    z-index: 2;
    color: #fff;
    background-color: #342ac1;
    border-color: #007bff;
}
.text-primary {
    color: #342ac1!important;
}

.btn-primary{
  background-color: #3c50c1;
  border-color: #3c50c1;
}
  </style>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
     <ul class="navbar-nav mr-auto">
       <li class="nav-item">
        <a class="nav-link" href="logout1.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a>
        
      </li>
       <li class="nav-item">
       <a class="nav-link" href="faculty-panel.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Back</a>
      </li>
    </ul>
  </div>
</nav>

</head>
  <style type="text/css">
    button:hover{cursor:pointer;}
    #inputbtn:hover{cursor:pointer;}
  </style>

<body style="padding-top:50px;">
   <div class="container-fluid" style="margin-top:50px;">
    <h3 style = "margin-left: 40%;  padding-bottom: 20px; font-family: 'IBM Plex Sans', sans-serif;"> Welcome &nbsp<?php echo $faculty ?>
   </h3>

   <div class="tab-pane" id="list-pres" role="tabpanel" aria-labelledby="list-pres-list">
        <form class="form-group" name="prescribeform" method="post" action="prescribe.php">
        
          <div class="row">
                  <!-- <div class="col-md-4"><label>Disease:</label></div>
                  <div class="col-md-8"> -->
                  <!-- <input type="text" class="form-control" name="disease" required> -->
                  <!-- <textarea id="disease" cols="86" rows ="5" name="disease" ></textarea>
                  </div><br><br><br> -->
                  
                  <!-- <div class="col-md-4"><label>Allergies:</label></div>
                  <div class="col-md-8"> -->
                  <!-- <input type="text"  class="form-control" name="allergy" required> -->
                  <!-- <textarea id="allergy" cols="86" rows ="5" name="allergy" required></textarea>
                  </div><br><br><br> -->
                  <div class="col-md-4"><label>Feedback:</label></div>
                  <div class="col-md-8">
                  <!-- <input type="text" class="form-control"  name="feedback"  required> -->
                  <textarea id="feedback" cols="86" rows ="10" name="feedback" required></textarea>
                  </div><br><br><br>
                  <input type="hidden" name="fname" value="<?php echo $fname ?>" />
                  <input type="hidden" name="lname" value="<?php echo $lname ?>" />
                  <input type="hidden" name="appdate" value="<?php echo $appdate ?>" />
                  <input type="hidden" name="apptime" value="<?php echo $apptime ?>" />
                  <input type="hidden" name="sid" value="<?php echo $sid ?>" />
                  <input type="hidden" name="ID" value="<?php echo $ID ?>" />
                  <br><br><br><br>
          <input type="submit" name="prescribe" value="Give Feedback" class="btn btn-primary" style="margin-left: 40pc;">
          
        </form>
        <br>
        
      </div>
      </div>
      

  
