<?php
/**
 * Created by PhpStorm.
 * User: zak
 * Date: 07.12.2016
 * Time: 11:28
 */

$firmaName = htmlspecialchars($_POST["firmaName"]);
$firmaStreet = htmlspecialchars($_POST["firmaStreet"]);
$psc = htmlspecialchars($_POST["psc"]);
$city = htmlspecialchars($_POST["city"]);
$ico = htmlspecialchars($_POST["ico"]);
$dic = htmlspecialchars($_POST["dic"]);
$email = htmlspecialchars($_POST["email"]);
isset($_POST["repeatVisit"]) ? $repeatVisit=htmlspecialchars($_POST["repeatVisit"]): $repeatVisit = "První registrace nebo oprava";
$firmaNameWeb = htmlspecialchars($_POST["firmaNameWeb"]);
$anotaceWeb = htmlspecialchars($_POST["anotaceWeb"]);
$logoWeb = $_FILES;
$kontaktName = htmlspecialchars($_POST["kontaktName"]);
$kontaktTel = htmlspecialchars($_POST["kontaktTel"]);
$kontaktEmail = htmlspecialchars($_POST["kontaktEmail"]);
$note = htmlspecialchars($_POST["note"]);

//$con = mysqli_connect("localhost","vos20","t59kolka","VOS20LET");

$sql="INSERT INTO registrace (firmaName,firmaStreet,psc,city,ico,dic,email,repeatVisit,firmaNameWeb,anotaceWeb,kontaktName,kontaktTel,kontaktEmail,note)
VALUES ('$firmaName','$firmaStreet','$psc','$city','$ico','$dic','$email','$repeatVisit','$firmaNameWeb','$anotaceWeb','$kontaktName','$kontaktTel','$kontaktEmail','$note');";

echo $sql;
print_r($logoWeb);

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["logoWeb"]["name"]);

move_uploaded_file($_FILES["logoWeb"]["tmp_name"], $target_file)

// Check connection
/*if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
mysqli_query($con,"SET CHARACTER SET utf8");
if (mysqli_query($con,$sql)) $zprava = "Děkujeme za zaslání informací"; else $zprava = "Zaslani informací se bohužel nepodařilo";;
mysqli_close($con);
header("Location: https://www.spseplzen.cz/formular/?zpravaForm=$zprava");*/
?>