<?php
/**
 * @author Salim Kapadia
 */
require_once("../Library/BinaryTree.php");

function part1($path){

    if ($path == ""){
        return "";
    }

    //remove leading and trailing slashes
    $path = ltrim($path, DIRECTORY_SEPARATOR);
    $path = rtrim($path, DIRECTORY_SEPARATOR);

    $directories = explode(DIRECTORY_SEPARATOR,$path); //use system directory seperator.

    if (count($directories) == 1){
        return new Library_BinaryTree($path);
    }else{
        $pareDirectory = array_shift($directories); //pop the first element out of the array and shrink the array by 1
        $head = new Library_BinaryTree($pareDirectory); //that is your root element.
        $previousParentDirectoryName = $head->getDirectoryName();

        foreach($directories as $directory){
           $head->insert($head,$previousParentDirectoryName,$directory);
           $previousParentDirectoryName = $directory;
        }

    }
}

function part2($path){

    if ($path == ""){
        return "";
    }

    //remove leading and trailing slashes
    $path = ltrim($path, DIRECTORY_SEPARATOR);
    $path = rtrim($path, DIRECTORY_SEPARATOR);

    $directories = explode(DIRECTORY_SEPARATOR,$path); //use system directory seperator.

    if (count($directories) == 1){
        return new Library_BinaryTree($path);
    }else{
        $pareDirectory = array_shift($directories); //pop the first element out of the array and shrink the array by 1
        $head = new Library_BinaryTree($pareDirectory); //that is your root element.
        $previousParentDirectoryName = $head->getDirectoryName();

        foreach($directories as $directory){
            $dualDirectories = explode("|", $directory);
            if(count($dualDirectories) == 2){
                $head->insert($head,$previousParentDirectoryName,$dualDirectories[0]);
                $head->insert($head,$previousParentDirectoryName,$dualDirectories[1]);
            }else{
                $head->insert($head,$previousParentDirectoryName,$directory);
            }
            $previousParentDirectoryName = $directory;
        }
    }
}

part1("/home/sports/basketball/ncaa/");
part2("/home/sports/football/NFL|NCAA");
