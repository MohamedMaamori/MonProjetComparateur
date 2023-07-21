<?php
// Station.php

declare(strict_types=1);

class Station
{
  private int $IdStation;
  private string $NomStation;
  private string $AdresseStation;

  // Le constructeur

  // Méthode avec 3 paramètres initialisés qui ont des valeurs par défaut (et donc facultatif)
  public function __construct(int $IdStation = 0, string $NomStation = "", string $AdresseStation = "")
  {
    $this->IdStation = $IdStation;
    $this->NomStation = $NomStation;
    $this->AdresseStation = $AdresseStation;
  }
  // Autres méthodes
  public function setIdStation(int $IdStation): void
  {
    $this->IdStation = $IdStation;
  }
  public function getIdStation(): int
  {
    return $this->IdStation;
  }
  public function setNomStation(string $NomStation): void
  {
    $this->NomStation = $NomStation;
  }
  public function getNomStation(): string
  {
    return $this->NomStation;
  }
  public function setAdresseStation(string $AdresseStation): void
  {
    $this->AdresseStation = $AdresseStation;
  }
  public function getAdresseStation(): string
  {
    return $this->AdresseStation;
  }
}
