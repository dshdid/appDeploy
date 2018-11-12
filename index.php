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

<ul>
    <li><a href = "PHP.php"> Calculator </a></li>
</ul>

<form action="index.php" method="post">
    Name: <input type="text" name="name">
    <input type="submit" value = "Add Friend">
</form>

<div>
    <?php
    $filename = "friends.txt";
    $file = fopen( $filename, "r" );
    $names = array();
    echo "<h1>My best friends:</h1>";
    echo "<ul>";
    if( $file != false ) {
        while (!feof($file)) {
            $friend = fgets($file);
            if (strlen($friend) > 0) {
                Array_push($names, $friend);
                echo "<li>$friend</li>"; 
        }

        }
        fclose( $file );

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
    foreach($names as $ss){
        echo "$ss";
    }
    

    ?>
</div>

<div>
    <?php
    $filename = "friends.txt";
    $file = fopen( $filename, "r" );
    $filter = $_POST['nameFilter'];
    $checked = $_POST['startingWith'];
    echo "<h1>Results: </h1>";
    echo "<ul>";
    foreach ($names as $key) {
        if(isset($filter)){
            if($checked == TRUE){
                $pos = strpos($key, $filter);
                if($pos !== FALSE && substr($key, 0, strlen($filter)) == $filter){
                    echo "<li><b>$key</b></li>";
                }
            }
            else{
                if(strstr($key,$filter)){
                    echo "<li><b>$key</b></li>";
                }       
            }
        }
    }
    

     /* if( $file != false ) {
        while (!feof($file)) {
            $name = fgets($file);
            if (isset($_POST['nameFilter'])) {
                $_POST.arraypush($names );
            }

        }
        fclose( $file );

        
    }  */

    echo "</ul>";
    unset($checked);
    unset($key);
    unset($friend);
    reset($names);
}?>
</div>

<form action="index.php" method="post">
        Filter: <input type="text" name="nameFilter"> <!--if i remove the value -> no error-->
        <input type="checkbox" name="startingWith" value="TRUE">
        Only names starting with
        <input type="submit" value="Filter List"> 
</form>

<footer>
    <p>Footer</p>
</footer>

<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>


</body>
</html>