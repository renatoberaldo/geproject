# Sistema GeProj #

Esse arquivo tem como objetivo orientar como configurar o `GeProj - Sistema de Gerenciamento de Projetos`. 

Back-end: Laravel 5.1 com a parte de autenticação funcional utilizando o OAUTH2. 

Front-end: Angular JS configurado com uma tela de login e uma lista de users. 


### Como clonar o projeto com o PhpStorm ###

* Abra o seu `PhpStorm`, caso tenha algum projeto aberto escolha `File->Close project`.
* Na página inicial do PhpStorm escolha a opção `Check out from Version Control`.
* Escolha a opção `Git`.

* Na tela Clone repository preencha os dados abaixo.
* Git Repository URL: `https://github.com/renatoberaldo/geproject`.
* Parent Directory: `D:\web`.
* Directory Name: `geproj`.

Preencha `o seu Password no bitbucket`.
Clique em `Ok` para abrir o projeto no PhpStorm.


### Instalando as dependencias com o Composer ###

Para que a aplicação funcione é necessário instalar as dependencias, elas ficarão na pasta `vendor`. 

* Abra o terminal dentro do PhpStorm.
* Digite `composer install`.


### Configurando o Laravel ###

Para setar os valores de banco de dados e setar uma chave para a sua aplicação Laravel: 

* Dentro do PhpStorm dê um Ctrl + C no arquivo `.env.example` e Ctrl + V e renomeia para `.env`.
* Abra o arquivo `.env` e coloque suas opções de banco de dados `DB_DATABASE=meu_banco`.
* Caso você esteja no windows e perceba seu acesso ao banco de dados lento modifique o DB_HOST para `DB_HOST=127.0.0.1`.
* Abra o terminal dentro do PhpStorm.
* Para gerar uma chave para a sua aplicação digite: `php artisan key:generate`.


### Configurando o Banco de Dados ###

* Abra o `MAMP` e acesse o `phpmyadmin`.
* Crie um banco de dados chamado `meu_banco`.


### Criando tabelas iniciais com o Artisan ###

Siga esses passos para gerar as tabelas do sistema.

* Edite o arquivo `database\seeds\UserTableSeeder.php` com as informações do seu usuário.
* Abra o terminal dentro do PhpStorm.
* Digite `php artisan migrate` para grar a estrutura das tabelas.
* Digite `php artisan db:seed` para inserir os registros configurados no `database\seeds\DatabaseSeeder.php`.


### Visualizando no browser ###

* Abra o terminal dentro do PhpStorm.
* Na raiz da aplicação digite `php artisan serve`, ele vai iniciar o servidor web direto na pasta public.
* Abra o chrome e veja a aplicação funcionando.