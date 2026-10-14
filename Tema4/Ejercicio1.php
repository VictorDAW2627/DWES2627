<?php

if (isset($_COOKIE["user"])){
    echo $_COOKIE["user"];
}else {
    setcookie("user", "Victor", time()+3600);
}

?>