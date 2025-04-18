Конечно! Вот пример базового файла `index.php`, который можно использовать в качестве стартовой страницы сайта:

```php
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Главная страница</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Подключение CSS, при необходимости -->
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 20px;
        background-color: #f2f2f2;
    }

    header {
        background-color: #4CAF50;
        color: white;
        padding: 15px;
        text-align: center;
    }

    main {
        margin-top: 20px;
    }

    footer {
        margin-top: 40px;
        text-align: center;
        color: #777;
    }
    </style>
</head>

<body>
    <header>
        <h1>Добро пожаловать на сайт</h1>
    </header>
    <main>
        <p>Это пример базового файла index.php на PHP.</p>
        <?php
            echo "<p>Текущая дата и время: " . date("d.m.Y H:i:s") . "</p>";
        ?>
    </main>
    <footer>
        <p>&copy; <?php echo date("Y"); ?> Мой сайт</p>
    </footer>
</body>

</html>
```

Этот файл создаст простую страницу с заголовком, примером динамического вывода даты и временем, а также футером. Вы
можете дополнить его любым контентом или логикой по мере необходимости.
