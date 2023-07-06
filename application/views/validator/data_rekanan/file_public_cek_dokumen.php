<script>
    load_data()

    function load_data() {
        var url_get_vendor = $("[name='url_get_vendor']").val()
        var id_url_vendor = $("[name='id_url_vendor']").val()
        var url_gambar_pdf = $("[name='url_gambar_pdf']").val()
        $.ajax({
            method: "POST",
            url: url_get_vendor + id_url_vendor,
            dataType: "JSON",
            success: function(response) {
                if (response) {

                    // siup
                    var html = '';
                    if (response['row_siup'].id_vendor) {
                        if (response['row_siup'].sts_validasi == null) {
                            var tombol_validasi = '<a href="javascript:;" onclick="Valid_siup(\'' + response['row_siup'].id_url + '\')" class="btn btn-success btn-sm shadow-lg"><i class="fa-solid fa-square-check px-1"></i><small>Valid</small></a> ' +
                                '<a href="javascript:;"  onclick="NonValid_siup(\'' + response['row_siup'].id_url + '\')" class="btn btn-danger btn-sm shadow-lg"><i class="fa-solid fa-rectangle-xmark px-1"></i><small>Tidak Valid</small></a>';
                            var sts_validasi = '<span class="badge bg-secondary">Belum Di Periksa</span>'
                        } else if (response['row_siup'].sts_validasi == 1) {
                            var tombol_validasi = '<button href="javascript:;" class="btn btn-success btn-sm shadow-lg" disabled><i class="fa-solid fa-square-check px-1" ></i><small>Valid</small></button> ' +
                                '<a href="javascript:;"  onclick="NonValid_siup(\'' + response['row_siup'].id_url + '\')" class="btn btn-danger btn-sm shadow-lg"><i class="fa-solid fa-rectangle-xmark px-1"></i><small>Tidak Valid</small></a>';
                            var sts_validasi = '<span class="badge bg-success">Sudah Valid</span>'
                        } else if (response['row_siup'].sts_validasi == 2) {
                            var tombol_validasi = '<a href="javascript:;" onclick="Valid_siup(\'' + response['row_siup'].id_url + '\')" class="btn btn-success btn-sm shadow-lg"><i class="fa-solid fa-square-check px-1"></i><small>Valid</small></a> ' +
                                '<a href="javascript:;"  onclick="NonValid_siup(\'' + response['row_siup'].id_url + '\')" class="btn btn-danger btn-sm shadow-lg"><i class="fa-solid fa-rectangle-xmark px-1"></i><small>Tidak Valid</small></a>';
                            var sts_validasi = '<span class="badge bg-danger">Tidak Valid</span>'
                        }
                        if (response['row_siup'].sts_token_dokumen == 1) {
                            var dokumen = '<span class="badge bg-danger">DOKUMEN TERENKRIPSI <i class="fas fa-lock mr-2"></i></span>';
                            var dekrip = '<a href="javascript:;" onclick="DekripEnkrip_siup(\'' + response['row_siup'].id_url + '\'' + ',' + '\'' + 'dekrip' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-lock-open mr-2"></i> Dekripsi Dokumen</a>';
                            $('.token_generate_siup').html('<div class="input-group"><span class="input-group-text"><i class="fas fa-qrcode"></i></span><textarea class="form-control form-control-sm" disabled>' + response['row_siup']['token_dokumen'] + '</textarea></div>');
                        } else if (response['row_siup'].sts_token_dokumen == 2) {
                            var dokumen = '<a href="javascript:;" style="white-space: nowrap;width: 200px;overflow: hidden;text-overflow: ellipsis;" onclick="DownloadFile_siup(\'' + response['row_siup'].id_url + '\')" class="btn btn-sm btn-light btn-block text-dark"><img src="' + url_gambar_pdf + '" width="10%" alt=""> ' + response['row_siup']['file_dokumen'] + '</a>';
                            var dekrip = '<a href="javascript:;" onclick="DekripEnkrip_siup(\'' + response['row_siup'].id_url + '\'' + ',' + '\'' + 'enkrip' + '\')" class="btn btn-success btn-sm"><i class="fas fa-lock-open mr-2"></i> Enkripsi Dokumen</a>';
                            $('.token_generate_siup').html('<div class="input-group"><span class="input-group-text"><i class="fas fa-qrcode"></i></span><textarea class="form-control form-control-sm" disabled>' + response['row_siup']['token_dokumen'] + '</textarea></div>');
                        }

                        if (response['row_siup'].sts_seumur_hidup == 1) {
                            var tgl_berlaku = '<label>Seumur Hidup</label>'
                        } else {
                            var tgl_berlaku = '<label>' + response['row_siup'].tgl_berlaku + '</label>'
                        }

                        html += '<tr>' +
                            '<td>' + response['row_siup'].nomor_surat + '</td>' +
                            '<td>' + tgl_berlaku + '</td>' +
                            '<td>' + dokumen + '</td>' +
                            '<td>' + dekrip + '</td>' +
                            '<td>' + sts_validasi + '</td>' +
                            '<td class="text-center">' + tombol_validasi +
                            '</td>' +
                            '</tr>';
                        $('#load_siup').html(html);

                        var url_kbli_siup = $('[name="url_kbli_siup"]').val()
                        $(document).ready(function() {
                            $('#tbl_kbli_siup').DataTable({
                                "responsive": true,
                                "ordering": true,
                                "processing": true,
                                "serverSide": true,
                                "dom": 'Bfrtip',
                                "bDestroy": true,
                                "autoWidth": false,
                                "buttons": ["excel", "pdf", "print", "colvis"],
                                "order": [],
                                "ajax": {
                                    "url": url_kbli_siup + response['row_siup'].id_vendor,
                                    "type": "POST",
                                },
                                "columnDefs": [{
                                    "target": [-1],
                                    "orderable": false
                                }],
                                "oLanguage": {
                                    "sSearch": "Pencarian : ",
                                    "sEmptyTable": "Data Tidak Tersedia",
                                    "sLoadingRecords": "Silahkan Tunggu - loading...",
                                    "sLengthMenu": "Menampilkan &nbsp;  _MENU_  &nbsp;   Data",
                                    "sZeroRecords": "Tidak Ada Data Yang Di Cari",
                                    "sProcessing": "Memuat Data...."
                                }
                            })
                        });

                    } else {

                    }

                    // end siup

                    // nib
                    if (response['row_nib'].id_vendor) {
                        var html_nib = '';
                        if (response['row_nib'].sts_validasi == null) {
                            var tombol_validasi = '<a href="javascript:;" onclick="Valid_nib(\'' + response['row_nib'].id_url + '\')" class="btn btn-success btn-sm shadow-lg"><i class="fa-solid fa-square-check px-1"></i><small>Valid</small></a> ' +
                                '<a href="javascript:;"  onclick="NonValid_nib(\'' + response['row_nib'].id_url + '\')" class="btn btn-danger btn-sm shadow-lg"><i class="fa-solid fa-rectangle-xmark px-1"></i><small>Tidak Valid</small></a>';
                            var sts_validasi = '<span class="badge bg-secondary">Belum Di Periksa</span>'
                        } else if (response['row_nib'].sts_validasi == 1) {
                            var tombol_validasi = '<button href="javascript:;" class="btn btn-success btn-sm shadow-lg" disabled><i class="fa-solid fa-square-check px-1" ></i><small>Valid</small></button> ' +
                                '<a href="javascript:;"  onclick="NonValid_nib(\'' + response['row_nib'].id_url + '\')" class="btn btn-danger btn-sm shadow-lg"><i class="fa-solid fa-rectangle-xmark px-1"></i><small>Tidak Valid</small></a>';
                            var sts_validasi = '<span class="badge bg-success">Sudah Valid</span>'
                        } else if (response['row_nib'].sts_validasi == 2) {
                            var tombol_validasi = '<a href="javascript:;" onclick="Valid_nib(\'' + response['row_nib'].id_url + '\')" class="btn btn-success btn-sm shadow-lg"><i class="fa-solid fa-square-check px-1"></i><small>Valid</small></a> ' +
                                '<a href="javascript:;"  onclick="NonValid_nib(\'' + response['row_nib'].id_url + '\')" class="btn btn-danger btn-sm shadow-lg"><i class="fa-solid fa-rectangle-xmark px-1"></i><small>Tidak Valid</small></a>';
                            var sts_validasi = '<span class="badge bg-danger">Tidak Valid</span>'
                        }
                        if (response['row_nib'].sts_token_dokumen == 1) {
                            var dokumen = '<span class="badge bg-danger">DOKUMEN TERENKRIPSI <i class="fas fa-lock mr-2"></i></span>';
                            var dekrip = '<a href="javascript:;" onclick="DekripEnkrip_nib(\'' + response['row_nib'].id_url + '\'' + ',' + '\'' + 'dekrip' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-lock-open mr-2"></i> Dekripsi Dokumen</a>';
                            $('.token_generate_nib').html('<div class="input-group"><span class="input-group-text"><i class="fas fa-qrcode"></i></span><textarea class="form-control form-control-sm" disabled>' + response['row_nib']['token_dokumen'] + '</textarea></div>');
                        } else if (response['row_nib'].sts_token_dokumen == 2) {
                            var dokumen = '<a href="javascript:;" style="white-space: nowrap;width: 200px;overflow: hidden;text-overflow: ellipsis;" onclick="DownloadFile_nib(\'' + response['row_nib'].id_url + '\')" class="btn btn-sm btn-light btn-block text-dark"><img src="' + url_gambar_pdf + '" width="10%" alt=""> ' + response['row_nib']['file_dokumen'] + '</a>';
                            var dekrip = '<a href="javascript:;" onclick="DekripEnkrip_nib(\'' + response['row_nib'].id_url + '\'' + ',' + '\'' + 'enkrip' + '\')" class="btn btn-success btn-sm"><i class="fas fa-lock-open mr-2"></i> Enkripsi Dokumen</a>';
                            $('.token_generate_nib').html('<div class="input-group"><span class="input-group-text"><i class="fas fa-qrcode"></i></span><textarea class="form-control form-control-sm" disabled>' + response['row_nib']['token_dokumen'] + '</textarea></div>');
                        }
                        if (response['row_nib'].sts_seumur_hidup == 1) {
                            var tgl_berlaku = '<label>Seumur Hidup</label>'
                        } else {
                            var tgl_berlaku = '<label>' + response['row_nib'].tgl_berlaku + '</label>'
                        }
                        html_nib += '<tr>' +
                            '<td>' + response['row_nib'].nomor_surat + '</td>' +
                            '<td>' + tgl_berlaku + '</td>' +
                            '<td>' + dokumen + '</td>' +
                            '<td>' + dekrip + '</td>' +
                            '<td>' + sts_validasi + '</td>' +
                            '<td class="text-center">' + tombol_validasi +
                            '</td>' +
                            '</tr>';
                        $('#load_nib').html(html_nib);

                        var url_kbli_nib = $('[name="url_kbli_nib"]').val()
                        $(document).ready(function() {
                            $('#tbl_kbli_nib').DataTable({
                                "responsive": true,
                                "ordering": true,
                                "processing": true,
                                "serverSide": true,
                                "dom": 'Bfrtip',
                                "bDestroy": true,
                                "autoWidth": false,
                                "buttons": ["excel", "pdf", "print", "colvis"],
                                "order": [],
                                "ajax": {
                                    "url": url_kbli_nib + response['row_nib'].id_vendor,
                                    "type": "POST",
                                },
                                "columnDefs": [{
                                    "target": [-1],
                                    "orderable": false
                                }],
                                "oLanguage": {
                                    "sSearch": "Pencarian : ",
                                    "sEmptyTable": "Data Tidak Tersedia",
                                    "sLoadingRecords": "Silahkan Tunggu - loading...",
                                    "sLengthMenu": "Menampilkan &nbsp;  _MENU_  &nbsp;   Data",
                                    "sZeroRecords": "Tidak Ada Data Yang Di Cari",
                                    "sProcessing": "Memuat Data...."
                                }
                            })
                        });
                    } else {

                    }

                    // end nib
                } else {


                }
            }
        })
    }


    // JS SIUP CRUD
    function DekripEnkrip_siup(id_url, type) {
        if (type == 'dekrip') {
            var id_url_siup = $('[name="id_url_siup"]').val(id_url)
            $('#modal_dekrip_siup').modal('show');
            $('#form_dekrip_siup')[0].reset();
        } else {
            var id_url_siup = $('[name="id_url_siup"]').val(id_url)
            $('#modal_enkrip_siup').modal('show');
            $('#form_enkrip_siup')[0].reset();
        }

    }

    function GenerateEnkrip_siup() {
        var url_encryption_siup = $('[name="url_encryption_siup"]').val();
        var modal_enkrip_siup = $('#modal_enkrip_siup');
        var id_url = $('[name="id_url_siup"]').val();
        $.ajax({
            method: "POST",
            url: url_encryption_siup + id_url,
            dataType: "JSON",
            data: $('#form_enkrip_siup').serialize(),
            // beforeSend: function() {
            //     $('#button_dekrip_generate').css('display', 'none');
            //     $('#button_dekrip_generate_manipulasi').css('display', 'block');
            // },
            success: function(response) {
                if (response['maaf']) {
                    Swal.fire(response['maaf'], 'Token Tidak Valid!', 'warning')
                } else {
                    let timerInterval
                    Swal.fire({
                        title: 'Sedang Proses Enkripsi!',
                        html: 'Proses Enkripsi <b></b>',
                        timer: 2000,
                        timerProgressBar: true,
                        didOpen: () => {
                            Swal.showLoading()
                            const b = Swal.getHtmlContainer().querySelector('b')
                            timerInterval = setInterval(() => {
                                // b.textContent = Swal.getTimerRight()
                            }, 100)
                        },
                        willClose: () => {
                            clearInterval(timerInterval)
                            Swal.fire('Dokumen Berhasil Di Enkripsi!', '', 'success')
                            load_data()
                            // $('#button_dekrip_generate').css('display', 'block');
                            // $('#button_dekrip_generate_manipulasi').css('display', 'none');
                            modal_enkrip_siup.modal('hide');
                        }
                    }).then((result) => {
                        /* Read more about handling dismissals below */
                        if (result.dismiss === Swal.DismissReason.timer) {

                        }
                    })
                }
            }
        })
    }

    function GenerateDekrip_siup() {
        var url_encryption_siup = $('[name="url_encryption_siup"]').val();
        var modal_dekrip_siup = $('#modal_dekrip_siup');
        var id_url = $('[name="id_url_siup"]').val();
        $.ajax({
            method: "POST",
            url: url_encryption_siup + id_url,
            dataType: "JSON",
            data: $('#form_dekrip_siup').serialize(),
            // beforeSend: function() {
            //     $('#button_dekrip_generate').css('display', 'none');
            //     $('#button_dekrip_generate_manipulasi').css('display', 'block');
            // },
            success: function(response) {
                if (response['maaf']) {
                    Swal.fire(response['maaf'], 'Token Tidak Valid!', 'warning')
                } else {
                    let timerInterval
                    Swal.fire({
                        title: 'Sedang Proses Enkripsi!',
                        html: 'Proses Enkripsi <b></b>',
                        timer: 2000,
                        timerProgressBar: true,
                        didOpen: () => {
                            Swal.showLoading()
                            const b = Swal.getHtmlContainer().querySelector('b')
                            timerInterval = setInterval(() => {
                                // b.textContent = Swal.getTimerRight()
                            }, 100)
                        },
                        willClose: () => {
                            clearInterval(timerInterval)
                            Swal.fire('Dokumen Berhasil Di Enkripsi!', '', 'success')
                            load_data()
                            // $('#button_dekrip_generate').css('display', 'block');
                            // $('#button_dekrip_generate_manipulasi').css('display', 'none');
                            modal_dekrip_siup.modal('hide');
                        }
                    }).then((result) => {
                        /* Read more about handling dismissals below */
                        if (result.dismiss === Swal.DismissReason.timer) {

                        }
                    })
                }
            }
        })
    }


    function Valid_siup(id_url, type = '') {
        if (type == 'terima_kbli') {
            $('#modal_valid_siup').modal('show')
            $('[name="url_validasi_siup"]').val();
            $('[name="id_url_siup"]').val(id_url);
            $('#kbli_valid').val(type)
        } else {
            $('#modal_valid_siup').modal('show')
            $('[name="url_validasi_siup"]').val();
            $('[name="id_url_siup"]').val(id_url);
            $('#kbli_valid').val('')
        }

    }

    function NonValid_siup(id_url, type = '') {
        if (type == 'tolak_kbli') {
            $('#modal_nonvalid_siup').modal('show')
            $('[name="url_validasi_siup"]').val();
            $('[name="id_url_siup"]').val(id_url);
            $('#kbli_nonvalid').val(type)
        } else {
            $('#modal_nonvalid_siup').modal('show')
            $('[name="url_validasi_siup"]').val();
            $('[name="id_url_siup"]').val(id_url);
            $('#kbli_nonvalid').val('')
        }

    }

    function DownloadFile_siup(id_url) {
        var url_download_siup = $('[name="url_download_siup"]').val()
        location.href = url_download_siup + id_url;
    }

    var form_valid_siup = $('#form_valid_siup');
    form_valid_siup.on('submit', function(e) {
        e.preventDefault();
        var url_post = $('[name="url_validasi_siup"]').val()
        $.ajax({
            url: url_post,
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(response) {
                let timerInterval
                Swal.fire({
                    title: 'Sedang Proses Menyimpan Data!',
                    html: 'Harap Tunggu <b></b>',
                    timer: 2000,
                    timerProgressBar: true,
                    didOpen: () => {
                        Swal.showLoading()
                        const b = Swal.getHtmlContainer().querySelector('b')
                        timerInterval = setInterval(() => {
                            // b.textContent = Swal.getTimerRight()
                        }, 100)
                    },
                    willClose: () => {
                        clearInterval(timerInterval)
                        $('#modal_valid_siup').modal('hide')
                        Swal.fire('Dokumen Berhasil Di Validasi!', '', 'success')
                        load_data()
                    }
                }).then((result) => {
                    /* Read more about handling dismissals below */
                    if (result.dismiss === Swal.DismissReason.timer) {

                    }
                })
            }
        })
    })

    var form_nonvalid_siup = $('#form_nonvalid_siup');
    form_nonvalid_siup.on('submit', function(e) {
        e.preventDefault();
        var url_post = $('[name="url_validasi_siup"]').val()
        $.ajax({
            url: url_post,
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(response) {
                let timerInterval
                Swal.fire({
                    title: 'Sedang Proses Menyimpan Data!',
                    html: 'Harap Tunggu <b></b>',
                    timer: 2000,
                    timerProgressBar: true,
                    didOpen: () => {
                        Swal.showLoading()
                        const b = Swal.getHtmlContainer().querySelector('b')
                        timerInterval = setInterval(() => {
                            // b.textContent = Swal.getTimerRight()
                        }, 100)
                    },
                    willClose: () => {
                        clearInterval(timerInterval)
                        $('#modal_nonvalid_siup').modal('hide')
                        Swal.fire('Dokumen Berhasil Di Validasi!', '', 'success')
                        load_data()
                    }
                }).then((result) => {
                    /* Read more about handling dismissals below */
                    if (result.dismiss === Swal.DismissReason.timer) {

                    }
                })
            }
        })
    })

    // END JS SIUP CRUD


    // JS NIB CRUD
    function DekripEnkrip_nib(id_url, type) {
        if (type == 'dekrip') {
            var id_url_nib = $('[name="id_url_nib"]').val(id_url)
            $('#modal_dekrip_nib').modal('show');
        } else {
            var id_url_nib = $('[name="id_url_nib"]').val(id_url)
            $('#modal_enkrip_nib').modal('show');
        }

    }

    function GenerateEnkrip_nib() {
        var url_encryption_nib = $('[name="url_encryption_nib"]').val();
        var modal_enkrip_nib = $('#modal_enkrip_nib');
        var id_url = $('[name="id_url_nib"]').val();
        $.ajax({
            method: "POST",
            url: url_encryption_nib + id_url,
            dataType: "JSON",
            data: $('#form_enkrip_nib').serialize(),
            // beforeSend: function() {
            //     $('#button_dekrip_generate').css('display', 'none');
            //     $('#button_dekrip_generate_manipulasi').css('display', 'block');
            // },
            success: function(response) {
                if (response['maaf']) {
                    Swal.fire(response['maaf'], 'Token Tidak Valid!', 'warning')
                } else {
                    let timerInterval
                    Swal.fire({
                        title: 'Sedang Proses Enkripsi!',
                        html: 'Proses Enkripsi <b></b>',
                        timer: 2000,
                        timerProgressBar: true,
                        didOpen: () => {
                            Swal.showLoading()
                            const b = Swal.getHtmlContainer().querySelector('b')
                            timerInterval = setInterval(() => {
                                // b.textContent = Swal.getTimerRight()
                            }, 100)
                        },
                        willClose: () => {
                            clearInterval(timerInterval)
                            Swal.fire('Dokumen Berhasil Di Enkripsi!', '', 'success')
                            load_data()
                            // $('#button_dekrip_generate').css('display', 'block');
                            // $('#button_dekrip_generate_manipulasi').css('display', 'none');
                            modal_enkrip_nib.modal('hide');
                        }
                    }).then((result) => {
                        /* Read more about handling dismissals below */
                        if (result.dismiss === Swal.DismissReason.timer) {

                        }
                    })
                }
            }
        })
    }

    function GenerateDekrip_nib() {
        var url_encryption_nib = $('[name="url_encryption_nib"]').val();
        var modal_dekrip_nib = $('#modal_dekrip_nib');
        var id_url = $('[name="id_url_nib"]').val();
        $.ajax({
            method: "POST",
            url: url_encryption_nib + id_url,
            dataType: "JSON",
            data: $('#form_dekrip_nib').serialize(),
            // beforeSend: function() {
            //     $('#button_dekrip_generate').css('display', 'none');
            //     $('#button_dekrip_generate_manipulasi').css('display', 'block');
            // },
            success: function(response) {
                if (response['maaf']) {
                    Swal.fire(response['maaf'], 'Token Tidak Valid!', 'warning')
                } else {
                    let timerInterval
                    Swal.fire({
                        title: 'Sedang Proses Enkripsi!',
                        html: 'Proses Enkripsi <b></b>',
                        timer: 2000,
                        timerProgressBar: true,
                        didOpen: () => {
                            Swal.showLoading()
                            const b = Swal.getHtmlContainer().querySelector('b')
                            timerInterval = setInterval(() => {
                                // b.textContent = Swal.getTimerRight()
                            }, 100)
                        },
                        willClose: () => {
                            clearInterval(timerInterval)
                            Swal.fire('Dokumen Berhasil Di Enkripsi!', '', 'success')
                            load_data()
                            // $('#button_dekrip_generate').css('display', 'block');
                            // $('#button_dekrip_generate_manipulasi').css('display', 'none');
                            modal_dekrip_nib.modal('hide');
                        }
                    }).then((result) => {
                        /* Read more about handling dismissals below */
                        if (result.dismiss === Swal.DismissReason.timer) {

                        }
                    })
                }
            }
        })
    }


    function Valid_nib(id_url, type = '') {
        if (type == 'terima_kbli') {
            $('#modal_valid_nib').modal('show')
            $('[name="url_validasi_nib"]').val();
            $('[name="id_url_nib"]').val(id_url);
            $('#kbli_valid').val(type)
        } else {
            $('#modal_valid_nib').modal('show')
            $('[name="url_validasi_nib"]').val();
            $('[name="id_url_nib"]').val(id_url);
            $('#kbli_valid').val('')
        }

    }

    function NonValid_nib(id_url, type = '') {
        if (type == 'tolak_kbli') {
            $('#modal_nonvalid_nib').modal('show')
            $('[name="url_validasi_nib"]').val();
            $('[name="id_url_nib"]').val(id_url);
            $('#kbli_nonvalid').val(type)
        } else {
            $('#modal_nonvalid_nib').modal('show')
            $('[name="url_validasi_nib"]').val();
            $('[name="id_url_nib"]').val(id_url);
            $('#kbli_nonvalid').val('')
        }

    }

    function DownloadFile_nib(id_url) {
        var url_download_nib = $('[name="url_download_nib"]').val()
        location.href = url_download_nib + id_url;
    }

    var form_valid_nib = $('#form_valid_nib');
    form_valid_nib.on('submit', function(e) {
        e.preventDefault();
        var url_post = $('[name="url_validasi_nib"]').val()
        $.ajax({
            url: url_post,
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(response) {
                let timerInterval
                Swal.fire({
                    title: 'Sedang Proses Menyimpan Data!',
                    html: 'Harap Tunggu <b></b>',
                    timer: 2000,
                    timerProgressBar: true,
                    didOpen: () => {
                        Swal.showLoading()
                        const b = Swal.getHtmlContainer().querySelector('b')
                        timerInterval = setInterval(() => {
                            // b.textContent = Swal.getTimerRight()
                        }, 100)
                    },
                    willClose: () => {
                        clearInterval(timerInterval)
                        $('#modal_valid_nib').modal('hide')
                        Swal.fire('Dokumen Berhasil Di Validasi!', '', 'success')
                        load_data()
                    }
                }).then((result) => {
                    /* Read more about handling dismissals below */
                    if (result.dismiss === Swal.DismissReason.timer) {

                    }
                })
            }
        })
    })

    var form_nonvalid_nib = $('#form_nonvalid_nib');
    form_nonvalid_nib.on('submit', function(e) {
        e.preventDefault();
        var url_post = $('[name="url_validasi_nib"]').val()
        $.ajax({
            url: url_post,
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(response) {
                let timerInterval
                Swal.fire({
                    title: 'Sedang Proses Menyimpan Data!',
                    html: 'Harap Tunggu <b></b>',
                    timer: 2000,
                    timerProgressBar: true,
                    didOpen: () => {
                        Swal.showLoading()
                        const b = Swal.getHtmlContainer().querySelector('b')
                        timerInterval = setInterval(() => {
                            // b.textContent = Swal.getTimerRight()
                        }, 100)
                    },
                    willClose: () => {
                        clearInterval(timerInterval)
                        $('#modal_nonvalid_nib').modal('hide')
                        Swal.fire('Dokumen Berhasil Di Validasi!', '', 'success')
                        load_data()
                    }
                }).then((result) => {
                    /* Read more about handling dismissals below */
                    if (result.dismiss === Swal.DismissReason.timer) {

                    }
                })
            }
        })
    })

    // END JS NIB CRUD
</script>