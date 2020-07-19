<?php
/**
 * 
 */
class M_Admin extends CI_Model
{
	
	public function GetGuru()
	{
		return $this->db->get('guru');
	}

	public function InsGuru($table,$AddData)
	{
		$this->db->insert($table,$AddData);
		return $this->db->get('guru');
	}

	public function DelGuru($id)
	{
		$this->db->where('id_guru',$id);
		$this->db->delete('guru');
	}

	public function GetEdGuru($id)
	{
		$this->db->where('id_guru',$id);
		return $this->db->get('guru');
	}

	public function EdGuru($id_guru, $EditData)
	{
		$this->db->where('id_guru', $id_guru);
		$this->db->update('guru',$EditData);
	}



	// Mata Pelajaran



	public function GetMapel()
	{
		return $this->db->get('mapel');
	}

	public function InsMapel($AddMapel)
	{
		$this->db->insert('Mapel', $AddMapel);
		return $this->db->get('mapel');
	}

	public function GetEdMapel($id)
	{
		$this->db->where('kd_mapel',$id);
		return $this->db->get('mapel');
	}

	public function EdMapel($id_mapel, $EditMapel)
	{
		$this->db->where('kd_mapel', $id_mapel);
		$this->db->update('mapel',$EditMapel);
	}

	public function DelMapel($id_mapel)
	{
		$this->db->where('kd_mapel', $id_mapel);
		$this->db->delete('mapel');
	}


	// Pengajar


	public function GetPengajar()
	{
		$this->db->select('*');
		$this->db->from('pengajar');
		$this->db->join('guru','pengajar.id_guru = guru.id_guru');
		$this->db->join('mapel','pengajar.kd_mapel = mapel.kd_mapel');
		$this->db->join('kelas','pengajar.id_kelas = kelas.id_kelas');
		return $this->db->get();
	}

	public function GetValPengajar()
	{
		$this->db->select('*');
		$this->db->from('guru,kelas,mapel');
		return $this->db->get();
	}

	public function GetIdGuru($nip)
	{
		$this->db->select('id_guru');
		$this->db->from('guru');
		$this->db->where('nip', $nip);
		$query = $this->db->get();
		return $query->row()->id_guru;
	}

	public function InsPengajar($InsPengajar)
	{
		$this->db->insert('pengajar', $InsPengajar);
		return $this->db->get('pengajar');
	}

	public function GetEdPengajar($id)
	{
		$this->db->select('*');
		$this->db->from('pengajar');
		$this->db->join('guru','pengajar.id_guru = guru.id_guru');
		$this->db->join('mapel','pengajar.kd_mapel = mapel.kd_mapel');
		$this->db->join('kelas','pengajar.id_kelas = kelas.id_kelas');
		$this->db->where('id_pengajar',$id);
		return $this->db->get();
	}

	public function EdPengajar($id_pengajar,$editpengajar)
	{
		$this->db->where('id_pengajar', $id_pengajar);
		$this->db->update('pengajar',$editpengajar);
	}

	public function DelPengajar($id)
	{
		$this->db->where('id_pengajar', $id);
		$this->db->delete('pengajar');
	}


	//Kelas

	public function GetKelas()
	{
		return $this->db->get('kelas');
	}

	// Siswa

	public function GetSiswa()
	{
		$this->db->select('*');
		$this->db->from('siswa');
		$this->db->join('kelas','siswa.id_kelas = kelas.id_kelas');
		return $this->db->get();
	}

	public function InsSiswa($inssiswa)
	{
		$this->db->insert('siswa', $inssiswa);
		return $this->db->get('siswa');
	}
	public function GetEdSiswa($id)
	{
		$this->db->select('*');
		$this->db->from('Siswa');
		$this->db->where('id_siswa', $id);
		return $this->db->get();
	}

	public function EdSiswa($id,$edsiswa)
	{
		$this->db->where('id_siswa', $id);
		$this->db->update('siswa',$edsiswa);
	}
}
?>