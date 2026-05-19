Blog sample

## Docker

Start the project:

```bash
docker compose up --build
```

Open the app at http://localhost:8080.

MySQL is available on `localhost:3307`.

Credentials:

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
