$(document).ready(init);
var ROUTE = 'http://localhost:8080/server/server.php?controller=';

function init() {
    $.get(ROUTE + 'ProductController&action=index', function (products) {
        console.log(products);
    });
}