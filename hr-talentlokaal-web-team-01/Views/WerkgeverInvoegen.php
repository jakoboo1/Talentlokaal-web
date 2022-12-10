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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="WerkgeverHome.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="WerkgeverOverzicht.php">Vacatures</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="WerkgeverInvoegen.php">Toevoegen</a>
                </li>
            </ul>
        </div>
    </div>
    <img src="afbeeldingen\Talentlokaal_logo_RGB.png" height="50px" width="150px">
</nav>

<form method="post">
    <p>Gebruiker Id</p>
    <input type="text" name="txtUserId"><br/>
    <p>Functie</p>
    <input type="text" name="txtFunction"><br/>
    <p>Functie omschrijving</p>
    <textarea name="txtFunctionDescription" style="width: 400px; height: 150px;"></textarea>
    <p>Salarisindicatie</p>
    <input type="text" name="txtSalaryIndication"><br/>
    <p>Salarisindicatie bovengrens</p>
    <input type="text" name="txtSalaryIndicationCeling"><br/>
    <p>Urenindicatie</p>
    <input type="text" name="txtHoursIndication"><br/>
    <p>Urenindicatie bovengrens</p>
    <input type="text" name="txtHoursIndicationCeling"><br/>

    <input type="submit" class="button" name="btnAdd" value="Toevoegen">
</form>

</body>
</html>

<?php



if (isset($_POST['btnAdd'])){

    $userId = $_POST['txtUserId'];
    $function = $_POST['txtFunction'];
    $functionDescription = $_POST['txtFunctionDescription'];
    $salaryIndication = $_POST['txtSalaryIndication'];
    $salaryIndicationCeling= $_POST['txtSalaryIndicationCeling'];
    $hoursIndication= $_POST['txtHoursIndication'];
    $hoursIndicationCeling = $_POST['txtHoursIndicationCeling'];

    $c->addVacancy($userId,$function,$functionDescription,$salaryIndication,$salaryIndicationCeling,$hoursIndication,$hoursIndicationCeling);



    $meld = implode($c->notificationVacancy());

    echo "<script>alert('Vacature nummer ".$meld." is toegevoegd!')</script>";





}
?>
