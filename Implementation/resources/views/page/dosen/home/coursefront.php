<div class="page_content">
  <div class="page-head">
    <!-- BEGIN PAGE TITLE -->
    <div class="page-title">
      <h1>Pemrograman Internet
        <small>Halaman Depan Mata Kuliah Pemrograman Internet</small>
      </h1>
    </div>
  </div>
  <div class="clearfix">&nbsp;</div>
  <div class="row">
    <div class="col-md-12">
      <div class="portlet light bordered">
        <div class="portlet-title">
            <div class="caption">
                <i class="icon-bubble font-green-sharp"></i>
                <span class="caption-subject font-green-sharp sbold">Deskripsi Mata Kuliah</span>
            </div>
            <div class="actions">
                <div class="btn-group">
                    <a class="btn green-haze btn-outline btn-circle btn-sm" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> Actions <i class="fa fa-angle-down"></i> </a>
                    <ul class="dropdown-menu pull-right">
                        <li> <a href="javascript:;"> Edit Deskripsi </a> </li>                        
                    </ul>
                </div>
            </div>
        </div>
        <div class="portlet-body">
            <p> At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique. </p>
            <p> Aet accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum. At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et. </p>
        </div>
    </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-8">
      <a href="#post_form" class="btn btn-large btn-block blue" data-toggle="modal">
        <b> <i class="icon icon-plus"></i> Postingan Baru </b></a>
        <div id="post_form" class="modal fade" tabindex="-1" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                      <h4 class="modal-title">Postingan Berita Terbaru</h4>
                  </div>
                  <div class="modal-body">                      
                    <div class="row">
                        <form role="form" style="padding: 0px 10px;">
                            <div class="form-body" style="margin:0px; padding:0px;">
                                <div class="form-group form-md-line-input form-md-floating-label">
                                    <textarea class="form-control" rows="3"></textarea>
                                    <label for="form_control_1">Apa yang anda pikirkan</label>
                                </div>                    
                            </div>                                  
                        </form>
                    </div>
                  </div>
                  <div class="modal-footer">
                      <button type="button" data-dismiss="modal" class="btn yellow">Tutup</button>
                      <button type="button" class="btn green">Posting</button>
                  </div>
              </div>
          </div>
      </div>      
      <div class="portlet box green">
        <div class="portlet-title">
          <div class="caption"> <i class="fa fa-gift"></i>Posting Terbaru</div>
          <div class="tools">
            <a title="" data-original-title="" href="javascript:;" class="collapse"> </a>
            <a title="" data-original-title="" href="#portlet-config" data-toggle="modal" class="config"> </a>
          </div>            
        </div>
        <div style="display: block;" class="portlet-body <?php if($data != 'Pemrograman Internet') echo "portlet-collapsed"; ?>">
          <div class="mt-comments">
            <?php for($i = 0; $i < 12; $i++): ?>
            <div class="mt-comment">
              <div class="mt-comment-img"> <img src="../assets/pages/media/users/avatar4.jpg"> </div>
              <div class="mt-comment-body">
                <div class="mt-comment-info">
                  <span class="mt-comment-author">Michael Baker</span>
                  <span class="mt-comment-date">26 Feb, 10:30AM</span>
                </div>
                <div class="mt-comment-text"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy. </div>
                <div class="mt-comment-details">
                  <a href="javascript:;">
                  <span class="mt-comment-status mt-comment-status-pending"><?php echo rand(3, 24); ?> Komentar</span>
                  </a>
                  <ul class="mt-comment-actions">                                
                    <li> <a href="#">Edit</a> </li>
                    <li> <a href="#">Hapus</a> </li>
                  </ul>
                </div>
              </div>                    
            </div>
            <?php endfor; ?>
          </div>
        </div>
      </div>      

    </div>

    <div class="col-md-4">
      <!-- Here goes the widgets --> 
      <?php include "_course_widgets.php"; ?>
  </div>
</div>