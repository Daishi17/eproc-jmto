<script>
    var tbl_rekanan_terundang = $('#tbl_rekanan_terundang')
    var url_get_rekanan_terundang = $('[name="url_get_rekanan_terundang"').val()
    $(document).ready(function() {
        tbl_rekanan_terundang.DataTable({
            "responsive": false,
            "ordering": true,
            "processing": true,
            "serverSide": true,
            "dom": 'Bfrtip',
            "buttons": ["excel", "pdf", "print", "colvis"],
            "order": [],
            "ajax": {
                "url": url_get_rekanan_terundang,
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
        }).buttons().container().appendTo('#tbl_rekanan_terundang .col-md-6:eq(0)');
    });

    function Reload_table_rekanan_baru() {
        tbl_rekanan_terundang.DataTable().ajax.reload();
    }

    function byid_vendor(id_vendor, type) {
        if (type == 'lihat') {
            saveData = 'lihat';
        }
        if (type == 'undang') {
            saveData = 'undang';
        }
        if (type == 'pesan') {
            saveData = 'pesan';
        }
        var url_get_rekanan_tervalidasi_by_id = $('[name="url_get_rekanan_tervalidasi_by_id"]').val();
        var modal_pesan = $('#modal_pesan')
        var modal_undang = $('#modal_undang')
        $.ajax({
            type: "GET",
            url: url_get_rekanan_tervalidasi_by_id + id_vendor,
            dataType: "JSON",
            success: function(response) {
                if (type == 'pesan') {
                    $('[name="id_url_vendor"]').val(id_vendor)
                    modal_pesan.modal('show')
                } else if (type == 'undang') {
                    modal_undang.modal('show')
                    $('[name="id_url_vendor"]').val(id_vendor)
                    $('#nama_usaha').text(response['row_vendor'].nama_usaha)
                } else if (type == 'tidak_valid') {
                    Question_tidak_valid(id_vendor, response['row_vendor'].nama_usaha)
                }
            }
        })
    }


    var form_pesan = $('#form_pesan');
    form_pesan.on('submit', function(e) {
        var pesan = $('[name="pesan"]').val()
        e.preventDefault();
        if (pesan == '') {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Isi Pesan Terlebih Dahulu Ya!'
            })
        } else {
            var url_post = $('[name="url_kirim_pesan"]').val()
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
                        title: 'Sedang Proses Mengirim Pesan!',
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
                            $('#modal_pesan').modal('hide')
                            Swal.fire('Pesan Berhasil Terkirim!', '', 'success')
                            Reload_table_rekanan_baru()
                            form_pesan[0].reset();
                        }
                    }).then((result) => {
                        /* Read more about handling dismissals below */
                        if (result.dismiss === Swal.DismissReason.timer) {

                        }
                    })
                }
            })
        }

    })

    var form_undang = $('#form_undang')
    form_undang.on('submit', function(e) {
        e.preventDefault();
        var post = $('[name="url_kirim_undangan"]').val()
        $.ajax({
            url: post,
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(response) {
                let timerInterval
                Swal.fire({
                    title: 'Sedang Proses Mengirim Undangan!',
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
                        $('#modal_undang').modal('hide')
                        Swal.fire('Undangan Berhasil Terkirim!', '', 'success')
                        Reload_table_rekanan_baru()
                        form_undang[0].reset();
                    }
                }).then((result) => {
                    /* Read more about handling dismissals below */
                    if (result.dismiss === Swal.DismissReason.timer) {

                    }
                })
            }
        })
    })


    function Question_tidak_valid(id_vendor, nm_vendor) {
        var url_tidak_valid = $('[name="url_tidak_valid"]').val()
        Swal.fire({
            title: 'Apakah Anda Yakin Terima Penyedia? ' + nm_vendor,
            text: "Penyedia Akan Dikeluarkan dari daftar Penyedia Terundang!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya!',
            cancelButtonText: 'Batal!',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: url_tidak_valid,
                    data: {
                        id_vendor: id_vendor,
                    },
                    dataType: "JSON",
                    success: function(response) {
                        if (response['message'] == 'success') {
                            Swal.fire(
                                'Berhasil!',
                                'Penyedia ' + nm_vendor + ' Berhasil Di Keluarkan Dari Penyedia Terundang!',
                                'success'
                            )
                            Reload_table_rekanan_baru();
                        }
                    }
                })

            }
        })
    }
</script>