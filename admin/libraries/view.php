<?php
class view
{
    function __construct()
    {
        echo 'This is the view! </br>';
    }

    public function rendor($name)
    {
        require 'views/'. $name . '.php';
    }
}