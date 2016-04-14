<?php

class Dice {
    protected $faces;
    protected  $freqs = array();
    protected  $bias;
    
    // Constructor
    public function __construct($faces, $bias = null) {
        $this->faces = $faces;
        if (!is_null($this->bias)) {
            for ($i=1;$i<= $faces-1;$i++) {
                $this->bias[$i] = (1-$bias)/($i-1);
            }
            $this->bias[] = $bias;
        }
    }

    public function cast() {
        $res = $this->getBiasedResult();
        $this->freqs[$res]++;
        return $res;
    }

    protected function getBiasedResult() {
        if (!is_null($this->bias)) {
            // Biased dice
            $roll = rand(0, 100)/100;
            $sum = 0;
            $result = 1;
            foreach ($this->bias as $val) {
                $sum += $val;
                if ($roll < $sum) {
                    return $result;
                }
                $result += 1;
            }
        }
        else {
            // "Fair" dice
            $result = rand(1,$this->faces);
        }
        return $result;
    }
    
    public function getFreq($eyes) {
        $freq = $this->freqs[$eyes];
        if ($freq=="")
            $freq = 0;
        return $freq;
    }

    public function getAvg() {
        $sum = 0;
        foreach ($this->freqs as $freq) {
            $sum += $freq;
        }
        return strval($sum/count($this->freqs));
    }
}

class PhysicalDice extends Dice {
    private $material = "plastic";

    /**
     * PhysicalDice constructor.
     * @param string $material
     *
     */
    public function __construct($material, $faces, $bias = null)
    {
        $this->material = $material;
        $this->faces = $faces;
        if (!is_null($this->bias)) {
            for ($i=1;$i<= $faces-1;$i++) {
                $this->bias[$i] = (1-$bias)/($i-1);
            }
            $this->bias[] = $bias;
        }
    }


}