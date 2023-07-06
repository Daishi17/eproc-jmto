<script>
    var url_get_sbu = $('[name="url_get_sbu"').val();
    $(document).ready(function() {
        $('#example1').DataTable({
            "responsive": false,
            "ordering": true,
            "processing": true,
            "serverSide": true,
            "bDestroy": true,
            "dom": 'Bfrtip',
            "buttons": ["excel", "pdf", "print", "colvis"],
            "order": [],
            "ajax": {
                "url": url_get_sbu,
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

    function reload_table() {
        $('#example1').DataTable().ajax.reload();
    }


    function byid(id, type) {
        var url_get_row = $('[name="url_get_row"]').val()
        $.ajax({
            method: "POST",
            url: url_get_row + id,
            dataType: "JSON",
            success: function(response) {
                if (type == 'edit') {

                    $('#modal-xl-tambah').modal('show')
                    $('[name="kode_kbli"').val(response.kode_kbli)
                    $('[name="nama_kbli"').val(response.nama_kbli)
                    $('[name="id_kbli"').val(response.id_kbli)
                    $('[name="type"').val('edit')


                } else if (type == 'add') {
                    $('#modal-xl-tambah').modal('show')
                    form_kbli[0].reset();
                    $('[name="type"').val('add')
                } else if (type == 'aktif') {
                    Question_aktifkan(id, response.nama_kbli)
                } else if (type == 'nonaktif') {
                    var url_get_row = $('[name="url_get_row"]').val()
                    $.ajax({
                        method: "POST",
                        url: url_get_row + id,
                        dataType: "JSON",
                        success: function(response) {
                            $('#modal-xl-tambah').modal('show')
                            $('[name="kode_kbli"').val(response.kode_kbli)
                            $('[name="nama_kbli"').val(response.nama_kbli)
                            $('[name="id_kbli"').val(response.id_kbli)
                            $('[name="type"').val('edit')

                        }
                    })
                }

            }
        })

    }

    function Question_aktifkan(id, nama_kbli) {
        var url_aktifkan_kbli = $('[name="url_aktifkan_kbli"]').val()
        Swal.fire({
            title: 'Apakah Anda Yakin Ingin Aktifkan Data ? ',
            text: nama_kbli,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Terima!',
            cancelButtonText: 'Batal!',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: url_aktifkan_kbli,
                    data: {
                        id_kbli: id,
                    },
                    dataType: "JSON",
                    success: function(response) {
                        if (response == 'success') {
                            Swal.fire(
                                'Berhasil!',
                                'Jenis KBLI ' + nama_kbli + ' Berhasil Di Aktifkan!',
                                'success'
                            )
                            reload_table();
                        }
                    }
                })

            }
        })
    }

    var form_kbli = $('#form_kbli');
    form_kbli.on('submit', function(e) {
        e.preventDefault();
        var url_post = $('[name="url_post"]').val()
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
                        $('#modal-xl-tambah').modal('hide')
                        form_kbli[0].reset();
                        reload_table()
                        Swal.fire('Data Berhasil Di Aktifkan!', '', 'success')
                    }
                }).then((result) => {
                    /* Read more about handling dismissals below */
                    if (result.dismiss === Swal.DismissReason.timer) {

                    }
                })
            }
        })
    })
</script>