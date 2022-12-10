<?php
require ("C:\Users\jakub\OneDrive\Bureaublad\schoolprogrammas/xampp goeie\htdocs\bp4\Controllers\Controller.php");
$c = new Controller();




?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link href="Style.css" rel="stylesheet">
    <link href="afbeeldingen\Favicon.png" type="image\x-icon" rel="icon">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inloggen</title>
</head>
<body>
<div class="login">

<img src="afbeeldingen\Talentlokaal_logo_RGB.png" height="50px" width="150px" id="logo">

<form method="post">

<input type="text" name="txtEmail" placeholder="Email adres"  >
<input type="password" name="txtPassword" placeholder="Wachtwoord" >

    <input type="submit" name="btnLogin" style="color: #1E796A !important;
    background-color: #ef850b !important;
    border-style: solid;
    border-color: #C7C7C7;
    border-radius: 5px;
    margin: 1px;
    text-decoration: none;">

</form>
</div>
</body>
</html>
<?php

if (isset($_POST['btnLogin'])){

 $email = $_POST['txtEmail'];
 $pw = $_POST['txtPassword'];

$result = $c->logIn($email,$pw);

 if (empty($email || $pw)){
     echo "<script>alert('De email of het wachtwoord ontbreekt!.');</script>";
 }
    elseif ((!$row = $result['Email_adres'])){
     echo "<script>alert('onjuist e-mail of wachtwoord.');</script>";
 }

    $row = $result['Email_adres'];
    $rol = $result['Rol_Id'];
    $uId = $result['Gebruikers_Id'];

    if ($row){

    if ($rol == 1) {
        header("location:WerkgeverHome.php?userId=$uId");
    }

    if($rol == 2){
        echo "<script>alert('Toegang geweigerd.');</script>";
    }

    if ($rol == 3){
        header("location:Home.php?userId=$uId");
    }
 }

}
?>