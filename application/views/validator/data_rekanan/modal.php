<input type="hidden" name="url_gambar_pdf" value="<?= base_url('assets/img/pdf.png') ?>">

<!-- MODAL SIUP -->
<div class="modal fade" id="modal_dekrip_siup" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h5 class="modal-title">DEKRIP FILE</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_dekrip_siup" method="post">
                    <input type="hidden" name="url_encryption_siup" value="<?= base_url('validator/rekanan_tervalidasi/encryption_siup/') ?>">
                    <input type="hidden" name="id_url_siup">
                    <input type="hidden" name="type" value="dekrip">
                    <center>
                        <img src="<?= base_url('assets/img/private.jpg') ?>" width="100%" alt="">
                        <p>Silakan Masukan Token Untuk Mendkrip File Anda </p>
                        <div class="token_generate_siup">

                        </div>
                        <br>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                            <input type="text" name="token_dokumen" value="" class="form-control">
                        </div>
                    </center>
                </form>
            </div>
            <div class="modal-footer">
                <a href="javascript:;" id="button_dekrip_generate_siup" onclick="GenerateDekrip_siup()" class="btn btn-success"> <i class="fas fa fa-check"> </i> Generate !!</a>
                <button disabled style="display:none" id="button_dekrip_generate_manipulasi_siup" class="btn btn-success"> <i class="fas fa fa-check"> </i> Generate !!</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fas fa fa-ban"> </i> Batal !!</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_enkrip_siup" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h5 class="modal-title">ENKRIP FILE</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_enkrip_siup" method="post">
                    <input type="hidden" name="url_encryption_siup" value="<?= base_url('validator/rekanan_tervalidasi/encryption_siup/') ?>">
                    <input type="hidden" name="id_url_siup">
                    <input type="hidden" name="type" value="enkrip">
                    <center>
                        <img src="<?= base_url('assets/img/private.jpg') ?>" width="100%" alt="">
                        <p>Silakan Masukan Token Untuk Mendkrip File Anda </p>
                        <div class="token_generate_siup">

                        </div>
                        <br>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                            <input type="text" name="token_dokumen" value="" class="form-control">
                        </div>
                    </center>
                </form>
            </div>
            <div class="modal-footer">
                <a href="javascript:;" id="button_dekrip_generate_siup" onclick="GenerateEnkrip_siup()" class="btn btn-success"> <i class="fas fa fa-check"> </i> Generate !!</a>
                <button disabled style="display:none" id="button_dekrip_generate_manipulasi_siup" class="btn btn-success"> <i class="fas fa fa-check"> </i> Generate !!</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fas fa fa-ban"> </i> Batal !!</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modal_nonvalid_siup" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title text-white">Validasi Dokumen Siup</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form_nonvalid_siup">
                <div class="modal-body">
                    <input type="hidden" name="url_validasi_siup" value="<?= base_url('validator/rekanan_tervalidasi/validation_siup/') ?>">
                    <input type="hidden" name="id_url_siup">
                    <input type="hidden" name="type" value="nonvalid">
                    <input type="hidden" name="type_kbli" id="kbli_nonvalid">
                    <center>
                        <img src="<?= base_url('assets/img/tanya.jpg') ?>" width="35%" alt="">
                        <p class="mt-2"><b>Silakan Masukan Alasan Bahwa Anda Tidak Setuju Dokumen Tersebut Valid!</b></p>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-solid fa-pen"></i></span>
                            <textarea name="alasan_validator" class="form-control"></textarea>
                        </div>
                    </center>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fas fa fa-ban"> </i> Batal !!</button>
                    <button type="submit" class="btn btn-success"> <i class="fas fa fa-check"> </i> Kirim!</a>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_valid_siup" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title text-white">Validasi Dokumen Siup</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form_valid_siup">
                <div class="modal-body">
                    <input type="hidden" name="url_validasi_siup" value="<?= base_url('validator/rekanan_tervalidasi/validation_siup/') ?>">
                    <input type="hidden" name="id_url_siup">
                    <input type="hidden" name="type" value="valid">
                    <input type="hidden" name="type_kbli" id="kbli_valid">
                    <center>
                        <img src="<?= base_url('assets/img/tanya.jpg') ?>" width="35%" alt="">
                        <p class="mt-2"><b>Silakan Masukan Alasan Bahwa Anda Setuju Dokumen Tersebut Valid!</b></p>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-solid fa-pen"></i></span>
                            <textarea name="alasan_validator" class="form-control"></textarea>
                        </div>
                    </center>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fas fa fa-ban"> </i> Batal !!</button>
                    <button type="submit" class="btn btn-success"> <i class="fas fa fa-check"> </i> Kirim!</a>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- END MODAL SIUP -->

