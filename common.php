<?php
    function redirect($loc) {
        header("Location: " . $loc);
        exit();
    }
?>
