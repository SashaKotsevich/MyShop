import jQuery from "jquery";

window.$ = window.jQuery = jQuery;


$('.product').on('click', (elem) => {
    window.location.href = "/product/" + elem.delegateTarget.id;
})

$('#price-min-range').on('input', function () {
    var max = $('#price-max-range');
    if (this.value >= max.val()) {
        max.val(this.value);
        $('#price-max-range-result').text(this.value);

    }
    $('#price-min-range-result').text(this.value);
})

$('#price-max-range').on('input ', function () {
    var min = $('#price-min-range');
    if (this.value <= min.val()) {
        min.val(this.value);
        $('#price-min-range-result').text(this.value);
    }
    $('#price-max-range-result').text(this.value);
})



