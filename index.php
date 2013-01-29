<?php
require_once 'entries.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Portable chat</title>
<?php
include 'style.php';
include 'jquery.php';
?>
</head>
<body>
<h1>Portable chat</h1>
<img src="loading.gif" />
<?php
include 'form.php';
?>
<div id="entries">
<?php
$en = new entries;
$en->showEntries();
?>
</div>
<?php
include 'scripts.php';
?>
</body>
</html>