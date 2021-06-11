<?php 


class Mpengajuan extends CI_Model
{
	
	function tampil_pengajuan()
	{
		$this->db->join('dosen','pengajuan.nidn = dosen.nidn', 'left');
		$this->db->join('mahasiswa','pengajuan.nim = mahasiswa.nim', 'left');
		$this->db->join('tahun_ajaran','pengajuan.id_tahun_ajaran = tahun_ajaran.id_tahun_ajaran', 'left');
		$ambil = $this->db->get('pengajuan');
		return $ambil->result_array();
	}

	function tampil_pengajuan_jenis_admin($jenis_pengajuan) {
		
		$this->db->select('*, dosen.nidn AS nidn');
		$this->db->join('dosen','pengajuan.nidn = dosen.nidn', 'left');
		$this->db->join('mahasiswa','pengajuan.nim = mahasiswa.nim', 'left');
		$this->db->join('tahun_ajaran','pengajuan.id_tahun_ajaran = tahun_ajaran.id_tahun_ajaran', 'left');
		$this->db->where('pengajuan.jenis_pengajuan', $jenis_pengajuan);
		$ambil = $this->db->get('pengajuan');
		return $ambil->result_array();
	}

	function tampil_pengajuan_jenis_dosen($jenis_pengajuan) {
		
		$this->db->select('*, dosen.nidn AS nidn, ruangan.nama_ruangan AS nama_ruangan');
		$this->db->join('dosen','pengajuan.nidn = dosen.nidn', 'left');
		$this->db->join('mahasiswa','pengajuan.nim = mahasiswa.nim', 'left');
		$this->db->join('tahun_ajaran','pengajuan.id_tahun_ajaran = tahun_ajaran.id_tahun_ajaran', 'left');
		$this->db->join('ruangan','pengajuan.id_ruangan = ruangan.id_ruangan', 'left');
		$this->db->where('pengajuan.jenis_pengajuan', $jenis_pengajuan);
		$this->db->where('pengajuan.nidn', $_SESSION['dosen']['nidn']);
		$ambil = $this->db->get('pengajuan');
		return $ambil->result_array();
	}

	function tampil_pengajuan_jenis($jenis_pengajuan) {

		$nim_pelogin = $_SESSION['mahasiswa']['nim'];

		$this->db->join('tahun_ajaran', 'tahun_ajaran.id_tahun_ajaran = pengajuan.id_tahun_ajaran', 'left');
		$this->db->join('ruangan', 'ruangan.id_ruangan = pengajuan.nidn', 'left');
		$this->db->join('dosen', 'dosen.nidn = pengajuan.nidn', 'left');
		$this->db->where('nim', $nim_pelogin);
		$this->db->where('jenis_pengajuan', $jenis_pengajuan);
		$ambil = $this->db->get('pengajuan');
		return $ambil->result_array();
	}

	// DETAIL PENGAJUAN
	function ambil_pengajuan_sk($id_pengajuan) {
		$nim_pelogin = $_SESSION['mahasiswa']['nim'];
		$this->db->join('tahun_ajaran', 'tahun_ajaran.id_tahun_ajaran = pengajuan.id_tahun_ajaran', 'left');
		$this->db->join('ruangan', 'ruangan.id_ruangan = pengajuan.id_ruangan', 'left');
		$this->db->join('mahasiswa', 'pengajuan.nim = mahasiswa.nim', 'left');
		$this->db->join('dosen', 'dosen.nidn = pengajuan.nidn', 'left');
		$this->db->where('pengajuan.jenis_pengajuan', 'SK KP');
		$this->db->where('pengajuan.id_pengajuan', $id_pengajuan);
		$this->db->where('pengajuan.nim', $nim_pelogin);
		$ambil = $this->db->get('pengajuan');
		return $ambil->row_array();
	}

