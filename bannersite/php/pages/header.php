<?php
    $pages = [
        'Home',
        'Goods',
        'Search',
        'Categories',
        'Contact',
    ];
?>
<body>
<div id="outerDiv">
    <div id="header">
        <div id="mainMenu">
            <ul>
                <?php
                foreach ($pages as $value)
                {
                    $active = $this->addCurrentClass($value);
                    echo "<li><a href='index.php?page=$value' $active>$value</a></li>";
                }
                ?>
            </ul>
        </div> <!-- mainMenu -->
    </div> <!-- header -->
