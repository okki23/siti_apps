<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Report_stok extends Parent_Controller {
 
	var $nama_tabel = 'm_barang';
	var $daftar_field = array('id','nama_barang','id_kategori','qty','keterangan');
	var $primary_key = 'id';  
  
 	public function __construct(){
 		parent::__construct();
 		$this->load->model('m_report_stok'); 
		if(!$this->session->userdata('username')){
		   echo "<script language=javascript>
				 alert('Anda tidak berhak mengakses halaman ini!');
				 window.location='" . base_url('login') . "';
				 </script>";
		}
 	}
 
	public function index(){
		$data['judul'] = $this->data['judul']; 
		$data['konten'] = 'report_stok/report_stok_view';
		$this->load->view('template_view',$data);		
   
	} 
 
	 
	public function print(){   

		$filename ="Report-stok.xls";
		header('Content-type: application/ms-excel');
		header('Content-Disposition: attachment; filename='.$filename);
		
		$sql = "select a.*,b.nama_kategori from m_barang a
		left join m_kategori b on b.id = a.id_kategori "; 

		$exsql = $this->db->query($sql)->result();
 
		echo ' 
		<table width="100%" border="1" cellpadding="3" cellspacing="0"> 
		<tr>
			<th> Nama Barang </th>
			<th> Kategori Barang</th>
			<th> Jumlah Stok</th> 
			<th> Keterangan </th> 
		</tr> 
		'; 
		foreach($exsql as $k=>$v){
		echo '
		<tr>  
			<td>'.$v->nama_barang.'</td>
			<td>'.$v->nama_kategori.'</td>
			<td>'.$v->qty.'</td>  
			<td>'.$v->keterangan.'</td> 
		</tr> ';
		}
		 
		echo '</table>';

	}
	
 


}
