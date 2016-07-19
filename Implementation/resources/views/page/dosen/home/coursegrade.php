<div class="page_content">
  <div class="page-head">
    <!-- BEGIN PAGE TITLE -->
    <div class="page-title">
      <h1>Pemrograman Internet
        <small>Gradebook mata kuliah pemrograman Internet</small>
      </h1>
    </div>
  </div>
  <div class="clearfix">&nbsp;</div>
  <div class="row">
    <div class="col-md-12">
      <div class="portlet light bordered">
        <div class="portlet-title">
            <div class="caption font-dark">
                <i class="icon-settings font-dark"></i>
                <span class="caption-subject bold uppercase">Nilai Tugas Mata Kuliah Pemrograman Internet</span>
            </div>
            <div class="tools"> </div>
        </div>
        <div class="portlet-body">
            <table class="table table-striped table-bordered table-hover" id="datatable_ajax">
                <thead>
                    <tr role="row" class="heading">
                        <th style="min-width: 200px;"> Nama Mahasiswa </th>
                        <th> Upload </th>
                        <th> CodeCa... </th>
                        <th> Bootst... </th>
                        <th> Full P... </th>
                        <th> Total </th>
                    </tr>                    
                    <tr role="row" class="filter">                        
                        <td> </td>                        
                        <td>
                          <input type="text" class="form-control form-filter input-sm" id="percent1">
                        </td>
                        <td>
                          <input type="text" class="form-control form-filter input-sm" id="percent2"> 
                        </td>
                        <td>
                          <input type="text" class="form-control form-filter input-sm" id="percent3"> 
                        </td>
                        <td>
                          <input type="text" class="form-control form-filter input-sm" id="percent4"> 
                        </td>
                        <td>
                          <input type="text" class="form-control form-filter input-sm" id="precent100"> 
                        </td>
                    </tr>
                </thead>
                <tbody>
                  <?php for($i = 0; $i < 40; $i++):?>
                    <tr>
                        <td> Nama Mahasiswa <?php echo $i; ?> </td>
                        <td style="text-align: center;"> <?php echo rand(50, 100); ?> </td>
                        <td style="text-align: center;"> <?php echo rand(50, 100); ?> </td>
                        <td style="text-align: center;"> <?php echo rand(50, 100); ?> </td>
                        <td style="text-align: center;"> <?php echo rand(50, 100); ?> </td>
                        <td style="text-align: center;"> <?php echo rand(70, 100); ?> </td>
                    </tr>
                  <?php endfor; ?>
                </tbody>
            </table>
        </div>
    </div>
    </div>
  </div>  
</div>
