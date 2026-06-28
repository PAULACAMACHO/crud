<?php
    $active = basename($_SERVER['PHP_SELF']);  
?>

<nav class="navbar">
    <div class="dropdown" style="--i:0;">
        <a class="<?php echo ($active == "home")?"active":"";?>" href="../../users/home">Home</a>
    </div>
    <div class="dropdown" style="--i:1;">
        <a class="<?php echo ($active == "linux")?"active":"";?>" href="../../linux">Linux</a>
    </div>
    <div class="dropdown" style="--i:2;">
        <a class="<?php echo ($active == "windows")?"active":"";?>" href="../../users/windows/windows">Windows</a>
    </div>
    <div class="dropdown" style="--i:3;">
        <a class="<?php echo ($active == "php")?"active":"";?>" href="../../users/php/php">PHP</a>
    </div>
    <div class="dropdown" style="--i:4;">
        <a class="<?php echo ($active == "mysql")?"active":"";?>" href="../../mysql">MySql</a>
    </div>
    <div class="dropdown" style="--i:5;">
        <a class="<?php echo ($active == "django")?"active":"";?>" href="../../django">Django</a>
    </div>
    <div class="dropdown" style="--i:6;">
        <a class="<?php echo ($active == "redes")?"active":"";?>" href="../../redes">Redes</a>
    </div>
    <div class="dropdown" style="--i:7;">
        <a class="<?php echo ($active == "outros")?"active":"";?>" href="../../outros">Outros</a>
    </div>
    <div class="dropdown" style="--i:8;">
        <a class="<?php echo ($active == "upload")?"active":"";?>" href="../../users/upload">Upload</a>
    </div>
    <div class="dropdown" style="--i:9;">
        <a class="<?php echo ($active == "insert")?"active":"";?>" href="../../users/insert">Insert</a>
    </div>
    <div class="dropdown" style="--i:10;">
        <a class="<?php echo ($active == "search")?"active":"";?>" href="../../users/search">Search</a>
    </div>
    <div class="dropdown" style="--i:11;">
        <a class="<?php echo ($active == "logout")?"active":"";?>" href="../../logout">Logout</a>
    </div>
</nav>