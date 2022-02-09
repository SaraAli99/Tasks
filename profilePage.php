<?php

function Clean($input,$flag = 0){

$input =  trim($input);

if($flag == 0){
$input =  filter_var($input,FILTER_SANITIZE_STRING);  
}
return $input;
}





if($_SERVER['REQUEST_METHOD'] == "POST"){

$name     = Clean($_POST['name']);
$email    = Clean($_POST['email']);
$password = Clean($_POST['password']);
$address  = Clean($_POST['address']);
$gender   = Clean($_POST['gender']);
$linkedin_url   = Clean($_POST['linkedin_url']);



$errors = []; 

# validate name 
if(empty($name)){
   $errors['name'] = "Field Required"; 
}elseif(!filter_var($email,FILTER_VALIDATE_STRING)){
    $errors['Name']   = "Invalid Name";
  }


# validate email 
if(empty($email)){
   $errors['email'] = "Field Required";
}elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
  $errors['Email']   = "Invalid Email";
}


# validate password 
if(empty($password)){
   $errors['password'] = "Field Required";
}elseif(strlen($password) < 6){
   $errors['Password'] = "Length Must be >= 6 chars";
}


# validate address 
if(empty($address)){
   $errors['address'] = "Field Required";
}elseif(strlen($address) < 10){
   $errors['Address'] = "Length Must be >= 10 chars";
}

# validate gender 
if(empty($gender)){
    $errors['gender'] = "Field Required"; 
 }

# validate linkedin_url 
if(empty($linkedin_url)){
    $errors['linkedin_url'] = "Field Required";
 }elseif(!filter_var($linkedin_url,FILTER_VALIDATE_URL)){
   $errors['Linkedin_url']   = "Invalid url";
 }

# Check 
if(count($errors) > 0){ 

foreach ($errors as $key => $value) {

    echo '* '.$key.' : '.$value.'<br>';
}
}else{
  echo 'Valid Data .... ';

}


?>


<?php


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    if (!empty($_FILES['image']['name'])) {

        $imgName  = $_FILES['image']['name'];
        $imgTemp  = $_FILES['image']['tmp_name'];
        $imgType  = $_FILES['image']['type'];   

        $nameArray =  explode('.', $imgName);
        $imgExtension =  strtolower(end($nameArray));

        $imgFinalName = time() . rand() . '.' . $imgExtension;



        $allowedExt = ['png', 'jpg'];

        if (in_array($imgExtension, $allowedExt)) {
            $disPath = 'uploads/' . $imgFinalName;

            if (move_uploaded_file($imgTemp, $disPath)) {
                echo 'File Uploaded';
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



}
?>