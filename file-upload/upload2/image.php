<?php 

if(isset($_GET['id'])){

 

	require_once dirname(__FILE__) . '/StoreImage.php';

 

	$storeimage = new StoreImage;

 

	header('content-type: image/jpeg');

 

	echo $storeimage->getImageContent($_GET['id']);

 

}else{

	header('Location: index.php');

}

