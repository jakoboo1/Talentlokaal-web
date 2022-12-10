<?php

interface iController{

 public function __Construct();

 public function addVacancy($userId, $function, $functionDescription, $salaryIndication, $salaryIndicationCeling, $hoursIndication, $hoursIndicationCeling);

 public function changeVacancy($vacancyId, $userId, $function, $functionDescription, $salaryIndication, $salaryIndicationCeling, $hoursIndication, $hoursIndicationCeling);

 public function deleteVacancy($vacancyId);

 public function giveVacancy($vacancyId);

 public function notificationVacancy();

 public function logIn($email, $pw);


}

?>
