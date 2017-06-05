<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registrace firem ODV</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<body>

<?php
    if(isset($_GET['zpravaForm'])){echo "<p class='bg-success'>". $_GET['zpravaForm']. "</p>";}
?>

<form action="registraceODV.php" method="post" style="margin:0 15px" enctype="multipart/form-data">

<fieldset>
    <legend>Fakturační údaje</legend>
<div class="form-group">
    <label for="firmaName">Název firmy:</label>
        <input class="form-control" id="firmaName" value="<?php if (isset($_SESSION['firmaName'])) echo $_SESSION['firmaName']?>" name="firmaName" required="" type="text">
</div>
    <div class="form-group">
        <label for="firmaStreet">Ulice, č.p:</label>
            <input class="form-control" id="firmaStreet" value="<?php if (isset($_SESSION['firmaStreet'])) echo $_SESSION['firmaStreet']?>" name="firmaStreet" required="" type="text">
    </div>
    <div class="form-group row">
        <div class="col-xs-6">
            <label for="psc">PSČ</label>
            <input class="form-control" value="<?php if (isset($_SESSION['psc'])) echo $_SESSION['psc']?>" name="psc" id="psc" required="" type="text">
        </div>
        <div class="col-xs-6">
            <label for="city">Město</label>
            <input class="form-control" value="<?php if (isset($_SESSION['city'])) echo $_SESSION['city']?>" name="city" id="city" required="" type="text">
        </div>
    </div>

    <div class="form-group row">
        <div class="col-xs-3">
            <label for="ico">IČO</label>
            <input class="form-control" name="ico" id="ico" required="" type="text" value="<?php if (isset($_SESSION['ico'])) echo $_SESSION['ico']?>">
        </div>
        <div class="col-xs-3">
            <label for="dic">DIČ</label>
            <input class="form-control" name="dic" id="dic" required="" type="text" value="<?php if (isset($_SESSION['dic'])) echo $_SESSION['dic']?>">
        </div>
        <div class="col-xs-6">
            <label for="email">email</label>
            <input class="form-control" name="email" id="email" required="" type="email" value="<?php if (isset($_SESSION['email'])) echo $_SESSION['email']?>">
        </div>
    </div>
</fieldset>

    <fieldset>
        <legend>Informace, které budou uvedené na seznamu partnerů na webu ODV</legend>
    <div class="form-check" style="padding-bottom: 15px">
        <label class="form-check-label">
            <input class="form-check-input" id="repeatVisit" name="repeatVisit" type="checkbox" value="opakovaná účast">
            Již jsme se akce účastnili, prosíme o využití informací z minulé účasti
        </label>
    </div>
    <div id="infoForWeb">
    <div class="form-group">
        <label for="firmaNameWeb">Název firmy:</label>
        <input class="form-control" id="firmaNameWeb" name="firmaNameWeb" required="" type="text" value="<?php if (isset($_SESSION['firmaNameWeb'])) echo $_SESSION['firmaNameWeb']?>">
        <span class="help-block">Bude uvedeno v seznamu partnerů na webu ODV</span>
    </div>

    <div class="form-group">
        <label for="anotaceWeb">Anotace:</label>
        <textarea class="form-control" id="anotaceWeb" name="anotaceWeb" required="" rows="5"><?php if (isset($_SESSION['anotaceWeb'])) echo $_SESSION['anotaceWeb']?></textarea>
        <span class="help-block">Bude uvedeno v seznamu partnerů na webu ODV</span>
    </div>

    <div class="form-group">
        <label for="logoWeb">Logo:</label>
        <input class="form-control file-loading" id="logoWeb" name="logoWeb" accept="image/*" required="" type="file">
        <span class="help-block">Bude zobrazeno v seznamu partnerů na webu ODV</span>
    </div>

    </div>
    </fieldset>

    <fieldset>
        <legend>Kontaktní osoba</legend>

    <div class="form-group row">
        <div class="col-xs-4">
            <label for="kontaktName">Jméno:</label>
            <input class="form-control" name="kontaktName" id="kontaktName" required="" type="text" value="<?php if (isset($_SESSION['kontaktName'])) echo $_SESSION['kontaktName']?>">
        </div>
        <div class="col-xs-4">
            <label for="kontaktTel">Telefon:</label>
            <input class="form-control" name="kontaktTel" id="kontaktTel" type="text" value="<?php if (isset($_SESSION['kontaktTel'])) echo $_SESSION['kontaktTel']?>">
        </div>
        <div class="col-xs-4">
            <label for="kontaktEmail">Email</label>
            <input class="form-control" name="kontaktEmail" id="kontaktEmail" required="" type="email" value="<?php if (isset($_SESSION['kontaktEmail'])) echo $_SESSION['kontaktEmail']?>">
        </div>
    </div>

    <div class="form-group">
        <label for="note">Poznámka:</label>
        <textarea class="form-control" id="note" name="note" rows="5"><?php if (isset($_SESSION['note'])) echo $_SESSION['note']?></textarea>
        <span class="help-block">Sdělte nám Vaše další informace, přání nebo připomínky</span>
    </div>

    </fieldset>

    <div class="form-check" style="padding-bottom: 15px">
        <label class="form-check-label">
            <input class="form-check-input" id="podminky" name="podminky" required="" type="checkbox">
            Souhlasím se smluvními podmínkami
        </label>
    </div>

    <button type="submit" class="btn btn-default">Odeslat</button>
</form>

<script type="text/javascript">
    $('#repeatVisit').click(function() {
        $("#infoForWeb").toggle(!this.checked);
        if(this.checked){
            $("#firmaNameWeb").val("Použít informace z předchozích účastí");
            $("#anotaceWeb").val("Použít informace z předchozích účastí");
            $("#logoWeb").removeAttr( "required" );
        }
        else{
            $("#firmaNameWeb").val("");
            $("#anotaceWeb").val("");
            $("#logoWeb").prop('required',true);
        }
    });

    $("#logoWeb").fileinput({
        uploadUrl: "/file-upload-batch/2",
        allowedFileExtensions: ["jpg", "png", "gif"],
        minImageWidth: 250,
        minImageHeight: 250
    });
</script>
</body>
</html>