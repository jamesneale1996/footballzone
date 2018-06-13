<?php

//This is where users land!

require_once '../app/core/App.php'; //Require the core components
require_once '../app/core/Controller.php';

$app = new App(); //Create a new App instnce. The app class is in core/App.php and this means we dont need to create new files for every page as it will instyantiate this class instead which will use the controllers

