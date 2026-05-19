{extends file="layouts/layout.tpl"}

{block name="content"}
    <div class="post-page">

        <h1>{$post.title}</h1>

        <div class="meta">
            {$post.created_at}
            |
            Просмотров: {$post.views}
        </div>

        <img
                src="{$baseUrl}/{$post.image}"
                alt="{$post.title}"
                style="width:100%; max-height:500px; object-fit:cover; border-radius:10px;"
        >

        <p>
            {$post.description}
        </p>

        <div>
            {$post.content}
        </div>

        <hr>

        <h3>Категории</h3>

        <ul>

            {foreach $post.categories as $category}
                <li>
                    <a href="{$baseUrl}/category/{$category.id}">
                        {$category.name}
                    </a>
                </li>
            {/foreach}

        </ul>

    </div>
    <h2>Похожие статьи</h2>
    <div class="post-grid">

        {foreach $relatedPosts as $related}
            <div class="post-card">

                <img src="{$baseUrl}/{$related.image}" alt="{$related.title}">

                <h3>
                    <a href="{$baseUrl}/post/{$related.id}">
                        {$related.title}
                    </a>
                </h3>

                <p>
                    {$related.description|truncate:120}
                </p>

            </div>
        {/foreach}

    </div>
{/block}
