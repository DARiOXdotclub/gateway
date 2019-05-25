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
    $destination=$_GET['destination'];
    $dl=$_GET['dl'];


$writeDirectory = "/var/www/dxcdn/log";
$logFileName = "gateway.txt";
$logWriteDestination = $writeDirectory."/".$logFileName;
$log = fopen($logWriteDestination, a);
$writeToLogDestination = "Download ID: ".$id."\n";
$writeToLogLinkDestination = "Link Destination: ".$destination."\n";
$writeToLogType = "Type: ".$type."\n";
$writeToLogIP = "IP Address: ".$_SERVER['REMOTE_ADDR']."\n";
$writeToLogUserAgent = "User Agent: ".$_SERVER['HTTP_USER_AGENT']."\n";
$writeToLogReferer = "HTTP Referer: ".$_SERVER['HTTP_REFERER']."\n";
$writeToLogRemotePort = "Remote Port: ".$_SERVER['REMOTE_PORT']."\n";
$writeToLogHostname = "Hostname: ".gethostbyaddr($_SERVER['REMOTE_ADDR'])."\n";
$writeToLogCountry = "Country: ".ip_info($_SERVER['REMOTE_ADDR'], "countrycode")."\n";
$writeToLogTime = "Time Accessed: ".date('l j \of F Y h;i:s A')."\n";
$writeToLog = $writeToLogDestination.$writeToLogLinkDestination.$writeToLogType.$writeToLogIP.$writeToLogUserAgent.$writeToLogReferer.$writeToLogRemotePort.$writeToLogHostname.$writeToLogTime.$writeToLogCountry."\n\n";
fwrite($log, $writeToLog);
fclose($log);

echo "type: ".$type."<br>";
echo "dl: ".$dl."<br>";
    function gtfo(){
        /*header("Location {$_SERVER['HTTP_REFERER']}");*/
        redirect("http://dariox.club");
    }
    function redirect($destination){
        header("Location: ".$destination);
    }

    if ($type == 'download') {
        $dllinks = array();
        $dllinks[1] = "https://storage.googleapis.com/dariox/share/MinecraftWorld.zip";
        $dllinks[2] = "https://storage.googleapis.com/dariox/share/osu-skin/06-12-2017.osk";
        $dllinks[3] = "https://storage.googleapis.com/dariox/share/osu-skin/10-03-2018.osk";
        $dllinks[4] = "https://storage.googleapis.com/dariox/share/osu-skin/20-05-2019.osk";
        $dllinks[5] = "https://storage.googleapis.com/dariox/share/osu-skin/latest.osk";
        $dllinks[6] = "https://storage.googleapis.com/dariox/cdn/music/QueenGreatestHits.zip";
        $dllinks[7] = "https://storage.googleapis.com/dariox/share/nsfw/RULE%2034%20-%20NieR%20Automata.zip";
        $dllinks[8] = "https://storage.googleapis.com/dariox/share/nsfw/RULE34%20-%20Overwatch.zip";
        $dllinks[9] = "https://storage.googleapis.com/dariox/share/nsfw/Hentai.zip";
        $dllinks[10] = "https://storage.googleapis.com/dariox/share/nsfw/Furry%20Porn.zip";
        $dllinks[11] = "https://storage.googleapis.com/dariox/share/audio/intervene_jb.mp3";
        $dllinks[666] = "https://www.youtube.com/watch?v=_MBgz9h7GGM"; // thomas the thermal nuclear bomb

        if (array_key_exists($dl, $dllinks)) {
            redirect($dllinks[$dl]);
        } else {
            gtfo();
        }
    } elseif ($type == 'links') {
        $links = array();
        $links[1] = "http://twitch.tv/seedplaysgames";
        $links[2] = "http://twitter.com/darioxdotclub";
        $links[3] = "http://github.com/darioxdotclub";
        $links[4] = "http://github.com/jylescoad-ward";
        $links[5] = "http://youtube.com/seedvevo";
        if (array_key_exists($destination, $links)) {
            redirect($links[$destination]);
        } else {
            gtfo;
        }
    } else {
        gtfo();
    }

?>
