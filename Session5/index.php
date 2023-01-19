<?php
require_once('./cloth.php');

//$product = new Product(1,'T-shirt',100,0.1);
//echo $product->getPrice();

$cloth = new Cloth(1, 'T-shirt', 100, 0.1, 'M');
echo $cloth->getPrice();
echo $cloth->getSize();
$cloth->setColor('Blue');
echo '<br />' . $cloth->getColor();

echo '<br />' . Store\StringHelper::fix('<Test>');
echo '<br />' . Store\StringHelper::PI;
?>