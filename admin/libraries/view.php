<?php
class view
{
    function __construct()
    {

    }

    public function rendor($name) //This will rendor the correct view
    {
        require 'views/'. $name . '.php';
    }
}