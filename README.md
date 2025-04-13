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
- Apache (XAMPP)  
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

## Como Rodar o Projeto

Clone este repositório:
https://github.com/emerson-gustavoo/php-projeto

Copie a pasta php-projeto para dentro do diretório htdocs do XAMPP:
C:\xampp\htdocs\php-projeto

Crie manualmente a pasta data/ dentro de php-projeto.
O sistema criará automaticamente o arquivo usuarios.json quando você cadastrar o primeiro usuário.

Inicie o Apache pelo painel do XAMPP.

Acesse o sistema pelo navegador:
http://localhost/php-projeto/

Use normalmente:

Cadastre um novo usuário

Faça login com o e-mail e senha cadastrados

Marque “Lembrar e-mail” se quiser testar o cookie

Acesse a área restrita (dashboard)

Clique em logout para sair
