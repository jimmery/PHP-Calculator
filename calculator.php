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


function change_input($in) {
    // not sure what to do here, but apparently we have to turn
    // 5--5 to 5 - -5, which i guess we can do here.
    $in = trim($in);
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

    //$answer = 0;
    eval("\$answer = " . $expr . ";");
    echo $answer . "<br>";
} 
else
{
    echo "Invalid Input!";
}

// doesn't need to be a function, but lol. 
function check_divide_by_zero($in)
{
    return preg_match("/\/[ ]*0/", $in, $mat);
}

// verifies stuff.
// add more here, if necessary (e.g. -- error. ...?)
function validate_input($in)
{
    return preg_match("/^[0-9\-]/", $in, $mat) // starts w/ num or neg.
        && preg_match("/[0-9]$/", $in, $mat) // ends w/ num. 
        && preg_match("/^[ .0-9\+\-\*\/]+$/", $in, $mat) //only nums/ops.
        && !preg_match("/[.\+\-\*\/][.\+\-\*\/]/", $in, $mat) //no 2 ops.
        ;
}
    

?>

</body>
</html>