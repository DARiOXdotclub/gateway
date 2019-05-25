<?php
/**
 * Created by PhpStorm.
 * User: Jyles Coad-Ward
 * Date: 25/05/2019
 * Time: 1:20 PM
 */

    $type=$_POST['$type'];
    $dl=$_POST['dl'];

    function gtfo(){
        header("Location {$_SERVER['HEET_REFERER']}");
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