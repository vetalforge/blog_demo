<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>
        {$pageTitle} - {$siteName}
    </title>

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            background: #ffffff;
            color: #38424a;
            font-size: 14px;
            line-height: 1.6;
        }

        .container {
            width: 1010px;
            max-width: calc(100% - 48px);
            margin: 0 auto;
            padding: 0;
        }

        header {
            background: #27596a;
            color: white;
            padding: 15px 0;
            margin-bottom: 30px;
        }

        header a {
            color: white;
            text-decoration: none;
        }

        header .container {
            height: 38px;
            display: flex;
            align-items: center;
        }

        header h1 {
            margin: 0;
            font-size: 24px;
            font-weight: 700;
            letter-spacing: 0;
        }

        main.container {
            min-height: calc(100vh - 220px);
        }

        .category-block,
        .post-page {
            background: #ffffff;
            margin-bottom: 50px;
        }

        .category-header {
            display: flex;
            justify-content: space-between;
            align-items: baseline;
            gap: 24px;
            margin-bottom: 15px;
        }

        .category-header h2,
        .category-block h1 {
            margin: 0;
            color: #1f2f38;
            font-size: 14px;
            font-weight: 700;
            letter-spacing: 0.06em;
            text-transform: uppercase;
        }

        .category-description {
            max-width: 620px;
            margin: -8px 0 15px;
            color: #7b8790;
            font-size: 13px;
        }

        .post-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 22px;
            align-items: start;
        }

        .post-card {
            min-width: 0;
        }

        .post-card img {
            width: 100%;
            aspect-ratio: 1.58 / 1;
            height: auto;
            object-fit: cover;
            border-radius: 5px;
            display: block;
            margin-bottom: 10px;
        }

        .post-card h3 {
            margin: 0 0 7px;
            color: #3f4d56;
            font-size: 13px;
            font-weight: 700;
            line-height: 1.4;
        }

        .post-card h3 a {
            color: inherit;
            text-decoration: none;
        }

        .post-card p {
            margin: 0 0 7px;
            color: #7c8790;
            font-size: 12px;
            line-height: 1.55;
        }

        .btn {
            color: #27596a;
            text-decoration: none;
            border-bottom: 1px solid currentColor;
            font-size: 12px;
            font-weight: 700;
            line-height: 1.2;
        }

        .meta {
            color: #9aa4aa;
            font-size: 11px;
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
            margin-top: 70px;
            padding: 20px 0;
            text-align: center;
            background: #27596a;
            color: white;
            font-size: 11px;
            font-weight: 700;
        }

        @media (max-width: 760px) {
            .container {
                max-width: calc(100% - 32px);
            }

            header {
                margin-bottom: 32px;
            }

            .category-block,
            .post-page {
                margin-bottom: 58px;
            }

            .post-grid {
                grid-template-columns: 1fr;
                gap: 28px;
            }
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
