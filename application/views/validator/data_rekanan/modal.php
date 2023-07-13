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
                    <input type="hidden" name="type_kbli" id="kbli_nonvalid_nib">
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
                    <input type="hidden" name="type_kbli" id="kbli_valid_nib">
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


<!-- MODAL SBU -->
<div class="modal fade" id="modal_dekrip_sbu" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h5 class="modal-title">DEKRIP FILE</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_dekrip_sbu" method="post">
                    <input type="hidden" name="url_encryption_sbu" value="<?= base_url('validator/rekanan_tervalidasi/encryption_sbu/') ?>">
                    <input type="hidden" name="id_url_sbu">
                    <input type="hidden" name="type" value="dekrip">
                    <center>
                        <img src="<?= base_url('assets/img/private.jpg') ?>" width="100%" alt="">
                        <p>Silakan Masukan Token Untuk Mendkrip File Anda </p>
                        <div class="token_generate_sbu">

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
                <a href="javascript:;" id="button_dekrip_generate_sbu" onclick="GenerateDekrip_sbu()" class="btn btn-success"> <i class="fas fa fa-check"> </i> Generate !!</a>
                <button disabled style="display:none" id="button_dekrip_generate_manipulasi_sbu" class="btn btn-success"> <i class="fas fa fa-check"> </i> Generate !!</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fas fa fa-ban"> </i> Batal !!</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_enkrip_sbu" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h5 class="modal-title">ENKRIP FILE</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_enkrip_sbu" method="post">
                    <input type="hidden" name="url_encryption_sbu" value="<?= base_url('validator/rekanan_tervalidasi/encryption_sbu/') ?>">
                    <input type="hidden" name="id_url_sbu">
                    <input type="hidden" name="type" value="enkrip">
                    <center>
                        <img src="<?= base_url('assets/img/private.jpg') ?>" width="100%" alt="">
                        <p>Silakan Masukan Token Untuk Mendkrip File Anda </p>
                        <div class="token_generate_sbu">

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
                <a href="javascript:;" id="button_dekrip_generate_sbu" onclick="GenerateEnkrip_sbu()" class="btn btn-success"> <i class="fas fa fa-check"> </i> Generate !!</a>
                <button disabled style="display:none" id="button_dekrip_generate_manipulasi_sbu" class="btn btn-success"> <i class="fas fa fa-check"> </i> Generate !!</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fas fa fa-ban"> </i> Batal !!</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modal_nonvalid_sbu" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title text-white">Validasi Dokumen SBU</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form_nonvalid_sbu">
                <div class="modal-body">
                    <input type="hidden" name="url_validasi_sbu" value="<?= base_url('validator/rekanan_tervalidasi/validation_sbu/') ?>">
                    <input type="hidden" name="id_url_sbu">
                    <input type="hidden" name="type" value="nonvalid">
                    <input type="hidden" name="type_kbli" id="kbli_nonvalid_sbu">
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

<div class="modal fade" id="modal_valid_sbu" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title text-white">Validasi Dokumen SBU</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form_valid_sbu">
                <div class="modal-body">
                    <input type="hidden" name="url_validasi_sbu" value="<?= base_url('validator/rekanan_tervalidasi/validation_sbu/') ?>">
                    <input type="hidden" name="id_url_sbu">
                    <input type="hidden" name="type" value="valid">
                    <input type="hidden" name="type_kbli" id="kbli_valid_sbu">
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
<!-- END MODAL SBU -->

<!-- MODAL SIUJK -->
<div class="modal fade" id="modal_dekrip_siujk" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h5 class="modal-title">DEKRIP FILE</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_dekrip_siujk" method="post">
                    <input type="hidden" name="url_encryption_siujk" value="<?= base_url('validator/rekanan_tervalidasi/encryption_siujk/') ?>">
                    <input type="hidden" name="id_url_siujk">
                    <input type="hidden" name="type" value="dekrip">
                    <center>
                        <img src="<?= base_url('assets/img/private.jpg') ?>" width="100%" alt="">
                        <p>Silakan Masukan Token Untuk Mendkrip File Anda </p>
                        <div class="token_generate_siujk">

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
                <a href="javascript:;" id="button_dekrip_generate_siujk" onclick="GenerateDekrip_siujk()" class="btn btn-success"> <i class="fas fa fa-check"> </i> Generate !!</a>
                <button disabled style="display:none" id="button_dekrip_generate_manipulasi_siujk" class="btn btn-success"> <i class="fas fa fa-check"> </i> Generate !!</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fas fa fa-ban"> </i> Batal !!</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_enkrip_siujk" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h5 class="modal-title">ENKRIP FILE</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_enkrip_siujk" method="post">
                    <input type="hidden" name="url_encryption_siujk" value="<?= base_url('validator/rekanan_tervalidasi/encryption_siujk/') ?>">
                    <input type="hidden" name="id_url_siujk">
                    <input type="hidden" name="type" value="enkrip">
                    <center>
                        <img src="<?= base_url('assets/img/private.jpg') ?>" width="100%" alt="">
                        <p>Silakan Masukan Token Untuk Mendkrip File Anda </p>
                        <div class="token_generate_siujk">

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
                <a href="javascript:;" id="button_dekrip_generate_siujk" onclick="GenerateEnkrip_siujk()" class="btn btn-success"> <i class="fas fa fa-check"> </i> Generate !!</a>
                <button disabled style="display:none" id="button_dekrip_generate_manipulasi_siujk" class="btn btn-success"> <i class="fas fa fa-check"> </i> Generate !!</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fas fa fa-ban"> </i> Batal !!</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modal_nonvalid_siujk" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title text-white">Validasi Dokumen SIUJK</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form_nonvalid_siujk">
                <div class="modal-body">
                    <input type="hidden" name="url_validasi_siujk" value="<?= base_url('validator/rekanan_tervalidasi/validation_siujk/') ?>">
                    <input type="hidden" name="id_url_siujk">
                    <input type="hidden" name="type" value="nonvalid">
                    <input type="hidden" name="type_kbli" id="kbli_nonvalid_siujk">
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

