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

                // siup
                var html = '';
                if (response['row_siup']) {
                    var html_siup = '';
                    if (response['row_siup'].sts_validasi == null || response['row_siup'].sts_validasi == 0) {
                        var tombol_validasi = '<a href="javascript:;" onclick="Valid_siup(\'' + response['row_siup'].id_url + '\')" class="btn btn-success btn-sm shadow-lg"><i class="fa-solid fa-square-check px-1"></i><small>Valid</small></a> ' +
                            '<a href="javascript:;" onclick="NonValid_siup(\'' + response['row_siup'].id_url + '\')" class="btn btn-danger btn-sm shadow-lg"><i class="fa-solid fa-rectangle-xmark px-1"></i><small>Tidak Valid</small></a>';
                        var sts_validasi = '<span class="badge bg-secondary">Belum Di Periksa</span>'
                    } else if (response['row_siup'].sts_validasi == 1) {
                        var tombol_validasi = '<button href="javascript:;" class="btn btn-success btn-sm shadow-lg" disabled><i class="fa-solid fa-square-check px-1"></i><small>Valid</small></button> ' +
                            '<a href="javascript:;" onclick="NonValid_siup(\'' + response['row_siup'].id_url + '\')" class="btn btn-danger btn-sm shadow-lg"><i class="fa-solid fa-rectangle-xmark px-1"></i><small>Tidak Valid</small></a>';
                        var sts_validasi = '<span class="badge bg-success">Sudah Valid</span>'
                    } else if (response['row_siup'].sts_validasi == 2) {
                        var tombol_validasi = '<a href="javascript:;" onclick="Valid_siup(\'' + response['row_siup'].id_url + '\')" class="btn btn-success btn-sm shadow-lg"><i class="fa-solid fa-square-check px-1"></i><small>Valid</small></a> ' +
                            '<a href="javascript:;" onclick="NonValid_siup(\'' + response['row_siup'].id_url + '\')" class="btn btn-danger btn-sm shadow-lg"><i class="fa-solid fa-rectangle-xmark px-1"></i><small>Tidak Valid</small></a>';
                        var sts_validasi = '<span class="badge bg-danger">Tidak Valid</span>'
                    } else if (response['row_siup'].sts_validasi == 3) {
                        var tombol_validasi = '<a href="javascript:;" onclick="Valid_siup(\'' + response['row_siup'].id_url + '\')" class="btn btn-success btn-sm shadow-lg"><i class="fa-solid fa-square-check px-1"></i><small>Valid</small></a> ' +
                            '<a href="javascript:;" onclick="NonValid_siup(\'' + response['row_siup'].id_url + '\')" class="btn btn-danger btn-sm shadow-lg"><i class="fa-solid fa-rectangle-xmark px-1"></i><small>Tidak Valid</small></a>';
                        var sts_validasi = '<span class="badge bg-warning">Revisi</span>'
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
                    if (response['row_siup'].nama_validator) {
                        var nama_validator = response['row_siup'].nama_validator
                    } else {
                        var nama_validator = '-'
                    }
                    html_siup += '<tr>' +
                        '<td>' + response['row_siup'].nomor_surat + '</td>' +
                        '<td>' + tgl_berlaku + '</td>' +
                        '<td>' + dokumen + '</td>' +
                        '<td>' + dekrip + '</td>' +
                        '<td>' + sts_validasi + '</td>' +
                        '<td>' + nama_validator + '</td>' +
                        '<td class="text-center">' + tombol_validasi +
                        '</td>' +
                        '</tr>';
                    $('#load_siup').html(html_siup);

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
                                "sLengthMenu": "Menampilkan &nbsp; _MENU_ &nbsp; Data",
                                "sZeroRecords": "Tidak Ada Data Yang Di Cari",
                                "sProcessing": "Memuat Data...."
                            }
                        })
                    });
                } else {

                }
                //  siujk
                if (response['row_siujk']) {
                    var html_siujk = '';
                    if (response['row_siujk'].sts_validasi == null || response['row_siujk'].sts_validasi == 0) {
                        var tombol_validasi = '<a href="javascript:;" onclick="Valid_siujk(\'' + response['row_siujk'].id_url + '\')" class="btn btn-success btn-sm shadow-lg"><i class="fa-solid fa-square-check px-1"></i><small>Valid</small></a> ' +
                            '<a href="javascript:;" onclick="NonValid_siujk(\'' + response['row_siujk'].id_url + '\')" class="btn btn-danger btn-sm shadow-lg"><i class="fa-solid fa-rectangle-xmark px-1"></i><small>Tidak Valid</small></a>';
                        var sts_validasi = '<span class="badge bg-secondary">Belum Di Periksa</span>'
                    } else if (response['row_siujk'].sts_validasi == 1) {
                        var tombol_validasi = '<button href="javascript:;" class="btn btn-success btn-sm shadow-lg" disabled><i class="fa-solid fa-square-check px-1"></i><small>Valid</small></button> ' +
                            '<a href="javascript:;" onclick="NonValid_siujk(\'' + response['row_siujk'].id_url + '\')" class="btn btn-danger btn-sm shadow-lg"><i class="fa-solid fa-rectangle-xmark px-1"></i><small>Tidak Valid</small></a>';
                        var sts_validasi = '<span class="badge bg-success">Sudah Valid</span>'
                    } else if (response['row_siujk'].sts_validasi == 2) {
                        var tombol_validasi = '<a href="javascript:;" onclick="Valid_siujk(\'' + response['row_siujk'].id_url + '\')" class="btn btn-success btn-sm shadow-lg"><i class="fa-solid fa-square-check px-1"></i><small>Valid</small></a> ' +
                            '<a href="javascript:;" onclick="NonValid_siujk(\'' + response['row_siujk'].id_url + '\')" class="btn btn-danger btn-sm shadow-lg"><i class="fa-solid fa-rectangle-xmark px-1"></i><small>Tidak Valid</small></a>';
                        var sts_validasi = '<span class="badge bg-danger">Tidak Valid</span>'
                    } else if (response['row_siujk'].sts_validasi == 3) {
                        var tombol_validasi = '<a href="javascript:;" onclick="Valid_siujk(\'' + response['row_siujk'].id_url + '\')" class="btn btn-success btn-sm shadow-lg"><i class="fa-solid fa-square-check px-1"></i><small>Valid</small></a> ' +
                            '<a href="javascript:;" onclick="NonValid_siujk(\'' + response['row_siujk'].id_url + '\')" class="btn btn-danger btn-sm shadow-lg"><i class="fa-solid fa-rectangle-xmark px-1"></i><small>Tidak Valid</small></a>';
                        var sts_validasi = '<span class="badge bg-warning">Revisi</span>'
                    }
                    if (response['row_siujk'].sts_token_dokumen == 1) {
                        var dokumen = '<span class="badge bg-danger">DOKUMEN TERENKRIPSI <i class="fas fa-lock mr-2"></i></span>';
                        var dekrip = '<a href="javascript:;" onclick="DekripEnkrip_siujk(\'' + response['row_siujk'].id_url + '\'' + ',' + '\'' + 'dekrip' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-lock-open mr-2"></i> Dekripsi Dokumen</a>';
                        $('.token_generate_siujk').html('<div class="input-group"><span class="input-group-text"><i class="fas fa-qrcode"></i></span><textarea class="form-control form-control-sm" disabled>' + response['row_siujk']['token_dokumen'] + '</textarea></div>');
                    } else if (response['row_siujk'].sts_token_dokumen == 2) {
                        var dokumen = '<a href="javascript:;" style="white-space: nowrap;width: 200px;overflow: hidden;text-overflow: ellipsis;" onclick="DownloadFile_siujk(\'' + response['row_siujk'].id_url + '\')" class="btn btn-sm btn-light btn-block text-dark"><img src="' + url_gambar_pdf + '" width="10%" alt=""> ' + response['row_siujk']['file_dokumen'] + '</a>';
                        var dekrip = '<a href="javascript:;" onclick="DekripEnkrip_siujk(\'' + response['row_siujk'].id_url + '\'' + ',' + '\'' + 'enkrip' + '\')" class="btn btn-success btn-sm"><i class="fas fa-lock-open mr-2"></i> Enkripsi Dokumen</a>';
                        $('.token_generate_siujk').html('<div class="input-group"><span class="input-group-text"><i class="fas fa-qrcode"></i></span><textarea class="form-control form-control-sm" disabled>' + response['row_siujk']['token_dokumen'] + '</textarea></div>');
                    }
                    if (response['row_siujk'].sts_seumur_hidup == 1) {
                        var tgl_berlaku = '<label>Seumur Hidup</label>'
                    } else {
                        var tgl_berlaku = '<label>' + response['row_siujk'].tgl_berlaku + '</label>'
                    }
                    if (response['row_siujk'].nama_validator) {
                        var nama_validator = response['row_siujk'].nama_validator
                    } else {
                        var nama_validator = '-'
                    }
                    html_siujk += '<tr>' +
                        '<td>' + response['row_siujk'].nomor_surat + '</td>' +
                        '<td>' + tgl_berlaku + '</td>' +
                        '<td>' + dokumen + '</td>' +
                        '<td>' + dekrip + '</td>' +
                        '<td>' + sts_validasi + '</td>' +
                        '<td>' + nama_validator + '</td>' +
                        '<td class="text-center">' + tombol_validasi +
                        '</td>' +
                        '</tr>';
                    $('#load_siujk').html(html_siujk);

                    var url_kbli_siujk = $('[name="url_kbli_siujk"]').val()
                    $(document).ready(function() {
                        $('#tbl_kbli_siujk').DataTable({
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
                                "url": url_kbli_siujk + response['row_siujk'].id_vendor,
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
                                "sLengthMenu": "Menampilkan &nbsp; _MENU_ &nbsp; Data",
                                "sZeroRecords": "Tidak Ada Data Yang Di Cari",
                                "sProcessing": "Memuat Data...."
                            }
                        })
                    });
                } else {

                }

                // end siujk

                // sbu
                // sbu
                if (response['row_sbu']) {
                    var html_sbu = '';
                    if (response['row_sbu'].sts_validasi == null || response['row_sbu'].sts_validasi == 0) {
                        var tombol_validasi = '<a href="javascript:;" onclick="Valid_sbu(\'' + response['row_sbu'].id_url + '\')" class="btn btn-success btn-sm shadow-lg"><i class="fa-solid fa-square-check px-1"></i><small>Valid</small></a> ' +
                            '<a href="javascript:;" onclick="NonValid_sbu(\'' + response['row_sbu'].id_url + '\')" class="btn btn-danger btn-sm shadow-lg"><i class="fa-solid fa-rectangle-xmark px-1"></i><small>Tidak Valid</small></a>';
                        var sts_validasi = '<span class="badge bg-secondary">Belum Di Periksa</span>'
                    } else if (response['row_sbu'].sts_validasi == 1) {
                        var tombol_validasi = '<button href="javascript:;" class="btn btn-success btn-sm shadow-lg" disabled><i class="fa-solid fa-square-check px-1"></i><small>Valid</small></button> ' +
                            '<a href="javascript:;" onclick="NonValid_sbu(\'' + response['row_sbu'].id_url + '\')" class="btn btn-danger btn-sm shadow-lg"><i class="fa-solid fa-rectangle-xmark px-1"></i><small>Tidak Valid</small></a>';
                        var sts_validasi = '<span class="badge bg-success">Sudah Valid</span>'
                    } else if (response['row_sbu'].sts_validasi == 2) {
                        var tombol_validasi = '<a href="javascript:;" onclick="Valid_sbu(\'' + response['row_sbu'].id_url + '\')" class="btn btn-success btn-sm shadow-lg"><i class="fa-solid fa-square-check px-1"></i><small>Valid</small></a> ' +
                            '<a href="javascript:;" onclick="NonValid_sbu(\'' + response['row_sbu'].id_url + '\')" class="btn btn-danger btn-sm shadow-lg"><i class="fa-solid fa-rectangle-xmark px-1"></i><small>Tidak Valid</small></a>';
                        var sts_validasi = '<span class="badge bg-danger">Tidak Valid</span>'
                    } else if (response['row_sbu'].sts_validasi == 3) {
                        var tombol_validasi = '<a href="javascript:;" onclick="Valid_sbu(\'' + response['row_sbu'].id_url + '\')" class="btn btn-success btn-sm shadow-lg"><i class="fa-solid fa-square-check px-1"></i><small>Valid</small></a> ' +
                            '<a href="javascript:;" onclick="NonValid_sbu(\'' + response['row_sbu'].id_url + '\')" class="btn btn-danger btn-sm shadow-lg"><i class="fa-solid fa-rectangle-xmark px-1"></i><small>Tidak Valid</small></a>';
                        var sts_validasi = '<span class="badge bg-danger">Revisi</span>'
                    }
                    if (response['row_sbu'].sts_token_dokumen == 1) {
                        var dokumen = '<span class="badge bg-danger">DOKUMEN TERENKRIPSI <i class="fas fa-lock mr-2"></i></span>';
                        var dekrip = '<a href="javascript:;" onclick="DekripEnkrip_sbu(\'' + response['row_sbu'].id_url + '\'' + ',' + '\'' + 'dekrip' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-lock-open mr-2"></i> Dekripsi Dokumen</a>';
                        $('.token_generate_sbu').html('<div class="input-group"><span class="input-group-text"><i class="fas fa-qrcode"></i></span><textarea class="form-control form-control-sm" disabled>' + response['row_sbu']['token_dokumen'] + '</textarea></div>');
                    } else if (response['row_sbu'].sts_token_dokumen == 2) {
                        var dokumen = '<a href="javascript:;" style="white-space: nowrap;width: 200px;overflow: hidden;text-overflow: ellipsis;" onclick="DownloadFile_sbu(\'' + response['row_sbu'].id_url + '\')" class="btn btn-sm btn-light btn-block text-dark"><img src="' + url_gambar_pdf + '" width="10%" alt=""> ' + response['row_sbu']['file_dokumen'] + '</a>';
                        var dekrip = '<a href="javascript:;" onclick="DekripEnkrip_sbu(\'' + response['row_sbu'].id_url + '\'' + ',' + '\'' + 'enkrip' + '\')" class="btn btn-success btn-sm"><i class="fas fa-lock-open mr-2"></i> Enkripsi Dokumen</a>';
                        $('.token_generate_sbu').html('<div class="input-group"><span class="input-group-text"><i class="fas fa-qrcode"></i></span><textarea class="form-control form-control-sm" disabled>' + response['row_sbu']['token_dokumen'] + '</textarea></div>');
                    }
                    if (response['row_sbu'].sts_seumur_hidup == 1) {
                        var tgl_berlaku = '<label>Seumur Hidup</label>'
                    } else {
                        var tgl_berlaku = '<label>' + response['row_sbu'].tgl_berlaku + '</label>'
                    }
                    if (response['row_sbu'].nama_validator) {
                        var nama_validator = response['row_sbu'].nama_validator;
                    } else {
                        var nama_validator = ''
                    }
                    html_sbu += '<tr>' +
                        '<td>' + response['row_sbu'].nomor_surat + '</td>' +
                        '<td>' + tgl_berlaku + '</td>' +
                        '<td>' + dokumen + '</td>' +
                        '<td>' + dekrip + '</td>' +
                        '<td>' + sts_validasi + '</td>' +
                        '<td>' + nama_validator + '</td>' +
                        '<td class="text-center">' + tombol_validasi +
                        '</td>' +
                        '</tr>';
                    $('#load_sbu').html(html_sbu);

                    var url_kbli_sbu = $('[name="url_kbli_sbu"]').val()
                    $(document).ready(function() {
                        $('#tbl_kbli_sbu').DataTable({
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
                                "url": url_kbli_sbu + response['row_sbu'].id_vendor,
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
                                "sLengthMenu": "Menampilkan &nbsp; _MENU_ &nbsp; Data",
                                "sZeroRecords": "Tidak Ada Data Yang Di Cari",
                                "sProcessing": "Memuat Data...."
                            }
                        })
                    });
                } else {

                }
                // end sbu
                // end sbu

                //  nib
                if (response['row_nib']) {
                    var html_nib = '';
                    if (response['row_nib'].sts_validasi == null || response['row_nib'].sts_validasi == 0) {
                        var tombol_validasi = '<a href="javascript:;" onclick="Valid_nib(\'' + response['row_nib'].id_url + '\')" class="btn btn-success btn-sm shadow-lg"><i class="fa-solid fa-square-check px-1"></i><small>Valid</small></a> ' +
                            '<a href="javascript:;" onclick="NonValid_nib(\'' + response['row_nib'].id_url + '\')" class="btn btn-danger btn-sm shadow-lg"><i class="fa-solid fa-rectangle-xmark px-1"></i><small>Tidak Valid</small></a>';
                        var sts_validasi = '<span class="badge bg-secondary">Belum Di Periksa</span>'
                    } else if (response['row_nib'].sts_validasi == 1) {
                        var tombol_validasi = '<button href="javascript:;" class="btn btn-success btn-sm shadow-lg" disabled><i class="fa-solid fa-square-check px-1"></i><small>Valid</small></button> ' +
                            '<a href="javascript:;" onclick="NonValid_nib(\'' + response['row_nib'].id_url + '\')" class="btn btn-danger btn-sm shadow-lg"><i class="fa-solid fa-rectangle-xmark px-1"></i><small>Tidak Valid</small></a>';
                        var sts_validasi = '<span class="badge bg-success">Sudah Valid</span>'
                    } else if (response['row_nib'].sts_validasi == 2) {
                        var tombol_validasi = '<a href="javascript:;" onclick="Valid_nib(\'' + response['row_nib'].id_url + '\')" class="btn btn-success btn-sm shadow-lg"><i class="fa-solid fa-square-check px-1"></i><small>Valid</small></a> ' +
                            '<a href="javascript:;" onclick="NonValid_nib(\'' + response['row_nib'].id_url + '\')" class="btn btn-danger btn-sm shadow-lg"><i class="fa-solid fa-rectangle-xmark px-1"></i><small>Tidak Valid</small></a>';
                        var sts_validasi = '<span class="badge bg-danger">Tidak Valid</span>'
                    } else if (response['row_nib'].sts_validasi == 3) {
                        var tombol_validasi = '<a href="javascript:;" onclick="Valid_nib(\'' + response['row_nib'].id_url + '\')" class="btn btn-success btn-sm shadow-lg"><i class="fa-solid fa-square-check px-1"></i><small>Valid</small></a> ' +
                            '<a href="javascript:;" onclick="NonValid_nib(\'' + response['row_nib'].id_url + '\')" class="btn btn-danger btn-sm shadow-lg"><i class="fa-solid fa-rectangle-xmark px-1"></i><small>Tidak Valid</small></a>';
                        var sts_validasi = '<span class="badge bg-warning">Revisi</span>'
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
                    if (response['row_nib'].nama_validator) {
                        var nama_validator = response['row_nib'].nama_validator;
                    } else {
                        var nama_validator = '-';
                    }
                    html_nib += '<tr>' +
                        '<td>' + response['row_nib'].nomor_surat + '</td>' +
                        '<td>' + tgl_berlaku + '</td>' +
                        '<td>' + dokumen + '</td>' +
                        '<td>' + dekrip + '</td>' +
                        '<td>' + sts_validasi + '</td>' +
                        '<td>' + nama_validator + '</td>' +
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
                                "sLengthMenu": "Menampilkan &nbsp; _MENU_ &nbsp; Data",
                                "sZeroRecords": "Tidak Ada Data Yang Di Cari",
                                "sProcessing": "Memuat Data...."
                            }
                        })
                    });
                } else {

                }
                // end nib


                // akta pendiran
                if (response['row_akta_pendirian']) {
                    var html_akta_pendirian = '';
                    if (response['row_akta_pendirian'].sts_validasi == null || response['row_akta_pendirian'].sts_validasi == 0) {
                        var tombol_validasi = '<a href="javascript:;" onclick="Valid_akta_pendirian(\'' + response['row_akta_pendirian'].id_url + '\')" class="btn btn-success btn-sm shadow-lg"><i class="fa-solid fa-square-check px-1"></i><small>Valid</small></a> ' +
                            '<a href="javascript:;" onclick="NonValid_akta_pendirian(\'' + response['row_akta_pendirian'].id_url + '\')" class="btn btn-danger btn-sm shadow-lg"><i class="fa-solid fa-rectangle-xmark px-1"></i><small>Tidak Valid</small></a>';
                        var sts_validasi = '<span class="badge bg-secondary">Belum Di Periksa</span>'
                    } else if (response['row_akta_pendirian'].sts_validasi == 1) {
                        var tombol_validasi = '<button href="javascript:;" class="btn btn-success btn-sm shadow-lg" disabled><i class="fa-solid fa-square-check px-1"></i><small>Valid</small></button> ' +
                            '<a href="javascript:;" onclick="NonValid_akta_pendirian(\'' + response['row_akta_pendirian'].id_url + '\')" class="btn btn-danger btn-sm shadow-lg"><i class="fa-solid fa-rectangle-xmark px-1"></i><small>Tidak Valid</small></a>';
                        var sts_validasi = '<span class="badge bg-success">Sudah Valid</span>'
                    } else if (response['row_akta_pendirian'].sts_validasi == 2) {
                        var tombol_validasi = '<a href="javascript:;" onclick="Valid_akta_pendirian(\'' + response['row_akta_pendirian'].id_url + '\')" class="btn btn-success btn-sm shadow-lg"><i class="fa-solid fa-square-check px-1"></i><small>Valid</small></a> ' +
                            '<a href="javascript:;" onclick="NonValid_akta_pendirian(\'' + response['row_akta_pendirian'].id_url + '\')" class="btn btn-danger btn-sm shadow-lg"><i class="fa-solid fa-rectangle-xmark px-1"></i><small>Tidak Valid</small></a>';
                        var sts_validasi = '<span class="badge bg-danger">Tidak Valid</span>'
                    } else if (response['row_akta_pendirian'].sts_validasi == 2) {
                        var tombol_validasi = '<a href="javascript:;" onclick="Valid_akta_pendirian(\'' + response['row_akta_pendirian'].id_url + '\')" class="btn btn-success btn-sm shadow-lg"><i class="fa-solid fa-square-check px-1"></i><small>Valid</small></a> ' +
                            '<a href="javascript:;" onclick="NonValid_akta_pendirian(\'' + response['row_akta_pendirian'].id_url + '\')" class="btn btn-danger btn-sm shadow-lg"><i class="fa-solid fa-rectangle-xmark px-1"></i><small>Tidak Valid</small></a>';
                        var sts_validasi = '<span class="badge bg-warning">Revisi</span>'
                    }
                    if (response['row_akta_pendirian'].sts_token_dokumen == 1) {
                        var dokumen = '<span class="badge bg-danger">DOKUMEN TERENKRIPSI <i class="fas fa-lock mr-2"></i></span>';
                        var dekrip = '<a href="javascript:;" onclick="DekripEnkrip_akta_pendirian(\'' + response['row_akta_pendirian'].id_url + '\'' + ',' + '\'' + 'dekrip' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-lock-open mr-2"></i> Dekripsi Dokumen</a>';
                        $('.token_generate_akta_pendirian').html('<div class="input-group"><span class="input-group-text"><i class="fas fa-qrcode"></i></span><textarea class="form-control form-control-sm" disabled>' + response['row_akta_pendirian']['token_dokumen'] + '</textarea></div>');
                    } else if (response['row_akta_pendirian'].sts_token_dokumen == 2) {
                        var dokumen = '<a href="javascript:;" style="white-space: nowrap;width: 200px;overflow: hidden;text-overflow: ellipsis;" onclick="DownloadFile_akta_pendirian(\'' + response['row_akta_pendirian'].id_url + '\')" class="btn btn-sm btn-light btn-block text-dark"><img src="' + url_gambar_pdf + '" width="10%" alt=""> ' + response['row_akta_pendirian']['file_dokumen'] + '</a>';
                        var dekrip = '<a href="javascript:;" onclick="DekripEnkrip_akta_pendirian(\'' + response['row_akta_pendirian'].id_url + '\'' + ',' + '\'' + 'enkrip' + '\')" class="btn btn-success btn-sm"><i class="fas fa-lock-open mr-2"></i> Enkripsi Dokumen</a>';
                        $('.token_generate_akta_pendirian').html('<div class="input-group"><span class="input-group-text"><i class="fas fa-qrcode"></i></span><textarea class="form-control form-control-sm" disabled>' + response['row_akta_pendirian']['token_dokumen'] + '</textarea></div>');
                    }
                    if (response['row_akta_pendirian'].sts_seumur_hidup == 1) {
                        var tgl_berlaku = '<label>Seumur Hidup</label>'
                    } else {
                        var tgl_berlaku = '<label>' + response['row_akta_pendirian'].tgl_berlaku + '</label>'
                    }
                    if (response['row_akta_pendirian'].nama_validator) {
                        var nama_validator = response['row_akta_pendirian'].nama_validator
                    } else {
                        var nama_validator = ''
                    }
                    html_akta_pendirian += '<tr>' +
                        '<td>' + response['row_akta_pendirian'].no_surat + '</td>' +
                        '<td>' + tgl_berlaku + '</td>' +
                        '<td>' + response['row_akta_pendirian'].jumlah_setor_modal + '</td>' +
                        '<td>' + response['row_akta_pendirian'].kualifikasi_usaha + '</td>' +
                        '<td>' + dokumen + '</td>' +
                        '<td>' + dekrip + '</td>' +
                        '<td>' + sts_validasi + '</td>' +
                        '<td>' + nama_validator + '</td>' +
                        '<td class="text-center">' + tombol_validasi +
                        '</td>' +
                        '</tr>';
                    $('#load_akta_pendirian').html(html_akta_pendirian);

                } else {

                }
                // end akta pendirian

                // MANAJERIAL

                // PEMILIK
                if (response['row_pemilik_manajerial']) {
                    $(document).ready(function() {
                        var url_get_pemilik_manajerial = $('[name="url_get_pemilik_manajerial"]').val();
                        $('#tbl_data_pemilik_manajerial').DataTable({
                            "ordering": true,
                            "autoWidth": false,
                            "processing": true,
                            "serverSide": true,
                            "bDestroy": true,
                            "dom": 'Bfrtip',
                            "buttons": ["excel", "pdf", "print", "colvis"],
                            "order": [],
                            "ajax": {
                                "url": url_get_pemilik_manajerial + response['row_pemilik_manajerial'].id_vendor,
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
                        }).buttons().container().appendTo('#data_excel_pemilik_manajerial .col-md-6:eq(0)');
                    });
                } else {

                }

                // END PEMILIK

                // PENGURUS
                if (response['row_pengurus_manajerial']) {
                    $(document).ready(function() {
                        var url_get_pengurus_manajerial = $('[name="url_get_pengurus_manajerial"]').val();
                        $('#tbl_data_pengurus_manajerial').DataTable({
                            "ordering": true,
                            "autoWidth": false,
                            "processing": true,
                            "serverSide": true,
                            "bDestroy": true,
                            "dom": 'Bfrtip',
                            "buttons": ["excel", "pdf", "print", "colvis"],
                            "order": [],
                            "ajax": {
                                "url": url_get_pengurus_manajerial + response['row_pengurus_manajerial'].id_vendor,
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
                        }).buttons().container().appendTo('#data_pengurus_manajerial .col-md-6:eq(0)');
                    });
                } else {

                }

                // END PENGURUS
                // END MANAJERIAL

                // akta perubahan
                if (response['row_akta_perubahan']) {
                    var html_akta_perubahan = '';
                    if (response['row_akta_perubahan'].sts_validasi == null || response['row_akta_perubahan'].sts_validasi == 0) {
                        var tombol_validasi = '<a href="javascript:;" onclick="Valid_akta_perubahan(\'' + response['row_akta_perubahan'].id_url + '\')" class="btn btn-success btn-sm shadow-lg"><i class="fa-solid fa-square-check px-1"></i><small>Valid</small></a> ' +
                            '<a href="javascript:;" onclick="NonValid_akta_perubahan(\'' + response['row_akta_perubahan'].id_url + '\')" class="btn btn-danger btn-sm shadow-lg"><i class="fa-solid fa-rectangle-xmark px-1"></i><small>Tidak Valid</small></a>';
                        var sts_validasi = '<span class="badge bg-secondary">Belum Di Periksa</span>'
                    } else if (response['row_akta_perubahan'].sts_validasi == 1) {
                        var tombol_validasi = '<button href="javascript:;" class="btn btn-success btn-sm shadow-lg" disabled><i class="fa-solid fa-square-check px-1"></i><small>Valid</small></button> ' +
                            '<a href="javascript:;" onclick="NonValid_akta_perubahan(\'' + response['row_akta_perubahan'].id_url + '\')" class="btn btn-danger btn-sm shadow-lg"><i class="fa-solid fa-rectangle-xmark px-1"></i><small>Tidak Valid</small></a>';
                        var sts_validasi = '<span class="badge bg-success">Sudah Valid</span>'
                    } else if (response['row_akta_perubahan'].sts_validasi == 2) {
                        var tombol_validasi = '<a href="javascript:;" onclick="Valid_akta_perubahan(\'' + response['row_akta_perubahan'].id_url + '\')" class="btn btn-success btn-sm shadow-lg"><i class="fa-solid fa-square-check px-1"></i><small>Valid</small></a> ' +
                            '<a href="javascript:;" onclick="NonValid_akta_perubahan(\'' + response['row_akta_perubahan'].id_url + '\')" class="btn btn-danger btn-sm shadow-lg"><i class="fa-solid fa-rectangle-xmark px-1"></i><small>Tidak Valid</small></a>';
                        var sts_validasi = '<span class="badge bg-danger">Tidak Valid</span>'
                    } else if (response['row_akta_perubahan'].sts_validasi == 3) {
                        var tombol_validasi = '<a href="javascript:;" onclick="Valid_akta_perubahan(\'' + response['row_akta_perubahan'].id_url + '\')" class="btn btn-success btn-sm shadow-lg"><i class="fa-solid fa-square-check px-1"></i><small>Valid</small></a> ' +
                            '<a href="javascript:;" onclick="NonValid_akta_perubahan(\'' + response['row_akta_perubahan'].id_url + '\')" class="btn btn-danger btn-sm shadow-lg"><i class="fa-solid fa-rectangle-xmark px-1"></i><small>Tidak Valid</small></a>';
                        var sts_validasi = '<span class="badge bg-warning">Revisi</span>'
                    }
                    if (response['row_akta_perubahan'].sts_token_dokumen == 1) {
                        var dokumen = '<span class="badge bg-danger">DOKUMEN TERENKRIPSI <i class="fas fa-lock mr-2"></i></span>';
                        var dekrip = '<a href="javascript:;" onclick="DekripEnkrip_akta_perubahan(\'' + response['row_akta_perubahan'].id_url + '\'' + ',' + '\'' + 'dekrip' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-lock-open mr-2"></i> Dekripsi Dokumen</a>';
                        $('.token_generate_akta_perubahan').html('<div class="input-group"><span class="input-group-text"><i class="fas fa-qrcode"></i></span><textarea class="form-control form-control-sm" disabled>' + response['row_akta_perubahan']['token_dokumen'] + '</textarea></div>');
                    } else if (response['row_akta_perubahan'].sts_token_dokumen == 2) {
                        var dokumen = '<a href="javascript:;" style="white-space: nowrap;width: 200px;overflow: hidden;text-overflow: ellipsis;" onclick="DownloadFile_akta_perubahan(\'' + response['row_akta_perubahan'].id_url + '\')" class="btn btn-sm btn-light btn-block text-dark"><img src="' + url_gambar_pdf + '" width="10%" alt=""> ' + response['row_akta_perubahan']['file_dokumen'] + '</a>';
                        var dekrip = '<a href="javascript:;" onclick="DekripEnkrip_akta_perubahan(\'' + response['row_akta_perubahan'].id_url + '\'' + ',' + '\'' + 'enkrip' + '\')" class="btn btn-success btn-sm"><i class="fas fa-lock-open mr-2"></i> Enkripsi Dokumen</a>';
                        $('.token_generate_akta_perubahan').html('<div class="input-group"><span class="input-group-text"><i class="fas fa-qrcode"></i></span><textarea class="form-control form-control-sm" disabled>' + response['row_akta_perubahan']['token_dokumen'] + '</textarea></div>');
                    }
                    if (response['row_akta_perubahan'].sts_seumur_hidup == 1) {
                        var tgl_berlaku = '<label>Seumur Hidup</label>'
                    } else {
                        var tgl_berlaku = '<label>' + response['row_akta_perubahan'].tgl_berlaku + '</label>'
                    }
                    if (response['row_akta_perubahan'].nama_validator) {
                        var nama_validator = response['row_akta_perubahan'].nama_validator
                    } else {
                        var nama_validator = ''
                    }
                    html_akta_perubahan += '<tr>' +
                        '<td>' + response['row_akta_perubahan'].no_surat + '</td>' +
                        '<td>' + tgl_berlaku + '</td>' +
                        '<td>' + response['row_akta_perubahan'].jumlah_setor_modal + '</td>' +
                        '<td>' + response['row_akta_perubahan'].kualifikasi_usaha + '</td>' +
                        '<td>' + dokumen + '</td>' +
                        '<td>' + dekrip + '</td>' +
                        '<td>' + sts_validasi + '</td>' +
                        '<td>' + nama_validator + '</td>' +
                        '<td class="text-center">' + tombol_validasi +
                        '</td>' +
                        '</tr>';
                    $('#load_akta_perubahan').html(html_akta_perubahan);

                } else {

                }
                // end akta perubahan
                if (response['row_pengalaman']) {
                    $(document).ready(function() {
                        var url_get_pengalaman = $('[name="url_get_pengalaman"]').val();
                        $('#tbl_pengalaman').DataTable({
                            "ordering": true,
                            "autoWidth": false,
                            "processing": true,
                            "serverSide": true,
                            "bDestroy": true,
                            "dom": 'Bfrtip',
                            "buttons": ["excel", "pdf", "print", "colvis"],
                            "order": [],
                            "ajax": {
                                "url": url_get_pengalaman + response['row_pengalaman'].id_vendor,
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
                        }).buttons().container().appendTo('#data_pengalaman_manajerial .col-md-6:eq(0)');
                    });
                } else {

                }

                if (response['row_sppkp']) {
                    var html_sppkp = '';
                    if (response['row_sppkp'].sts_validasi == null || response['row_sppkp'].sts_validasi == 0) {
                        var tombol_validasi = '<a href="javascript:;" onclick="Valid_sppkp(\'' + response['row_sppkp'].id_url + '\')" class="btn btn-success btn-sm shadow-lg"><i class="fa-solid fa-square-check px-1"></i><small>Valid</small></a> ' +
                            '<a href="javascript:;" onclick="NonValid_sppkp(\'' + response['row_sppkp'].id_url + '\')" class="btn btn-danger btn-sm shadow-lg"><i class="fa-solid fa-rectangle-xmark px-1"></i><small>Tidak Valid</small></a>';
                        var sts_validasi = '<span class="badge bg-secondary">Belum Di Periksa</span>'
                    } else if (response['row_sppkp'].sts_validasi == 1) {
                        var tombol_validasi = '<button href="javascript:;" class="btn btn-success btn-sm shadow-lg" disabled><i class="fa-solid fa-square-check px-1"></i><small>Valid</small></button> ' +
                            '<a href="javascript:;" onclick="NonValid_sppkp(\'' + response['row_sppkp'].id_url + '\')" class="btn btn-danger btn-sm shadow-lg"><i class="fa-solid fa-rectangle-xmark px-1"></i><small>Tidak Valid</small></a>';
                        var sts_validasi = '<span class="badge bg-success">Sudah Valid</span>'
                    } else if (response['row_sppkp'].sts_validasi == 2) {
                        var tombol_validasi = '<a href="javascript:;" onclick="Valid_sppkp(\'' + response['row_sppkp'].id_url + '\')" class="btn btn-success btn-sm shadow-lg"><i class="fa-solid fa-square-check px-1"></i><small>Valid</small></a> ' +
                            '<a href="javascript:;" onclick="NonValid_sppkp(\'' + response['row_sppkp'].id_url + '\')" class="btn btn-danger btn-sm shadow-lg"><i class="fa-solid fa-rectangle-xmark px-1"></i><small>Tidak Valid</small></a>';
                        var sts_validasi = '<span class="badge bg-danger">Tidak Valid</span>'
                    } else if (response['row_sppkp'].sts_validasi == 3) {
                        var tombol_validasi = '<a href="javascript:;" onclick="Valid_sppkp(\'' + response['row_sppkp'].id_url + '\')" class="btn btn-success btn-sm shadow-lg"><i class="fa-solid fa-square-check px-1"></i><small>Valid</small></a> ' +
                            '<a href="javascript:;" onclick="NonValid_sppkp(\'' + response['row_sppkp'].id_url + '\')" class="btn btn-danger btn-sm shadow-lg"><i class="fa-solid fa-rectangle-xmark px-1"></i><small>Tidak Valid</small></a>';
                        var sts_validasi = '<span class="badge bg-warning">Revisi</span>'
                    }
                    if (response['row_sppkp'].sts_token_dokumen == 1) {
                        var dokumen = '<span class="badge bg-danger">DOKUMEN TERENKRIPSI <i class="fas fa-lock mr-2"></i></span>';
                        var dekrip = '<a href="javascript:;" onclick="DekripEnkrip_sppkp(\'' + response['row_sppkp'].id_url + '\'' + ',' + '\'' + 'dekrip' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-lock-open mr-2"></i> Dekripsi Dokumen</a>';
                        $('.token_generate_sppkp').html('<div class="input-group"><span class="input-group-text"><i class="fas fa-qrcode"></i></span><textarea class="form-control form-control-sm" disabled>' + response['row_sppkp']['token_dokumen'] + '</textarea></div>');
                    } else if (response['row_sppkp'].sts_token_dokumen == 2) {
                        var dokumen = '<a href="javascript:;" style="white-space: nowrap;width: 200px;overflow: hidden;text-overflow: ellipsis;" onclick="DownloadFile_sppkp(\'' + response['row_sppkp'].id_url + '\')" class="btn btn-sm btn-light btn-block text-dark"><img src="' + url_gambar_pdf + '" width="10%" alt=""> ' + response['row_sppkp']['file_dokumen'] + '</a>';
                        var dekrip = '<a href="javascript:;" onclick="DekripEnkrip_sppkp(\'' + response['row_sppkp'].id_url + '\'' + ',' + '\'' + 'enkrip' + '\')" class="btn btn-success btn-sm"><i class="fas fa-lock-open mr-2"></i> Enkripsi Dokumen</a>';
                        $('.token_generate_sppkp').html('<div class="input-group"><span class="input-group-text"><i class="fas fa-qrcode"></i></span><textarea class="form-control form-control-sm" disabled>' + response['row_sppkp']['token_dokumen'] + '</textarea></div>');
                    }
                    if (response['row_sppkp'].sts_seumur_hidup == 1) {
                        var tgl_berlaku = '<label>Seumur Hidup</label>'
                    } else {
                        var tgl_berlaku = '<label>' + response['row_sppkp'].tgl_berlaku + '</label>'
                    }
                    if (response['row_sppkp'].nama_validator) {
                        var nama_validator = response['row_sppkp'].nama_validator
                    } else {
                        var nama_validator = '-'
                    }
                    html_sppkp += '<tr>' +
                        '<td>' + response['row_sppkp'].no_surat + '</td>' +
                        '<td>' + tgl_berlaku + '</td>' +
                        '<td>' + dokumen + '</td>' +
                        '<td>' + dekrip + '</td>' +
                        '<td>' + sts_validasi + '</td>' +
                        '<td>' + nama_validator + '</td>' +
                        '<td class="text-center">' + tombol_validasi +
                        '</td>' +
                        '</tr>';
                    $('#load_sppkp').html(html_sppkp);
                } else {

                }

                if (response['row_npwp']) {
                    var html_npwp = '';
                    if (response['row_npwp'].sts_validasi == null || response['row_npwp'].sts_validasi == 0) {
                        var tombol_validasi = '<a href="javascript:;" onclick="Valid_npwp(\'' + response['row_npwp'].id_url + '\')" class="btn btn-success btn-sm shadow-lg"><i class="fa-solid fa-square-check px-1"></i><small>Valid</small></a> ' +
                            '<a href="javascript:;" onclick="NonValid_npwp(\'' + response['row_npwp'].id_url + '\')" class="btn btn-danger btn-sm shadow-lg"><i class="fa-solid fa-rectangle-xmark px-1"></i><small>Tidak Valid</small></a>';
                        var sts_validasi = '<span class="badge bg-secondary">Belum Di Periksa</span>'
                    } else if (response['row_npwp'].sts_validasi == 1) {
                        var tombol_validasi = '<button href="javascript:;" class="btn btn-success btn-sm shadow-lg" disabled><i class="fa-solid fa-square-check px-1"></i><small>Valid</small></button> ' +
                            '<a href="javascript:;" onclick="NonValid_npwp(\'' + response['row_npwp'].id_url + '\')" class="btn btn-danger btn-sm shadow-lg"><i class="fa-solid fa-rectangle-xmark px-1"></i><small>Tidak Valid</small></a>';
                        var sts_validasi = '<span class="badge bg-success">Sudah Valid</span>'
                    } else if (response['row_npwp'].sts_validasi == 2) {
                        var tombol_validasi = '<a href="javascript:;" onclick="Valid_npwp(\'' + response['row_npwp'].id_url + '\')" class="btn btn-success btn-sm shadow-lg"><i class="fa-solid fa-square-check px-1"></i><small>Valid</small></a> ' +
                            '<a href="javascript:;" onclick="NonValid_npwp(\'' + response['row_npwp'].id_url + '\')" class="btn btn-danger btn-sm shadow-lg"><i class="fa-solid fa-rectangle-xmark px-1"></i><small>Tidak Valid</small></a>';
                        var sts_validasi = '<span class="badge bg-danger">Tidak Valid</span>'
                    } else if (response['row_npwp'].sts_validasi == 3) {
                        var tombol_validasi = '<a href="javascript:;" onclick="Valid_npwp(\'' + response['row_npwp'].id_url + '\')" class="btn btn-success btn-sm shadow-lg"><i class="fa-solid fa-square-check px-1"></i><small>Valid</small></a> ' +
                            '<a href="javascript:;" onclick="NonValid_npwp(\'' + response['row_npwp'].id_url + '\')" class="btn btn-danger btn-sm shadow-lg"><i class="fa-solid fa-rectangle-xmark px-1"></i><small>Tidak Valid</small></a>';
                        var sts_validasi = '<span class="badge bg-warning">Revisi</span>'
                    }
                    if (response['row_npwp'].sts_token_dokumen == 1) {
                        var dokumen = '<span class="badge bg-danger">DOKUMEN TERENKRIPSI <i class="fas fa-lock mr-2"></i></span>';
                        var dekrip = '<a href="javascript:;" onclick="DekripEnkrip_npwp(\'' + response['row_npwp'].id_url + '\'' + ',' + '\'' + 'dekrip' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-lock-open mr-2"></i> Dekripsi Dokumen</a>';
                        $('.token_generate_npwp').html('<div class="input-group"><span class="input-group-text"><i class="fas fa-qrcode"></i></span><textarea class="form-control form-control-sm" disabled>' + response['row_npwp']['token_dokumen'] + '</textarea></div>');
                    } else if (response['row_npwp'].sts_token_dokumen == 2) {
                        var dokumen = '<a href="javascript:;" style="white-space: nowrap;width: 200px;overflow: hidden;text-overflow: ellipsis;" onclick="DownloadFile_npwp(\'' + response['row_npwp'].id_url + '\')" class="btn btn-sm btn-light btn-block text-dark"><img src="' + url_gambar_pdf + '" width="10%" alt=""> ' + response['row_npwp']['file_dokumen'] + '</a>';
                        var dekrip = '<a href="javascript:;" onclick="DekripEnkrip_npwp(\'' + response['row_npwp'].id_url + '\'' + ',' + '\'' + 'enkrip' + '\')" class="btn btn-success btn-sm"><i class="fas fa-lock-open mr-2"></i> Enkripsi Dokumen</a>';
                        $('.token_generate_npwp').html('<div class="input-group"><span class="input-group-text"><i class="fas fa-qrcode"></i></span><textarea class="form-control form-control-sm" disabled>' + response['row_npwp']['token_dokumen'] + '</textarea></div>');
                    }
                    if (response['row_npwp'].sts_seumur_hidup == 1) {
                        var tgl_berlaku = '<label>Seumur Hidup</label>'
                    } else {
                        var tgl_berlaku = '<label>' + response['row_npwp'].tgl_berlaku + '</label>'
                    }
                    if (response['row_npwp'].nama_validator ) {
                        var nama_validator = response['row_npwp'].nama_validator 
                    } else {
                        var nama_validator = '-'
                    }
                    html_npwp += '<tr>' +
                        '<td>' + response['row_npwp'].no_npwp + '</td>' +
                        '<td>' + tgl_berlaku + '</td>' +
                        '<td>' + dokumen + '</td>' +
                        '<td>' + dekrip + '</td>' +
                        '<td>' + sts_validasi + '</td>' +
                        '<td>' + nama_validator + '</td>' +
                        '<td class="text-center">' + tombol_validasi +
                        '</td>' +
                        '</tr>';
                    $('#load_npwp').html(html_npwp);
                } else {

                }

                if (response['row_spt']) {
                    $(document).ready(function() {
                        var url_get_spt = $('[name="url_get_spt"]').val();
                        $('#tbl_spt').DataTable({
                            "ordering": true,
                            "autoWidth": false,
                            "processing": true,
                            "serverSide": true,
                            "bDestroy": true,
                            "dom": 'Bfrtip',
                            "buttons": ["excel", "pdf", "print", "colvis"],
                            "order": [],
                            "ajax": {
                                "url": url_get_spt + response['row_spt'].id_vendor,
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
                                "sLengthMenu": "Menampilkan &nbsp; _MENU_ &nbsp; Data",
                                "sZeroRecords": "Tidak Ada Data Yang Di Cari",
                                "sProcessing": "Memuat Data...."
                            }
                        }).buttons().container().appendTo('#data_excel_pemilik_manajerial .col-md-6:eq(0)');
                    });

                } else {

                }

                if (response['row_neraca']) {
                    $(document).ready(function() {
                        var url_get_neraca = $('[name="url_get_neraca"]').val();
                        $('#tbl_neraca').DataTable({
                            "ordering": true,
                            "autoWidth": false,
                            "processing": true,
                            "serverSide": true,
                            "bDestroy": true,
                            "dom": 'Bfrtip',
                            "buttons": ["excel", "pdf", "print", "colvis"],
                            "order": [],
                            "ajax": {
                                "url": url_get_neraca + response['row_neraca'].id_vendor,
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
                                "sLengthMenu": "Menampilkan &nbsp; _MENU_ &nbsp; Data",
                                "sZeroRecords": "Tidak Ada Data Yang Di Cari",
                                "sProcessing": "Memuat Data...."
                            }
                        }).buttons().container().appendTo('#tbl_neraca .col-md-6:eq(0)');
                    });

                } else {

                }

                if (response['row_keuangan']) {
                    $(document).ready(function() {
                        var url_get_keuangan = $('[name="url_get_keuangan"]').val();
                        $('#tbl_keuangan').DataTable({
                            "ordering": true,
                            "autoWidth": false,
                            "processing": true,
                            "serverSide": true,
                            "bDestroy": true,
                            "dom": 'Bfrtip',
                            "buttons": ["excel", "pdf", "print", "colvis"],
                            "order": [],
                            "ajax": {
                                "url": url_get_keuangan + response['row_keuangan'].id_vendor,
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
                                "sLengthMenu": "Menampilkan &nbsp; _MENU_ &nbsp; Data",
                                "sZeroRecords": "Tidak Ada Data Yang Di Cari",
                                "sProcessing": "Memuat Data...."
                            }
                        }).buttons().container().appendTo('#tbl_keuangan .col-md-6:eq(0)');
                    });

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
            $('#kbli_valid_nib').val(type)
        } else {
            $('#modal_valid_nib').modal('show')
            $('[name="url_validasi_nib"]').val();
            $('[name="id_url_nib"]').val(id_url);
            $('#kbli_valid_nib').val('')
        }

    }

    function NonValid_nib(id_url, type = '') {
        if (type == 'tolak_kbli') {
            $('#modal_nonvalid_nib').modal('show')
            $('[name="url_validasi_nib"]').val();
            $('[name="id_url_nib"]').val(id_url);
            $('#kbli_nonvalid_nib').val(type)
        } else {
            $('#modal_nonvalid_nib').modal('show')
            $('[name="url_validasi_nib"]').val();
            $('[name="id_url_nib"]').val(id_url);
            $('#kbli_nonvalid_nib').val('')
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


    // JS sbu CRUD
    function DekripEnkrip_sbu(id_url, type) {
        if (type == 'dekrip') {
            var id_url_sbu = $('[name="id_url_sbu"]').val(id_url)
            $('#modal_dekrip_sbu').modal('show');
        } else {
            var id_url_sbu = $('[name="id_url_sbu"]').val(id_url)
            $('#modal_enkrip_sbu').modal('show');
        }

    }

    function GenerateEnkrip_sbu() {
        var url_encryption_sbu = $('[name="url_encryption_sbu"]').val();
        var modal_enkrip_sbu = $('#modal_enkrip_sbu');
        var id_url = $('[name="id_url_sbu"]').val();
        $.ajax({
            method: "POST",
            url: url_encryption_sbu + id_url,
            dataType: "JSON",
            data: $('#form_enkrip_sbu').serialize(),
            // beforeSend: function() {
            // $('#button_dekrip_generate').css('display', 'none');
            // $('#button_dekrip_generate_manipulasi').css('display', 'block');
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
                            modal_enkrip_sbu.modal('hide');
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

    function GenerateDekrip_sbu() {
        var url_encryption_sbu = $('[name="url_encryption_sbu"]').val();
        var modal_dekrip_sbu = $('#modal_dekrip_sbu');
        var id_url = $('[name="id_url_sbu"]').val();
        $.ajax({
            method: "POST",
            url: url_encryption_sbu + id_url,
            dataType: "JSON",
            data: $('#form_dekrip_sbu').serialize(),
            // beforeSend: function() {
            // $('#button_dekrip_generate').css('display', 'none');
            // $('#button_dekrip_generate_manipulasi').css('display', 'block');
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
                            modal_dekrip_sbu.modal('hide');
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


    function Valid_sbu(id_url, type = '') {
        if (type == 'terima_kbli') {
            $('#modal_valid_sbu').modal('show')
            $('[name="url_validasi_sbu"]').val();
            $('[name="id_url_sbu"]').val(id_url);
            $('#kbli_valid_sbu').val(type)
        } else {
            $('#modal_valid_sbu').modal('show')
            $('[name="url_validasi_sbu"]').val();
            $('[name="id_url_sbu"]').val(id_url);
            $('#kbli_valid_sbu').val('')
        }

    }

    function NonValid_sbu(id_url, type = '') {
        if (type == 'tolak_kbli') {
            $('#modal_nonvalid_sbu').modal('show')
            $('[name="url_validasi_sbu"]').val();
            $('[name="id_url_sbu"]').val(id_url);
            $('#kbli_nonvalid_sbu').val(type)
        } else {
            $('#modal_nonvalid_sbu').modal('show')
            $('[name="url_validasi_sbu"]').val();
            $('[name="id_url_sbu"]').val(id_url);
            $('#kbli_nonvalid_sbu').val('')
        }

    }

    function DownloadFile_sbu(id_url) {
        var url_download_sbu = $('[name="url_download_sbu"]').val()
        location.href = url_download_sbu + id_url;
    }

    var form_valid_sbu = $('#form_valid_sbu');
    form_valid_sbu.on('submit', function(e) {
        e.preventDefault();
        var url_post = $('[name="url_validasi_sbu"]').val()
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
                        $('#modal_valid_sbu').modal('hide')
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

    var form_nonvalid_sbu = $('#form_nonvalid_sbu');
    form_nonvalid_sbu.on('submit', function(e) {
        e.preventDefault();
        var url_post = $('[name="url_validasi_sbu"]').val()
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
                        $('#modal_nonvalid_sbu').modal('hide')
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

    // END JS sbu CRUD

    // SIUJK


    function DekripEnkrip_siujk(id_url, type) {
        if (type == 'dekrip') {
            var id_url_siujk = $('[name="id_url_siujk"]').val(id_url)
            $('#modal_dekrip_siujk').modal('show');
        } else {
            var id_url_siujk = $('[name="id_url_siujk"]').val(id_url)
            $('#modal_enkrip_siujk').modal('show');
        }

    }

    function GenerateEnkrip_siujk() {
        var url_encryption_siujk = $('[name="url_encryption_siujk"]').val();
        var modal_enkrip_siujk = $('#modal_enkrip_siujk');
        var id_url = $('[name="id_url_siujk"]').val();
        $.ajax({
            method: "POST",
            url: url_encryption_siujk + id_url,
            dataType: "JSON",
            data: $('#form_enkrip_siujk').serialize(),
            // beforeSend: function() {
            // $('#button_dekrip_generate').css('display', 'none');
            // $('#button_dekrip_generate_manipulasi').css('display', 'block');
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
                            load_data();
                            // $('#button_dekrip_generate').css('display', 'block');
                            // $('#button_dekrip_generate_manipulasi').css('display', 'none');
                            modal_enkrip_siujk.modal('hide');
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

    function GenerateDekrip_siujk() {
        var url_encryption_siujk = $('[name="url_encryption_siujk"]').val();
        var modal_dekrip_siujk = $('#modal_dekrip_siujk');
        var id_url = $('[name="id_url_siujk"]').val();
        $.ajax({
            method: "POST",
            url: url_encryption_siujk + id_url,
            dataType: "JSON",
            data: $('#form_dekrip_siujk').serialize(),
            // beforeSend: function() {
            // $('#button_dekrip_generate').css('display', 'none');
            // $('#button_dekrip_generate_manipulasi').css('display', 'block');
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
                            load_data();
                            // $('#button_dekrip_generate').css('display', 'block');
                            // $('#button_dekrip_generate_manipulasi').css('display', 'none');
                            modal_dekrip_siujk.modal('hide');
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


    function Valid_siujk(id_url, type = '') {
        if (type == 'terima_kbli') {
            $('#modal_valid_siujk').modal('show')
            $('[name="url_validasi_siujk"]').val();
            $('[name="id_url_siujk"]').val(id_url);
            $('#kbli_valid_siujk').val(type)
        } else {
            $('#modal_valid_siujk').modal('show')
            $('[name="url_validasi_siujk"]').val();
            $('[name="id_url_siujk"]').val(id_url);
            $('#kbli_valid_siujk').val('')
        }

    }

    function NonValid_siujk(id_url, type = '') {
        if (type == 'tolak_kbli') {
            $('#modal_nonvalid_siujk').modal('show')
            $('[name="url_validasi_siujk"]').val();
            $('[name="id_url_siujk"]').val(id_url);
            $('#kbli_nonvalid_siujk').val(type)
        } else {
            $('#modal_nonvalid_siujk').modal('show')
            $('[name="url_validasi_siujk"]').val();
            $('[name="id_url_siujk"]').val(id_url);
            $('#kbli_nonvalid_siujk').val('')
        }

    }

    function DownloadFile_siujk(id_url) {
        var url_download_siujk = $('[name="url_download_siujk"]').val()
        location.href = url_download_siujk + id_url;
    }

    var form_valid_siujk = $('#form_valid_siujk');
    form_valid_siujk.on('submit', function(e) {
        e.preventDefault();
        var url_post = $('[name="url_validasi_siujk"]').val()
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
                        $('#modal_valid_siujk').modal('hide')
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

    var form_nonvalid_siujk = $('#form_nonvalid_siujk');
    form_nonvalid_siujk.on('submit', function(e) {
        e.preventDefault();
        var url_post = $('[name="url_validasi_siujk"]').val()
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
                        $('#modal_nonvalid_siujk').modal('hide')
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
    // END SIUJK

    // AKTA PENDIRIAN
    function Valid_akta_pendirian(id_url, type = '') {
        if (type == 'terima_kbli') {
            $('#modal_valid_akta_pendirian').modal('show')
            $('[name="url_validasi_akta_pendirian"]').val();
            $('[name="id_url_akta_pendirian"]').val(id_url);
            $('#kbli_valid_akta_pendirian').val(type)
        } else {
            $('#modal_valid_akta_pendirian').modal('show')
            $('[name="url_validasi_akta_pendirian"]').val();
            $('[name="id_url_akta_pendirian"]').val(id_url);
            $('#kbli_valid_akta_pendirian').val('')
        }

    }

    function NonValid_akta_pendirian(id_url, type = '') {
        if (type == 'tolak_kbli') {
            $('#modal_nonvalid_akta_pendirian').modal('show')
            $('[name="url_validasi_akta_pendirian"]').val();
            $('[name="id_url_akta_pendirian"]').val(id_url);
            $('#kbli_nonvalid_akta_pendirian').val(type)
        } else {
            $('#modal_nonvalid_akta_pendirian').modal('show')
            $('[name="url_validasi_akta_pendirian"]').val();
            $('[name="id_url_akta_pendirian"]').val(id_url);
            $('#kbli_nonvalid_akta_pendirian').val('')
        }

    }

    var form_valid_akta_pendirian = $('#form_valid_akta_pendirian');
    form_valid_akta_pendirian.on('submit', function(e) {
        e.preventDefault();
        var url_post = $('[name="url_validasi_akta_pendirian"]').val()
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
                        $('#modal_valid_akta_pendirian').modal('hide')
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

    var form_nonvalid_akta_pendirian = $('#form_nonvalid_akta_pendirian');
    form_nonvalid_akta_pendirian.on('submit', function(e) {
        e.preventDefault();
        var url_post = $('[name="url_validasi_akta_pendirian"]').val()
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
                        $('#modal_nonvalid_akta_pendirian').modal('hide')
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

    function DekripEnkrip_akta_pendirian(id_url, type) {
        if (type == 'dekrip') {
            var id_url_akta_pendirian = $('[name="id_url_akta_pendirian"]').val(id_url)
            $('#modal_dekrip_akta_pendirian').modal('show');
            $('#form_dekrip_akta_pendirian')[0].reset();
        } else {
            var id_url_akta_pendirian = $('[name="id_url_akta_pendirian"]').val(id_url)
            $('#modal_enkrip_akta_pendirian').modal('show');
            $('#form_enkrip_akta_pendirian')[0].reset();
        }

    }

    function GenerateEnkrip_akta_pendirian() {
        var url_encryption_akta_pendirian = $('[name="url_encryption_akta_pendirian"]').val();
        var modal_enkrip_akta_pendirian = $('#modal_enkrip_akta_pendirian');
        var id_url = $('[name="id_url_akta_pendirian"]').val();
        $.ajax({
            method: "POST",
            url: url_encryption_akta_pendirian + id_url,
            dataType: "JSON",
            data: $('#form_enkrip_akta_pendirian').serialize(),
            // beforeSend: function() {
            // $('#button_dekrip_generate').css('display', 'none');
            // $('#button_dekrip_generate_manipulasi').css('display', 'block');
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
                            load_data();
                            // $('#button_dekrip_generate').css('display', 'block');
                            // $('#button_dekrip_generate_manipulasi').css('display', 'none');
                            modal_enkrip_akta_pendirian.modal('hide');
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

    function GenerateDekrip_akta_pendirian() {
        var url_encryption_akta_pendirian = $('[name="url_encryption_akta_pendirian"]').val();
        var modal_dekrip_akta_pendirian = $('#modal_dekrip_akta_pendirian');
        var id_url = $('[name="id_url_akta_pendirian"]').val();
        $.ajax({
            method: "POST",
            url: url_encryption_akta_pendirian + id_url,
            dataType: "JSON",
            data: $('#form_dekrip_akta_pendirian').serialize(),
            // beforeSend: function() {
            // $('#button_dekrip_generate').css('display', 'none');
            // $('#button_dekrip_generate_manipulasi').css('display', 'block');
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
                            load_data();
                            // $('#button_dekrip_generate').css('display', 'block');
                            // $('#button_dekrip_generate_manipulasi').css('display', 'none');
                            modal_dekrip_akta_pendirian.modal('hide');
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

    function DownloadFile_akta_pendirian(id_url) {
        var url_download_akta_pendirian = $('[name="url_download_akta_pendirian"]').val()
        location.href = url_download_akta_pendirian + id_url;
    }
    // END AKTA PENDIRIAN

    // AKTA perubahan
    function Valid_akta_perubahan(id_url, type = '') {
        if (type == 'terima_kbli') {
            $('#modal_valid_akta_perubahan').modal('show')
            $('[name="url_validasi_akta_perubahan"]').val();
            $('[name="id_url_akta_perubahan"]').val(id_url);
            $('#kbli_valid_akta_perubahan').val(type)
        } else {
            $('#modal_valid_akta_perubahan').modal('show')
            $('[name="url_validasi_akta_perubahan"]').val();
            $('[name="id_url_akta_perubahan"]').val(id_url);
            $('#kbli_valid_akta_perubahan').val('')
        }

    }

    function NonValid_akta_perubahan(id_url, type = '') {
        if (type == 'tolak_kbli') {
            $('#modal_nonvalid_akta_perubahan').modal('show')
            $('[name="url_validasi_akta_perubahan"]').val();
            $('[name="id_url_akta_perubahan"]').val(id_url);
            $('#kbli_nonvalid_akta_perubahan').val(type)
        } else {
            $('#modal_nonvalid_akta_perubahan').modal('show')
            $('[name="url_validasi_akta_perubahan"]').val();
            $('[name="id_url_akta_perubahan"]').val(id_url);
            $('#kbli_nonvalid_akta_perubahan').val('')
        }

    }

    var form_valid_akta_perubahan = $('#form_valid_akta_perubahan');
    form_valid_akta_perubahan.on('submit', function(e) {
        e.preventDefault();
        var url_post = $('[name="url_validasi_akta_perubahan"]').val()
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
                        $('#modal_valid_akta_perubahan').modal('hide')
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

    var form_nonvalid_akta_perubahan = $('#form_nonvalid_akta_perubahan');
    form_nonvalid_akta_perubahan.on('submit', function(e) {
        e.preventDefault();
        var url_post = $('[name="url_validasi_akta_perubahan"]').val()
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
                        $('#modal_nonvalid_akta_perubahan').modal('hide')
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

    function DekripEnkrip_akta_perubahan(id_url, type) {
        if (type == 'dekrip') {
            var id_url_akta_perubahan = $('[name="id_url_akta_perubahan"]').val(id_url)
            $('#modal_dekrip_akta_perubahan').modal('show');
            $('#form_dekrip_akta_perubahan')[0].reset();
        } else {
            var id_url_akta_perubahan = $('[name="id_url_akta_perubahan"]').val(id_url)
            $('#modal_enkrip_akta_perubahan').modal('show');
            $('#form_enkrip_akta_perubahan')[0].reset();
        }

    }

    function GenerateEnkrip_akta_perubahan() {
        var url_encryption_akta_perubahan = $('[name="url_encryption_akta_perubahan"]').val();
        var modal_enkrip_akta_perubahan = $('#modal_enkrip_akta_perubahan');
        var id_url = $('[name="id_url_akta_perubahan"]').val();
        $.ajax({
            method: "POST",
            url: url_encryption_akta_perubahan + id_url,
            dataType: "JSON",
            data: $('#form_enkrip_akta_perubahan').serialize(),
            // beforeSend: function() {
            // $('#button_dekrip_generate').css('display', 'none');
            // $('#button_dekrip_generate_manipulasi').css('display', 'block');
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
                            load_data();
                            // $('#button_dekrip_generate').css('display', 'block');
                            // $('#button_dekrip_generate_manipulasi').css('display', 'none');
                            modal_enkrip_akta_perubahan.modal('hide');
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

    function GenerateDekrip_akta_perubahan() {
        var url_encryption_akta_perubahan = $('[name="url_encryption_akta_perubahan"]').val();
        var modal_dekrip_akta_perubahan = $('#modal_dekrip_akta_perubahan');
        var id_url = $('[name="id_url_akta_perubahan"]').val();
        $.ajax({
            method: "POST",
            url: url_encryption_akta_perubahan + id_url,
            dataType: "JSON",
            data: $('#form_dekrip_akta_perubahan').serialize(),
            // beforeSend: function() {
            // $('#button_dekrip_generate').css('display', 'none');
            // $('#button_dekrip_generate_manipulasi').css('display', 'block');
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
                            load_data();
                            // $('#button_dekrip_generate').css('display', 'block');
                            // $('#button_dekrip_generate_manipulasi').css('display', 'none');
                            modal_dekrip_akta_perubahan.modal('hide');
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

    function DownloadFile_akta_perubahan(id_url) {
        var url_download_akta_perubahan = $('[name="url_download_akta_perubahan"]').val()
        location.href = url_download_akta_perubahan + id_url;
    }
    // END AKTA perubahan

    // MANAJERIAL
    function by_id_pemilik_manajerial(id_pemilik, type) {
        var url_by_id_pemilik_manajerial = $('[name="url_by_id_pemilik_manajerial"]').val()
        if (type == 'edit') {
            saveData = 'edit';
        }
        if (type == 'hapus') {
            saveData = 'hapus';
        }
        if (type == 'upload_ktp') {
            saveData = 'upload_ktp';
        }
        if (type == 'upload_npwp') {
            saveData = 'upload_npwp';
        }

        $.ajax({
            type: "GET",
            url: url_by_id_pemilik_manajerial + id_pemilik,
            dataType: "JSON",
            success: function(response) {
                if (type == 'edit') {
                    $('#modal_pemilik_manajerial').modal('show');
                    $('[name="type_edit_pemilik"]').val('edit_biasa');
                    $('[name="validasi_enkripsi_pemilik"]').val(response['row_pemilik_manajerial'].sts_token_dokumen_pemilik);
                    if (response['row_pemilik_manajerial']['sts_token_dokumen_pemilik'] == 1) {
                        $('.button_enkrip_pemilik').html('<a href="javascript:;"  onclick="DekripEnkrip_pemilik(\'' + response['row_pemilik_manajerial'].id_url + '\'' + ',' + '\'' + 'dekrip' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-lock-open mr-2"></i> Dekripsi Dokumen</a>');
                    } else {
                        $('.button_enkrip_pemilik').html('<a href="javascript:;" onclick="DekripEnkrip_pemilik(\'' + response['row_pemilik_manajerial'].id_url + '\'' + ',' + '\'' + 'enkrip' + '\')" class="btn btn-success btn-sm"><i class="fas fa-lock mr-2"></i> Enkripsi Dokumen</a>');
                    }
                    $('.button_nama_file_ktp').html('<a href="javascript:;"  onclick="Download_pemilik(\'' + response['row_pemilik_manajerial'].id_url + '\'' + ',' + '\'' + 'pemilik_ktp' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-file mr-2"></i> ' + response['row_pemilik_manajerial'].file_ktp + '</a>');
                    $('.button_nama_file_npwp').html('<a href="javascript:;"  onclick="Download_pemilik(\'' + response['row_pemilik_manajerial'].id_url + '\'' + ',' + '\'' + 'pemilik_npwp' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-file mr-2"></i> ' + response['row_pemilik_manajerial'].file_npwp + '</a>');
                    $('[name="id_pemilik"]').val(response['row_pemilik_manajerial'].id_pemilik);
                    $('[name="id_url"]').val(response['row_pemilik_manajerial'].id_url);
                    $('[name="nik"]').val(response['row_pemilik_manajerial'].nik);
                    $('[name="nama_pemilik"]').val(response['row_pemilik_manajerial'].nama_pemilik);
                    $('[name="jns_pemilik"]').val(response['row_pemilik_manajerial'].jns_pemilik);
                    $('[name="alamat_pemilik"]').val(response['row_pemilik_manajerial'].alamat_pemilik);
                    $('[name="npwp"]').val(response['row_pemilik_manajerial'].npwp);
                    $('[name="warganegara"]').val(response['row_pemilik_manajerial'].warganegara);
                    $('[name="saham"]').val(response['row_pemilik_manajerial'].saham);
                    // $('[name="file_ktp"]').val(response['row_pemilik_manajerial'].file_ktp);
                    // $('[name="file_npwp"]').val(response['row_pemilik_manajerial'].file_npwp);
                }
            }
        })
    }

    function DekripEnkrip_pemilik(id_url, type) {
        var type_edit_pemilik = $('[name="type_edit_pemilik"]').val();
        var url_encryption_pemilik = $('[name="url_encryption_pemilik"]').val()
        if (type == 'dekrip') {
            $.ajax({
                method: "POST",
                url: url_encryption_pemilik + id_url,
                dataType: "JSON",
                data: {
                    type: type,
                    type_edit_pemilik: type_edit_pemilik
                },
                success: function(response) {
                    let timerInterval
                    Swal.fire({
                        title: 'Sedang Proses Dekripsi!',
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
                            Swal.fire('Dokumen Berhasil Di Dekripsi', '', 'success');
                            $('[name="validasi_enkripsi_pemilik"]').val(response['row_pemilik_manajerial']['sts_token_dokumen_pemilik']);
                            if (response['row_pemilik_manajerial']['sts_token_dokumen_pemilik'] == 1) {
                                $('.button_enkrip_pemilik').html('<a href="javascript:;"  onclick="DekripEnkrip_pemilik(\'' + response['row_pemilik_manajerial'].id_url + '\'' + ',' + '\'' + 'dekrip' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-lock-open mr-2"></i> Dekripsi Dokumen</a>');
                            } else {
                                $('.button_enkrip_pemilik').html('<a href="javascript:;" onclick="DekripEnkrip_pemilik(\'' + response['row_pemilik_manajerial'].id_url + '\'' + ',' + '\'' + 'enkrip' + '\')" class="btn btn-success btn-sm"><i class="fas fa-lock mr-2"></i> Enkripsi Dokumen</a>');
                            }
                            $('.button_nama_file_ktp').html('<a href="javascript:;"  onclick="Download_pemilik(\'' + response['row_pemilik_manajerial'].id_url + '\'' + ',' + '\'' + 'pemilik_ktp' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-file mr-2"></i> ' + response['row_pemilik_manajerial'].file_ktp + '</a>');
                            $('.button_nama_file_npwp').html('<a href="javascript:;"  onclick="Download_pemilik(\'' + response['row_pemilik_manajerial'].id_url + '\'' + ',' + '\'' + 'pemilik_npwp' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-file mr-2"></i> ' + response['row_pemilik_manajerial'].file_npwp + '</a>');
                            load_data();
                        }
                    }).then((result) => {
                        /* Read more about handling dismissals below */
                        if (result.dismiss === Swal.DismissReason.timer) {

                        }
                    })
                }
            })
        } else {
            $.ajax({
                method: "POST",
                url: url_encryption_pemilik + id_url,
                dataType: "JSON",
                data: {
                    type: type,
                    type_edit_pemilik: type_edit_pemilik
                },
                success: function(response) {
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
                            Swal.fire('Dokumen Berhasil Di Enkripsi', '', 'success')
                            $('[name="validasi_enkripsi_pemilik"]').val(response['row_pemilik_manajerial']['sts_token_dokumen_pemilik']);
                            if (response['row_pemilik_manajerial']['sts_token_dokumen_pemilik'] == 1) {
                                $('.button_enkrip_pemilik').html('<a href="javascript:;"  onclick="DekripEnkrip_pemilik(\'' + response['row_pemilik_manajerial'].id_url + '\'' + ',' + '\'' + 'dekrip' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-lock-open mr-2"></i> Dekripsi Dokumen</a>');
                            } else {
                                $('.button_enkrip_pemilik').html('<a href="javascript:;" onclick="DekripEnkrip_pemilik(\'' + response['row_pemilik_manajerial'].id_url + '\'' + ',' + '\'' + 'enkrip' + '\')" class="btn btn-success btn-sm"><i class="fas fa-lock mr-2"></i> Enkripsi Dokumen</a>');
                            }
                            $('.button_nama_file_ktp').html('<a href="javascript:;"  onclick="Download_pemilik(\'' + response['row_pemilik_manajerial'].id_url + '\'' + ',' + '\'' + 'pemilik_ktp' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-file mr-2"></i> ' + response['row_pemilik_manajerial'].file_ktp + '</a>');
                            $('.button_nama_file_npwp').html('<a href="javascript:;"  onclick="Download_pemilik(\'' + response['row_pemilik_manajerial'].id_url + '\'' + ',' + '\'' + 'pemilik_npwp' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-file mr-2"></i> ' + response['row_pemilik_manajerial'].file_npwp + '</a>');
                            load_data();
                        }
                    }).then((result) => {
                        /* Read more about handling dismissals below */
                        if (result.dismiss === Swal.DismissReason.timer) {

                        }
                    })
                }
            })
        }

    }

    function Valid_pemilik(id_url, type = '') {
        if (type == 'terima_kbli') {
            $('#modal_valid_pemilik').modal('show')
            $('[name="url_validasi_pemilik"]').val();
            $('[name="id_url_pemilik"]').val(id_url);
            $('#kbli_valid_pemilik').val(type)
        } else {
            $('#modal_valid_pemilik').modal('show')
            $('[name="url_validasi_pemilik"]').val();
            $('[name="id_url_pemilik"]').val(id_url);
            $('#kbli_valid_pemilik').val('')
        }

    }

    function NonValid_pemilik(id_url, type = '') {
        if (type == 'tolak_kbli') {
            $('#modal_nonvalid_pemilik').modal('show')
            $('[name="url_validasi_pemilik"]').val();
            $('[name="id_url_pemilik"]').val(id_url);
            $('#kbli_nonvalid_pemilik').val(type)
        } else {
            $('#modal_nonvalid_pemilik').modal('show')
            $('[name="url_validasi_pemilik"]').val();
            $('[name="id_url_pemilik"]').val(id_url);
            $('#kbli_nonvalid_pemilik').val('')
        }

    }

    var form_valid_pemilik = $('#form_valid_pemilik');
    form_valid_pemilik.on('submit', function(e) {
        e.preventDefault();
        var url_post = $('[name="url_validasi_pemilik"]').val()
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
                        $('#modal_valid_pemilik').modal('hide')
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

    var form_nonvalid_pemilik = $('#form_nonvalid_pemilik');
    form_nonvalid_pemilik.on('submit', function(e) {
        e.preventDefault();
        var url_post = $('[name="url_validasi_pemilik"]').val()
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
                        $('#modal_nonvalid_pemilik').modal('hide')
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

    // PENGURUS
    function by_id_pengurus_manajerial(id_pengurus, type) {
        var url_by_id_pengurus_manajerial = $('[name="url_by_id_pengurus_manajerial"]').val()
        if (type == 'edit') {
            saveData = 'edit';
        }
        if (type == 'hapus') {
            saveData = 'hapus';
        }
        if (type == 'upload_ktp') {
            saveData = 'upload_ktp';
        }
        if (type == 'upload_npwp') {
            saveData = 'upload_npwp';
        }

        $.ajax({
            type: "GET",
            url: url_by_id_pengurus_manajerial + id_pengurus,
            dataType: "JSON",
            success: function(response) {
                if (type == 'edit') {
                    $('#modal_pengurus_manajerial').modal('show');
                    $('[name="type_edit_pengurus"]').val('edit_excel');
                    $('[name="validasi_enkripsi_pengurus"]').val(response['row_pengurus_manajerial'].sts_token_dokumen_pengurus);
                    if (response['row_pengurus_manajerial']['sts_token_dokumen_pengurus'] == 1) {
                        $('.button_enkrip_pengurus').html('<a href="javascript:;"  onclick="DekripEnkrip_pengurus(\'' + response['row_pengurus_manajerial'].id_url + '\'' + ',' + '\'' + 'dekrip' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-lock-open mr-2"></i> Dekripsi Dokumen</a>');
                    } else {
                        $('.button_enkrip_pengurus').html('<a href="javascript:;" onclick="DekripEnkrip_pengurus(\'' + response['row_pengurus_manajerial'].id_url + '\'' + ',' + '\'' + 'enkrip' + '\')" class="btn btn-success btn-sm"><i class="fas fa-lock mr-2"></i> Enkripsi Dokumen</a>');
                    }
                    $('.button_nama_file_ktp_pengurus').html('<a href="javascript:;"  onclick="Download_pengurus(\'' + response['row_pengurus_manajerial'].id_url + '\'' + ',' + '\'' + 'pengurus_ktp' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-file mr-2"></i> ' + response['row_pengurus_manajerial'].file_ktp_pengurus + '</a>');
                    $('.button_nama_file_npwp_pengurus').html('<a href="javascript:;"  onclick="Download_pengurus(\'' + response['row_pengurus_manajerial'].id_url + '\'' + ',' + '\'' + 'pengurus_npwp' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-file mr-2"></i> ' + response['row_pengurus_manajerial'].file_npwp_pengurus + '</a>');
                    $('[name="id_pengurus"]').val(response['row_pengurus_manajerial'].id_pengurus);
                    $('[name="id_url"]').val(response['row_pengurus_manajerial'].id_url);
                    $('[name="nik_pengurus"]').val(response['row_pengurus_manajerial'].nik);
                    $('[name="nama_pengurus"]').val(response['row_pengurus_manajerial'].nama_pengurus);
                    $('[name="alamat_pengurus"]').val(response['row_pengurus_manajerial'].alamat_pengurus);
                    $('[name="npwp_pengurus"]').val(response['row_pengurus_manajerial'].npwp);
                    $('[name="warganegara_pengurus"]').val(response['row_pengurus_manajerial'].warganegara);
                    $('[name="jabatan_pengurus"]').val(response['row_pengurus_manajerial'].jabatan_pengurus);
                    $('[name="jabatan_mulai"]').val(response['row_pengurus_manajerial'].jabatan_mulai);
                    $('[name="jabatan_selesai"]').val(response['row_pengurus_manajerial'].jabatan_selesai);
                    // $('[name="file_ktp_pengurus"]').val(response['row_pengurus_manajerial'].file_ktp_pengurus);
                    // $('[name="file_npwp_pengurus"]').val(response['row_pengurus_manajerial'].file_npwp_pengurus);
                    // $('[name="file_ktp"]').val(response['row_pengurus_manajerial'].file_ktp);
                    // $('[name="file_npwp"]').val(response['row_pengurus_manajerial'].file_npwp);
                }
            }
        })
    }

    function DekripEnkrip_pengurus(id_url, type) {
        var type_edit_pengurus = $('[name="type_edit_pengurus"]').val();
        var url_encryption_pengurus = $('[name="url_encryption_pengurus"]').val()
        if (type == 'dekrip') {
            $.ajax({
                method: "POST",
                url: url_encryption_pengurus + id_url,
                dataType: "JSON",
                data: {
                    type: type,
                    type_edit_pengurus: type_edit_pengurus
                },
                success: function(response) {
                    let timerInterval
                    Swal.fire({
                        title: 'Sedang Proses Dekripsi!',
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
                            Swal.fire('Dokumen Berhasil Di Dekripsi', '', 'success');
                            $('[name="validasi_enkripsi_pengurus"]').val(response['row_pengurus_manajerial']['sts_token_dokumen_pengurus']);
                            if (response['row_pengurus_manajerial']['sts_token_dokumen_pengurus'] == 1) {
                                $('.button_enkrip_pengurus').html('<a href="javascript:;" onclick="DekripEnkrip_pengurus(\'' + response['row_pengurus_manajerial'].id_url + '\'' + ',' + '\'' + 'dekrip' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-lock-open mr-2"></i> Dekripsi Dokumen</a>');
                                $('.button_nama_file_ktp_pengurus').html('<a href="javascript:;" onclick="Download_pengurus(\'' + response['row_pengurus_manajerial'].id_url + '\'' + ',' + '\'' + 'pengurus_ktp' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-file mr-2"></i> ' + response['row_pengurus_manajerial'].file_ktp_pengurus + '</a>');
                                $('.button_nama_file_npwp_pengurus').html('<a href="javascript:;" onclick="Download_pengurus(\'' + response['row_pengurus_manajerial'].id_url + '\'' + ',' + '\'' + 'pengurus_npwp' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-file mr-2"></i> ' + response['row_pengurus_manajerial'].file_npwp_pengurus + '</a>');
                            } else {
                                $('.button_enkrip_pengurus').html('<a href="javascript:;" onclick="DekripEnkrip_pengurus(\'' + response['row_pengurus_manajerial'].id_url + '\'' + ',' + '\'' + 'enkrip' + '\')" class="btn btn-success btn-sm"><i class="fas fa-lock mr-2"></i> Enkripsi Dokumen</a>');
                                $('.button_nama_file_ktp_pengurus').html('<a href="javascript:;" onclick="Download_pengurus(\'' + response['row_pengurus_manajerial'].id_url + '\'' + ',' + '\'' + 'pengurus_ktp' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-file mr-2"></i> ' + response['row_pengurus_manajerial'].file_ktp_pengurus + '</a>');
                                $('.button_nama_file_npwp_pengurus').html('<a href="javascript:;" onclick="Download_pengurus(\'' + response['row_pengurus_manajerial'].id_url + '\'' + ',' + '\'' + 'pengurus_npwp' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-file mr-2"></i> ' + response['row_pengurus_manajerial'].file_npwp_pengurus + '</a>');
                            }

                            load_data();
                        }
                    }).then((result) => {
                        /* Read more about handling dismissals below */
                        if (result.dismiss === Swal.DismissReason.timer) {

                        }
                    })
                }
            })
        } else {
            $.ajax({
                method: "POST",
                url: url_encryption_pengurus + id_url,
                dataType: "JSON",
                data: {
                    type: type,
                    type_edit_pengurus: type_edit_pengurus
                },
                success: function(response) {
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
                            Swal.fire('Dokumen Berhasil Di Enkripsi', '', 'success')
                            $('[name="validasi_enkripsi_pengurus"]').val(response['row_pengurus_manajerial']['sts_token_dokumen_pengurus']);
                            if (response['row_pengurus_manajerial']['sts_token_dokumen_pengurus'] == 1) {
                                $('.button_enkrip_pengurus').html('<a href="javascript:;" onclick="DekripEnkrip_pengurus(\'' + response['row_pengurus_manajerial'].id_url + '\'' + ',' + '\'' + 'dekrip' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-lock-open mr-2"></i> Dekripsi Dokumen</a>');
                                $('.button_nama_file_ktp_pengurus').html('<a href="javascript:;" onclick="Download_pengurus(\'' + response['row_pengurus_manajerial'].id_url + '\'' + ',' + '\'' + 'pengurus_ktp' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-file mr-2"></i> ' + response['row_pengurus_manajerial'].file_ktp_pengurus + '</a>');
                                $('.button_nama_file_npwp_pengurus').html('<a href="javascript:;" onclick="Download_pengurus(\'' + response['row_pengurus_manajerial'].id_url + '\'' + ',' + '\'' + 'pengurus_npwp' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-file mr-2"></i> ' + response['row_pengurus_manajerial'].file_npwp_pengurus + '</a>');
                            } else {
                                $('.button_enkrip_pengurus').html('<a href="javascript:;" onclick="DekripEnkrip_pengurus(\'' + response['row_pengurus_manajerial'].id_url + '\'' + ',' + '\'' + 'enkrip' + '\')" class="btn btn-success btn-sm"><i class="fas fa-lock mr-2"></i> Enkripsi Dokumen</a>');
                                $('.button_nama_file_ktp_pengurus').html('<a href="javascript:;" onclick="Download_pengurus(\'' + response['row_pengurus_manajerial'].id_url + '\'' + ',' + '\'' + 'pengurus_ktp' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-file mr-2"></i> ' + response['row_pengurus_manajerial'].file_ktp_pengurus + '</a>');
                                $('.button_nama_file_npwp_pengurus').html('<a href="javascript:;" onclick="Download_pengurus(\'' + response['row_pengurus_manajerial'].id_url + '\'' + ',' + '\'' + 'pengurus_npwp' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-file mr-2"></i> ' + response['row_pengurus_manajerial'].file_npwp_pengurus + '</a>');
                            }

                            load_data();
                        }
                    }).then((result) => {
                        /* Read more about handling dismissals below */
                        if (result.dismiss === Swal.DismissReason.timer) {

                        }
                    })
                }
            })
        }

    }

    function Valid_pengurus(id_url, type = '') {
        if (type == 'terima_kbli') {
            $('#modal_valid_pengurus').modal('show')
            $('[name="url_validasi_pengurus"]').val();
            $('[name="id_url_pengurus"]').val(id_url);
            $('#kbli_valid_pengurus').val(type)
        } else {
            $('#modal_valid_pengurus').modal('show')
            $('[name="url_validasi_pengurus"]').val();
            $('[name="id_url_pengurus"]').val(id_url);
            $('#kbli_valid_pengurus').val('')
        }

    }

    function NonValid_pengurus(id_url, type = '') {
        if (type == 'tolak_kbli') {
            $('#modal_nonvalid_pengurus').modal('show')
            $('[name="url_validasi_pengurus"]').val();
            $('[name="id_url_pengurus"]').val(id_url);
            $('#kbli_nonvalid_pengurus').val(type)
        } else {
            $('#modal_nonvalid_pengurus').modal('show')
            $('[name="url_validasi_pengurus"]').val();
            $('[name="id_url_pengurus"]').val(id_url);
            $('#kbli_nonvalid_pengurus').val('')
        }

    }

    var form_valid_pengurus = $('#form_valid_pengurus');
    form_valid_pengurus.on('submit', function(e) {
        e.preventDefault();
        var url_post = $('[name="url_validasi_pengurus"]').val()
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
                        $('#modal_valid_pengurus').modal('hide')
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

    var form_nonvalid_pengurus = $('#form_nonvalid_pengurus');
    form_nonvalid_pengurus.on('submit', function(e) {
        e.preventDefault();
        var url_post = $('[name="url_validasi_pengurus"]').val()
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
                        $('#modal_nonvalid_pengurus').modal('hide')
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
    // END PENGURUS
    // END MANAJERIAL

    // pengalaman
    function Valid_pengalaman(id_url, type = '') {
        if (type == 'terima_kbli') {
            $('#modal_valid_pengalaman').modal('show')
            $('[name="url_validasi_pengalaman"]').val();
            $('[name="id_url_pengalaman"]').val(id_url);
            $('#kbli_valid_pengalaman').val(type)
        } else {
            $('#modal_valid_pengalaman').modal('show')
            $('[name="url_validasi_pengalaman"]').val();
            $('[name="id_url_pengalaman"]').val(id_url);
            $('#kbli_valid_pengalaman').val('')
        }

    }

    function NonValid_pengalaman(id_url, type = '') {
        if (type == 'tolak_kbli') {
            $('#modal_nonvalid_pengalaman').modal('show')
            $('[name="url_validasi_pengalaman"]').val();
            $('[name="id_url_pengalaman"]').val(id_url);
            $('#kbli_nonvalid_pengalaman').val(type)
        } else {
            $('#modal_nonvalid_pengalaman').modal('show')
            $('[name="url_validasi_pengalaman"]').val();
            $('[name="id_url_pengalaman"]').val(id_url);
            $('#kbli_nonvalid_pengalaman').val('')
        }

    }

    var form_valid_pengalaman = $('#form_valid_pengalaman');
    form_valid_pengalaman.on('submit', function(e) {
        e.preventDefault();
        var url_post = $('[name="url_validasi_pengalaman"]').val()
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
                        $('#modal_valid_pengalaman').modal('hide')
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

    var form_nonvalid_pengalaman = $('#form_nonvalid_pengalaman');
    form_nonvalid_pengalaman.on('submit', function(e) {
        e.preventDefault();
        var url_post = $('[name="url_validasi_pengalaman"]').val()
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
                        $('#modal_nonvalid_pengalaman').modal('hide')
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

    function by_id_pengalaman(id_pengalaman, type) {
        var modal_pengalaman = $('#modal_pengalaman');
        var url_by_id_pengalaman = $('[name="url_by_id_pengalaman"]').val()
        if (type == 'edit') {
            saveData = 'edit';
        }
        if (type == 'hapus') {
            saveData = 'hapus';
        }
        if (type == 'upload_ktp') {
            saveData = 'upload_ktp';
        }
        if (type == 'upload_npwp') {
            saveData = 'upload_npwp';
        }

        $.ajax({
            type: "GET",
            url: url_by_id_pengalaman + id_pengalaman,
            dataType: "JSON",
            success: function(response) {
                if (type == 'edit') {
                    modal_pengalaman.modal('show');
                    $('[name="type_edit_pengalaman"]').val('edit_biasa');
                    $('[name="validasi_enkripsi_pengalaman"]').val(response['row_pengalaman'].sts_token_dokumen_pengalaman);
                    if (response['row_pengalaman']['sts_token_dokumen_pengalaman'] == 1) {
                        $('.button_enkrip_pengalaman').html('<a href="javascript:;" onclick="DekripEnkrip_pengalaman(\'' + response['row_pengalaman'].id_url + '\'' + ',' + '\'' + 'dekrip' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-lock-open mr-2"></i> Dekripsi Dokumen</a>');
                    } else {
                        $('.button_enkrip_pengalaman').html('<a href="javascript:;" onclick="DekripEnkrip_pengalaman(\'' + response['row_pengalaman'].id_url + '\'' + ',' + '\'' + 'enkrip' + '\')" class="btn btn-success btn-sm"><i class="fas fa-lock mr-2"></i> Enkripsi Dokumen</a>');
                    }
                    $('.button_nama_file_pengalaman').html('<a href="javascript:;" onclick="Download_pengalaman(\'' + response['row_pengalaman'].id_url + '\'' + ',' + '\'' + 'pengalaman_ktp' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-file mr-2"></i> ' + response['row_pengalaman'].file_kontrak_pengalaman + '</a>');
                    $('[name="id_pengalaman"]').val(response['row_pengalaman'].id_pengalaman);
                    $('[name="id_url"]').val(response['row_pengalaman'].id_url);
                    $('[name="no_kontrak"]').val(response['row_pengalaman'].no_kontrak);
                    $('[name="nama_pekerjaan"]').val(response['row_pengalaman'].nama_pekerjaan);
                    $('[name="id_jenis_usaha"]').val(response['row_pengalaman'].id_jenis_usaha);
                    $('[name="tanggal_kontrak"]').val(response['row_pengalaman'].tanggal_kontrak);
                    $('[name="instansi_pemberi"]').val(response['row_pengalaman'].instansi_pemberi);
                    $('[name="nilai_kontrak"]').val(response['row_pengalaman'].nilai_kontrak);
                    $('[name="lokasi_pekerjaan"]').val(response['row_pengalaman'].lokasi_pekerjaan);
                }
            }
        })
    }

    function DekripEnkrip_pengalaman(id_url, type) {
        var type_edit_pengalaman = $('[name="type_edit_pengalaman"]').val();
        var url_encryption_pengalaman = $('[name="url_encryption_pengalaman"]').val()
        if (type == 'dekrip') {
            $.ajax({
                method: "POST",
                url: url_encryption_pengalaman + id_url,
                dataType: "JSON",
                data: {
                    type: type,
                    type_edit_pengalaman: type_edit_pengalaman
                },
                success: function(response) {
                    let timerInterval
                    Swal.fire({
                        title: 'Sedang Proses Dekripsi!',
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
                            Swal.fire('Dokumen Berhasil Di Dekripsi', '', 'success');
                            $('[name="validasi_enkripsi_pengalaman"]').val(response['row_pengalaman_manajerial']['sts_token_dokumen_pengalaman']);
                            if (response['row_pengalaman_manajerial']['sts_token_dokumen_pengalaman'] == 1) {
                                $('.button_enkrip_pengalaman').html('<a href="javascript:;" onclick="DekripEnkrip_pengalaman(\'' + response['row_pengalaman_manajerial'].id_url + '\'' + ',' + '\'' + 'dekrip' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-lock-open mr-2"></i> Dekripsi Dokumen</a>');
                                $('.button_nama_file_pengalaman').html('<a href="javascript:;" onclick="Download_pengalaman(\'' + response['row_pengalaman_manajerial'].id_url + '\'' + ',' + '\'' + 'pengurus_ktp' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-file mr-2"></i> ' + response['row_pengalaman_manajerial'].file_kontrak_pengalaman + '</a>');

                            } else {
                                $('.button_enkrip_pengalaman').html('<a href="javascript:;" onclick="DekripEnkrip_pengalaman(\'' + response['row_pengalaman_manajerial'].id_url + '\'' + ',' + '\'' + 'enkrip' + '\')" class="btn btn-success btn-sm"><i class="fas fa-lock mr-2"></i> Enkripsi Dokumen</a>');
                                $('.button_nama_file_pengalaman').html('<a href="javascript:;" onclick="Download_pengalaman(\'' + response['row_pengalaman_manajerial'].id_url + '\'' + ',' + '\'' + 'pengurus_ktp' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-file mr-2"></i> ' + response['row_pengalaman_manajerial'].file_kontrak_pengalaman + '</a>');
                            }

                            load_data();
                        }
                    }).then((result) => {
                        /* Read more about handling dismissals below */
                        if (result.dismiss === Swal.DismissReason.timer) {

                        }
                    })
                }
            })
        } else {
            $.ajax({
                method: "POST",
                url: url_encryption_pengalaman + id_url,
                dataType: "JSON",
                data: {
                    type: type,
                    type_edit_pengalaman: type_edit_pengalaman
                },
                success: function(response) {
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
                            Swal.fire('Dokumen Berhasil Di Enkripsi', '', 'success')
                            $('[name="validasi_enkripsi_pengalaman"]').val(response['row_pengalaman_manajerial']['sts_token_dokumen_pengalaman']);
                            if (response['row_pengalaman_manajerial']['sts_token_dokumen_pengalaman'] == 1) {
                                $('.button_enkrip_pengalaman').html('<a href="javascript:;" onclick="DekripEnkrip_pengalaman(\'' + response['row_pengalaman_manajerial'].id_url + '\'' + ',' + '\'' + 'dekrip' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-lock-open mr-2"></i> Dekripsi Dokumen</a>');
                                $('.button_nama_file_pengalaman').html('<a href="javascript:;" onclick="Download_pengalaman(\'' + response['row_pengalaman_manajerial'].id_url + '\'' + ',' + '\'' + 'pengurus_ktp' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-file mr-2"></i> ' + response['row_pengalaman_manajerial'].file_kontrak_pengalaman + '</a>');

                            } else {
                                $('.button_enkrip_pengalaman').html('<a href="javascript:;" onclick="DekripEnkrip_pengalaman(\'' + response['row_pengalaman_manajerial'].id_url + '\'' + ',' + '\'' + 'enkrip' + '\')" class="btn btn-success btn-sm"><i class="fas fa-lock mr-2"></i> Enkripsi Dokumen</a>');
                                $('.button_nama_file_pengalaman').html('<a href="javascript:;" onclick="Download_pengalaman(\'' + response['row_pengalaman_manajerial'].id_url + '\'' + ',' + '\'' + 'pengurus_ktp' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-file mr-2"></i> ' + response['row_pengalaman_manajerial'].file_kontrak_pengalaman + '</a>');

                            }

                            load_data();
                        }
                    }).then((result) => {
                        /* Read more about handling dismissals below */
                        if (result.dismiss === Swal.DismissReason.timer) {

                        }
                    })
                }
            })
        }

    }
    // end pengalaman

    // pajak sppkp
    function DekripEnkrip_sppkp(id_url, type) {
        if (type == 'dekrip') {
            var id_url_sppkp = $('[name="id_url_sppkp"]').val(id_url)
            $('#modal_dekrip_sppkp').modal('show');
            $('#form_dekrip_sppkp')[0].reset();
        } else {
            var id_url_sppkp = $('[name="id_url_sppkp"]').val(id_url)
            $('#modal_enkrip_sppkp').modal('show');
            $('#form_enkrip_sppkp')[0].reset();
        }

    }

    function GenerateEnkrip_sppkp() {
        var url_encryption_sppkp = $('[name="url_encryption_sppkp"]').val();
        var modal_enkrip_sppkp = $('#modal_enkrip_sppkp');
        var id_url = $('[name="id_url_sppkp"]').val();
        $.ajax({
            method: "POST",
            url: url_encryption_sppkp + id_url,
            dataType: "JSON",
            data: $('#form_enkrip_sppkp').serialize(),
            // beforeSend: function() {
            // $('#button_dekrip_generate').css('display', 'none');
            // $('#button_dekrip_generate_manipulasi').css('display', 'block');
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
                            modal_enkrip_sppkp.modal('hide');
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

    function GenerateDekrip_sppkp() {
        var url_encryption_sppkp = $('[name="url_encryption_sppkp"]').val();
        var modal_dekrip_sppkp = $('#modal_dekrip_sppkp');
        var id_url = $('[name="id_url_sppkp"]').val();
        $.ajax({
            method: "POST",
            url: url_encryption_sppkp + id_url,
            dataType: "JSON",
            data: $('#form_dekrip_sppkp').serialize(),
            // beforeSend: function() {
            // $('#button_dekrip_generate').css('display', 'none');
            // $('#button_dekrip_generate_manipulasi').css('display', 'block');
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
                            modal_dekrip_sppkp.modal('hide');
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


    function Valid_sppkp(id_url, type = '') {
        if (type == 'terima_kbli') {
            $('#modal_valid_sppkp').modal('show')
            $('[name="url_validasi_sppkp"]').val();
            $('[name="id_url_sppkp"]').val(id_url);
            $('#kbli_valid_sppkp').val(type)
        } else {
            $('#modal_valid_sppkp').modal('show')
            $('[name="url_validasi_sppkp"]').val();
            $('[name="id_url_sppkp"]').val(id_url);
            $('#kbli_valid_sppkp').val('')
        }

    }

    function NonValid_sppkp(id_url, type = '') {
        if (type == 'tolak_kbli') {
            $('#modal_nonvalid_sppkp').modal('show')
            $('[name="url_validasi_sppkp"]').val();
            $('[name="id_url_sppkp"]').val(id_url);
            $('#kbli_nonvalid_sppkp').val(type)
        } else {
            $('#modal_nonvalid_sppkp').modal('show')
            $('[name="url_validasi_sppkp"]').val();
            $('[name="id_url_sppkp"]').val(id_url);
            $('#kbli_nonvalid_sppkp').val('')
        }

    }

    function DownloadFile_sppkp(id_url) {
        var url_download_sppkp = $('[name="url_download_sppkp"]').val()
        location.href = url_download_sppkp + id_url;
    }

    var form_valid_sppkp = $('#form_valid_sppkp');
    form_valid_sppkp.on('submit', function(e) {
        e.preventDefault();
        var url_post = $('[name="url_validasi_sppkp"]').val()
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
                        $('#modal_valid_sppkp').modal('hide')
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

    var form_nonvalid_sppkp = $('#form_nonvalid_sppkp');
    form_nonvalid_sppkp.on('submit', function(e) {
        e.preventDefault();
        var url_post = $('[name="url_validasi_sppkp"]').val()
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
                        $('#modal_nonvalid_sppkp').modal('hide')
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
    // end pajak sppkp

    // pajak npwp
    function DekripEnkrip_npwp(id_url, type) {
        if (type == 'dekrip') {
            var id_url_npwp = $('[name="id_url_npwp"]').val(id_url)
            $('#modal_dekrip_npwp').modal('show');
            $('#form_dekrip_npwp')[0].reset();
        } else {
            var id_url_npwp = $('[name="id_url_npwp"]').val(id_url)
            $('#modal_enkrip_npwp').modal('show');
            $('#form_enkrip_npwp')[0].reset();
        }

    }

    function GenerateEnkrip_npwp() {
        var url_encryption_npwp = $('[name="url_encryption_npwp"]').val();
        var modal_enkrip_npwp = $('#modal_enkrip_npwp');
        var id_url = $('[name="id_url_npwp"]').val();
        $.ajax({
            method: "POST",
            url: url_encryption_npwp + id_url,
            dataType: "JSON",
            data: $('#form_enkrip_npwp').serialize(),
            // beforeSend: function() {
            // $('#button_dekrip_generate').css('display', 'none');
            // $('#button_dekrip_generate_manipulasi').css('display', 'block');
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
                            modal_enkrip_npwp.modal('hide');
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

    function GenerateDekrip_npwp() {
        var url_encryption_npwp = $('[name="url_encryption_npwp"]').val();
        var modal_dekrip_npwp = $('#modal_dekrip_npwp');
        var id_url = $('[name="id_url_npwp"]').val();
        $.ajax({
            method: "POST",
            url: url_encryption_npwp + id_url,
            dataType: "JSON",
            data: $('#form_dekrip_npwp').serialize(),
            // beforeSend: function() {
            // $('#button_dekrip_generate').css('display', 'none');
            // $('#button_dekrip_generate_manipulasi').css('display', 'block');
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
                            modal_dekrip_npwp.modal('hide');
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


    function Valid_npwp(id_url, type = '') {
        if (type == 'terima_kbli') {
            $('#modal_valid_npwp').modal('show')
            $('[name="url_validasi_npwp"]').val();
            $('[name="id_url_npwp"]').val(id_url);
            $('#kbli_valid_npwp').val(type)
        } else {
            $('#modal_valid_npwp').modal('show')
            $('[name="url_validasi_npwp"]').val();
            $('[name="id_url_npwp"]').val(id_url);
            $('#kbli_valid_npwp').val('')
        }

    }

    function NonValid_npwp(id_url, type = '') {
        if (type == 'tolak_kbli') {
            $('#modal_nonvalid_npwp').modal('show')
            $('[name="url_validasi_npwp"]').val();
            $('[name="id_url_npwp"]').val(id_url);
            $('#kbli_nonvalid_npwp').val(type)
        } else {
            $('#modal_nonvalid_npwp').modal('show')
            $('[name="url_validasi_npwp"]').val();
            $('[name="id_url_npwp"]').val(id_url);
            $('#kbli_nonvalid_npwp').val('')
        }

    }

    function DownloadFile_npwp(id_url) {
        var url_download_npwp = $('[name="url_download_npwp"]').val()
        location.href = url_download_npwp + id_url;
    }

    var form_valid_npwp = $('#form_valid_npwp');
    form_valid_npwp.on('submit', function(e) {
        e.preventDefault();
        var url_post = $('[name="url_validasi_npwp"]').val()
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
                        $('#modal_valid_npwp').modal('hide')
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

    var form_nonvalid_npwp = $('#form_nonvalid_npwp');
    form_nonvalid_npwp.on('submit', function(e) {
        e.preventDefault();
        var url_post = $('[name="url_validasi_npwp"]').val()
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
                        $('#modal_nonvalid_npwp').modal('hide')
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
    // end pajak npwp

    // pajak spt
    function byid_spt(id, type) {
        if (type == 'lihat') {
            saveData = 'lihat';
        }
        if (type == 'dekrip') {
            saveData = 'dekrip';
        }
        if (type == 'enkrip') {
            saveData = 'enkrip';
        }
        var url_get_spt_by_id = $('[name="url_get_spt_by_id"]').val();
        var modal_edit_spt = $('#modal_edit_spt')
        var modal_dekrip_spt = $('#modal_dekrip_spt');
        var modal_enkrip_spt = $('#modal_enkrip_spt');
        $.ajax({
            type: "GET",
            url: url_get_spt_by_id + id,
            dataType: "JSON",
            success: function(response) {
                if (type == 'lihat') {
                    modal_edit_spt.modal('show')
                    $('#nomor_surat').val(response['row_spt'].nomor_surat)
                    $('#tahun_lapor').val(response['row_spt'].tahun_lapor)
                    $('#jenis_spt').val(response['row_spt'].jenis_spt)
                    $('#tgl_penyampaian').val(response['row_spt'].tgl_penyampaian)
                    $('[name="id_url"]').val(response['row_spt'].id_url)


                } else if (type == 'dekrip') {
                    modal_dekrip_spt.modal('show');
                    $('[name="id_url_spt"]').val(response['row_spt'].id_url);
                    $('.button_enkrip_spt').html('<a href="javascript:;" onclick="DekripEnkrip_spt(\'' + response['row_spt'].file_dokumen + '\'' + ',' + '\'' + 'dekrip' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-lock-open mr-2"></i> Dekripsi Dokumen</a>');
                    var html2 = '<a href="javascript:;" style="white-space: nowrap;width: 200px;overflow: hidden;text-overflow: ellipsis;" class="btn btn-sm btn-info btn-block">' +
                        response['row_spt'].file_dokumen + '</a>';
                    $('.token_generate_spt').html('<div class="input-group"><span class="input-group-text"><i class="fas fa-qrcode"></i></span><textarea class="form-control form-control-sm" disabled>' + response['row_spt'].token_dokumen + '</textarea></div>');
                } else if (type == 'enkrip') {
                    modal_enkrip_spt.modal('show');
                    $('[name="id_url_spt"]').val(response['row_spt'].id_url);
                    $('.button_enkrip_spt').html('<a href="javascript:;" onclick="DekripEnkrip_spt(\'' + response['row_spt'].id_url + '\'' + ',' + '\'' + 'enkrip' + '\')" class="btn btn-success btn-sm"><i class="fas fa-lock mr-2"></i> Enkripsi Dokumen</a>');
                    var html2 = '<a href="javascript:;" style="white-space: nowrap;width: 200px;overflow: hidden;text-overflow: ellipsis;" onclick="DownloadFile_spt(\'' + response['row_spt'].id_url + '\')" class="btn btn-sm btn-warning btn-block">' + response['row_spt'].file_dokumen + '</a>';
                    $('.token_generate_spt').html('<div class="input-group"><span class="input-group-text"><i class="fas fa-qrcode"></i></span><textarea class="form-control form-control-sm" disabled>' + response['row_spt'].token_dokumen + '</textarea></div>');
                }
            }
        })
    }

    function Valid_spt(id_url, type = '') {
        if (type == 'terima_kbli') {
            $('#modal_valid_spt').modal('show')
            $('[name="url_validasi_spt"]').val();
            $('[name="id_url_spt"]').val(id_url);
            $('#kbli_valid_spt').val(type)
        } else {
            $('#modal_valid_spt').modal('show')
            $('[name="url_validasi_spt"]').val();
            $('[name="id_url_spt"]').val(id_url);
            $('#kbli_valid_spt').val('')
        }

    }

    function NonValid_spt(id_url, type = '') {
        if (type == 'tolak_kbli') {
            $('#modal_nonvalid_spt').modal('show')
            $('[name="url_validasi_spt"]').val();
            $('[name="id_url_spt"]').val(id_url);
            $('#kbli_nonvalid_spt').val(type)
        } else {
            $('#modal_nonvalid_spt').modal('show')
            $('[name="url_validasi_spt"]').val();
            $('[name="id_url_spt"]').val(id_url);
            $('#kbli_nonvalid_spt').val('')
        }
    }

    var form_valid_spt = $('#form_valid_spt');
    form_valid_spt.on('submit', function(e) {
        e.preventDefault();
        var url_post = $('[name="url_validasi_spt"]').val()
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
                        $('#modal_valid_spt').modal('hide')
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

    var form_nonvalid_spt = $('#form_nonvalid_spt');
    form_nonvalid_spt.on('submit', function(e) {
        e.preventDefault();
        var url_post = $('[name="url_validasi_spt"]').val()
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
                        $('#modal_nonvalid_spt').modal('hide')
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


    function GenerateDekrip_spt() {
        var url_encryption_spt = $('[name="url_encryption_spt"]').val();
        var modal_dekrip_spt = $('#modal_dekrip_spt');
        var id_url = $('[name="id_url_spt"]').val();
        $.ajax({
            method: "POST",
            url: url_encryption_spt + id_url,
            dataType: "JSON",
            data: $('#form_dekrip_spt').serialize(),
            // beforeSend: function() {
            // $('#button_dekrip_generate').css('display', 'none');
            // $('#button_dekrip_generate_manipulasi').css('display', 'block');
            // },
            success: function(response) {
                if (response['maaf']) {
                    Swal.fire(response['maaf'], '', 'warning')
                } else {
                    let timerInterval
                    Swal.fire({
                        title: 'Sedang Proses Deskripsi!',
                        html: 'Proses Deksripsi <b></b>',
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
                            Swal.fire('Dokumen Berhasil Di Deskripsi!', '', 'success')
                            load_data();
                            $('#button_dekrip_generate').css('display', 'block');
                            $('#button_dekrip_generate_manipulasi').css('display', 'none');
                            modal_dekrip_spt.modal('hide');
                            $('#form_dekrip_spt')[0].reset()
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


    function GenerateEnkrip_spt() {
        var url_encryption_spt = $('[name="url_encryption_spt"]').val();
        var modal_enkrip_spt = $('#modal_enkrip_spt');
        var id_url = $('[name="id_url_spt"]').val();
        $.ajax({
            method: "POST",
            url: url_encryption_spt + id_url,
            dataType: "JSON",
            data: $('#form_enkrip_spt').serialize(),
            // beforeSend: function() {
            // $('#button_dekrip_generate').css('display', 'none');
            // $('#button_dekrip_generate_manipulasi').css('display', 'block');
            // },
            success: function(response) {
                if (response['maaf']) {
                    Swal.fire(response['maaf'], '', 'warning')
                } else {
                    let timerInterval
                    Swal.fire({
                        title: 'Sedang Proses Deskripsi!',
                        html: 'Proses Deksripsi <b></b>',
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
                            Swal.fire('Dokumen Berhasil Di Deskripsi!', '', 'success')
                            load_data();
                            $('#button_dekrip_generate').css('display', 'block');
                            $('#button_dekrip_generate_manipulasi').css('display', 'none');
                            $('#form_enkrip_spt')[0].reset()
                            modal_enkrip_spt.modal('hide');
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

    function DownloadFile_spt(id_url) {
        var url_download_spt = $('[name="url_download_spt"]').val()
        location.href = url_download_spt + id_url;
    }
    // end pajak spt

    // pajak neraca
    function byid_neraca(id, type) {
        if (type == 'lihat') {
            saveData = 'lihat';
        }
        if (type == 'dekrip') {
            saveData = 'dekrip';
        }
        if (type == 'enkrip') {
            saveData = 'enkrip';
        }
        var url_get_neraca_by_id = $('[name="url_get_neraca_by_id"]').val();
        var modal_edit_neraca = $('#modal_edit_neraca')
        var modal_dekrip_neraca = $('#modal_dekrip_neraca');
        var modal_enkrip_neraca = $('#modal_enkrip_neraca');
        $.ajax({
            type: "GET",
            url: url_get_neraca_by_id + id,
            dataType: "JSON",
            success: function(response) {
                if (type == 'lihat') {
                    modal_edit_neraca.modal('show')
                    // $('#nomor_surat').val(response['row_neraca'].nomor_surat)
                    // $('#tahun_lapor').val(response['row_neraca'].tahun_lapor)
                    // $('#jenis_neraca').val(response['row_neraca'].jenis_neraca)
                    // $('#tgl_penyampaian').val(response['row_neraca'].tgl_penyampaian)
                    $('[name="id_url"]').val(response['row_neraca'].id_url_neraca)


                } else if (type == 'dekrip') {
                    modal_dekrip_neraca.modal('show');
                    $('[name="id_url_neraca"]').val(response['row_neraca'].id_url_neraca);
                    $('.button_enkrip_neraca').html('<a href="javascript:;" onclick="DekripEnkrip_neraca(\'' + response['row_neraca'].file_dokumen_neraca + '\'' + ',' + '\'' + 'dekrip' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-lock-open mr-2"></i> Dekripsi Dokumen</a>');
                    var html2 = '<a href="javascript:;" style="white-space: nowrap;width: 200px;overflow: hidden;text-overflow: ellipsis;" class="btn btn-sm btn-info btn-block">' +
                        response['row_neraca'].file_dokumen_neraca + '</a>';
                    $('.token_generate_neraca').html('<div class="input-group"><span class="input-group-text"><i class="fas fa-qrcode"></i></span><textarea class="form-control form-control-sm" disabled>' + response['row_neraca'].id_url_neraca + '</textarea></div>');
                } else if (type == 'enkrip') {
                    modal_enkrip_neraca.modal('show');
                    $('[name="id_url_neraca"]').val(response['row_neraca'].id_url_neraca);
                    $('.button_enkrip_neraca').html('<a href="javascript:;" onclick="DekripEnkrip_neraca(\'' + response['row_neraca'].id_url_neraca + '\'' + ',' + '\'' + 'enkrip' + '\')" class="btn btn-success btn-sm"><i class="fas fa-lock mr-2"></i> Enkripsi Dokumen</a>');
                    var html2 = '<a href="javascript:;" style="white-space: nowrap;width: 200px;overflow: hidden;text-overflow: ellipsis;" onclick="DownloadFile_neraca(\'' + response['row_neraca'].id_url_neraca + '\')" class="btn btn-sm btn-warning btn-block">' + response['row_neraca'].file_dokumen_neraca + '</a>';
                    $('.token_generate_neraca').html('<div class="input-group"><span class="input-group-text"><i class="fas fa-qrcode"></i></span><textarea class="form-control form-control-sm" disabled>' + response['row_neraca'].id_url_neraca + '</textarea></div>');
                }
            }
        })
    }

    function Valid_neraca(id_url, type = '') {
        if (type == 'terima_kbli') {
            $('#modal_valid_neraca').modal('show')
            $('[name="url_validasi_neraca"]').val();
            $('[name="id_url_neraca"]').val(id_url);
            $('#kbli_valid_neraca').val(type)
        } else {
            $('#modal_valid_neraca').modal('show')
            $('[name="url_validasi_neraca"]').val();
            $('[name="id_url_neraca"]').val(id_url);
            $('#kbli_valid_neraca').val('')
        }

    }

    function NonValid_neraca(id_url, type = '') {
        if (type == 'tolak_kbli') {
            $('#modal_nonvalid_neraca').modal('show')
            $('[name="url_validasi_neraca"]').val();
            $('[name="id_url_neraca"]').val(id_url);
            $('#kbli_nonvalid_neraca').val(type)
        } else {
            $('#modal_nonvalid_neraca').modal('show')
            $('[name="url_validasi_neraca"]').val();
            $('[name="id_url_neraca"]').val(id_url);
            $('#kbli_nonvalid_neraca').val('')
        }
    }

    var form_valid_neraca = $('#form_valid_neraca');
    form_valid_neraca.on('submit', function(e) {
        e.preventDefault();
        var url_post = $('[name="url_validasi_neraca"]').val()
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
                        $('#modal_valid_neraca').modal('hide')
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

    var form_nonvalid_neraca = $('#form_nonvalid_neraca');
    form_nonvalid_neraca.on('submit', function(e) {
        e.preventDefault();
        var url_post = $('[name="url_validasi_neraca"]').val()
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
                        $('#modal_nonvalid_neraca').modal('hide')
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


    function GenerateDekrip_neraca() {
        var url_encryption_neraca = $('[name="url_encryption_neraca"]').val();
        var modal_dekrip_neraca = $('#modal_dekrip_neraca');
        var id_url = $('[name="id_url_neraca"]').val();
        $.ajax({
            method: "POST",
            url: url_encryption_neraca + id_url,
            dataType: "JSON",
            data: $('#form_dekrip_neraca').serialize(),
            // beforeSend: function() {
            // $('#button_dekrip_generate').css('display', 'none');
            // $('#button_dekrip_generate_manipulasi').css('display', 'block');
            // },
            success: function(response) {
                if (response['maaf']) {
                    Swal.fire(response['maaf'], '', 'warning')
                } else {
                    let timerInterval
                    Swal.fire({
                        title: 'Sedang Proses Deskripsi!',
                        html: 'Proses Deksripsi <b></b>',
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
                            Swal.fire('Dokumen Berhasil Di Deskripsi!', '', 'success')
                            load_data();
                            $('#button_dekrip_generate').css('display', 'block');
                            $('#button_dekrip_generate_manipulasi').css('display', 'none');
                            modal_dekrip_neraca.modal('hide');
                            $('#form_dekrip_neraca')[0].reset()
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


    function GenerateEnkrip_neraca() {
        var url_encryption_neraca = $('[name="url_encryption_neraca"]').val();
        var modal_enkrip_neraca = $('#modal_enkrip_neraca');
        var id_url = $('[name="id_url_neraca"]').val();
        $.ajax({
            method: "POST",
            url: url_encryption_neraca + id_url,
            dataType: "JSON",
            data: $('#form_enkrip_neraca').serialize(),
            // beforeSend: function() {
            // $('#button_dekrip_generate').css('display', 'none');
            // $('#button_dekrip_generate_manipulasi').css('display', 'block');
            // },
            success: function(response) {
                if (response['maaf']) {
                    Swal.fire(response['maaf'], '', 'warning')
                } else {
                    let timerInterval
                    Swal.fire({
                        title: 'Sedang Proses Deskripsi!',
                        html: 'Proses Deksripsi <b></b>',
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
                            Swal.fire('Dokumen Berhasil Di Deskripsi!', '', 'success')
                            load_data();
                            $('#button_dekrip_generate').css('display', 'block');
                            $('#button_dekrip_generate_manipulasi').css('display', 'none');
                            $('#form_enkrip_neraca')[0].reset()
                            modal_enkrip_neraca.modal('hide');
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

    function DownloadFile_neraca(id_url, type) {
        var url_download_neraca = $('[name="url_download_neraca"]').val()
        location.href = url_download_neraca + id_url + '/' + type;
    }




    // pajak keuangan
    function byid_keuangan(id, type) {
        if (type == 'lihat') {
            saveData = 'lihat';
        }
        if (type == 'dekrip') {
            saveData = 'dekrip';
        }
        if (type == 'enkrip') {
            saveData = 'enkrip';
        }
        var url_get_keuangan_by_id = $('[name="url_get_keuangan_by_id"]').val();
        var modal_edit_keuangan = $('#modal_edit_keuangan')
        var modal_dekrip_keuangan = $('#modal_dekrip_keuangan');
        var modal_enkrip_keuangan = $('#modal_enkrip_keuangan');
        $.ajax({
            type: "GET",
            url: url_get_keuangan_by_id + id,
            dataType: "JSON",
            success: function(response) {
                if (type == 'lihat') {
                    modal_edit_keuangan.modal('show')
                    // $('#nomor_surat').val(response['row_keuangan'].nomor_surat)
                    // $('#tahun_lapor').val(response['row_keuangan'].tahun_lapor)
                    // $('#jenis_keuangan').val(response['row_keuangan'].jenis_keuangan)
                    // $('#tgl_penyampaian').val(response['row_keuangan'].tgl_penyampaian)
                    $('[name="id_url"]').val(response['row_keuangan'].id_url)


                } else if (type == 'dekrip') {
                    modal_dekrip_keuangan.modal('show');
                    $('[name="id_url_keuangan"]').val(response['row_keuangan'].id_url);
                    $('.button_enkrip_keuangan').html('<a href="javascript:;" onclick="DekripEnkrip_keuangan(\'' + response['row_keuangan'].file_dokumen_keuangan + '\'' + ',' + '\'' + 'dekrip' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-lock-open mr-2"></i> Dekripsi Dokumen</a>');
                    var html2 = '<a href="javascript:;" style="white-space: nowrap;width: 200px;overflow: hidden;text-overflow: ellipsis;" class="btn btn-sm btn-info btn-block">' +
                        response['row_keuangan'].file_dokumen_keuangan + '</a>';
                    $('.token_generate_keuangan').html('<div class="input-group"><span class="input-group-text"><i class="fas fa-qrcode"></i></span><textarea class="form-control form-control-sm" disabled>' + response['row_keuangan'].token_dokumen + '</textarea></div>');
                } else if (type == 'enkrip') {
                    modal_enkrip_keuangan.modal('show');
                    $('[name="id_url_keuangan"]').val(response['row_keuangan'].id_url);
                    $('.button_enkrip_keuangan').html('<a href="javascript:;" onclick="DekripEnkrip_keuangan(\'' + response['row_keuangan'].id_url + '\'' + ',' + '\'' + 'enkrip' + '\')" class="btn btn-success btn-sm"><i class="fas fa-lock mr-2"></i> Enkripsi Dokumen</a>');
                    var html2 = '<a href="javascript:;" style="white-space: nowrap;width: 200px;overflow: hidden;text-overflow: ellipsis;" onclick="DownloadFile_keuangan(\'' + response['row_keuangan'].id_url + '\')" class="btn btn-sm btn-warning btn-block">' + response['row_keuangan'].file_dokumen_keuangan + '</a>';
                    $('.token_generate_keuangan').html('<div class="input-group"><span class="input-group-text"><i class="fas fa-qrcode"></i></span><textarea class="form-control form-control-sm" disabled>' + response['row_keuangan'].token_dokumen + '</textarea></div>');
                }
            }
        })
    }

    function Valid_keuangan(id_url, type = '') {
        if (type == 'terima_kbli') {
            $('#modal_valid_keuangan').modal('show')
            $('[name="url_validasi_keuangan"]').val();
            $('[name="id_url_keuangan"]').val(id_url);
            $('#kbli_valid_keuangan').val(type)
        } else {
            $('#modal_valid_keuangan').modal('show')
            $('[name="url_validasi_keuangan"]').val();
            $('[name="id_url_keuangan"]').val(id_url);
            $('#kbli_valid_keuangan').val('')
        }

    }

    function NonValid_keuangan(id_url, type = '') {
        if (type == 'tolak_kbli') {
            $('#modal_nonvalid_keuangan').modal('show')
            $('[name="url_validasi_keuangan"]').val();
            $('[name="id_url_keuangan"]').val(id_url);
            $('#kbli_nonvalid_keuangan').val(type)
        } else {
            $('#modal_nonvalid_keuangan').modal('show')
            $('[name="url_validasi_keuangan"]').val();
            $('[name="id_url_keuangan"]').val(id_url);
            $('#kbli_nonvalid_keuangan').val('')
        }
    }

    var form_valid_keuangan = $('#form_valid_keuangan');
    form_valid_keuangan.on('submit', function(e) {
        e.preventDefault();
        var url_post = $('[name="url_validasi_keuangan"]').val()
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
                        $('#modal_valid_keuangan').modal('hide')
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

    var form_nonvalid_keuangan = $('#form_nonvalid_keuangan');
    form_nonvalid_keuangan.on('submit', function(e) {
        e.preventDefault();
        var url_post = $('[name="url_validasi_keuangan"]').val()
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
                        $('#modal_nonvalid_keuangan').modal('hide')
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


    function GenerateDekrip_keuangan() {
        var url_encryption_keuangan = $('[name="url_encryption_keuangan"]').val();
        var modal_dekrip_keuangan = $('#modal_dekrip_keuangan');
        var id_url = $('[name="id_url_keuangan"]').val();
        $.ajax({
            method: "POST",
            url: url_encryption_keuangan + id_url,
            dataType: "JSON",
            data: $('#form_dekrip_keuangan').serialize(),
            // beforeSend: function() {
            // $('#button_dekrip_generate').css('display', 'none');
            // $('#button_dekrip_generate_manipulasi').css('display', 'block');
            // },
            success: function(response) {
                if (response['maaf']) {
                    Swal.fire(response['maaf'], '', 'warning')
                } else {
                    let timerInterval
                    Swal.fire({
                        title: 'Sedang Proses Deskripsi!',
                        html: 'Proses Deksripsi <b></b>',
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
                            Swal.fire('Dokumen Berhasil Di Deskripsi!', '', 'success')
                            load_data();
                            $('#button_dekrip_generate').css('display', 'block');
                            $('#button_dekrip_generate_manipulasi').css('display', 'none');
                            modal_dekrip_keuangan.modal('hide');
                            $('#form_dekrip_keuangan')[0].reset()
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


    function GenerateEnkrip_keuangan() {
        var url_encryption_keuangan = $('[name="url_encryption_keuangan"]').val();
        var modal_enkrip_keuangan = $('#modal_enkrip_keuangan');
        var id_url = $('[name="id_url_keuangan"]').val();
        $.ajax({
            method: "POST",
            url: url_encryption_keuangan + id_url,
            dataType: "JSON",
            data: $('#form_enkrip_keuangan').serialize(),
            // beforeSend: function() {
            // $('#button_dekrip_generate').css('display', 'none');
            // $('#button_dekrip_generate_manipulasi').css('display', 'block');
            // },
            success: function(response) {
                if (response['maaf']) {
                    Swal.fire(response['maaf'], '', 'warning')
                } else {
                    let timerInterval
                    Swal.fire({
                        title: 'Sedang Proses Deskripsi!',
                        html: 'Proses Deksripsi <b></b>',
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
                            Swal.fire('Dokumen Berhasil Di Deskripsi!', '', 'success')
                            load_data();
                            $('#button_dekrip_generate').css('display', 'block');
                            $('#button_dekrip_generate_manipulasi').css('display', 'none');
                            $('#form_enkrip_keuangan')[0].reset()
                            modal_enkrip_keuangan.modal('hide');
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

    function DownloadFile_keuangan(id_url, type) {
        var url_download_keuangan = $('[name="url_download_keuangan"]').val()
        location.href = url_download_keuangan + id_url + '/' + type;
    }
</script>