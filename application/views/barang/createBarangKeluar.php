<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <form method="get" action="#" id="form-create-barang" class="form-horizontal" enctype="multipart/form-data">
                                <div class="card-header card-header-text" data-background-color="rose">
                                    <h4 class="card-title"><?= $titlenavbar ?></h4>
                                </div>
                                <div class="card-content">
                                    <div class="row">
                                        <label class="col-sm-2 label-on-left">Nama Barang</label>
                                        <div class="col-md-10 col-sm-3">
                                            <select required class="selectpicker" name="jenis" id="jenis" data-style="btn btn-rose btn-round" title="Single Select" data-size="7">
                                                <option disabled selected>Pilih Barang</option>
                                                <option value="Alat Perkantoran">Alat Perkantoran</option>
                                                <option value="Alat Elektronik">Elektronik</option>
                                            </select>
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
                        </div>
                    </div>
                </div>
            </div>

