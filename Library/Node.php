<?php
/**
 * @description - Standard node object of a tree data structure. 
 * 
 * @author Salim Kapadia
 */

Class Library_Node{
        private $obj;
        private $left;
        private $right;

        /**
         * Constructor to this object.
         * @param Object $obj 
         */
        public function __construct($obj=null){
                if(!($obj == null)){
                        $this->obj = $obj;
                }
                $this->left = $this->right = null;
        }
        /**
         * This function stores the incoming object and returns $this allowing
         * for method channing. 
         * @param Object $obj
         * @return \Library_Node 
         */
        public function setObject($obj){
                $this->obj = $obj;
                return $this;
        }
        /**
         * This function returns whatever object that is stored.
         * @return Object 
         */
        public function getObject(){
                return $this->obj;
        }        
        /**
         * This function set's the left pointer to the new Node.
         * @param Library_Node $n
         * @return \Library_Node 
         */
        public function setLeft(Library_Node $n=null){
                $this->left = $n;
                return $this;
        }
        /**
         * This function returns the left Node.
         * @return Library_Node 
         */        
        public function getLeft(){
                return $this->left;
        }
        /**
         * This function set's the rightious pointer to the new Node.
         * @param Library_Node $p
         * @return \Library_Node 
         */
        public function setRight(Library_Node $p=null){
                $this->right = $p;
                return $this;
        }
        /**
         * This function returns the rightious Node.
         * @return Library_Node 
         */        
        public function getRight(){
                return $this->right;
        }
        /**
         * 
         * This function returns the contents of the object.
         * @return <string>
         */
        public function __toString(){
                echo "obj:$this->obj;left:$this->left;right:$this->right";
        }
}
