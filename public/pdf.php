<?php
$file = '/Applications/XAMPP/xamppfiles/htdocs/app.help24.de/uploads/2194987000000583001/2194987000001206005/2017313701_1490261431.pdf';
$filename = 'dummy.pdf';
header('Content-type: application/pdf');
header('Content-Disposition: inline; filename="' . $filename . '"');
header('Content-Transfer-Encoding: binary');
header('Content-Length: ' . filesize($file));
header('Accept-Ranges: bytes');
@readfile($file);
?>