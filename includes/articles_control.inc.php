<?php

declare(strict_types=1);

function check_for_empty_input($title, $content){
   if(empty($title) || empty($content)){
       return true;
   } else{
      return false;
   }
};
