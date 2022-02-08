<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


<div class="container">
  <form action=" <?php echo $_SERVER['PHP_SELF']; ?> " method="post">

    <label for="name">Name</label>
    <input type="text" id="name" name="name" placeholder="Enter your name ..">
    </br>
    </br>
    <label for="email">Email</label>
    <input type="text" id="email" name="email" placeholder="Enter your email ..">
    </br>
    </br>
    <label for="password">Password</label>
    <input type="text" id="pasword" name="pasword" placeholder="Enter your pasword ..">
    </br>
    </br>
    <label for="address">Address</label>
    <input type="text" id="address" name="address" placeholder="Enter your address ..">
    </br>
    </br>
    <label for="linkedin_url">linkedin_url</label>
    <input type="text" id="address" name="linkedin_url" placeholder="Enter your linkedin_url ..">
    </br>
    </br>
    <input type="submit" value="Submit">

  </form>
</div>
</body>

</html>


<?php

if($_SERVER['REQUEST_METHOD'] == "POST"){
   
    $name     = $_POST['name'];
    $email    = $_POST['email'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    $linkedin_url = $_POST['linkedin_url'];
    



   $errors = []; 

   # validate name  
   if(empty($name)){
       $errors['name'] = "Field Required"; 
   }elseif(!filter_var($name,FILTER_VALIDATE_STRING)){
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
   }elseif(strlen($password) <= 6){
       $errors['Password'] = "Length Must be > 6 chars";
   }

   # validate address
   if(empty($address)){
    $errors['address'] = "Field Required";
    }elseif(strlen($address) <= 10 ){
    $errors['Address'] = "Length Must be < =10 chars";
    }

    # validate linkedin_url 
   if(empty($linkedin_url)){
    $errors['linkedin_url'] = "Field Required";
    }elseif(!filter_var($linkedin_url,FILTER_VALIDATE_URL)){
    $errors['linkedin_url']   = "Invalid linkedin_url";
    }




  if(count($errors) > 0){ 

    foreach ($errors as $key => $value) {

        echo '* '.$key.' : '.$value.'<br>';
    }
  }else{
      echo 'Valid Data .... ';
  }

}

?>