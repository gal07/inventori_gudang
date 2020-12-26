
            <div class="content">
                <div class="container-fluid">
                    <div class="header text-center">
                        <h3 class="title">Timeline</h3>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-plain">
                                <div class="card-content">
                                    <?php if($reportData): ?>
                                    <ul class="timeline">
                                        <?php foreach($reportData as $value): ?>
                                        <li class="<?= ($value['jenis_report'] == 1 ? '':'timeline-inverted') ?>">
                                            <div class="timeline-badge <?= ($value['jenis_report'] == 1 ? 'success':'danger') ?>">
                                                <i class="material-icons">card_travel</i>
                                            </div>
                                            <div class="timeline-panel">
                                                <div class="timeline-heading">
                                                    <span class="label label-<?= ($value['jenis_report'] == 1 ? 'success':'danger') ?>"><?= $jenisReport[$value['jenis_report']] ?> - <?= $jenisBarang[$value['id_barang']] ?></span>
                                                </div>
                                                <div class="timeline-body">
                                                    <p><b>Deksripsi :</b></p>
                                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                                    <p><b>Nama Barang / Qty :</b></p>
                                                    <p><?= $jenisBarang[$value['id_barang']] ?> : <?= $value['quantity'] ?> Qty</p>
                                                </div>
                                                <br>
                                                <div>
                                                    <p><b>Waktu :</b></p>
                                                    <i class="ti-time"></i> <?= $value['waktu'] ?>
                                                </div>
                                                   
                                               
                                            </div>
                                        </li>
                                        <?php endforeach; ?>
                                        <!-- <li>
                                            <div class="timeline-badge success">
                                                <i class="material-icons">extension</i>
                                            </div>
                                            <div class="timeline-panel">
                                                <div class="timeline-heading">
                                                    <span class="label label-success">Another One</span>
                                                </div>
                                                <div class="timeline-body">
                                                    <p>Thank God for the support of my wife and real friends. I also wanted to point out that it’s the first album to go number 1 off of streaming!!! I love you Ellen and also my number one design rule of anything I do from shoes to music to homes is that Kim has to like it....</p>
                                                </div>
                                                <div class="dropdown pull-left">
                                                        <button type="button" class="btn btn-round btn-info dropdown-toggle" data-toggle="dropdown">
                                                            <i class="material-icons">build</i>
                                                            <span class="caret"></span>
                                                        </button>
                                                        <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                                            <li>
                                                                <a href="#action">Action</a>
                                                            </li>
                                                            <li>
                                                                <a href="#action">Another action</a>
                                                            </li>
                                                            <li>
                                                                <a href="#here">Something else here</a>
                                                            </li>
                                                            <li class="divider"></li>
                                                            <li>
                                                                <a href="#link">Separated link</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                            </div>
                                        </li> -->
                                    </ul>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>