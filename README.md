# 📝 Sistema de Bloco de Notas

Um sistema web completo de gerenciamento de notas pessoais desenvolvido com Laravel 12, oferecendo uma interface moderna e intuitiva para criação, edição e organização de notas.

![PHP Version](https://img.shields.io/badge/PHP-8.2%2B-777BB4?style=flat-square&logo=php)
![Laravel Version](https://img.shields.io/badge/Laravel-12.0-FF2D20?style=flat-square&logo=laravel)
![License](https://img.shields.io/badge/License-MIT-green?style=flat-square)

## 🚀 Tecnologias Utilizadas

### Backend
- **PHP 8.2+** - Linguagem de programação
- **Laravel 12.0** - Framework PHP moderno e elegante
- **Laravel Tinker** - Console interativo para debug e testes
- **MySQL/MariaDB** - Banco de dados relacional

### Frontend
- **Vite 7.0** - Build tool moderna e rápida
- **TailwindCSS 4.0** - Framework CSS utility-first
- **Blade Templates** - Engine de templates do Laravel
- **Axios 1.11** - Cliente HTTP para requisições AJAX

### Desenvolvimento
- **PHPUnit 11.5** - Framework de testes unitários
- **Laravel Pail** - Visualização de logs em tempo real
- **Laravel Pint** - Code style fixer para PHP
- **Laravel Sail** - Ambiente Docker para Laravel
- **Faker PHP** - Gerador de dados fake para testes
- **Mockery** - Framework de mocking para testes
- **Concurrently** - Execução de múltiplos comandos em paralelo

## ✨ Funcionalidades

### Autenticação
- ✅ Login seguro com validação de e-mail e senha
- ✅ Sistema de sessões para gerenciamento de usuários
- ✅ Logout com limpeza de sessão
- ✅ Proteção de rotas com middlewares
- ✅ Registro de último acesso do usuário

### Gerenciamento de Notas
- ✅ **Criar Notas** - Adicionar novas notas com título e texto
- ✅ **Listar Notas** - Visualizar todas as notas do usuário
- ✅ **Editar Notas** - Modificar título e conteúdo das notas existentes
- ✅ **Excluir Notas** - Remover notas com confirmação (Soft Delete)
- ✅ **Visualizar Nota** - Ver detalhes completos de cada nota

### Segurança
- 🔒 Criptografia de IDs para maior segurança nas URLs
- 🔒 Validação de formulários no backend
- 🔒 Soft Delete - Exclusão lógica de registros
- 🔒 Proteção CSRF em todos os formulários
- 🔒 Hash seguro de senhas com `password_verify`
- 🔒 Middleware de autenticação para rotas protegidas

### Recursos Técnicos
- 📱 Interface responsiva com TailwindCSS
- ⚡ Hot Module Replacement (HMR) com Vite
- 🔄 Soft Deletes para recuperação de dados
- 🎯 Relacionamento Eloquent entre Users e Notes
- 📊 Migrations para versionamento do banco de dados
- 🌱 Seeders para população inicial do banco
- ✅ Validação robusta de dados de entrada
- 🎨 Mensagens de erro personalizadas em português

## 📋 Pré-requisitos

Antes de iniciar, certifique-se de ter instalado:

- PHP 8.2 ou superior
- Composer 2.x
- Node.js 18.x ou superior
- NPM ou Yarn
- MySQL 8.0+ ou MariaDB 10.3+
- Servidor web (Apache/Nginx) ou usar o servidor embutido do PHP

## 🔧 Instalação

### 1. Clone o Repositório

```bash
git clone <url-do-repositorio>
cd notes
```

### 2. Instale as Dependências PHP

```bash
composer install
```

### 3. Instale as Dependências JavaScript

```bash
npm install
```

### 4. Configure o Ambiente

Copie o arquivo de exemplo `.env`:

```bash
cp .env.example .env
```

Edite o arquivo `.env` e configure as credenciais do banco de dados:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=notes
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha
```

### 5. Gere a Chave da Aplicação

```bash
php artisan key:generate
```

### 6. Execute as Migrations

Crie as tabelas no banco de dados:

```bash
php artisan migrate
```

### 7. (Opcional) Popular o Banco com Dados de Teste

```bash
php artisan db:seed --class=UsersTableSeeder
```

### 8. Compile os Assets

Para desenvolvimento:
```bash
npm run dev
```

Para produção:
```bash
npm run build
```

## 🚀 Executando o Projeto

### Método 1: Script Composer (Recomendado)

Execute todos os serviços necessários de uma vez:

```bash
composer dev
```

Este comando inicia simultaneamente:
- Servidor PHP (http://localhost:8000)
- Queue Worker
- Logs em tempo real (Pail)
- Vite dev server (HMR)

### Método 2: Comandos Individuais

**Servidor de Desenvolvimento:**
```bash
php artisan serve
```

**Compilação de Assets (Terminal separado):**
```bash
npm run dev
```

O sistema estará disponível em: **http://localhost:8000**

## 📁 Estrutura do Projeto

```
notes/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── AuthController.php      # Autenticação
│   │   │   └── MainController.php      # Gerenciamento de notas
│   │   └── Middleware/
│   │       ├── CheckIsLogged.php       # Verifica se está logado
│   │       └── CheckIsNotLogged.php    # Verifica se não está logado
│   ├── Models/
│   │   ├── Note.php                    # Model de Notas
│   │   └── User.php                    # Model de Usuários
│   └── Services/
│       └── Operations.php              # Serviços auxiliares
├── database/
│   ├── migrations/                     # Migrations do banco
│   └── seeders/                        # Seeders para popular banco
├── resources/
│   ├── views/                          # Templates Blade
│   ├── css/                            # Estilos
│   └── js/                             # Scripts JavaScript
├── routes/
│   └── web.php                         # Rotas da aplicação
└── public/                             # Assets públicos
```

## 🔐 Credenciais de Acesso

Após executar o seeder de usuários, você pode usar as seguintes credenciais para login:

```
E-mail: user@example.com
Senha: password
```

*Nota: Altere estas credenciais em produção!*

## 🧪 Executando Testes

Execute os testes unitários e de feature:

```bash
composer test
```

ou

```bash
php artisan test
```

## 🎯 Rotas Principais

### Públicas
- `GET /login` - Página de login
- `POST /loginSubmit` - Processar login

### Protegidas (Requer Autenticação)
- `GET /` - Página inicial com lista de notas
- `GET /newNote` - Formulário de nova nota
- `POST /newNoteSubmit` - Criar nova nota
- `GET /editNote/{id}` - Formulário de edição
- `POST /editNoteSubmit` - Atualizar nota
- `GET /deleteNote/{id}` - Confirmação de exclusão
- `GET /deleteConfirm/{id}` - Excluir nota
- `GET /logout` - Encerrar sessão

## 📊 Banco de Dados

### Tabela: users
- `id` - Identificador único
- `username` - E-mail do usuário
- `password` - Senha criptografada
- `last_login` - Último acesso
- `timestamps` - created_at, updated_at
- `deleted_at` - Soft delete

### Tabela: notes
- `id` - Identificador único
- `user_id` - Referência ao usuário
- `title` - Título da nota (máx. 200 caracteres)
- `text` - Conteúdo da nota (máx. 3000 caracteres)
- `timestamps` - created_at, updated_at
- `deleted_at` - Soft delete

## 🛡️ Segurança

- Todas as senhas são armazenadas com hash bcrypt
- Proteção CSRF em todos os formulários
- Validação de entrada em todas as requisições
- IDs criptografados nas URLs
- Soft Delete para recuperação de dados
- Sanitização de dados com validações do Laravel
- Middlewares de autenticação em rotas protegidas

## 🔄 Validações

### Login
- E-mail válido e obrigatório
- Senha entre 6-16 caracteres

### Notas
- Título: 3-200 caracteres (obrigatório)
- Texto: 3-3000 caracteres (obrigatório)

Todas as mensagens de validação estão em português brasileiro.

## 📝 Licença

Este projeto está sob a licença MIT. Veja o arquivo LICENSE para mais detalhes.

## 👨‍💻 Desenvolvimento

### Setup Completo com um Comando

```bash
composer setup
```

Este comando executa:
1. Instalação de dependências PHP
2. Cópia do arquivo .env
3. Geração da chave da aplicação
4. Execução das migrations
5. Instalação de dependências Node
6. Build dos assets

## 🤝 Contribuindo

Contribuições são bem-vindas! Sinta-se à vontade para:

1. Fazer fork do projeto
2. Criar uma branch para sua feature (`git checkout -b feature/MinhaFeature`)
3. Commit suas mudanças (`git commit -m 'Adiciona MinhaFeature'`)
4. Push para a branch (`git push origin feature/MinhaFeature`)
5. Abrir um Pull Request

## 📧 Suporte

Para questões e suporte, por favor abra uma issue no repositório.

---

**Desenvolvido com ❤️ usando Laravel**
