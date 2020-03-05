<?php

class KifliceController extends AutorizacijaController
{
    public function index(){
        $this->view->render('privatno' . DIRECTORY_SEPARATOR . 'kiflice');
    }
}

