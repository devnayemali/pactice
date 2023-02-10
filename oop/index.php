<?php


class calculator{

    public $a, $b, $c;

    public function sum(){
        $this->c = $this->a + $this->b;
        return $this->c;
    }
    public function sub(){
        $this->c = $this->a - $this->b;
        return $this->c;
    }

}

$c1 = new calculator();
$c1->a = 20;
$c1->b =40;

echo "Totol Number" . $c1->sub();
echo "Total Number" . $c1->sum();


