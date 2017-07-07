<?php

namespace Drupal\maxpay\Lib\Model;

/**
 * Interface RenderableInterface
 * @package Maxpay\Lib\Model
 */
interface RenderableInterface
{
    /** @return string */
    public function asString();

    /** @return void */
    public function display();
}
