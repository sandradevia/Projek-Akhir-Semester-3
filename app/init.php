<?php
//panggil file configurasi
require_once 'app/config/config.php';

//panggil file-dile aplikasi
require_once 'core/app.php';
require_once 'core/controller.php';
require_once 'core/database.php';
require_once 'core/flasher.php';

//Autoload models
spl_autoload_register(function($class){
    if(file_exists('app/models' . $class . '.php')){
        require_once 'app/models/' . $class .'.php';
    }
});

//mulai aplikasi 
$app = new App();