<?php

    namespace App\Utils;

    class View{
        /**
         * @param string 
         * @return string 
         */
        private static function getContentView($view)
        {
            $file = __DIR__.'/../../resources/view/'.$view.'.html';
            return file_exists($file) ? file_get_contents($file) : '';

        }

        /**
         * 
         * @param string
         * @param array 
         * @return string
         */
        public static function render($view, $vars = []){

            $contentView = self::getContentView($view);
            

            $keys = array_keys($vars);
            $keys = array_map(function($item)
            {
                return '{{'.$item.'}}';
            },$keys);
            echo "<pre>";
            print_r($keys);
            echo "</pre>"; exit; 

            return str_replace($keys, array_values($vars), $contentView);

            
        }
    }