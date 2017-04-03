$(document).ready(function() {
    $('#example').DataTable();
});

$(function(){
    $('#form-edit-profile').on('submit', function(e){
        e.preventDefault();
        $.ajax({
            url: url, //this is the submit URL
            type: 'GET', //or POST
            data: $('#form-edit-profile').serialize(),
            success: function(data){
                 alert('successfully submitted')
            }
        });
    });
});