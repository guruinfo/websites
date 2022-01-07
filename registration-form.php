<?php   
include("db-regis.php");
?>
<html>
    <head>
    <title>Registration-Form</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .error{
            color:red;
        }
        body {
            color: #000;
            overflow-x: hidden;
            height: 100%;
            background-image: url("th.jpg");
            background-repeat: no-repeat;
            background-size: 100% 100%
        }

    </style>
    </head>
    <body>
        <?php
             $name = $email =$mobile  = $password =$alength= $confirm=" ";
             $nameerr = $emailerr= $mobileerr =$passworderr = $confirmerr =" ";

        if($_SERVER["REQUEST_METHOD"]=="POST"){
            if(empty($_POST["name"]))
            {
                $nameerr= "Name is required";
            }
            else{
                $name = test_input(($_POST["name"]));
                if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
                    $nameerr = "Only letters and white space allowed";
                    }
                }
            
            if(empty($_POST["email"]))
            {
                $emailerr="Email is required";
            }
            else{
                $email=test_input(($_POST["email"]));
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
                {
                    $emailerr = "Invalid email format";
                }
            }



            if(empty($_POST["mobile"])){
                $mobileerr="Mobile is required";
            }
            else{
                $mobile=test_input(($_POST["mobile"]));
                $mlength=strlen($mobile);
            if ($mlength > 10){
                $mobileerr= " Invalid mobile. Mobile cannot be greater than 10 char";
                }
            if (!preg_match("/^['0-9 ]*$/",$mobile)) {
                $mobileerr = "Only integers and white space allowed";
            }
            }

            if (empty($_POST["password"])) {
                $password = "password is required";
              } else {
                $password =test_input(($_POST["password"]));
                $password = md5($password);

                
                
                
              }

              if (empty($_POST["confirm"])) {
                $confirmerr = "confirm-password is required";
              } else {

                $confirm =test_input(($_POST["confirm"]));
                $confirm = md5($confirm);
             
                if($password!=$confirm){
                    $confirmerr = "password not match"; 
                }
                
                
              }

              $sql = "INSERT INTO regisform (`username`,`email`,`mobile`,`pass`,`confirm`)
                VALUES ('$name','$email','$mobile','$password','$confirm')";
        
            if (mysqli_query($conn, $sql)) 
            {
                echo "New record created successfully";
            } 
            else 
            {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        
        mysqli_close($conn);
        }
        function test_input($data){
            $data= trim($data);
            $data= stripslashes($data);
            $data= htmlspecialchars($data);
            return $data;
        }
        ?>
        <div class="container">
            <div class="row d-flex justify-content-center  ">
                <h1 style="color:red" class="d-flex justify-content-center my-5">Registration-Form</h1>
                <form method="post"action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-sm-6 text-dark">
                            <h4 style="margin-left:60%">Username:</h4> 
                        </div>
                        <div class="col-sm-6">
                            <input type="text" name="name"placeholder="username" value="<?php echo $name;?> ">
                            <span class="error">* <?php echo $nameerr;?></span>
                        </div>
                    </div>
                    <br><br>
                    <div class="row">
                        <div class="col-sm-6 text-dark">
                            <h4 style="margin-left:60%"> Email:</h4>
                        </div>
                        <div class="col-sm-6 ">
                            <input type="text"name="email" value="<?php echo $email;?>">
                            <span class="error">* <?php echo $emailerr;?></span>
                        </div>
                    </div>
                    <br><br>
                    <div class="row">
                        <div class="col-sm-6 text-dark">
                            <h4 style="margin-left:60%">Mobile:</h4>
                        </div>
                        <div class="col-sm-6">
                            <input type="text"name="mobile" value="<?php echo $mobile;?>">
                            <span class="error">* <?php echo $mobileerr;?></span>
                        </div>
                    </div>
                    <br><br>


                    <div class="row">
                        <div class="col-sm-6  text-dark">
                            <h4 style="margin-left:60%">Password:</h4> 
                        </div>
                        <div class="col-sm-6 ">
                            <input type="text"name="password" value="<?php echo $password;?>">
                        <span class="error">* <?php echo $passworderr;?></span>
                        </div>
                    </div>
                    <br><br>
                    <div class="row">
                        <div class="col-sm-6  text-dark">
                            <h4 style="margin-left:60%">Confirm-Password: </h4>
                        </div>  
                        <div class="col-sm-6">
                            <input type="text"name="confirm" value="<?php echo $confirm;?>">
                            <span class="error">* <?php echo $confirmerr;?></span>
                        </div>
                    </div>
                    <br><br>
                    
                        <input type="submit"name="submit"value="Submit" class="btn btn-danger"style="margin-left:40%">
                        <input type="reset"name="reset"value="Reset"class="btn btn-danger"style="margin-left:1%">
                    
                </form>

                <?php
                echo "<h2>Your Input:</h2>";
                echo $name;
                echo "<br>";
                echo $email;
                echo "<br>";
                
                echo $mobile;
                echo "<br>";
                echo $password;
                echo "<br>";
                echo $confirm;
                echo "<br>";
                ?>

            </div>
        </div>
    </body>
    </html>