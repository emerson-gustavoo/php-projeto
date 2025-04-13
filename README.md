# php-projeto

# Sistema de Autenticação em PHP Puro

Este é um trabalho de Programação 3: sistema simples de cadastro/login de usuários, usando PHP orientado a objetos, sessões e cookies.  
Dados dos usuários são persistidos em `data/usuarios.json`.

## Funcionalidades

- Cadastro de usuário (nome, e‑mail, senha com hash)  
- Login com verificação de hash de senha  
- “Lembrar e‑mail” via cookie  
- Área restrita protegida por sessão  
- Logout  

## Tecnologias

- PHP 7.4+  
- Apache (XAMPP, WAMP, Laragon ou similar)  
- JSON para armazenamento simples  

## Estrutura de Pastas
php-projeto/
├── classes/
│   ├── Usuario.php
│   ├── Sessao.php
│   └── Autenticador.php
├── data/
│   └── usuarios.json
├── index.php
├── cadastro.php
├── processa_cadastro.php
├── login.php
├── processa_login.php
├── dashboard.php
└── logout.php
