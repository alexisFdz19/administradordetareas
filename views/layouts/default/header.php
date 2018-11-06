<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Framework Básico: <?php if(isset($this->titulo)) {echo $this->titulo; } ?></title>

	<link rel="stylesheet" type="text/css" href="<?php echo APP_URL."views/layouts/default/css/bootstrap.min.css"?>">

</head>

<body>

	<div class="container" style="margin-top: 70px; margin-bottom: 70px;">
	
	<?php

		if($this->_msg->hasMessages()){

			echo $this->_msg->display();

		}

	?>

</body>
