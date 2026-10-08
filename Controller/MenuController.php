<?php

class MenuController extends AbstractController
{
    public function selector() : void
    {
        $dishManager = new DishManager();
        $dishes = $dishManager->getAllDishes();
        $this->render('selector', ['dishes' => $dishes]);
    }
}