<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class M_report_stok extends Parent_Model { 
  
     var $nama_tabel = 'm_barang';
     var $daftar_field = array('id','nama_barang','id_kategori','qty','keterangan');
     var $primary_key = 'id'; 
  
    
  public function __construct(){
        parent::__construct();
        $this->load->database();
  }


  public function fetch_report_stok(){
      
       $getdata = $this->db->get('m_report_stok')->result();
       $data = array();  
      
           foreach($getdata as $row)  
           {  
                $sub_array = array();  
             
                $sub_array[] = $row->nama_report_stok;   
                $sub_array[] = '<a href="javascript:void(0)" class="btn btn-warning btn-xs waves-effect" id="edit" onclick="Ubah_Data('.$row->id.');" > <i class="material-icons">create</i> Ubah </a>  &nbsp; <a href="javascript:void(0)" id="delete" class="btn btn-danger btn-xs waves-effect" onclick="Hapus_Data('.$row->id.');" > <i class="material-icons">delete</i> Hapus </a>';  
                $sub_array[] =  $row->id;
                $data[] = $sub_array;  
              
           }  
          
       return $output = array("data"=>$data);
        
  } 
  
   
 
}
