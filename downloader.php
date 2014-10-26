<?php
ini_set('max_execution_time', 3000);
$uri='http://assets22.pokemon.com/assets/cms2/img/pokedex/full/';
$handle = fopen("list.txt", "r");
$filter="/<(.*?)>/";
$i=1;
if ($handle) {
    while (($line = fgets($handle)) !== false && $i<720) {
		$pokemon= preg_replace($filter,'', $line);
		$pokemon= trim($pokemon);
		$i = str_pad($i, 3, '0', STR_PAD_LEFT);
	$url=$uri.$i.'.png';
	copy($uri.$i.'.png', $pokemon.'.png');
	echo 'saved '.$pokemon.'<br>';
	$i++;
    }
} else {
	echo 'list missing';
    // error opening the file.
} 
fclose($handle);
// by harshvardhan malpani
?>
