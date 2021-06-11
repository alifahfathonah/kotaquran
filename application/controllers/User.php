<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
	}
	
	public function index()
	{
		$data['title'] = 'Tampilan Utama';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->db->order_by('submenu_sequence');
		$data['menu'] = $this->db->get_where('user_sub_menu', ['menu_id' => 2, 'submenu_sequence >' => 1, 'is_active' => 1])->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('user/index', $data);
		$this->load->view('templates/footer');
	}

	public function profile()
	{
		$data['title'] = 'Profil Saya';

		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['detail'] = $this->db->get_where('user_detail', ['email' => $this->session->userdata('email')])->row_array();
		$data['prov'] = $this->db->get_where('reg_provinces', ['id' => $data['user']['province_id']])->row_array();
		$data['kab'] = $this->db->get_where('reg_regencies', ['id' => $data['user']['regency_id']])->row_array();
		$data['kec'] = $this->db->get_where('reg_districts', ['id' => $data['user']['district_id']])->row_array();
		$data['desa'] = $this->db->get_where('reg_villages', ['id' => $data['user']['village_id']])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('user/profile', $data);
		$this->load->view('templates/footer');
	}

	public function edit()
	{
		$data['title'] = 'Ubah Profil';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['detail'] = $this->db->get_where('user_detail', ['email' => $this->session->userdata('email')])->row_array();
		$data['wilayah'] = $this->db->get('reg_provinces')->result_array();

		$data['prov'] = $this->db->get_where('reg_provinces', ['id' => $data['user']['province_id']])->row_array();
		$data['kab'] = $this->db->get_where('reg_regencies', ['id' => $data['user']['regency_id']])->row_array();
		$data['kec'] = $this->db->get_where('reg_districts', ['id' => $data['user']['district_id']])->row_array();
		$data['desa'] = $this->db->get_where('reg_villages', ['id' => $data['user']['village_id']])->row_array();

		$this->form_validation->set_rules('name', 'Full Name', 'required|trim');

		if($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('user/edit', $data);
			$this->load->view('templates/footer');
		} else {
			$email = $this->input->post('email');
			$name = $this->input->post('name');
			$gender = $this->input->post('gender');
			$alamat = $this->input->post('alamat');
			$village_id = $this->input->post('desa');
			$district_id = $this->input->post('kecamatan');
			$regency_id = $this->input->post('kabupaten');
			$province_id = $this->input->post('provinsi');
			$date_modified = time();
			// data2
			$nickname = $this->input->post('nickname');
			$nik = $this->input->post('nik');
			$tempat_lahir = strtoupper($this->input->post('tempat_lahir'));
			$tgl_lahir = strtotime($this->input->post('tgl_lahir'));
			$hobi = strtoupper($this->input->post('hobi'));
			$suku = strtoupper($this->input->post('suku'));
			$sifat_menonjol = strtoupper($this->input->post('sifat_menonjol'));
			$visi = $this->input->post('visi');
			$kendaraan = strtoupper($this->input->post('kendaraan'));
			$pekerjaan = strtoupper($this->input->post('pekerjaan'));
			$tempat_kerja = $this->input->post('tempat_kerja');
			$alamat_kerja = $this->input->post('alamat_kerja');
			$penghasilan = $this->input->post('penghasilan');

			// cek jika ada gambar (file) yang akan diupload
			$upload_image = $_FILES['image']['name'];

			if ($upload_image) {
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']      = '2048';
				$config['upload_path']   = './assets/img/profile/';
				$config['file_name'] = $data['user']['id'];

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('image')) {
					// cek dulu gambar lamanya apakah default
					$old_image = $data['user']['image'];
					if ( $old_image != 'default.jpg') {
						// jika bukan, maka hapus saja agar tidak terjadi penumpukan file
						unlink(FCPATH . 'assets/img/profile/' . $old_image);
					}

					$new_image = $this->upload->data('file_name');
				} else {
					$new_image = $data['user']['image'];
					$info_image = " Namun gambar gagal diperbaharui. Ukuran file terlalu besar atau file rusak.";
				}
			} else {
					$new_image = $data['user']['image'];
					$info_image = "";
				}

			$data = [
				'name' => $name,
				'gender' => $gender,
				'alamat' => $alamat,
				'village_id' => $village_id,
				'district_id' => $district_id,
				'regency_id' => $regency_id,
				'province_id' => $province_id,
				'date_modified' => $date_modified,
				'image' => $new_image
			];

			$data2 = [
				'nickname' => $nickname,
				'nik' => $nik,
				'tempat_lahir' => $tempat_lahir,
				'tgl_lahir' => $tgl_lahir,
				'hobi' => $hobi,
				'suku' => $suku,
				'sifat_menonjol' => $sifat_menonjol,
				'visi' => $visi,
				'kendaraan' => $kendaraan,
				'pekerjaan' => $pekerjaan,
				'tempat_kerja' => $tempat_kerja,
				'alamat_kerja' => $alamat_kerja,
				'penghasilan' => $penghasilan,
				'date_modified' => $date_modified
			];

			$this->db->where('email', $email);
			$this->db->update('user',$data);

			$this->db->where('email', $email);
			$this->db->update('user_detail',$data2);

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Profil berhasil diperbaharui!'.$info_image.'</div>');
			redirect('user/profile');
		}
	}

	public function file_check()
	{
        $allowed_type_file = array('application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.documen', 'application/pdf', 'application/vnd.ms-powerpoint', 'application/vnd.openxmlformats-officedocument.presentationml.presentation', 'application/vnd.ms-excel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        $mime = get_mime_by_extension($_FILES['file']['name']);

        if (isset($_FILES['file']['name']) && $_FILES['file']['name'] != "") {
            if (in_array($mime, $allowed_type_file)) {
                if ($_FILES['file']['size'] > 6144000) {
                    $this->form_validation->set_message('file_check', 'Ukuran file terlalu besar! Pastikan kurang dari 5MB!');
                    return FALSE;
                } else {
                return TRUE;                    
                }
            } else {
                $this->form_validation->set_message('file_check', 'Jenis file tidak diizinkan!');
                return FALSE;
            }
        } else {
            $this->form_validation->set_message('file_check', 'Pilih file untuk diupload!');
                return FALSE;
        }
    }

    public function changePassword()
	{
		$data['title'] = 'Ubah Kata Sandi';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
		$this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[6]|matches[new_password2]');
		$this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[6]|matches[new_password1]');
		if ($this->form_validation->run() == false) {
			# code...
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('user/changepassword', $data);
			$this->load->view('templates/footer');
		} else {
			$current_password = $this->input->post('current_password');
			$new_password = $this->input->post('new_password1');
			if (!password_verify($current_password, $data['user']['password'])) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Kata sandi lama salah!</div>');
				redirect('user/changepassword');
			} else {
				if ($current_password == $new_password) {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Kata sandi baru tidak boleh sama dengan sebelumnya!</div>');
					redirect('user/changepassword');
				} else {
					// password sudah ok
					$password_hash = password_hash($new_password, PASSWORD_DEFAULT);

					$this->db->set('password', $password_hash);
					$this->db->where('email', $this->session->userdata('email'));
					$this->db->update('user');

					$this->session->unset_userdata('email');
					$this->session->unset_userdata('role_id');

					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Kata sandi berhasil diubah! Silakan login dengan kata sandi baru.</div>');
					redirect('auth');
				}
			}
		}
	}

	public function mutabaah()
	{
		$data['title'] = 'Data Evaluasi';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->db->select('*');
		$this->db->from('upa');
		$this->db->join('user', 'user.upa_id = upa.upa_id');
		$this->db->where('user.email', $this->session->userdata('email'));
		$data['anggota'] = $this->db->get()->row_array();

		$data['mutabaah'] = $this->db->get_where('mutabaah', ['email' => $this->session->userdata('email')])->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('user/mutabaah', $data);
		$this->load->view('templates/footer');

	}

	public function inputMutabaah()
	{
		$data['title'] = 'Data Evaluasi';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('tgl_upa', 'Tanggal pelaksanaan UPA', 'required|trim');
		$this->form_validation->set_rules('liqo', 'Kehadiran UPA', 'required|trim');
		$this->form_validation->set_rules('berjamaah', 'Shalat berjamaah', 'required|trim');
		$this->form_validation->set_rules('tilawah', 'Tilawah', 'required|trim');
		$this->form_validation->set_rules('dzikir_pagi', 'Dzikir pagi', 'required|trim');
		$this->form_validation->set_rules('dzikir_petang', 'Dzikir petang', 'required|trim');
		$this->form_validation->set_rules('dzikir_lain', 'Dzikir Tasbih', 'required|trim');
		$this->form_validation->set_rules('shalawat', 'Shalawat', 'required|trim');
		$this->form_validation->set_rules('qiyamullail', 'Qiyamullail', 'required|trim');
		$this->form_validation->set_rules('dhuha', 'Shalat Dhuha', 'required|trim');
		$this->form_validation->set_rules('bantu_prt', 'Pekerjaan rumah', 'required|trim');
		$this->form_validation->set_rules('infaq', 'Infaq', 'required|trim');
		$this->form_validation->set_rules('shaum_sunnah', 'Shaum sunnah', 'required|trim');
		$this->form_validation->set_rules('olah_raga', 'Olah raga', 'required|trim');

		if( $this->form_validation->run() == false ) {
		
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('user/input-mutabaah', $data);
			$this->load->view('templates/footer');
		
		} else {

			$dzikir_lain = $this->input->post('dzikir_lain')*100;
			$shalawat = $this->input->post('shalawat')*100;
			$tilawah = $this->input->post('tilawah')*10;
			if (is_null($this->input->post('haid_nifas'))) {
				$haid_nifas = 0;
			} else {
				$haid_nifas = $this->input->post('haid_nifas');
			}
			$data = [
						'tanggal' => time(),
						'email' => $this->input->post('email'),
						'upa_id' => $this->input->post('upa_id'),
						'tgl_upa' => strtotime($this->input->post('tgl_upa')),
						'liqo' => $this->input->post('liqo'),
						'qiyamullail' => $this->input->post('qiyamullail'),
						'dhuha' => $this->input->post('dhuha'),
						'tilawah' => $tilawah,
						'bantu_prt' => $this->input->post('bantu_prt'),
						'dzikir_pagi' => $this->input->post('dzikir_pagi'),
						'infaq' => $this->input->post('infaq'),
						'shaum_sunnah' => $this->input->post('shaum_sunnah'),
						'dzikir_petang' => $this->input->post('dzikir_petang'),
						'olah_raga' => $this->input->post('olah_raga'),
						'dzikir_lain' => $dzikir_lain,
						'berjamaah' => $this->input->post('berjamaah'),
						'shalawat' => $shalawat,
						'haid_nifas' => $haid_nifas,
						'jumlah' => $this->input->post('liqo')+$this->input->post('qiyamullail')+$this->input->post('dhuha')+$tilawah+$this->input->post('bantu_prt')+$this->input->post('dzikir_pagi')+$this->input->post('infaq')+$this->input->post('shaum_sunnah')+$this->input->post('dzikir_petang')+$this->input->post('olah_raga')+$dzikir_lain+$this->input->post('berjamaah')+$shalawat
			];

			$this->db->insert('mutabaah', $data);
			$this->session->set_flashdata('message', '<div class="alert col-sm-6 alert-success" role="alert"> Data berhasil ditambahkan.</div>');
			redirect('user/mutabaah');
		}
	}

	public function detailmutabaah($id)
	{
		$data['title'] = 'Data Evaluasi';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->db->select('*');
		$this->db->from('upa');
		$this->db->join('user', 'user.upa_id = upa.upa_id');
		$this->db->where('user.email', $this->session->userdata('email'));
		$data['anggota'] = $this->db->get()->row_array();

		$data['mutabaah'] = $this->db->get_where('mutabaah', ['mtb_id' => $id])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('user/detail-mutabaah', $data);
		$this->load->view('templates/footer');

	}

	public function hapusMutabaah($id)
	{
		
		$this->db->delete('mutabaah', ['mtb_id' => $id]);
		$this->session->set_flashdata('message', '<div class="alert col-sm-6 alert-danger" role="alert"> Data berhasil dihapus!</div>');
		redirect('user/mutabaah');
	}

	public function mutabaah_rmd()
	{
		$data['title'] = 'Data Evaluasi Ramadhan';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->db->select('*');
		$this->db->from('upa');
		$this->db->join('user', 'user.upa_id = upa.upa_id');
		$this->db->where('user.email', $this->session->userdata('email'));
		$data['anggota'] = $this->db->get()->row_array();

		$data['mutabaah'] = $this->db->get_where('mutabaah_rmd', ['email' => $this->session->userdata('email')])->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('user/mutabaah-ramadhan', $data);
		$this->load->view('templates/footer');

	}

	public function inputMutabaah_rmd()
	{
		$data['title'] = 'Data Evaluasi Ramadhan';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('email', 'Username', 'required|trim');

		if( $this->form_validation->run() == false ) {
		
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('user/input-mutabaah2', $data);
			$this->load->view('templates/footer');
		
		} else {

			$tilawah = $this->input->post('tilawah');
			$yasin = $this->input->post('yasin');
			$dukhon = $this->input->post('dukhon');
			$waqiah = $this->input->post('waqiah');
			$mulk = $this->input->post('mulk');
			$kahfi = $this->input->post('kahfi');
			$ali_imron = $this->input->post('ali_imron');
			$dzikir_pagi = $this->input->post('dzikir_pagi');
			$dzikir_petang = $this->input->post('dzikir_petang');
			$hafal_ayat = $this->input->post('hafal_ayat');
			$istighfar = $this->input->post('istighfar')*100;
			$shalawat = $this->input->post('shalawat')*100;
			$tahlil = $this->input->post('tahlil')*100;
			$doa_harian = $this->input->post('doa_harian');
			$doa_sikon = $this->input->post('doa_sikon');
			$doa_partai = $this->input->post('doa_partai');
			$doa_bangsa = $this->input->post('doa_bangsa');
			$doa_soliditas = $this->input->post('doa_soliditas');
			$berjamaah = $this->input->post('berjamaah');
			$tarawih = $this->input->post('tarawih');
			$shalat_tasbih = $this->input->post('shalat_tasbih');
			$shalat_istikhoroh = $this->input->post('shalat_istikhoroh');
			$shalat_hajat = $this->input->post('shalat_hajat');
			$evaluasi_diri = $this->input->post('evaluasi_diri');
			$itikaf = $this->input->post('itikaf');
			$ziarah_qubur = $this->input->post('ziarah_qubur');
			if (is_null($this->input->post('haid_nifas'))) {
				$haid_nifas = 0;
			} else {
				$haid_nifas = $this->input->post('haid_nifas');
			}
			$data = [
						'tanggal' => time(),
						'email' => $this->input->post('email'),
						'upa_id' => $this->input->post('upa_id'),
						'tgl_rmd' => $this->input->post('tgl_rmd'),
						'tilawah' => $tilawah,
						'yasin' => $yasin,
						'dukhon' => $dukhon,
						'waqiah' => $waqiah,
						'mulk' => $mulk,
						'kahfi' => $kahfi,
						'ali_imron' => $ali_imron,
						'dzikir_pagi' => $dzikir_pagi,
						'dzikir_petang' => $dzikir_petang,
						'hafal_ayat' => $hafal_ayat,
						'istighfar' => $istighfar,
						'shalawat' => $shalawat,
						'tahlil' => $tahlil,
						'doa_harian' => $doa_harian,
						'doa_sikon' => $doa_sikon,
						'doa_partai' => $doa_partai,
						'doa_bangsa' => $doa_bangsa,
						'doa_soliditas' => $doa_soliditas,
						'berjamaah' => $berjamaah,
						'tarawih' => $tarawih,
						'shalat_tasbih' => $shalat_tasbih,
						'shalat_istikhoroh' => $shalat_istikhoroh,
						'shalat_hajat' => $shalat_hajat,
						'evaluasi_diri' => $evaluasi_diri,
						'itikaf' => $itikaf,
						'ziarah_qubur' => $ziarah_qubur,
						'haid_nifas' => $haid_nifas,
						'jumlah' => $tilawah + $yasin + $dukhon + $waqiah + $mulk + $kahfi + $ali_imron + $dzikir_pagi + $dzikir_petang + $hafal_ayat + $istighfar + $shalawat + $tahlil + $doa_harian + $doa_sikon + $doa_partai + $doa_bangsa + $doa_soliditas + $berjamaah + $tarawih + $shalat_tasbih + $shalat_istikhoroh + $shalat_hajat + $evaluasi_diri + $itikaf + $ziarah_qubur
			];

			$this->db->insert('mutabaah_rmd', $data);
			$this->session->set_flashdata('message', '<div class="alert col-sm-6 alert-success" role="alert"> Data berhasil ditambahkan.</div>');
			redirect('user/mutabaah_rmd');
		}
	}

	public function detailmutabaah_rmd($id)
	{
		$data['title'] = 'Data Evaluasi Ramadhan';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->db->select('*');
		$this->db->from('upa');
		$this->db->join('user', 'user.upa_id = upa.upa_id');
		$this->db->where('user.email', $this->session->userdata('email'));
		$data['anggota'] = $this->db->get()->row_array();

		$data['mutabaah'] = $this->db->get_where('mutabaah_rmd', ['mtb_id' => $id])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('user/detail-mutabaah-rmd', $data);
		$this->load->view('templates/footer');

	}

	public function hapusMutabaah_rmd($id)
	{
		
		$this->db->delete('mutabaah_rmd', ['mtb_id' => $id]);
		$this->session->set_flashdata('message', '<div class="alert col-sm-6 alert-danger" role="alert"> Data berhasil dihapus!</div>');
		redirect('user/mutabaah_rmd');
	}

}
