<?php
function processMessage($update) {
    if($update["result"]["action"] == "buscar.nfe"){
    $response = new \stdClass();
	$response->speech = "..........TEXT HERE...........";
	$response->displayText = ".........TEXT HERE...........";
	$response->source = $update["result"]["source"];
	echo json_encode($response);
    }
}


/*
 * PEGANDO A REQUISIÇÃO
 */
$update_response = file_get_contents("php://input");
$update = json_decode($update_response, true);
if (isset($update["result"]["action"])) {
    processMessage($update);
}
?>


