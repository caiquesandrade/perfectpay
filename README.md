<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About this Project

**Primeiro passo** é *clonar* o projeto, deve se rodar o comando abaixo dentro da pasta do projeto, para instalar as dependências:

`composer update`

**Segundo passo** é criar um banco de dados conforme as configurações abaixo:

    DB_CONNECTION=mysql
    
    DB_HOST=127.0.0.1
    
    DB_PORT=3306
    
    DB_DATABASE=perfectpay
    
    DB_USERNAME=homestead
    
    DB_PASSWORD=secret
    
    
**Terceiro passo**, após o BD criado e configurado, executar o comando:

`php artisan migrate`

Assim, o ORM Eloquent do Laravel irá criar todas as Data Tables (Tabelas) no nosso BD.

**Quarto passo**, é popular essas tabelas, com clientes e com os produtos. Minha idéia era o cliente cadastrar com login e usar ele ele para preencher a tabela de clientes, mas não era assim que estava o MER, então decidi seguir o MER e o mockup enviado pelo email.

**Quinto passo**, após os clientes e os produtos criados, basta fazer as vendas (sales), os selects serão preenchidos automaticamente.

Na tela home ("/"), a busta é feita passando a data e qual cliente, assim ele trará qual cliente comprou quais produtos, ou seja, quais vendas foram feitas para aqueles clientes, e na tabela a baixo são todas vendas realizadas.



