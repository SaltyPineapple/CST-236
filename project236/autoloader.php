<?php
    spl_autoload_register(function($class){
        
        $lastDirectories = substr(getcwd(), strlen(__DIR__));

        // echo "getcwd = : ".getcwd()."<br>";
        // echo "__DIR__ = : ".__DIR__."<br>";
        // echo "last directories = : ".$lastDirectories."<br>";


        $numberOfLastDirectores = substr_count($lastDirectories, '\\');

        $directories = ["Business", "Presentation", "Security"];

        foreach($directories as $d){
            // echo "looking in directory: ".$d;
            $currentDirectory = $d;
            for($x = 0; $x< $numberOfLastDirectores; $x++){
                $currentDirectory = "../".$currentDirectory;
            }
            $classfile = $currentDirectory.'/'.$class.'.php';

            if(is_readable($classfile)){
                if(require $d.'/'.$class.'.php'){
                    break;
                }
            }
        }


    });



?>