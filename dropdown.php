<?php 
include("dbconn.php");
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
</head>

<body style="background-color:teal"><br><br><br>
    <div class="container bg-dark col-6 mt-4"><br>
    <h1><i class="text-warning ml-4">&emsp;&emsp;Select Dropdown</i></h1><br>
    <div class="container">
        <div class="form-group">
            <select id="country" class="form-control">
                <option value="">Category</option>
                <?php
                 $sel=mysqli_query($conn,"select * from country");
                 while($arr=mysqli_fetch_assoc($sel)){
                 ?>
                 <option value="<?= $arr['id'];?>"><?= $arr['name'];?></option>
                 <?php
                 }
                ?>
            </select>
        </div><br>
        <div class="form-group">
            <select id="state" class="form-control">
                <option value="">Sub-category</option>
            </select>
        </div>
    </div><br><br>
    <br>
    </div>

    <script src="jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function()
        {
            $(document).on('change',"#country",function()
            {
               var countryid=$(this).val();
               if(countryid)
               {
                   $.ajax({
                       type:"post",
                       url:'drop.php',
                       data:{'country_id':countryid},
                       success:function(res)
                       {
                           $('#state').html(res);
                       }
                   })
               }
            });

         });
    </script>
</body>

</html>