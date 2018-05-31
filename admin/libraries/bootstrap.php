<?php
class bootstrap
{
    function __construct()
    {
        $url = $_GET['url']; //Get the entered url
        $url = rtrim($url, '/'); //Trim off slashes on the right
        $url = explode('/', $url); //Returns an array of the strings split up by /
    

        $file = 'controllers/' . $url[0] . '.php'; //This is path/url to the controllers. Require $url[0] as 1st argument will be a controller
        if (file_exists($file)) {
            require $file; //If a file exists for the url entered require (include) the relevent controller
        } else {
            require_once 'controllers/error.php'; //Otherwise load the error controller
            $controller = new errorcontrol(); //Instantiate the error controller
            return false; //Stop at this line dont do anything else
        }

        $controller = new $url[0]; //Instantiate the new controller. This is required above (require $file)

        if (isset($url[2])) { //If we have 2 arguments set eg home/show/5
            $controller->{$url[1]}($url[2]); //Call the function. Also translates into controller->function();
        } else {
            if (isset($url[1])) { //if its set call the function with 1 argument eg /home/show
                $controller->{$url[1]}();
            }
        }
    }
}
?>