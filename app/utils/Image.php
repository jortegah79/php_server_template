<?php

namespace App\utils;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

//direccion del repositorio
//https://image.intervention.io/v3/basics/instantiation

class Image
{
    //procesar imagenes en diversos formatos.
    function processImage(string $image, int $width = -1, $type = 'png', string $output)
    {
        // create image manager with desired driver
        $manager = new ImageManager(new Driver());

        // read image from file system
        $image = $manager->read($image);

        // resize image proportionally to 300px width
        if ($width != -1) {
            $image->scale(width: 300);
        }
        // insert watermark
        //$image->place('images/watermark.png');

        // save modified image in new format 
        if ($type == 'png') {
            $image->toPng()->save($output);
        } else if ($type == 'webp') {
            $image->toWebp()->save($output);
        } else if ($type == 'jpg') {
            $image->toJpeg()->save($output);
        } else {
            $image->toPng()->save($output);
        }
    }
}
