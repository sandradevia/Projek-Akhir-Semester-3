<?php

class Buku extends Controller {
	
	public function __construct()
	{	
		if($_SESSION['session_login'] != 'sudah_login') {
			Flasher::setMessage('Login','Tidak ditemukan.','danger');
			header('location: '. base_url . '/login');
			exit;
		}
	}
	
	public function index()
	{
		$data['title'] = 'Data Barang';
		$data['barang'] = $this->model('Barangodel')->getAllBarang();
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('buku/index', $data);
		$this->view('templates/footer');
	}
	public function lihatlaporan()
	{
		$data['title'] = 'Data Laporan Barang';
		$data['barang'] = $this->model('BarangModel')->getAllBuku();
		$this->view('barang/lihatlaporan', $data);
	}

	public function laporan()
	{
		$data['barang'] = $this->model('BarangModel')->getAllBuku();

			$pdf = new FPDF('p','mm','A4');
			// membuat halaman baru
			$pdf->AddPage();
			// setting jenis font yang akan digunakan
			$pdf->SetFont('Arial','B',14);
			// mencetak string 
			$pdf->Cell(190,7,'LAPORAN BUKU',0,1,'C');
			 
			// Memberikan space kebawah agar tidak terlalu rapat
			$pdf->Cell(10,7,'',0,1);
			 
			$pdf->SetFont('Arial','B',10);
			$pdf->Cell(85,6,'JUDUL',1);
			$pdf->Cell(30,6,'PENERBIT',1);
			$pdf->Cell(30,6,'PENGARANG',1);
			$pdf->Cell(15,6,'TAHUN',1);
			$pdf->Cell(25,6,'KATEGORI',1);
			  $pdf->Ln();
			$pdf->SetFont('Arial','',10);
			 
			foreach($data['barang'] as $row) {
			    $pdf->Cell(85,6,$row['id_barang'],1);
			    $pdf->Cell(30,6,$row['id_kategori'],1);
			    $pdf->Cell(30,6,$row['nama_barang'],1);
			    $pdf->Cell(15,6,$row['merk'],1); 
			    $pdf->Cell(25,6,$row['harga_beli'],1);
			    $pdf->Ln(); 
			}
			
			$pdf->Output('D', 'Laporan Barang.pdf', true);

	}
	public function cari()
	{
		$data['title'] = 'Data Barang';
		$data['barang'] = $this->model('BarangModel')->cariBarang();
		$data['key'] = $_POST['key'];
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('barang/index', $data);
		$this->view('templates/footer');
	}

	public function edit($id){

		$data['title'] = 'Detail Barang';
		$data['kategori'] = $this->model('KategoriModel')->getAllKategori();
		$data['barang'] = $this->model('BarangModel')->getBarangById($id);
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('barang/edit', $data);
		$this->view('templates/footer');
	}

	public function tambah(){
		$data['title'] = 'Tambah Barang';		
		$data['kategori'] = $this->model('KategoriModel')->getAllKategori();		
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('buku/create', $data);
		$this->view('templates/footer');
	}

	public function simpanBarang(){		

		if( $this->model('BarangModel')->tambahBarang($_POST) > 0 ) {
			Flasher::setMessage('Berhasil','ditambahkan','success');
			header('location: '. base_url . '/barang');
			exit;			
		}else{
			Flasher::setMessage('Gagal','ditambahkan','danger');
			header('location: '. base_url . '/barang');
			exit;	
		}
	}

	public function updateBarang(){	
		if( $this->model('BarangModel')->editBarang($_POST) > 0 ) {
			Flasher::setMessage('Berhasil','diupdate','success');
			header('location: '. base_url . '/buku');
			exit;			
		}else{
			Flasher::setMessage('Gagal','diupdate','danger');
			header('location: '. base_url . '/buku');
			exit;	
		}
	}

	public function hapus($id){
		if( $this->model('BarangModel')->deleteBarang($id) > 0 ) {
			Flasher::setMessage('Berhasil','dihapus','success');
			header('location: '. base_url . '/buku');
			exit;			
		}else{
			Flasher::setMessage('Gagal','dihapus','danger');
			header('location: '. base_url . '/buku');
			exit;	
		}
	}
}