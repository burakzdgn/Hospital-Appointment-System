<?php 
require('sys.php');
$serviceAjax = $_POST["serviceIdSelect"];
$myOption = '<option disabled selected value="0">Choose a doctor</option>';
$doctorList = $db->query("SELECT * FROM doctors WHERE serviceId = '".$serviceAjax."'");
echo $myOption;
while($row = $doctorList->fetch())
{
    echo'<option name="doctor" value="'.$row["id"].'">'.$row["name"].' '.$row["surname"].'</option>';
}
?>