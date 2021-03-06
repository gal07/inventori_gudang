<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">

                        <div class="card">
                        <h4 class="col-sm-2">Jenis Action</h4>
                            <div class="col-md-10 col-sm-3">
                                <select class="selectpicker" name="jenis_action" id="jenis_action" data-style="btn btn-rose btn-round" title="Single Select" data-size="7">
                                    <option disabled>Pilih Jenis</option>
                                    <?php if($this->session->userdata('role') == 1):?>
                                        <option value="baru" selected >Barang Baru</option>
                                    <?php elseif($this->session->userdata('role') == 2): ?>
                                        <option value="masuk" selected>Barang Masuk</option>
                                    <?php endif;?>
                                </select>
                            </div>
                        </div>
            
                        <div class="card">

                        <?php if($_isdelete['_isdelete'] == 1 && $this->session->userdata('role') == 1 ): ?>
                            <h5 class="text-center"><?= 'Gudang ini telah di dihapus, hubungin admin.' ?></h5>
                        <?php elseif($_isactive['_isactive'] == 0 && $this->session->userdata('role') == 2 ): ?>
                            <h5 class="text-center"><?= 'Gudang ini sedang di non aktifkan, hubungin admin.' ?></h5>
                        <?php else: ?>


                            <?php if($this->session->userdata('role') == 2): ?>
                            <form style="display:block" method="get" action="#" id="form-create-barang2" class="form-horizontal" enctype="multipart/form-data">
                                <div class="card-header card-header-text" data-background-color="rose">
                                    <h4 class="card-title"> Create Barang Masuk (Sudah Ada)</h4>
                                </div>
                                <div class="card-content">
                                    <div class="row">
                                        <label class="col-sm-2 label-on-left">Nama Barang</label>
                                        <div class="col-md-10 col-sm-3">
                                            <select required class="selectpicker" name="nama_barang" id="nama_barang" data-style="btn btn-rose btn-round" title="Single Select" data-size="7">
                                                <option disabled selected>Pilih Barang</option>
                                                <?php foreach($databarang as $value): ?>
                                                <option value="<?= $value["id"] ?>" <?= ($idbarangmasuk == $value["id"] ? 'selected':'') ?> ><?= $value["nama_barang"] ?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- <div class="row">
                                        <label class="col-sm-2 label-on-left">Jenis Barang</label>
                                        <div class="col-md-10 col-sm-3">
                                            <select required class="selectpicker" name="jenis" id="jenis" data-style="btn btn-rose btn-round" title="Single Select" data-size="7">
                                                <option disabled selected>Pilih Jenis</option>
                                                <option value="Alat Perkantoran">Alat Perkantoran</option>
                                                <option value="Alat Elektronik">Elektronik</option>
                                            </select>
                                        </div>
                                    </div> -->

                                    <div class="row">
                                        <label class="col-sm-2 label-on-left">Deskripsi</label>
                                        <div class="col-md-10 col-sm-3">
                                                <label class="control-label"></label>
                                                <input required type="text" id="description" name="description" class="form-control" value>
                                        </div>
                                    </div>
                                   

                                    <div class="row">
                                        <label class="col-sm-2 label-on-left">Quantity</label>
                                        <div class="col-sm-10">
                                            <div class="form-group label-floating is-empty">
                                                <label class="control-label"></label>
                                                <input required type="number" id="stock" name="stock" class="form-control" value>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-rose">Submit</button>
                                </div>
                            </form>
                            
                            <?php elseif($this->session->userdata('role') == 1): ?>
                            <form style="display:block" method="get" action="#" id="form-create-barang" class="form-horizontal" enctype="multipart/form-data">
                                <div class="card-header card-header-text" data-background-color="rose">
                                    <h4 class="card-title"> Create Barang Baru (Data Baru) </h4>
                                </div>
                                <div class="card-content">
                                    <div class="row">
                                        <label class="col-sm-2 label-on-left">Nama Barang</label>
                                        <div class="col-sm-10">
                                            <div class="form-group label-floating is-empty">
                                                <label class="control-label"></label>
                                                <input required type="text" name="nama_barang" id="nama_barang" class="form-control" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 label-on-left">Jenis Barang</label>
                                        <div class="col-md-10 col-sm-3">
                                            <select required class="selectpicker" name="jenis" id="jenis" data-style="btn btn-rose btn-round" title="Single Select" data-size="7">
                                                <option disabled selected>Pilih Jenis</option>
                                                <option value="Alat Perkantoran">Alat Perkantoran</option>
                                                <option value="Alat Elektronik">Elektronik</option>
                                            </select>
                                        </div>
                                    </div>
                                   

                                    <div class="row">
                                        <label class="col-sm-2 label-on-left">Harga</label>
                                        <div class="col-sm-10">
                                            <div class="form-group label-floating is-empty">
                                                <label class="control-label"></label>
                                                <input required type="number" id="harga" name="harga" class="form-control" value>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-2 label-on-left">Stock</label>
                                        <div class="col-sm-10">
                                            <div class="form-group label-floating is-empty">
                                                <label class="control-label"></label>
                                                <input required type="number" id="stock" name="stock" class="form-control" value>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-2 label-on-left">Status</label>
                                        <div class="col-md-10 col-sm-3">
                                            <select required class="selectpicker" name="status" id="status" data-style="btn btn-rose btn-round" title="Single Select" data-size="7">
                                                <option disabled selected>Pilih Status</option>
                                                <option value="1">Aktif</option>
                                                <option value="0">Tidak Aktif</option>
                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                    <label class="col-sm-2 label-on-left">Gambar</label>
                                    <div class="col-md-4 col-sm-4">
                                            <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail">
                                                    <img src="<?= base_url() ?>assets/img/image_placeholder.jpg" alt="...">
                                                </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                                <div>
                                                    <span class="btn btn-rose btn-round btn-file">
                                                        <span class="fileinput-new">Select image</span>
                                                        <span class="fileinput-exists">Change</span>
                                                        <input required type="file" name="picture" />
                                                    </span>
                                                    <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-rose">Submit</button>
                                </div>
                            </form>
                            <?php endif; ?>


                        <?php endif; ?>

                        </div>
                    </div>
                </div>
            </div>

