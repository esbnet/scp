# SCP - Sistema de Controle de Carência e Provimento
O sistema se propõe a relacionar disciplinas sem professor atribuido e uma relação de professores disponíveis para assumirem estas vagas.

O sistema foi desenvolvido com o framework Codeigniter 4.0.4

![Alt text](public/assets/images/Menu_Carência_Incluir.PNG?raw=true "Title")


## Módulo de Carência
Neste módulo são mantidas as disciplinas que possuem carência de professores. 

![Tela de Carência](public/assets/images/Carencia_Incluir_Tela_Completa.PNG?raw=true "Title")

## Consulta de Carência
Esta tela permite verificar através de uma pesquisa avanção com diversos parâmetros de pesquisa, quais as disciplinas possuem carência de professor.

![Tela de Carência](public/assets/images/Carencia_Pesquisa.png?raw=true "Title")

## Módulo de Provimento
Aqui temos a relação de professores disponíveis para serem alocados nas disciplinas disponíveis no módulo de carência.

![Tela de Carência](public/assets/images/Provimento_Incluir_Adicionar_Carencia.PNG?raw=true "Title")

## Consulta de Provimento
Permite gerenciar os provimentos realizados e até realizar ajustes em operaçẽs já realizadas.

![Tela de Carência](public/assets/images/Provimento_Alteracao_Consulta.PNG?raw=true "Title")



## Pré-Requisitos
- PHP 7.3 >
- MySql 5 >

## Instalação / Configuração

- [ ] Salvar os arquivos na pasta da aplicação
- [ ] Na pasta raiz editar o arquivo .env e configurar o URL da aplicação:

``` 
APP_URL=http://scphml.sec.ba.gov.br
```
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

``` 
Sistema de Carência e Provimento2composer install
```

- [ ] Criar o bando scp
- [ ] Rodar o script banco.sql que encontra-se na pasta app
- [ ] Ainda na pasta src executar o comando

``` 
php spark serve
```

## Configurações PHP
- [ ]  Instalar as extensões: *intl* extension e *mbstring* extension 
- [ ] Habilitar as extensões: php-json , php-mysqlnd , php-xml



