<?php echo $this->extend('layout/admin/admin_layout');
echo $this->section('content'); ?>
    <div class="row">
        <div class="col-md-12 " style="padding-right: 2rem!important; padding-bottom: 10px;">
            <h4 class="m-b-lg"><?php echo display('productlist') ?></h4>
            <a href="<?= base_url('admin/product/form') ?>" class="btn btn-outline btn-primary btn-xs pull-right"
               style="margin-top: -19px;right: 2.2rem;position: absolute;"> <i
                        class="fa fa-plus"></i> <?php echo display('addnew') ?></a>

        </div><!-- END column -->
        <div class="col-md-12" style="padding-right: 2rem!important;">
            <div class="widget p-lg">
                <?php if (empty($product)) { ?>
                    <div class="alert alert-info text-center">
                        <p><?php echo display("noitemadd") ?> <a href="#"><?php echo display("click") ?></a></p>
                    </div>
                <?php } else { ?>
                    <table class="table table-hover table-striped">
                        <thead>
                        <th><?php echo display('sr') ?></th>
                        <th><?php echo display('title') ?></th>
                        <th><?php echo display('description') ?></th>
                        <th><?php echo display('status') ?></th>
                        <th><?php echo display('action') ?></th>
                        </thead>
                        <tbody>
                        <?php $i=1; foreach ($product as $item) : ?>
                            <tr>
                                <td><?=$i++?></td>
                                <td><?= $item->title ?></td>
                                <td><?= $item->description ?></td>
                                <td><input id="<?= $item->id ?>" type="checkbox" class="durum" data-switchery
                                           data-color="#10c469" <?= ($item->isActive == 1) ? 'checked' : '' ?>/></td>

                                <td>
                                    <a href="#" class="btn btn-sm btn-danger btn-outline"><i
                                                class="fa fa-trash"></i> <?php echo display('delete') ?></a>
                                    <a href="/admin/product/form/<?=$item->id?>" class="btn btn-sm btn-info btn-outline"><i
                                                class="fa fa-pencil-square-o"></i> <?php echo display('edit') ?></a>
                                </td>
                            </tr>
                        <?php endforeach ?>

                        </tbody>

                    </table> <?php } ?>
            </div><!-- .widget -->
        </div><!-- END column -->
    </div>

<?php $security = \Config\Services::security();

?>

<?php echo $this->endSection(); ?>
<?php echo $this->section('js') ?>
    <link rel="stylesheet" href="<?php echo base_url('assets/libs/bower/switchery');?>/dist/switchery.css" />
    <script src="<?php echo base_url('assets/libs/bower/switchery');?>/dist/switchery.js"></script>



    <script>


        var changeCheckbox = document.querySelector('.durum')
        changeCheckbox.onchange = function (e) {
            e.stopImmediatePropagation()
            var id = $(this).attr('id');
            $.ajax({
                dataType: "json",
                type: "POST",
                headers: {'X-Requested-With': 'XMLHttpRequest'},
                url: '<?php  echo base_url("backend/product/update");?>',
                data: {id: id, isActive: changeCheckbox.checked,<?php echo $security->getCSRFTokenName(); ?>:
            '<?php echo $security->getCSRFHash() ?>'
        },

            success: function (data) {
                if (data) {
                    result = data;
                }
            }
        })
            ;
        };


    </script>
<?php $this->endSection();


