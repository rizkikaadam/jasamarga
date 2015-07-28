<?php

include_once './DbConnect.php';

function getCategories(){
    $db = new DbConnect();
	// array for json response
    $response = array();
    $response["categories"] = array();
    
    // Mysql select query
    $result = mysql_query("SELECT * FROM t_detail_kelengkapan ORDER BY id_detail_kel DESC LIMIT 1");
    
    while($row = mysql_fetch_array($result)){
        // temporary array to create single category
        $tmp = array();
        $tmp["id"] = $row["id_detail_kel"];
        $tmp["name"] = $row["id_user"];
        
        // push category to final json array
        array_push($response["categories"], $tmp);
    }
    
    // keeping response header to json
    header('Content-Type: application/json');
    
    // echoing json result
    echo json_encode($response);
}

getCategories();
?>