<div class="modal fade" id="modal_valid_siujk" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title text-white">Validasi Dokumen SIUJK</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form_valid_siujk">
                <div class="modal-body">
                    <input type="hidden" name="url_validasi_siujk" value="<?= base_url('validator/rekanan_tervalidasi/validation_siujk/') ?>">
                    <input type="hidden" name="id_url_siujk">
                    <input type="hidden" name="type" value="valid">
                    <input type="hidden" name="type_kbli" id="kbli_valid_siujk">
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
<!-- END MODAL SIUJK -->

<!-- MODAL AKTA PENDIRIAN -->
<div class="modal fade" id="modal_dekrip_akta_pendirian" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h5 class="modal-title">DEKRIP FILE</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_dekrip_akta_pendirian" method="post">
                    <input type="hidden" name="url_encryption_akta_pendirian" value="<?= base_url('validator/rekanan_tervalidasi/encryption_akta_pendirian/') ?>">
                    <input type="hidden" name="id_url_akta_pendirian">
                    <input type="hidden" name="type" value="dekrip">
                    <center>
                        <img src="<?= base_url('assets/img/private.jpg') ?>" width="100%" alt="">
                        <p>Silakan Masukan Token Untuk Mendkrip File Anda </p>
                        <div class="token_generate_akta_pendirian">

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
                <a href="javascript:;" id="button_dekrip_generate_akta_pendirian" onclick="GenerateDekrip_akta_pendirian()" class="btn btn-success"> <i class="fas fa fa-check"> </i> Generate !!</a>
                <button disabled style="display:none" id="button_dekrip_generate_manipulasi_akta_pendirian" class="btn btn-success"> <i class="fas fa fa-check"> </i> Generate !!</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fas fa fa-ban"> </i> Batal !!</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_enkrip_akta_pendirian" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h5 class="modal-title">ENKRIP FILE</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_enkrip_akta_pendirian" method="post">
                    <input type="hidden" name="url_encryption_akta_pendirian" value="<?= base_url('validator/rekanan_tervalidasi/encryption_akta_pendirian/') ?>">
                    <input type="hidden" name="id_url_akta_pendirian">
                    <input type="hidden" name="type" value="enkrip">
                    <center>
                        <img src="<?= base_url('assets/img/private.jpg') ?>" width="100%" alt="">
                        <p>Silakan Masukan Token Untuk Mendkrip File Anda </p>
                        <div class="token_generate_akta_pendirian">

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
                <a href="javascript:;" id="button_dekrip_generate_akta_pendirian" onclick="GenerateEnkrip_akta_pendirian()" class="btn btn-success"> <i class="fas fa fa-check"> </i> Generate !!</a>
                <button disabled style="display:none" id="button_dekrip_generate_manipulasi_akta_pendirian" class="btn btn-success"> <i class="fas fa fa-check"> </i> Generate !!</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fas fa fa-ban"> </i> Batal !!</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modal_nonvalid_akta_pendirian" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title text-white">Validasi Dokumen SBU</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form_nonvalid_akta_pendirian">
                <div class="modal-body">
                    <input type="hidden" name="url_validasi_akta_pendirian" value="<?= base_url('validator/rekanan_tervalidasi/validation_akta_pendirian/') ?>">
                    <input type="hidden" name="id_url_akta_pendirian">
                    <input type="hidden" name="type" value="nonvalid">
                    <input type="hidden" name="type_kbli" id="kbli_nonvalid_akta_pendirian">
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

<div class="modal fade" id="modal_valid_akta_pendirian" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title text-white">Validasi Dokumen SBU</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form_valid_akta_pendirian">
                <div class="modal-body">
                    <input type="hidden" name="url_validasi_akta_pendirian" value="<?= base_url('validator/rekanan_tervalidasi/validation_akta_pendirian/') ?>">
                    <input type="hidden" name="id_url_akta_pendirian">
                    <input type="hidden" name="type" value="valid">
                    <input type="hidden" name="type_kbli" id="kbli_valid_akta_pendirian">
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
<!-- END MODAL AKTA PENDIRIAN -->

<!-- MODAL AKTA PERUBAHAN -->
<div class="modal fade" id="modal_dekrip_akta_perubahan" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h5 class="modal-title">DEKRIP FILE</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_dekrip_akta_perubahan" method="post">
                    <input type="hidden" name="url_encryption_akta_perubahan" value="<?= base_url('validator/rekanan_tervalidasi/encryption_akta_perubahan/') ?>">
                    <input type="hidden" name="id_url_akta_perubahan">
                    <input type="hidden" name="type" value="dekrip">
                    <center>
                        <img src="<?= base_url('assets/img/private.jpg') ?>" width="100%" alt="">
                        <p>Silakan Masukan Token Untuk Mendkrip File Anda </p>
                        <div class="token_generate_akta_perubahan">

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
                <a href="javascript:;" id="button_dekrip_generate_akta_perubahan" onclick="GenerateDekrip_akta_perubahan()" class="btn btn-success"> <i class="fas fa fa-check"> </i> Generate !!</a>
                <button disabled style="display:none" id="button_dekrip_generate_manipulasi_akta_perubahan" class="btn btn-success"> <i class="fas fa fa-check"> </i> Generate !!</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fas fa fa-ban"> </i> Batal !!</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_enkrip_akta_perubahan" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h5 class="modal-title">ENKRIP FILE</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_enkrip_akta_perubahan" method="post">
                    <input type="hidden" name="url_encryption_akta_perubahan" value="<?= base_url('validator/rekanan_tervalidasi/encryption_akta_perubahan/') ?>">
                    <input type="hidden" name="id_url_akta_perubahan">
                    <input type="hidden" name="type" value="enkrip">
                    <center>
                        <img src="<?= base_url('assets/img/private.jpg') ?>" width="100%" alt="">
                        <p>Silakan Masukan Token Untuk Mendkrip File Anda </p>
                        <div class="token_generate_akta_perubahan">

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
                <a href="javascript:;" id="button_dekrip_generate_akta_perubahan" onclick="GenerateEnkrip_akta_perubahan()" class="btn btn-success"> <i class="fas fa fa-check"> </i> Generate !!</a>
                <button disabled style="display:none" id="button_dekrip_generate_manipulasi_akta_perubahan" class="btn btn-success"> <i class="fas fa fa-check"> </i> Generate !!</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fas fa fa-ban"> </i> Batal !!</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modal_nonvalid_akta_perubahan" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title text-white">Validasi Dokumen SBU</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form_nonvalid_akta_perubahan">
                <div class="modal-body">
                    <input type="hidden" name="url_validasi_akta_perubahan" value="<?= base_url('validator/rekanan_tervalidasi/validation_akta_perubahan/') ?>">
                    <input type="hidden" name="id_url_akta_perubahan">
                    <input type="hidden" name="type" value="nonvalid">
                    <input type="hidden" name="type_kbli" id="kbli_nonvalid_akta_perubahan">
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

