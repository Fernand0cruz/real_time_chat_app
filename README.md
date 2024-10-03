# Real-Time Chat Application

<p align="center">
    <a href="https://laravel.com" target="_blank">
        <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
    </a>
</p>

## Sobre o Projeto

Esta é uma aplicação de chat em tempo real desenvolvida com **Laravel 11** no backend e **Vue 3** no frontend. O projeto utiliza **Laravel Echo** e o **Laravel Reverb** para facilitar a comunicação em tempo real.

## Funcionalidades

- Envio e recebimento de mensagens em tempo real.
- Notificações de novas mensagens.
- Interface de usuário responsiva e amigável.

## Tecnologias Utilizadas

- **Backend:**
  - [Laravel 11](https://laravel.com)
  - [Laravel Echo](https://laravel.com/docs/11.x/broadcasting)
  - [Pusher](https://pusher.com) ou [Laravel Reverd](https://reverb.laravel.com/)

- **Frontend:**
  - [Vue 3](https://vuejs.org)
  - [Vuex](https://vuex.vuejs.org/)
  - [Axios](https://axios-http.com/)
    
## Pré-requisitos

Antes de começar, verifique se você possui as seguintes ferramentas instaladas em sua máquina:

- [Node.js](https://nodejs.org/) (v20 ou superior)
- [Composer](https://getcomposer.org/)
- [PHP](https://www.php.net/) (v8 ou superior)

## Instalação

### Backend

1. Clone o repositório:

   ```bash
   git clone https://github.com/seu-usuario/chat-real-time.git
   cd chat-real-time
   
2. Instale a dependências do Laravel:
   
   ```bash
    composer install

3. Crie um arquivo .env a partir do .env.example e configure as variáveis de ambiente:

   ```bash
    cp .env.example .env

4. php artisan key:generate

   ```bash
   php artisan key:generate

5. Execute as migrações do banco de dados:

   ```bash
   php artisan migrate


## Frontend

1. Instale as dependências do Vue:

   ```bash
   npm install

## Para executar o projeto

1. iniciando o laravel
   
   ```bash
   php artisan serve

2. iniciando o Front End

   ```bash
   npm run dev
   
3. iniciando o websocket

   ```bash
   php artisan reverb:start
   
4. Monitorar os eventos de envio de mensagens 

   ```bash
   php artisan queue:work

## Pronto, agora é só acessar http://localhost:8000 
