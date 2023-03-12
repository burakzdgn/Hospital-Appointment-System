<?php 
require('sys.php');
$doctorAjax = $_POST["doctorId"];
$dateAjax = $_POST["dateChoose"];
$myOption = '<option selected disabled value="0">Choose time</option>';
$doctorList = $db->query("SELECT * FROM `appointmenttimes` where `time` NOT IN (SELECT DISTINCT notavailabletime FROM `getdoctoravailabletime` WHERE `docid` = $doctorAjax and notavailabledate = '$dateAjax')");
while($row = $doctorList->fetch())
{
    echo'<option name="time" value="'.$row["time"].'">'.$row["time"].'</option>';
}
?>