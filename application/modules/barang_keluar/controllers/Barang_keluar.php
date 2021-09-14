<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Barang_keluar extends Parent_Controller {
  
  var $nama_tabel = 't_keluar'; 
  var $daftar_field = array('id','id_barang','trans_out','keterangan','user_insert','date_insert');
  var $primary_key = 'id'; 
  
 	public function __construct(){
 		parent::__construct();
 		$this->load->model('m_barang_keluar'); 
		if(!$this->session->userdata('username')){
		   echo "<script language=javascript>
				 alert('Anda tidak berhak mengakses halaman ini!');
				 window.location='" . base_url('login') . "';
				 </script>";
		}
 	} 
 
  	public function index(){
  		$data['judul'] = $this->data['judul']; 
  		$data['konten'] = 'barang_keluar/barang_keluar_view';
  		$this->load->view('template_view',$data);		
     
  	} 
 
  	public function fetch_barang_keluar(){  
       $getdata = $this->m_barang_keluar->fetch_barang_keluar();
       echo json_encode($getdata);   
	}
      
	public function get_data_edit(){
		$id = $this->uri->segment(3);
		$sql = "select a.*,b.nama_barang,c.nama_kategori from t_keluar a 
		left join m_barang b on b.id = a.id_barang 
		left join m_kategori c on c.id  = b.id_kategori  where a.id = '".$id."' ";

		$get = $this->db->query($sql)->row();
		echo json_encode($get,TRUE);
	}
	 
	public function hapus_data(){
		$id = $this->uri->segment(3);  
		
		//cek_available
		$sqdata = $this->db->where('id',$id)->get('t_keluar')->row();
	 

		$this->db->query("update m_barang set qty=qty+'".$sqdata->trans_out."' where id = '".$sqdata->id_barang."' ");
   		$sqlhapus = $this->m_barang_keluar->hapus_data($id);
		
		if($sqlhapus){
			$result = array("response"=>array('message'=>'success'));
		}else{
			$result = array("response"=>array('message'=>'failed'));
		}
		
		echo json_encode($result,TRUE);
	}
	 
	public function simpan_data(){
    
    
    $data_form = $this->m_barang_keluar->array_from_post($this->daftar_field);
	$data_form['user_insert'] = $this->session->userdata('userid');
	$data_form['date_insert'] = date("Y-m-d H:i:s");
    $id = isset($data_form['id']) ? $data_form['id'] : NULL; 
 
	// $sql_save = $this->db->query("insert into t_keluar (id_barang,trans_out,keterangan,user_insert,date_insert) values ('".$data_form['id']."')");
    $simpan_data = $this->m_barang_keluar->simpan_data($data_form,$this->nama_tabel,$this->primary_key,$id);
	$this->db->query("update m_barang set qty = qty-'".$data_form['trans_out']."' where id = '".$data_form['id_barang']."' ");
		if($simpan_data){
			$result = array("response"=>array('message'=>'success'));
		}else{
			$result = array("response"=>array('message'=>'failed'));
		}
		
		echo json_encode($result,TRUE);

	}
 
  
       


}
