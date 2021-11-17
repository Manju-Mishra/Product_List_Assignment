<?php 
include("dbconn.php");
if(!empty($_POST['country_id']))
{
    $id=$_POST['country_id'];
    $sel=mysqli_query($conn,"select id,name from branch where branch_id=$id");
    echo "<option value=''>Salect sub-category</option>";
    while($arr=mysqli_fetch_assoc($sel))
    {
        echo "<option value='".$arr['id']."'> ".$arr['name']." </option>";
    }
}
?>