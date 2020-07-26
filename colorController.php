<?php
function convertHexToRGB($hex)
{
    if (strlen($hex) != 7 || $hex[0] != "#") {
        throw new Exception('Invalid hex format.');
    }
    $out[0] = hexdec($hex[1] . $hex[2]); //red
    $out[1] = hexdec($hex[3] . $hex[4]); //green
    $out[2] = hexdec($hex[5] . $hex[6]); //blue
    return $out;
}
convertHexToRGB("#ff0000");

if (isset($_POST['color'])) {
    $hex = convertHexToRGB($_POST['color']);
    echo (var_dump($hex));
}
?>
<html>
<meta name="viewport" content="width=device-width, initial-scale=2.0, maximum-scale=2.0">

<body>
    <form action="" method="post">
        <input type="color" id="color" name="color" value="<?php
                                                            if (isset($_POST['color'])) {
                                                                echo ($_POST['color']);
                                                            } else {
                                                                echo ("#ffffff");
                                                            }
                                                            ?>">
        <br><br>
        <input type="submit">
    </form>
</body>

</html>