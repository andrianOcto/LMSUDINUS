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
      <div id="comment_list" class="modal fade">
        <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Komentar: Lorem Ipsum is simply dummy text of the ...</h4>
              </div>
              <div class="modal-body">                      
                <div class="row">
                  <div class="col-md-12">
                    <div class="mt-comments">
                      <div class="mt-comment">
                          <div class="mt-comment-img">
                              <img src="../assets/pages/media/users/avatar1.jpg"> </div>
                          <div class="mt-comment-body">
                              <div class="mt-comment-info">
                                  <span class="mt-comment-author">Michael Baker</span>
                                  <span class="mt-comment-date">26 Feb, 10:30AM</span>
                              </div>
                              <div class="mt-comment-text"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. </div>
                              <div class="mt-comment-details">
                                <ul class="mt-comment-actions">
                                  <li> <a href="#">Delete</a> </li>
                                </ul>
                              </div>
                          </div>
                      </div>
                      <div class="mt-comment">
                          <div class="mt-comment-img">
                              <img src="../assets/pages/media/users/avatar6.jpg"> </div>
                          <div class="mt-comment-body">
                              <div class="mt-comment-info">
                                  <span class="mt-comment-author">Larisa Maskalyova</span>
                                  <span class="mt-comment-date">12 Feb, 08:30AM</span>
                              </div>
                              <div class="mt-comment-text"> It is a long established fact that a reader will be distracted. </div>
                              <div class="mt-comment-details">
                                <ul class="mt-comment-actions">
                                  <li> <a href="#">Delete</a> </li>
                                </ul>
                              </div>
                          </div>
                      </div>
                      <div class="mt-comment">
                          <div class="mt-comment-img">
                              <img src="../assets/pages/media/users/avatar8.jpg"> </div>
                          <div class="mt-comment-body">
                              <div class="mt-comment-info">
                                  <span class="mt-comment-author">Natasha Kim</span>
                                  <span class="mt-comment-date">19 Dec,09:50 AM</span>
                              </div>
                              <div class="mt-comment-text"> The generated Lorem or non-characteristic Ipsum is therefore or non-characteristic. </div>
                              <div class="mt-comment-details">
                                <ul class="mt-comment-actions">
                                  <li> <a href="#">Delete</a> </li>
                                </ul>
                              </div>
                          </div>
                      </div>
                      <div class="mt-comment">
                          <div class="mt-comment-img">
                              <img src="../assets/pages/media/users/avatar4.jpg"> </div>
                          <div class="mt-comment-body">
                              <div class="mt-comment-info">
                                  <span class="mt-comment-author">Sebastian Davidson</span>
                                  <span class="mt-comment-date">10 Dec, 09:20 AM</span>
                              </div>
                              <div class="mt-comment-text"> The standard chunk of Lorem or non-characteristic Ipsum used since the 1500s or non-characteristic. </div>
                              <div class="mt-comment-details">
                                <ul class="mt-comment-actions">
                                  <li> <a href="#">Delete</a> </li>
                                </ul>
                              </div>
                          </div>
                      </div>
                  </div>
                  </div>                  
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <form role="form" style="padding: 0px 10px;">
                      <div class="form-body" style="margin:0px; padding:0px;">
                        <div class="form-group form-md-line-input form-md-floating-label">
                          <textarea class="form-control" rows="3"></textarea>
                          <label for="form_control_1">Komentar anda ...</label>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn yellow">Tutup</button>
                <button type="button" class="btn green">Posting</button>
              </div>
          </div>
        </div>
      </div>
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
                  <a href="#comment_list" data-toggle="modal">
                  <span class="mt-comment-status mt-comment-status-pending"><?php echo rand(3, 24); ?> Komentar</span>
                  </a>
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
                  <a href="#comment_list" data-toggle="modal">
                  <span class="mt-comment-status mt-comment-status-pending"><?php echo rand(3, 24); ?> Komentar</span>
                  </a>
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
