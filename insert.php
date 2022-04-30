<?php
/*

 
    Symbol: CHn means location of code use find feature in your editor will be easy to find, CHn->CHn means must look at both code 

    To make it work on your project config these: CH1, CH2, CH3, CH4 


*/
header("Contrnt-Type: application/json");

require_once("connection.php");

$response = array();

// CH1->CH2
if (isset($_POST['title']) && isset($_POST['storyline']) && isset($_POST['lang']) && isset($_POST['gerne']) && isset($_POST['year_release']) && isset($_POST['box_office']) && isset($_POST['run_time']) && isset($_POST['stars'])) {


   // CH2->CH3
   $title = $_POST['title'];
   $storyline = $_POST['storyline'];
   $lang = $_POST['lang'];
   $gerne = $_POST['gerne'];
   $year_release = $_POST['year_release'];
   $box_office = $_POST['box_office'];
   $run_time = $_POST['run_time'];
   $stars = $_POST['stars'];

   // CH3->CH4
   $query = "INSERT INTO movie (title, storyline, lang, gerne, year_release, box_office, run_time, stars) VALUES(?, ?, ?, ?, ?, ?, ?, ?)";
   $query = $connection->prepare($query);

   // CH4
   $query->bind_param("sssssdsd", $title, $storyline, $lang, $gerne, $year_release, $box_office, $run_time, $stars);
   
   if ($query->execute()) {
      $response["error"] = false;
      $response["message"] = "Insert succesfully";
      $response["response_code"] = 200;
  } else {
      $response["error"] = true;
      $response["message"] = "Insert FAILED";
      $response["response_code"] = 400;
  }
} else {
  $response["error"] = false;
  $response["message"] = "There is no required";
  $response["response_code"] = 400;
}
echo json_encode($response);
?>