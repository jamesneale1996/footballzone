<?php

class errorcontrol extends Controller //Extends the base Controller in libraries/controller.php
{
    function __construct()
    {
        parent::__construct(); //Basically constructs the parent making the parents properties etc useable
        $this->view->msg = 'This Page Doesent Exist!'; //Assign values to the view
        $this->view->rendor('error/index');
    }
}