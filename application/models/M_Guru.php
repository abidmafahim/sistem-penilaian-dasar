<?php

/**
 * 
 */
class M_Guru extends CI_Model
{
	

	public function GetIdGuru2($nip3)
	{
		$this->db->select('id_guru');
		$this->db->from('guru');
		$this->db->where('nip', $nip3);
		$query = $this->db->get();
		return $query->result();
	}

	public function GetName($nip_nama)
	{
		$this->db->select('*');
		$this->db->from('pengajar');
		$this->db->join('guru','pengajar.id_guru = guru.id_guru');
		$this->db->where('pengajar.id_guru', $nip_nama);
		return $this->db->get()->row();
	}

	public function GetUserName($username)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('username', $username);
	}
	public function GetKelas($nip1)
	{
		$this->db->select('*');
		$this->db->from('pengajar');
		$this->db->join('kelas','pengajar.id_kelas = kelas.id_kelas');
		$this->db->where('id_guru', $nip1);
		$this->db->group_by('pengajar.id_kelas');
		return $this->db->get();
	}

	public function GetKelas2($idkls2)
	{
		$this->db->select('*');
		$this->db->from('kelas');
		$this->db->where('id_kelas', $idkls2);
	}

	public function GetIdGuru($nip)
	{
		$this->db->select('id_guru');
		$this->db->from('guru');
		$this->db->where('nip', $nip);
		return $this->db->get();
	}

	

	public function GetIdKelas($nip2)
	{
		$this->db->select('id_kelas');
		$this->db->from('pengajar');
		$this->db->where('id_guru', $nip2);
		$query = $this->db->get();
		return $query->row();
	}

	public function GetKelasMapel($get_ids)
	{
		$this->db->select('*');
		$this->db->from('pengajar');
		$this->db->join('kelas','pengajar.id_kelas = kelas.id_kelas');
		$this->db->join('mapel','pengajar.kd_mapel = mapel.kd_mapel');
		$this->db->where($get_ids);
		$query = $this->db->get();
		return $query;
	}

	public function GetNilaiSiswa($datasiswa)
	{
		$this->db->select('*');
		$this->db->from('nilai');
		$this->db->join('siswa','nilai.id_siswa = siswa.id_siswa');
		$this->db->join('pengajar','nilai.id_pengajar = pengajar.id_pengajar');
		$this->db->join('kelas','pengajar.id_kelas = kelas.id_kelas');
		$this->db->join('mapel','pengajar.kd_mapel = mapel.kd_mapel');
		$this->db->where($datasiswa);
		return $this->db->get();
	}

	public function GetNamaSiswa($kls)
	{
		$this->db->select('*');
		$this->db->from('siswa');
		$this->db->where('id_kelas', $kls);
		return $this->db->get();
	}

	public function GetIdPengajar($whereid)
	{
		$this->db->select('*');
		$this->db->from('pengajar');
		$this->db->where($whereid);
		return $this->db->get()->row_array();
	}

	public function InsNilaiSiswa($datanilai,$whereid,$nilai_uts,$nilai_uas,$nilai_harian,$id_siswa,$idpengajar)
	{
		$this->db->query("update nilai set uts = '$nilai_uts', uas = '$nilai_uas', nilai_harian = '$nilai_harian' where id_siswa = '$id_siswa' and id_pengajar = '$idpengajar'");
	}

	public function GetSiswaKelas($kls)
	{
		$this->db->select('id_siswa');
		$this->db->where('id_kelas', $kls);
		$query = $this->db->get('siswa');
		return $query;
	}

	public function GetSiswaToNilai($kls,$kdmapel,$idguru)
	{
		$this->db->query("INSERT nilai (id_siswa,id_pengajar) 
			SELECT siswa.id_siswa,pengajar.id_pengajar 
			FROM siswa 
			JOIN pengajar ON siswa.id_kelas = pengajar.id_kelas 
			WHERE pengajar.id_kelas = '$kls' 
			AND siswa.id_kelas = '$kls' 
			AND pengajar.kd_mapel = '$kdmapel' 
			AND pengajar.id_guru = '$idguru' ");
	}

	public function GetPengajar($idguru)
	{
		$this->db->select('*');
		$this->db->from('pengajar');
		$this->db->where('id_guru', $idguru);
		return $this->db->get();
	}

	

	public function GetSiswaBelumTuntas($id_pengajar,$idguru)
	{
		$this->db->select('*');
		$this->db->from('nilai');
		$this->db->join('pengajar', 'nilai.id_pengajar = pengajar.id_pengajar');
		$this->db->where('id_guru', $idguru);
		$this->db->where('((nilai_harian * 60) / 100) + ((uts * 20) / 100) + ((uas * 20) / 100)' < 70);
		return $this->db->get();
	}
}
?>