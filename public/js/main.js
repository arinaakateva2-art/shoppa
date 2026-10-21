function showCart(cart) {
    $('#cart-modal .modal-body').html(cart);
    $('#cart-modal').modal('show');
}

function getCart(action) {
    $.ajax({
        url: action,
        type: 'get',
        success: function (result) {
            showCart(result);
        },
        error: function () {
            alert('Ошибка при загрузке корзины!');
        }
    });
}

$(function() {
    $('.open-search').click(function(e) {
        e.preventDefault();
        $('#search').addClass('active');
    });
    $('.close-search').click(function() {
        $('#search').removeClass('active');
    });

    $(window).on("scroll", function() {
        if ($(window).scrollTop() > 200) {
            $("#top").fadeIn();
        } else {
            $("#top").fadeOut();
        }
    });
    $("#top").click(function(){
        $("html").animate({scrollTop:0}, 10)
    });

    $('.addtocart').on('submit', function(e) {
        e.preventDefault();
        let form = $(this);
        
        $.ajax({
            url: form.attr('action'),
            data: form.serialize(),
            type: 'post',
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            },
            success: function (result) {
                showCart(result);
            },
            error: function (msg) {
                alert('Ошибка при добавлении в корзину!');
                console.log(msg.responseJSON);
            }
        });
        return false;
    });

    $(document).on('click', '.get-cart', function(e) {
        e.preventDefault();
        getCart($(this).data('url'));
    });
});