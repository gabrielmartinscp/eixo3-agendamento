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

#### 0_javascript/CRUD/config.js
```
let config = {
    "servidor": "http://localhost/eixo3-agendamento",
    "diretorios": {
        "atendimentos": "CRUD/atendimentos",
        "avaliacoes": "CRUD/avaliacoes",
        "horarios": "CRUD/horarios",
        "prestadores": "CRUD/prestadores",
    }
}
```
config.servidor -> URL raiz da aplicação;

config.diretorios.* -> o endereço relativo dos diretórios que contém os scripts PHP para cada classe.

Os endereços definidos acima são acessados de forma similar por 16 funções distribuidas em 4 arquivos.

#### auth/config.php
```
<?php

$diretorio_padrao_acesso_negado = 'index';

?>
```
A variável definida no arquivo acima deve ser configurada para corresponder ao diretório ou página 
para onde o usuário deverá ser direcionado sempre que tentar acessar o sistema sem ter efetuado o login.

#### CRUD/config.php
```
<?php

$db_host = 'localhost';

$db_nome = 'bd_easybook';

$db_usuario = 'usuario';

$db_senha = 'usuario';

?>
```

Este arquivo configura os dados de acesso ao banco de dados que serão usados pelas funções CRUD.

$db_host -> o servidor do banco de dados, conforme a instalação/configuração do SGBD;

$db_nome -> nome da base de dados (schema), conforme a instalação/configuração do SGBD;

$db_usuario, $db_senha -> dados de acesso (usuário e senha), conforme a instalação/configuração do SGBD.

#### login/config.php
```
<?php

$db_host = 'localhost';

$db_nome = 'bd_easybook';

$db_tabela_dados_login_senha = 'bd_easybook.usuarios';

$db_usuario = 'usuario';

$db_senha = 'usuario';

$pagina_inicial_login_bem_sucedido = '/../index';

?>
```

Este arquivo configura os dados necessários para o funcionamento do script de login.

$db_host -> o servidor do banco de dados, conforme a instalação/configuração do SGBD;

$db_nome -> nome da base de dados (schema), conforme a instalação/configuração do SGBD;

$db_tabela_dados_login_senha -> nome da tabela que contém os dados de login e senha criptografada dos usuários;

$db_usuario, $db_senha -> dados de acesso (usuário e senha), conforme a instalação/configuração do SGBD;

$pagina_inicial_login_bem_sucedido -> endereço do diretório ou página para onde o usuário deverá ser 
direcionado após efetuar o login com sucesso.

OBS: apesar da similaridade em boa parte dos dados, não é recomendável unir os arquivos CRUD/config.php e 
login/config.php, uma vez que as razões para efetuar mudanças futuras nos módulos de CRUD e de login/autenticação 
não são as mesmas.

-------------------------------------

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

Pelo lado do servidor, este projeto foi desenvolvido usando a linguagem PHP e o SGBD MySQL.

### 3.1.1 - Banco de Dados

A estrutura do banco de dados pode ser observada na imagem a seguir:

![BD easybook atualizado 13-09](https://github.com/gabrielmartinscp/eixo3-agendamento/assets/100474390/18ed7746-8b82-4f96-8042-f38157cb9b39)

### 3.1.2 - Arquitetura

Neste sistema, a função principal da aplicação server-side é gerenciar os dados relativos às tabelas apresentadas 
no item 3.1.1 - "prestadores", "usuarios", "horarios", "atendimentos" e "avaliacoes" - através de operações CRUD.

Para cada tabela, são disponibilizados quatro scripts separados, equivalentes às operações Create, Read, Update e Delete.

Além disso, foram implementadas classes diretamente equivalentes a cada uma das tabelas.

Essa configuração possui dois objetivos principais:

1 - encapsulamento/modularidade -> a opção por implementar scripts padronizados para as operações CRUD permite encapsular 
as consultas ao servidor em funções do Javascript, conforme será melhor detalhado no item 3.2(Frontend). Esse encapsulamento possibilita 
que o backend seja migrado para outra linguagem de programação sem que haja a necessidade de adaptar a estrutura do frontend.

Ainda no mesmo tema, ao optar por queries genéricas, foi possível implementar os scripts usando a classe nativa PDO (PHP Data Object), 
de modo que uma eventual migração para outro SGBD baseado em SQL pode ser feita com ajustes mínimos. Os detalhes da classe PDO estão 
disponíveis na documentação oficial da linguagem PHP, acessível no link abaixo.

https://www.php.net/manual/pt_BR/book.pdo.php

2 - segurança/consistência -> as classes implementadas possuem métodos privados de validação de dados. Ao receber uma requisição de tipo 
Create ou Update, o respectivo script instancia um objeto da classe apropriada com os dados recebidos e solicita o registro no Banco de Dados
através dos métodos get. Dessa forma é possível garantir que, antes que haja a conexão com o SGBD, os dados já foram previamente validados e/ou 
saneados, evitando registros incorretos ou deliberadamente adulterados. Além disso, o uso de "prepared statements" através da classe PDO previne 
de forma nativa as tentativas de SQL injection. Os detalhes sobre o uso de Prepared Statements estão disponíveis na documentação oficial da 
linguagem PHP, acessível no link abaixo.

https://www.php.net/manual/pt_BR/pdo.prepared-statements.php

### 3.1.3 - Classes
O diagrama de classes da aplicação pode ser observada na imagem a seguir:

![EasyBook - diagrama de classes - atualizado 15-09](https://github.com/gabrielmartinscp/eixo3-agendamento/assets/100474390/11ac0627-fa86-4a5b-a498-8126bb17117f)


## 3.2 - Frontend
