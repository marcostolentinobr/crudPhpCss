# CRUD EQUIPAMENTOS

## Problema

* CRUD EQUIPAMENTO (* NOT NULL)
* id PK BIG AUT 
* Nome VAR(50), (Possivel crud no se der tempo)
* Modelo VAR(50), (Possivel crud no se der tempo)
* fabricante VAR(50), (Possivel crud no se der tempo)
* data_aquisicao date
* data_criacao datetime CURRENT_TIMESTEMP
* ativo char(1).

## REQUISITOS
* mysql
* php >= 7.3

## Rodar
* Criar banco no mysql;
* Rodar Artefatos/script.sql 
* Configurar o config.php
* OBS.: Utilizar em ambiente com internet pois não foi baixado libs js