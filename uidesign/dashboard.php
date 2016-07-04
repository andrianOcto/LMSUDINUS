<div class="page_content">
  <div class="page-head">
    <!-- BEGIN PAGE TITLE -->
    <div class="page-title">
      <h1>Beranda
        <small>Beranda Learning Management System</small>
      </h1>
    </div>
  </div>
  <div class="clearfix">&nbsp;</div>
  <div class="row">
    <div class="col-md-8">
      <?php 
        $matkul = array("Pemrograman Internet", "Basis Data", "Perancangan Perangkat Lunak");
        foreach ($matkul as $data) :
      ?>
      <div class="portlet box green">
        <div class="portlet-title">
          <div class="caption"> <i class="fa fa-gift"></i><?php echo $data; ?></div>
          <div class="tools">
            <a title="" data-original-title="" href="javascript:;" class="collapse"> </a>
            <a title="" data-original-title="" href="#portlet-config" data-toggle="modal" class="config"> </a>
          </div>            
        </div>
        <div style="display: block;" class="portlet-body <?php if($data != 'Pemrograman Internet') echo "portlet-collapsed"; ?>">
          <div class="mt-comments">
            <div class="mt-comment">
              <div class="mt-comment-img"> <img src="../assets/pages/media/users/avatar4.jpg"> </div>
              <div class="mt-comment-body">
                <div class="mt-comment-info">
                  <span class="mt-comment-author">Michael Baker</span>
                  <span class="mt-comment-date">26 Feb, 10:30AM</span>
                </div>
                <div class="mt-comment-text"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy. </div>
                <div class="mt-comment-details">
                  <span class="mt-comment-status mt-comment-status-pending">3 Komentar</span>                            
                  <ul class="mt-comment-actions">                                
                    <li> <a href="#">Edit</a> </li>
                    <li> <a href="#">Hapus</a> </li>
                  </ul>
                </div>
              </div>                    
            </div>

            <div class="mt-comment">
              <div class="mt-comment-img"> <img src="../assets/pages/media/users/avatar4.jpg"> </div>
              <div class="mt-comment-body">
                <div class="mt-comment-info">
                  <span class="mt-comment-author">Michael Baker</span>
                  <span class="mt-comment-date">26 Feb, 10:30AM</span>
                </div>
                <div class="mt-comment-text"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy. </div>
                <div class="mt-comment-details">
                  <span class="mt-comment-status mt-comment-status-pending">3 Komentar</span>                            
                  <ul class="mt-comment-actions">                                
                    <li> <a href="#">Edit</a> </li>
                    <li> <a href="#">Hapus</a> </li>
                  </ul>
                </div>
              </div>                    
            </div>
          </div>
        </div>
      </div>
      <?php endforeach; ?>

    </div>

    <div class="col-md-4">
      <!-- Here goes the widgets --> 
      <?php include "_widgets.php"; ?>
  </div>
</div>
