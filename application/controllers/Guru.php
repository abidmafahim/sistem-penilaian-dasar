<?php
/**
 * 
 */
class Guru extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_Guru');
		$this->load->helper('url');
		$this->load->library('session');
		if (!$this->session->userdata('username') && !$this->session->userdata('level')) {
			redirect('Login');
		}
	}

	public function Home()
	{
		$nip = $this->session->userdata('username');
		$data['nip1'] = $this->M_Guru->GetIdGuru($nip)->row_array();
		$idguru = $data['nip1'];
		$data['idpengajar'] = $this->M_Guru->GetPengajar($idguru['id_guru'])->row_array();
		$this->load->view('Guru/v_guru', $data);
	}

	public function ShowKelasMapel($id)
	{
		$nip = $this->session->userdata('username');
		$data['nip1'] = $this->M_Guru->GetIdGuru($nip)->row_array();
		$idguru = $this->M_Guru->GetIdGuru($nip)->row_array();
		$data['get_ids'] = array(
				'pengajar.id_kelas' => $id,
				'pengajar.id_guru' => $idguru['id_guru']
		);
		$data['idmapel'] = $this->M_Guru->GetKelasMapel($data['get_ids']);
		$this->load->view('Guru/v_showmapelkelas', $data);
	}

	public function ShowNilaiSiswa($kls,$kdmapel)
	{
		$data['kls'] = $kls;
		$data['kdmapel'] = $kdmapel;
		$nip = $this->session->userdata('username');
		$data['nip1'] = $this->M_Guru->GetIdGuru($nip)->row_array();
		$idguru = $this->M_Guru->GetIdGuru($nip)->row_array();
		$whereid = array(
			'id_guru' => $idguru['id_guru'],
			'kd_mapel' => $kdmapel,
			'id_kelas' => $kls
		);
		$data['idpengajar'] = $this->M_Guru->GetIdPengajar($whereid);
		$datasiswa = array(
			'pengajar.id_kelas' => $kls,
			'pengajar.kd_mapel' => $kdmapel,
			'siswa.id_kelas' => $kls
		);
		$data['siswakelas'] = $this->M_Guru->GetNilaiSiswa($datasiswa);
		$this->load->view('Guru/v_shownilaisiswa', $data);
	}

	public function InsertNilaiSiswa($idpengajar,$kls,$kdmapel,$nip1)
	{
		$id_siswa = $this->input->post('nmsiswa');
		$nilai_harian = $this->input->post('nilai_harian');
		$nilai_uts = $this->input->post('nilai_uts');
		$nilai_uas = $this->input->post('nilai_uas');
		$this->M_Guru->InsNilaiSiswa($nilai_uts,$nilai_uas,$nilai_harian,$id_siswa,$idpengajar);
		redirect('Guru/ShowNilaiSiswa/'.$kls.'/'.$kdmapel);
	}

	public function SiswaToNilai($kls,$kdmapel,$nip1)
	{
		// $sis = $this->M_Guru->GetSiswaKelas($kls);
		// $select = $this->db->select('id_siswa')->get('siswa');
		// if ($select->num_rows()) {
		// 	$siswa = $select->result_array();
		// 	$this->db->insert('nilai', $siswa);
		// }

		$this->M_Guru->GetSiswaToNilai($kls,$kdmapel,$nip1);
		redirect('Guru/ShowNilaiSiswa/'.$kls.'/'.$kdmapel);
	}

	// Pindahin data seluruh siswa berdasarkan kelas dari tabel siswa ke nilai
}
?>	