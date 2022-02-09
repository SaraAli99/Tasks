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
        <h2>Register</h2>
      
        <form action="profilePage.php" method="post" enctype="multipart/form-data" >

            <div class="form-group">
                <label for="exampleInputName">Name</label>
                <input type="text" class="form-control"   id="exampleInputName" aria-describedby=""   name="name" placeholder="Enter Name">
            </div>
             
            </br>
            </br>


            <div class="form-group">
                <label for="exampleInputEmail">Email </label>
                <input type="email" class="form-control"    id="exampleInputEmail1" aria-describedby="emailHelp" name="email" placeholder="Enter email">
            </div>

            </br>
            </br>

            <div class="form-group">
                <label for="exampleInputPassword">New Password</label>
                <input type="password" class="form-control"  id="exampleInputPassword1"   name="password" placeholder="Password">
            </div>

            </br>
            </br>

            <div class="form-group">
                <label for="exampleInputAddress">Address</label>
                <input type="address" class="form-control"  id="exampleInputaddress1"   name="address" placeholder="Address">
            </div>

            </br>
            </br>

            <div class="form-group">
            <input type="radio" name="gender" value="male"> Male
            <input type="radio" name="gender" value="female"> Female
            </div>

            </br>
            </br>

            <div class="form-group">
                <label for="exampleInputLinkedin">Linkedin url</label>
                <input type="address" class="form-control"  id="exampleInputLinkedin url1"   name="Linkedin_url" placeholder="Linkedin url">
            </div>
       
            </br>
            </br>

            <div class="form-group">
                <label for="exampleInputPassword">Image</label>
                <input type="file" name="image">
            </div>

            </br>
            </br>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

</body>
</html>