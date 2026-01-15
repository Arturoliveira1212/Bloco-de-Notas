# 📝 Bloco de Notas

Projeto de aprendizado desenvolvido com **Laravel 12** para estudo de conceitos básicos do framework.

Um sistema simples de gerenciamento de notas pessoais com autenticação de usuários.

## 🎯 Sobre o Projeto

Este é um projeto educacional para aprender os fundamentos do Laravel 12:
- Autenticação básica
- CRUD (Create, Read, Update, Delete)
- Relacionamentos entre models
- Migrations e Seeders
- Blade Templates
- Validação de formulários

## 🛠️ Tecnologias

- **Laravel 12** - Framework PHP
- **MySQL** - Banco de dados
- **Laravel Sail** - Ambiente Docker
- **Blade** - Templates
- **Bootstrap** - CSS

## 📋 Pré-requisitos

- Docker
- Git
- Composer

## 🚀 Instalação Local

### 1. Clone o projeto

```bash
git clone <url-do-repositorio>
cd notes
```

### 2. Execute o setup inicial

```bash
composer setup
```
### 3. Suba os containers

```bash
./vendor/bin/sail up -d
```

### 4. Execute as migrations

```bash
./vendor/bin/sail artisan migrate
```

### 5. Popule o banco de dados

```bash
./vendor/bin/sail artisan db:seed
```

Usuários criados:
- user1@gmail.com / abc123456
- user2@gmail.com / abc123456
- user3@gmail.com / abc123456

### 6. Acesse a aplicação

Abra o navegador em: **http://localhost**

Para acessar o phpMyAdmin: **http://localhost:8080**

## 🎮 Comandos Úteis

```bash
# Iniciar os containers
./vendor/bin/sail up -d

# Parar os containers
./vendor/bin/sail down

# Ver logs
./vendor/bin/sail logs

# Acessar o container
./vendor/bin/sail shell

# Executar comandos artisan
./vendor/bin/sail artisan <comando>
```

## ✨ Funcionalidades

- Login e logout de usuários
- Criar notas
- Listar notas
- Editar notas
- Excluir notas
- Cada usuário vê apenas suas próprias notas

## 📝 Licença

Este projeto é apenas para fins educacionais.
