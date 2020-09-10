const GET_METHOD='GET';
const POST_METHOD='POST';
const PUT_METHOD='PUT';
const DELETE_METHOD='DELETE';
function callUserApi(method,data,url){
    return $.ajax({
        method:method,
        data:data,
        url:url
    });
}
$(document).ready(function(){
    $(document).on('click','#btn_create_user',function (){
        let url_insert = $(this).data('action');
        let data = $('#form_create_user').serialize();
        // console.log(data);
        // return false;
        callUserApi(POST_METHOD,data,url_insert)
            .then(() =>{
                $('#open_create').modal('hide')
            })

    })
    $(document).on('click','#btn_create',function (){
        $('#create_name_user').val('');
        $('#create_email_user').val('');
        $('#open_create').modal('show');
    })
})
