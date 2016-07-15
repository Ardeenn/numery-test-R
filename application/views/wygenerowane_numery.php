<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Wygenerowane numery</title>
</head>
<body>
<?php
foreach ($gotowe_numery as $wynik) {
    echo $wynik . "<br/>";
}
?>
</body>
</html>