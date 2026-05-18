<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>
        {$pageTitle} - {$siteName}
    </title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background: #f5f5f5;
            color: #222;
        }

        .container {
            width: 1100px;
            margin: 0 auto;
            padding: 20px;
        }

        header {
            background: #222;
            color: white;
            padding: 0;
            margin-bottom: 30px;
        }

        header a {
            color: white;
            text-decoration: none;
        }

        .category-block,
        .post-card,
        .post-page {
            background: white;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
        }

        .post-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .post-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 8px;
        }

        .btn {
            display: inline-block;
            padding: 10px 16px;
            background: #222;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            margin-top: 10px;
        }

        .meta {
            color: #777;
            font-size: 14px;
            margin-bottom: 10px;
        }

        .pagination {
            margin-top: 30px;
        }

        .pagination a {
            margin-right: 10px;
            text-decoration: none;
        }

        footer {
            margin-top: 40px;
            padding: 20px 0;
            text-align: center;
            background: #222;
            color: #777;
        }
    </style>
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
