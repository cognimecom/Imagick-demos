<?php

namespace ImagickDemo\Imagick;


class newPseudoImage extends \ImagickDemo\Example {

    function renderImageURL() {
        return "<img src='/image/Imagick/affine'/>";
    }

    function renderDescription() {

    }

    function renderImage() {
        $im = new \Imagick(realpath('../images/TestImage.jpg'));

        if (!$im->getImageAlphaChannel()) {
            $im->setImageAlphaChannel(\Imagick::ALPHACHANNEL_SET);
        }

        $refl = clone $im;
        $refl->flipImage();

        $gradient = new \Imagick();

        $gradient->newPseudoImage($refl->getImageWidth() + 10, $refl->getImageHeight() + 10, "gradient:transparent-black");

        $refl->compositeImage($gradient, \Imagick::COMPOSITE_DSTOUT, 0, 0);

        $canvas = new \Imagick();

        $width = $im->getImageWidth() + 40;
        $height = ($im->getImageHeight() * 2) + 30;

        $canvas->newImage($width, $height, 'none');
        $canvas->setImageFormat('png');

        $canvas->compositeImage($im, \Imagick::COMPOSITE_SRCOVER, 20, 10);
        $canvas->compositeImage($refl, \Imagick::COMPOSITE_SRCOVER, 20, $im->getImageHeight() + 10);


        header("Content-Type: image/png");
        echo $canvas->getImageBlob();