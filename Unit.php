<?php
abstract class Unit implements UnitInterface
{
    private $health;
    private $armour;
    private $damage;

    public function __construct(int $health, int $armour, int $damage)
    {
        $this->health = $health;
        $this->armour = $armour;
        $this->damage = $damage;
    }

    public function getHealth(): int
    {
        return $this->health;
    }

    public function getArmour(): int
    {
        return $this->armour;
    }

    public function getDamage(): int
    {
        return $this->damage;
    }

    public function setArmour(int $armour)
    {
        $this->armour = $armour;
    }

    public function setDamage(int $damage)
    {
        $this->damage = $damage;
    }

}

class Pehota extends Unit
{

}

class Luchniki extends Unit
{
    
}

class Konnica extends Unit
{
    
}
