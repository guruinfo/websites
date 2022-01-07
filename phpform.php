<html>
    <head>
        <title>php Form</title>
        <style>
            .error{
                color:red;
            }
        </style>
    </head>
    <body>
        <?php
         $name = $email = $website = $comment = $gender="";
         $nameerr = $emailerr = $websiteerr = $gendererr="";

         if($_SERVER ["REQUEST_METHOD"]=="POST"){
             if(empty($_POST["name"])){
                $nameerr="Name is required";
             }
             else{
                 $name=test_input(($_POST["name"]));
                 if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
                    $nameerr = "Only letters and white space allowed";
             }
            }
         

         if(empty($_POST["email"])){
             $emailerr="Email is required";
         }
         else{
             $email=test_input(($_POST["email"]));
             if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailerr = "Invalid email format";
              }
         }

         if(empty($_POST["website"])){
            $website="";
         }
         else{
             $website=test_input(($_POST["website"]));
             if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
                $websiteerr = "Invalid URL";
         }
        }

         if(empty($_POST["comment"])){
            $comment="";
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
        }
         function test_input($data){
             $data= trim($data);
             $data= stripslashes($data);
             $data= htmlspecialchars($data);
             return $data;
         }
        ?>
        <h1>PHP Form Validation Example</h1>
        <p class="error"> * Required field</p>
        <form method="post"action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
        Name:<input type="text" name="name"  value="<?php echo $name;?>">
        <span class="error">* <?php echo $nameerr?></span>
        <br><br>
        Email:<input type="text" name="email" value="<?php echo $email;?>">
        <span class="error">* <?php echo $emailerr?></span>
        <br><br>
        Website:<input type="text"name="website" value="<?php echo $website;?>">
        <span class="error"><?php echo $websiteerr?></span>
        <br><br>
        Comment:<textarea name="comment" rows="5" cols="30"><?php echo $comment;?></textarea>
        <br><br>
        Gender:<input type="radio" name="gender" <?php if(isset($gender) && $gender == "female")
        echo "checked";?> value="female">Female
        <input type="radio" name="gender" <?php if(isset($gender) && $gender == "male")
        echo"checked";?>value="male">Male
        <input type="radio" name="gender"<?php if(isset($gender) && $gender == "other") 
        echo"checked";?>value ="other">Other
        <span class="error">* <?php echo $gendererr?></span>
        <br><br>
     
        <input type="submit" name="submit" value="Submit">

</form>
<?php
echo"<h2> Your Input:</h2>";
echo"$name";
echo"<br>";
echo"$email";
echo"<br>";
echo"$website";
echo"<br>";
echo"$comment";
echo"<br>";
echo"$gender";
?>
    </body>
</html>