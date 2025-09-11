## Projeto PortalCursos

## Requisitos

* PHP 8.2 ou superior - Conferir a versão: php -v
* Composer - Conferir a instalação: composer --version
* Node.js 22 ou superior - Conferir a versão: node -v
* GIT - Conferir se está instalado o GIT: git -v


### Tecnologias
```sh

MVC

Seeder

ORM

Blade

FormRequest - Validação de formulário

Capturando e Validando IDs Encriptados

SqlServe

PHP 8.2

Rotas

Refatoração de código

Github

Criando Query para paginação

Lidando com Formularios

Lidando com Listagem de dados

CRUD - Create, update, Delete.

LOG 

Laravel Auditing 

Relacionamento ao banco de dados

mailtrap.io - teste de envios de emails

Sistema de permissões com Laravel Permission


 ```

## Como rodar o projeto baixado

- Duplicar o arquivo ".env.example" e renomear para ".env".

Instalar as dependências do PHP.
```
composer install
```

Instalar as dependências do Node.js.
```
npm install
```

Gerar a chave no arquivo .env.
```
php artisan key:generate
```

Executar as migrations para criar as tabelas e as colunas.
```
php artisan migrate

ou

php artisan migrate:fresh --seed
```

Iniciar o projeto criado com Laravel.
```
php artisan serve
```

Executar as bibliotecas Node.js.
```
npm run dev
```

Acessar a página criada com Laravel.
```
http://127.0.0.1:8000
```

- Para a funcionalidade enviar e-mail funcionar, necessário alterar as credenciais do servidor de envio de e-mail no arquivo .env.
- Utilizar o servidor fake durante o desenvolvimento: [Acessar envio gratuito de e-mail](https://mailtrap.io?ref=celke)


### Instalando a depencia de permissão

Link: https://spatie.be/docs/laravel-permission/v6/introduction

composer require spatie/laravel-permission

### Criar as migrations para o sistema de permissão
php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"

php artisan optimize:clear
 
php artisan config:clear

php artisan migrate

### Se tiver usando BD SqlServe

Usar esse comando na sua query para todas as tabelas

ALTER TABLE cursos ALTER COLUMN created_at datetime2(0) NULL;
ALTER TABLE cursos ALTER COLUMN updated_at datetime2(0) NULL;
