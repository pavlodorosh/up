<?php

namespace up\traits;

trait TColor
{
    private $color;

    public function getColor()
    {
        return $this->color;
    }

    public function setColor($color)
    {
        $this->color = $color;
    }
}