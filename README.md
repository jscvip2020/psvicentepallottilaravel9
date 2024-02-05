<div style="text-align:center">
<img src="http://paroquiasaovicentepallotti.org.br/images/logodefault.png" width="200" heigth="auto">
</div>

## Projeto Site Para Igreja Católica
Esse é um projeto de site desenvolvido utilizando o framework Laravel 9, criado especificamente para atender às necessidades da comunidade da Igreja Católica. Este site visa proporcionar uma plataforma interativa e informativa para os membros da paróquia, bem como para visitantes interessados.
## Funcionalidades Principais
### 1. Página Inicial
- Boas-vindas e Carrosel com imagens personalizáveis.
- Links rápidos para seções importantes.
### 2. Atendimentos
- Informações sobre os horários de confissão e celebrações especiais.
- Horários de Celebrações normais, atendimentos da Secretaria e do Padre.
### 3. Grupos da Paróquia
-  Orários e localização dos Grupos da paróquia
### 4. Área de Doações
- Local para:
  - QRcode para doação
  - Conta Bancário, Agência e banco
### 5. Contato e Localização
- Informações de contato da paróquia.
- Mapa interativo para localização fácil.
## Tecnologias Utilizadas

![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white) | ![MySQL](https://img.shields.io/badge/MYSQL-00000F?style=for-the-badge&logo=mysql&logoColor=white) | ![PHP](https://img.shields.io/badge/PHP-777bb4?style=for-the-badge&logo=php&logoColor=white) | ![Tailwind](https://img.shields.io/badge/Tailwind-38b2ac?style=for-the-badge&logo=mysql&logoColor=white) | ![Node](https://img.shields.io/badge/Node-00000F?style=for-the-badge&logo=node.js&logoColor=white) | ![Composer](https://img.shields.io/badge/Composer-885630?style=for-the-badge&logo=Composer&logoColor=white)
:-:|:-:|:-:|:-:|:-:|:-:
9|8.0.31|8.2|3.4.1|v20.9.0|2.6.5

## Como Contribuir
- Clone o repositório.
- Instale as dependências usando o Composer.
- Configure o ambiente e o banco de dados.
- Desenvolva novas funcionalidades ou corrija problemas.
- Envie pull requests para revisão.
## Como Configurar Localmente
- Clone o repositório: 
  ```
  git clone https://github.com/jscvip202/psvicentepallottilaravel9.git
  ```
- Instale as dependências: 
```
composer install
```
- Copie o arquivo de configuração: 
```
cp .env.example .env
```
- Configure o banco de dados no arquivo 
  ```
  .env
  ```
- Gere a chave de aplicação: 
  ```
  php artisan key:generate
  ```
- Execute as migrações do banco de dados: 
  ```
  php artisan migrate
  ```
- Inicie o servidor: 
  ```
  php artisan serve
  ```
## Licença
Este projeto é licenciado sob a [Licença MIT](https://github.com/jscvip2020/psvicentepallottilaravel9/blob/0941bef7b61965d47ddc28e13164c542ecbb084e/LICENSE).
##

Sinta-se à vontade para contribuir, relatar problemas ou sugerir melhorias. Juntos, podemos fazer do <b>Site para Igreja Católica</b> uma experiência digital significativa para a comunidade católica.
