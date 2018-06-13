<?php

//This class is instantiated in index.php

class App
{
    //Set the default controller and method when first loaded. e.g If any other url called doesent exist it will automatically use the defaults
    protected $controller = 'errorController';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->parseUrl();

        if(file_exists('../app/controllers/'. $url[0] .'.php')) { //Check if the specified file and controller exists. $url[0] is the name of the controller
            $this->controller = $url[0]; //Set a controller variable equaling whatever controller we are in from above
        }
        require_once '../app/controllers/'. $this->controller .'.php'; //We now need to require the correct controller file so it can be used

        $this->controller = new $this->controller; //Create an object of the controller
        if (isset($url[1])) { //Check if a method of the controller object is set
            $reflection = new ReflectionMethod($this->controller, $url[1]);
            if (method_exists($this->controller, $url[1]) && ($reflection->isPublic()) && ($url[1] != 'index') ) { //check if method exists, its a public function and its not index
                $this->method = $url[1]; //Set our method to whatever method is passed in the url
            } else {
                $url = 'http://' . $_SERVER['HTTP_HOST'] . '/admin/public/'. $url[0] .'/';
                header('Location: ' . $url, true, 302);              // Use either 301 or 302
                die;
            }
        }

        $this->params = array_values($url);//If we have any params passed through set the values in the params array otherwise set a blank array

        call_user_func_array([$this->controller, $this->method], $this->params); //Takes an array containing the controller and the method with the second argument any params. This will call that method
    }

    //Handle the url by exploding and trimming into the parts needed
    protected function parseUrl()
    {
        if(isset($_GET['url'])) { //Check if a url exists
            $url = rtrim($_GET['url'], '/'); //trim any whitespace from the right and the trailing / from the end of the url
            $url = filter_var($url, FILTER_SANITIZE_URL); //Sanitize the URL
            $url = explode('/', $url); //Explode the url by /. This will return an array of items seperated by / in the string e.g the string home/hello will now be Array ( [0] => home [1] => hello )

            return $url;
        }
    }
}