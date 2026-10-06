<?php

class Dish {
    private $id;
    private $name;
    private $ingredients;
    private $price;

    public function __construct($id, $name, $ingredients, $price) {
        $this->id = $id;
        $this->name = $name;
        $this->ingredients = $ingredients;
        $this->price = $price;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getIngredients() {
        return $this->ingredients;
    }

    public function getPrice() {
        return $this->price;
    }
}