<div class="content">
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="purple">
                    <i class="material-icons">assignment</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">List Gudang | <a href="<?= base_url().'createnewgudang' ?>"> Add New <i class="material-icons">note_add</i> </a></h4>
                    <div class="toolbar">
                        <!--        Here you can write extra buttons/actions for the toolbar              -->
                    </div>
                    <div class="material-datatables">
                        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                                <tr>
                                    <!-- <th></th> -->
                                    <th>Nama Gudang</th>
                                    <th>Status</th>
                                    <th class="disabled-sorting text-right">Actions</th>
                                </tr>
                            </thead>
                            <!-- <tfoot>
                                <tr> -->
                                    <!-- <th></th> -->
                                    <!-- <th>Nama Barang</th>
                                    <th>Jenis</th>
                                    <th>Harga (Rp .)</th>
                                    <th>Stock</th>
                                    <th>Status</th>
                                    <th class="disabled-sorting text-right">Actions</th>
                                </tr>
                            </tfoot> -->
                            <tbody>
                            <?php
                            if($datagudang != NULL): ?>
                            <?php foreach($datagudang as $value): ?>
                                <tr>
                                    <td><?= $value['nama'] ?></td>
                                    <td><?= ($value['status'] == 1 ? '<span class="text-success"> Aktif </span>':'<span class="text-danger"> Tidak Aktif </span>') ?></td>
                                    <td class="text-right">
                                        <a href="#" id="<?= $value['id'] ?>" types="menghapus" class="btn btn-simple btn-danger btn-icon toggleStatus"><i class="material-icons">delete</i></a>
                                        <a href="#" id="<?= $value['id'] ?>" types="mengubah" class="btn btn-simple <?= ($value['status'] == 1 ? 'btn-success':'btn-danger') ?> btn-icon toggleStatus"><i class="material-icons">power_settings_new</i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            <?php else: ?>
                            <?php endif;?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- end content-->
            </div>
            <!--  end card  -->
        </div>
        <!-- end col-md-12 -->
    </div>
    <!-- end row -->
</div>
</div>
