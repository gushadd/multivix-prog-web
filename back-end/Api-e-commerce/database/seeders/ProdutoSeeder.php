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
                "foto" => "https://images.unsplash.com/photo-1595950653106-6c9ebd614d1a"
            ],
            [
                "nome" => "Sapato Social Masculino Classic",
                "descricao" => "Ideal para ocasiões formais, com acabamento refinado.",
                "valor" => 399.99,
                "categoria" => "masculino",
                "foto" => "https://images.unsplash.com/photo-1618354691373-6bca9ccf84b2"
            ],
            [
                "nome" => "Tênis Casual Masculino StreetWay",
                "descricao" => "Perfeito para o dia a dia, com estilo urbano.",
                "valor" => 229.50,
                "categoria" => "masculino",
                "foto" => "https://images.unsplash.com/photo-1560841656-5d9de6e9f4b4"
            ],
            [
                "nome" => "Tênis Feminino FitRun Rosa",
                "descricao" => "Modelo esportivo com design moderno e macio.",
                "valor" => 289.90,
                "categoria" => "feminino",
                "foto" => "https://images.unsplash.com/photo-1584735175097-719d0b207ad2"
            ],
            [
                "nome" => "Sapatilha Feminina Comfort Line",
                "descricao" => "Sapatilha leve, ideal para o trabalho e uso casual.",
                "valor" => 139.00,
                "categoria" => "feminino",
                "foto" => "https://images.unsplash.com/photo-1528701800489-20be3c57c459"
            ],
            [
                "nome" => "Tênis Feminino Branco SoftWalk",
                "descricao" => "Conforto e elegância em um só modelo.",
                "valor" => 199.99,
                "categoria" => "feminino",
                "foto" => "https://images.unsplash.com/photo-1579338559194-369464aa70b1"
            ],
            [
                "nome" => "Tênis Infantil Azul Dino",
                "descricao" => "Tênis com estampa de dinossauro, ideal para meninos.",
                "valor" => 99.90,
                "categoria" => "infantil",
                "foto" => "https://images.unsplash.com/photo-1605806618985-4f4f9b60d5ed"
            ],
            [
                "nome" => "Sandália Infantil Princesa Rosa",
                "descricao" => "Sandália delicada com estampa de princesa.",
                "valor" => 89.90,
                "categoria" => "infantil",
                "foto" => "https://images.unsplash.com/photo-1606813908913-39d573b290c1"
            ],
            [
                "nome" => "Tênis Infantil Colorido PopKid",
                "descricao" => "Tênis divertido e resistente para crianças ativas.",
                "valor" => 109.50,
                "categoria" => "infantil",
                "foto" => "https://images.unsplash.com/photo-1621605813293-3b98c9a7df57"
            ],
            [
                "nome" => "Tênis Masculino Corrida ProRun",
                "descricao" => "Design aerodinâmico e ótimo amortecimento.",
                "valor" => 319.00,
                "categoria" => "masculino",
                "foto" => "https://images.unsplash.com/photo-1542291026-7eec264c27ff"
            ],
            [
                "nome" => "Sapato Masculino Conforto SoftToe",
                "descricao" => "Sapato casual com palmilha confortável.",
                "valor" => 259.90,
                "categoria" => "masculino",
                "foto" => "https://images.unsplash.com/photo-1519744346361-3f082295ab53"
            ],
            [
                "nome" => "Tênis Feminino Rosa Neon RunJoy",
                "descricao" => "Visual marcante e ideal para treinos leves.",
                "valor" => 179.99,
                "categoria" => "feminino",
                "foto" => "https://images.unsplash.com/photo-1589571894960-20bbe2828fa4"
            ],
            [
                "nome" => "Sandália Infantil Super Hero",
                "descricao" => "Sandália com estampa de super-herói.",
                "valor" => 79.99,
                "categoria" => "infantil",
                "foto" => "https://images.unsplash.com/photo-1621605812857-e2ce02c50b90"
            ],
            [
                "nome" => "Tênis Casual Feminino Branco CityWalk",
                "descricao" => "Tênis estiloso para looks casuais e modernos.",
                "valor" => 219.90,
                "categoria" => "feminino",
                "foto" => "https://images.unsplash.com/photo-1621605812914-98ad3e383c80"
            ],
            [
                "nome" => "Tênis Infantil Adventure Kids",
                "descricao" => "Tênis resistente para aventuras e brincadeiras.",
                "valor" => 119.90,
                "categoria" => "infantil",
                "foto" => "https://images.unsplash.com/photo-1621605812956-212a387e8d4f"
            ]
        ];

        Produto::insert($produtos);
    }
}
