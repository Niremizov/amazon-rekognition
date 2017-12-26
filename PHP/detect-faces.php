<?php

/*
 * Amazon Rekognition Demo
 * This PHP script is part of an article published in the German IT journal
 * "Web & Mobile Developer" (https://www.webundmobile.de) in 2018.
 *
 * @author Michael Schams <schams.net>
 * @link https://schams.net
 */

require 'vendor/autoload.php';

$rekognition = new Aws\Rekognition\RekognitionClient([
	'region' => 'eu-west-1',
	'version' => '2016-06-27',
	'credentials' => [
		'key' => '...',
		'secret' => '...'
	]
]);

// load image file
$stream = fopen('bild.jpg', 'r');
$image = fread($stream, filesize('bild.jpg'));
fclose($stream);

// transfer image to Amazon Rekognition and detect labels
$result = $rekognition->DetectFaces([
	'Image' => [
		'Bytes' => $image,
	],
	// return all data
	'Attributes' => ['ALL']
]);

echo print_r($result['FaceDetails'], 1) . PHP_EOL;
echo 'Orientation: ' . $result['OrientationCorrection']. PHP_EOL;
