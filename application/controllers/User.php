<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct() {
        parent::__construct();

        //memanggil model
        $this->load->model(array('user_model'));
    }

	public function index() {
		//mengarahkan ke function read
		$this->login();
	}

	public function login() {
		
		//memanggil fungsi login submit	(agar di view tidak dilihat fungsi login submit)
		$this->login_submit();

		//mengirim data ke view
		$output = array(
						'judul' => 'Login'
					);

		//memanggil file view
		$this->load->view('login', $output);
	}

	private function login_submit() {
		
		//proses jika tombol login di submit
		if($this->input->post('submit') == 'Login') {

			//aturan validasi input login
			$this->form_validation->set_rules('username', 'Username', 'required|alpha|callback_login_check');
			$this->form_validation->set_rules('password', 'Password', 'required|alpha_numeric|min_length[5]');

			//jika validasi sukses 
			if ($this->form_validation->run() == TRUE) {

				//redirect ke provinsi (bisa dirubah ke controller & fungsi manapun)
				redirect('provinsi/read');
			} 

		}
	}

	public function login_check() {
		//menangkap data input dari view
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		//password encrypt
		$password_encrypt = md5($password);

		//check username & password sesuai dengan di database
		$data_user = $this->user_model->read_single($username, $password_encrypt);
		
		//jika cocok : dikembalikan ke fungsi login_submit (validasi sukses)
		if(!empty($data_user)) {

			//buat session user 
			$this->session->set_userdata('id', $data_user['id']);
			$this->session->set_userdata('nama', $data_user['nama']);

			return TRUE;

		//jika tidak cocok : dikembalikan ke fungsi login_submit (validasi gagal)
		} else {

			//membuat pesan error
			$this->form_validation->set_message('login_check', 'Username & password tidak tepat');
			
			return FALSE;

		}
	}

	public function logout() {

		//hapus session user
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('nama');

		//mengembalikan halaman ke function read
		redirect('user/login');
	}

	public function reset_password() {
		
		//memanggil fungsi login submit	(agar di view tidak dilihat fungsi login submit)
		$this->reset_password_submit();

		//mengirim data ke view
		$output = array(
						'theme_page' => 'reset_password',
						'judul' => 'Reset Password'
					);

		//memanggil file view
		$this->load->view('theme/index', $output);
    }
    
    private function reset_password_submit(){
		//proses jika password berhasil diganti
		if ($this->input->post('submit') == 'Simpan') {
			
			//aturan validasi dalam mengganti password
			$this->form_validation->set_rules('password_lama', 'Password Lama', 'required|alpha_numeric|min_length[5]|max_length[10]|callback_check_password');
			$this->form_validation->set_rules('password_baru', 'Password Baru', 'required|alpha_numeric|min_length[5]|max_length[10]|differs[password_lama]');
			$this->form_validation->set_rules('konfirmasi_password', 'Konfirmasi Password', 'required|alpha_numeric|min_length[5]|max_length[10]|matches[password_baru]');

			//jika password berhasil diubah
			if($this->form_validation->run() == TRUE){
				$id = $this->session->userdata('id');
				$new_password = $this->input->post('password_baru');
				$Password = md5($new_password);
				$input = array(
								'password' => $Password,
							);
				
				$data_provinsi = $this->user_model->update($input, $id);

				//pesan yang akan muncul jika password berhasil diubah
				$this->session->set_tempdata('message', 'Password berhasil diubah');

				//mengarahkan ke controller provinsi
				redirect('provinsi/read');
			}
		}
	}

	public function check_password(){
		
		$old_password = $this->input->post('password_lama');
		$new_password = $this->input->post('password_baru');
		$confirm_password = $this->input->post('konfirmasi_password');

		//password encrypt
		$password_lama = md5($old_password);
		$password_baru = md5($new_password);
		$konfirmasi_password = md5($confirm_password);

		//check username & password sesuai dengan di database
		$nama = $this->session->userdata('nama');
		$data_user = $this->user_model->read($password_lama);
		
		//jika data tidak sesuai dengan di database
		if(empty($data_user)) {
			$this->form_validation->set_message('check_password', 'Password gagal diubah');

        return FALSE;
		}
		else{					
            return TRUE;
        }
	}
}