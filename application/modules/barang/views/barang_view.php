 
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
                                Barang
                            </h2>
                            <br>
                            <a href="javascript:void(0);" id="addmodal" class="btn btn-primary waves-effect">  <i class="material-icons">add_circle</i>  Tambah Data </a>
  
                        </div>
                        <div class="body">
                                
                            <div class="table-responsive">
							   <table class="table table-bordered table-striped table-hover js-basic-example" id="example" >
  
									<thead>
										<tr> 
											<th style="width:5%;">Kategori Barang</th> 
                                            <th style="width:5%;">Nama Barang</th>      
                                            <th style="width:5%;">Qty</th>                                           
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
                                                    <input type="text" name="nama_kategori" id="nama_kategori" class="form-control" readonly="readonly" >
                                                    <input type="hidden" name="id_kategori" id="id_kategori" readonly="readonly" >
                                                    
                                                </div>
                                                <span class="input-group-addon">
                                                    <button type="button" onclick="CariKategori();" class="btn btn-primary"> Pilih Kategori... </button>
                                                </span>
                                    </div>  
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="nama_barang" id="nama_barang" class="form-control" placeholder="Nama Barang" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="qty" id="qty" class="form-control" placeholder="Qty" />
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



    <!-- modal cari kategori -->
    <div class="modal fade" id="CariKategoriModal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" >Cari Kategori</h4>
                        </div>
                        <div class="modal-body">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">X Tutup</button>

                                <br>
                                <hr>

                                 <table width="100%" class="table table-bordered table-striped table-hover " id="daftar_kategori" >
  
                                    <thead>
                                        <tr>  
                                            <th style="width:98%;">Kategori </th> 
                                         </tr>
                                    </thead> 
                                    <tbody id="daftar_kategorix">

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
                                    <td>Qty</td>
                                    <td>:</td>
                                    <td><div id="qtydtl"> </div></td>
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
			 url:"<?php echo base_url(); ?>barang/get_data_edit/"+id,
			 type:"GET",
			 dataType:"JSON", 
			 success:function(result){  
				 $("#nama_barangdtl").html(result.nama_barang);
                 $("#nama_kategoridtl").html(result.nama_kategori);
                 $("#qtydtl").html(result.qty); 
                 $("#keterangandtl").html(result.keterangan);  
                
			 }
		 });
    } 
    
   
    $('#daftar_kategori').DataTable( {
            "ajax": "<?php echo base_url(); ?>kategori_barang/fetch_kategori_barang"           
    }); 

    function CariKategori(){
        $("#CariKategoriModal").modal({backdrop: 'static', keyboard: false,show:true});
    } 
    
        var daftar_kategori = $('#daftar_kategori').DataTable();
     
        $('#daftar_kategori tbody').on('click', 'tr', function () {
            
            var content = daftar_kategori.row(this).data()
            console.log(content);
            $("#nama_kategori").val(content[0]);
            $("#id_kategori").val(content[2]);
            $("#CariKategoriModal").modal('hide');
        } );


	 function Ubah_Data(id){
		$("#defaultModalLabel").html("Form Ubah Data");
		$("#defaultModal").modal('show');
 
		$.ajax({
			 url:"<?php echo base_url(); ?>barang/get_data_edit/"+id,
			 type:"GET",
			 dataType:"JSON", 
			 success:function(result){  
				 $("#defaultModal").modal('show'); 
				 $("#id").val(result.id);
                 $("#nama_barang").val(result.nama_barang);
                 $("#qty").val(result.qty); 
                 $("#keterangan").val(result.keterangan); 
                 $("#id_kategori").val(result.id_kategori);
                 $("#nama_kategori").val(result.nama_kategori);  
			 }
		 });
	 }
 
	 function Bersihkan_Form(){
        $(':input').val(''); 
         
     }

	 function Hapus_Data(id){
		if(confirm('Anda yakin ingin menghapus data ini?'))
        {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo base_url('barang/hapus_data')?>/"+id,
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
		//setting semua data dalam form dijadikan 1 variabel 
		 var formData = new FormData($('#user_form')[0]); 
 
                 //transaksi dibelakang layar
                 $.ajax({
                 url:"<?php echo base_url(); ?>barang/simpan_data",
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
             
			"ajax": "<?php echo base_url(); ?>barang/fetch_barang"
		});


	  
		 
	  });
  
		
		 
    </script>