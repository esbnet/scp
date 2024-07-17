# SCP - Sistema de Controle de Carência e Provimento
O sistema se propõe a relacionar disciplinas sem professor atribuido e uma relação de professores disponíveis para assumirem estas vagas.

O sistema foi desenvolvido com o framework Codeigniter 4.0.4

![Alt text](public/assets/images/Cadastro_Usuario.PNG?raw=true "Title")


## Módulo de Carência
Neste módulo são mantidas as disciplinas que possuem carência de professores. 


## Módulo de Provimento
Aqui temos a relação de professores disponíveis para serem alocados nas disciplinas disponíveis no módulo de carência.

## Pré-Requisitos
- PHP 7.3 >
- MySql 5 >

## Instalação / Configuração

- [ ] Salvar os arquivos na pasta da aplicação
- [ ] Na pasta raiz editar o arquivo .env e configurar o URL da aplicação:
``` APP_URL=http://scphml.sec.ba.gov.br```
- [ ] No mesmo arquivo, configurar o acesso ao banco

```
#-------------------------------------------------------------------- 
# DATABASE 
#-------------------------------------------------------------------- 
 
 database.default.hostname =  
 database.default.database = scp 
 database.default.username =  
 database.default.password =  
 database.default.DBDriver = MySQLi
```
- [ ] Na pasta src rodar o comando
```Sistema de Carência e Provimento2composer install```

- [ ] Criar o bando scp
- [ ] Rodar o script banco.sql que encontra-se na pasta app
- [ ] Ainda na pasta src executar o comando
 ```php spark serve```

## Configurações PHP
- [ ]  Instalar as extensões: *intl* extension e *mbstring* extension 
- [ ] Habilitar as extensões: php-json , php-mysqlnd , php-xml