<div class="modal fade" id="modal_valid_akta_perubahan" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title text-white">Validasi Dokumen SBU</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form_valid_akta_perubahan">
                <div class="modal-body">
                    <input type="hidden" name="url_validasi_akta_perubahan" value="<?= base_url('validator/rekanan_tervalidasi/validation_akta_perubahan/') ?>">
                    <input type="hidden" name="id_url_akta_perubahan">
                    <input type="hidden" name="type" value="valid">
                    <input type="hidden" name="type_kbli" id="kbli_valid_akta_perubahan">
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
<!-- END MODAL AKTA PERUBAHAN -->

<!-- MODAL MANAJERIAL PEMILIK -->
<div class="modal fade" tabindex="-1" id="modal_pemilik_manajerial">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <a class="navbar-brand">
                    <img src="<?php echo base_url(); ?>/assets/brand/jm1.png" alt="" width="25" height="25" class="d-inline-block align-text-top">
                    <b><span class="text-primary">Jasamarga Tollroad Operator</span></b>
                </a>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card border-dark shadow-lg">
                    <div class="card-header bg-dark d-flex bd-highlight">
                        <div class="flex-grow-1 bd-highlight">
                            <span class="text-white">
                                <i class="fa-solid fa-align-justify px-1"></i>
                                <small><strong>Form Edit Excel Pemilik Manajerial</strong></small>
                            </span>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="form_edit_excel_pemilik_manajerial" enctype="multipart/form-data">
                            <input type="hidden" name="id_pemilik">
                            <input type="hidden" name="type_edit_pemilik">
                            <input type="hidden" name="validasi_enkripsi_pemilik">
                            <table class="table table-sm">
                                <tr>
                                    <td class="col-sm-2 bg-light">
                                        <label class="form-label col-form-label-sm"><b>NIK/Paspor</b></label>
                                    </td>
                                    <td class="col-sm-3">
                                        <div class="col-sm-12">
                                            <div class="input-group mb-2">
                                                <span class="input-group-text"><i class="fa-solid fa-address-card"></i></span>
                                                <input name="nik" type="text" class="form-control" data-inputmask='"mask": "9999999999999999"' data-mask>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="col-sm-2 bg-light">
                                        <label class="form-label col-form-label-sm"><b>NPWP</b></label>
                                    </td>
                                    <td class="col-sm-3">
                                        <div class="col-sm-12">
                                            <div class="input-group mb-2">
                                                <span class="input-group-text"><i class="fa-solid fa-address-card"></i></span>
                                                <input name="npwp" type="text" class="form-control" data-inputmask='"mask": "99.999.999.9-999.999"' data-mask>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-sm-2 bg-light">
                                        <label class="form-label col-form-label-sm"><b>Nama Pemilik</b></label>
                                    </td>
                                    <td class="col-sm-3">
                                        <div class="col-sm-12">
                                            <div class="input-group mb-2">
                                                <span class="input-group-text"><i class="fa-solid fa-user-pen"></i></span>
                                                <input name="nama_pemilik" type="text" class="form-control">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="col-sm-2 bg-light">
                                        <label class="form-label col-form-label-sm"><b>Warganegara</b></label>
                                    </td>
                                    <td class="col-sm-3">
                                        <div class="col-sm-12">
                                            <div class="input-group mb-2">
                                                <span class="input-group-text"><i class="fa-solid fa-bars"></i></span>
                                                <select name="warganegara" class="form-select" aria-label="Default select example">
                                                    <option selected>Indonesia</option>
                                                    <option>Asing</option>
                                                </select>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-sm-2 bg-light">
                                        <label class="form-label col-form-label-sm"><b>Jenis Kepemilik</b></label>
                                    </td>
                                    <td class="col-sm-3">
                                        <div class="col-sm-12">
                                            <div class="input-group mb-2">
                                                <span class="input-group-text"><i class="fa-solid fa-bars"></i></span>
                                                <select name="jns_pemilik" class="form-select" aria-label="Default select example">
                                                    <option selected>Individu</option>
                                                    <option>Perusahaan Nasional</option>
                                                    <option>Perusahaan Asing</option>
                                                    <option>Pemerintah</option>
                                                    <option>Publik</option>
                                                </select>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="col-sm-2 bg-light">
                                        <label class="form-label col-form-label-sm"><b>Saham</b></label>
                                    </td>
                                    <td class="col-sm-3">
                                        <div class="col-sm-6">
                                            <div class="input-group mb-2">
                                                <span class="input-group-text">%</span>
                                                <input name="saham" type="number" class="form-control">
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-sm-2 bg-light">
                                        <label class="form-label col-form-label-sm"><b>Alamat Pemilik</b></label>
                                    </td>
                                    <td class="col-sm-3" colspan="3">
                                        <div class="col-sm-12">
                                            <div class="input-group mb-2">
                                                <span class="input-group-text"><i class="fa-solid fa-road"></i></span>
                                                <input name="alamat_pemilik" type="text" class="form-control">
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-sm-2 bg-light">
                                        <label class="form-label col-form-label-sm"><b>Upload File KTP</b></label>
                                    </td>
                                    <td class="col-sm-3">
                                        <input type="file" name="file_ktp" id="file" accept=".pdf">
                                    </td>
                                    <td class="col-sm-4">
                                        <div class="button_nama_file_ktp">

                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-sm-2 bg-light">
                                        <label class="form-label col-form-label-sm"><b>Upload File NPWP</b></label>
                                    </td>
                                    <td class="col-sm-3">
                                        <input type="file" name="file_npwp" id="file" accept=".pdf">
                                    </td>
                                    <td class="col-sm-4">
                                        <div class="button_nama_file_npwp">

                                        </div>
                                    </td>
                                    <td>
                                        <div class="button_enkrip_pemilik">

                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_nonvalid_pemilik" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title text-white">Validasi Dokumen Pemilik Perusahaan</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form_nonvalid_pemilik">
                <div class="modal-body">
                    <input type="hidden" name="url_validasi_pemilik" value="<?= base_url('validator/rekanan_tervalidasi/validation_pemilik/') ?>">
                    <input type="hidden" name="id_url_pemilik">
                    <input type="hidden" name="type" value="nonvalid">
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

