# ShortenerURL

## Descrição
ShortenerURL é um projeto construído com Laravel, Vue e TailwindCSS para encurtar URLs de forma simples e eficiente.

## Instalação e Configuração

### Requisitos
Certifique-se de ter o [Composer](https://getcomposer.org/), [Node.js](https://nodejs.org/) e [npm](https://www.npmjs.com/) instalados em seu sistema.

### Passos de Instalação

1. Clone o repositório para o seu ambiente local:

```bash
git clone https://github.com/justtpaulo/ShortenerURL.git
```

2. Navegue até o diretório do projeto:

```bash
cd ShortenerURL
```

3. Instale as dependências do Composer e do NPM:

```bash
composer install
npm install
```

4. Execute as migrações do banco de dados (MYSQL):

```bash
php artisan migrate
```

5. Inicie o servidor de desenvolvimento Laravel e Vite:

```bash
php artisan serve
npm run dev
```

## Uso

### API
Para encurtar uma URL, faça uma requisição POST para /shorten com o seguinte corpo:

```json
{
    "url": "sua_url_aqui"
}
```

### Web
Acesse a aplicação pelo navegador e utilize o formulário na página inicial para encurtar URLs.

## Rotas

### API
POST /shorten: Encurta uma URL.

### Web
GET /: Página inicial com formulário para encurtar URLs.
GET /{code}: Redireciona para a URL original com base no código gerado.

## Tecnologias Utilizadas
Laravel
Vue
TailwindCSS
Axios
Vite
