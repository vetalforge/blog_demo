{extends file="layouts/layout.tpl"}

{block name="content"}
    {foreach $categories as $category}
        <section class="category-block">

            <div class="category-header">
                <h2>{$category.name}</h2>

                <a class="btn" href="{$baseUrl}/category/{$category.id}">
                    View All
                </a>
            </div>

            {if $category.description}
                <p class="category-description">{$category.description}</p>
            {/if}

            <div class="post-grid">

                {foreach $category.posts as $post}
                    <article class="post-card">

                        <img src="{$baseUrl}/{$post.image}" alt="{$post.title}">

                        <h3>
                            <a href="{$baseUrl}/post/{$post.id}">
                                {$post.title}
                            </a>
                        </h3>

                        <div class="meta">
                            {$post.published_at|date_format:"%B %e, %Y"}
                        </div>

                        <p>
                            {$post.description|truncate:120}
                        </p>

                        <a class="btn" href="{$baseUrl}/post/{$post.id}">
                            Continue Reading
                        </a>

                    </article>
                {/foreach}

            </div>

        </section>
    {/foreach}

{/block}
