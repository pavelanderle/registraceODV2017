<?php
/**
 * Created by PhpStorm.
 * User: zak
 * Date: 07.12.2016
 * Time: 11:28
 */
session_start();

$firmaName = htmlspecialchars($_POST["firmaName"]);
$_SESSION["firmaName"] = $firmaName;
$firmaStreet = htmlspecialchars($_POST["firmaStreet"]);
$_SESSION["firmaStreet"] = $firmaStreet;
$psc = htmlspecialchars($_POST["psc"]);
$_SESSION["psc"] = $psc;
$city = htmlspecialchars($_POST["city"]);
$_SESSION["city"] = $city;
$ico = htmlspecialchars($_POST["ico"]);
$_SESSION["ico"] = $ico;
$dic = htmlspecialchars($_POST["dic"]);
$_SESSION["dic"] = $dic;
$email = htmlspecialchars($_POST["email"]);
$_SESSION["email"] = $email;
isset($_POST["repeatVisit"]) ? $repeatVisit=htmlspecialchars($_POST["repeatVisit"]): $repeatVisit = "První registrace nebo oprava";
$firmaNameWeb = htmlspecialchars($_POST["firmaNameWeb"]);
$_SESSION["firmaNameWeb"] = $firmaNameWeb;
$anotaceWeb = htmlspecialchars($_POST["anotaceWeb"]);
$_SESSION["anotaceWeb"] = $anotaceWeb;
$_FILES["logoWeb"]["error"]!=4 ? $logoWeb = $_FILES : $logoWeb = false;
$kontaktName = htmlspecialchars($_POST["kontaktName"]);
$_SESSION["kontaktName"] = $kontaktName;
isset($_POST["kontaktTel"]) ? $kontaktTel=htmlspecialchars($_POST["kontaktTel"]): $kontaktTel = "Nevyplňeno";
$_SESSION["kontaktTel"] = $kontaktTel;
$kontaktEmail = htmlspecialchars($_POST["kontaktEmail"]);
$_SESSION["kontaktEmail"] = $kontaktEmail;
isset($_POST["note"]) ? $note=htmlspecialchars($_POST["note"]): $note = "Nevyplněno";
$_SESSION["note"] = $note;

//print_r($logoWeb);
$resNote = "";

if($logoWeb) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["logoWeb"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
    $errUploadApp = "";
    if (isset($_POST["submit"]) || 1) {
        $check = getimagesize($_FILES["logoWeb"]["tmp_name"]);
        //print_r($check);
        if ($check !== false) {
            //print_r($check);
            $uploadOk = 1;
        } else {
            $errUploadApp .= "Náhrávaný soubor není obrázek, ";
            $uploadOk = 0;
        }
    }
// Check if file already exists


    if (0 && file_exists($target_file)) {
        $errUploadApp .= "zadaný soubor již existuje, ";
        $uploadOk = 0;
    }
// Check file size
    if ($_FILES["logoWeb"]["size"] > 5000000) {
        $errUploadApp .= "nahrávaný soubor je příliš velký.";
        $uploadOk = 0;
    }
// Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        $errUploadApp .= "nahrávaný soubor musí být ve formátu JPG, JPEG, PNG.";
        $uploadOk = 0;
    }
// Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $resNote = "Soubor s logem bohužel nebyl uložen: " . $errUploadApp;
    } else {
        if (move_uploaded_file($_FILES["logoWeb"]["tmp_name"], $target_file)) {
            $resNote = "Soubor " . basename($_FILES["logoWeb"]["name"]) . " byl uložen.";
            $uploadOk = 1;
        } else {
            $resNote = "Soubor s logem bohužel nebyl uložen";

        }
    }

    //echo $resNote;
}

$con = mysqli_connect("localhost","root","","registraceODV");

$sql="INSERT INTO listpartners (firmaName,firmaStreet,psc,city,ico,dic,email,repeatVisit,firmaNameWeb,anotaceWeb,kontaktName,kontaktTel,kontaktEmail,note)
VALUES ('$firmaName','$firmaStreet','$psc','$city','$ico','$dic','$email','$repeatVisit','$firmaNameWeb','$anotaceWeb','$kontaktName','$kontaktTel','$kontaktEmail','$note');";

//echo $sql;
//print_r($logoWeb);

// Check connection
$errDBCon = "";
if (mysqli_connect_errno())
{
    $errDBCon = "Chyba ve spojení s DB: " . mysqli_connect_error();
}
mysqli_query($con,"SET CHARACTER SET utf8");

$errDB = "";
if($uploadOk==1){
    if (mysqli_query($con,$sql)) {
        $insertDB = 1;

    }
    else {
        $insertDB = 0;
        $errDB = "Vaše údaje bohužel nebyly uloženy do DB";
    }
}

if ($uploadOk==1 && $insertDB==1){
    $zprava = "Děkujeme za registraci. Registrace i nahrání loga proběhlo v pořádku. V co nejkratším termínu vám přijde potvrzovací mail a zároveň vás budeme kontaktovat.";
    session_unset();
}
else{
    $zprava = "Registrace se bohužel nezdařila: <br> ".$resNote. "<br>" . $errDBCon. "<br>" . $errDBCon. "<br> Zkuste to prosím znovu nebo kontaktujte organizátory akce tel: 377 418 003, mail: prochazkova@spseplzen.cz ";
}


mysqli_close($con);

header("Location: http:/localhost/registraceODV2017/registraceODV_form.php?zpravaForm=$zprava");

?>