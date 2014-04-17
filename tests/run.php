<?php
/**
 * @author Salim Kapadia
 */
require_once("../Library/Tree.php");
require_once("../Library/Node.php");

//test
$directories = array(
        "/home/sports/basketball/ncaa/",
        "/home/music/rap/gangster"
);

$tree = new Library_Tree(new Library_Node("root","root"));

foreach ($directories as $directory){
    echo $directory . "\n";
    $tree->add($directory);
}

//print them ...