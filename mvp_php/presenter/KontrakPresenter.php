<?php

include_once("model/Template.class.php");
include_once("model/DB.class.php");
include_once("model/Mahasiswa.class.php");
include_once("model/TabelMahasiswa.class.php");

/******************************************
 Asisten Pemrogaman 13 & 14
******************************************/

// Interface atau gambaran dari presenter akan seperti apa
interface KontrakPresenter
{
	public function prosesDataMahasiswa();
	public function getMahasiswaById($id);
	public function updateData($data);
	public function addData($data);
	public function deleteData($id);
	public function getId($i);
	public function getNim($i);
	public function getNama($i);
	public function getTempat($i);
	public function getTl($i);
	public function getGender($i);
	public function getEmail($i);
	public function getTelp($i);
	public function getSize();
}