<div class="modal fade" id="modal_valid_pemilik" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title text-white">Validasi Dokumen Pemilik Perusahaan</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form_valid_pemilik">
                <div class="modal-body">
                    <input type="hidden" name="url_validasi_pemilik" value="<?= base_url('validator/rekanan_tervalidasi/validation_pemilik/') ?>">
                    <input type="hidden" name="id_url_pemilik">
                    <input type="hidden" name="type" value="valid">
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
<!-- END MODAL PEMILIK -->

<!-- MODAL PENGURUS -->
<div class="modal fade" tabindex="-1" id="modal_pengurus_manajerial">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <a class="navbar-brand">
                    <img src="<?php echo base_url(); ?>/assets/brand/jm1.png" alt="" width="25" height="25" class="d-inline-block align-text-top">
                    <b><span class="text-primary">Jasamarga Tollroad Operator</span></b>
                </a>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card border-dark shadow-lg">
                    <div class="card-header bg-dark d-flex bd-highlight">
                        <div class="flex-grow-1 bd-highlight">
                            <span class="text-white">
                                <i class="fa-solid fa-align-justify px-1"></i>
                                <small><strong>Form Edit Excel Pengurus Manajerial</strong></small>
                            </span>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="form_edit_excel_pengurus_manajerial" enctype="multipart/form-data">
                            <input type="hidden" name="id_pengurus">
                            <input type="hidden" name="type_edit_pengurus">
                            <input type="hidden" name="validasi_enkripsi_pengurus">
                            <table class="table table-sm">
                                <tr>
                                    <td class="col-sm-2 bg-light">
                                        <label class="form-label col-form-label-sm"><b>NIK/Paspor</b></label>
                                    </td>
                                    <td class="col-sm-3">
                                        <div class="col-sm-12">
                                            <div class="input-group mb-2">
                                                <span class="input-group-text"><i class="fa-solid fa-address-card"></i></span>
                                                <input required type="text" name="nik_pengurus" class="form-control" data-inputmask='"mask": "9999999999999999"' data-mask>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="col-sm-2 bg-light">
                                        <label class="form-label col-form-label-sm"><b>NPWP</b></label>
                                    </td>
                                    <td class="col-sm-3">
                                        <div class="col-sm-12">
                                            <div class="input-group mb-2">
                                                <span class="input-group-text"><i class="fa-solid fa-address-card"></i></span>
                                                <input name="npwp_pengurus" required type="text" class="form-control" data-inputmask='"mask": "99.999.999.9-999.999"' data-mask>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-sm-2 bg-light">
                                        <label class="form-label col-form-label-sm"><b>Nama Pengurus</b></label>
                                    </td>
                                    <td class="col-sm-3">
                                        <div class="col-sm-12">
                                            <div class="input-group mb-2">
                                                <span class="input-group-text"><i class="fa-solid fa-user-pen"></i></span>
                                                <input name="nama_pengurus" required type="text" class="form-control">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="col-sm-2 bg-light">
                                        <label class="form-label col-form-label-sm"><b>Warganegara</b></label>
                                    </td>
                                    <td class="col-sm-3">
                                        <div class="col-sm-12">
                                            <div class="input-group mb-2">
                                                <span class="input-group-text"><i class="fa-solid fa-bars"></i></span>
                                                <select name="warganegara" class="form-select" aria-label="Default select example">
                                                    <option selected>Indonesia</option>
                                                    <option>Asing</option>
                                                </select>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-sm-2 bg-light">
                                        <label class="form-label col-form-label-sm"><b>Jabatan Pengurus</b></label>
                                    </td>
                                    <td class="col-sm-3">
                                        <div class="col-sm-12">
                                            <div class="input-group mb-2">
                                                <span class="input-group-text"><i class="fa-solid fa-user-tie"></i></span>
                                                <input name="jabatan_pengurus" required type="text" class="form-control">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="col-sm-2 bg-light">
                                        <label class="form-label col-form-label-sm"><b>Jabat Mulai - Sampai</b></label>
                                    </td>
                                    <td class="col-sm-3">
                                        <div class="col-sm-12 mb-3">
                                            <input type="text" name="jabatan_mulai"><br><small>s/d</small><br><input name="jabatan_selesai" type="text">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-sm-2 bg-light">
                                        <label class="form-label col-form-label-sm"><b>Alamat Pengurus</b></label>
                                    </td>
                                    <td class="col-sm-3" colspan="3">
                                        <div class="col-sm-12">
                                            <div class="input-group mb-2">
                                                <span class="input-group-text"><i class="fa-solid fa-road"></i></span>
                                                <textarea name="alamat_pengurus" required type="text" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-sm-2 bg-light">
                                        <label class="form-label col-form-label-sm"><b>Upload File KTP</b></label>
                                    </td>
                                    <td class="col-sm-3">
                                        <input type="file" name="file_ktp_pengurus" id="file" accept=".pdf">
                                    </td>
                                    <td class="col-sm-4">
                                        <div class="button_nama_file_ktp_pengurus">

                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-sm-2 bg-light">
                                        <label class="form-label col-form-label-sm"><b>Upload File NPWP</b></label>
                                    </td>
                                    <td class="col-sm-3">
                                        <input type="file" name="file_npwp_pengurus" id="file" accept=".pdf">
                                    </td>
                                    <td class="col-sm-4">
                                        <div class="button_nama_file_npwp_pengurus">

                                        </div>
                                    </td>
                                    <td>
                                        <div class="button_enkrip_pengurus">

                                        </div>
                                    </td>
                                </tr>
                                <!-- <hr>
                                <tr>
                                    <td class="col-sm-10" colspan="4">
                                        <button type="button" class="btn btn-danger btn-sm shadow-lg" data-bs-dismiss="modal">
                                            <i class="fa-solid fa-angles-left px-1"></i>
                                            Close
                                        </button>
                                        <button type="submit" class="btn btn-success btn-sm shadow-lg btn_simpan btn_edit_biasa">
                                            <i class="fa-solid fa-floppy-disk px-1"></i>
                                            Save Changes
                                        </button>
                                    </td>
                                </tr> -->
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_nonvalid_pengurus" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title text-white">Validasi Dokumen Pengurus Perusahaan</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form_nonvalid_pengurus">
                <div class="modal-body">
                    <input type="hidden" name="url_validasi_pengurus" value="<?= base_url('validator/rekanan_tervalidasi/validation_pengurus/') ?>">
                    <input type="hidden" name="id_url_pengurus">
                    <input type="hidden" name="type" value="nonvalid">
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

