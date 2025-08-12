# Cadastro de Clientes

Projeto simples em Laravel 12 com PHP 8 para gerenciar clientes. Permite criar, editar, listar e excluir clientes.

<img width="1593" height="790" alt="image" src="https://github.com/user-attachments/assets/ca9b7f0f-5fc7-49f3-8684-72d0c354cdb0" />

## Funcionalidades

- Cadastro de clientes
- Edição de clientes
- Listagem de clientes
- Exclusão de clientes

## Tecnologias

- PHP 8
- Laravel 12
- Blade (views)
- Banco de dados SQLite ou MySQL

## Instalação

1. Clone o repositório:
   git clone https://github.com/N7z/cadastro-de-clientes.git

2. Entre na pasta do projeto:
   cd cadastro-de-clientes

3. Instale as dependências:
   composer install

4. Configure o arquivo `.env` com as informações do seu banco de dados.

5. Gere a chave da aplicação:
   php artisan key:generate

6. Execute as migrations para criar as tabelas com seed para dados fictícios:
   php artisan migrate --seed
   
8. Inicie o servidor local:
   php artisan serve

## Uso

- Acesse `http://localhost:8000` no navegador.
- Cadastre novos clientes, edite, visualize a lista e exclua registros.
