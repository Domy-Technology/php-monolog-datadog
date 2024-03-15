# php-monolog-datadog

## Requirements

- Composer
- PHP Server

## Reference

- https://betterstack.com/community/guides/logging/how-to-start-logging-with-monolog/#using-a-structured-log-format-json

## Adicionando logs

```php
// Basta chamar o método abaixo:

$logger->info("Alguma informação");

// Se precisar adicionar dados de contexto, basta usar o exemplo abaixo:

$logger->info("Alguma informação", ["userId" => 1234, "role" => "administrator"]);

```