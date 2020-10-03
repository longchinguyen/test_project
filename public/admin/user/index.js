const GET_METHOD = 'GET';
const POST_METHOD = 'POST';
const PUT_METHOD = 'PUT';
const DELETE_METHOD = 'DELETE';

function callUserApi(method, data, url) {
    return $.ajax({
        method: method,
        data: data,
        url: url
    });
}

function list(url, data = null) {
    callUserApi(GET_METHOD, data, url)
        .then((res) => {
            $('#table_list_user').replaceWith(res);
        })
        .catch(() => {

        })
}

function getList() {
    let formSearch =  $('#form-search_user');
    let url =formSearch.data('action');
    let data = formSearch.serialize();
    list(url, data);
}

$(document).ready(function () {
        getList();
    let url_update;
    let url_delete;
    $(document).on('click', '#btn_create_user', function () {
        let url_insert = $(this).data('action');
        let data = $('#form_create_user').serialize();
        // console.log(data);
        // return false;
        callUserApi(POST_METHOD, data, url_insert)
            .then(() => {
                getList();
                $('#open_create_user').modal('hide');

            })
            .catch((rs) => {
                $('#error_name').html(rs.responseJSON.errors.name);
                $('#error_name').css('display', 'block');
            })

    })
    $(document).on('click', '#btn_create', function () {
        $('#create_name_user').val('');
        $('#create_email_user').val('');
        $('#create_select').serialize();
        $('#open_create_user').modal('show');
    })
    $(document).on('click', '#btn_open_modal_update', function () {
        let url = $(this).data('action')
        url_update = $(this).data('url');
        callUserApi(GET_METHOD, {}, url)
            .then((res) => {
                let {roles, user} = res;
                console.log(roles)
                $('.selected').val(roles)
                $('.name_select').val(res.user.name)
                $('.email_select').val(res.user.email)
                $('.password_select').val(res.user.password)
                // $('.check-role').val(res.role)
                $('#open_update_user').modal('show')
            })
            .catch((error) => {
                console.log(error);
            })
    })
    $(document).on('click', '#btn_update_user_new', function () {
        let data = $('#form_update_user').serialize();
        callUserApi(PUT_METHOD, data, url_update)
            .then((rs) => {
                getList();
                $('#open_update_user').modal('hide');
            })
    })

    $(document).on('keyup', '#btn_search_user', function () {
            getList()
    })

    $(document).on('click', '#btn_delete_user', function () {
        url_delete = $(this).data('action');
        callUserApi(GET_METHOD, {}, url_delete)
            .then(() => {
                getList();
            })
            .catch((error) => {
                console.log(error);
            })
    })

    $(document).on('click', '.page-item a', function (event) {
        event.preventDefault();
        let url = $(this).attr('href')
        list(url)
    });
})
