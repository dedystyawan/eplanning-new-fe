<?php $this->load->view('module/rbb/rkf/detail_rkf') ?>
<form method="post" action="" class="form-horizontal" enctype="multipart/form-data">
  <div class="row">
    <div class="col-lg-10 col-lg-offset-1">
      <div class="hpanel hred">
        <div class="panel-heading">
          <h3><strong>Catatan Untuk review...</strong></h3>
        </div>
        <div class="panel-body">
          <div class="form-group">
            <textarea rows="6" class="col-md-12" style="max-width: 100%;" name="rkfCatatanReview" placeholder="Catatan RKF..." ><?= $data->rkf_note_otor ?></textarea>
          </div>
          <div class="col-md-6"><button type="submit" name="submit" value='0' class="btn btn-warning btn-block"><i class="fa fa-reply pull-center"></i>&nbsp;&nbsp;Review</button></div>
          <div class="col-md-6"><button type="submit" name="submit" value='2' class="btn btn-success btn-block"><i class="fa fa-floppy-o pull-center"></i>&nbsp;&nbsp;Approve</button></div>
        </div>
      </div>
    </div>
  </div>
</form>