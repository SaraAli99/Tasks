<?php

function Clean($input,$flag = 0){

    $input =  trim($input);
    
    if($flag == 0){
    $input =  filter_var($input,FILTER_SANITIZE_STRING);  
    }
    return $input;
 }

   if($_SERVER['REQUEST_METHOD'] == "POST"){
        $title = clean($_POST['title']);
        $content = clean($_POST['content']);
   }


 #validate
$errors = [];

#validate title ....
if(empty($title)){
    $errors['title'] = "Field Required"; 
}

#validate content ....
if(empty($content)){
    $errors['content'] = "Field Required"; 
}elseif(strlen($content) <50){
    $errors['Content'] = "Length Must be >50 chars";
}

if(count($errors) > 0){ 

    foreach ($errors as $key => $value) {
    
        echo '* '.$key.' : '.$value.'<br>';
    }
    }else{
      $data =   implode('||', [$title, $content]);

      if (setcookie("info", $data, time() + 86400, '/')) {
          echo 'Cookie Set To User Browser </br>' . $title .'</br>'. $content ;
      } else {
          echo 'Error Try Again';
      }
    }



    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        if (!empty($_FILES['image']['name'])) {
    
            $imgName  = $_FILES['image']['name'];
            $imgTemp  = $_FILES['image']['tmp_name'];
            $imgType  = $_FILES['image']['type'];  
    
            $nameArray =  explode('.', $imgName);
            $imgExtension =  strtolower(end($nameArray));
    
            $imgFinalName = time() . rand() . '.' . $imgExtension;
    
    
    
            $allowedExt = ['pdf'];
    
            if (in_array($imgExtension, $allowedExt)) {
    
                $disPath = 'uploads/' . $imgFinalName;
    
                if (move_uploaded_file($imgTemp, $disPath)) {
                    echo '</br>'. $imgName ;
                } else {
                    echo 'Error In Uploading Try Again';
                }
            } else {
                echo 'InValid Extension';
            }
        } else {
    
            echo ' * Image Required';
        }
    }
    



//Store data into text file & stored data can be deleted .....

$file = fopen('info.txt' , 'w+') or die("unable to open file");

$title = $title."\n";
fwrite($file, $title);

$content = $content."\n";
fwrite($file, $content);

$imgName = $imgName;
fwrite($file, $imgName);

 fclose($file);

?>