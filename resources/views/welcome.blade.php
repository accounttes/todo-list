<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>ToDo List</title>
        <link rel="stylesheet" href="{{ asset('css/reset.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    </head>
    <body>
        <div class="container">
            <div class="forms">
                <form id="task-form">
                <input
                    type="text"
                    id="task-name"
                    placeholder="Введите название задачи"
                    required
                />
                <button type="submit">Добавить задачу</button>
            </form>

            <form id="task-form">
                <input
                    type="text"
                    id="search-input"
                    placeholder="Поиск по названию задачи"
                />
            </form></div>

            <table id="tasks-table">
                <thead>
                    <tr>
                        <th>Выполнено</th>
                        <th>Название</th>
                        <th>Действия</th>
                    </tr>
                </thead>
                <tbody id="tasks-body"></tbody>
            </table>
        </div>

        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
