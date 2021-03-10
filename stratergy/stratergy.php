<?php
/**
 * Context contains an instance of stratergy and common usage of stratergies 
 * that user will impliment in their code.
 *    
 **/
class Context
{
    public $stratergy;

    public function __construct(Stratergy $stratergy=null)
    {
        $this->stratergy = $stratergy;
    }

    public function set_stratergy(Stratergy $stratergy)
    {
        $this->stratergy = $stratergy;
    }

    public function do_the_thing(){

        return $this->stratergy->do_somethning(10,20);
    }
}

/* Implimentation of Stratergy interface */
interface Stratergy
{
    public function do_somethning($a,$b);
}

/* Concrete stratergies implimented Stratergy interface */
class Addition implements Stratergy
{
    public function do_somethning($a,$b)
    {
        return "Addition:".($a+$b);
    }
}
class Substraction implements Stratergy
{
    public function do_somethning($a,$b)
    {
        return "Substraction:".($a-$b);
    }
}
class Mulltiplication implements Stratergy
{
    public function do_somethning($q,$r)
    {
        return "Multiplication:".($q*$r);
    }
}

/* 
Usage of stratergy
Stratergy allows user to use diffrent stratergies through context class without directly interfearing with them. 
*/
$ctx = new Context();

$ctx->set_stratergy(new Addition);
echo $ctx->do_the_thing().'<br>';

$ctx->set_stratergy(new Substraction);
echo $ctx->do_the_thing().'<br>';

$ctx->set_stratergy(new Mulltiplication);
echo $ctx->do_the_thing().'<br>';

