<?php 
    !isset($_GET["page"])  ?  include("register.php") : include($_GET["page"] . ".php")
?>