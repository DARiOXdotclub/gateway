<?php
/**
 * Created by PhpStorm.
 * User: Jyles Coad-Ward
 * Date: 25/05/2019
 * Time: 1:20 PM
 */
function ip_info($ip = NULL, $purpose = "location", $deep_detect = TRUE) {
    $output = NULL;
    if (filter_var($ip, FILTER_VALIDATE_IP) === FALSE) {
        $ip = $_SERVER["REMOTE_ADDR"];
        if ($deep_detect) {
            if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP))
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP))
                $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
    }
    $purpose    = str_replace(array("name", "\n", "\t", " ", "-", "_"), NULL, strtolower(trim($purpose)));
    $support    = array("country", "countrycode", "state", "region", "city", "location", "address");
    $continents = array(
        "AF" => "Africa",
        "AN" => "Antarctica",
        "AS" => "Asia",
        "EU" => "Europe",
        "OC" => "Australia (Oceania)",
        "NA" => "North America",
        "SA" => "South America"
    );
    if (filter_var($ip, FILTER_VALIDATE_IP) && in_array($purpose, $support)) {
        $ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
        if (@strlen(trim($ipdat->geoplugin_countryCode)) == 2) {
            switch ($purpose) {
                case "location":
                    $output = array(
                        "city"           => @$ipdat->geoplugin_city,
                        "state"          => @$ipdat->geoplugin_regionName,
                        "country"        => @$ipdat->geoplugin_countryName,
                        "country_code"   => @$ipdat->geoplugin_countryCode,
                        "continent"      => @$continents[strtoupper($ipdat->geoplugin_continentCode)],
                        "continent_code" => @$ipdat->geoplugin_continentCode
                    );
                    break;
                case "address":
                    $address = array($ipdat->geoplugin_countryName);
                    if (@strlen($ipdat->geoplugin_regionName) >= 1)
                        $address[] = $ipdat->geoplugin_regionName;
                    if (@strlen($ipdat->geoplugin_city) >= 1)
                        $address[] = $ipdat->geoplugin_city;
                    $output = implode(", ", array_reverse($address));
                    break;
                case "city":
                    $output = @$ipdat->geoplugin_city;
                    break;
                case "state":
                    $output = @$ipdat->geoplugin_regionName;
                    break;
                case "region":
                    $output = @$ipdat->geoplugin_regionName;
                    break;
                case "country":
                    $output = @$ipdat->geoplugin_countryName;
                    break;
                case "countrycode":
                    $output = @$ipdat->geoplugin_countryCode;
                    break;
            }
        }
    }
    return $output;
}



    $type=$_GET['type'];
    $dl=$_GET['dl'];


$writeDirectory = "/var/www/dxcdn/log";
$logFileName = "gateway.txt";
$logWriteDestination = $writeDirectory."/".$logFileName;
$log = fopen($logWriteDestination, a);
$writeToLogDestination = "Destination: ".$page."\n";
$writeToLogType = "Type: ".$type."\n";
$writeToLogIP = "IP Address: ".$_SERVER['REMOTE_ADDR']."\n";
$writeToLogUserAgent = "User Agent: ".$_SERVER['HTTP_USER_AGENT']."\n";
$writeToLogReferer = "HTTP Referer: ".$_SERVER['HTTP_REFERER']."\n";
$writeToLogRemotePort = "Remote Port: ".$_SERVER['REMOTE_PORT']."\n";
$writeToLogHostname = "Hostname: ".$_SERVER['REMOTE_HOST']."\n";
$writeToLogCountry = "Country: ".ip_info($_SERVER['REMOTE_ADDR'], "countrycode")."\n";
$writeToLogTime = "Time Accessed: ".date('l j \of F Y h;i:s A')."\n";
$writeToLog = $writeToLogDestination.$writeToLogType.$writeToLogIP.$writeToLogUserAgent.$writeToLogReferer.$writeToLogRemotePort.$writeToLogHostname.$writeToLogTime.$writeToLogCountry."\n\n";
fwrite($log, $writeToLog);
fclose($log);

echo "type: ".$type."<br>";
echo "dl: ".$dl."<br>";
    function gtfo(){
        /*header("Location {$_SERVER['HTTP_REFERER']}");*/
    }
    function redirect($destination){
        header("Location: ".$destination);
    }

    if ($type == 'download') {
        if($dl == '1') {
            redirect("https://storage.googleapis.com/dariox/share/MinecraftWorld.zip");
        }
        elseif($dl == '2') {
            redirect("https://storage.googleapis.com/dariox/share/osu-skin/06-12-2017.osk");
        }
        elseif($dl == '3'){
            redirect("https://storage.googleapis.com/dariox/share/osu-skin/10-03-2018.osk");
        }
        elseif($dl == '4'){
            redirect("https://storage.googleapis.com/dariox/share/osu-skin/20-05-2019.osk");
        }
        elseif($dl == '5'){
            redirect("https://storage.googleapis.com/dariox/share/osu-skin/latest.osk");
        }
        elseif($dl == '6'){
            redirect("https://storage.googleapis.com/dariox/cdn/music/QueenGreatestHits.zip");
        }
        elseif($dl == '7'){
            redirect("https://storage.googleapis.com/dariox/share/nsfw/RULE%2034%20-%20NieR%20Automata.zip");
        }
        elseif($dl == '8'){
            redirect("https://storage.googleapis.com/dariox/share/nsfw/RULE34%20-%20Overwatch.zip");
        }
        elseif($dl == '9'){
            redirect("https://storage.googleapis.com/dariox/share/nsfw/Hentai.zip");
        }
        elseif($dl == '10'){
            redirect("https://storage.googleapis.com/dariox/share/nsfw/Furry%20Porn.zip");
        }
        elseif($dl == '11'){
            redirect("https://storage.googleapis.com/dariox/share/audio/intervene_jb.mp3");
        }


        /* thomas the thermal nuclear bomb */
        elseif($dl == '666'){
            redirect("https://www.youtube.com/watch?v=_MBgz9h7GGM");
        }
        else{
            gtfo();
        }
    }
    else{
        gtfo();
    }

?>