<?php
    function convertHexToRGB($hex){
        if(strlen($hex) != 7){
            return "Error";
        }
        $out = "(" . hexdec($hex[1] . $hex[2]) . ",";
        $out = $out . hexdec($hex[3] . $hex[4]) . ",";
        $out = $out . hexdec($hex[5] . $hex[6]) . ")";
        return $out;
    }

    

?>