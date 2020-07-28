$(document).ready(function(){

  $('.add-product-btn').on('click' , function (e) {

      e.preventDefault();
      var name = $(this).data('name');
      var id = $(this).data('id');
      var price = $(this).data('price');

     // $(this).removeClass('btn-success').addClass('btn-default disabled');


      var html = `
      <tr>
         <td>${name}</td>
         <td><input type="number" name="quantaties[]"  class="form-control product-count" value="1" min="1"></td>
         <td class="product-price">${price}</td>
         <td><button class="btn btn-danger btn-sm remove-product-btn"><span class="fa fa-trash"></span></button></td>
      </tr>
      `;
      $('.order-list').append(html);
      calc_total_price();

  });

  $('body').on('click' , '.remove-product-btn' , function (e) {

      e.preventDefault();

     // $('.add-product-btn').removeClass('btn-default disabled').addClass('btn-success');


      var id = $(this).data('id');
      $(this).closest('tr').remove();
      calc_total_price();
  });


  $('body').on('change' , '.product-count' , function () {

      var productPrice = parseInt($(this).closest('tr').find('.product-price').html());
      var quantaty = parseInt($(this).val());

      var totalPrice = productPrice * quantaty ;

      $('.total-price').html(totalPrice);


     });

});

function calc_total_price (){

    var price = 0 ;

    $('.order-list .product-price').each(function (index) {

        price += parseInt($(this).html());


    });

    $('.total-price').html(price);

}
