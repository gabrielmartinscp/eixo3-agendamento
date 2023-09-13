# EasyBook
# 1 - Introdução

Este diretório contém o projeto de terceiro período (eixo 3) do curso de Sistemas de Informação EAD da PUC Minas.

O produto do projeto foi batizado como EasyBook, sendo um protótipo de plataforma web de agendamento de horários.
O objetivo central é permitir a interação de dois tipos de usuários: "prestadores de serviço" e "clientes".

Em resumo, os prestadores de serviço poderão se cadastrar e personalizar agendas de atendimentos. Já os clientes 
poderão visualizar os horários disponibilizados e solicitar o agendamento por meio da plataforma. As funcionalidades 
serão descritas de forma mais precisa na documentação.


# 2 - Instalação/configuração

## 2.1 - arquivos de configuração:

Tendo como referência a pasta raiz do projeto, os arquivos listados abaixo possuem configurações
 e referências que são reaproveitadas em pontos diversos dos arquivos de código.

0_javascript/CRUD/config.js

auth/config.php

CRUD/config.php

login/config.php


Os arquivos de configuração foram incluidos no .gitignore para que o grupo pudesse trabalhar com instalações 
locais sem que estas precisassem ser idênticas.

Na pasta onde cada um dos arquivos de configuração deve ser inserido existe um "_original_config.zip".
Basta descompactar de acordo com os caminhos listados acima e, se a estrutura de pastas for alterada,
ajustar as variáveis de caminho.

## 2.2 - WAMP Server

Existem outras opções de servidores locais. Originalmente foi usado o WAMP, que pode ser baixado no link abaixo:

https://www.wampserver.com/en/download-wampserver-64bits/

A instalação já inclui PHP, MySQL, o servidor Apache e o painel de administração (PHPMyAdmin).

Após instalar o WAMP, além de importar o banco de dados, será necessário criar um "VirtualHost" e copiar os arquivos 
para o diretório. O nome do VirtualHost original é "eixo3-agendamento". Caso seja escolhido um nome diferente, os arquivos
de configuração listados no item 2.1 deverão ser alterados de acordo.

## 2.3 - Banco de dados

O banco de dados para importação é o arquivo "bd_easybook.sql" na raiz do repositório.

A configuração do MySQL, incluindo a importação da estrutura de tabelas, pode ser feita através do PHPMyAdmin ou do
MySQL Workbench.

Como alternativa, pode ser usado o Workbench para gerenciar o banco de dados. O download está disponível no link abaixo.

https://www.mysql.com/products/workbench/


# 3 - Estrutura

## 3.1 - Backend

### 3.1.1 - Banco de Dados

A estrutura do banco de dados pode ser observada na imagem a seguir:

![BD easybook atualizado 13-09](https://github.com/gabrielmartinscp/eixo3-agendamento/assets/100474390/18ed7746-8b82-4f96-8042-f38157cb9b39)

