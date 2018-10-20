<?php
session_start();
$link = mysqli_connect('localhost','root','','inv');
function run($query){
	global $link;
	$result = mysqli_query($link,$query);
	return $result;
}

?>