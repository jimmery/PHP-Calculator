<?php

$hi = "1+1";
$pattern = '/[\+\-\*\/]/';

echo $hi;
echo "<br>";

if(validate_input($hi)) {
    echo "Match found!<br>";
}

function validate_input($in) {
    return preg_match("/^[ 0-9\+\-\*\/]+$/", $in, $matches) //only nums/ops.
        && !preg_match("/[\+\-\*\/][\+\-\*\/]/", $in, $matches);
}
//print_r($matches);

$answer = 0;
$test = "1+2";

$string = 'cup';
$name = 'coffee';
$str = 'This is a $string with my $name in it.';
echo $str . "<br>";
eval("\$str = \"$str\";");
echo $str . "<br>";

eval("\$answer = " . $test . ";");
echo $answer . "<br>";

?>