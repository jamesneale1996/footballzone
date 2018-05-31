<?php

class Controller //Base controller every other controller will be a child of
{
    function __construct()
    {
        $this->view = new view(); //Main controller has the view so instantiate a view object. View class in view.php
    }
}