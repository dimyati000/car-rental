function printFormSewa(idSewa) {
  var link = base_url + "/DaftarSewa/cetak_sewa_barang?idSewa=" + idSewa;
  window.open(link, '_blank', 'width=1024, height=768')
}

function printReport() {
  var jenisMobil = $('#idMobil').val();
  var tgl_awal = $('#tgl_awal').val();
  var tgl_akhir = $('#tgl_akhir').val();
  var link = base_url + "/Laporan/cetak_laporan_barang?jenisMobil=" + jenisMobil + "&tanggal_awal=" + tgl_awal + "&tanggal_akhir=" + tgl_akhir;
  window.open(link, '_blank', 'width=1024, height=768')
}

function showLaporan() {
  var jenisMobil = $('#idMobil').val();
  var tgl_awal = $('#tgl_awal').val();
  var tgl_akhir = $('#tgl_akhir').val();
  var link = base_url + "/DaftarSewa/barang?tanggal_awal=" + tgl_awal + "&tanggal_akhir=" + tgl_akhir + "&jenisMobil=" + jenisMobil;
  location.replace(link);
  pageLoad(1);
}

$(document).ready(function () {
    pageLoad(1);
  });
  
  $('#search').on('keypress', function (e) {
    if (e.which == 13) {
      pageLoad(1);
    }
  });
  
  function pageLoad(page = 1) {
    var url = window.location.href
    var url = new URL(url);
    var jenis_Mobil = url.searchParams.get("jenisMobil") || "";
    console.log("jenis mobil", jenis_Mobil);
    var tglAwal = url.searchParams.get("tanggal_awal") || "";
    var tglAkhir = url.searchParams.get("tanggal_akhir") || "";
    var search = $('#search').val();
    var limit = $('#limit').val();
    var id_th = $('#hidden_id_th').val();
    var column_name = $('#hidden_column_name').val();
    var sort_type = $('#hidden_sort_type').val();
    $.ajax({
      url: base_url + "/DaftarSewa/fetch_dataBarang",
      type: 'GET',
      dataType: 'html',
      data: {
        page: page,
        sortby: column_name,
        sorttype: sort_type,
        limit: limit,
        search: search,
        jenisMobil: jenis_Mobil,
        tanggal_awal: tglAwal,
        tanggal_akhir: tglAkhir
      },
      beforeSend: function () { },
      success: function (result) {
        $('#list').html(result);
        $('#hidden_page').val(page);
      }
    });
  }
  function sort_table(id, column) {
    var sort = $(id).attr("data-sort");
    $('#hidden_id_th').val(id);
    $('#hidden_column_name').val(column);
  
    if (sort == "asc") {
      sort = 'desc';
    } else if (sort == "desc") {
      sort = 'asc';
    } else {
      sort = 'asc';
    }
    $('#hidden_sort_type').val(sort);
    $('#hidden_page').val(1);
    pageLoad(1);
  }