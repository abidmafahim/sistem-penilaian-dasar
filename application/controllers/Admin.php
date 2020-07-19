<?php
/**
 * 
 */
class Admin extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_Admin');
	}

	function home()
	{
		$this->load->view('Admin/v_admin');
	}

	function ShowGuru()
	{
		$query = $this->db->get('guru');
		if ($query->num_rows() >= 1) {
			$this->load->view('Admin/v_showguru');
			return true;
		}
		else{
			echo "Data Kosong";
			return false;
		}
	}

	function AddGuru()
	{
		$this->load->view('Admin/v_addguru');
	}

	function InsertGuru()
	{
		$nip = $this->input->post('nip');
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$AddData = array(
			'nip' => $nip,
			'nama_guru' => $nama,
			'alamat_guru' => $alamat
		);
		$this->M_Admin->InsGuru('guru',$AddData);
		redirect('Admin/ShowGuru');
	}

	function DeleteGuru($id)
	{
		$this->M_Admin->DelGuru($id);
		redirect('Admin/ShowGuru');
	}

	function EditGuru($id)
	{
		$data['query'] = $this->M_Admin->GetEdGuru($id)->row_array();
		$this->load->view('Admin/v_editguru',$data);
	}

	function EdDatGuru($id)
	{
		$id_guru = $id;
		$nip = $this->input->post('nip');
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$EditData = array(
			'nip' => $nip,
			'nama_guru' => $nama,
			'alamat_guru' => $alamat
		);
		$this->M_Admin->EdGuru($id_guru,$EditData);
		redirect('Admin/ShowGuru');
	}



	// Bagian Mapel



	public function ShowMapel()
	{
		$query = $this->db->get('mapel');
		if ($query->num_rows() >= 1) {
			$this->load->view('Admin/v_showmapel');
			return true;
		}
		else{
			echo "Data Masih Kosong";
			return false;
		}
	}

	function AddMapel()
	{
		$this->load->view('Admin/v_addmapel');
	}

	function InsertMapel()
	{
		$kdmapel = $this->input->post('kdmapel');
		$nmmapel = $this->input->post('nmmapel');

		$this->db->where('kd_mapel',$kdmapel);
		$query = $this->db->get('mapel');
		if ($query->num_rows() < 1) {
			$AddMapel = array(
				'kd_mapel' => $kdmapel,
				'nama_mapel' => $nmmapel
			);
			$this->M_Admin->InsMapel($AddMapel);
			redirect('Admin/ShowMapel');
			return true;
		}
		else{
			$this->session->set_flashdata('exist','Data sudah ada');
			redirect('Admin/AddMapel');
		}

		$this->load->view('Admin/v_showmapel');
	}

	function EditMapel($id)
	{
		$data['query'] = $this->M_Admin->GetEdMapel($id)->row_array();
		$data['form_kd'] = array(
			'name' => 'kdmapel',
			'value' => $id,
			'readonly' => 'readonly'
		);
		$this->load->view('Admin/v_editmapel',$data);
	}

	function EdDatMapel($id)
	{
		$id_mapel = $id;
		$kdmapel = $this->uri->segment('3');
		$nmmapel = $this->input->post('nmmapel');
		$EditMapel = array(
			'kd_mapel' => $kdmapel,
			'nama_mapel' => $nmmapel
		);
		$this->M_Admin->EdMapel($id_mapel, $EditMapel);
		redirect('Admin/ShowMapel');
		
	}

	public function HapusMapel($id)
	{
		$id_mapel = $id;
		$this->M_Admin->DelMapel($id_mapel);
		redirect('Admin/ShowMapel');
	}



	// Mengajar



	public function ShowPengajar()
	{
		$query = $this->db->get('pengajar');
		if ($query->num_rows() >= 1) {
			$this->load->view('Admin/v_showpengajar');
			return true;
		}
		else{
			echo "Data Masih Kosong";
			return false;
		}
	}

	public function AddPengajar()
	{
		$this->load->view('Admin/v_addpengajar');
	}


	public function InsertPengajar()
	{
		$nip = $this->input->post('nip');
		$mapel = $this->input->post('mapel');
		$kls = $this->input->post('kls');
		$querynip = $this->db->query("SELECT * FROM guru WHERE guru.nip = '$nip'");
		$querymapel = $this->db->query("SELECT * FROM mapel WHERE mapel.kd_mapel = '$mapel'");
		$querykls = $this->db->query("SELECT * FROM kelas WHERE kelas.id_kelas = '$kls'");

		$kd_guru = $this->M_Admin->GetIdGuru($nip);

		if ($querynip->row_array() > 0 && $querymapel->row_array() > 0 && $querykls->row_array() > 0) {
			$InsPengajar = array(
				'id_guru' => $kd_guru,
				'kd_mapel' => $mapel,
				'id_kelas' => $kls
			);
			$this->M_Admin->InsPengajar($InsPengajar);
			redirect('Admin/ShowPengajar'); 
		}
		else{
			echo "Pilih data sesuai yang ada di pilihan";
		}
	}

	public function EditPengajar($id)
	{
		$data['query'] = $this->M_Admin->GetEdPengajar($id)->row_array();
		$this->load->view('Admin/v_editpengajar', $data);
	}

	public function EdDatPengajar($id)
	{
		$id_pengajar = $id;
		$nip = $this->input->post('nip');
		$kd_guru = $this->db->query("SELECT id_guru FROM guru WHERE nip = '$nip'");
		$mapel = $this->input->post('mapel');
		$kls = $this->input->post('kls');

		$editpengajar = array(
			'id_guru' => $kd_guru,
			'kd_mapel' => $mapel,
			'id_kelas' => $kls
		);

		$this->M_Admin->EdPengajar($id_pengajar,$editpengajar);
		redirect('Admin/ShowPengajar');
	}

	public function HapusPengajar($id)
	{
		$this->M_Admin->DelPengajar($id);
		redirect('Admin/ShowPengajar');
	}


	// Siswa


	public function ShowSiswa()
	{
		$this->load->view('Admin/v_showsiswa');	
	}

	public function AddSiswa()
	{
		$this->load->view('Admin/v_addsiswa');
	}

	public function InsertSiswa()
	{
		$nis = $this->input->post('nis');
		$nama_siswa = $this->input->post('nama_siswa');
		$kelas = $this->input->post('kelas');
		$inssiswa = array(
			'nis' => $nis,
			'nama_siswa' => $nama_siswa,
			'id_kelas' => $kelas
		);
		$this->M_Admin->InsSiswa($inssiswa);
		redirect('Admin/ShowSiswa');
	}

	public function EditSiswa($id)
	{
		$query['data'] = $this->M_Admin->GetEdSiswa($id)->row_array();
		$this->load->view('Admin/v_editsiswa', $query);
	}

	public function EdDatSiswa($id)
	{
		$nis = $this->input->post('nis');
		$nama_siswa = $this->input->post('nama_siswa');
		$kelas = $this->input->post('kelas');
		$edsiswa = array(
			'nis' => $nis,
			'nama_siswa' => $nama_siswa,
			'id_kelas' => $kelas
		);
		$this->M_Admin->EdSiswa($id,$edsiswa);
		redirect('Admin/ShowSiswa');
	}
}
?>