<?php

namespace Database\Seeders;

use App\Models\Produto;
use Illuminate\Database\Seeder;

class ProdutoSeeder extends Seeder
{
    public function run(): void
    {
        $produtos = [
            [
                "nome" => "Tênis Esportivo Masculino AirRun",
                "descricao" => "Tênis leve e confortável para corridas e caminhadas.",
                "valor" => 299.90,
                "categoria" => "masculino",
                "foto" => "https://images.tcdn.com.br/img/img_prod/1120720/tenis_esportivo_masculino_adrun_flex_up_8626m_066_marinho_2319_1_8ab44a63b602a35f829c8e1e0fccb18e.jpg"
            ],
            [
                "nome" => "Sapato Social Masculino Classic",
                "descricao" => "Ideal para ocasiões formais, com acabamento refinado.",
                "valor" => 399.99,
                "categoria" => "masculino",
                "foto" => "https://d1zvfmhlebc91g.cloudfront.net/fit-in/1000x1000/filters:fill(ffffff)/filters:background_color(ffffff)/filters:quality(100)/n49shopv2_lojapadrao/images/products/647e425904fe4/sapato_social_masculino_padrao_56340_preto_5-647e42596872c.jpg"
            ],
            [
                "nome" => "Tênis Casual Masculino StreetWay",
                "descricao" => "Perfeito para o dia a dia, com estilo urbano.",
                "valor" => 229.50,
                "categoria" => "masculino",
                "foto" => "https://cdn.shoppub.io/cdn-cgi/image/w=1000,h=1000,q=80,f=auto/freeway/media/uploads/produtos/foto/xjjuugjc/1000x1000.jpg"
            ],
            [
                "nome" => "Tênis Feminino FitRun Rosa",
                "descricao" => "Modelo esportivo com design moderno e macio.",
                "valor" => 289.90,
                "categoria" => "feminino",
                "foto" => "https://static.netshoes.com.br/produtos/tenis-feminino-advanced-run-academia-fitness-flexivel-vl061/18/0D2-1204-018/0D2-1204-018_zoom1.jpg?ts=1695823688"
            ],
            [
                "nome" => "Sapatilha Feminina Comfort Line",
                "descricao" => "Sapatilha leve, ideal para o trabalho e uso casual.",
                "valor" => 139.00,
                "categoria" => "feminino",
                "foto" => "https://cdnv2.moovin.com.br/detalhecalcados/imagens/produtos/det/tenis-feminino-numeracao-especial-tecido-cinza-confortline-nj01.jpg"
            ],
            [
                "nome" => "Tênis Feminino Branco SoftWalk",
                "descricao" => "Conforto e elegância em um só modelo.",
                "valor" => 199.99,
                "categoria" => "feminino",
                "foto" => "https://m.media-amazon.com/images/I/31S68g6OehL._AC_SY300_.jpg"
            ],
            [
                "nome" => "Tênis Infantil Azul Dino",
                "descricao" => "Tênis com estampa de dinossauro, ideal para meninos.",
                "valor" => 99.90,
                "categoria" => "infantil",
                "foto" => "https://kallan.vteximg.com.br/arquivos/ids/454712-1140-1140/40110142_001_1-INF-PP--O--TNS-DINO-MP2334.jpg?v=638288264034100000"
            ],
            [
                "nome" => "Sandália Infantil Princesa Rosa",
                "descricao" => "Sandália delicada com estampa de princesa.",
                "valor" => 89.90,
                "categoria" => "infantil",
                "foto" => "https://cloviscalcados.vteximg.com.br/arquivos/ids/1190983/Sandalia-Infantil-Disney-Princess-Grendene-Kids-23128-3293128_008-05.jpg?v=638685737322000000"
            ],
            [
                "nome" => "Tênis Infantil Colorido PopKid",
                "descricao" => "Tênis divertido e resistente para crianças ativas.",
                "valor" => 109.50,
                "categoria" => "infantil",
                "foto" => "https://images.tcdn.com.br/img/img_prod/769612/tenis_infantil_calce_facil_22_ao_30_1211_1_2b9ec0ab4965da2b76cfc9d7bdd9f430.jpg"
            ],
            [
                "nome" => "Tênis Masculino Corrida ProRun",
                "descricao" => "Design aerodinâmico e ótimo amortecimento.",
                "valor" => 319.00,
                "categoria" => "masculino",
                "foto" => "https://m.media-amazon.com/images/I/41FQpE-EXKL._AC_.jpg"
            ],
            [
                "nome" => "Sapato Masculino Conforto SoftToe",
                "descricao" => "Sapato casual com palmilha confortável.",
                "valor" => 259.90,
                "categoria" => "masculino",
                "foto" => "https://m.media-amazon.com/images/I/81rwMLPz0HL._AC_UF1000,1000_QL80_.jpg"
            ],
            [
                "nome" => "Tênis Feminino Rosa Neon RunJoy",
                "descricao" => "Visual marcante e ideal para treinos leves.",
                "valor" => 179.99,
                "categoria" => "feminino",
                "foto" => "https://down-br.img.susercontent.com/file/sg-11134201-7rcfb-m6fywah8oill35_tn.webp"
            ],
            [
                "nome" => "Sandália Infantil Super Hero",
                "descricao" => "Sandália com estampa de super-herói.",
                "valor" => 79.99,
                "categoria" => "infantil",
                "foto" => "https://www.betisa.com.br/cdn/imagens/produtos/det/sandalia-infantil-grendene-kids-marvel-super-heroi-brinde-mochila-ddf8ed2f275d58616878723644cdaf62.png"
            ],
            [
                "nome" => "Tênis Casual Feminino Branco CityWalk",
                "descricao" => "Tênis estiloso para looks casuais e modernos.",
                "valor" => 219.90,
                "categoria" => "feminino",
                "foto" => "https://d87n9o45kphpy.cloudfront.net/Custom/Content/Products/27/84/2784992_tenis-via-marte-casual-feminino-pespontos-branco-5192841_l1_638288236498184944.webp"
            ],
            [
                "nome" => "Tênis Infantil Adventure Kids",
                "descricao" => "Tênis resistente para aventuras e brincadeiras.",
                "valor" => 119.90,
                "categoria" => "infantil",
                "foto" => "https://a-static.mlcdn.com.br/800x560/tenis-infantil-cross-road-adventure-bussola-marinho-cross-road-kids/studioz/1880875-1882943/581abeb428b95c539918a12def39e0ae.jpeg"
            ]
        ];

        Produto::insert($produtos);
    }
}
