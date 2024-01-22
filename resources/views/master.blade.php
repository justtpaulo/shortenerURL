<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Encurtador</title>

        @vite("resources/css/app.css")
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    </head>

    <body class="bg-gray-100">
        <div id="app">
            @yield("content")
        </div>

        @vite("resources/js/app.js")
    </body>
</html>