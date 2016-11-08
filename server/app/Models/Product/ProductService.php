<?php

namespace Floxie\Models\Product;

class ProductService {

    public static function index() {
        $product = new Product();
        $product->id = 1;
        $product->name = 'Inferno';
        $product->description = 'Inferno é um filme americano do gênero de suspense dirigido por Ron Howard e escrito por David Koepp, baseado no romance de mesmo nome por Dan Brown.';
        $product->price = 50;
        $product->image = 'app/assets/img/inferno.jpg';
        $product->rate = 5;
        $products[] = $product;

        $product = new Product();
        $product->id = 2;
        $product->name = 'Doutor Estranho';
        $product->description = 'Doutor Estranho (Doctor Strange, no idioma original) é um filme americano de super-herói baseado no personagem homônimo da Marvel Comics, produzido pela Marvel Studios e distribuído pela Walt Disney Studios Motion Pictures. Será o décimo quarto filme do Universo Cinematográfico da Marvel.';
        $product->price = 60;
        $product->image = 'app/assets/img/doutor_estranho.png';
        $product->rate = 5;
        $products[] = $product;

        $product = new Product();
        $product->id = 3;
        $product->name = 'Ouija 2';
        $product->description = 'Ouija: Origin of Evil é um filme norte-americano de terror dirigido por Mike Flanagane e coescrito por Flanagan e Jeff Howard.';
        $product->price = 50;
        $product->image = 'app/assets/img/ouija_2.jpg';
        $product->rate = 4.5;
        $products[] = $product;

        $product = new Product();
        $product->id = 4;
        $product->name = 'Cegonhas';
        $product->description = 'Cegonhas é um filme de animação digital estado-unidense dos gêneros aventura e comédia dirigido por Nicholas Stoller e Doug Sweetland.';
        $product->price = 45;
        $product->image = 'app/assets/img/cegonhas.jpg';
        $product->rate = 4;
        $products[] = $product;

        $product = new Product();
        $product->id = 5;
        $product->name = 'Meu Amigo o Dragão';
        $product->description = 'Meu Amigo o Dragão é um filme de aventura e fantasia, dirigido por David Lowery e escrito por Toby Halbrooks e David Lowery, baseado no conto de S.S. Field e Seton I. Miller, sendo um remake do filme Meu Amigo o Dragão de 1977.';
        $product->price = 40;
        $product->image = 'app/assets/img/meu_amigo_o_dragao.jpg';
        $product->rate = 1;
        $products[] = $product;

        $product = new Product();
        $product->id = 6;
        $product->name = 'A Garota no Trem';
        $product->description = 'A Garota no Trem é um filme estado-unidense dos géneros drama romântico, mistério e suspense, realizado por Tate Taylor e escrito por Erin Cressida Wilson, com base no romance de estreia homónimo de Paula Hawkins.';
        $product->price = 40;
        $product->image = 'app/assets/img/a_garota_no_trem.jpg';
        $product->rate = 3;
        $products[] = $product;
        return $products;
    }

    public static function show($id) {
        foreach (self::index() as $product) {
            if ($product->id == $id) {
                return $product;
            }
        }
    }

    public static function addComment($dados) {
        $comments = \Session::get('comments');
        $comments[] = ['comment' => $dados->comment, 'movie_id' => $dados->movie_id];
        \Session::put('comments', $comments);
    }

    public static function getComments($id) {
        $comments = \Session::get('comments');
        return array_filter($comments, function($comment) use ($id) {
            if ($comment['movie_id'] == $id) {
                return $comment;
            }
        });
    }

}
