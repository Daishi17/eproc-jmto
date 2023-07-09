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
        if (type == 'add') {
            $('#modal-xl-tambah').modal('show')
            form_sbu[0].reset();
            $('[name="type"').val('add')
        } else {
            $.ajax({
                method: "POST",
                url: url_get_row + id,
                dataType: "JSON",
                success: function(response) {
                    if (type == 'edit') {

                        $('#modal-xl-tambah').modal('show')
                        $('[name="kode_sbu"').val(response.kode_sbu)
                        $('[name="nama_sbu"').val(response.nama_sbu)
                        $('[name="id_sbu"').val(response.id_sbu)
                        $('[name="type"').val('edit')

                    } else if (type == 'aktif') {
                        Question_aktifkan(id, response.nama_sbu)
                    } else if (type == 'nonaktif') {
                        Question_nonaktifkan(id, response.nama_sbu)
                    }

                }
            })
        }


    }

    function Question_aktifkan(id, nama_sbu) {
        var url_aktifkan_sbu = $('[name="url_aktifkan_sbu"]').val()
        Swal.fire({
            title: 'Apakah Anda Yakin Ingin Aktifkan Data ? ',
            text: nama_sbu,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya',
            cancelButtonText: 'Batal!',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: url_aktifkan_sbu,
                    data: {
                        id_sbu: id,
                    },
                    dataType: "JSON",
                    success: function(response) {
                        if (response == 'success') {
                            Swal.fire(
                                'Berhasil!',
                                'Jenis KBLI ' + nama_sbu + ' Berhasil Di Aktifkan!',
                                'success'
                            )
                            reload_table();
                        }
                    }
                })

            }
        })
    }

    function Question_nonaktifkan(id, nama_sbu) {
        var url_nonaktifkan_sbu = $('[name="url_nonaktifkan_sbu"]').val()
        Swal.fire({
            title: 'Apakah Anda Yakin Ingin Non-Aktifkan Data ? ',
            text: nama_sbu,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya',
            cancelButtonText: 'Batal!',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: url_nonaktifkan_sbu,
                    data: {
                        id_sbu: id,
                    },
                    dataType: "JSON",
                    success: function(response) {
                        if (response == 'success') {
                            Swal.fire(
                                'Berhasil!',
                                'Jenis KBLI ' + nama_sbu + ' Berhasil Di Non-Aktifkan!',
                                'success'
                            )
                            reload_table();
                        }
                    }
                })

            }
        })
    }

    var form_sbu = $('#form_sbu');
    form_sbu.on('submit', function(e) {
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
                        form_sbu[0].reset();
                        reload_table()
                        Swal.fire('Data Berhasil Di Masukkan!', '', 'success')
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