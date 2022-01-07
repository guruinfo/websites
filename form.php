<?php   
include("db.php");
?>
<html>
<head>
    <title>2form </title>
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
            height: 200%;
            background-image: url("pngtree2.jpg");
            background-repeat: no-repeat;
            background-size: 100% 100%
        }
        .card {
            
            background-color: pink;
            border: none !important;
            box-shadow: 0 6px 12px 0 rgba(0, 0, 0, 0.2)
            }
        </style>
</head>
<body>
    <?php
    $name = $email = $age =$mobile =$website = $address = $comment= $alength= $gender="";
    $nameerr = $emailerr = $ageerr = $mobileerr= $websiteerr =$addresserr = $commenterr = $gendererr="";
    
    if($_SERVER ["REQUEST_METHOD"]=="POST")
    {
        if(empty($_POST["name"])){
           $nameerr="Name is required";
        }
        else{
            $name=test_input(($_POST["name"]));
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

        if(empty($_POST["age"])){
            $ageerr="Age is required";
        }
        else{
            $age=test_input(($_POST["age"]));
            $alength=strlen($age);
        if ($alength > 2){
            $ageerr= " Invalid username. Age cannot be greater than 2 char";
            }
        else if (!preg_match("/^[0-9 ]*$/",$age)) {
                $ageerr = "Only intergers allowed";
         }
        else if ($age >= 18 && $age <=30) {
            $ageerr= " You are eligible for vote";
        } else {
            $ageerr = " You are not eligible for vote. ";
        }
        }

        if (empty($_POST["website"])) {
            $website = "";
          } else {
            $website =test_input(($_POST["website"]));
            
            // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
            if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
              $websiteErr = "Invalid URL";
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

        if(empty($_POST["address"])){
            $addresserr="address is required";
            }
        else{
            $address=test_input(($_POST["address"]));
        if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
            $addresserr = "Invalid address";
        }
        }

        if(empty($_POST["comment"])){
             $commenterr="comment is required ";
            }
        else{
            $comment=test_input(($_POST["comment"]));
        }

        if(empty($_POST["gender"])){
            $gendererr="Gender is required";
        }
        else{
            $gender=test_input(($_POST["gender"]));
        }
        
        $sql = "INSERT INTO myguests (`name`,`email`,`age`,`mobile`,`website`,`gender`,`address`)
                VALUES ('$name','$email','$age','$mobile','$website','$gender','$address')";
        

       
        

        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully";
            } else {
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
    
        // if(isset($_FILES['image'])){
        //     $errors= array();
        //     $file_name = $_FILES['image']['name'];
        //     $file_size = $_FILES['image']['size'];
        //     $file_tmp = $_FILES['image']['tmp_name'];
        //     $file_type = $_FILES['image']['type'];
        //     // $file_ext="jpg";
        //     $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
        
        //     $expensions= array("jpg","js","css","html","png");
        //     if(in_array($file_ext,$expensions)===false){
        //         $errors[]= "Extension are allowed, Only html and css are allowed";
        //     }
        
        //     if($file_size > 2097152){
        //         $errors[] = "file size must be exactly 2 mb";
        //     }
        
        //     if(empty($errors)==true){
        //         move_uploaded_file($file_tmp,"images/".$file_name);
        //         echo "success";
        //     }
        //     else{
        //         print_r($errors);
        //     }


        // }
    
    
    
    ?>
    <div class="container">
        <div class="row d-flex justify-content-center ">
            <div class="col-sm-8  text-center">
                <h1 style="color:white">Form</h1>
                
                    <form method="post"action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-sm-6 text-white">
                               <p style="margin-left:40%">Name:</p> 
                            </div>
                            <div class="col-sm-6 ">
                                <input type="text" name="name"placeholder="Username" value="<?php echo $name;?> ">
                                <span class="error">* <?php echo $nameerr;?></span>
                            </div>
                        </div>
                    <br><br>


                <div class="row">
                    <div class="col-sm-6 text-white">
                   <p style="margin-left:40%"> Email:</p>
                </div>
                <div class="col-sm-6 ">
                    <input type="text"name="email" value="<?php echo $email;?>">
                    <span class="error">* <?php echo $emailerr;?></span>
                </div>
                </div>
                <br><br>
                <div class="row">
                    <div class="col-sm-6 text-white">
                   <p style="margin-left:40%">Age:</p>
                    </div>
                    <div class="col-sm-6 ">
                        <input type="text"name="age" value="<?php echo $age;?>">
                        <span class="error">* <?php echo $ageerr;?></span>
                    </div>
                </div>
                <br><br>
    
    
                <div class="row">
                    <div class="col-sm-6  text-white">
                      <p style="margin-left:40%">  Mobile:</p>
                    </div>
                    <div class="col-sm-6 ">
                        <input type="text"name="mobile" value="<?php echo $mobile;?>">
                        <span class="error">* <?php echo $mobileerr;?></span>
                    </div>
            </div>
    <br><br>
            <div class="row">
                <div class="col-sm-6  text-white">
                 <p style="margin-left:40%">Website:</p> 
                </div>
                <div class="col-sm-6 ">
                    <input type="text"name="website" value="<?php echo $website;?>">
                    <span class="error">* <?php echo $websiteerr;?></span>
                </div>
            </div>
    <br><br>
            <div class="row">
                <div class="col-sm-6  text-white">
                    <p style="margin-left:40%">Address: </p>
                </div>  
                <div class="col-sm-6">
                    <input type="text"name="address" value="<?php echo $address;?>">
                    <span class="error">* <?php echo $addresserr;?></span>
                </div>
            </div>
    <br><br>
            <div class="row">
                <div class="col-sm-6 text-white">
                     <p style="margin-left:40%">Comment:</p> 
                </div>
                <div class="col-sm-6 ">
                    <textarea name="comment" rows="3" cols="30"style="margin-left:15px"><?php echo $comment;?></textarea>
                    <span class="error">* <?php echo $commenterr;?></span>
                </div>
            </div>    
        <br><br>
            <div class="row">
                <div class="col-sm-6  text-white">
                    <p style="margin-left:40%">Gender:</p>
                </div>
                <div class="col-sm-6  text-white">
                    <input type="radio" name="gender" <?php if (isset($gender) && $gender == "female")echo "checked";?>
                    value="female">Female
                    <input type="radio"name="gender"<?php if(isset($gender) && $gender == "male")echo "checked";?> value="male">Male
                    <input type="radio" name="gender"<?php if(isset($gender) && $gender == "other")echo "checked"; ?> value="other">Other
                    <span class="error">* <?php echo $gendererr;?></span>
                </div>
            </div>    
        <br><br>
        <div class="row">
                <div class="col-sm-6  text-white">
                    <label for="city"style="margin-left:40%">Select a City:</label>
                </div>
                <div class="col-sm-6  text-white">
                    <select id="city" name="carlist" form="carform">
                    <option value="Bathinda">Bathinda</option>
                    <option value="Amritsar">Amritsar</option>
                    <option value="Faridkot">Faridkot</option>
                    <option value="Chandigarh">Chandigarh</option>
                    </select>
                </div>
        </div>
        <br><br>
        <!-- <input type="file" name="image" multiple="multiple"> -->
        <input type="submit"name="submit"value="Submit" class="btn btn-success">
        <input type="reset"name="reset"value="Reset"class="btn btn-success">



        
    </form>
    <?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $age;
echo "<br>";
echo $mobile;
echo "<br>";
echo $address;
echo "<br>";
echo $comment;
echo "<br>";
echo "$gender";

?>
</div>
</div>
</div>


</body>
</html>