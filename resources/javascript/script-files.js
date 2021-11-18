

$objects = is_readable($path) ? scandir($path) : array();
$folders = array();
$files = array();

$(document).ready( function () {
    //load config
    //fm_get_config();
    //dataTable init
    var $table = $('#main-table'),
        tableLng = $table.find('th').length,
        _targets = (tableLng && tableLng == 7 ) ? [0, 4,5,6] : tableLng == 5 ? [0,4] : [3],
        mainTable = $('#main-table').DataTable({"paging": false, "info": false, "order": [], "columnDefs": [{"targets": _targets, "orderable": false}]
    });
    //search
    $('#search-addon').on( 'keyup', function () {
        mainTable.search( this.value ).draw();
    });
    $("input#advanced-search").on('keyup', function (e) {
        if (e.keyCode === 13) { fm_search(); }
    });
    $('#search-addon3').on( 'click', function () { fm_search(); });
    //upload nav tabs
    $(".fm-upload-wrapper .card-header-tabs").on("click", 'a', function(e){
        e.preventDefault();let target=$(this).data('target');
        $(".fm-upload-wrapper .card-header-tabs a").removeClass('active');$(this).addClass('active');
        $(".fm-upload-wrapper .card-tabs-container").addClass('hidden');$(target).removeClass('hidden');
    });
});