<div class="modal fade" id="modal_valid_pengurus" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title text-white">Validasi Dokumen Pengurus Perusahaan</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form_valid_pengurus">
                <div class="modal-body">
                    <input type="hidden" name="url_validasi_pengurus" value="<?= base_url('validator/rekanan_tervalidasi/validation_pengurus/') ?>">
                    <input type="hidden" name="id_url_pengurus">
                    <input type="hidden" name="type" value="valid">
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
<!-- END MODAL PENGURUS -->

<!-- MODAL PENGALAMAN -->
<div class="modal fade" tabindex="-1" id="modal_pengalaman">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <a class="navbar-brand">
                    <img src="<?php echo base_url(); ?>/assets/brand/jm1.png" alt="" width="25" height="25" class="d-inline-block align-text-top">
                    <b><span class="text-primary">Jasamarga Tollroad Operator</span></b>
                </a>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card border-dark shadow-lg">
                    <div class="card-header bg-dark d-flex bd-highlight">
                        <div class="flex-grow-1 bd-highlight">
                            <span class="text-white">
                                <i class="fa-solid fa-align-justify px-1"></i>
                                <small><strong>Form Edit Excel Pengalaman Manajerial</strong></small>
                            </span>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="form_edit_excel_pengalaman_manajerial" enctype="multipart/form-data">
                            <input type="hidden" name="id_pengalaman">
                            <input type="hidden" name="type_edit_pengalaman">
                            <input type="hidden" name="validasi_enkripsi_pengalaman">
                            <table class="table table-sm">
                                <tr>
                                    <td class="col-sm-2 bg-light">
                                        <label class="form-label col-form-label-sm"><b>No. Kontrak</b></label>
                                    </td>
                                    <td class="col-sm-3">
                                        <div class="col-sm-12">
                                            <div class="input-group mb-2">
                                                <span class="input-group-text"><i class="fa-solid fa-barcode"></i></span>
                                                <input name="no_kontrak" type="text" class="form-control">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="col-sm-2 bg-light">
                                        <label class="form-label col-form-label-sm"><b>Tanggal Kontrak</b></label>
                                    </td>
                                    <td class="col-sm-3">
                                        <div class="col-sm-8">
                                            <div class="input-group mb-2">
                                                <span class="input-group-text"><i class="fa-solid fa-calendar-days"></i></span>
                                                <input name="tanggal_kontrak" type="date" id="date" class="form-control">
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-sm-2 bg-light">
                                        <label class="form-label col-form-label-sm"><b>Nama Pekerjaan</b></label>
                                    </td>
                                    <td class="col-sm-5" colspan="3">
                                        <div class="col-sm-12">
                                            <div class="input-group mb-2">
                                                <span class="input-group-text"><i class="fa-solid fa-user-pen"></i></span>
                                                <textarea name="nama_pekerjaan" type="text" class="form-control" rows="2"></textarea>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-sm-2 bg-light">
                                        <label class="form-label col-form-label-sm"><b>Jenis Pengadaan</b></label>
                                    </td>
                                    <td class="col-sm-3">
                                        <div class="col-sm-12">
                                            <div class="input-group mb-2">
                                                <span class="input-group-text"><i class="fa-solid fa-bars"></i></span>
                                                <select name="id_jenis_usaha" class="form-select" aria-label="Default select example">
                                                    <option value="Jasa Lainnya">Jasa Lainnya</option>
                                                    <option value="Jasa Konstruksi">Jasa Konstruksi</option>
                                                    <option value="Jasa Pengadaan Barang">Jasa Pengadaan Barang</option>
                                                    <option value="Jasa Konsultasi">Jasa Konsultasi</option>
                                                    <option value="Sewa Kelola">Sewa Kelola</option>
                                                </select>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="col-sm-2 bg-light">
                                        <label class="form-label col-form-label-sm"><b>Nilai Kontrak</b></label>
                                    </td>
                                    <td class="col-sm-3">
                                        <div class="col-sm-10">
                                            <div class="input-group mb-2">
                                                <span class="input-group-text">Rp.</span>
                                                <input name="nilai_kontrak" type="text" id="tanpa-rupiah" class="form-control">
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-sm-2 bg-light">
                                        <label class="form-label col-form-label-sm"><b>Instansi Pemberi</b></label>
                                    </td>
                                    <td class="col-sm-3">
                                        <div class="col-sm-12">
                                            <div class="input-group mb-2">
                                                <span class="input-group-text"><i class="fa-solid fa-business-time"></i></span>
                                                <input name="instansi_pemberi" type="text" class="form-control">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="col-sm-2 bg-light">
                                        <label class="form-label col-form-label-sm"><b>Lokasi Pekerjaan</b></label>
                                    </td>
                                    <td class="col-sm-3">
                                        <div class="col-sm-12">
                                            <div class="input-group mb-2">
                                                <span class="input-group-text"><i class="fa-solid fa-road"></i></span>
                                                <input name="lokasi_pekerjaan" type="text" class="form-control">
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-sm-2 bg-light">
                                        <label class="form-label col-form-label-sm"><b>Upload File Kontrak</b></label>
                                    </td>
                                    <td class="col-sm-3">
                                        <input type="file" name="file_kontrak_pengalaman" id="file" accept=".pdf">
                                    </td>
                                    <td class="col-sm-4">
                                        <div class="button_nama_file_pengalaman">

                                        </div>
                                    </td>
                                    <td>
                                        <div class="button_enkrip_pengalaman">

                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_nonvalid_pengalaman" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title text-white">Validasi Dokumen Pengurus Perusahaan</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form_nonvalid_pengalaman">
                <div class="modal-body">
                    <input type="hidden" name="url_validasi_pengalaman" value="<?= base_url('validator/rekanan_tervalidasi/validation_pengalaman/') ?>">
                    <input type="hidden" name="id_url_pengalaman">
                    <input type="hidden" name="type" value="nonvalid">
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

