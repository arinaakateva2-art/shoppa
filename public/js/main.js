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

function clearCart(action) {
    if (confirm('Вы уверены, что хотите очистить корзину?')) {
        $.ajax({
            url: action,
            type: 'get',
            success: function (result) {
                let now_location = document.location.pathname;
                if (now_location == '/cart/checkout') {
                    location = '/cart/checkout';
                } else {
                    showCart(result);
                }
            },
            error: function () {
                alert('Ошибка при очистке корзины!');
            }
        });
    }
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
                let now_location = document.location.pathname;
                if (now_location == '/cart/checkout') {
                    location = '/cart/checkout';
                } else {
                    showCart(result);
                }
            },
            error: function () {
                alert('Ошибка при удалении товара!');
            }
        });
    });

    $(document).on('click', '.clear-cart', function(e) {
        e.preventDefault();
        let action = $(this).data('action');
        clearCart(action);
    });
});

document.addEventListener('mousemove', function(e) {
    if (Math.random() > 0.5) return; 

    const flower = document.createElement('div');
    flower.className = 'flower-trail';
    
    const flowers = ['🌷', '🌼', '🍃', '🌺', '🌸'];
    flower.innerHTML = flowers[Math.floor(Math.random() * flowers.length)];
    
    flower.style.left = (e.clientX - 5) + 'px';
    flower.style.top = (e.clientY - 5) + 'px';
    
    document.body.appendChild(flower);
    
    setTimeout(() => {
        flower.remove();
    }, 5500); 
});

document.addEventListener('DOMContentLoaded', function() {
    const container = document.getElementById('droplets-container');
    if (!container) return;

    function createDroplet() {
        const droplet = document.createElement('div');
        droplet.className = 'droplet';
        
        droplet.style.left = Math.random() * 100 + 'vw';
        
        const size = Math.random() * 10 + 8; 
        droplet.style.width = size + 'px';
        droplet.style.height = size + 'px';
        
        const duration = Math.random() * 6 + 6;
        droplet.style.animationDuration = duration + 's';
        
        droplet.style.animationDelay = Math.random() * 2 + 's';

        container.appendChild(droplet);

        setTimeout(() => {
            droplet.remove();
        }, (duration + 2) * 1000);
    }

    setInterval(createDroplet, 800);
    
    for (let i = 0; i < 5; i++) {
        setTimeout(createDroplet, i * 200);
    }
});