# Pastelaria

API RESTFul para o gerenciamento de pedidos de uma pastelaria utilizando o framework Laravel/Lúmen.
Back-end Challenge - Doc88

## Documentação

Faça o dowload do arquivo zip ou adicione o repositório através do git
git remote add origin https://github.com/alegneto/pastry-shop.git
git push -u origin master

Acesse o diretorio através de terminal e utilizando o composer, digite o seginte comando:
composer install

## Banco de dados

O projeto foi desenvolvido utilizando MySQL
Criar database
mysql > CREATE DATABASE pastry_shop

Copiar o arquivo .env.exemple e renomear para .env
Altere as informações de usuário e senha do bando de dados configurados em seu database

No diretório da aplicação executar os seguintes comandos no terminal
php artisan migrate
php artisan db:seed

## Aplicação

Para executar a aplicação, ainda dentro do terminal, executar o seguinte comando
php -S localhost:8000 -t public

## API



## Licença

[MIT license](https://opensource.org/licenses/MIT).
