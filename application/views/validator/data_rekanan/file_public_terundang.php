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
        if (type == 'terima') {
            saveData = 'terima';
        }
        if (type == 'tolak') {
            saveData = 'tolak';
        }
        var url_get_rekanan_terundang_by_id = $('[name="url_get_rekanan_terundang_by_id"]').val();
        var modal_rekanan_baru = $('#modal-xl-view')
        $.ajax({
            type: "GET",
            url: url_get_rekanan_terundang_by_id + id_vendor,
            dataType: "JSON",
            success: function(response) {
                if (type == 'lihat') {
                    modal_rekanan_baru.modal('show')
                    $('#nama_usaha').text(response['row_vendor'].nama_usaha)
                    $('#id_jenis_usaha').text(response['jenis_izin'])
                    $('#kualifikasi_usaha').text(response['row_vendor'].kualifikasi_usaha)
                    $('#npwp').text(response['row_vendor'].npwp)
                    $('#email').text(response['row_vendor'].email)
                    $('#bentuk_usaha').text(response['row_vendor'].bentuk_usaha)
                    $('#alamat').text(response['row_vendor'].alamat)
                    $('#nama_provinsi').text(response['row_vendor'].nama_provinsi)
                } else if (type == 'terima') {
                    Question_kbli_nib(id_vendor, response['row_vendor'].nama_usaha)
                } else {

                }
            }
        })

    }


    function Question_kbli_nib(id_vendor, nm_vendor) {
        var url_terima_rekanan_baru = $('[name="url_terima_rekanan_baru"]').val()
        Swal.fire({
            title: 'Apakah Anda Yakin Terima Penyedia? ' + nm_vendor,
            text: "Penyedia Yang Sudah Di Terima Tidak Bisa Di Tolak Kembali!",
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
                    url: url_terima_rekanan_baru,
                    data: {
                        id_vendor: id_vendor,
                    },
                    dataType: "JSON",
                    success: function(response) {
                        if (response['message'] == 'success') {
                            Swal.fire(
                                'Berhasil!',
                                'Penyedia ' + nm_vendor + ' Berhasil Di Terima!',
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