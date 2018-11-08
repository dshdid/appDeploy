<html>
<head>
<title>Hello Name </title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet", href="styles.css">
</head>
<body>

<header>
    <br>
    <p>Friend Book</p>
    <br>
</header>

<ul class = "navbar">
            <li><a href = "PHP.html"> Home </a></li>
</ul>

<div>
    <?php
    
    include('Forms.html');
    $filename = "friends.txt";
    $file = fopen( $filename, "r" );
    echo "<h1>My best friends:</h1>";
    echo "<ul>";
    if( $file != false ) {
        while (!feof($file)) {
            $name = fgets($file);
            if (strlen($name) > 0) {
                echo "<li>$name</li>";
            }

        }
        fclose( $file );
    }

    if(isset($_POST['name']) && strlen($_POST['name']) > 0) {
        $newName = $_POST['name'];
        $file = fopen( $filename, "a" );
        if( $file != false ) {
            echo "<li><b>$newName</b></li>";
            fwrite( $file, $newName ."\n");
            fclose( $file );
        }
    }
   
    echo "</ul>";
    

    ?>
</div>

<footer>
    <p>Footer</p>
</footer>


</body>
</html>