<?php

abstract class Creator {
    abstract public function factoryMethod();

    public function someOperation(){
        $product = $this->factoryMethod();
        return "Same Creator ".$product->operation();
    }
}

class ConcreteCreator1 extends Creator{

    public function factoryMethod(){
        return new ConcreteProduct1();
    }
    
}

class ConcreteCreator2 extends Creator{

    public function factoryMethod(){
        return new ConcreteProduct2();
    }
    
}

interface Product {
    public function operation();
}

class ConcreteProduct1 implements Product {
    public function operation(){
        return "Concrete product 1 operation";
    }
}

class ConcreteProduct2 implements Product {
    public function operation(){
        return "Concrete product 2 operation";
    }
}


function client_code(Creator $creator){
    echo $creator->someOperation();
}

client_code(new ConcreteCreator1);
client_code(new ConcreteCreator2);
