<?php
require_once 'view.php';
$tabel = $_POST['tabel'];

$listTabel = "";
foreach($tabel as $namatabel)
{
  $listTabel .= $namatabel." ";
}

$command = "/opt/lampp/bin/mysqldump -u root inv " .$listTabel. " > inv.sql";
exec($command);

header('Content-Disposition: attachment; filename=inv.sql');
header('Content-type: application/download');
$content = fread( fopen('inv.sql', 'r'), filesize('inv.sql') );
echo $content;
// $fp  = fopen('inv.sql', 'r');
// $content = fread($fp, filesize('inv.sql'));
// fclose($fp);
// echo $content;

exit;
?>