$(document).on('keyup', '#jumlah', function(){
    $('#total').val(parseFloat(parseFloat($(this).val()) * parseFloat($('#harga').val())));
})