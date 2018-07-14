<?php

function clean($string) {
   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

   return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}

$potential = $_POST['potential'];
$user = $_POST['user'];
$uid = 'F'.uniqid().$user.$potential;
$uploader = $_POST['uploader'];
$basePath = '/Applications/XAMPP/xamppfiles/htdocs/github/ed_perdia/';
/*
* Dev
*/


$basePath = '/Applications/XAMPP/xamppfiles/htdocs/github/ed_perdia/';
$mysqli = new mysqli('127.0.0.1', 'root', '', 'edia_accounting');


$mysqli->set_charset("utf8");

if (!$mysqli) {
	die('Connection Error: ' . mysql_error());
}

if (isset($_POST['Rechte'])) {
	$Rechte = $_POST['Rechte'];
} else {
	$Rechte = 0;
}

$new_path = "uploads/".$_POST['user']."/imports/";

$tmp_file = $_FILES['Vertrag_Hochladen_File']['tmp_name'];
$name = $_FILES['Vertrag_Hochladen_File']['name'];

/*
$getFileQuery = mysqli_query($mysqli, "SELECT * FROM files WHERE relatedID='".$potential."' AND Name='".$name."'");
$getFile = mysqli_fetch_object($getFileQuery);

if (isset($getFile)) {
  $isNameDouble = '_kopie';
} else {
  $isNameDouble = '';
}
*/

$filename = str_replace('.CSV', 'xxxpdfxxx', $name);
$filename = str_replace('_', '-', $filename);
$filename = clean($filename);
$filename = str_replace('xxxpdfxxx', $isNameDouble.'.csv', $filename);

$name = str_replace('.pdf', $isNameDouble.'.pdf', $name);

$Upload_URL = 'http://app.help24.de/Dokument/'.$uid.'/'.$filename;
$url = 'https://crm.zoho.com/crm/private/json/Potentials/uploadFile?authtoken=8a3888430c4efd5d8b631001f888520a&scope=crmapi&wfTrigger=true&id='.$_POST['potential'].'&attachmentUrl='.$Upload_URL;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$data = curl_exec($ch);
curl_close($ch);

mysqli_query($mysqli, "INSERT INTO files
	(
	filename,
  file,
  path,
  type,
  user_id
	)
	VALUES
	(
	'".$filename."',
	'".$filename."',
	'".$new_path."',
  '".$_POST['type']."',
  '".$_POST['user']."'
	)");

//mkdir($basePath."uploads", 0700);
$userPath = $basePath."uploads/".$_POST['user'];
$potentialPath = $basePath."uploads/".$_POST['user'].'/imports';
if (!file_exists($userPath)) {
  mkdir($userPath, 0700);
}
if (!file_exists($potentialPath)) {
  mkdir($potentialPath, 0700);
}

$move_file = move_uploaded_file($tmp_file, $basePath.$new_path.$filename);
echo var_dump($move_file);
?>
