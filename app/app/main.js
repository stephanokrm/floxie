$(document).ready(init);
var ROUTE = 'http://localhost/Floxie/server/produtos';

function init() {
    $.getJSON(ROUTE, function (products) {
        $.each(products, function (key, product) {
            var card = buildProductCard(product);
            var list = document.getElementById('products');
            list.appendChild(card);
        });
    });

    function buildProductCard(product) {
        var col = document.createElement('div');
        col.setAttribute('class', 'col s12 m6 l4');
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
        moreLink.innerHTML = 'Ver mais';
        col.appendChild(card);
        card.appendChild(cardImage);
        card.appendChild(cardStacked);
        cardImage.appendChild(movieImage);
        cardStacked.appendChild(cardContent);
        cardStacked.appendChild(cardAction);
        cardContent.appendChild(cardTitle);
        cardContent.appendChild(description);
        cardAction.appendChild(moreLink);
        return col;
    }
}