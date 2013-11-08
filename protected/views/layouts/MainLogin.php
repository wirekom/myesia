<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
	<link type="image/x-icon" href="../images/icon.ico" rel="icon">
	<link type="image/x-icon" href="../images/icon.ico" rel="shortcut icon">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<meta content="Your description" name="description">
	<meta content="esia, myesia" name="keywords">
	<meta content="Syukri" name="M.Syukri Khafidh">

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/howdoyoutturnthisno.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/font-awesome.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/diapo.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/login.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	
	<?php Yii::app()->bootstrap->register(); ?>
</head>

<body>

	<?php echo $content; ?>

</body>
</html>
