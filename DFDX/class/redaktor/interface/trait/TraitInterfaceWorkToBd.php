<?php
namespace class\redaktor\interface\trait;

trait TraitInterfaceWorkToBd
{
    public function initBdHost()
    {
      return $this->host;
    }
    public function initBdLogin()
    {
      return $this->loginBD;
    }
    public function initBdParol()
    {
      return $this->parol;
    }
    public function initBdNameBD()
    {
      return $this->nameBD;
    }
    public function initsite()
    {
      return $this->site;
    } 
}
