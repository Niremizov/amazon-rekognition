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
$stream = fopen('target.png', 'r');
$image = fread($stream, filesize('target.png'));
fclose($stream);

// transfer image to Amazon Rekognition and detect labels
$result = $rekognition->CompareFaces([
	'SimilarityThreshold' => 90,
	'SourceImage' => [
		'S3Object' => [
			'Bucket' => '...',
			'Name' => 'source.png'
		],
	],
	'TargetImage' => [
		'Bytes' => $image
	]
]);

// output details about the source image
echo print_r($result['SourceImageFace'], 1) . PHP_EOL;

// output details about matching faces
echo print_r($result['FaceMatches'], 1) . PHP_EOL;

// output details about faces, which are not present
// in the source image
echo print_r($result['UnmatchedFaces'], 1) . PHP_EOL;
