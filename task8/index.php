<?php  

require 'dbConnection.php';

$sql = "SELECT users.* , account.title  from users  join account on users.account_id = account.id "; 


$data = mysqli_query($con,$sql);

?>



<!DOCTYPE html>
<html>

<head>
    <title>PDO - Read Records - PHP CRUD Tutorial</title>

    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

    <!-- custom css -->
    <style>
        .m-r-1em {
            margin-right: 1em;
        }

        .m-b-1em {
            margin-bottom: 1em;
        }

        .m-l-1em {
            margin-left: 1em;
        }

        .mt0 {
            margin-top: 0;
        }
    </style>

</head>

<body>

    <!-- container -->
    <div class="container">


        <div class="page-header">
            <h1>Read Users </h1>
            <br>



          <?php 
          


            if(isset($_SESSION['Message'])){
                echo ' * '.$_SESSION['Message'];

                unset($_SESSION['Message']);
            }
          


          
          ?>
        
        </div>

        <a href="create.php">+ Account</a> 

        <table class='table table-hover table-responsive table-bordered'>
            <!-- creating our table heading -->
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Content</th>
                <th>Image</th>
                <th>startDate</th>
                <th>endDate</th>
                <th>account</th>

                <th>action</th>
            </tr>

   <?php 
        while($result = mysqli_fetch_assoc($data)){


   ?>
            <tr>
                <td><?php  echo $result['id'];  ?></td>
                <td><?php  echo $result['title'];  ?></td>
                <td><?php  echo $result['content'];  ?></td>
                <td> <img src="./uploads/<?php  echo $result['image'];  ?>"   height="50" width="50" > </td>
                <td><?php  echo $result['startDate'];  ?></td>
                <td><?php  echo $result['endDate'];  ?></td>
                <td><?php  echo $result['account_id'];  ?></td>
               

                <td>
                    <a href='delete.php?id=<?php  echo $result['id'];  ?>' class='btn btn-danger m-r-1em'>Delete</a>
                </td>
            </tr>

<?php  } ?>
            <!-- end table -->
        </table>

    </div>
    <!-- end .container -->


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    <!-- Latest compiled and minified Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- confirm delete record will be here -->

</body>

</html>


<?php 
  
  mysqli_close($con);

?>