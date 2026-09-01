<?php
abstract class AbstractDocument
{
    protected function __construct( private \DateTime $dateDepot,private ?int $id=null)
    {

    }
        public function __call($name, $value){
        if(str_starts_with($name,'get')){
            $method=lcfirst(substr($name,3));
            return $this -> $method;
        }
        if(str_starts_with($name,'set')){
            $method=lcfirst(substr($name,3));
            $this -> $method = $value[0];
        }

    }
}