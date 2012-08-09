<?php
require_once 'entries.php';
class posthandler
{
  private $postObject;
  private $e;
  function __construct($p)
  {
    $this->postObject = (object) $p;    
    $this->e = new entries;
    if($this->postObject->method && (method_exists($this, $this->postObject->method)))
    {
      $evalStr = '$this->'.$this->postObject->method.'();';
      eval($evalStr);
    }
    else
    {
      echo 'Invalid method supplied';
    }
  }
  function saveMessage()
  { 
    $this->e->setName($this->postObject->myname);
    $this->e->setMessage($this->postObject->mymessage);
    echo $this->e->saveEntry();    
  }
}
new posthandler($_POST);
?>