<div class="modal fade" id="modal_valid_pengalaman" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title text-white">Validasi Dokumen Pengurus Perusahaan</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form_valid_pengalaman">
                <div class="modal-body">
                    <input type="hidden" name="url_validasi_pengalaman" value="<?= base_url('validator/rekanan_tervalidasi/validation_pengalaman/') ?>">
                    <input type="hidden" name="id_url_pengalaman">
                    <input type="hidden" name="type" value="valid">
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
<!-- END MODAL PENGALAMAN -->

<!-- modal sppkp -->
<div class="modal fade" id="modal_dekrip_sppkp" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h5 class="modal-title">DEKRIP FILE</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_dekrip_sppkp" method="post">
                    <input type="hidden" name="url_encryption_sppkp" value="<?= base_url('validator/rekanan_tervalidasi/encryption_sppkp/') ?>">
                    <input type="hidden" name="id_url_sppkp">
                    <input type="hidden" name="type" value="dekrip">
                    <center>
                        <img src="<?= base_url('assets/img/private.jpg') ?>" width="100%" alt="">
                        <p>Silakan Masukan Token Untuk Mendkrip File Anda </p>
                        <div class="token_generate_sppkp">

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
                <a href="javascript:;" id="button_dekrip_generate_sppkp" onclick="GenerateDekrip_sppkp()" class="btn btn-success"> <i class="fas fa fa-check"> </i> Generate !!</a>
                <button disabled style="display:none" id="button_dekrip_generate_manipulasi_sppkp" class="btn btn-success"> <i class="fas fa fa-check"> </i> Generate !!</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fas fa fa-ban"> </i> Batal !!</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_enkrip_sppkp" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h5 class="modal-title">ENKRIP FILE</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_enkrip_sppkp" method="post">
                    <input type="hidden" name="url_encryption_sppkp" value="<?= base_url('validator/rekanan_tervalidasi/encryption_sppkp/') ?>">
                    <input type="hidden" name="id_url_sppkp">
                    <input type="hidden" name="type" value="enkrip">
                    <center>
                        <img src="<?= base_url('assets/img/private.jpg') ?>" width="100%" alt="">
                        <p>Silakan Masukan Token Untuk Mendkrip File Anda </p>
                        <div class="token_generate_sppkp">

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
                <a href="javascript:;" id="button_dekrip_generate_sppkp" onclick="GenerateEnkrip_sppkp()" class="btn btn-success"> <i class="fas fa fa-check"> </i> Generate !!</a>
                <button disabled style="display:none" id="button_dekrip_generate_manipulasi_sppkp" class="btn btn-success"> <i class="fas fa fa-check"> </i> Generate !!</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fas fa fa-ban"> </i> Batal !!</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_nonvalid_sppkp" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title text-white">Validasi Dokumen Siup</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form_nonvalid_sppkp">
                <div class="modal-body">
                    <input type="hidden" name="url_validasi_sppkp" value="<?= base_url('validator/rekanan_tervalidasi/validation_sppkp/') ?>">
                    <input type="hidden" name="id_url_sppkp">
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

<div class="modal fade" id="modal_valid_sppkp" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title text-white">Validasi Dokumen Siup</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form_valid_sppkp">
                <div class="modal-body">
                    <input type="hidden" name="url_validasi_sppkp" value="<?= base_url('validator/rekanan_tervalidasi/validation_sppkp/') ?>">
                    <input type="hidden" name="id_url_sppkp">
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
<!-- end modal sppkp -->


