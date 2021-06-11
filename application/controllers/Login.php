<?php 
require 'assets/google/vendor/autoload.php';

class Login extends CI_Controller 
{	
	public function __construct()
	{
		parent::__construct();
		// cek apakah sudah login? jika sudah , alihkan ke halaman home masing2 tipe user
		if ( $this->session->userdata('dosen') ) {
			redirect('dosen/home');
		} elseif ( $this->session->userdata('admin') ) {
			redirect('admin/home');
		} elseif ( $this->session->userdata('mahasiswa') ) {
			redirect('mahasiswa/home');
		}

		$this->load->model('Mdosen');
	}
	
	public function index()
	{
		$this->load->model('Mlogin');
		$client = new Google_Client();
		$client->setClientId('36386279248-efmj5rt2c0cfq7q7rgolqd0f25la2ucn.apps.googleusercontent.com');
		$client->setClientSecret('0b15CvFpYqp2qJTpV5ogLxIr');
		$client->setRedirectUri('http://localhost/RPL/login');

		$client->addScope("email");
		$client->addScope("profile");

		if (isset($_GET['code'])) 
		{
			$token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
			$client->setAccessToken($token['access_token']);
			$google_oauth = new Google_Service_Oauth2($client);
			$google_account_info = $google_oauth->userinfo->get();
			$email_user = $google_account_info->email;

			$this->session->unset_userdata('mahasiswa');
			$this->session->unset_userdata('dosen');
			$this->session->unset_userdata('admin');

			$hasil = $this->Mlogin->login_user($email_user);
			// echo "$email_user";
			if ($hasil=="sukses-dosen") 
			{
				echo "<script>alert('Login Dosen Berhasil'); location='dosen/home';</script>";
			}
			elseif ($hasil=="sukses-admin") 
			{
				echo "<script>alert('Login Admin Berhasil'); location='admin/home';</script>";
			}
			elseif ($hasil=="sukses-mahasiswa") 
			{
				echo "<script>alert('Login Mahasiswa Berhasil'); location='mahasiswa/home';</script>";
			}
			else
			{
				echo "<script>alert('Login Gagal'); location='login';</script>";
			}
		}
		$data['client'] = $client;
		$this->load->view('login',$data);
	}



}
?>