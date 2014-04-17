<?php
/**
 * @author Salim Kapadia
 */
require_once('Node.php');

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
        //remove trailing and leading directory separator
        $path = rtrim($path,DIRECTORY_SEPARATOR);
        $path = ltrim($path,DIRECTORY_SEPARATOR);

        $paths = explode(DIRECTORY_SEPARATOR, $path);

        $this->root->addDirectoryElement($paths, $this->root->getCurrentDirectoryPath());
    }

}