<?php 
/*


    Symbol: CHn means location of code use find feature in your editor will be easy to find, CHn->CHn means must look at both code 

    To make it work on your project config these: CH1, CH2, CH3, CH4, CH5, CH6, CH7 


*/
header("Contrnt-Type: application/json");

require_once("connection.php");


// CH1->
if (isset($_GET["title"])) {
    
    // CH2->CH4
    $title = $_GET["title"];
    
    // CH3
    $query = "SELECT * FROM movie WHERE title = ?";

    $query = $connection->prepare($query);
    
    // CH4
    $query->bind_param("s", $title);

    $response = array();
    $query->execute();
    $result = $query->get_result();
    if ($result->num_rows > 0) {
        // CH5->CH6
        $movie = array();

        $result = $result->fetch_assoc();
        
        foreach ($result as $key => $value) {
            // CH6->CH7
            $movie[$key] = $value;
        }
        
        $response["erro"] = false;
        // CH7
        $response["movie"] = $movie;

        $response["massage"] = "response succesfully";
        $response["response_code"] = 200;
    } else {
        $response["erro"] = true;
        $response["massage"] = "failed to response becuause there is no data";
        $response["response_code"] = 400;
     }
   echo json_encode($response);

}


?>