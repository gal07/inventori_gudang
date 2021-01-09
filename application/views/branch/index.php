<div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-icon" data-background-color="purple">
                                    <i class="material-icons">assignment</i>
                                </div>
                                <div class="card-content">
                                    <h4 class="card-title">List Barang</h4>
                                    <div class="toolbar">
                                        <!--        Here you can write extra buttons/actions for the toolbar              -->
                                    </div>
                                    <div class="material-datatables">
                                        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <!-- <th></th> -->
                                                    <th>Nama Barang</th>
                                                    <th>Jenis</th>
                                                    <th>Harga (Rp .)</th>
                                                    <th>Stock</th>
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
                                            if($datainventory != NULL): ?>
                                            <?php foreach($datainventory as $value): ?>
                                                <tr>
                                                    <!-- <td> <img src="<?= base_url().'assets/picture/'.$value['picture'] ?>"> </td> -->
                                                    <td><?= $databarang[$value['id_barang']]['nama_barang'] ?></td>
                                                    <td><?= $databarang[$value['id_barang']]['jenis'] ?></td>
                                                    <td><?= 'Rp '.number_format($databarang[$value['id_barang']]['harga'],0) ?></td>
                                                    <td><?= $value['qty'] ?></td>
                                                    <td><?= ($databarang[$value['id_barang']]['active'] == 1 ? '<span class="text-success"> Aktif </span>':'<span class="text-danger"> Tidak Aktif </span>') ?></td>
                                                    <td class="text-right">
                                                        <a href="<?= base_url().'createbarangmasuk?idbarang='.$value['id_barang'] ?>" id="<?= $value['status'] ?>" class="btn btn-simple btn-success btn-icon"><i class="material-icons">add_circle_outline</i></a>
                                                        <a href="<?= base_url().'createbarangkeluar?idbarang='.$value['id_barang'] ?>" id="<?= $value['status'] ?>" class="btn btn-simple btn-warning btn-icon"><i class="material-icons">remove_circle_outline</i></a>
                                                        <a href="#" id="<?= $value['status'] ?>" class="btn btn-simple btn-danger btn-icon hpsBarang"><i class="material-icons">close</i></a>
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