	function ambil_pengajuan_pra_kp($id_pengajuan) {
		$nim_pelogin = $_SESSION['mahasiswa']['nim'];
		$this->db->join('tahun_ajaran', 'tahun_ajaran.id_tahun_ajaran = pengajuan.id_tahun_ajaran', 'left');
		$this->db->join('ruangan', 'ruangan.id_ruangan = pengajuan.id_ruangan', 'left');
		$this->db->join('mahasiswa', 'pengajuan.nim = mahasiswa.nim', 'left');
		$this->db->join('dosen', 'dosen.nidn = pengajuan.nidn', 'left');
		$this->db->where('pengajuan.jenis_pengajuan', 'Pra KP');
		$this->db->where('pengajuan.id_pengajuan', $id_pengajuan);
		$this->db->where('pengajuan.nim', $nim_pelogin);
		$ambil = $this->db->get('pengajuan');
		return $ambil->row_array();
	}

	function ambil_pengajuan_kp($id_pengajuan) {
		$nim_pelogin = $_SESSION['mahasiswa']['nim'];

		$this->db->join('tahun_ajaran', 'tahun_ajaran.id_tahun_ajaran = pengajuan.id_tahun_ajaran', 'left');
		$this->db->join('ruangan', 'ruangan.id_ruangan = pengajuan.id_ruangan', 'left');
		$this->db->join('dosen', 'dosen.nidn = pengajuan.nidn', 'left');
		$this->db->join('mahasiswa', 'pengajuan.nim = mahasiswa.nim', 'left');
		$this->db->where('pengajuan.jenis_pengajuan', 'KP');
		$this->db->where('pengajuan.id_pengajuan', $id_pengajuan);
		$this->db->where('pengajuan.nim', $nim_pelogin);
		$ambil = $this->db->get('pengajuan');
		return $ambil->row_array();
	}

	// DETAIL PENGAJUAN
	function terima($id_pengajuan)
	{
		$status['status_pengajuan']="Diterima";
		$this->db->where('id_pengajuan', $id_pengajuan);
		$this->db->update('pengajuan', $status);
	}

	function tolak($id_pengajuan)
	{
		$status['status_pengajuan']="Ditolak";
		$this->db->where('id_pengajuan', $id_pengajuan);
		$this->db->update('pengajuan', $status);
	}

	function tambah_pengajuan($inputan)
	{
		$inputan['status_pengajuan'] = 'Belum Diverifikasi';
		$inputan['tanggal_pengajuan'] = date("Y-m-d");
		$inputan['nim'] = $_SESSION['mahasiswa']['nim'];
		// konfigurasi upload
		$config['upload_path'] = './assets/dokumen/';
		$config['allowed_types'] = 'doc|docx|pdf';
		// panggil library upload
		$this->load->library('upload', $config);
		// jalankan proses upload
		$proses_upload = $this->upload->do_upload('surat_pengajuan_kp');
		if ($proses_upload) {
			// masukkan nama file yang barusan di upload ke array $inputan
			$inputan['surat_pengajuan_kp'] = $this->upload->data('file_name');
		}
		// jalankan proses insert data ke table pengajuan
		$this->db->insert('pengajuan', $inputan);
	}

	function detail_pengajuan($id_pengajuan) {
		$this->db->join('tahun_ajaran', 'tahun_ajaran.id_tahun_ajaran = pengajuan.id_tahun_ajaran', 'left');
		$this->db->join('ruangan', 'ruangan.id_ruangan = pengajuan.id_ruangan', 'left');
		$this->db->join('dosen', 'dosen.nidn = pengajuan.nidn', 'left');
		$this->db->where('id_pengajuan', $id_pengajuan);
		$ambil = $this->db->get('pengajuan');
		return $ambil->row_array();
	}

	function simpan_jadwal($inputan, $id_pengajuan)
	{
		$inputan['sesi_ujian'] = $inputan['sesi_ujian'][0] . " - " . $inputan['sesi_ujian'][1];
		
		$this->db->where('id_pengajuan', $id_pengajuan);
		$this->db->update('pengajuan', $inputan);
	}

}
?>