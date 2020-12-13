<?php echo $this->extend('layout/admin/admin_layout');
echo $this->section('content');
?>

<div class="row">
    <div class="col-md-12 " style="padding-right: 2rem!important; padding-bottom: 10px;">
        <h4 class="m-b-lg"><?=display('newprooductimageadd')?></h4>
        <a href="<?= base_url('admin/product') ?>" class="btn btn-outline btn-primary btn-xs pull-right"
           style="margin-top: -19px;right: 2.2rem;position: absolute;"> <i
                class="fa fa-arrow-left"></i> <?php echo display('back') ?></a>
    </div><!-- END column -->
    <div class="col-md-12" style="padding-right: 2rem!important;">
        <div class="widget">
            <div class="widget-body">
                <form action="../api/dropzone" class="dropzone" data-plugin="dropzone" data-options="{ url: '../api/dropzone'}">
                    <div class="dz-message">
                        <h4 class="m-h-lg text-muted"><?=display('dropzonetitle')?></h4></div>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>
<hr>
<div class="row">
    <div class="col-md-12 " style="padding-right: 2rem!important; padding-bottom: 10px;">
        <h4 class="m-b-lg"><?=display('newprooductimage')?></h4>

    </div><!-- END column -->
    <div class="col-md-12" style="padding-right: 2rem!important;">
        <div class="widget">
            <div class="widget-body">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                    <th>Sıra No</th>
                    <th>Ürün Adı</th>
                    <th>Resim</th>
                    <th>Durum</th>
                    <th>İşlem</th>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>Ürün Deneme</td>
                        <td><img src="" class="img-responsive" width="30"/></td>
                        <td><input id="<?= $item->id ?>" data-url="<?= base_url() ?>/admin/product/update"
                                   type="checkbox" class="durum" data-switchery
                                   data-color="#10c469" <?= ($item->isActive == 1) ? 'checked' : '' ?>/></td>
                        <td> <button id="<?= $item->id ?>"
                                     data-url="<?= base_url() ?>/admin/product/delete"
                                     data-sweet-title="<?= display('areyousure') ?>"
                                     data-sweet-text="<?= display('doyouwantdelete') ?>"
                                     data-confirmbuttontext="<?= display('yesdelete') ?>"
                                     data-cancelbuttontext="<?= display('no') ?>"
                                     data-sweet-deleted="<?= display('deleted') ?>"
                                     data-sweet-havedeleted="<?= display('havedeleted') ?>"
                                     class="btn btn-sm btn-danger btn-outline remove-btn">
                                <i class="fa fa-trash"></i> <?php echo display('delete') ?>
                            </button></td>
                    </tr>
                    </tbody>
                </table>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>
<?php echo $this->endSection(); ?>
