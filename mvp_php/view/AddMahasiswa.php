<?php

/******************************************
 Asisten Pemrogaman 13 & 14
******************************************/

include_once("KontrakView.php");
include_once("presenter/ProsesMahasiswa.php");

class AddMahasiswa implements KontrakView
{
    private $prosesmahasiswa;
    private $tpl;

    function __construct()
    {
        //konstruktor
        $this->prosesmahasiswa = new ProsesMahasiswa();
    }

    function tampil()
    {
    try
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            $this->prosesmahasiswa->addData($_POST);
            header("Location: index.php");
        } else
        {
            $this->tpl = new Template("templates/form_add.html");
            $this->tpl->write();
        }
    } 
    catch (Exception $e)
    {
        echo "Terjadi kesalahan: " . htmlspecialchars($e->getMessage());
    }
}
}