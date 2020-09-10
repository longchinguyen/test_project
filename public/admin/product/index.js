const GET_METHOD = 'GET';
const POST_METHOD = 'POST';
const PUT_METHOD = 'PUT';
const DELETE_METHOD = 'DELETE';

function callProductApi(method, data, url) {
    return $.ajax({
        method: method,
        data: data,
        url: url
    });
}

function getList() {
    let url = $('#table_product').data('url');
    callProductApi(GET_METHOD, null, url)
        .then((rs) => {
            $('#table_product').replaceWith(rs);
        })
        .catch((error) => {
            console.log(error);
        })
}

$(document).ready(function () {
    getList();
    let url_update;
    let url_delete;
    $(document).on('click', '#btn_create', function (){
        $('#create_name').val('');
        $('#create_price').val('');
        $('#create_quantity').val('');
        $('#create_description').val('');
        $('#open_modal_create').modal('show');
    });
    $(document).on('click', '#btn_open_modal_update', function () {
        let url = $(this).data('action');
        url_update = $(this).data('url');
        callProductApi(GET_METHOD, {}, url)
            .then((rs) => {
                console.log(rs.data);
                $('#name').val(rs.data.name);
                $('#price').val(rs.data.price);
                $('#quantity').val(rs.data.quantity);
                $('#description').val(rs.data.description);

                $('#modal-update').modal('show');
            })
            .catch((error) => {
                console.log(error);
            })
    });
    $(document).on('click', '#btn_create_product', function () {
        let data = $('#form_create_product').serialize();
        let url_insert = $(this).data('action');
        callProductApi(POST_METHOD, data, url_insert)
            .then(() => {
                getList();
                $('#exampleModal').modal('hide');
            })
            .catch((error) => {
                $('#name_error').html(error.responseJSON.errors.name);
                $('#name_error').css('display','block');
            })
    });
    $(document).on('click', '#btn_update_product', function () {
        let data = $('#form_update_product').serialize();
        callProductApi(PUT_METHOD, data, url_update)
            .then((rs) => {
                getList();
                $('#modal-update').modal('hide');
            })
            .catch((error) => {
                console.log(error);
            })
    });
    $(document).on('click', '#btn_delete', function () {
        url_delete = $(this).data('action');
        callProductApi(GET_METHOD, {}, url_delete)
            .then((rs) => {
                getList();
            })
            .catch((error) => {
                console.log(error);
            })
    });
});

