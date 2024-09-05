# Example: Symfony

An example [Symfony](https://symfony.com/) project showing best practices in [ITK Development](https://github.com/itk-dev/) projects.

## Development

``` shell name=development-install
# Create frontend network if it does not exists.
docker network inspect frontend 2>&1 > /dev/null || docker network create frontend
docker compose run --rm phpfpm composer install
```

### Coding standards

``` shell name=coding-standards-composer
docker compose run --rm phpfpm composer normalize
```
