<?php
/*

    Code description only in this file

    Symbol: CHn means location of code use find feature in your editor will be easy to find, CHn->CHn means must look at both code 

    To make it work on your project config these: CH1, CH2, CH3, CH4 


*/

// set content type in this file to application json this function return nothing
header("Content-Type: application/json");
/// require file if file is not import yet and will stop if failed to import
require_once("connection.php");
/// include will import file but it will not stop code excution if there are erro but it will just show warning include(), include_once() require is more logical than include function

// CH1
// sql statement 
$query = "SELECT * FROM movie";

// prepara statement
$query = $connection->prepare($query);

// rsponse infomation
$response = array();

// this will return object if not will be erro (erro happen bc sql statement or connection)
if($query->execute()) {
         // set erro status in response in this case is no erro
         $response["error"] = false;  
         // get result as array 
         $result = $query->get_result();
         
         // CH2->CH3
         // create array to store data from data base
         $movies = array();
        
         // reture associative array ( array that have key) ["key" => value]
         while ($row = $result->fetch_assoc()) {
            // CH3->CH4 
            $movies[] = $row; 
         }
         // CH4
         // add movies data to reponse
         $response["movies"] = $movies;
         
         // massage to describe response status
         $response["massage"] = "Response Succesfully";     
         $response["response_code"] = 200; 
} else {
       $response["erro"] = true;
       $response["massage"] = "Response Failed"; 
       $response["response_code"] = 400;
}

// convert data to json
echo json_encode($response);

?>