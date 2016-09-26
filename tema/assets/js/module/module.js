 (function($) {
$('#nama_module').keyup(function(){
    this.value = this.value.toLowerCase();
    $(this).val($(this).val().split(' ').join('_'));
    $("#link_module").val('module/'+ $(this).val().split(' ').join('_') + '.php');

});
})(jQuery);