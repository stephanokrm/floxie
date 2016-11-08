$(document).ready(init);
var ROUTE = 'http://localhost/Floxie/server/';

function init() {
    var productList = [];
    var list = document.getElementById('products');

    $('.top').click(topClick);
    $('.cheap').click(cheapClick);
    $('.all').click(allClick);
    $('.submit-button').click(submitForm);

    $('.modal').modal({
        dismissible: true, // Modal can be dismissed by clicking outside of the modal
        opacity: .5, // Opacity of modal background
        in_duration: 300, // Transition in duration
        out_duration: 200, // Transition out duration
        starting_top: '4%', // Starting top style attribute
        ending_top: '10%', // Ending top style attribute
        ready: function (modal, trigger) { // Callback for Modal open. Modal and trigger parameters available.
            console.log(modal, trigger);
        },
        complete: function () {

        } // Callback for Modal close
    });

    $.getJSON(ROUTE + 'produtos', function (products) {
        productList = products;
        renderCards(productList);
    });

    function moreClick(e) {
        var id = $(this).data('id');
        $.getJSON(ROUTE + 'produto/' + id, function (product) {
            buildProductModal(product);
        });
    }

    function allClick() {
        productList.sort(function (a, b) {
            return a.name > b.name;
        });

        renderCards(productList);
    }

    function topClick() {
        productList.sort(function (a, b) {
            return a.rate < b.rate;
        });

        renderCards(productList);
    }

    function cheapClick() {
        productList.sort(function (a, b) {
            return a.price > b.price;
        });

        renderCards(productList);
    }

    function renderCards(listToRender) {
        list.innerHTML = '';
        $.each(listToRender, function (key, product) {
            var card = buildProductCard(product);
            list.appendChild(card);
        });
    }

    function buildProductCard(product) {
        var price = document.createElement('div');

        var col = document.createElement('div');
        col.setAttribute('class', 'col s12 m6 l6');
        var card = document.createElement('div');
        card.setAttribute('class', 'card horizontal hoverable')
        var cardImage = document.createElement('div');
        cardImage.setAttribute('class', 'card-image');
        var movieImage = document.createElement('img');
        movieImage.setAttribute('class', 'movie-image');
        movieImage.setAttribute('src', product.image);
        var cardStacked = document.createElement('div');
        cardStacked.setAttribute('class', 'card-stacked');
        var cardContent = document.createElement('div');
        cardContent.setAttribute('class', 'card-content');
        var cardTitle = document.createElement('div');
        cardTitle.setAttribute('class', 'card-title purple-text');
        cardTitle.innerHTML = product.name;
        var description = document.createElement('p');
        description.innerHTML = product.description;
        var cardAction = document.createElement('div');
        cardAction.setAttribute('class', 'card-action');
        var moreLink = document.createElement('a');
        moreLink.setAttribute('href', '#');
        moreLink.setAttribute('class', 'right purple-text');
        moreLink.setAttribute('data-id', product.id);
        moreLink.addEventListener('click', moreClick);
        moreLink.innerHTML = 'Ver mais';
        col.appendChild(card);
        card.appendChild(cardImage);
        card.appendChild(cardStacked);
        cardImage.appendChild(movieImage);
        cardStacked.appendChild(cardContent);
        cardStacked.appendChild(cardAction);
        cardContent.appendChild(cardTitle);
        cardContent.appendChild(description);
        for (var x = 0; x < 5; x++) {
            var icon = document.createElement('i');

            if (product.rate >= (x + 1)) {
                icon.setAttribute('class', 'material-icons yellow-text');
            } else {
                icon.setAttribute('class', 'material-icons');
            }
            icon.innerHTML = 'star';
            icon.setAttribute('id', x);
            cardContent.appendChild(icon);
        }
        price.innerHTML = 'R$' + product.price;
        cardContent.appendChild(price);
        cardAction.appendChild(moreLink);
        return col;
    }

    function buildProductModal(product) {
        $('#movie_title').text(product.name);
        $('#movie_description').text(product.description);
        $('#modal').modal('open');
        $('#img-movie').attr('src', product.image);
        $('#comments').html('');
        $('#textarea1').val('');
        $('#movie_id').val(product.id);
    }

    function submitForm() {
        var data = $('.comment-form').serialize();
        $.post(ROUTE + 'comentario', data, function () {
            
        });
        $('#comments').append($('#textarea1').val());
    }
}