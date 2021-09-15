 
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
                              Report Stok
                            </h2>
                             
 
                        </div>
                        <div class="body">
                                <form action="<?php echo base_url('report_stok/print'); ?>" method="POST" target="_blank">
                                    <button type="submit" class="btn btn-primary btn-block"> <i class="material-icons">print</i> Generate Report stok </button>
                                </form> 
  
                        </div>
                    </div>
                </div>
            </div>
         


        </div>
    </section>  
   <script type="text/javascript"> 
          
         $('.datepicker').bootstrapMaterialDatePicker({
        format: 'YYYY-MM-DD',
        clearButton: true,
        weekStart: 1,
        time: false
     });
         
    </script>