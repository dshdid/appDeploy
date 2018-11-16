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

<ul class=sss>
    <li><a href = "PHP.php?op=sum&x=3&y=4&name=Professor"> Calculator </a></li>
</ul>

<form action="index.php" method="post">
    Add a Friend: <input type="text" name="name">
    <input type="submit" value = "Add Friend">

<div>
    <?php
    $filename = "friends.txt";
    $file = fopen( $filename, "r" );

    $names = array();
    echo "<h1>My best friends:</h1>";

    if( $file != false ) {
        while (!feof($file)) {
            $friend = fgets($file);
            if (strlen($friend) > 0) {
                Array_push($names, ucfirst($friend));
                //echo "<li>$friend</li>"; 
        }
    }
        fclose( $file );

    if(isset($_POST['name']) && strlen($_POST['name']) > 0) {
        $newName = $_POST['name'];
        $file = fopen( $filename, "a" );
        if( $file != false ) {
            //echo "<b><li><b>$newName</li></b>";
            fwrite( $file, $newName ."\n");
            fclose( $file );
            Array_push($names, ucfirst($newName));
        }
    }

/********************** PART 2 ***************************/

    if(isset($_POST['nameFilter'])){
        $filter = $_POST['nameFilter'];
    }

    $checked = false;
    if(isset($_POST['startingWith'])){
        $checked = $_POST['startingWith'];
    }
    
    /********************** PART 3 ***************************/
    
    if (isset($_POST['delete'])) {
        $indexToBeRemoved = $_POST['delete'];
        unset($names[$indexToBeRemoved]);
        $names = array_values($names);
        $file = fopen($filename, "w");
        if( $file != false ) {
            foreach ($names as $singleName) {
                fwrite($file, $singleName);
            }
            fclose($file);

        }
    }
    $i = -1;
 
    echo "<ul>";

    foreach ($names as $key) {
        $i++;

        if(isset($filter) &&strlen($filter) > 0){
            if($checked == TRUE){
                $pos = strpos(lcfirst($key), $filter);
                if($pos !== FALSE && substr(lcfirst($key), 0, strlen($filter)) == $filter){
                    echo "<li><b>$key</b>  <button type='submit' name='delete' value='$i'>Delete</button> </li> <br>";
                }
            }
            else{
                if(strstr(lcfirst($key),$filter)){
                    echo "<li><b>$key</b>  <button type='submit' name='delete' value='$i'>Delete</button> </li> <br>";
                }       
            }
        } else {
            if ($i==sizeof($names)-1) {
                echo "<li><b>$key</b>  <button type='submit' name='delete' value='$i'>Delete</button> </li> <br>";
            }else
                echo "<li>$key  <button type='submit' name='delete' value='$i'>Delete</button> </li> <br>";
        }
    }
    echo "</ul>";


    
    unset($checked);
    unset($key);
    unset($friend);
    reset($names);
}?>
</div>
</form>

<form action="index.php" method="post">
        Filter: <input type="text" name="nameFilter">
        <input type="checkbox" name="startingWith" value="TRUE">
        Only names starting with
        <input type="submit" value="Filter List"> 
</form>

<footer>
    <p>Created for educational purposes</p>
</footer>

<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>


</body>
</html>