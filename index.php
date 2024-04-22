<?php
 
$x = $_SERVER["HTTP_USER_AGENT"];
$user_info=[$_SERVER["REMOTE_ADDR"],date("h:i:s"),date("d/m/Y"),date("e")];
$os = explode(";", ltrim(strstr(substr($x, 0, strpos($x, ")")), "("), '(')); 
$browser = explode("/",ltrim(strstr(strstr(strstr($x, "HTML,"), " "), ") "), ") "));
$ismobleand_chrome_version = explode(" ", $browser[2]);
$device_array = [];
/*
22/04
$os = sistema operativo, identificatore, tipo di sistema
$browser = browser , versione, + addizionali
$ismobleand_chrome_version = versione di chrome, se è mobile o meno
il codice sopra funziona perfettamente per i computer di tipo windows
i dispositivi android invece funzionano corretamente se aperti da chrome.
aperti da  web browser come instagram caricano più informazioni come modello e specifiche
aperto da chrome android da K come tipo di sistema, da instagram wv.
creo le funzioni per stabilire se è aperto da ig o meno qui sotto.
quindi, os[3] = 3  se l'utente ha aperto instagram browser
*/

// se il browser è quello di instagram
if($os[3] == "wv" or $os[3] != "K"){// se aperto da webkit browser
$device_specs=explode("/", $os[2]); // e abbiamo nome del dispositivo + versione build
$device = explode(";", ltrim(ltrim(strstr($browser[4], ";"), "; "), ")"));
if (str_contains($browser[4], 'Instagram')) { 
    array_push($device_array, "instagram_web_browser");
    array_push($device_array, $device);
}


}

print_r($user_info); 
echo "<br><br>";
print_r($os);
echo "<br><br>";
print_r($browser);
echo "<br><br>";
print_r($device_array);
echo "<br><br>";
echo $x;

?>
