<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class M_barang_masuk extends Parent_Model { 
  
     var $nama_tabel = 't_masuk';
     var $daftar_field = array('id','id_barang','trans_in','keterangan','user_insert','date_insert');
     var $primary_key = 'id'; 
  
	  
  public function __construct(){
        parent::__construct();
        $this->load->database();
  }
  
  public function fetch_barang_masuk(){
       $sql = "select a.*,b.nama_barang,c.nama_kategori from t_masuk a 
       left join m_barang b on b.id = a.id_barang 
       left join m_kategori c on c.id  = b.id_kategori ";
               
		   $getdata = $this->db->query($sql)->result();
		   $data = array();  
		   $no = 1;
           foreach($getdata as $row)  
           {  
                $sub_array = array();  
 
                $sub_array[] = $row->nama_barang;   
                $sub_array[] = $row->trans_in;   
                $sub_array[] = $row->date_insert; 
                $sub_array[] = $row->keterangan; 
                $sub_array[] = '<a href="javascript:void(0)" class="btn btn-default btn-xs waves-effect" id="edit" onclick="Detail('.$row->id.');" > <i class="material-icons">aspect_ratio</i> Detail </a>  &nbsp; 
                <a href="javascript:void(0)" id="delete" class="btn btn-danger btn-xs waves-effect" onclick="Hapus_Data('.$row->id.');" > <i class="material-icons">delete</i> Hapus </a>  &nbsp;';  
                
                $data[] = $sub_array;  
                $no++;
           }  
          
		   return $output = array("data"=>$data);
		    
    }
  
 
}
