# Example PHP Scripts

## Installation

* Download `composer` as described at [getcomposer.org](https://getcomposer.org).
* Download the [AWS SDK for PHP](https://aws.amazon.com/sdk-for-php/) using *composer*.

```
php composer.phar require aws/aws-sdk-php
```

* Copy the PHP example scripts into the folder.


## Configuration

* Open each PHP script and configure the *Access Key* and *Secret Access Key*.
* Script `compare-faces.php` also requires you to configure the S3 bucket name.


## Usage

* Copy the appropriate example images (see folder `Images/`) into the same folder.
* Either rename the image file to `bild.jpg` or update the file name in the PHP scripts.
* Execute the scripts `php <scriptname.php>`.
