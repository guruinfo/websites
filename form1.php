<?php   
include("db-regis.php");
?>
<html>
    <head>
        <head>
            <title>form-html</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.js"></script>
    

    <style>


        </style>
        </head>
    </head>
    <body>
        <?php
$sql = "SELECT * FROM regisform";
$result = mysqli_query($conn, $sql);

?>
        <table id="table1">
            <thead>
            <tr>
    
    <th>PersonID</th>
    
    <th>username</th>
    
    <th>email</th>
    
    <th>mobile</th>
    <th>pass</th>
    <th>confirm</th>
    <th>Delete</th>
    </tr>
            </thead>
            <tbody>
                <?php

if (mysqli_num_rows($result) > 0) {
    // output data of each row
             
      while($row = mysqli_fetch_assoc($result)) {
      
        $id=$row['PersonID'];
      
        echo "<tr>";
      
        echo "<td>" . $id . "</td>";
      
        echo "<td>" . $row['username'] . "</td>";
      
        echo "<td>" . $row['email'] . "</td>";
      
        echo "<td>" . $row['mobile'] . "</td>";
        echo "<td>" . $row['pass'] . "</td>";
        echo "<td>" . $row['confirm'] . "</td>";
        echo "<td> <a href='delete.php?a=".$id."'><button>Delete</button></a> </td>";
        echo "<td> <a href='#'><button>Update</button></a> </td>";
        echo "</tr>";
      
        
      
         
          
      }
      echo "</table>";
  }
  ?>


               
            </tbody>
        </table>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  
        <script>
            $(document).ready(function(){
            $('#table1').DataTable();
            });
        </script>
    </body>
</html>