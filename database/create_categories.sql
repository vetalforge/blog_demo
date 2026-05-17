SET FOREIGN_KEY_CHECKS = 0;

TRUNCATE TABLE categories;

SET FOREIGN_KEY_CHECKS = 1;

INSERT INTO categories (id, name, description, created_at, updated_at)
VALUES
    (
        1,
        'PHP',
        'Articles about PHP language, syntax, and best practices',
        NOW(),
        NOW()
    ),
    (
        2,
        'MySQL',
        'Database design, optimization, and SQL queries',
        NOW(),
        NOW()
    ),
    (
        3,
        'JavaScript',
        'Frontend development and modern JS features',
        NOW(),
        NOW()
    ),
    (
        4,
        'HTML & CSS',
        'Markup and styling techniques for web development',
        NOW(),
        NOW()
    ),
    (
        5,
        'DevOps',
        'Deployment, servers, Docker, and CI/CD practices',
        NOW(),
        NOW()
    ),
    (
        6,
        'Backend',
        'Server-side architecture and API development',
        NOW(),
        NOW()
    );