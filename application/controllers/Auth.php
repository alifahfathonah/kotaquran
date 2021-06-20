<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('model_select');
	}


	public function index()
	{
		if ($this->session->userdata('email')) {
			redirect('user');
		}

		$this->form_validation->set_rules('email', 'Email', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');
		if ( $this->form_validation->run() == false) {
			$data['title'] = 'Login Page';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/login');
			$this->load->view('templates/auth_footer');
		} else{
			$this->_login();
		}
	}

	private function _login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$user = $this->db->get_where('user', ['email' => $email])->row_array();
		
		// jika usernya ada
		if ( $user ) {
			# code...
			if (password_verify($password, $user['password'])) {
				# code...
				$data = [
					'email' => $user['email'],
					'role_id' => $user['role_id']
				];
				$this->session->set_userdata($data);
				if ( $user['role_id'] == 1 ) {
					redirect('admin');
				} else {
						// jika usernya aktif
						if ( $user['is_active'] == 1) {
							# code...
						redirect('user');
						} else {
							$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Akun anda belum aktif. Silakan konfirmasi ke admin.</div>');
						redirect('user/edit');
						}
				}
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Password salah!</div>');
			redirect('auth');
				}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Akun belum terdaftar!</div>');
			redirect('auth');
		}
	}

	public function registration()
	{
		if ($this->session->userdata('email')) {
			redirect('user');
		}

		$this->db->order_by('name');
		$data['wilayah'] = $this->db->get('reg_provinces')->result_array();

		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('j_kelamin', 'Jenis Kelamin', 'required|trim');
		$this->form_validation->set_rules('provinsi', 'Provinsi', 'required|trim');
		$this->form_validation->set_rules('kabupaten', 'Kabupaten', 'required|trim');
		$this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required|trim');
		$this->form_validation->set_rules('desa', 'Desa', 'required|trim');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
		$this->form_validation->set_rules('email', 'No Handphone', 'required|trim|callback_is_number|is_unique[user.email]', [
			'is_unique' => "Nomor ini sudah terdaftar!"]);
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[5]|matches[password2]', [
			'matches' => 'Password dont match!',
			'min_length' => 'Password too short!'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

		if( $this->form_validation->run() == false ) {
		$data['title'] = 'User Registration';
		$this->load->view('templates/auth_header', $data);
		$this->load->view('auth/registration');
		$this->load->view('templates/auth_footer');
		} else {
			$email = $this->input->post('email');
			$data = [
				'name' => htmlspecialchars($this->input->post('name', true)),
				'email' => htmlspecialchars($email),
				'gender' => $this->input->post('j_kelamin'),
				'province_id' => $this->input->post('provinsi'),
				'regency_id' => $this->input->post('kabupaten'),
				'district_id' => $this->input->post('kecamatan'),
				'village_id' => $this->input->post('desa'),
				'alamat' => $this->input->post('alamat'),
				'image' => 'default.jpg',
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'role_id' => 3,
				'is_active' => 0,
				'date_created' => time(),
				'date_modified' => time()
			];

			$data2 = [
				'email' => htmlspecialchars($email),
				'date_modified' => time()
			];

			$data3 = [
				'email' => $this->input->post('email'),
				'role_id' => 3
			];

			// siapkan token
			// $token = base64_encode(random_bytes(32));
			// $user_token = [
			// 		'email' => $email,
			// 		'token' => $token,
			// 		'date_created' => time()
			// ];

			// $this->db->insert('user', $data);
			// $this->db->insert('user_token', $user_token);

			// $this->_sendEmail($token, 'verify');
			$this->db->insert('user', $data);
			$this->db->insert('user_detail', $data2);
			$this->session->set_userdata($data3);


			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Anda berhasil mendaftar! Silakan lengkapi data di bawah ini!</div>');
			redirect('user/edit');
		}
	}

	private function _sendEmail($token, $type)
	{
		$config = [
			'protocol' 	=> 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_user' => 'teamexcellenz@gmail.com',
			'smtp_pass' => 'h4k4n3kunXXX',
			'smtp_port' => 465,
			'mailtype' => 'html',
			'charset'   => 'utf-8',
			'newline'   => "\r\n"
		];

		$this->load->library('email', $config);
		$this->email->initialize($config);

		$this->email->from('teamexcellenz@gmail.com', 'Excellenz Team');
		$this->email->to($this->input->post('email'));

		if($type == 'verify') {	
		$this->email->subject('Account Verification');
		$this->email->message('Click this link to verify your account : <a href="'. base_url(). 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) .'">Activate</a>');
		}

		if($this->email->send()){
			return true;
		} else {
			echo $this->email->print_debugger();
			die;
		}
	}

	public function verify()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$user = $this->db->get_where('user', ['email' => $email])->row_array();

		if($user) {
			$user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

			if($user_token) {
				if(time() - $user_token['date_created'] < (60*60*24)) {
					$this->db->set('is_active', 1);
					$this->db->where('email', $email);
					$this->db->update('user');

					$this->db->delete('user_token', ['email' => $email]);

					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">'. $email .' has been activated! Please login.</div>');
					redirect('auth');
				} else {
					$this->db->delete('user', ['email' => $email]);
					$this->db->delete('user_token', ['email' => $email]);

					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account activation failed! Token expired.</div>');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account activation failed! Token invalid.</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account activation failed! Email invalid.</div>');
			redirect('auth');
		}
	}

	public function is_number()
	{
		$user = $this->input->post('email');
		if (!is_numeric($user)) {
			$this->form_validation->set_message('is_number', 'Nomor handphone salah.');
                    return FALSE;
		} else {
			return TRUE;
		}
	}

	function get_kab()
    {
        $id_provinsi=$this->input->post('id_provinsi');
        $data=$this->model_select->Level_dua($id_provinsi);
        echo json_encode($data);
    }

    function get_kec()
    {
        $id_kabupaten=$this->input->post('id_kabupaten');
        $data=$this->model_select->Level_tiga($id_kabupaten);
        echo json_encode($data);
    }

    function get_desa()
    {
        $id_kecamatan=$this->input->post('id_kecamatan');
        $data=$this->model_select->Level_empat($id_kecamatan);
        echo json_encode($data);
    }

    function get_pengajar()
    {
        $jenis_kelamin=$this->input->post('jenis_kelamin');
        $data=$this->model_select->Pilih_pengajar($jenis_kelamin);
        echo json_encode($data);
    }

	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');


		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda telah keluar dari aplikasi!</div>');
			redirect('auth');
	}

	public function blocked()
	{
		$this->load->view('auth/blocked');
	}
}