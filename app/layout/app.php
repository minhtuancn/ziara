<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title><?php echo( isset($metaData['title']) ? $metaData['title'] . ' | Ziara' : 'Ziara | Trip planner' ); ?></title>

	<meta name="description" content="<?php echo( isset($metaData['description']) ? $metaData['description'] : "Plan your trip !" ); ?>">
</head>
<body>
	<?php include(_LAYOUTPARTS_ . 'header.php'); ?>

	<?php include(_VIEWS_ . $this->response->view . '.php'); ?>

	<?php include(_LAYOUTPARTS_ . 'footer.php'); ?>

</body>
</html>