$(document).ready(function () {
  $('.selek2').select2();
  $('.timepicker').wickedpicker(options);
  Datatables();
  setInterval(timestamp, 1000);
  time24hour();
});

$(document).ready( function () {
  $('#myTable').DataTable();
} );

// $(document).ready(function() {
//   $('.js-example-basic-single').select2();
// });

$(function Datatables() {
  $("#example1").DataTable({
    "responsive": true, "lengthChange": false, "autoWidth": false,
    "buttons": ["pdf", "print", "colvis"]
  }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');


  $("#example2").DataTable({
    "paging": true,
    "lengthChange": false,
    "searching": true,
    "ordering": true,
    "info": true,
    "autoWidth": false,
    "responsive": true,
  });

  $("#example3").DataTable({
    "paging": true,
    "lengthChange": false,
    "searching": true,
    "ordering": true,
    "info": true,
    "autoWidth": false,
    "responsive": true,
  });

  $("#lowongan").DataTable({
    // columns: [
    //   { width: "5%" },
    //   { width: "10%" },
    //   { width: "15%" },
    //   { width: "10%" },
    //   { width: "10%" },
    //   { width: "10%" },
    //   { width: "10%" },
    //   { width: "10%" },
    //   { width: "10%" },
    //   { width: "10%" },
    // ],
    "paging": true,
    "lengthChange": false,
    "searching": true,
    "ordering": true,
    "info": true,
    "autoWidth": false,
    "responsive": true,
  });

});

// $(document).ready(function() { 
//   $('#downloadAll').click(function() {
//       $('a.download_file > File').each(function() {
//         $(this).trigger( "click" );
//       });

//     return false; //cancel navigation
//   });
// });

function editableDataSiswa(param) {
  let data = $(param).data("id");
  let exp = data.split("~");
  console.log(exp[12]);
  console.log(data);
  // $("#editidSiswa").val(exp[0]);
  $("#editID").val(exp[0]); 
  $("#editNisnSiswa").val(exp[1]); 
  $("#editNamaSiswa").val(exp[2]);
  $("#editJekelSiswa").val(exp[3]);
  $("#editTmptLhrSiswa").val(exp[4]);
  $("#editTglLhrSiswa").val(exp[5]);
  $("#editJurusanSiswa").val(exp[6]);
  $("#editTahunSiswa").val(exp[7]);
  $("#editOrtuSiswa").val(exp[8]);
  $("#editalamatSiswa").val(exp[9]);
  $("#editnoTelpSiswa").val(exp[10]);
  $("#editidJurusanSiswa").val(exp[12]); 
  $("#editemailSiswa").val(exp[13]); 
}

function editableDataSiswas(param) {
  let data = $(param).data("id");
  let exp = data.split("~");
  console.log(exp[0]);
  console.log(data);
  // $("#editidSiswa").val(exp[0]);
  $("#editNisns").val(exp[0]); 
  $("#editNisn").val(exp[1]); 
  $("#editNama").val(exp[2]);
  $("#editJekel").val(exp[3]);
  $("#editTmptLhr").val(exp[4]);
  $("#editTglLhr").val(exp[5]);
  $("#editJurusan").val(exp[6]);
  $("#editTahun").val(exp[7]);
  $("#editOrtu").val(exp[8]);
  $("#editalamat").val(exp[9]);
  $("#editnoTelp").val(exp[10]);
  $("#editnmJurusan").val(exp[11]);
  $("#editalamatemail").val(exp[12]);
}


function detailLowongan(param) {
  let data = $(param).data("id");
  let exp = data.split("~");
  $("#editID").val(exp[0]);
  $("#editNmPer").val(exp[1]);
  $("#editNmLoker").val(exp[2]);
  $("#editJekel").val(exp[3]);
  $("#editKeterangan").val(exp[4]);
  $("#editSumber").val(exp[5]);
  $("#editTanggal").val(exp[6]);
  $("#editBatas").val(exp[7]);
  $("#editStatus").val(exp[8]);
}

function editableLowongan(param) {
  let data = $(param).data("id");
  let exp = data.split("~");
  console.log(data);
  $("#editID").val(exp[0]);
  $("#editNoLoker").val(exp[1]);
  $("#editNmPer").val(exp[2]);
  $("#editNmLoker").val(exp[3]);
  $("#editJekel").val(exp[4]);
  $("#editFile").val(exp[5]);
  $("#editKeterangan").val(exp[6]);
  $("#editSumber").val(exp[7]);
  $("#editTanggal").val(exp[8]);
  $("#editBatas").val(exp[9]);
  $("#editStatus").val(exp[10]);
  $("#editKual").val(exp[11]);
  $("#editPersy").val(exp[12]);
}

function editDetLoker(param) {
  let data = $(param).data("id");
  let exp = data.split("~");
  $("#editID").val(exp[0]);
  $("#editNoLok").val(exp[1]);
  $("#editNmPer").val(exp[2]);
  $("#editNmLoker").val(exp[3]);
  $("#editJekel").val(exp[4]);
  $("#editFile").val(exp[5]);
  $("#editKeterangan").val(exp[6]);
  $("#editSumber").val(exp[7]);
  $("#editTanggal").val(exp[8]);
  $("#editBatas").val(exp[9]);
  $("#editKualLoker").val(exp[10]);
  $("#editPersyLoker").val(exp[11]);
}

function editableJadwal(param) {
  let data = $(param).data("id");
  let exp = data.split("~");
  console.log(data);
  $("#editidjadwal").val(exp[0]);
  $("#editidLok").val(exp[1]);
  $("#editTempat").val(exp[2]);
  $("#edittgl").val(exp[3]);
  $("#editwaktu").val(exp[4]);
  $("#editketerangan").val(exp[5]);
}

function editableDownload(param) {
  let data = $(param).data("id");
  let exp = data.split("~");
  console.log(data);

    $('#lamaran').html(`<a href="${'./file_data/pendaftaran/lamaran/' + exp[0]}" target="_blank" class="btn btn-primary btn-sm" style="width: 100%"><i class="fa fa-download"></i>Download</a>`);
    $('#skck').html(`<a href="${'./file_data/pendaftaran/skck/' + exp[1]}" target="_blank" class="btn btn-primary btn-sm" style="width: 100%"><i class="fa fa-download"></i>Download</a>`);
    $('#cv').html(`<a href="${'./file_data/pendaftaran/cv/' + exp[2]}" target="_blank" class="btn btn-primary btn-sm" style="width: 100%"><i class="fa fa-download"></i>Download</a>`);
    $('#foto').html(`<a href="${'./file_data/pendaftaran/foto/' + exp[3]}" target="_blank" class="btn btn-primary btn-sm" style="width: 100%"><i class="fa fa-download"></i>Download</a>`);

  $("#editLamaran").val(exp[0]);
  $("#editSKCK").val(exp[1]);
  $("#editCV").val(exp[2]);
  $("#editFoto").val(exp[3]);
}

function editableHasil(param) {
  let data = $(param).data("id");
  let exp = data.split("~");
  console.log(data);
  $("#editidHasil").val(exp[0]);
  $("#editidLok").val(exp[1]);
  $("#editperusahaan").val(exp[2]);
  $("#editberkas").val(exp[3]);
  $("#editketerangan").val(exp[4]);
}

function editableJurusan(param) {
  let data = $(param).data("id");
  let exp = data.split("~");
  console.log(data);
  $("#editId").val(exp[0]);
  $("#editNm").val(exp[1]);
  $("#editKet").val(exp[2]);
}

function editablePerusahaan(param) {
  let data = $(param).data("id");
  let exp = data.split("~");
  console.log(data);
  $("#editId").val(exp[0]);
  $("#editNm").val(exp[1]);
  $("#editEmail").val(exp[2]);
  $("#editSts").val(exp[3]);
  $("#editTelp").val(exp[4]);
  $("#editTgl").val(exp[5]);
  $("#editLogo").val(exp[5]);
}

function editableGroup(param) {
  let data = $(param).data("id");
  let exp = data.split("~");
  console.log(data);
  $("#editId").val(exp[0]);
  $("#editNm").val(exp[1]);
  $("#editKet").val(exp[2]);
}

function editableUser(param) {
  let data = $(param).data("id");
  let exp = data.split("~");
  console.log(data);
  $("#editId").val(exp[0]);
  $("#editNm").val(exp[1]);
  $("#editUsername").val(exp[2]);
  $("#editPassword").val(exp[3]);
  $("#editLevel").val(exp[4]);
  $("#editStatus").val(exp[6]);
}

function daftarLoker(param) {
  let data = $(param).data("id");
  let exp = data.split("~");
  console.log(data);
  console.log(exp[0]);
  console.log('BBB');
  $("#valId").val(exp[0]);
  $("#valnoLok").val(exp[1]);
  $("#valperusahaan").val(exp[2]);
  $("#valnmLoker").val(exp[3]);
}

function getNisn() {
  let kd = $("#postNisn").val();
  let splits = kd[1];
  console.log(splits);
  die();
  console.log(document.getElementById("namaAgenda"));
  
  $('#namaAgenda').val(splits[1]);
}

function getUserName(){
function getUserName(id){
  console.log(id.value);

  die();
  $('#namaAlumni').val(id.value);
  }
}