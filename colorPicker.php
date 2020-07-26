<?php
function writeJsonFile($data)
{
    try {
        $fp = fopen('data.json', 'w');
        fwrite($fp, json_encode($data));
        fclose($fp);
    } catch (Exception $e) {
        throw $e;
    }
}

if (isset($_POST['color'])) {
    try {
        if (strlen($_POST['color']) != 7 || $_POST['color'][0] != "#") {
            throw new Exception('Invalid hex format.');
        }
        $colormode = 0;
        $color[0] = $colormode;
        $color[1] = $_POST['color'];
        writeJsonFile($color);
    } catch (Exception $e) {
        echo ($e);
    }
}
$jsondata = file_get_contents("data.json");
$data = json_decode($jsondata);
?>
<html>
<meta name="viewport" content="width=device-width, initial-scale=2.0, maximum-scale=2.0">

<body>
    <form action="" method="post">
        <input type="color" id="color" name="color" value="<?php echo($data[1]);?>">
        <br><br>
        <input type="submit">
    </form>
</body>

</html>