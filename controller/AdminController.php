<?php

class AdminController extends AutorizacijaController
{
    public function __constuct()
    {
        parent::__construct();
        if($_SESSION['operate']->uloga!=='admin'){
            $ic = new IndexController();
            $ic->odjava();
            exit;
        }
    }
}