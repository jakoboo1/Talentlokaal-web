<!<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="Style.css" rel="stylesheet">
    <link href="afbeeldingen\Favicon.png" type="image\x-icon" rel="icon">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Verwijderen</title>
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
                    <a class="nav-link active" aria-current="page" href="Home.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Overzicht.php">Vacatures</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Invoegen.php">Toevoegen</a>
                </li>
            </ul>
        </div>
    </div>
    <img src="afbeeldingen\Talentlokaal_logo_RGB.png" height="50px" width="150px">
</nav>
</body>
</html>
<?php
require ("C:\Users\jakub\OneDrive\Bureaublad\schoolprogrammas/xampp goeie\htdocs\bp4\Controllers\Controller.php");


$c = new Controller();
$vacancyId = $_GET['VacancyId'];

echo "<br/>";

if (isset($vacancyId)){
    $c->deleteVacancy($vacancyId);
} echo '<script>alert("Vacature nummer '.$vacancyId.' is verwijderd!" + " U kunt terug naar de vorige pagina");</script>';



echo "Verwijderen gelukt!";

echo "<br/>";
echo "<br/>";



echo "<a href='Overzicht.php' class='button'>Ga terug</a>";




?>