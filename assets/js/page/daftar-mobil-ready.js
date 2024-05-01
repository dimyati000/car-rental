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
    var search = $('#search').val();
    var limit = $('#limit').val();
    var id_th = $('#hidden_id_th').val();
    var column_name = $('#hidden_column_name').val();
    var sort_type = $('#hidden_sort_type').val();
    $.ajax({
      url: base_url + "/Dashboard/fetch_data",
      type: 'GET',
      dataType: 'html',
      data: {
        page: page,
        sortby: column_name,
        sorttype: sort_type,
        limit: limit,
        search: search,
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