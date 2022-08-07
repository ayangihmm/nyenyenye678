<?php
if(empty($_GET["url"])){
	$msg = array(
		"status" => "error",
		"message" => "Unknown Argument Url Given"
	);
	echo json_encode($msg);
	exit();
}
$url = $_GET["url"];
$ua = "Mozilla/5.0 (Linux; Android 11; Lenovo K14) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Mobile Safari/537.36";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, FALSE);
curl_setopt($ch, CURLOPT_USERAGENT, $ua);
$source = curl_exec($ch);
$exp = explode("/", $url);
$filename = $exp[count($exp)-1].".html";
$handle = fopen($filename,"w");
fwrite($handle, $source);
fclose($handle);
echo "<a href=\"/$filename\" download>Download Here</a>";
?>


