<?php
include("dbconn.php");
$id=$_GET['edit'];
$sel=mysqli_query($conn,"select * from products where id=$id");
$arr=mysqli_fetch_assoc($sel);
if(isset($_POST['update']))
{
  $product=$_POST['pro'];
  $price=$_POST['price'];
  $tmp=$_FILES['img']['tmp_name'];
  $fname=$_FILES['img']['name'];
  $dest="images/";
  $mov=$dest.$fname;
  if(!empty($product) && !empty($price) && !empty($tmp) )
  {
    if(mysqli_query($conn,"update products set product='$product',price=$price,image='$mov' where id=$id"))
    {
       move_uploaded_file($tmp,$dest.$fname);  
       header("location:dashboard.php");
    }
    else
    $msg= "Product not updated";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="style.css">
  <title>Edit_Products</title>
</head>
<body>
    <div class="container table-secondary mt-4 col-6">
    <h2><i>ENTER DETAILS</i></h2>

   <?php 
   if(!empty($msg))
   {
     ?>
  <div class="alert alert-danger"><?php echo $msg;?></div>
  <?php
   }
   ?> 

     <form method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label>Product</label>
        <input type="text" name="pro"  placeholder="enter product_name" class="form-control col-8" value="<?php echo $arr['product'];?>">
      </div>
      <div class="form-group">
        <label>Price</label>
        <input type="text" name="price"  placeholder="enter amount " class="form-control col-8" value="<?php echo $arr['price'];?>">
      </div>
      <div class="form-group">
        <label>Upload</label>
        <input type="file" name="img"  class="form-control col-8" value="<?php echo $arr['image'];?>">
      </div><br>
      <input type="submit" value="Update" name="update" id="btn" class="btn btn-success col-8"><br><br>
    </div>
    </form><br><br>



</body>
</html>