<!-- modal pajak npwp -->
<div class="modal fade" id="modal_dekrip_npwp" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h5 class="modal-title">DEKRIP FILE</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_dekrip_npwp" method="post">
                    <input type="hidden" name="url_encryption_npwp" value="<?= base_url('validator/rekanan_tervalidasi/encryption_npwp/') ?>">
                    <input type="hidden" name="id_url_npwp">
                    <input type="hidden" name="type" value="dekrip">
                    <center>
                        <img src="<?= base_url('assets/img/private.jpg') ?>" width="100%" alt="">
                        <p>Silakan Masukan Token Untuk Mendkrip File Anda </p>
                        <div class="token_generate_npwp">

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
                <a href="javascript:;" id="button_dekrip_generate_npwp" onclick="GenerateDekrip_npwp()" class="btn btn-success"> <i class="fas fa fa-check"> </i> Generate !!</a>
                <button disabled style="display:none" id="button_dekrip_generate_manipulasi_npwp" class="btn btn-success"> <i class="fas fa fa-check"> </i> Generate !!</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fas fa fa-ban"> </i> Batal !!</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_enkrip_npwp" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h5 class="modal-title">ENKRIP FILE</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_enkrip_npwp" method="post">
                    <input type="hidden" name="url_encryption_npwp" value="<?= base_url('validator/rekanan_tervalidasi/encryption_npwp/') ?>">
                    <input type="hidden" name="id_url_npwp">
                    <input type="hidden" name="type" value="enkrip">
                    <center>
                        <img src="<?= base_url('assets/img/private.jpg') ?>" width="100%" alt="">
                        <p>Silakan Masukan Token Untuk Mendkrip File Anda </p>
                        <div class="token_generate_npwp">

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
                <a href="javascript:;" id="button_dekrip_generate_npwp" onclick="GenerateEnkrip_npwp()" class="btn btn-success"> <i class="fas fa fa-check"> </i> Generate !!</a>
                <button disabled style="display:none" id="button_dekrip_generate_manipulasi_npwp" class="btn btn-success"> <i class="fas fa fa-check"> </i> Generate !!</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fas fa fa-ban"> </i> Batal !!</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_nonvalid_npwp" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title text-white">Validasi Dokumen Siup</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form_nonvalid_npwp">
                <div class="modal-body">
                    <input type="hidden" name="url_validasi_npwp" value="<?= base_url('validator/rekanan_tervalidasi/validation_npwp/') ?>">
                    <input type="hidden" name="id_url_npwp">
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

<div class="modal fade" id="modal_valid_npwp" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title text-white">Validasi Dokumen Siup</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form_valid_npwp">
                <div class="modal-body">
                    <input type="hidden" name="url_validasi_npwp" value="<?= base_url('validator/rekanan_tervalidasi/validation_npwp/') ?>">
                    <input type="hidden" name="id_url_npwp">
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
<!-- end modal pajak npwp -->

<!-- modal pajak spt -->
<div class="modal fade" id="modal_dekrip_spt" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h5 class="modal-title">DEKRIP FILE</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_dekrip_spt" method="post">
                    <input type="hidden" name="url_encryption_spt" value="<?= base_url('validator/rekanan_tervalidasi/encryption_spt/') ?>">
                    <input type="hidden" name="id_url_spt">
                    <input type="hidden" name="type" value="dekrip">
                    <center>
                        <img src="<?= base_url('assets/img/private.jpg') ?>" width="100%" alt="">
                        <p>Silakan Masukan Token Untuk Mendkrip File Anda </p>
                        <div class="token_generate_spt">

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
                <a href="javascript:;" id="button_dekrip_generate_spt" onclick="GenerateDekrip_spt()" class="btn btn-success"> <i class="fas fa fa-check"> </i> Generate !!</a>
                <button disabled style="display:none" id="button_dekrip_generate_manipulasi_spt" class="btn btn-success"> <i class="fas fa fa-check"> </i> Generate !!</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fas fa fa-ban"> </i> Batal !!</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_enkrip_spt" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h5 class="modal-title">ENKRIP FILE</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_enkrip_spt" method="post">
                    <input type="hidden" name="url_encryption_spt" value="<?= base_url('validator/rekanan_tervalidasi/encryption_spt/') ?>">
                    <input type="hidden" name="id_url_spt">
                    <input type="hidden" name="type" value="enkrip">
                    <center>
                        <img src="<?= base_url('assets/img/private.jpg') ?>" width="100%" alt="">
                        <p>Silakan Masukan Token Untuk Mendkrip File Anda </p>
                        <div class="token_generate_spt">

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
                <a href="javascript:;" id="button_dekrip_generate_spt" onclick="GenerateEnkrip_spt()" class="btn btn-success"> <i class="fas fa fa-check"> </i> Generate !!</a>
                <button disabled style="display:none" id="button_dekrip_generate_manipulasi_spt" class="btn btn-success"> <i class="fas fa fa-check"> </i> Generate !!</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fas fa fa-ban"> </i> Batal !!</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_nonvalid_spt" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title text-white">Validasi Dokumen Siup</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form_nonvalid_spt">
                <div class="modal-body">
                    <input type="hidden" name="url_validasi_spt" value="<?= base_url('validator/rekanan_tervalidasi/validation_spt/') ?>">
                    <input type="hidden" name="id_url_spt">
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

<div class="modal fade" id="modal_valid_spt" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title text-white">Validasi Dokumen Siup</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form_valid_spt">
                <div class="modal-body">
                    <input type="hidden" name="url_validasi_spt" value="<?= base_url('validator/rekanan_tervalidasi/validation_spt/') ?>">
                    <input type="hidden" name="id_url_spt">
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
<!-- end modal pajak spt -->



