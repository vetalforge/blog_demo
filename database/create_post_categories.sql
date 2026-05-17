SET FOREIGN_KEY_CHECKS = 0;

TRUNCATE TABLE post_category;

SET FOREIGN_KEY_CHECKS = 1;

INSERT INTO post_category (post_id, category_id)
VALUES
-- Post 1: PHP basics
(1, 1),
(1, 6),

-- Post 2: MySQL indexes
(2, 2),
(2, 6),

-- Post 3: JavaScript ES6+
(3, 3),

-- Post 4: HTML & CSS
(4, 4),

-- Post 5: Docker basics
(5, 5),
(5, 6),

-- Post 6: Backend architecture
(6, 6),

-- Post 7: Advanced PHP
(7, 1),
(7, 6),

-- Post 8: Async JS
(8, 3);