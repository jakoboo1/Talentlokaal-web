<?php
require ("C:\Users\jakub\OneDrive\Bureaublad\schoolprogrammas/xampp goeie\htdocs\bp4\Controllers\iController.php");
 class Controller implements iController
{

private $conn;

    public function  __Construct()
    {
        try {

            $user="hr_talenlokaal";
            $pass="G1jy9s9?";
            $this->conn = new PDO("mysql:host=adainforma.tk;dbname=bp4_hr_talenlokaal", $user, $pass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        }catch (PDOException $exception){

            echo "Er ging iets miss";
        }
    }

    public function giveVacancyEmployer($companyName){

        $query ="SELECT Vacature_Id,BedrijfNaam,Functie, Functieomschrijving, Salarisindicatie,Salarisindicatie_bovengrens,urenindicatie,urenindicatie_bovengrens,Gebruiker_Id FROM Vacature INNER JOIN Werkgever ON Vacature.Gebruiker_Id=Werkgever.Gebruikers_Id WHERE BedrijfNaam = ?";

        $stm = $this->conn->prepare($query);

        $stm->execute(array($companyName));

        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function giveVacancy($vacancyId)
    {
        //query schrijven
        $query ="SELECT * FROM Vacature WHERE Vacature_Id= ?";

        //query inlezen
        $stm = $this->conn->prepare($query);


        $stm->execute(array($vacancyId));

        $result=$stm->fetch(PDO::FETCH_ASSOC);
        return $result;

        }

    public function logIn($email, $pw){

        $query = "SELECT * FROM Gebruiker WHERE Email_adres=? AND wachtwoord=?";

        $stm = $this->conn->prepare($query);

        $stm->execute(array($email,$pw));

        $result = $stm->fetch(PDO::FETCH_ASSOC);
        return $result;


    }





    public function addVacancy($userId, $function, $functionDescription, $salaryIndication, $salaryIndicationCeling, $hoursIndication, $hoursIndicationCeling)
    {
        //query schrijven
        $query = "INSERT INTO Vacature(Gebruiker_Id,Functie,Functieomschrijving,Salarisindicatie,Salarisindicatie_bovengrens,urenindicatie,Urenindicatie_bovengrens) 
                  VALUES (:Gebruikers_Id,:Functie,:functionDescription,:SalarisIndicatie,:SalarisIndicatieBovengrens,:UrenIndicatie,:UrenIndicatieBovengrens) ";

        //query inlezen
        $stm = $this->conn->prepare($query);


        $stm->bindParam(":Gebruikers_Id", $userId);
        $stm->bindParam(":Functie", $function);
        $stm->bindParam(":functionDescription",$functionDescription);
        $stm->bindParam(":SalarisIndicatie",$salaryIndication);
        $stm->bindParam(":SalarisIndicatieBovengrens",$salaryIndicationCeling);
        $stm->bindParam(":UrenIndicatie",$hoursIndication);
        $stm->bindParam(":UrenIndicatieBovengrens",$hoursIndicationCeling);

        //query uitvoeren
        $stm->execute();

    }

    public function getQuality(){
        $Query="SELECT * FROM Kwaliteiten;";

        $stm = $this->conn->prepare($Query);

        $stm->execute();
        $Result = $stm->fetchAll(PDO::FETCH_ASSOC);
        return $Result;
    }

    public function addQuality($vacancyId , $quality){

        $query = "INSERT INTO Vacature_Kwaliteiten(Vacature_Id,Kwaliteit_id) VALUES (:Vacature_Id,:Kwaliteit_Id) ";

        $stm = $this->conn->prepare($query);

        $stm->bindParam(":Vacature_Id",$vacancyId);
        $stm->bindParam(":Kwaliteit_Id",$quality);

        $stm->execute();
    }


    public function changeVacancy($vacancyId, $userId, $function, $functionDescription, $salaryIndication, $salaryIndicationCeling, $hoursIndication, $hoursIndicationCeling)
    {
        //query schrijven
        $query = "UPDATE Vacature SET  ";


        if (!empty($vacancyId)){
            $query .= "Vacature_Id ='".$vacancyId."', ";
        }

        if (!empty($userId)){
            $query .= "Gebruiker_Id='".$userId."', ";
        }

        if (!empty($function)){
            $query .= "Functie='".$function."', ";
        }


        if (!empty($functionDescription)){
            $query.= "Functieomschrijving='".$functionDescription."',";
        }

        if (!empty($salaryIndication)){
            $query.= "Salarisindicatie='".$salaryIndication."',";
        }

        if (!empty($salaryIndicationCeling)){
            $query.= "Salarisindicatie_bovengrens='".$salaryIndicationCeling."',";
        }

        if (!empty($hoursIndication)){
            $query.= "urenindicatie='".$hoursIndication."',";
        }

        if (!empty($hoursIndicationCeling)){
            $query.= "Urenindicatie_bovengrens='".$salaryIndicationCeling."'";
        }



        $query .= " WHERE Vacature_Id=".$vacancyId.";";

        //query uitvoeren
        $stm = $this->conn->prepare($query);

        if (!empty($vacancyId)){
            $stm->bindParam(":vacature_Id",$vacancyId);
        }

        if (!empty($userId)){
            $stm->bindParam(":gebruiker_Id",$userId);
        }

        if (!empty($function)){
            $stm->bindParam(":function",$function);
        }


        if (!empty($functionDescription)){
            $stm->bindParam(":functionDescription",$functionDescription);
        }

        if (!empty($salaryIndication)){
            $stm->bindParam(":salaryIndication",$salaryIndication);
        }

        if (!empty($salaryIndicationCeling)){
            $stm->bindParam(":salaryIndicationCeling",$salaryIndicationCeling);
        }

        if (!empty($urenindicatie)){
            $stm->bindParam(":hoursIndication",$hoursIndication);
        }

        if (!empty($hoursIndicationCeling)){
            $stm->bindParam(":hoursIndicationCeling",$salaryIndicationCeling);
        }

        $stm->execute();
    }

    public function deleteVacancy($vacancyId)
    {
        //query schrijven
        $query = "DELETE Vacature.* ,Vacature_Kwaliteiten.* FROM Vacature INNER JOIN Vacature_Kwaliteiten ON Vacature_Kwaliteiten.Vacature_Id=Vacature.Vacature_Id WHERE Vacature.Vacature_Id=:vacaturenummer";
        //query inlezen
        $stm = $this->conn->prepare($query);
        $stm->bindParam(":vacaturenummer",$vacancyId);
        //query uitvoeren
         $stm->execute();

    }




    public function notificationVacancy()
    {
        $query = "SELECT Vacature_Id FROM Vacature WHERE Vacature_Id =(SELECT max(Vacature_Id) FROM Vacature);";

        $stm = $this->conn->prepare($query);

        $stm->execute();
        $result =$stm->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

 }

?>