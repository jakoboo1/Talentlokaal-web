<!<!doctype html>
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
<?php
//query uit laten lezen in de velden op updaten pagina
$vacancyId = $_GET['vacancyId'];
$userId = $_GET['userId'];
$function = $_GET['function'];
$functionDescription = $_GET['functionDescription'];
$salaryIndication = $_GET['salaryIndication'];
$salaryIndicationCeling = $_GET['salaryIndicationCeling'];
$hoursIndication = $_GET['hoursIndication'];
$hoursIndicaitonCeling = $_GET['hoursIndicationCeling'];


?>
<form method="post" >

    <p>Vacature Id</p>
    <input type="text" name="txtVacancyId" value="<?php echo $vacancyId;?>"><br/>
    <p>Gebruiker Id</p>
    <input type="text" name="txtUserId" value="<?php echo $userId; ?>"><br/>
    <p>Functie</p>
    <input type="text" name="txtFunction" value="<?php echo $function; ?>"> <br/><br/>

    <p>Functieomschrijving oud</p>
    <h5 style="width: 600px; height: auto"><?php echo $functionDescription ?></h5><br>

    <p>Functieomschrijving nieuw</p>
    <h4><i>Dit veldt is verplicht!</i></h4>
    <textarea name="txtFunctionDescription" style="width: 400px; height: 150px;"></textarea>

    <p>Salarisindicatie</p>
    <input type="text" name="txtSalaryIndication" value="<?php echo $salaryIndication ?> "><br/>
    <p>Salarisindicatie bovengrens</p>
    <input type="text" name="txtSalaryIndicationCeling" value="<?php echo $salaryIndicationCeling ?>"><br/>
    <p>Urenindicatie</p>
    <input type="text" name="txtHoursIndication" value="<?php echo $hoursIndication ?>"><br/>
    <p>Urenindicatie bovengrens</p>
    <input type="text" name="txtHoursIndicationCeling" value="<?php echo $hoursIndicaitonCeling ?>"><br/><br>

    <input class="button" type="submit" name="btnUpdate" value="Wijzig">
</form>

</body>
</html>

<?php
require ("C:\Users\jakub\OneDrive\Bureaublad\schoolprogrammas/xampp goeie\htdocs\bp4\Controllers\Controller.php");

$c = new Controller();
//echo "<script>alert('Vul de velden correct in!')</script>";


if (isset($_POST['btnUpdate'])){

    $vacancyId = $_POST['txtVacancyId'];
    $userId = $_POST['txtUserId'];
    $function = $_POST['txtFunction'];
    $functionDescription = $_POST['txtFunctionDescription'];
    $salaryIndication = $_POST['txtSalaryIndication'];
    $salaryIndicationCeling= $_POST['txtSalaryIndicationCeling'];
    $hoursIndication= $_POST['txtHoursIndication'];
    $hoursIndicaitonCeling = $_POST['txtHoursIndicationCeling'];

    $c->changeVacancy($vacancyId,$userId,$function,$functionDescription,$salaryIndication,$salaryIndicationCeling,$hoursIndication,$hoursIndicaitonCeling);

    echo "<script>alert('Vacature met Vacature ID ".$vacancyId." is gewijzigd!' +
 ' U kunt nu terug naar de vorige pagina.')</script>";

}
?>
