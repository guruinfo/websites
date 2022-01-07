<?php
$a=array(20,35,87,56,12,80,45,30,90,91);
$arrlength = count($a);
$min=$a[0];
for($i=0;$i<$arrlength;$i++){
    
    if($a[$i]<$min){
        $min=$a[$i];
    }
    
}
echo"Largest Number is : ".$min;
?>