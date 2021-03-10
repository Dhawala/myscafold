<?php
namespace abstract_factory;

interface AbstractFactory {
    public function create_product_A();
    public function create_product_B();
}

class ConcreteFactory1 implements AbstractFactory{
    public function create_product_A()
    {
        return new ConcreteProductA1();
    }
    public function create_product_B()
    {
        return new ConcreteProductB1();
    }
}
class ConcreteFactory2 implements AbstractFactory{
    public function create_product_A()
    {
        return new ConcreteProductA2();
    }
    public function create_product_B()
    {
        return new ConcreteProductB2();
    }
}

interface ProductA{
    public function usefull_product_function();

    public function usefull_product_function2(ProductB $b);
}

class ConcreteProductA1 implements ProductA{
    
    public function usefull_product_function()
    {
        return "productA1";
    }
    public function usefull_product_function2(ProductB $b){

        return $b->usefull_product_function()." through A1";

    }
}

class ConcreteProductA2 implements ProductA{
    public function usefull_product_function()
    {
        return "productA2";
    }
    public function usefull_product_function2(ProductB $b)
    {
        return $b->usefull_product_function()." Through A2";
    }
}

interface ProductB{
    public function usefull_product_function();
}
class ConcreteProductB1 implements ProductB{
    public function usefull_product_function(){
        return "ProductB1";
    }
}
class ConcreteProductB2 implements ProductB{
    public function usefull_product_function(){
        return "ProductB2";
    }
}


function client_code(AbstractFactory $factory){
    $productA = $factory->create_product_A();    
    $productB = $factory->create_product_B();  
    
    echo $productA->usefull_product_function()."<br>";
    echo $productA->usefull_product_function2($productB)."<br>";
    echo $productB->usefull_product_function()."<br>";
}

client_code(new ConcreteFactory1);
client_code(new ConcreteFactory2);
