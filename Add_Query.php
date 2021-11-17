<?php
include("dbconn.php");
$msg='';
if(isset($_POST['send']))
{
   $name=$_POST['name'];
   $email=$_POST['email'];
   $mob=$_POST['mob'];
   $msg=$_POST['msg'];
   if(!empty($name) && !empty($email) &&!empty($mob) && !empty($msg))
   {
     if(mysqli_query($conn,"insert into enquery(name,email,mobile,query) values('$name','$email',$mob,'$msg')"))
     {
         $msg="Your query submitted successfully";
         header("location:enquery.php");
     }
     else
     $msg="Your query not submitted successfully";
   }
   else
   $msg="All fields are required";
}
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <div class=" container mt-1 col-10" style="background-color:tan"><br>
        <h2 class="text-dark" style="font-family:fantasy;"><i>QUERY PAGE</i></h2><br>
        <?php 
        if(!empty($msg))
        {
        ?>
        <div class="alert alert-warning"><?php echo $msg;?></div>
        <?php
        }
        ?>
        <form method="post">
        <div class="form-group">
            <input type="text" name="name" placeholder="Name " class="form-control bg-light col-10">
        </div>
        <div class="form-group">
            <input type="text" name="email" placeholder="email@123" class="form-control col-10">
        </div>
        <div class="form-group">
            <input type="number"name="mob" placeholder=" Mobile number " class="form-control col-10">
        </div>
        <div class="form-group">
         <textarea  name="msg" cols="30" rows="5" class="form-control col-10" placeholder="enter your query"></textarea>
        </div><br>
        <input type="submit" value="Submit" name="send" class="btn btn-danger col-8"><br><br>
    </div>
    </form>
</body>

</html>