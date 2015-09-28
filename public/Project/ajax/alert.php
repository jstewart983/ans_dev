<?php
header('Content-Type: text/event-stream');
header('Cache-Control: no cache');
function sendMsg($id,$msg){
	echo "id: $id".PHP_EOL;
	echo "data: $msg".PHP_EOL;
	echo "retry:1".PHP_EOL;
	echo PHP_EOL;
	ob_flush();
	flush();
}

$serverTime = time();
$message = "Here is my message";

//sendMsg($serverTime,'server time: '.$message);

?>
