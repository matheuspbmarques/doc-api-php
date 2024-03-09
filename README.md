# DOC API PHP
A **DOC-API PHP** é um projeto feito com HTML, CSS, JS e PHP, que pode ser adicionado em servidor local ou na nuvem que tenha o PHP instalado.

## Instalação
Dentro do seu servidor com PHP instalado, faça uma copia do projeto DOC-API-PHP
```
git clone https://github.com/matheuspbmarques/doc-api-php.git
```

## Configuração
Para deixar o projeto do seu jeito
### Logo
Dentro da pasta _assets/svgs_ substitua o arquivo de imagem _logo.svg_ por sua logo com o mesmo nome e formato.

### Favicon
Dentro da pasta _public_ substitua o arquivo _icon.png_ pelo seu ícone com o mesmo nome e formato.

## Utilização
Na raiz do projeto, você criará um arquivo _doc.json_, nele você terá que configurar da seguinte forma:
```
[
    {
        "title": "Título dessa seção",
        "icon": "Ícone do Google Fontes",
        "routes": [
            "title": "O título dessa rota",
            "type": "GET" | "POST" | "PUT" | "DELETE",
            "body": {
                // Corpo da requisição
            },
            "response": {
                // Resposta da requisição
            }
        ]
    },
    {
        // Outras seções
    }
]
```
| Campos             | Tipo de dados                                  | Exemplo       | Obrigatório |
|--------------------|------------------------------------------------|---------------|-------------|
| title              | String                                         | Usuários      | Sim         |
| icon               | [Google Icons](https://fonts.google.com/icons) | expand_more   | Não         |
| routes             | List                                           | [ ]           | Sim         |
| routes -> title    | String                                         | Criar usuário | Sim         |
| routes -> type     | GET ou POST ou PUT ou DELETE                   | POST          | Sim         |
| routes -> body     | Object                                         | {  }          | Não         |
| routes -> response | Object                                         | {  }          | Não         |

### Descrição dos campos
- **title:** Título da seção na qual terá as rotas
- **icon:** [Ícone do google](https://fonts.google.com/icons) para representar essa seção.
- **routes:** É a lista de rotas da seção
- **routes -> title:** Título do rota
- **routes -> type:** O tipo de requisição HTTP da rota
- **routes -> body:** Corpo da requisição
- **routes -> response:** Resposta da requisição