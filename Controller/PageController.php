<?php

class PageController extends AbstractController
{
    public function selector() : void
    {
        $dishManager = new DishManager();
        $dishes = $dishManager->getAllDishes();
        $this->render('selector', ['dishes' => $dishes]);
    }

    public function notFound() : void
    {
        $this->render('404', []);
    }
}