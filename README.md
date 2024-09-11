# Example: Symfony

An example [Symfony](https://symfony.com/) project showing best practices in [ITK
Development](https://github.com/itk-dev/) projects.

## Development

``` shell name=development-install
# Create frontend network if it does not exists.
docker network inspect frontend 2>&1 > /dev/null || docker network create frontend
docker compose pull
docker compose up --detach
docker compose exec phpfpm composer install
docker compose exec phpfpm bin/console doctrine:migrations:migrate --no-interaction
```

### Coding standards

``` shell name=coding-standards-composer
docker compose exec phpfpm composer install
docker compose exec phpfpm composer normalize
docker compose exec phpfpm composer validate
```

``` shell name=coding-standards-markdown
docker run --platform linux/amd64 --rm --volume "$PWD:/md" peterdavehello/markdownlint markdownlint --ignore LICENSE.md --ignore vendor/ '**/*.md' --fix
docker run --platform linux/amd64 --rm --volume "$PWD:/md" peterdavehello/markdownlint markdownlint --ignore LICENSE.md --ignore vendor/ '**/*.md'
```

``` shell name=coding-standards-php
docker compose exec phpfpm composer install
docker compose exec phpfpm composer coding-standards-apply/php-cs-fixer
docker compose exec phpfpm composer coding-standards-check/php-cs-fixer
```

``` shell name=coding-standards-twig
docker compose exec phpfpm composer install
docker compose exec phpfpm composer coding-standards-apply/twig-cs-fixer
docker compose exec phpfpm composer coding-standards-check/twig-cs-fixer
```

``` shell name=code-analysis-php
docker compose exec phpfpm composer install
docker compose exec phpfpm composer code-analysis
```
