<?php

    class Order
{
    public $id;
    public $customerName;
//    J'initialise mon status de base en "cart"
    public $status = "cart";
    public $totalPrice;
//    j'initialise la variable products
    public $products = [];
// je créée une fonction addProduct qui ajoute un produit
//cette fonction ajoute un produit à mon tableau de produit
//elle ajoute aussi le prix du produit au prix total
//elle ne se réalise que si la commande est en cours



//Je créai une méthode __construct et lui passe en paramètre la variable $customerName, $status,$totalPrice
//quand l'instance de class est créée alors le __constuct s'applique
    public function __construct($customerName, $status, $totalPrice) {
            $this->customerName = $customerName;
            $this->status = $status;
            $this->totalPrice = $totalPrice;
            $this->id = uniqId();
    }


    public function addProduct()
    {
        if ($this->status === "cart") {
            $this->products[] = "pringles";
            $this->totalPrice += 3;
        }
    }

//pour payer je vérifie si la condition de mon status
    public function pay()
    {
        if ($this->status === "cart") {
            $this->status = "payed";
        }
    }
        // je vérifie que ma commande n'a pas été payé ou validé
        //je vérifie que le panier n'est pas vide
        //si ces conditions sont remplies je retire le dernier item ajouté avec la "fonction native array_pop()"
    public function removeProduct(){
        if ($this->status === "cart" && count($this->products)!==0) {
            array_pop($this->products);
        } else if (count($this->products)===0){
            echo ("votre panier est vide");
        }
    }
}

            //je fais ma premiere commande :
    $order1 = new Order("Richard");
    //Je créai une instance de class avec new et lui passe en
    // paramètre customerName pour l'identification unique désigné et agir sur l'objet

            //j'ajoute mon produit :
    $order1->addProduct();
    $order1->addProduct();
    $order1->addProduct();
    var_dump($order1);

    $order1->addProduct();
    $order1->removeProduct();
    var_dump($order1);

    $order2 = new Order("pay");
    $order2->addProduct();
    $order2->pay();
    var_dump($order2);

    $order3 = new Order(2);
    $order3->addProduct();
    $order3->removeProduct();
    var_dump($order3);