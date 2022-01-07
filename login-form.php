<?php   
include("db-regis.php");
session_start();
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
             $email = $password =" ";
             $emailerr =$passworderr =" ";

             if($_SERVER["REQUEST_METHOD"]=="POST"){
                
                
                if(empty($_POST["email"]))
                {
                    $emailerr="Email is required";
                }
                else{
                    $email=test_input(($_POST["email"]));
                    $_SESSION["mail"] = $email;
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
                    {
                        $emailerr = "Invalid email format";
                    }
                }

                if (empty($_POST["password"])) 
                {
                    $password = "password is required";

                } 
                else 
                {

                    $password =test_input(($_POST["password"]));
                    $_SESSION["pwd"] = $password;
                    $password = md5($password);
                }


                $sql=mysqli_query($conn,"SELECT * FROM regisform where email='$email' and pass='$password'");
                $row  = mysqli_fetch_array($sql);
                if(is_array($row))
                {
                    $_SESSION["id"] = $row['PersonID'];
                    $_SESSION["email"]=$row['email'];
                    $_SESSION["pass"]=$row['pass'];
             
                    header("Location: profile.php"); 
                }
                else
                {
                    echo "Invalid Email ID/Password";
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
            <div class="row d-flex justify-content-center">
            <h1 style="color:red" class="d-flex justify-content-center my-5">Login-Form</h1>
            <form method="post"action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"enctype="multipart/form-data">
                    
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
                        <div class="col-sm-6  text-dark">
                            <h4 style="margin-left:60%">Password:</h4> 
                        </div>
                        <div class="col-sm-6 ">
                            <input type="text"name="password" value="<?php echo $password;?>">
                        <span class="error">* <?php echo $passworderr;?></span>
                        </div>
                    </div>
                    <br><br>
                    
                    
                        <input type="submit"name="submit"value="Submit" class="btn btn-danger justify-content-center">
                        
            </form>
            <?php
             
                echo $_SESSION['mail'];
                echo "<br>";
                echo $_SESSION['pwd'];
            ?>        
            </div>
        </div>
        </body>
    </html>