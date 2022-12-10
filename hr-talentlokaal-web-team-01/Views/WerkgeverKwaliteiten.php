<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="Style.css" rel="stylesheet">
    <link href="afbeeldingen\Favicon.png" type="image\x-icon" rel="icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Beheren</title>
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


<form method="post" action="?Vacature_Id=<?php echo $_GET['vacancyId'];?>&action=toev">
    <p>kwaliteit 1</p>
    <select name="txtquality1">
        <option value=""></option>
        <?php
        require "C:\Users\jakub\OneDrive\Bureaublad\schoolprogrammas/xampp goeie\htdocs\bp4\Controllers\Controller.php";

        $c = new Controller();

        $qualities = $c->getQuality();

        foreach ($qualities as $quality) {
            echo '<option value="' . $quality['Id'] . '">' . $quality['Kwaliteit'] . '</option>';
        }


        ?>
    </select><br/><br/>
    <p>kwaliteit 2</p>
    <select name="txtquality2">
        <option value=""></option>
        <?php
        $qualities = $c->getQuality();

        foreach ($qualities as $quality) {
            echo '<option value="' . $quality['Id'] . '">' . $quality['Kwaliteit'] . '</option>';
        }


        ?>
    </select><br/><br/>
    <p>kwaliteit 3</p>
    <select name="txtquality3">
        <option value=""></option>
        <?php
        $qualities = $c->getQuality();

        foreach ($qualities as $quality) {
            echo '<option value="' . $quality['Id'] . '">' . $quality['Kwaliteit'] . '</option>';
        }


        ?>
    </select><br/><br/>
    <p>kwaliteit 4</p>
    <select name="txtquality4">
        <option value=""></option>
        <?php
        $qualities = $c->getQuality();

        foreach ($qualities as $quality) {
            echo '<option value="' . $quality['Id'] . '">' . $quality['Kwaliteit'] . '</option>';
        }


        ?>
    </select>
    <br>
    <input class="button" type="submit" name="btnSumbit"  />
</form>



<?php

if (isset($_GET['action'])) {

    if(!$_POST['txtquality1']==""){
        $VacancyID = $_GET['Vacature_Id'];
        $qualityy = $_POST['txtquality1'];

        $c->addQuality($VacancyID, $qualityy);
    }
    if(!$_POST['txtquality2']==""){
        $VacancyID = $_GET['Vacature_Id'];
        $qualityy = $_POST['txtquality2'];

        $c->addQuality($VacancyID, $qualityy);
    }
    if(!$_POST['txtquality3']==""){
        $VacancyID = $_GET['Vacature_Id'];
        $qualityy = $_POST['txtquality3'];

        $c->addQuality($VacancyID, $qualityy);
    }
    if(!$_POST['txtquality4']==""){
        $VacancyID = $_GET['Vacature_Id'];
        $qualityy = $_POST['txtquality4'];

        $c->addQuality($VacancyID, $qualityy);
    }

    echo "<script>alert('Kwaliteiten toegevoegd!')</script>";

}
?>


</body>
</html>



