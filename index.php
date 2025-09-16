<?php
// Установка заголовков для предотвращения кеширования (для разработки)
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Форум сообщества</title>
    <link rel="icon" href="/icons/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="style/style.css">
    <script src="https://cdn.jsdelivr.net/npm/htmx.org@2.0.7/dist/htmx.min.js"></script>
    <script async data-id="five-server" src="http://localhost:5500/fiveserver.js"></script>
</head>
<body>
    <div class="container">
        <!-- Динамическая загрузка header через HTMX -->
        <header hx-get="/component/header" hx-trigger="load" hx-target="this"></header>
        
        <main class="main-content">
            <div class="forum-header">
                <h1>Форум сообщества</h1>
                <button class="btn btn-primary" hx-get="/component/add-thread-form" hx-target="#thread-form-container">
                    Новая тема
                </button>
            </div>
            
            <div id="thread-form-container"></div>
            
            <!-- Список тем форума -->
            <div class="threads-container">
                <h2>Последние темы</h2>
                <div hx-get="/component/thread-list" hx-trigger="load" hx-target="this">
                    <div class="loading">Загрузка...</div>
                </div>
            </div>
        </main>
        
        <!-- Динамическая загрузка footer через HTMX -->
        <footer hx-get="/component/footer" hx-trigger="load" hx-target="this"></footer>
    </div>
</body>
</html>