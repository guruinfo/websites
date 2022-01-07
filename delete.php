<?php
include('db-regis.php');
$id=$_GET['a'];
echo $id;
// sql to delete a record
$sql = "DELETE FROM regisform WHERE PersonID=$id";

if (mysqli_query($conn, $sql)) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . mysqli_error($conn);
}

?>