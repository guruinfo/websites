<html>
<head>
    <title>tableForloop</title>
    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }
        

    </style>
</head>
<body>
<table border='1'>
    <tr style="color:red">
        <th>Id</th>
        <th>Name</th>
        <th>Email</th>
        <th>password</th>
        <th>Mobile</th>
        <th>Update</th>
        <th>Delete</th>
        
    </tr>
    <?php
    $i="";
    

    $name=array("John","Petter","David","Arsh","Nimrat","Simrat","Raman","Sonu","Naman","Khushi");
    $email=array("john@gmail.com","petter@gmail.com","david@gmail.com","arsh@gmail.com","nimrat@gmail.com","simrat@gmail.com","raman@gmail.com","sonu@gmail.com","naman@gmail.com","khushi@gmail.com");
    $pass=array(1234,1234,1234,1234,1234,1234,1234,1234,1234,1234);
    $mobile=array(9874563212,9874563212,9874563212,9321456987,8965471236,9874563214,7896541236,9874563218,9874563218,984563214);
    
    
    for($i=0;$i<10;$i++)
    {
       echo '
        <tr>
        <td style="background-color:pink">'.$i.'</td>
        <td style="background-color:cyan">'.$name[$i].'</td>
        <td style="background-color:yellow">'.$email[$i].'</td>
        <td style="background-color:green;color:white">'.$pass[$i].'</td>
        <td style="background-color:purple;color:white">'.$mobile[$i].'</td>
        <td style="background-color:grey"><a href="http://www.google.com?id='.$i.'"><button type="button">update</button></a></td>
        <td style="background-color:red"><a href="http://www.google.com?id='.$i.'"><button type="button">delete</button></a></td>
      </tr>';
        
    }
    ?>
    </table>
</body>
</html>
