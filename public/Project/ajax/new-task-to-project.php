<?php
session_start();
error_reporting(-1);
ini_set('display_errors', 'On');



require_once('asana.php');
if(isset($_GET['type'])){
$type = urldecode($_GET['type']);
$name = urldecode($_GET['name']);
$description = urldecode($_GET['body']);
$sessionName = $_SESSION['user_name'];
// See class comments and Asana API for full info

$asana = new Asana(array('apiKey' => '9xNOS9Az.LG5ihg0y5grGZyKzdxuqNjC')); // Your API Key, you can get it in Asana

$workspaceId = '15245076155873'; // The workspace where we want to create our task
$projectId = '33538467149515'; // The project where we want to save our task

// First we create the task
$result = $asana->createTask(array(
    'workspace' => $workspaceId, // Workspace ID
    'name' => $type." - ".$sessionName, // Name of task
    'assignee' => 'nj.jstewart@gmail.com',
    'notes' => $description."\n".$_SERVER["HTTP_REFERER"]."\n".$_SERVER['HTTP_USER_AGENT'] // Assign task to...
    //'followers' => array('XXXXX', 'XXXXXXXX') // We add some followers to the task... (this time by ID), this is totally optional
));

// As Asana API documentation says, when a task is created, 201 response code is sent back so...
if ($asana->responseCode != '201' || is_null($result)) {
    echo 'Error while trying to connect to Asana, response code: ' . $asana->responseCode;
    return;
}

$resultJson = json_decode($result);

$taskId = $resultJson->data->id; // Here we have the id of the task that have been created

// Now we do another request to add the task to a project
$result = $asana->addProjectToTask($taskId, $projectId);

if ($asana->responseCode != '200') {
    echo 'Error while assigning project to task: ' . $asana->responseCode;
}
}
?>
