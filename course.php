<?php
include("dbconn.php");
?>
<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="style.css">
  <title>Document</title>
</head>

<body class="bg-secondary">
  <div class="row">
    <div class="col-sm-4 text-center">
      <div class="jumbtron">
        <div class="list-group">
          <div class="list-group-item list-group-item-action active bg-warning fa fa-file-archive-o" style="height:70px;font-size:30px;">&emsp;COURSES</div>
          <?php
          $query = mysqli_query($conn, "select * from course order by id asc");
          while ($arr = mysqli_fetch_assoc($query)) { ?>
           
              <div class="list-group-item list-group-item-action bg-dark text-light" id="a"><?php echo $arr['course']; ?>
              <a href="?con=query"> <input type="button" value="Enquery" id="query" name="query" class="btn  text-light ml-4"style="float:right;background-color:darkslategray;"></a>
          </div>
         
          <?php
           }
         ?>
         
          </div>
      </div>
    </div>
   
    <div class="col-sm-6 text-center">
      <div class="jumbtron">
      <?php
        switch (@$_GET['con']) {
          case 'query': include("Add_Query.php");
         break;
         
        }
      
        ?>


      </div>
    </div>
   
    </div>
 
    
   


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
      $(document).ready(function() {
        $('#a').click(function() {
          $(this).css("background-color", "darkslategray");
        })
      });
    </script>
</body>

</html>