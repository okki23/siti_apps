<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Report_masuk extends Parent_Controller {
 
	var $nama_tabel = 't_masuk'; 
	var $daftar_field = array('id','id_barang','trans_in','keterangan','user_insert','date_insert');
	var $primary_key = 'id'; 
  
 	public function __construct(){
 		parent::__construct();
 		$this->load->model('m_report_masuk'); 
		if(!$this->session->userdata('username')){
		   echo "<script language=javascript>
				 alert('Anda tidak berhak mengakses halaman ini!');
				 window.location='" . base_url('login') . "';
				 </script>";
		}
 	}
 
	public function index(){
		$data['judul'] = $this->data['judul']; 
		$data['konten'] = 'report_masuk/report_masuk_view';
		$this->load->view('template_view',$data);		
   
	} 

 
	 
	public function print(){  
		
		$from = $this->input->post('from');
		$to = $this->input->post('to');
 
		$filename ="Report-Masuk.xls";
		header('Content-type: application/ms-excel');
		header('Content-Disposition: attachment; filename='.$filename);
		
		$sql = "select a.*,b.nama_barang,c.nama_kategori,d.username,e.nama 
		from t_masuk a 
		left join m_barang b on b.id = a.id_barang 
		left join m_kategori c on c.id = b.id_kategori 
		left join m_user d on d.id = a.user_insert 
		left join m_pegawai e on e.id = d.id_pegawai
		where a.date_insert  BETWEEN'".$from."' AND '".$to."' ";
	 
		$exsql = $this->db->query($sql)->result();
 
		echo ' 
		<table width="100%" border="1" cellpadding="3" cellspacing="0"> 
		<tr>
			<th> Nama Barang </th>
			<th> Kategori Barang</th>
			<th> Jumlah Masuk</th>
			<th> Tanggal Masuk</th>
			<th> PIC Penanggung Jawab </th> 
			<th> Keterangan </th> 
		</tr> 
		'; 
		foreach($exsql as $k=>$v){
		echo '
		<tr>  
			<td>'.$v->nama_barang.'</td>
			<td>'.$v->nama_kategori.'</td>
			<td>'.$v->trans_in.'</td> 
			<td>'.$v->date_insert.'</td> 
			<td>'.$v->username.'</td> 
			<td>'.$v->keterangan.'</td> 
		</tr> ';
		}
		 
		echo '</table>';

	}
	
 


}
