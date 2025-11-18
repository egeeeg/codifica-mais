<?php
require 'vendor/autoload.php';

$colorRed = [255, 0, 0];

$barcode = (new Picqer\Barcode\Types\TypeCode128())->getBarcode('081231723897');
$renderer = new Picqer\Barcode\Renderers\SvgRenderer();
$renderer->setForegroundColor([255, 0, 0]); // Give a color red for the bars, default is black. Give it as 3 times 0-255 values for red, green and blue. 
$renderer->setBackgroundColor([0, 0, 255]); // Give a color blue for the background, default is transparent. Give it as 3 times 0-255 values for red, green and blue. 
$renderer->setSvgType($renderer::TYPE_SVG_INLINE); // Changes the output to be used inline inside HTML documents, instead of a standalone SVG image (default)
$renderer->setSvgType($renderer::TYPE_SVG_STANDALONE); // If you want to force the default, create a stand alone SVG image

$renderer->render($barcode, 450.20, 75); 