<?php


function nextcharacter($char){
       if ($char == 'z'){
           echo 'a';
       }else{
         return  ++$char;
       }
      
      }
echo nextcharacter('z');
























?>