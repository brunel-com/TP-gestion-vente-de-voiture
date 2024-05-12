<?php

class Car
{
  private $prix;
  private $marque;
  private $modele;
  private $couleur;

  public function checkIsSold() {
    return true;
  }

  public function checkIsNew() {
    return false;
  }

  public function getOwner() {
    return false;
  }
}