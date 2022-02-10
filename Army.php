<?php


class Army 
{
    private string $name = '';
    private array $units = [];    

    public function __construct(string $name)
    {
      $this->name = $name;
    }

    public function getName(): string
    {       
        return $this->name;
    }

    public function getUnits()
    {
        return $this->units;
    }
    public function getUnitsString()
    {
        $str = '';
        foreach($this->units as $count=>$unit){
            $str .= get_class($unit) . ' (' . $count . ') ';
        }
        return $str;
    }

    
    public function addUnit(UnitInterface $unit, int $count): self
    {
        $this->units[$count] = $unit;

        return $this;
    }

    public function getSumHealthArmourDamage()
    {
        $damage = 0;
        $health = 0;
        foreach ($this->units as $count => $unit) {
            $damage += $unit->getDamage() * $count;
            $health += $unit->getHealth() * $count + $unit->getArmour() * $count;
        }        
        return ['damage' => $damage, 'health' => $health];
    }

    public function getEveryHealthArmourDamage()
    {
        $result = [];

        foreach ($this->units as $count => $unit) {
            $result[get_class($unit)] = 
            ['damage' => $unit->getDamage() * $count, 'health' => $unit->getHealth() * $count + $unit->getArmour() * $count];            
        }        
        return $result;
    }

}
