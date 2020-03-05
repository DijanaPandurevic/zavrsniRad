<?php
class MojprofilController extends AutorizacijaController
{
    public function index(){
        $this->view->render('privatno'. DIRECTORY_SEPARATOR . 'mojprofil');
    }
} 