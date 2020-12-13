<?php echo $this->extend('layout/admin/admin_layout');
echo $this->section('content');
$session = session();

?>
    <style>
        td, th {
            text-align: center;
        }

        tr td:first-child, tr th:first-child {
            text-align: left;
        }

        tr td:last-child {
            text-align: center;
        }

        tr th:last-child {
            text-align: center;
        }
    </style>
    <div class="row">
        <div class="col-md-12 " style="padding-right: 3rem!important; padding-bottom: 10px;">
            <h4 class="m-b-lg"><?php echo display('productlist') ?></h4>
            <a href="<?= base_url('admin/product/form') ?>" class="btn btn-outline btn-primary btn-xs pull-right"
               style="margin-top: -19px;right: 3.2rem;position: absolute;"> <i
                        class="fa fa-plus"></i> <?php echo display('addnew') ?></a>

        </div><!-- END column -->
        <div class="col-md-12" style="padding-right: 3rem!important;">
            <div class="widget p-lg">
                <?php if (!$product) { ?>
                    <div class="alert alert-info text-center">
                        <p> <?= display("noitemadd") . ' <a href="/admin/product/form">' . display("click") . '</a>'; ?></p>
                    </div>
                <?php } else { ?>
                    <table class="table table-hover table-striped table-bordered" style="text-align:justify!important;">
                        <thead>
                        <th><i class="fa fa-reorder"></i></th>
                        <th><?php echo display('sr') ?></th>
                        <th><?php echo display('title') ?></th>
                        <th><?php echo display('description') ?></th>
                        <th><?php echo display('status') ?></th>
                        <th><?php echo display('action') ?></th>
                        </thead>
                        <tbody class="sortable producttable" data-url="<?= base_url() ?>/admin/product/ranksetter">
                        <?php $i = 1;
                        foreach ($product as $item) : ?>
                            <tr id="ord-<?= $item->id ?>">
                                <td><i class="fa fa-reorder"></i></td>
                                <td class="sirano"><?= $i++ ?></td>
                                <td><?= $item->title ?></td>
                                <td><?= $item->description ?></td>
                                <td><input id="<?= $item->id ?>" data-url="<?= base_url() ?>/admin/product/update"
                                           type="checkbox" class="durum" data-switchery
                                           data-color="#10c469" <?= ($item->isActive == 1) ? 'checked' : '' ?>/></td>

                                <td>
                                    <button id="<?= $item->id ?>"
                                            data-url="<?= base_url() ?>/admin/product/delete"
                                            data-sweet-title="<?= display('areyousure') ?>"
                                            data-sweet-text="<?= display('doyouwantdelete') ?>"
                                            data-confirmbuttontext="<?= display('yesdelete') ?>"
                                            data-cancelbuttontext="<?= display('no') ?>"
                                            data-sweet-deleted="<?= display('deleted') ?>"
                                            data-sweet-havedeleted="<?= display('havedeleted') ?>"
                                            class="btn btn-sm btn-danger btn-outline remove-btn">
                                        <i class="fa fa-trash"></i> <?php echo display('delete') ?>
                                    </button>
                                    <a href="/admin/product/form/<?= $item->id ?>"
                                       class="btn btn-sm btn-info btn-outline"><i
                                                class="fa fa-pencil-square-o"></i> <?php echo display('edit') ?></a>
                                    <a href="/admin/product/image-form/<?= $item->id ?>"
                                       class="btn btn-sm btn-warning btn-outline"><i
                                                class="fa fa-image"></i> <?php echo display('images') ?></a>
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


<?php $this->endSection();


