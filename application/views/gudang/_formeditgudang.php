<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <form method="get" action="#" letsgo="edit" id="form-create-gudang" class="form-horizontal">
                                <div class="card-header card-header-text" data-background-color="rose">
                                    <h4 class="card-title">Create Gudang</h4>
                                </div>
                                <div class="card-content">
                                    <div class="row">
                                        <label class="col-sm-2 label-on-left">Name</label>
                                        <div class="col-sm-10">
                                            <div class="form-group label-floating is-empty">
                                                <label class="control-label"></label>
                                                <input type="hidden" name="id" value="<?= $datagudang[0]->id ?>">
                                                <input required type="text" name="nama" id="nama" class="form-control" value="<?= $datagudang[0]->nama ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 label-on-left">Status</label>
                                        <div class="col-sm-10">
                                            <select required class="selectpicker" name="status" id="status" data-style="btn btn-rose btn-round" title="Single Select" data-size="7">
                                                    <option value="1" <?= ($datagudang[0]->status == 1 ? 'selected':'') ?> >Aktif</option>
                                                    <option value="0" <?= ($datagudang[0]->status == 0 ? 'selected':'') ?> >Tidak Aktif</option>
                                            </select>
                                            <button type="submit" class="btn btn-rose">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

