<?php

class Battle
{    
    private array $armies = [];    
    private int $duration = 0;

    public function __construct(Army $army1,Army $army2)
    {
      $this->armies[] = $army1;
      $this->armies[] = $army2;
    }    

    public function fightSum()    
    {   
        $army1 = $this->armies[0]->getSumHealthArmourDamage();
        $army2 = $this->armies[1]->getSumHealthArmourDamage();
        $health1 = $army1['health'];
        $health2 = $army2['health'];
        $damage1 = $army1['damage'];
        $damage2 = $army2['damage'];

        while ($health1 >= 0 && $health2 >= 0) {
        $health1 -= $damage2;
        $health2 -= $damage1;
        $this->duration++;
        }
        return ['health1' => $health1, 'health2' => $health2, 'duration' => $this->duration];
    }

    public function fightEveryLine()    
    {   
        $army1 = $this->armies[0]->getEveryHealthArmourDamage();
        $army2 = $this->armies[1]->getEveryHealthArmourDamage();
        $health1 = 0;
        $health2 = 0;
       
        foreach($army1 as $name=>$unit){
         while ($army1[$name]['health'] >= 0 && $army2[$name]['health'] >= 0) {
            $army1[$name]['health'] -= $army2[$name]['damage'];
            $army2[$name]['health'] -= $army1[$name]['damage'];
            $this->duration++;
            }
        }

        foreach($army1 as $name=>$unit){
            
            $health1 += $army1[$name]['health'];
            $health2 += $army2[$name]['health'];

        }
        return ['health1' => $health1, 'health2' => $health2, 'duration'=>$this->duration];
        }

        private function __addIceEveryArmy($army){
            foreach($army->getUnits() as $unit){
                if(get_class($unit) == 'Konnica')   {
                    $unit->setArmour(0);
                }                             
            }
        }

        public function addIce()
        {
            self::__addIceEveryArmy($this->armies[0]);
            self::__addIceEveryArmy($this->armies[1]);
        }
        
        private function __addRainEveryArmy($army){
            foreach($army->getUnits() as $unit){
                if(get_class($unit) == 'Luchniki')   {
                    $unit->setDamage($unit->getDamage() / 2);
                }                             
            }
        }
        
        public function addIRain()
        {
            self::__addRainEveryArmy($this->armies[0]);
            self::__addRainEveryArmy($this->armies[1]);            
        }

}
