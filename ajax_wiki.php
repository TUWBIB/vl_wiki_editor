<?php

include_once "inc_server.php";

$sql = "SELECT vl_wiki_html FROM vl_wiki WHERE vl_wiki = '".$_GET['vl_wiki']."' AND vl_wiki_journal = '".$_GET['vl_wiki_journal']."' AND vl_wiki_lang = '".$_GET['vl_wiki_lang']."';";
$erg = $db->query($sql);

#echo $sql;
$row = $erg->fetch(PDO::FETCH_ASSOC);

$callback = $_GET['callback'];

$json_ret = preg_replace( "/\r|\n/", "", $row );

$json_ret = json_encode($json_ret);

echo $callback."('".addslashes($json_ret)."');";
 
?>