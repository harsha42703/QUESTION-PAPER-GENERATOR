<?php 
$inputNames=["1","1","0","0","0","0"];
$pushque=[0,1,2,3,4,5,6,7,8,9,10,11,12];
$lq =5;
for ($j = 0; $j < count($inputNames) / 2; $j++) {
    // Get the two values for each iteration
    $value1 = $inputNames[$j * 2];
    $value2 = $inputNames[$j * 2 + 1];
    
    // Check if the values are 0 or 1 and echo the corresponding div
    if ($value1 == 0) {
        echo "{$pushque[$lq]} ";
    $lq+=1;
    } else {
        echo "
         {$pushque[$lq]}{$pushque[$lq+1]}";
        $lq+=2;
    }
   
    if ($value2 == 0) {
        echo "{$pushque[$lq]} ";
    $lq+=1;
    } else {
        echo "{$pushque[$lq]}  {$pushque[$lq+1]}";
    $lq+=2;
    
    }
   
}



?>




      