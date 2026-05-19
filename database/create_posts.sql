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
        'https://upload.wikimedia.org/wikipedia/commons/thumb/3/31/Webysther_20160423_-_Elephpant.svg/1280px-Webysther_20160423_-_Elephpant.svg.png',
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
        'https://www.databasestar.com/sql-indexes/images/wide2-1024x482.png',
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
        'https://images.squarespace-cdn.com/content/v1/5489b1f6e4b0c7fbb9e64fcb/1613864448710-UNAAJ9Q3OVX6PIUMXDWC/ecmas6_2.png',
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
        'https://doprof.ru/upload/medialibrary/9dc/htmlandcss.jpg',
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
        'https://bunnyacademy.b-cdn.net/what-is-docker.png',
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
        'https://kvadrat.az/uploads/articles/674b66d290fcd.jpg',
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
        'https://laravelnews.s3.amazonaws.com/images/phplogo-1617378886.jpg',
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
        'https://ik.imagekit.io/ably/ghost/prod/2021/12/ably-js-async-await@2x.png',
        520,
        '2026-05-08 10:05:00',
        NOW(),
        NOW()
    );