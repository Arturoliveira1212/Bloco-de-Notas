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

- Docker Desktop instalado
- Git

## 🚀 Instalação Local

### 1. Clone o projeto

```bash
git clone <url-do-repositorio>
cd notes
```

### 2. Copie o arquivo de ambiente

```bash
cp .env.example .env
```

### 3. Instale as dependências (via Docker)

```bash
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php85-composer:latest \
    composer install --ignore-platform-reqs
```

### 4. Suba os containers

```bash
./vendor/bin/sail up -d
```

### 5. Gere a chave da aplicação

```bash
./vendor/bin/sail artisan key:generate
```

### 6. Execute as migrations

```bash
./vendor/bin/sail artisan migrate
```

### 7. (Opcional) Popule o banco de dados

```bash
./vendor/bin/sail artisan db:seed --class=UsersTableSeeder
```

Usuários criados:
- user1@gmail.com / abc123456
- user2@gmail.com / abc123456
- user3@gmail.com / abc123456

### 8. Acesse a aplicação

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
