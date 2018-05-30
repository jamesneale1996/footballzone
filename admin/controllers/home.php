<?php

class home extends Controller
{
    function __construct()
    {
        parent::__construct();
        echo 'we are in home!';
    }

    public function show()
    {
        echo '<br>We are inside homes show function!';
    }
}

?>