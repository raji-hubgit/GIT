<center><h1>PHP Assignments Basics</h1></center>

<h4>Write a PHP script to display the following strings.Sample String:'Tomorrow I \'ll learn PHP global variables.''This is a bad command : del c:\\*.*'Expected Output:Tomorrow I 'll learn PHP global variables.This is a bad command : del c:\*.*</h4>

<?php
    echo "Tomorrow I \'ll learn PHP global variables."."\n";
    echo "This is a bad command : del c:\\*.*"."\n";
?>
<center><p>/************************************************ */</p></center>
<h4>$var = 'PHP Tutorial'. Put this variable into the title section, h3 tag and as an anchor text within an HTML document.Sample Output :PHP TutorialPHP, an acronym for Hypertext Preprocessor, is a widely-usedopen source general-purpose scripting language. It is a cross-platform, HTML embedded server-side scripting language and is especially suited for web development.Go to the PHP Tutorial.</h4>

<?php
    $var= "PHP Tutorial";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta content="text" charset="utf-8">
        <title><?php echo $var; ?></title>
    </head>
    <body>
        <h3><?php echo $var; ?></h3>
        <p>PHP, an acronym for Hypertext Preprocessor, is a widely-usedopen source general-purpose scripting language. It is a cross-platform, HTML embedded server-side scripting language and is especially suited for web development.</p>
        <p><a href="">Go to the <?php echo $var;?></a>.</p>
    </body>
</html>
<center><p>/************************************************ */</p></center>
<h4>Create a simple HTML form and accept the user name and display the name through PHP echo statement.Sample output of the HTML form </h4>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Form Creation</title>
    </head>
    <body>
        <form method="POST">
            <h2>Please input your name:</h2>
            <input type="text" name="name">
            <input type="submit" value="Submit Name">
        </form>
<?php 
//Retriving the name
$name= $_POST['name'];
echo "<h5>Hello $name</h5>";
?>
    </body>
</html>
<center><p>/************************************************ */</p></center>

<h4>Write a PHP script to get the client IP address.</h4>


<?php

//whether ip is from remote address

  $localIP = getHostByName(getHostName());
  
echo $localIP;
?>

<center><p>/************************************************ */</p></center>

<h4>Write a PHP program to convert word to digit.Input: zero;three;five;six;eight;one Output: 035681</h4>

<?php
function convert_word_to_digit($word) {
    $var = explode(';',$word);
    $result = '';
    foreach($var as $value){
        switch(trim($value)){
            case 'zero':
                $result .= '0';
                break;
            case 'one':
                $result .= '1';
                break;
            case 'two':
                $result .= '2';
                break;
            case 'three':
                $result .= '3';
                break;
            case 'four':
                $result .= '4';
                break;
            case 'five':
                $result .= '5';
                break;
            case 'six':
                $result .= '6';
                break;
            case 'seven':
                $result .= '7';
                break;
            case 'eight':
                $result .= '8';
                break;
            case 'nine':
                $result .= '9';
                break;    
        }
    }
    return $result;
}

echo convert_word_to_digit("zero;three;five;six;eight;one")."\n";
//echo convert_word_to_digit("seven;zero;one")."\n";
?>

<center><p>/************************************************ */</p></center>

<h4>Write a PHP program to remove duplicates from a sorted list.Input: (1,1,2,2,3,4,5,5)Output: (1,2,3,4,5)</h4>
<?php

function remove_duplicates($list){
    
    $result = array_values(array_unique($list));
    return $result;

}

$input = array(1,1,2,2,3,4,5,5);
print_r(remove_duplicates($input));
?>

<center><p>/************************************************ */</p></center>

<h4>Write a PHP script that inserts a new item in an array in any position.Expected Output:Original array :1 2 3 4 5After inserting '$' the array is :1 2 3 $ 4 5</h4>

<?php
    $input = array( '1','2','3','4','5' );
echo 'Original array : '."\n";
foreach ($input as $i) 
{echo "$i ";}
$insert = '$';
array_splice( $input, 3, 0, $insert ); 
echo " \n After inserting '$' the array is : "."\n";
foreach ($input as $i) 
{echo "$i ";}
echo "\n"
?>

<center><p>/************************************************ */</p></center>

<h4>Write a PHP script to sort the following associative array :array("Sophia"=>"31","Jacob"=>"41","William"=>"39","Ramesh"=>"40") ina) ascending order sort by valueb) ascending order sort by Keyc) descending order sorting by Valued) descending order sorting by Key</h4>

<p>a) ascending order sort by value</p>
<?php
	$people = array("Sophia"=>"31","Jacob"=>"41","William"=>"39","Ramesh"=>"40"); 
	asort($people);
	foreach($people as $name=>$age){  
		echo $name." </t> ".$age."<br>";
	}
?>

<p>b) ascending order sort by key</p>
<?php
	$people = array("Sophia"=>"31","Jacob"=>"41","William"=>"39","Ramesh"=>"40"); 
	ksort($people);
	foreach($people as $name=>$age){  
		echo $name." </t> ".$age."<br>";
	}
?>

<p>c) descending order sort by value</p>
<?php
	$people = array("Sophia"=>"31","Jacob"=>"41","William"=>"39","Ramesh"=>"40"); 
	arsort($people);
	foreach($people as $name=>$age){  
		echo $name." </t> ".$age."<br>";
	}
?>

<p>d) descending order sort by key</p>
<?php
	$people = array("Sophia"=>"31","Jacob"=>"41","William"=>"39","Ramesh"=>"40"); 
	krsort($people);
	foreach($people as $name=>$age){  
		echo $name." </t> ".$age."<br>";
	}
?>

<center><p>/************************************************ */</p></center>

<h4>Write a PHP script to decode a JSON string</h4>

<?php

    function decode_json_string($value,$key)
    {
        echo "$key : $value"."\t";
        echo "\n";
    }
    $json = '{"firstName":"Peter","lastName:":"Silva","age":23}';

    $personInfo = json_decode($json,true);
    echo "\n";
    //var_dump($personInfo);
    array_walk_recursive($personInfo,"decode_json_string");

?>

<center><p>/************************************************ */</p></center>

<h4>Write a PHP script to print letters from 'a' to 'z'.Expected Result :abcdefghijklmnopqrstuvwxyz</h4>

<?php

    for ($x = ord('a'); $x <= ord('z'); $x++)
        echo chr($x)."\t";
        echo "\n"
?>
<center><p>/************************************************ */</p></center>

<h4>Write a PHP script to remove part of a string.Original String: 'The quick brown fox jumps over the lazy dog'Remove 'fox' from the above string.</h4>

<?php
    $my_str = 'The quick brown fox jumps over the lazy dog';
    echo str_replace("fox", " ", $my_str)."\n";
?>

<center><p>/************************************************ */</p></center>

<h4>Write a PHP script to get the filename component of the following path.Sample path :"https://www.w3resource.com/index.php"Expected Output: 'index'</h4>

<?php
    $path = 'www.example.com/public_html/index.php';
    
    $basename = pathinfo($path, PATHINFO_BASENAME);
   
    print_r($basename ."\n");
?>
