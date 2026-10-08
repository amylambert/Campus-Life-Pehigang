<?php

class Router
{
    private MenuController $mc;
    private AuthController $ac;
    public function __construct()
    {
        $this->mc = new MenuController();
        $this->ac = new AuthController();
    }

    public function handleRequest() : void
    {
        if(!empty($_GET["route"]))
        {
            if($_GET['route'] === 'login') {
                $this->ac->login();
            }
            else if($_GET['route'] === 'register') {
                $this->ac->register();
            }
            else if($_GET['route'] === 'logout') {
                $this->ac->logout();
            }
            else if($_GET['route'] === 'home') {
                $this->ac->home();
            }
            else if ($_GET['route'] === 'selector') {
                $this->mc->selector();
            }
            else
            {
                $this->ac->notFound();
            }
        }
        else
        {
            $this->ac->home();
        }
    }
}