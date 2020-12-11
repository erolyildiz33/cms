<?php echo $this->extend('layout/admin/admin_layout');
echo $this->section('content'); ?>
<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg"><?php echo display('productlist') ?></h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget p-lg">

            <table class="table table-hover table-striped">

                <thead>
                <th><?php echo display('sr') ?></th>

                <th><?php echo display('title') ?></th>
                <th><?php echo display('description') ?></th>
                <th><?php echo display('status') ?></th>
                <th><?php echo display('action') ?></th>
                </thead>
                <tbody>
                <tr>
                    <td>#1</td>
                    <td>monitor-askisi</td>
                    <td>Monitör Askısı</td>
                    <td>360 derece kullanılabilen monitör askısıdır..</td>
                    <td>1/0</td>
                    <td>
                        <a href="#" class="btn btn-sm btn-danger btn-outline"><i
                                    class="fa fa-trash"></i> <?php echo display('delete') ?></a>
                        <a href="#" class="btn btn-sm btn-info btn-outline"><i
                                    class="fa fa-pencil-square-o"></i> <?php echo display('edit') ?></a>
                    </td>
                </tr>

                </tbody>

            </table>
        </div><!-- .widget -->
    </div><!-- END column -->
</div>


<?php echo $this->endSection(); ?>


