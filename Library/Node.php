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
        public function __construct($directoryName = null){
            $this->collectionOfChildNodes = array();
            $this->collectionOfLeafNodes = array();
            $this->dName = $directoryName;
        }

        /**
         * @param array $path - this contains the path that has been exploded into individual elements.
         */
        public function addDirectoryElement(array $path){
            if( $path[0] == ""){
                array_shift($path); //remove the first element from the collection.
            }

            //create the Node
            $addChildNode = new Library_Node($path[0]);

            //determine if its a leaf
            if (count($path) == 1){
                array_push($this->collectionOfLeafNodes,$addChildNode);
            }else{
                //not a leaf node so must be a child node.
                //search through all the child nodes until you find the node where this child node belongs
                $indexPosition = -1;
                for($i=0; $i<count($this->collectionOfChildNodes); $i++){
                    if($this->collectionOfChildNodes[$i]->dName == $addChildNode->dName){
                        $indexPosition = $i; // We found the child node of where the new child node needs to be added.
                        break;
                    }
                }
                if ($indexPosition == -1){ //we could not locate a parent for this child node so add it to the top level.
                    array_push($this->collectionOfChildNodes,$addChildNode);

                    //now add any additional directories below this as either child nodes or leaf nodes.
                    $addChildNode->addDirectoryElement($path);
                }else{
                    //we located its parent directory so we need to add it to that.
                    $this->collectionOfChildNodes[$indexPosition]->addDirectoryElement($path);
                }
            }
        }
}