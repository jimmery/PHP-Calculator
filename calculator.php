<!DOCTYPE HTML>
<html>
<body>

<?php
echo "<h1>Calculator</h1>";
echo "Type an expression in the following box.";

$expr = "";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $expr = change_input($_GET["expr"]);
}

//currently this method removes whitespace from beginning and end of input
function change_input($in) {
    $in = trim($in);
    $in = str_replace("--", "- -", $in);
    return $in;
}
?>

<form method="get" action="<?php echo
htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <input type="text" name="expr">
      <input type="submit" name="calculate" value="Calculate">
</form>

<?php
echo "<h2>Your input: </h2>";
if (strlen($expr) == 0)
{
    // do nothing.
}
elseif(check_divide_by_zero($expr))
{
    echo "Divide by zero error!";
}
elseif(validate_input($expr))
{
    echo $expr . " = ";
    eval("\$answer = " . $expr . ";");
    echo $answer . "<br>";
} 
else
{
    echo "Invalid Input!";
}

function check_divide_by_zero($in)
{
    return preg_match("/\/[ ]*0/", $in, $mat);
}

function validate_input($in)
{
    return preg_match("/^[0-9\-]/", $in, $mat) // starts w/ num or neg.
        && preg_match("/[0-9]$/", $in, $mat) // ends w/ num. 
        && preg_match("/^[ \.0-9\+\-\*\/]+$/", $in, $mat) //only nums/ops.
        && !preg_match("/[\.\+\-\*\/][\.\+\-\*\/]/", $in, $mat) //no 2 ops.
        && !preg_match("/\.[^0123456789]/", $in, $mat) // no dot followed by nonnum
        && !(preg_match("/^0+[0-9]+/", $in, $mat) || preg_match("/[ \+\-\*\/]0[0-9]+/", $in, $mat)); //no nonzero nums starting with 0
        ;
}
    
?>

</body>
</html>
