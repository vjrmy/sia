            <div class="content-wrapper container">
                
<section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                   Jadwal Kelas Perkuliahan
                </h5>
                <br>
                <button class="btn btn-success" data-toggle="modal" data-target="#myModalAdd">Add New</button>
    <table class="table table-striped" id="mytable">
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tahun Ajaran</th>
                                <th>Jurusan</th>
                                <th>Program Studi</th>
                                <th>Mata Kuliah</th>
                                <th>Semester</th>
                                <th>Ruang</th>
                                <th>Hari</th>
                                <th>Waktu</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
</section>
            </div>



<script>
        $(document).ready(function(){
                // Setup datatables
                $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
      {
          return {
              "iStart": oSettings._iDisplayStart,
              "iEnd": oSettings.fnDisplayEnd(),
              "iLength": oSettings._iDisplayLength,
              "iTotal": oSettings.fnRecordsTotal(),
              "iFilteredTotal": oSettings.fnRecordsDisplay(),
              "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
              "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
          };
      };
 
      var table = $("#mytable").dataTable({
          initComplete: function() {
              var api = this.api();
              $('#mytable_filter input')
                  .off('.DT')
                  .on('input.DT', function() {
                      api.search(this.value).draw();
              });
          },
              oLanguage: {
              sProcessing: "loading..."
          },
              processing: true,
              serverSide: true,
              ajax: {"url": "<?php echo base_url().'index.php/crud/get_produk_json'?>", "type": "POST"},
                        columns: [
                        {"data": "barang_kode"},
                        {"data": "barang_nama"},
                        //render harga dengan format angka
                        {"data": "barang_harga", render: $.fn.dataTable.render.number(',', '.', '')},
                        {"data": "kategori_nama"},
                        {"data": "view"}
                  ],
                        order: [[1, 'asc']],
          rowCallback: function(row, data, iDisplayIndex) {
              var info = this.fnPagingInfo();
              var page = info.iPage;
              var length = info.iLength;
              $('td:eq(0)', row).html();
          }
 
      });
                        // end setup datatables
                        // get Edit Records
                        $('#mytable').on('click','.edit_record',function(){
            var kode=$(this).data('kode');
            var nama=$(this).data('nama');
            var harga=$(this).data('harga');
            var kategori=$(this).data('kategori');
            $('#ModalUpdate').modal('show');
            $('[name="kode_barang"]').val(kode);
                $('[name="nama_barang"]').val(nama);
                $('[name="harga"]').val(harga);
                $('[name="kategori"]').val(kategori);
      });
        // End Edit Records
        // get Hapus Records
        $('#mytable').on('click','.hapus_record',function(){
            var kode=$(this).data('kode');
            $('#ModalHapus').modal('show');
            $('[name="kode_barang"]').val(kode);
      });
        // End Hapus Records
 
        });
</script>