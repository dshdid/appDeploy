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
    <li><a href = "PHP.php?op=sum&x=3&y=4&name=Professor"> Calculator </a></li>
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

    if( $file != false ) {
        while (!feof($file)) {
            $friend = fgets($file);
            if (strlen($friend) > 0) {
                Array_push($names, $friend);
                //echo "<li>$friend</li>"; 
        }
    }
        fclose( $file );

    if(isset($_POST['name']) && strlen($_POST['name']) > 0) {
        $newName = $_POST['name'];
        $file = fopen( $filename, "a" );
        if( $file != false ) {
            //echo "<li><b>$newName</b></li>";
            fwrite( $file, $newName ."\n");
            fclose( $file );
            Array_push($names, $newName);
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
    
    $i = -1;

    echo "<ul>";

    foreach ($names as $key) {
        $i++;

        if(isset($filter) &&strlen($filter) > 0){
            if($checked == TRUE){
                $pos = strpos($key, $filter);
                if($pos !== FALSE && substr($key, 0, strlen($filter)) == $filter){
                    echo "<li><b>$key</b>  <button type='submit' name='delete' value='$i'>Delete</button> </li> <br>";
                }
            }
            else{
                if(strstr($key,$filter)){
                    echo "<li><b>$key</b>  <button type='submit' name='delete' value='$i'>Delete</button> </li> <br>";
                }       
            }
        } else {
            if($names[$i+1] == null){
                echo "<li><b>$key</b>  <button type='submit' name='delete' value='$i'>Delete</button> </li> <br>";
            }else
                echo "<li>$key  <button type='submit' name='delete' value='$i'>Delete</button> </li> <br>";
        }
    }
    echo "</ul>";

/********************** PART 3 ***************************/

    if (isset($_POST['delete'])) {
        $indexToBeRemoved = $_POST['delete'];
        unset($friendsArray[$indexToBeRemoved]);
        $names = array_values($names);
        $file_contents = file_get_contents($filename);
        $file = fopen($filename, "w");
        if( $file != false ) {
            $file_contents = str_replace($names[$indexToBeRemoved],'',$file_contents);
            fwrite($file, $file_contents);
            fclose($file);
        }
    }
    
    unset($checked);
    unset($key);
    unset($friend);
    reset($names);
}?>
</div>

<form action="index.php" method="post">
        Filter: <input type="text" name="nameFilter">
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