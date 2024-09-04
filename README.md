# Example: Symfony

An example [Symfony](https://symfony.com/) project showing best practices in [ITK Development](https://github.com/itk-dev/) projects.

## Development

@todo

### Coding standards

``` shell name=coding-standards-composer
docker compose run --rm phpfpm composer install
docker compose run --rm phpfpm composer normalize
```

``` shell name=coding-standards-php
docker compose run --rm phpfpm composer install
docker compose run --rm phpfpm composer coding-standards-apply/phpcs
docker compose run --rm phpfpm composer coding-standards-check/phpcs
```

``` shell name=coding-standards-twig
docker compose run --rm phpfpm composer install
docker compose run --rm phpfpm composer coding-standards-apply/twig-cs-fixer
docker compose run --rm phpfpm composer coding-standards-check/twig-cs-fixer
```

``` shell name=coding-standards-markdown
docker run --platform linux/amd64 --rm --volume "$PWD:/md" peterdavehello/markdownlint markdownlint $(git ls-files *.md) --fix
docker run --platform linux/amd64 --rm --volume "$PWD:/md" peterdavehello/markdownlint markdownlint $(git ls-files *.md)
```

```shell name="coding-standards-assets"
docker compose run --rm node yarn install
docker compose run --rm node yarn coding-standards-apply
docker compose run --rm node yarn coding-standards-check
