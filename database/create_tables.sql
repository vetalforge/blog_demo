SET FOREIGN_KEY_CHECKS = 0;

DROP TABLE IF EXISTS post_category;
DROP TABLE IF EXISTS posts;
DROP TABLE IF EXISTS categories;
DROP TABLE IF EXISTS users;

SET FOREIGN_KEY_CHECKS = 1;

CREATE TABLE users (
   id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
   name VARCHAR(100) NOT NULL,
   email VARCHAR(150) NOT NULL UNIQUE,
   password VARCHAR(255) NOT NULL,
   created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
   updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE categories (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(150) NOT NULL,
    description TEXT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE posts (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT UNSIGNED NOT NULL,
    title VARCHAR(255) NOT NULL,
    short_description VARCHAR(500) NULL,
    content LONGTEXT NOT NULL,
    image VARCHAR(255) NULL,
    views_count INT UNSIGNED DEFAULT 0,
    published_at DATETIME NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    CONSTRAINT fk_posts_user
       FOREIGN KEY (user_id) REFERENCES users(id)
           ON DELETE CASCADE
);

CREATE TABLE post_category (
    post_id BIGINT  UNSIGNED NOT NULL,
    category_id BIGINT UNSIGNED NOT NULL,
    PRIMARY KEY (post_id, category_id),
    CONSTRAINT fk_pc_post
       FOREIGN KEY (post_id) REFERENCES posts(id)
           ON DELETE CASCADE,
    CONSTRAINT fk_pc_category
       FOREIGN KEY (category_id) REFERENCES categories(id)
           ON DELETE CASCADE
);

-- =====================
-- Indexes
-- =====================
CREATE INDEX idx_posts_published_at ON posts (published_at);
CREATE INDEX idx_posts_views_count ON posts (views_count);
CREATE INDEX idx_posts_user_id ON posts (user_id);
CREATE INDEX idx_post_category_category_id ON post_category (category_id);