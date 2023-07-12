$message = "Dokumen SIUP dengan nomor surat "  . $id_vendor['nomor_surat'] . " Telah Berhasil Di Validasi";
				$type_email = 'SIUP';
				$this->email_send->sen_row_email($type_email, $id_vendor['id_vendor'], $message);

                $message = "Dokumen SIUP dengan nomor surat "  . $id_vendor['nomor_surat'] . " Gagal Di Validasi Silahkan Segera Upload Ulang Dokumen SIUP Anda";
				$type_email = 'SIUP';
				$this->email_send->sen_row_email($type_email, $id_vendor['id_vendor'], $message);


                <!-- kbli -->

                $type_email = 'KBLI-SIUP';
				$message = "Jenis KBLI dengan kode KBLI "  . $id_vendor['kode_kbli'] . "-". $id_vendor['nama_kbli'] . " Telah Berhasil Di Validasi";
				$this->email_send->sen_row_email($type_email, $id_vendor['id_vendor'], $message);

                $type_email = 'KBLI-SIUP';
				$message = "Jenis KBLI dengan kode KBLI "  . $id_vendor['kode_kbli'] . "-". $id_vendor['nama_kbli'] . " Gagal Di Validasi Silahkan Segera Ubah KODE KBLI anda pada dokumen SIUP";
				$this->email_send->sen_row_email($type_email, $id_vendor['id_vendor'], $message);