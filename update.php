<?php
/*

 
    Symbol: CHn means location of code use find feature in your editor will be easy to find, CHn->CHn means must look at both code 

    To make it work on your project config these: CH1, CH2, CH3, CH4 


*/
header("Contrnt-Type: application/json");

require_once("connection.php");

$response = array();

// CH1->CH2
if (isset($_POST['id']) && isset($_POST['storyline']) && isset($_POST['box_office']) && isset($_POST['stars'])) {
    
    // CH2->CH3
    $id = $_POST["id"];
    $storyline = $_POST["storyline"];
    $box_office = $_POST["box_office"];
    $star = $_POST["stars"];

    // CH3->CH4
    $query = "UPDATE movie SET storyline = ?, box_office = ?, stars = ? WHERE id = ?";
    $query = $connection->prepare($query);
    
    // CH4
    $query->bind_param("sidi", $storyline, $box_office, $star, $id);
    
    if ($query->execute()) {
        $response["error"] = false;
        $response["message"] = "Updated succesfully";
        $response["response_code"] = 200;
    }else {
        $response["error"] = true;
        $response["message"] = "Updated FAILED";
    }
} else {
    $response["error"] = false;
    $response["message"] = "There is no required";
    $response["response_code"] = 400;
}
echo json_encode($response);
?>