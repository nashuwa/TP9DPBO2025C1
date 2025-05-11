<?php

/******************************************
 Asisten Pemrogaman 13 & 14
******************************************/

include_once("KontrakView.php");
include_once("presenter/ProsesMahasiswa.php");

class UpdateMahasiswa implements KontrakView
{
    private $prosesmahasiswa;
    private $tpl;

    function __construct()
    {
        $this->prosesmahasiswa = new ProsesMahasiswa();
    }

    function tampil()
    {   
        if ($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            $this->prosesmahasiswa->updateData($_POST);
            header("Location: index.php");
            exit();
        } 
        else
        {
            $id = $_GET['id'];
            $this->prosesmahasiswa->prosesDataMahasiswa();
            $mahasiswa = $this->prosesmahasiswa->getMahasiswaById($id);

            $this->tpl = new Template("templates/form_update.html");
            
            $this->tpl->replace("ID", $mahasiswa->getId());
            $this->tpl->replace("NIM", $mahasiswa->getNim());
            $this->tpl->replace("NAMA", $mahasiswa->getNama());
            $this->tpl->replace("TEMPAT", $mahasiswa->getTempat());
            $this->tpl->replace("TL", $mahasiswa->getTl());
            $this->tpl->replace("GENDER", $mahasiswa->getGender());
            $this->tpl->replace("EMAIL", $mahasiswa->getEmail());
            $this->tpl->replace("TELP", $mahasiswa->getTelp());

            $this->tpl->write();
        }
    }
}