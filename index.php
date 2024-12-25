<?php
    session_start();
    $_SESSION['prevent_repeat'] = rand();
?>
<form method="post" action="shortener.php">
    <p>Enter a long link: <input type="text" name="my-link" value=""></p>
    <p><input type="submit" value="Shorten!"></p>
</form>
