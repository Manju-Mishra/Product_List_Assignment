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

<body>
    <div class="container">
        <table class="table table-hover mr-12" border=2>
            <tr>
                <td colspan="10" align="center" id="a" class="table-success" style="font-size:30px; font-weight:bold;color:brown">Queries</td>
            </tr>
            <tr>
                <th class="table-success">S.no</th>
                <th class="table-warning">Email</th>
                <th class="table-secondary">Name</th>
                <th class="table-warning">Mobile No</th>
                <th class="table-danger">Queries</th>
                <th class="table-secondary">Action</th>
            </tr>
            <?php
            $sel = mysqli_query($conn, "select * from enquery order by id desc");
            if (mysqli_num_rows($sel) > 0) {
                $sn = 1;
                while ($arr = mysqli_fetch_assoc($sel)) {
            ?>
                    <tr>
                        <td class="table-success"><?php echo $sn; ?></td>
                        <td class="table-warning"><?php echo $arr['email']; ?></td>
                        <td class="table-secondary"><?php echo  $arr['name']; ?></td>
                        <td class="table-warning"><?php echo  $arr['mobile']; ?></td>
                        <td class="table-danger"><?php echo  $arr['query']; ?></td>
                        <td class="table-secondary">
                            <a href="" class="btn btn-danger">Reply</a>
                        </td>
                    </tr>
                <?php
                    $sn++;
                }
            } else {
                ?>
                <tr>
                    <td colspan="6" align="center">No record found</td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
</body>

</html>