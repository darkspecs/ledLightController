<?php
function convertHexToRGB($hex)
{
    if (strlen($hex) != 7) {
        throw new Exception('Invalid hex format.');
    }
    if ($hex[0] != "#") {
        throw new Exception('Invalid hex format.');
    }
    $out = "(" . hexdec($hex[1] . $hex[2]) . ",";
    $out = $out . hexdec($hex[3] . $hex[4]) . ",";
    $out = $out . hexdec($hex[5] . $hex[6]) . ")";
    return $out;
}
convertHexToRGB("#ff0000");

?>
<html>

<body>
    <input type="color" id="favcolor" name="favcolor" value="#ff0000"><br><br>
    <input type="submit">
</body>

</html>