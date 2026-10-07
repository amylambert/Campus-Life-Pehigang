<?php
abstract class AbstractController
{
    protected function render(string $template, array $data) : void
    {
        extract($data);
        
        require "View/layout.phtml";
    }

    protected function redirect(string $route) : void
    {
        header("Location: $route");
    }
}