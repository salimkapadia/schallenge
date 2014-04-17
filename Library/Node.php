<?php
/**
 * @author Salim Kapadia
 */

class Library_Node{
    public $dName; /* @var <string> */
    public $currentDPath;  /* @var <string> */
    public $collectionOfChildNodes;  /* @var Array<Library_Node> */
    public $collectionOfLeafNodes; /* @var Array<Library_Node> */

    /**
     * Constructor to this object.
     */
    public function __construct($directoryName = null, $dPath){
        $this->collectionOfChildNodes = array();
        $this->collectionOfLeafNodes = array();
        $this->dName = $directoryName;
        $this->currentDPath = $dPath;
    }
    public function getDName(){
        return $this->dName;
    }
    /**
     * @description - This is the physical path represenation of the node on the filesystem.
     * @return string
     */
    public function getCurrentDirectoryPath(){
        return $this->currentDPath;
    }

    /**
     * @param array $path - this contains the path that has been exploded into individual elements.
     * @param $currentDirectoryName - Where is this being added too ?
     */
    public function addDirectoryElement(array $path, $currentDirectoryName){

        //since most paths start with the directory separator, the first element could be empty.
        if( $path[0] == ""){
            array_shift($path); //remove the first element from the collection.
        }

        // Use the passed in value for the currentDirectory and append the first item on the list.
        $currentDirectoryName = $currentDirectoryName . DIRECTORY_SEPARATOR . $path[0];

        //create the Node
        $addChildNode = new Library_Node($path[0], $currentDirectoryName );

        //determine if its a leaf
        if (count($path) == 1){
            array_push($this->collectionOfLeafNodes,$addChildNode);
            return true;
        }else{
            //not a leaf node so must be a child node.
            //search through all the child nodes until you find the node where this child node belongs
            $indexPosition = -1;
            for($i=0; $i< count($this->collectionOfChildNodes); $i++){
                if($this->collectionOfChildNodes[$i]->getCurrentDirectoryPath() == $addChildNode->getCurrentDirectoryPath() &&
                    $this->collectionOfChildNodes[$i]->getDName() == $addChildNode->getDName()
                ){
                    $indexPosition = $i; // We found the child node of where the new child node needs to be added.
                    break;
                }
            }
            if ($indexPosition == -1){ //we could not locate a parent for this child node so add it to the top level.
                array_push($this->collectionOfChildNodes,$addChildNode);

                //now add any additional directories below this as either child nodes or leaf nodes.
                $addChildNode->addDirectoryElement(array(array_shift($path)),$addChildNode->getCurrentDirectoryPath());
            }else{
                //we located its parent directory so we need to add it to that.
                $this->collectionOfChildNodes[$indexPosition]->addDirectoryElement(array(array_shift($path)),$addChildNode->getCurrentDirectoryPath());
            }
        }
    }
    public function __toString(){
        return $this->dName;
    }

    public function showPreOrderTraversal(){
        //@TODO: Please implement.
        echo "Pending ...";
    }

    public function showNodeDetails(){
        echo $this->getCurrentDirectoryPath() . "\n";
        foreach ($this->collectionOfChildNodes as $childNode){
            $childNode->showNodeDetails();
        }
        foreach ($this->collectionOfLeafNodes as $leafdNode){
            $leafdNode->showNodeDetails();
        }
    }
}