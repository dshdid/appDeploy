<html>
<head>
<title>Hello Name </title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet", href="styles.css">
</head>
<body>

<!-- <?php
$names = array("Patrick", "John", "Marie", "Claire", "Paul");
foreach ($names as $name) {
    if(strstr($name, "Pa"))
   	print "$name, ";
}
?> -->

<header>
    <br>
    <p>CALCULATOR</p>
    <br>
</header>

<br>

<ul class = sss>
    <li><a href = "index.php"> friend Book </a></li>
</ul>

<div>
    <?php
        $name = $_GET['name'];
        echo "<h1>Hello, $name</h1>";    
    ?>
</div>

<br>

<div>
<h4>Hi, if you want to do some calculation, please change the op , x, y in the URL to: </h4>
<ul>
    <li>op might be equal to sum, substract, multiply or divide </li>
    <li>x can be equal to whatever </li>
    <li>y can be equal to whatever </li>
</ul>
</div>

<?php
class Calculator
{
    function sum($x, $y) {
	return $x + $y;
    }
    function substract($x, $y) {
        return $x - $y;
    }
    function multiply($x, $y) {
        return $x * $y;
    }
    function divide($x, $y) {
        return $x / $y;
}
}

if(!isset($_GET['op']) || !isset($_GET['x']) || !isset($_GET['y'])){
    echo "<h1>Incorrect or incomplete data</h1>";
    exit();
}
$x = $_GET['x'];
$y = $_GET['y'];

switch($_GET['op']){
    case 'sum':
        $result = $x + $y;
        echo "<h1>$x + $y = $result</h1>";
        break;
    case 'substract':
        $result = $x - $y;
        echo "<h1>$x - $y = $result</h1>";
        break;
    case 'divide':
        if($y == 0){
            echo "<h1>Cannot divide by ZERO!</h1>";
        }
        $result = $x / $y;
        echo "<h1>$x / $y = $result</h1>";
        break;
    case 'multiply':
        $result = $x * $y;
        echo "<h1>$x * $y = $result</h1>";
        break;
    default:
    $op = $_GET['op'];
    echo "<h1>Unrecognized operation: $op</h1>";

}
print("\n");

?>

<footer>
    <p>Created for educational purposes</p>
</footer>


</body>
</html>
