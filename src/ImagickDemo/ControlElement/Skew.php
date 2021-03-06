<?php


namespace ImagickDemo\ControlElement;


class Skew extends ValueElement {

    protected function getDefault() {
        return 10;
    }

    protected function getMin() {
        return -500;
    }

    protected function getMax() {
        return 500;
    }

    protected function getVariableName() {
        return 'skew';
    }

    protected function getDisplayName() {
        return 'Skew';
    }

    function getSkew() {
        return $this->getValue();
    }
}