const GET_METHOD = 'get';
const POST_METHOD = 'post';
const PUT_METHOD = 'put';
const DELETE_METHOD = 'delete';

function callCategoryApi(url, data, method = GET_METHOD) {
    return $.ajax({
        method: method,
        data: data,
        url: url
    });
}

function list(url, data = null) {
    callCategoryApi(url, data)
        .then((res) => {
            $('#table_list_category').replaceWith(res);
        })
        .catch((error) => {
        })
}

function getList() {
    let url = $('#form-search').data('action')
    let data = $('#form-search').serialize()
    list(url, data);
}

$(document).ready(function () {

    getList();
    let url_update;
    let url_Delete;
    $(document).on('click', '#btn_category', function () {
        $('#create_name_category').val();
        $('#open_create_category').modal('show');
    })

    $(document).on('click', '#btn_create_category', function (e) {
        e.preventDefault();
        let url_insert = $(this).data('action');
        let data = $('#form_create_category').serialize();
        callCategoryApi(url_insert, data, POST_METHOD)
            .then((res) => {
                getList();
                $('#open_create_category').modal('hide');
            })
    })
    $(document).on('click', '#edit_category', function () {
        let url = $(this).data('action');
        url_update = $(this).data('url');
        callCategoryApi(url)
            .then((res) => {
                $('.name_category').val(res.category.name)
                $('#open_update_category').modal('show')
            })
    })

    $(document).on('keyup', '#btn_search_category', function () {
        getList()
    })

    $(document).on('click', '.page-item a', function (event) {
        event.preventDefault();
        let url = $(this).attr('href')
        list(url)

    })

    $(document).on('click', '#btn_update_category', function () {
        let data = $('#form_category').serialize()
        callCategoryApi(url_update, data, PUT_METHOD)
            .then((res) => {
                getList();
                $('#open_update_category').modal('hide')
            })
    })

    $(document).on('click', '#btn_delete_category', function () {
        url_Delete = $(this).data('action')
        callCategoryApi(url_Delete)
            .then(() => {
                getList()
            })
            .catch((error) => {
                console.log(error)
            })
    })
})
