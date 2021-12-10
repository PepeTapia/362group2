$objects = is_readable($path) ? scandir($path) : array();
$(document).ready( function () {
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

var kebab = document.querySelector('.kebab');
var middle = document.querySelector('.middle');
var cross = document.querySelector('.cross');
var flowdown = document.querySelector('.flowdown');

var middle_s = document.querySelector('.middlestyle');
var cross_s = document.querySelector('.crossstlye');
var flowdown_s = document.querySelector('.flowdownstlye');

function clickEnabler(num){
    var middle = document.querySelector('.middle' + num);
    var cross = document.querySelector('.cross'+ num);
    var flowdown = document.querySelector('.flowdown' + num);

    middle.classList.toggle('active');
    cross.classList.toggle('active');
    flowdown.classList.toggle('active');

    var middle_s = document.querySelector('.middlestlye');
    var cross_s = document.querySelector('.crossstlye');
    var flowdown_s = document.querySelector('.flowdownstlye');

    if(middle_s != null){
        middle_s.classList.toggle('active');
    } 
    if(cross_s != null){
        cross_s.classList.toggle('active');
    } 
    if(flowdown_s != null){
        flowdown_s.classList.toggle('active');
    }
}

function myAjax(name_param, action_param) {
    console.log("here");
    var new_name = "0";

    if(action_param == "rename"){
        new_name = rename_input(name_param);
    }

    var postData = {
        "name_param" : name_param,
        "action_param" : action_param,
        "new_name" : new_name,
    };
    console.log(name_param+action_param);
    $.ajax({
         type: 'POST',
         url: '/session.php',
         data: postData,
         success:function(data) {
            console.log(name_param+action_param+'2');
           alert(data);
         },
         // Alert status code and error if fail
        error: function (xhr, ajaxOptions, thrownError){
        alert("howdfy");
        //alert(xhr.status);
        //alert(thrownError);
    }

    });
}

function rename_input(name_param){
    var inputname = prompt("Please enter your new name to replace " + name_param , "");
    alert(inputname);
    return inputname;
}
    