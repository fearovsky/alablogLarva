# Laravel Blog API

A Laravel API project with blog functionality.

## Requirements

-   PHP >= 8.1
-   Composer
-   MySQL
-   Laravel 9.x

## Installation

1. Clone the repository

2. Install dependencies

```bash
composer install
```

3. Set up environment file

```bash
cp .env.example .env
```

4. Configure your database in `.env`

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

5. Generate application key and run migrations

```bash
php artisan key:generate
php artisan migrate
```

## API Endpoints

### Authentication

```
Because of the simplicity of the project, authentication is not implemented.
```

### Articles

#### List Articles

```http
GET /api/v1/blog/articles
```

#### Get Single Article

```http
GET /api/v1/blog/articles/{id}
```

#### Create Article

```http
POST /api/v1/blog/articles
{
    "title": "Article Title",
    "content": "Article content",
}
```

#### Update Article

```http
PUT /api/v1/blog/articles/{id}
{
    "title": "Updated Title",
    "content": "Updated content"
}
```

#### Delete Article

```http
DELETE /api/v1/blog/articles/{id}
```

## License

MIT License
