{extends file="layouts/layout.tpl"}

{block name="content"}
    <div class="category-block">

        <h1>{$category.name}</h1>

        <p>{$category.description}</p>

        <hr>

        <form method="GET">

            <label>
                Сортировка:
            </label>

            <select name="sort" onchange="this.form.submit()">

                <option value="date"
                        {if $sort == 'date'}selected{/if}>
                    По дате
                </option>

                <option value="views"
                        {if $sort == 'views'}selected{/if}>
                    По просмотрам
                </option>

            </select>

        </form>

    </div>
    <div class="post-grid">

        {foreach $posts as $post}
            <div class="post-card">

                <img src="{$baseUrl}/{$post.image}" alt="{$post.title}">

                <h3>
                    <a href="{$baseUrl}/post/{$post.id}">
                        {$post.title}
                    </a>
                </h3>

                <div class="meta">
                    {$post.created_at}
                    |
                    Просмотров: {$post.views}
                </div>

                <p>
                    {$post.description|truncate:150}
                </p>

            </div>
        {/foreach}

    </div>
    <div class="pagination">

        {if $pagination.prev}
            <a href="?page={$pagination.prev}&sort={$sort}">
                ← Назад
            </a>
        {/if}

        <span>
        Страница {$pagination.current}
    </span>

        {if $pagination.next}
            <a href="?page={$pagination.next}&sort={$sort}">
                Вперёд →
            </a>
        {/if}

    </div>
{/block}
