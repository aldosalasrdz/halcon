# Halcon

#### Table of Contents

- [Local setup](#local-setup)
- [Run locally](#run-locally)

## Local setup

First, clone the repo and cd into the project:

```bash
git clone https://github.com/aldosalasrdz/halcon.git
cd halcon
```

Install Node dependencies:

```bash
npm install
```

Install Composer dependencies:

```bash
composer install
```

Set the application key

```bash
cp .env.example .env # Linux & macOS
Copy-Item .env.example .env # Windows
php artisan key:generate
```

### Run locally

Serve the application:

```bash
php artisan serve
```

Compile all the CSS and JavaScript assets:

```bash
npm run dev
```

Migrate all the table:

```bash
php artisan migrate
```

Seed the database:

```bash
php artisan db:seed
```
