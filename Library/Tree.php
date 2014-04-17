<?php
/**
 * @author Salim Kapadia
 */

class Library_Tree{
    public $root; /* @var <Library_Node> */

    /**
     * Constructor to this object.
     */
    public function __construct(Library_Node $root = null){
        $this->root = $root;
    }

    /**
     * @description - This function takes a path and creates a hierarchical tree
     * @param $path <string> - The directory path to be added
     */
    public function add($path){
        $paths = explode(DIRECTORY_SEPARATOR, $path);

        $this->root->addDirectoryElement($paths, $this->root->getCurrentDirectoryPath());
    }

}

//test
$directories = array("/home/sports/basketball/ncaa/", "/home/music/rap/gangster");

$tree = new Library_Tree(new Library_Node("root","root"));

foreach ($directories as $directory){
    $tree->add($directory);
}

//print them ...