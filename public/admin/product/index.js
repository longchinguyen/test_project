const GET_METHOD = 'GET';
const POST_METHOD = 'POST';
const PUT_METHOD = 'PUT';
const DELETE_METHOD = 'DELETE';


function callProductApi(method, data, url) {
    return $.ajax({
        method: method,
        data: data,
        url: url,
        processData: false,
        contentType: false,
    });
}

function list(url, data = null) {
    callProductApi(GET_METHOD, data, url)
        .then((res) => {
            $('#table_product').replaceWith(res);
        })
}

function getList() {
    let url = $('#form-search_product').data('action');
    let data = $('#form-search_product').serialize();
    list(url, data);
}
function showImage(src,target) {
    var fr=new FileReader();
    fr.onload = function(e) { target.src = this.result; };
    src.addEventListener("change",function() {
        fr.readAsDataURL(src.files[0]);
    });
}

var src = document.getElementById("src");
var target = document.getElementById("target");
showImage(src,target);
$(document).ready(function () {
    getList();
    let url_update;
    let url_delete;

    $(document).on('click', '#btn_create', function () {
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
            .then((res) => {
                let{product} = res ;
                $('.name').val(res.product.name);
                $('.price').val(res.product.price);
                $('.quantity').val(res.product.quantity);
                $('.description').val(res.product.description);
                $('.imageThum').attr('src', 'images/' + res.product.image);
                $('#modal-update').modal('show');
            })
            .catch((error) => {
                console.log(error);
            })
    });

    $(document).on('click', '#btn_create_product', function () {
        let formData = $('#form_create_product');
        let data = new FormData(formData[0]);
        let url_insert = $(this).data('action');
        callProductApi(POST_METHOD, data, url_insert)
            .then((res) => {
                $('#modal-update').modal('hide');
                getList();
            })
            .catch((error) => {
                $('#name_error').html(error.responseJSON.errors.name);
                $('#name_error').css('display', 'block');
            })
    });

    $(document).on('click', '#btn_update_product', function () {
        let formData = $('#form_update_product');
        let data = new FormData(formData[0]);
        callProductApi(POST_METHOD, data, url_update)
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

    $(document).on('keyup', '#btn_search_product', function () {
        getList()
    })

    $(document).on('click', '.page-item a', function (event) {
        event.preventDefault();
        let url = $(this).attr('href')
        list(url)
    })

});

