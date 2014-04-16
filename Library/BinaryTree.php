<?php
/**
 * @author Salim Kapadia
 */

class Library_BinaryTree{
        public $dName;
        public $bTreeLeft;  /* @var Library_Tree_BinaryTree */
        public $bTreeRight; /* @var Library_Tree_BinaryTree */

        /**
         * Constructor to this object.
         */
        public function __construct($directoryName = null){
            $this->dName = $directoryName;
            $this->bTreeLeft=null;
            $this->bTreeRight=null;
        }

        public function hasLeft(){
            return $this->bTreeLeft !== null;
        }

        public function hasRight(){
            return $this->bTreeRight !== null;
        }

        public function getLeft(){
            return $this->bTreeLeft;
        }

        public function setLeft(Library_BinaryTree $node){
            $this->bTreeLeft = $node;
            return $this;
        }

        public function getRight(){
            return $this->bTreeRight;
        }

        public function setRight(Library_BinaryTree $node){
            $this->bTreeRight = $node;
            return $this;
        }

        public function getDirectoryName(){
            return $this->dName;
        }

        public function insert(Library_BinaryTree $node, $parentName, $directoryName){
            if ($node->getLeft() === null){
                $node->setLeft(new Library_BinaryTree($directoryName));
            }
            else if ($this->bTreeRight === null){
                $node->setRight(new Library_BinaryTree($directoryName));
            }else{
                if($node->getLeft()->getDirectoryName() == $parentName){
                    $this->insert($node->getLeft(), $parentName, $directoryName);
                }else{
                    $this->insert($node->getRight(), $parentName, $directoryName);
                }
            }
        }
}
?>
                          

