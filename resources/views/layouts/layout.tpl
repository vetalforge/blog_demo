<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>
        {$pageTitle} - {$siteName}
    </title>
    <link rel="stylesheet" href="{$baseUrl}/assets/css/app.css">
</head>
<body>

<header>
    <div class="container">
        <h1>
            <a href="{$baseUrl}/">
                {$siteName}
            </a>
        </h1>
    </div>
</header>

<main class="container">
    {block name="content"}{/block}
</main>

<footer>
    <div class="container">
        © {$smarty.now|date_format:"%Y"} {$siteName}
    </div>
</footer>

</body>
</html>
