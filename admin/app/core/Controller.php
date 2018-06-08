<?php

//Our core controller. This will allow us to access our models and views

class Controller
{
    public $hasHeader = TRUE;
    public $hasFooter = TRUE;
    public $customHeaderPath = FALSE;
    public $customFooterPath = FALSE;

    //Loads a view by name
    //$view the name of the view defined in child controller
    //$data = data to be passed through to view
    protected function view( $view , $data = FALSE)
    {
        if ( ($this->hasHeader) && ($this->customHeaderPath == FALSE) ) {
            require_once '../app/views/common/header.php';
        } else {
            require_once (string)$this->customHeaderPath;
        }

        require_once '../app/views/'. $view .'.php';

        if ( ($this->hasFooter) && ($this->customFooterPath == FALSE) ) {
            require_once '../app/views/common/footer.php';
        } else {
            require_once (string)$this->customFooterPath;
        }

        if ($data) {
            return $data;
        }
    }
}