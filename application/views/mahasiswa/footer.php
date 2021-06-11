</div>
</div>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="<?php echo base_url("assets/js/bootstrap.min.js") ?>"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap.min.js" ></script>
<script>
  $(document).ready(function() {
    $('#thetable').DataTable();
  } );
</script>

<script src="<?php echo base_url("assets/ckeditor/ckeditor.js") ?>"></script>
<script>
  CKEDITOR.replace("theeditor");
</script>

<script src="<?php echo base_url("assets/js/sendiri.js") ?>"></script>

<script>
  $(document).ready(function() {

    // ambil element yang id=id_pengajuan
    $("#id_pengajuan").on('change', function() {

      // ambil option yang terpilih
      var id_pengajuan = $("option:selected", this).val();
      var semester = $("option:selected", this).attr('semester');
      var tahun = $("option:selected", this).attr('tahunajaran');
      var lembaga = $("option:selected", this).attr('lembaga');
      var pimpinan = $("option:selected", this).attr('pimpinan');
      var telepon = $("option:selected", this).attr('telepon');
      var fax = $("option:selected", this).attr('fax');
      var alamat = $("option:selected", this).attr('alamat');

      // console.log(tahun)

      // masukan isi variabel di atas ke masing2 inputan
      $("#semester_pengajuan").val(semester)
      $("#nama_tahun_ajaran").val(tahun)
      console.log(tahun)
      $("#lembaga_instansi").val(lembaga)
      $("#pimpinan_lembaga_instansi").val(pimpinan)
      $("#telepon_instansi").val(telepon)
      $("#fax_instansi").val(fax)
      $("#alamat_lembaga_instansi").val(alamat)

    })

  })
</script>



</body>
</html>