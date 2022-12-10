<?php

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="Style.css" rel="stylesheet">
    <link href="afbeeldingen\Favicon.png" type="image\x-icon" rel="icon">
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
    <input type="text" name="txtBedrijfNaam" placeholder="Naam Bedrijf" style="margin-left: 20px">
    <input  class="button" type="submit" name="btnFilter" value="Filter">
</form>


<table class="table">
    <thead >
    <tr>
        <th scope="col">vacature ID</th>
        <th scope="col">Functie</th>
        <th scope="col">Functieomschrijving</th>
        <th scope="col">Salarisindicatie</th>
        <th scope="col">Salarisindicatie bovengrens</th>
        <th scope="col">Urenindicatie</th>
        <th scope="col">Urenindicatie bovengrens</th>
    </tr>

</body>
</html>

<?php

require "C:\Users\jakub\OneDrive\Bureaublad\schoolprogrammas/xampp goeie\htdocs\bp4\Controllers\Controller.php";

$controller = new Controller();



if (isset($_POST['btnFilter'])) {

    if (!$_POST['txtBedrijfNaam'] == NULL) {
        $vac = $controller->giveVacancyEmployer($_POST['txtBedrijfNaam']);



        // parameter van $vac veranderen naar de naam van het veld in DB.
        if(!$vac==NULL) {

            foreach($vac as $vacature) {
                $vacancyId = $vacature['Vacature_Id'];
                $userId = $vacature['Gebruiker_Id'];
                $function = $vacature['Functie'];
                $functionDescription = $vacature['Functieomschrijving'];
                $salaryIndication = $vacature['Salarisindicatie'];
                $salaryIndicationCeling = $vacature['Salarisindicatie_bovengrens'];
                $hoursIndication = $vacature['urenindicatie'];
                $hoursIndicationCeling = $vacature['urenindicatie_bovengrens'];
                $bedrijfnaam = $vacature['BedrijfNaam'];


                echo '<tr> 
                        <th scope="row">' . $vacancyId . '</th>
                        <td>' . $function . '</td>
                        <td>' . $functionDescription . '</td>
                        <td>' . $salaryIndication . '</td>
                        <td>' . $salaryIndicationCeling . '</td>
                        <td>' . $hoursIndication . '</td>
                        <td>' . $hoursIndicationCeling . '</td>
                        <form method="post">
                        <td><a type="button" class="button" href="WerkgeverKwaliteiten.php?vacancyId=' . $vacancyId . '">qualities toevoegen/updaten</a>
                        <a type="button" class="button" href="WerkgeverVerwijderen.php?vacancyId=' . $vacancyId . '">Verwijderen</a>
                         <a type="button" class="button" href="WerkgeverUpdaten.php?vacancyId=' . $vacancyId . '&userId=' . $userId . '&function=' . $function . '
                         &functionDescription=' . $functionDescription . '&salaryIndication=' . $salaryIndication . '&salaryIndicationCeling=' . $salaryIndicationCeling . '
                         &hoursIndication=' . $hoursIndication . '&hoursIndicationCeling=' . $hoursIndicationCeling . '">Update</a>
                        </form>
                            </tr>';
            }
        }
//
    }
}




