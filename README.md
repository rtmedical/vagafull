# Tarefa Vaga Full Stack

A RT Medical tem como seu principal produto o RT Connect um software cloud para gestão de conferência do tratamento de câncer em radioterapia. Utilizamos várias linguagens no sistema como python, java, C++, R Lang e PHP. Ele foi pensado para ser um sistema modular, aproveitando o melhor de cada linguagem, sendo assim a tecnologia básica que roda toda infraestrutura são os contêineres Linux. Para isso utilizamos o software Docker para construir e manter os contêineres ativos. Nesta vaga para desenvolvedor fullstack você vai trabalhar especificamente com PHP utilizando o framework Laravel. O laravel é o responsável por servir as páginas web e comunicar com os módulos do sistema via Restful. Para você ter uma ideia, toda a parte de processamento de imagens é feita em C++, o python faz a parte de simulação e cálculos matemáticos, mas tudo isso é mostrado ao usuário usando o PHP com o Laravel.


Utilizamos o framework CSS Materialize ( http://materializecss.com/). A baixo está o tutorial.

# 1 Configurando Ambiente de Desenvolvimento

# a) Instalar o Docker:

Referência: https://docs.docker.com/install/#supported-platforms

Usuário Linux Debian:

```
$ curl -fsSL get.docker.com -o get-docker.sh

$ sudo sh get-docker.sh


```
# b) Instalar o Docker Compose:
Referência: https://docs.docker.com/compose/install/#install-compose

```
$ sudo curl -L https://github.com/docker/compose/releases/download/1.19.0/docker-compose-`uname -s-uname -m`-o /usr/local/bin/docker-compose

$ sudo chmod +x /usr/local/bin/docker-compose

```
# 2 Clonando projeto
Referência: https://git-scm.com/book/en/v2/Getting-Started-Installing-Git

Instalando Git

```
$ sudo apt-get install git

```
Clonando projeto do Github:

```
$ git clone https://github.com/rtmedical/vagafull.git

```
# 3 Rodando Projeto

# a) Acesse a pasta vagafull/docker

Na pasta docker, estão todos os arquivos para construção dos contêineres, acesse ela usando o comando.

```
$ cd vagafull/docker

```
# b) Construa os contêineres docker
Dentro da pasta docker, execute o docker-compose para construir os contêineres do software, neste caso iremos rodar o contêiner nginx e mariadb

```
$ docker-compose up -d nginx mariadb

```
# c) Migrando banco de dados

Agora vamos migrar o banco de dados, o laravel utilizar o Artisan, que é a ferramenta de linha de comando do Laravel. Com ela, podemos gerar a maioria das classes que são as ferramentas disponibilizadas pelo framework.

Lembra que estamos rodando um contêiner?

Logo temos que acessar o terminal do contêiner onde o laravel está instalado para rodar os comandos Artisan, então na pasta docker você rodará os comandos abaixo:

```
$ cd vagafull/docker

$ echo "Entrando no container onde o laravel está instalado"

$ docker-compose exec workspace bash

$ echo "Já estamos dentro do contêiner, agora execute o artisan"

root@idconteiner $ php artisan migrate

root@idconteiner $ echo "agora vamos sair do contêiner de volta para a pasta docker"

root@idconteiner $ exit

```
# 4 Acessando software instalado
No navegador digite o seguinte url:

```
http://localhost/

```
# 5 Criando CRUD para testar laravel
Tutorial Básico de como fazer um CRUD : https://www.5balloons.info/tutorial-simple-crud-operations-in-laravel-5-5/

Faça um CRUD para conhecer o framework, ele é bem simples de usar e utiliza o padrão MVC. Todos os comandos de terminal para gerar migração, criar arquivos você deve rodar dentro do contêiner

```
$ cd vagafull/docker

$ echo "Entrando no container onde o laravel está instalado"

$ docker-compose exec workspace bash

$ echo "Já estamos dentro do contêiner, agora execute o artisan"

root@idconteiner $ php artisan MEU COMANDO…

```
