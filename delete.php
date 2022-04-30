<?php
/*
  Symbol: CHn means location of code use find feature in your editor will be easy to find, CHn->CHn means must look at both code 

  To make it work on your project config these: CH1, CH2, CH3

*/


header("Contrnt-Type: application/json");

require_once("connection.php");

$response = array();

// for delete data must use id of that spacifi row
// (CH1)
if (isset($_POST["row_id"])) {
    
    // CH2->CH4
    $id = $_POST["row_id"];

    // CH3
    $query = "DELETE FROM table_name WHERE id = ?";

    $query = $connection->prepare($query);
    // CH4
    $query->bind_param("i", $id);

    if ($query->execute()) {
        $response["error"] = false;
        $response["message"] = "Delete succesfully";
        $response["response_code"] = 200;
     } else {
        $response["error"] = true;
        $response["message"] = "Delete FAILED";
        $response["response_code"] = 400;
    }
} else {
    $response["error"] = false;
    $response["message"] = "There is no required";
    $response["response_code"] = 400;
}
echo json_encode($response);

?>