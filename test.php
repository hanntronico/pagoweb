<?php 

$varget = "hann";

if (isset($_GET[$varget])) {
	echo $_GET[$varget];
}else{
	echo "no data";
}



?>