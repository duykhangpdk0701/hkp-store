## Getting started

### Prerequisites

-   PHP 7.3|8.0
-   Latest [Node.js](https://nodejs.org) version
-   Docker
-   Composer v2

### Installing

#### Manual

```bash
# Clone the project and run composer
git clone git clone git@github.com:pop0212/hkp-v1.git
cd hkp-v1

# Install the composer packages
composer install

# Copy the .env.example file to .env
cp .env.example .env

# Remember to setup your DB settings in .env
# Migration and DB seeder (after changing your DB settings in .env)
php artisan migrate --seed
```

#### With Docker

```bash
# Clone the project and run composer
git clone https://github.com/pop0212/hkp-v1.git
cd hkp-v1

# We need to copy the .env.example file to .env first (!!important)
cp .env.example .env

# Run the docker services
docker-compose up -d
```

Install Composer Packages

-   Executing into bash

```sh
# Execute into workspace bash
docker-compose exec workspace bash

# Run the artisan or npm commands here
/var/www~ composer install

```

-   Or you can execute commands without going into bash

```sh
# Get laravel docker container ID from containers list
docker ps

# Where <container ID> is the "workspace" container id, ex: c3ecb5baef0b
docker exec -it <container ID> composer install # or npm run watch

```

### Final steps

Add **hkp-v1.local** to your **hosts** file.

Go to [hkp-v1.local](http://hkp-v1.local) to access the website.

## Running the tests

-   Tests system is under development

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Authors

-   **Kobu** - _Initial Work_

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE) file for details.
