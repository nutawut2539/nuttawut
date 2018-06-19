<?php
function processMessage($update) {
    if($update["result"]["action"] == "buscar.nfe"){
        sendMessage(array(
            "source" => "..........TEXT HERE...........",
            "speech" => "..........TEXT HERE...........",
            "displayText" => ".........TEXT HERE...........",
            "contextOut" => array()
        ));
    }
}
/*
 * FUNÇÃO PARA ENVIAR A MENSAGEM
 */
function sendMessage($parameters) {
    echo json_encode($parameters);
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
