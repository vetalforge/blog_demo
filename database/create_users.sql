SET FOREIGN_KEY_CHECKS = 0;

TRUNCATE TABLE users;

SET FOREIGN_KEY_CHECKS = 1;

INSERT INTO users (id, name, email, password, created_at, updated_at)
VALUES
(
    1,
    'Admin User',
    'admin@example.com',
    '$2y$10uQJ9x7cGx0examplehashvalueaaaaaaa',
    NOW(),
    NOW()
),
(
    2,
    'John Doe',
    'john@example.com',
    '$2y$10uQJ9x7cGx0examplehashvaluebbbbbbb',
    NOW(),
    NOW()
),
(
    3,
    'Jane Smith',
    'jane@example.com',
    '$2y$10uQJ9x7cGx0examplehashvalueccccccc',
    NOW(),
    NOW()
),
(
    4,
    'Alex Brown',
    'alex@example.com',
    '$2y$10uQJ9x7cGx0examplehashvalueddddddd',
    NOW(),
    NOW()
),
(
    5,
    'Michael White',
    'michael@example.com',
    '$2y$10uQJ9x7cGx0examplehashvalueeeeeeee',
    NOW(),
    NOW()
);