<!DOCTYPE HTML>
<html>
<body>

<?php
echo "<h1>Calculator</h1>";
echo "<br>";
echo "Type an expression in the following box";

echo "<br>";

$name = "";
//$name = test_input($_POST["name"]);
?>

<form method="post" action="<?php echo
htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <input type="text" name="name">
      <input type="submit" name="calculate" value="Calculate">
</form>

</body>
</html>