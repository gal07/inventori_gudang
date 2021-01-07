<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <form method="get" action="#" letsgo="edit" userID="<?= $datauser[0]->id ?>" id="form-create-account" class="form-horizontal">
                                <div class="card-header card-header-text" data-background-color="rose">
                                    <h4 class="card-title">Edit Account</h4>
                                </div>
                                <div class="card-content">
                                    <div class="row">
                                        <label class="col-sm-2 label-on-left">Username</label>
                                        <div class="col-sm-10">
                                            <div class="form-group label-floating is-empty">
                                                <label class="control-label"></label>
                                                <input required type="text" name="username" id="username" class="form-control" value="<?= $datauser[0]->username ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 label-on-left">Email</label>
                                        <div class="col-sm-10">
                                            <div class="form-group label-floating is-empty">
                                                <label class="control-label"></label>
                                                <input required type="email" id="email" name="email" class="form-control" value="<?= $datauser[0]->email ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 label-on-left">Telepon</label>
                                        <div class="col-sm-10">
                                            <div class="form-group label-floating is-empty">
                                                <label class="control-label"></label>
                                                <input required type="number" class="form-control" name="telepon" id="telepon" value="<?= $datauser[0]->telepon ?>">
                                            </div>
                                            <button type="submit" class="btn btn-rose">Submit</button>
                                        </div>
                                    </div>
                                    <!-- <div class="row">
                                        <label class="col-sm-2 label-on-left">Password</label>
                                        <div class="col-sm-10">
                                            <div class="form-group label-floating is-empty">
                                                <label class="control-label"></label>
                                                <input required type="password" name="password" id="password" required class="form-control" value="<?//= $datauser[0]->password ?>">
                                            </div>
                                        </div>
                                    </div> -->
                                    <!-- <div class="row">
                                        <label class="col-sm-2 label-on-left">Linked</label>
                                        <div class="col-sm-10">
                                        <select required class="selectpicker" name="gudang" id="gudang" data-style="btn btn-rose btn-round" title="Pilih Gudang" data-size="7">
                                            <?php //foreach ($datagudang as $value):?>
                                                <option value="<?//= $value['id'] ?>" <?//= ($datauser[0]->gudang == $value['id'] ? 'selected':'') ?> ><?//= $value['nama'] ?></option>
                                            <?php// endforeach;?>
                                        </select>
                                        </div>
                                    </div> -->
                                    
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

