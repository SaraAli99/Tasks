<?php

require "dbConnection.php";
require "helpers.php";



if($_SERVER['REQUEST_METHOD'] == "POST"){

    $title   = Clean($_POST['title']);
    $content = Clean($_POST['content']);
    $startDate = Clean($_POST['startDate']);
    $endDate = Clean($_POST['endDate']);
    


    #validate .... 
    $errors = [];
 
    #validate title ... 
    if(empty($title)){
        $errors['Title'] = "Field Required";
    }

    #validate content ... 
    if(empty($content)){
        $errors['Content'] = "Field Required";
    }

    # Validate Image ..... 
    if (empty($_FILES['image']['name'])) {
       
        $errors['Image']   = "Field Required";
   
    }else{

       $imgName  = $_FILES['image']['name'];
       $imgTemp  = $_FILES['image']['tmp_name'];
       $imgType  = $_FILES['image']['type'];  

       $nameArray =  explode('.', $imgName);
       $imgExtension =  strtolower(end($nameArray));
       $imgFinalName = time() . rand() . '.' . $imgExtension;
       $allowedExt = ['png', 'jpg'];

       if (!in_array($imgExtension, $allowedExt)) {
           $errors['Image']   = "Not Allowed Extension";
       }

   }


    # Validate date ..... 

    if(empty($startDate) && (empty($endDate))) {
        $errors['startdate'] = "Date Is Required!!";

    }
    elseif((strtotime($startDate)) < (strtotime($endDate))){
        
         function validateDate($date, $format = 'Y-m-d H:i:s')
         {
           $d = DateTime::createFromFormat($format, $date);
            return $d && $d->format($format) == $date;
         }
         }

    


    # Check ...... 
    if (count($errors) > 0) {

        foreach ($errors as $key => $value) {
            echo '* ' . $key . ' : ' . $value . '<br>';
        }
    } else {
        $dispath = 'uploads/' . $imgFinalName ;
        if(move_uploaded_file($imgTemp , $dispath)){

            $sql = "INSERT INTO `users`(`title`, `content`, `image`, `startDate`, `endDate`) VALUES ('$title','$content','$imgFinalName','$startDate' , '$endDate')";
            $op = mysqli_query($con , $sql);
            mysqli_close($con);
            if($op){
                echo 'Raw Inserted';
            }else{
                echo 'Error Try Again '.mysqli_error($con);
            }
        }else{
            echo 'Errot Try Again ... ';
        }

        }
    }



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Register</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="container">
        <h2>Form</h2>

        <form action="<?php echo  htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label for="exampleInputTitle">Title</label>
                <input type="text" class="form-control" required id="exampleInputTitle" aria-describedby="" name="title" placeholder="Enter Title">
            </div>



            <div class="form-group">
                <label for="exampleInputContent">Content</label>
                <input type="text" class="form-control" required id="exampleInputContent" aria-describedby="" name="content" placeholder="Enter email">
            </div>

    
            <div class="form-group">
                <label for="exampleInputimage">Image</label>
                <input type="file" name="image">
            </div>

              

            <div class="form-group">
                <label for="exampleInputDate">startDate</label>
                <input type="date" class="form-control" name="startDate" />
            </div>

            <div class="form-group">
                <label for="exampleInputDate">endDate</label>
                <input type="date" class="form-control" name="endDate"  />
            </div>



            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>


</body>

</html>