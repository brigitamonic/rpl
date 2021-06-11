<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuan extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mpengajuan');
		$this->load->model('Mruangan');
		$this->load->model('Mtahun_ajaran');
		$this->load->model('Mdosen');
	}

	public function detail($id_pengajuan) 
	{
		$data['sk_kp'] = $this->Mpengajuan->ambil_pengajuan_sk($id_pengajuan);
		$data['pra_kp'] = $this->Mpengajuan->ambil_pengajuan_pra_kp($id_pengajuan);
		$data['kp'] = $this->Mpengajuan->ambil_pengajuan_kp($id_pengajuan);
		$this->load->view('mahasiswa/header');
		$this->load->view('mahasiswa/pengajuan/detail_pengajuan', $data);
		$this->load->view('mahasiswa/footer');
	}

	public function sk_kp()
	{
		// ambil inputan 
		$inputan = $this->input->post();
		// jika ada inputan
		if ($inputan) {
			$inputan['jenis_pengajuan'] = "SK KP";
			$this->Mpengajuan->tambah_pengajuan($inputan);
			redirect('mahasiswa/home');

		}
		$this->load->model('Mtahun_ajaran');
		$data['tahun'] = $this->Mtahun_ajaran->tampil_tahun_ajaran();
		$this->load->view('mahasiswa/header');
		$this->load->view('mahasiswa/pengajuan/form_sk_kp', $data);
		$this->load->view('mahasiswa/footer');
	}

	public function pra_kp()
	{
		// ambil inputan 
		$inputan = $this->input->post();
		// jika ada inputan
		if ($inputan) {
			$inputan['jenis_pengajuan'] = "Pra KP";
			$this->Mpengajuan->tambah_pengajuan($inputan);
			redirect('mahasiswa/home');
		}
		$data['tahun'] = $this->Mtahun_ajaran->tampil_tahun_ajaran();
		$data['ruangan'] = $this->Mruangan->tampil_ruangan();
		$data['dosen'] = $this->Mdosen->tampil_dosen();
		$this->load->view('mahasiswa/header');
		$this->load->view('mahasiswa/pengajuan/form_pra_kp', $data);
		$this->load->view('mahasiswa/footer');
	}

	public function kp()
	{
		// ambil inputan 
		$inputan = $this->input->post();
		// jika ada inputan
		if ($inputan) {
			$inputan['jenis_pengajuan'] = "KP";
			$this->Mpengajuan->tambah_pengajuan($inputan);
			redirect('mahasiswa/home');
		}

		$data['tahun'] = $this->Mtahun_ajaran->tampil_tahun_ajaran();
		$data['ruangan'] = $this->Mruangan->tampil_ruangan();
		$data['dosen'] = $this->Mdosen->tampil_dosen();
		$this->load->view('mahasiswa/header');
		$this->load->view('mahasiswa/pengajuan/form_kp', $data);
		$this->load->view('mahasiswa/footer');
	}

}

/* End of file Pengajuan.php */
/* Location: ./application/controllers/mahasiswa/Pengajuan.php */