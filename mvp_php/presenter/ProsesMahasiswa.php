<?php

include_once("KontrakPresenter.php");

/******************************************
 Asisten Pemrogaman 13 & 14
******************************************/

class ProsesMahasiswa implements KontrakPresenter
{
	private $tabelmahasiswa;
	private $data = [];

	function __construct()
	{
		// Konstruktor
		try
		{
			$db_host = "localhost"; // host 
			$db_user = "root"; // user
			$db_password = ""; // password
			$db_name = "mvp_php"; // nama basis data
			$this->tabelmahasiswa = new TabelMahasiswa($db_host, $db_user, $db_password, $db_name); // instansi TabelMahasiswa
			$this->data = array(); // instansi list untuk data Mahasiswa
		} 
		catch (Exception $e) 
		{
			echo "yah error" . $e->getMessage();
		}
	}

	function prosesDataMahasiswa()
	{
		try
		{
			// mengambil data di tabel Mahasiswa
			$this->tabelmahasiswa->open();
			$this->tabelmahasiswa->getMahasiswa();

			while ($row = $this->tabelmahasiswa->getResult())
			{
				// ambil hasil query
				$mahasiswa = new Mahasiswa(); // instansiasi objek mahasiswa untuk setiap data mahasiswa
				$mahasiswa->setId($row['id']); // mengisi id
				$mahasiswa->setNim($row['nim']); // mengisi nim
				$mahasiswa->setNama($row['nama']); // mengisi nama
				$mahasiswa->setTempat($row['tempat']); // mengisi tempat
				$mahasiswa->setTl($row['tl']); // mengisi tl
				$mahasiswa->setGender($row['gender']); // mengisi gender
				$mahasiswa->setEmail($row['email']); // mengisi email
				$mahasiswa->setTelp($row['telp']); // mengisi telp

				$this->data[] = $mahasiswa; // tambahkan data mahasiswa ke dalam list
			}
			// Tutup koneksi
			$this->tabelmahasiswa->close();
		} 
		catch (Exception $e)
		{
			// memproses error
			echo "yah error part 2" . $e->getMessage();
		}
	}
	public function getMahasiswaById($id)
	{
		$this->tabelmahasiswa->open();
		$result = $this->tabelmahasiswa->getMahasiswaById($id);
		$this->tabelmahasiswa->close();

		if (count($result) > 0)
		{
			$row = $result[0];
			$mahasiswa = new Mahasiswa();
			$mahasiswa->setId($row['id']);
			$mahasiswa->setNim($row['nim']);
			$mahasiswa->setNama($row['nama']);
			$mahasiswa->setTempat($row['tempat']);
			$mahasiswa->setTl($row['tl']);
			$mahasiswa->setGender($row['gender']);
			$mahasiswa->setEmail($row['email']);
			$mahasiswa->setTelp($row['telp']);
			return $mahasiswa;
		} 
		else
		{
			return null;
		}
	}

	public function updateData($data)
	{	
		$this->tabelmahasiswa->open();
		$this->tabelmahasiswa->updateMahasiswa(
			$data['id'],
			$data['nama'],
			$data['tempat'],
			$data['tl'],
			$data['gender'],
			$data['email'],
			$data['telp']
		);
		$this->tabelmahasiswa->close();
	}

	public function addData($data) 
	{
		$this->tabelmahasiswa->open();
		$result = $this->tabelmahasiswa->addMahasiswa(
			$data['nim'],
			$data['nama'],
			$data['tempat'],
			$data['tl'],
			$data['gender'],
			$data['email'],
			$data['telp']
		);
		$this->tabelmahasiswa->close();
		return $result;
	}

	public function deleteData($id)
	{
		$this->tabelmahasiswa->open();
		$result = $this->tabelmahasiswa->deleteMahasiswa($id);
		$this->tabelmahasiswa->close();
		return $result;
	}

	function getId($i)
	{
		// mengembalikan id mahasiswa dengan indeks ke i
		return $this->data[$i]->id;
	}
	function getNim($i)
	{
		// mengembalikan nim mahasiswa dengan indeks ke i
		return $this->data[$i]->nim;
	}
	function getNama($i)
	{
		// mengembalikan nama mahasiswa dengan indeks ke i
		return $this->data[$i]->nama;
	}
	function getTempat($i)
	{
		// mengembalikan tempat mahasiswa dengan indeks ke i
		return $this->data[$i]->tempat;
	}
	function getTl($i)
	{
		// mengembalikan tanggal lahir(TL) mahasiswa dengan indeks ke i
		return $this->data[$i]->tl;
	}
	function getGender($i)
	{
		// mengembalikan gender mahasiswa dengan indeks ke i
		return $this->data[$i]->gender;
	}
	function getEmail($i)
	{
		// mengembalikan email mahasiswa dengan indeks ke i
		return $this->data[$i]->email;
	}
	function getTelp($i)
	{
		// mengembalikan telp mahasiswa dengan indeks ke i
		return $this->data[$i]->telp;
	}
	function getSize()
	{
		return sizeof($this->data);
	}
}
