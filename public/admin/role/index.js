const GET_METHOD = 'GET';
const POST_METHOD = 'POST';
const PUT_METHOD = 'PUT';
const DELETE_METHOD = 'DELETE';

function callRoleApi(url, data, method = GET_METHOD) {
    return $.ajax({
        method: method,
        data: data,
        url: url
    });
}

// }
function list(url, data = null) {
    callRoleApi(url, data)
        .then((res) => {
            $('#table_list_role').replaceWith(res);
        })
        .catch((error) => {
        })
}

function getList() {
    let url = $('#form-seach').data('action')
    let data = $('#form-seach').serialize()
    list(url, data);
}


$(document).ready(function () {
    getList();
    let url_update;
    let url_Delete;
    $(document).on('click', '#btn_create_role', function () {
        $('#create_name_role').val();
        $('#create_role').val();
        $('#open_create_role').modal('show');
    })

    $(document).on('click', '#btn_create_role', function (e) {
        e.preventDefault();
        let url_insert = $(this).data('action');
        let data = $('#form_create_role').serialize();
        callRoleApi(url_insert, data, POST_METHOD)
            .then((res) => {
                getList();
                $('#open_create_role').modal('hide');
            })
    })

    $(document).on('click', '#edit_role', function () {
        let url = $(this).data('action');
        url_update = $(this).data('url');
        callRoleApi(url)
            .then((res) => {
                let {permissions, role} = res;
                $('.check-role').val(permissions)
                $('.name_role').val(res.role.name)
                $('.display_name_role').val(res.role.display_name)
                // $('.check-role').val(res.role)
                $('#open_update_role').modal('show')
            })
    })

    $(document).on('keyup', '#btn_search_role', function () {
        getList()
    })
    $(document).on('click', '.page-item a', function (event) {
        event.preventDefault();
        let url = $(this).attr('href')
        list(url)

    })
    $(document).on('click', '#btn_update_role', function () {
        let data = $('#form_role').serialize()
        callRoleApi(url_update, data, PUT_METHOD)
            .then((res) => {
                getList();
                $('#open_update_role').modal('hide')
            })
    })
    $(document).on('click', '#btn_delete_role', function () {
        url_Delete = $(this).data('action')
        callRoleApi(url_Delete)
            .then(() => {
                getList()
            })
            .catch((error) => {
                console.log(error)
            })
    })
    $('#checkAll').click(function () {
        $('input:checkbox').prop('checked', this.checked);
    });
    $('#checkAllEdit').click(function () {
        $('input:checkbox').prop('checked', this.checked);
    });
    // $(document).on('keyup','#btn_search_role',function (){
    //     console.log(1)
    // let url = $(this).data('action');

    // let name = $(this).val();
    // callRoleApi(GET_METHOD,{},url+'?name='+name)
    //     .then((res) =>{
    //         $('#table_list_role').replaceWith(res);
    //     })
    //
    // })
})
