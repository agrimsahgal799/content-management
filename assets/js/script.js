var baseURL = window.location.href;

$(document).ready(function () {
    
    $('.flash-message').delay(5000).fadeOut();

    $('#contacts-table').DataTable({
        "aaSorting": [],
        "columnDefs": [
            { "targets": [5], "orderable": false }
        ],
        responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.childRowImmediate,
                type: 'none',
                target: ''
            }
        }
    });
});

function deleteContact(id){
    $('#delete-contact-modal').modal('show');
    $('#delete-contact').attr('data-id', id);
}

$('#delete-contact-modal').on('hide.bs.modal', function(){
    $('#delete-contact').attr('data-id', '');
});

$('#delete-contact').on('click', function(){
    $('.flash-message').addClass('d-none');
    var id = $(this).attr('data-id');
    var csrf_name = $('.secure_csrf').attr('name');
    var csrf_value = $('.secure_csrf').val();
    $.ajax({
        'url' : baseURL + 'contact/delete',
        'data' : {'id': id, [csrf_name] : csrf_value},
        'type' : 'POST',
        'dataType' : 'json',
        success : function(res){
            $('#delete-contact-modal').modal('hide');
            if(res.error == 'false'){
                window.location.reload();
            }
            else{
                $('.ajax-msg-error').removeClass('d-none');
                $('.ajax-msg-error').html(res.msg);
            }
        },
        error : function(){
            $('#delete-contact-modal').modal('hide');
        } 
    });
});