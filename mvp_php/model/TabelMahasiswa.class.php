<?php

/******************************************
 Asisten Pemrogaman 13 & 14
******************************************/

// Kelas yang berisikan tabel dari mahasiswa
class TabelMahasiswa extends DB
{
	function getMahasiswa()
	{
		// Query mysql select data mahasiswa
		$query = "SELECT * FROM mahasiswa";
		
		// Mengeksekusi query
		return $this->execute($query);
	}
	public function updateMahasiswa($id, $nama, $tempat, $tl, $gender, $email, $telp) 
	{   
		$query = "UPDATE mahasiswa SET nama=?, tempat=?, tl=?, gender=?, email=?, telp=? WHERE id=?";
		$stmt = mysqli_prepare($this->db_link, $query);
		mysqli_stmt_bind_param($stmt, "ssssssi", $nama, $tempat, $tl, $gender, $email, $telp, $id);
		$result = mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
		return $result;
	}
	
	public function getMahasiswaById($id)
	{
		$query = "SELECT * FROM mahasiswa WHERE id = '$id'";
		$this->execute($query);
		$data = [];

		while ($row = $this->getResult()) {
			$data[] = $row;
		}

		return $data;
	}

	public function addMahasiswa($nim, $nama, $tempat, $tl, $gender, $email, $telp) 
	{
		$query = "INSERT INTO mahasiswa (nim, nama, tempat, tl, gender, email, telp) VALUES (?, ?, ?, ?, ?, ?, ?)";
		$stmt = mysqli_prepare($this->db_link, $query);
		mysqli_stmt_bind_param($stmt, "sssssss", $nim, $nama, $tempat, $tl, $gender, $email, $telp);
		$result = mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
		return $result;
	}

	public function deleteMahasiswa($id) 
	{
		$query = "DELETE FROM mahasiswa WHERE id=?";
		$stmt = mysqli_prepare($this->db_link, $query);
		mysqli_stmt_bind_param($stmt, "i", $id);
		$result = mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
		return $result;
	}

}
