SET FOREIGN_KEY_CHECKS = 0;

TRUNCATE TABLE posts;

SET FOREIGN_KEY_CHECKS = 1;

INSERT INTO posts (
    id,
    user_id,
    title,
    short_description,
    content,
    image,
    views_count,
    published_at,
    created_at,
    updated_at
)
VALUES
    (
        1,
        1,
        'Getting Started with PHP',
        'Basic introduction to PHP syntax and concepts',
        'This is a full article about PHP basics...',
        'images/php1.jpg',
        120,
        '2026-05-01 10:00:00',
        NOW(),
        NOW()
    ),
    (
        2,
        2,
        'Understanding MySQL Indexes',
        'How indexes improve database performance',
        'This article explains how indexes work in MySQL...',
        'images/mysql1.jpg',
        560,
        '2026-05-02 12:30:00',
        NOW(),
        NOW()
    ),
    (
        3,
        1,
        'Modern JavaScript Features (ES6+)',
        'Overview of modern JavaScript improvements',
        'This article covers ES6+ features like arrow functions, promises...',
        'images/js1.jpg',
        340,
        '2026-05-03 09:15:00',
        NOW(),
        NOW()
    ),
    (
        4,
        3,
        'HTML & CSS Basics',
        'Learn how to structure and style web pages',
        'This article explains HTML structure and CSS styling basics...',
        'images/html_css1.jpg',
        210,
        '2026-05-04 16:45:00',
        NOW(),
        NOW()
    ),
    (
        5,
        2,
        'Docker for Beginners',
        'Introduction to containerization with Docker',
        'This article explains what Docker is and how to use it...',
        'images/docker1.jpg',
        95,
        '2026-05-05 18:00:00',
        NOW(),
        NOW()
    ),
    (
        6,
        4,
        'Backend Architecture Basics',
        'How modern backend systems are structured',
        'This article covers layers, services, and API design...',
        'images/backend1.jpg',
        410,
        '2026-05-06 11:20:00',
        NOW(),
        NOW()
    ),
    (
        7,
        1,
        'Advanced PHP Tips',
        'Improve your PHP code quality and structure',
        'This article includes advanced PHP patterns and tips...',
        'images/php2.jpg',
        670,
        '2026-05-07 14:10:00',
        NOW(),
        NOW()
    ),
    (
        8,
        3,
        'JavaScript Async/Await Deep Dive',
        'Understanding asynchronous JS execution',
        'This article explains async/await and promises in depth...',
        'images/js2.jpg',
        520,
        '2026-05-08 10:05:00',
        NOW(),
        NOW()
    );