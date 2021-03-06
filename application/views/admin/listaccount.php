            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-icon" data-background-color="purple">
                                    <i class="material-icons">person</i>
                                </div>
                                <div class="card-content">
                                    <h4 class="card-title">List Account <a href="<?= base_url().'createaccount' ?>"> <i class="material-icons">addperson</i> </a></h4>
                                    <div class="toolbar">
                                        <!--        Here you can write extra buttons/actions for the toolbar              -->
                                    </div>
                                    <div class="material-datatables">
                                        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Username</th>
                                                    <th>Email</th>
                                                    <th>Telepon</th>
                                                    <th>Status</th>
                                                    <th>Linked</th>
                                                    <th class="disabled-sorting text-right">Actions</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Username</th>
                                                    <th>Email</th>
                                                    <th>Telepon</th>
                                                    <th>Status</th>
                                                    <th>Linked</th>
                                                    <th class="disabled-sorting text-right">Actions</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                <?php if($data_account != NULL): ?>

                                                    <?php foreach($data_account as $value): ?>
                                                        <tr>
                                                            <td><?= $value->username ?></td>
                                                            <td> <?= $value->email ?> </td>
                                                            <td><?= $value->telepon ?></td>
                                                            <td><?= ($value->status == 1 ? '<span class="text-success"> Aktif </span>':'<span class="text-danger"> Tidak Aktif </span>') ?></td>
                                                            <td><?= $gudang[$value->gudang] ?></td>
                                                            <td class="text-right">
                                                                <a href="<?= base_url() . 'editaccount' ?>?id=<?=$value->id?>" class="btn btn-simple btn-info btn-icon"><i class="material-icons">create</i></a>
                                                                <a href="#" types="mengubah" id="<?= $value->id ?>" class="btn btn-simple <?= ($value->status == 1 ? 'btn-success':'btn-danger') ?> btn-icon toggleStatususer"><i class="material-icons">power_settings_new</i></a>
                                                                <a href="#" types="menghapus" id="<?= $value->id ?>"class="btn btn-simple btn-danger btn-icon toggleStatususer"><i class="material-icons">delete</i></a>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach;?>

                                               

                                                <?php else:?>
                                                
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
