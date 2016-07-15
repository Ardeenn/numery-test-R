<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Generator numerów</title>
</head>
<body>
<h1><?php echo $naglowek;?></h1>
<?php
echo form_open();
echo "Wybierz kraj:<br>" . form_dropdown('kraj', $kraje, 'Austria') . "<br>";
echo "Wybierz ilosć wyników:<br>" . form_input('iloscWynikow', '10') . "<br>";
echo form_submit('Wyslij', 'Generuj') . "<br>" . "<br>";
if (strlen($numery_dla) != 0) {
    echo "<p style='font-size: 2em'>" . $numery_dla . " - wygenerowane numery: </p>";
}
?>
</body>
</html>