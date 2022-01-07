<?php
if(isset($_FILES['image'])){
    $errors= array();
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $file_type = $_FILES['image']['type'];
    $total_count = count($_FILES['upload']['name']);
    // $file_ext="jpg";
    $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));

    $expensions= array("jpg","jpeg","php","html");
    if(in_array($file_ext,$expensions)===false){      //triple equal means "five" and "5" are not equal
        $errors[]= "Extension are not allowed, Only jpeg and png are allowed";
    }

    if($file_size > 2097152){
        $errors[] = "file size must be exactly 2 mb";
    }

    if(empty($errors)==true){
        move_uploaded_file($file_tmp,"images/".$file_name);
        echo "success";
    }
    else{
        print_r($errors);
    }
}
?>



<html>
    <body>
        <form action="" method="POST" enctype="multipart/form-data">
        <input type="file" name="image" multiple="multiple">
        <input type="submit"/>
        </form>
    </body>
    </html>