<?php

namespace ImagickDemo\Imagick;


class affineTransformImage extends \ImagickDemo\Example {

    function renderImageURL() {
        return "<img src='/image/Imagick/affineTransformImage'/>";
    }

    function renderDescription() {
        return "Doesn't appear to be working.";
    }

    function renderImage() {

        $imagick = new \Imagick(realpath("../images/TestImage.jpg"));


        $draw = new \ImagickDraw();

        $angle = 1 ;

        $affineRotate = array("sx" => cos($angle), "sy" => cos($angle), "rx" => sin($angle), "ry" => -sin($angle), "tx" => 0, "ty" => 0,);

        $draw->affine($affineRotate);

        //$draw->translate(50, 50);
        //$draw->rotate(45);

        $imagick->affineTransformImage($draw);

        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    }

}