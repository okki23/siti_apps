 
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                 
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Barang Keluar
                            </h2>
                            <br>
                            <a href="javascript:void(0);" id="addmodal" class="btn btn-primary waves-effect">  <i class="material-icons">add_circle</i>  Tambah Data </a>
  
                        </div>
                        <div class="body">
                                
                            <div class="table-responsive">
							   <table class="table table-bordered table-striped table-hover js-basic-example" id="example" >
  
									<thead>
										<tr> 
										    <th style="width:5%;">Nama Barang</th> 
                                            <th style="width:5%;">Jumlah Keluar</th>  
                                            <th style="width:5%;">Tanggal Keluar</th>    
                                            <th style="width:5%;">Keterangan</th>                                            
                                            <th style="width:10%;">Opsi</th> 
										</tr>
									</thead> 
								</table> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         


        </div>
    </section>

   
	<!-- form tambah dan ubah data -->
	<div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Form Tambah Data</h4>
                        </div>
                        <div class="modal-body">
                              <form method="post" id="user_form" enctype="multipart/form-data">   
                                 
                                    <input type="hidden" name="id" id="id"> 
                                    <div class="input-group">
                                                <div class="form-line">
                                                    <input type="text" name="nama_barang" id="nama_barang" class="form-control" readonly="readonly" >
                                                    <input type="hidden" name="id_barang" id="id_barang" readonly="readonly" >
                                                    
                                                </div>
                                                <span class="input-group-addon">
                                                    <button type="button" onclick="CariBarang();" class="btn btn-primary"> Pilih Barang... </button>
                                                </span>
                                    </div>   
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="trans_out" id="trans_out" class="form-control" placeholder="Jumlah keluar" />
                                        </div>
                                    </div> 
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="keterangan" id="keterangan" class="form-control" placeholder="Keterangan" />
                                        </div>
                                    </div>
                                     

								   <button type="button" onclick="Simpan_Data();" class="btn btn-success waves-effect"> <i class="material-icons">save</i> Simpan</button>

                                   <button type="button" name="cancel" id="cancel" class="btn btn-danger waves-effect" onclick="javascript:Bersihkan_Form();" data-dismiss="modal"> <i class="material-icons">clear</i> Batal</button>
							 </form>
					   </div>
                     
                    </div>
                </div>
    </div>



    <!-- modal cari barang -->
    <div class="modal fade" id="CariBarangModal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" >Cari Barang</h4>
                        </div>
                        <div class="modal-body">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">X Tutup</button>

                                <br>
                                <hr>

                                 <table width="100%" class="table table-bordered table-striped table-hover " id="daftar_barang" >
  
                                    <thead>
                                        <tr>  
                                            <th style="width:98%;">Kategori Barang </th> 
                                            <th style="width:98%;">Nama Barang </th> 
                                            <th style="width:98%;">Qty </th> 
                                         </tr>
                                    </thead> 
                                    <tbody id="daftar_barangx">

                                </tbody>
                                </table> 
                       </div>
                     
                    </div>
                </div>
    </div>
 
    
     <!-- modal detail -->
     <div class="modal fade" id="DetailModal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" >Detail</h4>
                        </div>
                        <div class="modal-body">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">X Tutup</button>
                                <br>
                                <hr>
                                <table class="table table-bordered table-hovered">
                                    <tr>
                                        <td>Nama Barang</td>
                                        <td>:</td>
                                        <td><div id="nama_barangdtl"> </div></td>
                                    </tr>
                                    <tr>
                                        <td>Kategori Barang</td>
                                        <td>:</td>
                                        <td><div id="nama_kategoridtl"> </div></td>
                                    </tr> 
                                    <tr>
                                        <td>Jumlah keluar</td>
                                        <td>:</td>
                                        <td><div id="transindtl"> </div></td>
                                    </tr> 
                                    <tr>
                                        <td>Tanggal keluar</td>
                                        <td>:</td>
                                        <td><div id="dateindtl"> </div></td>
                                    </tr> 
                                    <tr>
                                        <td>Keterangan</td>
                                        <td>:</td>
                                        <td><div id="keterangandtl"> </div></td>
                                    </tr> 
                                </table>
                                 
                       </div>
                     
                    </div>
                </div>
    </div>



 

  
 
   <script type="text/javascript"> 
     

    function Detail(id){
        $("#DetailModal").modal({backdrop: 'static', keyboard: false,show:true});
 
		$.ajax({
			 url:"<?php echo base_url(); ?>barang_keluar/get_data_edit/"+id,
			 type:"GET",
			 dataType:"JSON", 
			 success:function(result){  
				 $("#nama_barangdtl").html(result.nama_barang);
                 $("#nama_kategoridtl").html(result.nama_kategori);
                 $("#transindtl").html(result.trans_out);
                 $("#dateindtl").html(result.date_insert); 
                 $("#keterangandtl").html(result.keterangan);  
                
			 }
		 });
    } 
    
   
    $('#daftar_barang').DataTable( {
            "ajax": "<?php echo base_url(); ?>barang/fetch_barangx"           
    }); 

    function CariBarang(){
        $("#CariBarangModal").modal({backdrop: 'static', keyboard: false,show:true});
    } 
    
        var daftar_barang = $('#daftar_barang').DataTable();
     
        $('#daftar_barang tbody').on('click', 'tr', function () {
            
            var content = daftar_barang.row(this).data() 
            $("#nama_barang").val(content[1]);
            $("#id_barang").val(content[3]);
            $("#CariBarangModal").modal('hide');
        } );
 
 
	 function Bersihkan_Form(){
        $(':input').val(''); 
         
     }

	 function Hapus_Data(id){
		if(confirm('Anda yakin ingin menghapus data ini?'))
        {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo base_url('barang_keluar/hapus_data')?>/"+id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
			   
               $('#example').DataTable().ajax.reload(); 
			   
			    $.notify("Data berhasil dihapus!", {
					animate: {
						enter: 'animated fadeInRight',
						exit: 'animated fadeOutRight'
					}  
				 },{
					type: 'success'
					});
				 
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });
   
    }
	}
    
      
  
	function Simpan_Data(){ 
		 var formData = new FormData($('#user_form')[0]);  
                 $.ajax({
                 url:"<?php echo base_url(); ?>barang_keluar/simpan_data",
                 type:"POST",
                 data:formData,
                 contentType:false,  
                 processData:false,   
                 success:function(result){ 
                    
                     $("#defaultModal").modal('hide');
                     $('#example').DataTable().ajax.reload(); 
                     $('#user_form')[0].reset();
                     Bersihkan_Form();
                     
                     $.notify("Data berhasil disimpan!", {
                        animate: {
                            enter: 'animated fadeInRight',
                            exit: 'animated fadeOutRight'
                     } 
                     },{
                        type: 'success'
                    });
                 }
                }); 
 
 
         

	}
      
	 
       $(document).ready(function() {
		   
		$("#addmodal").on("click",function(){
			$("#defaultModal").modal({backdrop: 'static', keyboard: false,show:true});
            $("#method").val('Add');
            $("#defaultModalLabel").html("Form Tambah Data");
		});

        var dateObj = new Date();
        var month = dateObj.getUTCMonth() + 1; //months from 1-12
        var day = dateObj.getUTCDate();
        var year = dateObj.getUTCFullYear();
 
		 
		$('#example').append('<caption style="caption-side: top">   </caption>');
		$('#example').DataTable({ 
			"ajax": "<?php echo base_url(); ?>barang_keluar/fetch_barang_keluar",  
		});


	  
		 
	  });
  
		
		 
    </script>