<!-- modal pajak neraca -->
<div class="modal fade" id="modal_dekrip_neraca" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h5 class="modal-title">DEKRIP FILE</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_dekrip_neraca" method="post">
                    <input type="hidden" name="url_encryption_neraca" value="<?= base_url('validator/rekanan_tervalidasi/encryption_neraca/') ?>">
                    <input type="hidden" name="id_url_neraca">
                    <input type="hidden" name="type" value="dekrip">
                    <center>
                        <img src="<?= base_url('assets/img/private.jpg') ?>" width="100%" alt="">
                        <p>Silakan Masukan Token Untuk Mendkrip File Anda </p>
                        <div class="token_generate_neraca">

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
                <a href="javascript:;" id="button_dekrip_generate_neraca" onclick="GenerateDekrip_neraca()" class="btn btn-success"> <i class="fas fa fa-check"> </i> Generate !!</a>
                <button disabled style="display:none" id="button_dekrip_generate_manipulasi_neraca" class="btn btn-success"> <i class="fas fa fa-check"> </i> Generate !!</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fas fa fa-ban"> </i> Batal !!</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_enkrip_neraca" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h5 class="modal-title">ENKRIP FILE</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_enkrip_neraca" method="post">
                    <input type="hidden" name="url_encryption_neraca" value="<?= base_url('validator/rekanan_tervalidasi/encryption_neraca/') ?>">
                    <input type="hidden" name="id_url_neraca">
                    <input type="hidden" name="type" value="enkrip">
                    <center>
                        <img src="<?= base_url('assets/img/private.jpg') ?>" width="100%" alt="">
                        <p>Silakan Masukan Token Untuk Mendkrip File Anda </p>
                        <div class="token_generate_neraca">

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
                <a href="javascript:;" id="button_dekrip_generate_neraca" onclick="GenerateEnkrip_neraca()" class="btn btn-success"> <i class="fas fa fa-check"> </i> Generate !!</a>
                <button disabled style="display:none" id="button_dekrip_generate_manipulasi_neraca" class="btn btn-success"> <i class="fas fa fa-check"> </i> Generate !!</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fas fa fa-ban"> </i> Batal !!</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_nonvalid_neraca" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title text-white">Validasi Dokumen Siup</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form_nonvalid_neraca">
                <div class="modal-body">
                    <input type="hidden" name="url_validasi_neraca" value="<?= base_url('validator/rekanan_tervalidasi/validation_neraca/') ?>">
                    <input type="hidden" name="id_url_neraca">
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

<div class="modal fade" id="modal_valid_neraca" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title text-white">Validasi Dokumen Siup</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form_valid_neraca">
                <div class="modal-body">
                    <input type="hidden" name="url_validasi_neraca" value="<?= base_url('validator/rekanan_tervalidasi/validation_neraca/') ?>">
                    <input type="hidden" name="id_url_neraca">
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
<!-- end modal pajak spt -->


<!-- modal pajak keuangan -->
<div class="modal fade" id="modal_dekrip_keuangan" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h5 class="modal-title">DEKRIP FILE</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_dekrip_keuangan" method="post">
                    <input type="hidden" name="url_encryption_keuangan" value="<?= base_url('validator/rekanan_tervalidasi/encryption_keuangan/') ?>">
                    <input type="hidden" name="id_url_keuangan">
                    <input type="hidden" name="type" value="dekrip">
                    <center>
                        <img src="<?= base_url('assets/img/private.jpg') ?>" width="100%" alt="">
                        <p>Silakan Masukan Token Untuk Mendkrip File Anda </p>
                        <div class="token_generate_keuangan">

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
                <a href="javascript:;" id="button_dekrip_generate_keuangan" onclick="GenerateDekrip_keuangan()" class="btn btn-success"> <i class="fas fa fa-check"> </i> Generate !!</a>
                <button disabled style="display:none" id="button_dekrip_generate_manipulasi_keuangan" class="btn btn-success"> <i class="fas fa fa-check"> </i> Generate !!</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fas fa fa-ban"> </i> Batal !!</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_enkrip_keuangan" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h5 class="modal-title">ENKRIP FILE</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_enkrip_keuangan" method="post">
                    <input type="hidden" name="url_encryption_keuangan" value="<?= base_url('validator/rekanan_tervalidasi/encryption_keuangan/') ?>">
                    <input type="hidden" name="id_url_keuangan">
                    <input type="hidden" name="type" value="enkrip">
                    <center>
                        <img src="<?= base_url('assets/img/private.jpg') ?>" width="100%" alt="">
                        <p>Silakan Masukan Token Untuk Mendkrip File Anda </p>
                        <div class="token_generate_keuangan">

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
                <a href="javascript:;" id="button_dekrip_generate_keuangan" onclick="GenerateEnkrip_keuangan()" class="btn btn-success"> <i class="fas fa fa-check"> </i> Generate !!</a>
                <button disabled style="display:none" id="button_dekrip_generate_manipulasi_keuangan" class="btn btn-success"> <i class="fas fa fa-check"> </i> Generate !!</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fas fa fa-ban"> </i> Batal !!</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_nonvalid_keuangan" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title text-white">Validasi Dokumen Siup</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form_nonvalid_keuangan">
                <div class="modal-body">
                    <input type="hidden" name="url_validasi_keuangan" value="<?= base_url('validator/rekanan_tervalidasi/validation_keuangan/') ?>">
                    <input type="hidden" name="id_url_keuangan">
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

<div class="modal fade" id="modal_valid_keuangan" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title text-white">Validasi Dokumen Siup</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form_valid_keuangan">
                <div class="modal-body">
                    <input type="hidden" name="url_validasi_keuangan" value="<?= base_url('validator/rekanan_tervalidasi/validation_keuangan/') ?>">
                    <input type="hidden" name="id_url_keuangan">
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
<!-- end modal pajak spt -->