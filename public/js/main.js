function showCart(cart) {
    $('#cart-modal .modal-body').html(cart);
    $('#cart-modal').modal('show');

    let cartQty = $('#modal-cart-qty').text() ? $('#modal-cart-qty').text() : 0;
    $('.mini-cart-qty').text(cartQty);
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

    $(document).on('click', '.del-item', function(e) {
        e.preventDefault();
        let action = $(this).data('action');

        $.ajax({
            url: action,
            type: 'get',
            success: function (result) {
                showCart(result);
            },
            error: function () {
                alert('Ошибка при удалении товара!');
            }
        });
    });

    $(document).on('click', '.clear-cart', function(e) {
        e.preventDefault();
        let action = $(this).data('action');

        if (confirm('Вы уверены, что хотите очистить корзину?')) {
            $.ajax({
                url: action,
                type: 'get',
                success: function (result) {
                    showCart(result);
                },
                error: function () {
                    alert('Ошибка при очистке корзины!');
                }
            });
        }
    });
});
document.addEventListener('mousemove', function(e) {
    if (Math.random() > 0.5) return; 

    const flower = document.createElement('div');
    flower.className = 'flower-trail';
    
    const flowers = ['🌸', '🌼', '💮', '🌺', '🌷'];
    flower.innerHTML = flowers[Math.floor(Math.random() * flowers.length)];
    
    flower.style.left = (e.clientX - 5) + 'px';
    flower.style.top = (e.clientY - 5) + 'px';
    
    document.body.appendChild(flower);
    
    setTimeout(() => {
        flower.remove();
    }, 5500); 
});

