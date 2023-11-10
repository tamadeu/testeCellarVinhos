
# Teste Laravel Cellar Vinhos

Criei o meu projeto em Laravel com MySQL e utilizei o Laravel Breeze para fazer um leve gerenciamento de usuários.

O Laravel Breeze, depois de instalado, já cria uma tabela de users e algumas views, controllers e Model para Login, Registro e Recuperação de Senha.

Neste teste utilizei apenas o Login e o Registro.

Também foi utilizado o template de dashboard gratuito Spur - A Bootstrap Admin Template -> https://github.com/HackerThemes/spur-template

## Início

### Requisitos
- PHP 8.1 >
- Composer
- Node

Para instalar o projeto será necessário criar um banco de dados local. Após criado o banco de dados, importe o arquivo dados.sql para o DB. Ele não é muito grande estão deve ser rápido.

Agora vamos editar o arquivo .env do projeto.

- Abra o arquivo .env
- altere os dados do banco de dados para o seu banco recém criado

Pronto, agora podemos rodar o projeto com o comando de terminal

```bash
  php artisan serve
```

Você deverá ver que o projeto, provavelmente, iniciou em localhost:8000

## O Projeto

O projeto consiste em 4 módulos principais:
- Usuários
- Permissões
- Categorias
- Produtos

A partir das permissões, os usuários podem, ou não, acessar os módulos.

São elas:
- Leitura
- Criação
- Edição
- Exclusão

Cada uma dessas permissões está atrelada ao tipo de usuário logado e ao módulo que está sendo requisitado.

Os usuários são divididos em dois perfis:
- Administrador
- Usuário

Ambos tem as permissões definidas pelo módulo de Permissões.

Quando um usuário faz o registro no sistema através da tela de Registro, automaticamente ele é atribuído ao perfil Usuário. Caso o registro seja feito por outro usuário dentro do sistema, existe a opção para escolher o perfil.
