<?php 

$protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"],0,strpos($_SERVER["SERVER_PROTOCOL"],"/")));
$expectedOrigin = $protocol."://".htmlspecialchars($_SERVER["HTTP_HOST"]);
	
$corsOrigin = isset($_SERVER["HTTP_ORIGIN"]) ? htmlspecialchars($_SERVER["HTTP_ORIGIN"]) : "";
$ajaxOrigin = isset($_SERVER["HTTP_X_CLIENT_ORIGIN"]) ? htmlspecialchars($_SERVER["HTTP_X_CLIENT_ORIGIN"]) : "";
$queryOrigin = htmlspecialchars($_GET["origin"]);

if( !empty($corsOrigin) && $corsOrigin !== $expectedOrigin ){
    returnResponse(array("isProxy" => true, "proxy" => $corsOrigin));
} 

if( $ajaxOrigin !== $expectedOrigin ){
    returnResponse(array("isProxy" => true, "proxy" => $queryOrigin));
}

if( $queryOrigin !== $expectedOrigin ){
    returnResponse(array("isProxy" => true, "proxy" => $queryOrigin));
}

returnResponse(array("isProxy" => false, "proxy" => ""));

function returnResponse($response, $responseCode = 200){
    header("Access-Control-Allow-Origin: *");  
    header("Access-Control-Allow-Headers: x-client-origin");
    header("X-PHP-Response-Code: ".$responseCode, true, $responseCode);
    header("Content-Type: application/json; charset=utf-8");
    die(stripslashes(json_encode($response)));
}
	
?>
