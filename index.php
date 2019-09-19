
<?php
for($i=0;$i<5;$i++)     // row
{
	for($j=$i;$j<5;$j++)     // column 0r space
	{  
		echo "*";   //  Print *
    }
 echo " "."<br/>";
} 
?>

<br/>

<?php
for($i=0;$i<5;$i++)     // row
{
	for($j=0;$j<=$i;$j++)     // column 0r space
	{  
		echo "*";   //  Print *
    }
 echo " "."<br/>";
} 
?>


<?php
for($i=0;$i<5;$i++)     // row
{
	for($j=0;$j<=$i;$j++)     // column 0r space
	{  
		echo "*";   //  Print *
    }
 echo " "."<br/>";
} 
?>

<?php
for($i=0;$i<6;$i++)     // row
{
	for($j=0;$j<=$i;$j++)     // column 0r space
	{  
		echo "*";   //  Print *
    }



 echo " "."<br/>";
} 
?>




// PHP Code to sort an array without using array sorting function
<?php

// take an array with some elements
$array = array(9, 2, 18, 34, 3, 10, 15);
// get the size of array
$count = count($array);
echo "<pre>";
// Print array elements before sorting
print_r($array);
for ($i = 0; $i < $count; $i++) {
    for ($j = $i + 1; $j < $count; $j++) {
        if ($array[$i] > $array[$j]) {
            $temp = $array[$i];
            $array[$i] = $array[$j];
            $array[$j] = $temp;
        }
    }
}
echo "Sorted Array:" . "<br/>";
// Print array elements after sorting
print_r($array);

?>
// string reverse
<?php
$stringExp="NodeJS";
$len=strlen($stringExp);

for ($i = $len - 1; $i >=0;$i--)
{
   echo $stringExp[$i];
}

echo "<br>";
$string = 'zeeshan';
$reverse = '';
$i = 0;
while(!empty($string[$i])){ 
      $reverse = $string[$i].$reverse; 
      $i++;
}
echo $reverse;
?>
<?php
$array1 = array(1,2,1,3,4,3,5,6,7,4,8,1);
 
$array2 = array();
 
for($i=0;$i<count($array1);$i++) {
    if(!in_array($array1[$i],$array2)) {
	    $array2[] = $array1[$i];		
	}
}
 
print_r($array2);

$temp = array();
    foreach ( $array1 as $v ) {
        isset($temp[$v]) or $temp[$v] = 0;
        $temp[$v] ++;
    }
print_r($temp);
 $inputArray = array(1, 4, 2, 1, 6, 4, 9, 7, 2, 9);
$outputArray = array();

foreach ($inputArray as $inputArrayItem) {
    foreach ($outputArray as $outputArrayItem) {
        if ($inputArrayItem == $outputArrayItem) {
            continue 2;
        }
    }
    $outputArray[] = $inputArrayItem;
}
print_r($outputArray);

?>
<?php
$sports = array("Baseball", "Cricket", "Football", "Shooting");
$end=end($sports);
echo $end;
echo "<br>";
$transport = array('foot', 'bike', 'car', 'plane');
if(!empty($transport[count($transport)-1])) {
    unset($transport[count($transport)-1]);
}

print_r($transport);
 
// Deleting last array item
$removed = array_pop($sports);
print_r($sports);
echo "<br>";
var_dump($removed);
?>
<?php
//Recursive Binary Search

$list = array(0, 1, 1, 2, 3, 5, 8, 13, 21, 34, 55, 89, 144);
$x = 55;
 
function binary_search($x, $list, $left, $right) 
{
	if ($left > $right)
		return -1;
 
	$mid = ($left + $right) >> 1;
 
	if ($list[$mid] == $x) {
		return $mid;
	} elseif ($list[$mid] > $x) {
		return binary_search($x, $list, $left, $mid-1);
	} elseif ($list[$mid] < $x) {
		return binary_search($x, $list, $mid+1, $right);
	}
}
 
//echo binary_search($x, $list, 0, count($list)-1);

?>
<?php
// Iterative Binary Search
$list = array(0, 1, 1, 2, 3, 5, 8, 13, 21, 34, 55, 89, 144);
$x = 55;
 
function iterative_binary_search($x, $list) 
{
	$left = 0;
	$right = count($list)-1;
 
	while ($left <= $right) {
		$mid = ($left + $right) >> 1;
 
		if ($list[$mid] == $x) {
			return $mid;
		} elseif ($list[$mid] > $x) {
			$right = $mid - 1;
		} elseif ($list[$mid] < $x) {
			$left = $mid + 1;
		}
	}
 
	return -1;
}
 
//echo iterative_binary_search($x, $list);echo "<br>";
?>
<?php

$str='sohan';
$num='10';
echo $num;echo "<br>";
echo print($str);echo "<br>";

print_r('sohan');

?>
<?php

$str = 'India';

$i = 0;
while(@$str[$i]) {
    $i++;
}
echo "<br>";
echo 'Length of ' . $str . ' is ' . $i . '.';

$s = 'string';
$i=0;
while (@$s[$i] != '') {
  $i++;
}
echo "<br>";
print $i;

?>


<?php

$string="1,2,3,4";
$sum=array_sum(explode(",", $string));
echo "<br>";echo $sum;

?>


