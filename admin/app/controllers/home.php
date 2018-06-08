<?php

class Home extends Controller
{
    //This is the default method called
    public function index( $name = '', $otherName = '' )
    {
        $this->view('home/index', ['name' => 'James',
         'otherName' => 'Neale',]
        );  //Provides a directory path for the view and called the view method that was created in Controller.php. 2nd param passes an array of any data to the view
    }

    public function add ()
    {
        echo 'add';
    }
}