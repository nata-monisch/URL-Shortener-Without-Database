<?php
    if( isset($_GET['id']) ){
        $id = $_GET['id'];
        if( file_exists("txt-db/$id.txt") ){ // check if the ID is has txt file in "txt-db" folder
            $get_long_link = file_get_contents("txt-db/$id.txt");
            header("location: $get_long_link");
        }else{
            header("location: index.php");
        }
    }
    else{
        header("location: index.php");
    }
?>
