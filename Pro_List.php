<?php
include("dbconn.php");
$msg='';
if(isset($_POST['addpro']))
{
  $product=$_POST['pro'];
  $price=$_POST['price'];
  $tmp=$_FILES['img']['tmp_name'];
  $fname=$_FILES['img']['name'];
  $dest="images/";
  $mov=$dest.$fname;
  if(!empty($product) && !empty($price) && !empty($tmp) )
  {
    if(mysqli_query($conn,"insert into products (product,price,image) values('$product',$price,'$mov')"))
    {
       move_uploaded_file($tmp,$dest.$fname);  
       header("location:dashboard.php");
    }
    else
    $msg= "Product not added";
  }
  else
  $msg="fill all the fields";
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   
  <link rel="stylesheet" href="style.css">
    <title>List</title>
</head>
<body class="bg-dark">
    <div class="container table-secondary mt-4 col-6"><br>
    <?php 
   if(!empty($msg))
   {
     ?>
  <div class="alert alert-danger"><?php echo $msg;?></div>
  <?php
   }
   ?> 
    <h2><i id="head" class="list">ENTER DETAILS</i></h2><br>

  

     <form method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label>Product</label>
        <input type="text" name="pro"  placeholder="enter products" class="form-control col-8">
      </div>
      <div class="form-group">
        <label>Price</label>
        <input type="text" name="price"  placeholder="enter amount " class="form-control col-8">
      </div>
      <div class="form-group">
        <label>Upload</label>
        <input type="file" name="img"  class="form-control col-8">
      </div><br>
      <input type="submit" value="ADD" name="addpro" id="btn" class="btn text-light add col-8"><br><br>
       
     </form>
    </div>
    <br><br>


 



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
       $(document).ready(function()
       {
      

        $('#delete').click(function(){
         alert("are u sure u want to delete ??")
        
        })
       });
    </script>
</body>
</html>