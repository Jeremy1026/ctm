<?php
spl_autoload_register(function ($class_name) {
    include 'controller/' . $class_name . '.class.php';
});
