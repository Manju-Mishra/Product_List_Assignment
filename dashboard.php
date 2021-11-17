<?php
include("dbconn.php");
$msg = '';

//for Delete product
if (isset($_GET['del']))
 {
    $id = $_GET['del'];

    if (mysqli_query($conn, "delete from products where id=$id"))
     {
        $msg = "deleted successfully";
    }
     else
        $msg = "not deleted";
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
    <div class="container">
        <?php
        if (!empty($msg)) 
        {
        ?>
            <div class="alert alert-danger"><?php echo $msg; ?></div>
        <?php
        }
        ?>
        <table class="table table-hover mr-12" border=2>
            <tr>
                <td colspan="10" align="center" id="addlist" style="font-size:30px;font-weight:bold;background-color:brown"><a href="Pro_List.php" class="text-warning">Add Products</a></td>
            </tr>
            <tr>
                <td colspan="10" align="center" id="a" class="table-success" style="font-size:30px; font-weight:bold;color:brown">Product List</td>
            </tr>
            <tr class="bg-dark text-light">
                <th>S.no</th>
                <th>Product name</th>
                <th>Price</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
            <?php
            $sel = mysqli_query($conn, "select * from products order by id asc");
            if (mysqli_num_rows($sel) > 0)
             {
                $sn = 1;
                while ($arr = mysqli_fetch_assoc($sel)) 
                {
            ?>
                    <tr class="table-secondary">
                        <td><?php echo $sn; ?></td>
                        <td><?php echo $arr['product']; ?></td>
                        <td><?php echo  $arr['price']; ?></td>
                        <td><img src="<?php echo  $arr['image']; ?>" height=60 weight=120> </td>
                        <td>
                            <a href="Edit_Products.php?edit=<?php echo $arr['id']; ?>" class="btn btn-danger">Update</a>
                            <a href="?del=<?php echo $arr['id']; ?>" class="btn  btn-danger" id="delete">Delete</a>
                        </td>
                    </tr>
                <?php
                    $sn++;
                }
            } 
            else 
            {
                ?>
                <tr>
                    <td colspan="6" align="center">No record found</td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div><br><br><br>






    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {


            $('#delete').click(function() {
                alert("are u sure u want to delete ??")

            })
        });
    </script>
</body>

</html>