<!-- MODAL nib -->
<div class="modal fade" id="modal_dekrip_nib" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h5 class="modal-title">DEKRIP FILE</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_dekrip_nib" method="post">
                    <input type="hidden" name="url_encryption_nib" value="<?= base_url('validator/rekanan_tervalidasi/encryption_nib/') ?>">
                    <input type="hidden" name="id_url_nib">
                    <input type="hidden" name="type" value="dekrip">
                    <center>
                        <img src="<?= base_url('assets/img/private.jpg') ?>" width="100%" alt="">
                        <p>Silakan Masukan Token Untuk Mendkrip File Anda </p>
                        <div class="token_generate_nib">

                        </div>
                        <br>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                            <input type="text" name="token_dokumen" value="" class="form-control">
                        </div>
                    </center>
                </form>
            </div>
            <div class="modal-footer">
                <a href="javascript:;" id="button_dekrip_generate_nib" onclick="GenerateDekrip_nib()" class="btn btn-success"> <i class="fas fa fa-check"> </i> Generate !!</a>
                <button disabled style="display:none" id="button_dekrip_generate_manipulasi_nib" class="btn btn-success"> <i class="fas fa fa-check"> </i> Generate !!</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fas fa fa-ban"> </i> Batal !!</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_enkrip_nib" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h5 class="modal-title">ENKRIP FILE</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_enkrip_nib" method="post">
                    <input type="hidden" name="url_encryption_nib" value="<?= base_url('validator/rekanan_tervalidasi/encryption_nib/') ?>">
                    <input type="hidden" name="id_url_nib">
                    <input type="hidden" name="type" value="enkrip">
                    <center>
                        <img src="<?= base_url('assets/img/private.jpg') ?>" width="100%" alt="">
                        <p>Silakan Masukan Token Untuk Mendkrip File Anda </p>
                        <div class="token_generate_nib">

                        </div>
                        <br>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                            <input type="text" name="token_dokumen" value="" class="form-control">
                        </div>
                    </center>
                </form>
            </div>
            <div class="modal-footer">
                <a href="javascript:;" id="button_dekrip_generate_nib" onclick="GenerateEnkrip_nib()" class="btn btn-success"> <i class="fas fa fa-check"> </i> Generate !!</a>
                <button disabled style="display:none" id="button_dekrip_generate_manipulasi_nib" class="btn btn-success"> <i class="fas fa fa-check"> </i> Generate !!</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fas fa fa-ban"> </i> Batal !!</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modal_nonvalid_nib" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title text-white">Validasi Dokumen NIB/TDP</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form_nonvalid_nib">
                <div class="modal-body">
                    <input type="hidden" name="url_validasi_nib" value="<?= base_url('validator/rekanan_tervalidasi/validation_nib/') ?>">
                    <input type="hidden" name="id_url_nib">
                    <input type="hidden" name="type" value="nonvalid">
                    <input type="hidden" name="type_kbli" id="kbli_nonvalid">
                    <center>
                        <img src="<?= base_url('assets/img/tanya.jpg') ?>" width="35%" alt="">
                        <p class="mt-2"><b>Silakan Masukan Alasan Bahwa Anda Tidak Setuju Dokumen Tersebut Valid!</b></p>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-solid fa-pen"></i></span>
                            <textarea name="alasan_validator" class="form-control"></textarea>
                        </div>
                    </center>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fas fa fa-ban"> </i> Batal !!</button>
                    <button type="submit" class="btn btn-success"> <i class="fas fa fa-check"> </i> Kirim!</a>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_valid_nib" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title text-white">Validasi Dokumen NIB/TDP</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form_valid_nib">
                <div class="modal-body">
                    <input type="hidden" name="url_validasi_nib" value="<?= base_url('validator/rekanan_tervalidasi/validation_nib/') ?>">
                    <input type="hidden" name="id_url_nib">
                    <input type="hidden" name="type" value="valid">
                    <input type="hidden" name="type_kbli" id="kbli_valid">
                    <center>
                        <img src="<?= base_url('assets/img/tanya.jpg') ?>" width="35%" alt="">
                        <p class="mt-2"><b>Silakan Masukan Alasan Bahwa Anda Setuju Dokumen Tersebut Valid!</b></p>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-solid fa-pen"></i></span>
                            <textarea name="alasan_validator" class="form-control"></textarea>
                        </div>
                    </center>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fas fa fa-ban"> </i> Batal !!</button>
                    <button type="submit" class="btn btn-success"> <i class="fas fa fa-check"> </i> Kirim!</a>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END MODAL nib -->