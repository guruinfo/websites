<?php   
include("db-regis.php");
?>

<?php
$sql = "SELECT * FROM regisform";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  
    echo "<table id='table1'>

    <tr>
    
    <th>PersonID</th>
    
    <th>username</th>
    
    <th>email</th>
    
    <th>mobile</th>
    <th>pass</th>
    <th>confirm</th>
    
    </tr>";
    
     
    
    while($row = mysqli_fetch_assoc($result)) {
    
      
    
      echo "<tr>";
    
      echo "<td>" . $row['PersonID'] . "</td>";
    
      echo "<td>" . $row['username'] . "</td>";
    
      echo "<td>" . $row['email'] . "</td>";
    
      echo "<td>" . $row['mobile'] . "</td>";
      echo "<td>" . $row['pass'] . "</td>";
      echo "<td>" . $row['confirm'] . "</td>";
      echo "<td> <a href='#'><button>delete</button></a> </td>";
      echo "</tr>";
    
      
    
       
        
    }
    echo "</table>";
}  

mysqli_close($conn);
?>
!