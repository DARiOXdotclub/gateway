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
        die('Forbidden');
    }
    function redirect($destination){
        header("Location: ".$destination);
    }

    if ($type == 'download') {
        switch ($dl) {
            case '1':
                redirect("https://storage.googleapis.com/dariox/share/MinecraftWorld.zip");
                break;
            case '2':
                redirect("https://storage.googleapis.com/dariox/share/osu-skin/06-12-2017.osk");
                break;
            case '3':
                redirect("https://storage.googleapis.com/dariox/share/osu-skin/10-03-2018.osk");
                break;
            case '4':
                redirect("https://storage.googleapis.com/dariox/share/osu-skin/20-05-2019.osk");
                break;
            case '5':
                redirect("https://storage.googleapis.com/dariox/share/osu-skin/latest.osk");
                break;
            case '6':
                redirect("https://storage.googleapis.com/dariox/cdn/music/QueenGreatestHits.zip");
                break;
            case '7':
                redirect("https://storage.googleapis.com/dariox/share/nsfw/RULE%2034%20-%20NieR%20Automata.zip");
                break;
            case '8':
                redirect("https://storage.googleapis.com/dariox/share/nsfw/RULE34%20-%20Overwatch.zip");
                break;
            case '9':
                redirect("https://storage.googleapis.com/dariox/share/nsfw/Hentai.zip");
                break;
            case '10':
                redirect("https://storage.googleapis.com/dariox/share/nsfw/Furry%20Porn.zip");
                break;
            case '11':
                redirect("https://storage.googleapis.com/dariox/share/audio/intervene_jb.mp3");
                break;
            case '12':
                redirect("https://storage.googleapis.com/dariox/share/osu-skin/25-05-2019.osk");
                break;
            case '13':
                redirect("https://storage.googleapis.com/dariox/share/osu-skin/24-05-2019.osk");
                break;
            case '666':
                /* thomas the thermal nuclear bomb */
                redirect("https://www.youtube.com/watch?v=_MBgz9h7GGM");
                break;
            default:
                gtfo();
                break;
        }
    }
    elseif ($type == 'link'){
        switch ($destination) {
            case '1':
                redirect("http://twitch.tv/seedplaysgames");
                break;
            case '2':
                redirect("http://twitter.com/darioxdotclub");
                break;
            case '3':
                redirect("http://github.com/darioxdotclub");
                break;
            case '4':
                redirect("http://github.com/jylescoad-ward");
                break;
            case '5':
                redirect('http://youtube.com/seedvevo');
                break;
            default:
                gtfo();
                break;
        }
    }
    else{
        gtfo();
    }

?>
