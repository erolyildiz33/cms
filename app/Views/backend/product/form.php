<?php echo $this->extend('layout/admin/admin_layout');
echo $this->section('content');
$session = session()->getFlashdata('validation');
$updateError=session()->getFlashdata('updateError');
?>
<div class="row">
    <div class="col-md-12 " style="padding-right: 2rem!important; padding-bottom: 10px;">
        <h4 class="m-b-lg"><?=(!$finditem)?display('newprooduct'):display('updateproduct')?></h4>
        <a href="<?= base_url('admin/product') ?>" class="btn btn-outline btn-primary btn-xs pull-right"
           style="margin-top: -19px;right: 2.2rem;position: absolute;"> <i
                    class="fa fa-arrow-left"></i> <?php echo display('alllist') ?></a>

    </div><!-- END column -->
    <div class="col-md-12" style="padding-right: 2rem!important;">

        <div class="widget">

            <div class="widget-body">

                <form action="<?php echo base_url('admin/product/form'); ?>" method="post"
                      enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <?=($finditem)?"<input type='hidden' name='update' value='".$finditem->id."'>":""?>
                    <div class="form-group  <?= ($session) ? 'has-warning' : '' ?>">
                        <label><?php echo display('title') ?></label>
                        <input type="text" class="form-control  " id="title" name="title" value="<?=($finditem)?$finditem->title:''?>"
                               style=" <?= ($session) ? 'border-color: #dc3545;' : '' ?>"
                               placeholder="<?= (($session)) ? display('holdertitlerequired') : display('holdertitle') ?>">

                    </div>
                    <div class="form-group">
                        <label><?php echo display('description') ?></label>
                        <textarea name="description" class="m-0" data-plugin="summernote"
                                  data-options="{height: 250}"><?=($finditem)?$finditem->description:''?></textarea>
                    </div>
                    <button type="submit"
                            class="btn btn-primary btn-md btn-outline"><?=($finditem|$updateError)?display('update'):display('submit')?></button>
                    <a href="<?php echo base_url('admin/product') ?>"
                       class="btn btn-danger btn-outline"><?php echo display('cancel') ?></a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>
<?php echo $this->endSection(); ?>
