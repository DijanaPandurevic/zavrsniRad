<?php

class IndexController extends Controller
{

    public function prijava()
    {
        $this->view->render('prijava',[
            'poruka'=>'Unesite pristupne podatke',
            'email'=>''
        ]);
    }

    public function autorizacija()
    {
        if(!isset($_POST['email']) || 
        !isset($_POST['lozinka'])){
            $this->view->render('prijava',[
                'poruka'=>'Nisu postavljeni pristupni podaci',
                'email' =>''
            ]);
            return;
        }

        if(trim($_POST['email'])==='' || 
        trim($_POST['lozinka'])===''){
            $this->view->render('prijava',[
                'poruka'=>'Pristupni podaci obavezno',
                'email'=>$_POST['email']
            ]);
            return;
        }
        $veza=DB::getInstanca();

        $izraz = $veza->prepare('select * from korisnik where email = :email;');

        $izraz->execute(['email'=>$_POST['email']]);

        $rezultat=$izraz->fetch();

        if($rezultat==null){
            $this->view->render('prijava',[
                'poruka'=>'Ne postojeći korisnik',
                'email'=>$_POST['email']
            ]);
            return;
        }

        if(!password_verify($_POST['lozinka'],$rezultat->lozinka)){
            $this->view->render('prijava',[
                'poruka'=>'Neispravna kombinacija email i lozinka',
                'email'=>$_POST['email']
            ]);
            return;
        }
        unset($rezultat->lozinka);
        $_SESSION['operater']=$rezultat;
        //$this->view->render('privatno' . DIRECTORY_SEPARATOR . 'nadzornaPloca');
        $npc= new NadzornaplocaController();
        $npc->index();
    }

    public function index()
    {
        $poruka='Dobrodošli na Moje kiflice';
        $kod=5;


        $this->view->render('mojekiflice',[
            'p'=>$poruka,
            'k'=>$kod]
        );


    }
    public function okiflicama()
    {
        $this->view->render('okiflicama');
    }

    public function odjava()
    {
        unset($_SESSION['operater']);
        session_destroy();
        $this->index();
    }

    public function json()
    {
        $niz=[];
        $s=new stdClass();
        $s->naziv='Slane kiflice';
        $s->sifra=1;
        $niz[]=$s;
        //$this->view->render('okiflicama',$niz);
        echo json_encode($niz);
    }
    
    public function test()
    {
     echo password_hash('',PASSWORD_BCRYPT);
      // echo md5('mojaMala'); NE KORISTITI
    } 
    
} 