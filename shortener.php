<?php
session_start();
    if( !empty($_POST['my-link']) and isset($_SESSION['prevent_repeat']) ){
        $link = $_POST['my-link'];
        $id = substr( str_shuffle("ASDFGHJKLZXCVBNMQWERTYUIOP0123456789asdfghjklzxcvbnmqwertyuiop"), 0, 6 );
        $txt_path = "txt-db/"; // txt folder path, you can change it (if you changed it, open robots.txt file and change "txt-db" to your new folder name, robots.txt is file to protection your text database from search engine)
        if( file_exists($txt_path.$id.".txt") ){
            while($id) {
                $id = substr( str_shuffle("ASDFGHJKLZXCVBNMQWERTYUIOP0123456789asdfghjklzxcvbnmqwertyuiop"), 0, 6 ); // create random ID again (6 lenght)
                if( file_exists($txt_path.$id.".txt") ){continue;}else{break;}
            }
        }
        $create_txt_file = file_put_contents($txt_path.$id.".txt", $link);
        if( $create_txt_file ){
            $website = "https://www.nts.web.id/url-short-txt/";
            $short_link = $website.$id;
            echo 'Your Short Link: <a href="'.$short_link.'" target="_blank">'.$short_link.'</a>';
        }else{
            echo "We have some errors! Please try later.";
        }
        unset($_SESSION['prevent_repeat']);
    }
    else{
        header("location: index.php");
    }
?>
