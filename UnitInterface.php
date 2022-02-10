<?php

interface UnitInterface
{

    public function __construct(int $health, int $armour, int $damage);

    public function getHealth(): int;

    public function getArmour(): int;

    public function getDamage(): int;

}
