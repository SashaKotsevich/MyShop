import jQuery from "jquery";
window.$ = window.jQuery = jQuery;
var elems = $('.product');
$('.product').on('click',(elem)=>{
    window.location.href="/user/product/"+elem.delegateTarget.id;
})
