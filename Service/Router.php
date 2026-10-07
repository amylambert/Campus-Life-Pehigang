<?php
class Router
{
    public function handleRequest(array $get) : void
    {
        $ctrl = new PageController;

        if(isset($get['route']))
        {
            if($get['route'] === "home")
            {
                $ctrl->selector();
            }
            else
            {
                $ctrl->notFound();
            }
        }
        else
        {
            $ctrl->selector();
        }
    }
}