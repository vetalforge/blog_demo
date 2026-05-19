## Blog demonstration

A small PHP blog project that demonstrates the basic mechanics of a blog:
routing, controllers, models, templates, categories, posts, and database seed
data. It can be used as a simple foundation for learning MVC-style PHP projects
or building a small content-driven website.

## Installation

### Docker

Requirements:

- Docker
- Docker Compose

Start the project:

```bash
docker compose up --build
```

Open the app at http://localhost:8080.

MySQL is available from the host at `localhost:3307`.

Database credentials:

- Database: `blog_demo`
- User: `blog_user`
- Password: `blog_password`
- Root password: `root_password`

The database schema and seed data are loaded automatically when the `db_data`
volume is created for the first time. To recreate the database from scratch:

```bash
docker compose down -v
docker compose up --build
```

### Local Installation

Requirements:

- PHP 8.2 or higher
- Composer
- MySQL 8.0 or compatible
- Apache with `mod_rewrite` enabled, or another web server pointed to `public`
- PHP PDO MySQL extension

Install dependencies:

```bash
composer install
```

Create a MySQL database named `blog_demo`.

Update database settings in `config/app.php` if your local credentials differ
from the defaults:

```php
define('DB_HOST', env_value('DB_HOST', 'localhost'));
define('DB_USER', env_value('DB_USER', 'root'));
define('DB_PASS', env_value('DB_PASS', ''));
define('DB_NAME', env_value('DB_NAME', 'blog_demo'));
```

Load the database schema and seed data:

```bash
php database/seeder.php
```

Configure your web server document root to the `public` directory.

For an Apache setup inside a subdirectory like `/blog_demo`, keep the default
domain settings in `config/app.php`. For a virtual host pointed directly to
`public`, set:

```php
define('DOMAIN_SYM', true);
define('DOMAIN_ADDITION', '');
```
