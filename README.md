# PHP Portfolio Creator

This project is a PHP-based portfolio creator that stores standardized data in a MySQL database. Additionally, it provides users with the ability to create their own custom templates.

## Current Project Status

- ~~**Step 1 Completed:** Implementation of the portfolio builder.~~
- ~~**Step 2 Completed:** Currently working on the portfolio editing feature and deletion option.~~
- ~~**Step 3 In Progress:** Developing the template system and the ability to select different styles.~~
- ~~**Step 4 :** Testing - Working at~~
- ~~**Step 5 :** Update user data modal.~~
- **Step 6 :** Create a documentation and publish it.


## Contributions

This project is open source, and contributions are highly welcome! If you have ideas, suggestions, or corrections, feel free to [open an issue](https://github.com/abdalazard/PortfolioCreator/issues/new) or submit a [pull request](https://github.com/abdalazard/PortfolioCreator/compare).

## Technologies Used

- **Backend:** PHP
- **Frontend:** jQuery
- **Database:** MySQL

## How to Contribute

1. Fork the repository
2. Create a branch for your contribution (`git checkout -b new-feature`)
3. Make desired changes and commit (`git commit -m 'Adding new feature'`)
4. Push to the branch (`git push origin new-feature`)
5. Open a [pull request]((https://github.com/abdalazard/PortfolioCreator/compare)).

- Create a .env file:
In terminal line, write:

* touch db/.env

- then fill up the file with your database information:

PROJECT_NAME=my-project-name
DB_HOST=localhost
DB_USERNAME=root
DB_PASSWORD=mypassword

MY_PORTFOLIO_NAME=mydatabase
MY_PORTFOLIO_PAGE=https:my-website.com

- In terminal, install all dependencies:
* composer install

- For the last, in terminal command line you need to write the next command line for create your user access:
* php migrate.php

We appreciate your contributions in advance!


-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------



# Criador de Portfolios em PHP

Este projeto é um criador de portfolios desenvolvido em PHP que registra dados padronizados em um banco de dados MySQL. Além disso, oferece ao usuário a capacidade de criar seus próprios templates personalizados.

## Estado Atual do Projeto

- ~~**Fase 1 Concluída:** Implementação do construtor de portfolios.~~
- ~~**Fase 2 Concluída:** Atualmente trabalhando na funcionalidade de edição de portfolios e na opção de exclusão.~~
- ~~**Fase 3 Em andamento:** Desenvolvimento do sistema de templates e a capacidade de selecionar diferentes estilos.~~
- ~~**Fase 4 :** Testando até agora - Em andamento~~
~~- **Fase 5 :** Modal de atualização de dados do usuário.~~
- **Fase 6 :** Documentar e publicar.


## Contribuições

Este projeto é de código aberto e contribuições são muito bem-vindas! Se você tem ideias, sugestões ou correções, sinta-se à vontade para [abrir uma issue](https://github.com/abdalazard/PortfolioCreator/issues/new) ou enviar um [pull request](https://github.com/abdalazard/PortfolioCreator/compare).

## Tecnologias Utilizadas

- **Backend:** PHP
- **Frontend:** jQuery
- **Banco de Dados:** MySQL

## Como Contribuir

1. Faça um fork do repositório
2. Crie um branch para sua contribuição (`git checkout -b nova-feature`)
3. Faça as mudanças desejadas e faça commit (`git commit -m 'Adicionando nova feature'`)
4. Faça push para o branch (`git push origin nova-feature`)
5. Abra um [pull request](https://github.com/abdalazard/PortfolioCreator/compare).

-Crie um arquivo .env:
No terminal, escreva o seguinte comando:

* touch db/.env

-E então preencha o arquivo .env com as informações do seu banco de dados:

PROJECT_NAME=nome-do-meu-projeto
DB_HOST=localhost
DB_USERNAME=root
DB_PASSWORD=minhasenha

MY_PORTFOLIO_NAME=meubancodedados
MY_PORTFOLIO_PAGE=https:meu-site.com

- Ainda no terminal, instale todas as dependências do projeto:
* composer install

- Por último, você precisa escrever no terminal o seguinte código para criar seu usuário padrão de acesso e uso:
* php migrate.php

- For the last, in terminal command line you need to write the next command line for create your user access:
* php migrate.php

Usuário Padrão:

**Login**: admin
**Default password**: 123

Agradecemos antecipadamente por suas contribuições!
