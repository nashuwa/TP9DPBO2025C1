<?php

/******************************************
 Asisten Pemrogaman 13 & 14
******************************************/

include_once("KontrakView.php");
include_once("presenter/ProsesMahasiswa.php");

class DeleteMahasiswa implements KontrakView
{
    private $prosesmahasiswa;

    function __construct()
    {
        //konstruktor
        $this->prosesmahasiswa = new ProsesMahasiswa();
    }

    function tampil()
    {   
        $id = $_GET['id'];
        $result = $this->prosesmahasiswa->deleteData($id);
        
        if ($result) {
            header("Location: index.php");
            exit();
        } else {
            echo "Error: Failed to delete student record!";
            echo "<br><a href='index.php'>Back to List</a>";
        }
    }
}