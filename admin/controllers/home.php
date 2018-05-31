<?php

class home extends Controller
{
    function __construct()
    {
        parent::__construct(); //Construct the parent to get its properties
        $this->view->rendor('home/index'); //rendor the homes index view
    }

    public function show( $optional_args = false ) //This allows you to pass optional arguments to the url. eg /home/show/4
    {
        echo 'We are inside show! <br>';
        echo 'Optional' . $optional_args . '<br>';

        require 'models/help_model.php';
        $model = new help_model(); //require the help model and make an instance of it
    }
}

?>