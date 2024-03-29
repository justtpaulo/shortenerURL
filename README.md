# ShortenerURL

## Descrição
- ShortenerURL é um projeto construído com Laravel, Vue e TailwindCSS para encurtar URLs de forma simples e eficiente.

## Instalação e Configuração

### Requisitos
- Certifique-se de ter o [Composer](https://getcomposer.org/), [Node.js](https://nodejs.org/), [npm](https://www.npmjs.com/) e [MySQL](https://dev.mysql.com/downloads/) instalados em seu sistema.

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

4. Certifique-se de que as credenciais do seu banco de dados MySQL esteja configurado corretamente no arquivo `.env`:

```bash
DB_CONNECTION=mysql
DB_HOST=seu_host_aqui
DB_PORT=3306
DB_DATABASE=shortener
DB_USERNAME=seu_usuario_aqui
DB_PASSWORD=sua_senha_aqui
```

5. Execute as migrações do banco de dados MySQL:

```bash
php artisan migrate
```

6. Inicie o servidor de desenvolvimento Laravel e Vite:

```bash
php artisan serve
npm run dev
```

## Maneiras de Uso

### API
- Para encurtar uma URL, faça uma requisição POST para `api/shorten` com o seguinte corpo:

```json
{
    "url": "sua_url_aqui"
}
```

### Web
- Acesse a aplicação pelo navegador e utilize o formulário na página inicial para encurtar URLs.

## Rotas

### API
- `POST api/shorten`: Encurta uma URL.

### Web
- `GET /`: Página inicial com formulário para encurtar URLs.
- `GET /{code}`: Redireciona para a URL original com base no código gerado.

## Licença

Este projeto está licenciado sob a [MIT License](https://opensource.org/licenses/MIT).

## Tecnologias Utilizadas

- [Laravel Documentation](https://laravel.com/docs/10.x/readme)
- [Vue Documentation](https://vuejs.org/guide/introduction.html)
- [TailwindCSS Documentation](https://tailwindcss.com/docs/installation)
- [Axios Documentation](https://axios-http.com/docs/intro)
- [Vite Documentation](https://vitejs.dev/guide/)

## Contato

Em caso de dúvidas ou sugestões, sinta-se à vontade para entrar em contato:

E-mail: dev.pjose@gmail.com
