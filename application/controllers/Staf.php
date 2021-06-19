<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staf extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
	}

	public function index()
	{
		$data['title'] = 'Dashboard Kaderisasi';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('kaderisasi/index', $data);
	}

	public function dataRQ()
	{
		$data['title'] = 'Data RQ';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->db->select('*');
		$this->db->from('reg_regencies');
		$this->db->join('rumah_quran', 'rumah_quran.regency_id = reg_regencies.id');
		$this->db->order_by('rumah_quran.id');
		$data['rq'] = $this->db->get()->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('staf/data-rq', $data);
		$this->load->view('templates/footer');
	}

	public function tambahRQ()
	{
		$data['title'] = 'Data RQ';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['kabupaten'] = $this->db->get_where('reg_regencies', ['province_id' => 32])->result_array();

		$this->form_validation->set_rules('nama_rq', 'Nama RQ', 'required|trim');
		$this->form_validation->set_rules('mudir_rq', 'Mudir RQ', 'required|trim');
		
		if ( $this->form_validation->run() == false ) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('staf/tambah-rq', $data);
			$this->load->view('templates/footer');
		} else {

			$data = [
				'nama_rq' => $this->input->post('nama_rq'),
				'mudir_rq' => $this->input->post('mudir_rq'),
				'regency_id' => $this->input->post('kabupaten')
			];

			$this->db->insert('rumah_quran	', $data);
			$this->session->set_flashdata('message', '<div class="alert col-sm-6 alert-success" role="alert"> Data berhasi ditambahkan.</div>');
			redirect("staf/datarq");
		}
	}

	public function editRQ($id)
	{
		$data['title'] = 'Data RQ';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->db->select('*');
		$this->db->from('reg_regencies');
		$this->db->join('rumah_quran', 'rumah_quran.regency_id = reg_regencies.id');
		$this->db->where('rumah_quran.id', $id);
		$data['rq'] = $this->db->get()->row_array();
		$data['kabupaten'] = $this->db->get_where('reg_regencies', ['province_id' => 32])->result_array();

		$this->form_validation->set_rules('nama_rq', 'Nama RQ', 'required|trim');
		$this->form_validation->set_rules('mudir_rq', 'Mudir RQ', 'required|trim');
		
		if ( $this->form_validation->run() == false ) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('staf/edit-rq', $data);
			$this->load->view('templates/footer');
		} else {
			
			$data = [
				'nama_rq' => $this->input->post('nama_rq'),
				'mudir_rq' => $this->input->post('mudir_rq'),
				'regency_id' => $this->input->post('kabupaten')
			];

			$this->db->where('id', $id);
			$this->db->update('rumah_quran', $data);
			$this->session->set_flashdata('message', '<div class="alert col-sm-6 alert-success" role="alert"> Data berhasil diperbaharui.</div>');
			redirect("staf/datarq");
		}
	}

	public function hapusRQ($id)
	{
		
		$this->db->delete('rumah_quran', ['id' => $id]);
		$this->db->delete('kelas', ['rq_id' => $id]);
		$this->session->set_flashdata('message', '<div class="alert col-sm-6 alert-danger" role="alert"> Data berhasil dihapus!</div>');
		redirect('staf/datarq');
	}

	public function program()
	{
		$data['title'] = 'Program Belajar';

		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->db->order_by('kode_program');
		$data['program'] = $this->db->get('program')->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('staf/program', $data);
		$this->load->view('templates/footer');
	}

	public function tambahProgram()
	{
		$data['title'] = 'Program Belajar';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('kode_program', 'Kode Program', 'required|trim');
		$this->form_validation->set_rules('nama_program', 'Nama Program', 'required|trim');
		
		if ( $this->form_validation->run() == false ) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('staf/tambah-program', $data);
			$this->load->view('templates/footer');
		} else {

			$data = [
				'kode_program' => $this->input->post('kode_program'),
				'nama_program' => $this->input->post('nama_program')
			];

			$this->db->insert('program', $data);
			$this->session->set_flashdata('message', '<div class="alert col-sm-6 alert-success" role="alert"> Data berhasi ditambahkan.</div>');
			redirect("staf/program");
		}
	}

	public function editProgram($id)
	{
		$data['title'] = 'Program Belajar';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['program'] = $this->db->get_where('program', ['prog_id' => $id])->row_array();

		$this->form_validation->set_rules('kode_program', 'Kode Program', 'required|trim');
		$this->form_validation->set_rules('nama_program', 'Nama Program', 'required|trim');
		
		if ( $this->form_validation->run() == false ) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('staf/edit-program', $data);
			$this->load->view('templates/footer');
		} else {
			
			$data = [
				'kode_program' => $this->input->post('kode_program'),
				'nama_program' => $this->input->post('nama_program')
			];

			$this->db->where('prog_id', $id);
			$this->db->update('program', $data);
			$this->session->set_flashdata('message', '<div class="alert col-sm-6 alert-success" role="alert"> Data berhasil diperbaharui.</div>');
			redirect("staf/program");
		}
	}

	public function hapusProgram($id)
	{
		
		$this->db->delete('program', ['prog_id' => $id]);
		$this->db->delete('kelas', ['prog_id' => $id]);
		$this->session->set_flashdata('message', '<div class="alert col-sm-6 alert-danger" role="alert"> Data berhasil dihapus!</div>');
		redirect('staf/program');
	}

	public function kelas()
	{
		$data['title'] = 'Kelas';

		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['program'] = $this->db->get('program')->result_array();

		$this->db->select('*');
		$this->db->from('rumah_quran');
		$this->db->join('kelas', 'kelas.rq_id = rumah_quran.id');
		$this->db->join('program', 'program.prog_id = kelas.prog_id');
		$this->db->order_by('kelas.jenis_kelamin', 'DESC');
		$this->db->order_by('kelas.prog_id', 'ASC');
		$data['kelas'] = $this->db->get()->result_array();

		$this->form_validation->set_rules('prog_id', 'Kode Program', 'required|trim');
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|trim');

		if ($this->form_validation->run() == false) {	
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('staf/kelas', $data);
			$this->load->view('templates/footer');
		} else {
			$program = $this->input->post('prog_id');
			$jenis_kelamin = $this->input->post('jenis_kelamin');
			$this->db->select('*');
			$this->db->from('rumah_quran');
			$this->db->join('kelas', 'kelas.rq_id = rumah_quran.id');
			$this->db->join('program', 'program.prog_id = kelas.prog_id');
			$this->db->where('kelas.prog_id', $program);
			$this->db->where('kelas.jenis_kelamin', $jenis_kelamin);
			$this->db->order_by('kelas.pengajar');
			$data['kelas'] = $this->db->get()->result_array();

			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('staf/kelas', $data);
			$this->load->view('templates/footer');
		}
	}

	public function tambahUPA()
	{
		$data['title'] = 'Data UPA';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['spu'] = $this->db->get('spu')->result_array();
		$data['level'] = $this->db->get('level')->result_array();

		$this->form_validation->set_rules('level_id', 'Nama Program', 'required|trim');
		$this->form_validation->set_rules('spu_id', 'Nama SPU', 'required|trim');
		$this->form_validation->set_rules('nama_upa', 'Nama Grup', 'required|trim');
		$this->form_validation->set_rules('nama_ketua', 'Ketua UPA', 'required|trim');
		$this->form_validation->set_rules('jenis_kelamin', 'Kelompok', 'required|trim');
		
		if ( $this->form_validation->run() == false ) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('kaderisasi/tambah-upa', $data);
			$this->load->view('templates/footer');
		} else {
			$data = [
				'level_id' => $this->input->post('level_id'),
				'spu_id' => $this->input->post('spu_id'),
				'nama_upa' => $this->input->post('nama_upa'),
				'nama_ketua' => $this->input->post('nama_ketua'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin')
			];

			$this->db->insert('upa', $data);
			$this->session->set_flashdata('message', '<div class="alert col-sm-6 alert-success" role="alert"> Data berhasi ditambahkan.</div>');
			redirect("kaderisasi/upa");
		}
	}

	public function editUPA($id)
	{
		$data['title'] = 'Data UPA';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['spu'] = $this->db->get('spu')->result_array();
		$data['level'] = $this->db->get('level')->result_array();

		$this->db->select('*');
		$this->db->from('spu');
		$this->db->join('upa', 'upa.spu_id = spu.id');
		$this->db->join('level', 'level.id = upa.level_id');
		$this->db->where('upa.upa_id', $id);
		$data['upa'] = $this->db->get()->row_array();

		$this->form_validation->set_rules('level_id', 'Nama Program', 'required|trim');
		$this->form_validation->set_rules('spu_id', 'Nama SPU', 'required|trim');
		$this->form_validation->set_rules('nama_upa', 'Nama Grup', 'required|trim');
		$this->form_validation->set_rules('nama_ketua', 'Ketua UPA', 'required|trim');
		$this->form_validation->set_rules('jenis_kelamin', 'Kelompok', 'required|trim');
		
		if ( $this->form_validation->run() == false ) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('kaderisasi/edit-upa', $data);
			$this->load->view('templates/footer');
		} else {
			
			$data = [
				'level_id' => $this->input->post('level_id'),
				'spu_id' => $this->input->post('spu_id'),
				'nama_upa' => $this->input->post('nama_upa'),
				'nama_ketua' => $this->input->post('nama_ketua'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin')
			];

			$this->db->where('upa_id', $id);
			$this->db->update('upa', $data);
			$this->session->set_flashdata('message', '<div class="alert col-sm-6 alert-success" role="alert"> Data berhasil diperbaharui.</div>');
			redirect("kaderisasi/upa");
		}
	}

	public function hapusUPA($id)
	{
		$this->db->delete('upa', ['upa_id' => $id]);
		$this->session->set_flashdata('message', '<div class="alert col-sm-6 alert-danger" role="alert"> Data berhasil dihapus!</div>');
		redirect('kaderisasi/upa');
	}

	public function tampilSPU()
	{
		$data['title'] = 'Mutabaah Anggota';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->db->order_by('id');
		$data['spu'] = $this->db->get('spu')->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('kaderisasi/tampil-spu', $data);
		$this->load->view('templates/footer');
	}

	public function tampilUPA($id)
	{
		$data['title'] = 'Mutabaah Anggota';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->db->select('*');
		$this->db->from('spu');
		$this->db->join('upa', 'upa.spu_id = spu.id');
		$this->db->join('level', 'level.id = upa.level_id');
		$this->db->where('upa.spu_id', $id);
		$this->db->order_by('upa.level_id, upa.nama_ketua');
		$data['upa'] = $this->db->get()->result_array();

			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('kaderisasi/tampil-upa', $data);
			$this->load->view('templates/footer');
	}

	public function tampilAnggota($id)
	{
		$data['title'] = 'Mutabaah Anggota';

		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('range', 'Periode', 'required|trim');

		if( $this->form_validation->run() == false ) {
			$awal = strtotime('first day of '.date('M').' '.date('Y'))-10;
			$akhir = 86400+strtotime(date('Y-m-d'));
			$data['bulan'] = "Bulan " . nama_bulan(date('Y-m-d'));
			$data['awal'] = $awal;
			$data['akhir'] = $akhir;
		} else {
			$input = str_replace(" ", "", $this->input->post('range'));
			$array = explode("-", $input);
			$awal = strtotime($array[0])-10;
			$akhir = 86400+strtotime($array[1]);
			$data['bulan'] = tanggal_indo(date('Y-m-d', strtotime($array[0]))) . " s.d. " . tanggal_indo(date('Y-m-d', strtotime($array[1])));
			$data['awal'] = $awal;
			$data['akhir'] = $akhir;
		}

		$this->db->select('user.id, user.email, user.name');
		$this->db->select_sum('jumlah');
		$this->db->from('user');
		$this->db->join('mutabaah', 'mutabaah.email = user.email');
		$this->db->join('upa', 'upa.upa_id = mutabaah.upa_id');
		$this->db->where('upa.upa_id', $id);
		$this->db->where('mutabaah.tanggal >', $awal);
		$this->db->where('mutabaah.tanggal <', $akhir);
		$this->db->group_by('email');
		$data['mutabaah'] = $this->db->get()->result_array();

		$data['upa'] = $this->db->get_where('upa', ['upa_id' => $id])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('kaderisasi/tampil-anggota', $data);
		$this->load->view('templates/footer');

	}

	public function mutabaah($id)
	{
		$data['title'] = 'Mutabaah Anggota';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->db->select('*');
		$this->db->from('upa');
		$this->db->join('user', 'user.upa_id = upa.upa_id');
		$this->db->where('user.id', $id);
		$data['anggota'] = $this->db->get()->row_array();

		$data['mutabaah'] = $this->db->get_where('mutabaah', ['email' => $data['anggota']['email']])->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('kaderisasi/mutabaah', $data);
		$this->load->view('templates/footer');

	}

	public function detailmutabaah($id)
	{
		$data['title'] = 'Data Evaluasi';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['mutabaah'] = $this->db->get_where('mutabaah', ['mtb_id' => $id])->row_array();

		$this->db->select('*');
		$this->db->from('upa');
		$this->db->join('user', 'user.upa_id = upa.upa_id');
		$this->db->where('user.email', $data['mutabaah']['email']);
		$data['anggota'] = $this->db->get()->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('kaderisasi/detail-mutabaah', $data);
		$this->load->view('templates/footer');

	}

	public function hapusMutabaah($id)
	{
		$this->db->select('*');
		$this->db->from('mutabaah');
		$this->db->join('upa', 'upa.upa_id = mutabaah.upa_id');
		$this->db->where('mtb_id', $id);
		$upa = $this->db->get()->row_array();
		$no = $upa['upa_id'];

		$this->db->delete('mutabaah', ['mtb_id' => $id]);
		$this->session->set_flashdata('message', '<div class="alert col-sm-6 alert-danger" role="alert"> Data berhasil dihapus!</div>');
		redirect("kaderisasi/tampilanggota/$no");
	}

	public function users()
	{
		$data['title'] = 'Data Anggota';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->db->select('*, user.id AS user_id');
		$this->db->from('user');
		$this->db->join('upa', 'user.upa_id = upa.upa_id');
		$this->db->join('spu', 'upa.spu_id = spu.id');
		$this->db->join('level', 'upa.level_id = level.id');
		$this->db->order_by('upa.level_id', 'ASC');
		$this->db->order_by('user.name', 'ASC');
		$data['users'] = $this->db->get()->result_array();
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('kaderisasi/users', $data);
		$this->load->view('templates/footer');
		
	}

	public function manageuser($id)
	{
		$data['title'] = 'Data Anggota';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->db->select('*');
		$this->db->from('user');
		$this->db->join('upa', 'user.upa_id = upa.upa_id');
		$this->db->where('user.id', $id);
		$data['users'] = $this->db->get()->row_array();

		$this->db->order_by('nama_ketua', 'ASC');
		$data['upa'] = $this->db->get_where('upa', ['jenis_kelamin' => $data['users']['gender']])->result_array();

		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('role_id', 'Role', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('kaderisasi/manage-user', $data);
			$this->load->view('templates/footer');
		} else {
			$email = $this->input->post('email');
			$new_password = $this->input->post('new_password');
			$password_hash = password_hash($new_password, PASSWORD_DEFAULT);
			$data = [
				'name' => htmlspecialchars($this->input->post('name', true)),
				'role_id' => $this->input->post('role_id'),
				'password' => $password_hash,
				'is_active' => $this->input->post('is_active'),
				'date_modified' => time()
			];

			$this->db->where('email', $email);
			$this->db->update('user', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> User edited!</div>');
			redirect('admin/users');
		}

	}

	public function deleteuser($id)
	{
		
		$this->db->delete('user', ['id' => $id]);
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> User deleted!</div>');
		redirect('admin/users');
	}

	public function get_jeniskelamin()
	{
		$jk = $this->db->query("SELECT `user`.`gender` AS 'jenis_kelamin', COUNT(`user`.`gender`) AS 'jml_jk' FROM `user` GROUP BY `gender` ORDER BY `gender` DESC")->result_array();
		return json_encode($jk);
	}

}
