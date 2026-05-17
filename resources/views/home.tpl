{extends file="layouts/layout.tpl"}

{block name="content"}
    <h2>Главная страница</h2>
    {foreach $categories as $category}
        <div class="category-block">

            <h2>{$category.name}</h2>

            <p>{$category.description}</p>

            <div class="post-grid">

                {foreach $category.posts as $post}
                    <div class="post-card">

                        <img src="{$post.image}" alt="{$post.title}">

                        <h3>
                            <a href="/post/{$post.id}">
                                {$post.title}
                            </a>
                        </h3>

                        <div class="meta">
                            Просмотров: {$post.views}
                        </div>

                        <p>
                            {$post.description|truncate:120}
                        </p>

                    </div>
                {/foreach}

            </div>

            <a class="btn" href="/category/{$category.id}">
                Все статьи
            </a>

        </div>
    {/foreach}

{/block}