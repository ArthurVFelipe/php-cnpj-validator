# AVF CNPJ Validator

Biblioteca PHP para validação, formatação e cálculo de dígitos verificadores de CNPJ.

Suporta:

* ✅ CNPJ numérico tradicional
* ✅ CNPJ alfanumérico
* ✅ Remoção de máscara
* ✅ Formatação de CNPJ
* ✅ Cálculo dos dígitos verificadores (DV)
* ✅ Compatível com PHP 8.2+

---

## Instalação

Instale via Composer:

```bash
composer require avf/cnpj
```

---

## Requisitos

* PHP >= 8.2
* Composer

---

## Uso básico

Após instalar, carregue o autoload do Composer:

```php
require __DIR__ . '/vendor/autoload.php';
```

Importe a classe principal:

```php
use Avf\Cnpj\Cnpj;
```

---

# Validação de CNPJ

## CNPJ válido

```php
$result = Cnpj::isValid(
    '93.015.006/0001-13'
);

var_dump($result);
```

Resultado:

```php
bool(true)
```

---

## CNPJ inválido

```php
$result = Cnpj::isValid(
    '93.015.006/0001-14'
);

var_dump($result);
```

Resultado:

```php
bool(false)
```

---

# CNPJ Alfanumérico

A biblioteca suporta CNPJ contendo caracteres alfanuméricos na composição da base.

Exemplo:

```php
$result = Cnpj::isValid(
    '112223AA000151'
);

var_dump($result);
```

Resultado:

```php
bool(true)
```

---

# Formatação do CNPJ

Transforma um CNPJ sem máscara no formato tradicional:

```php
echo Cnpj::format(
    '93015006000113'
);
```

Resultado:

```
93.015.006/0001-13
```

---

# Remover máscara

Remove pontos, barras e hífen:

```php
echo Cnpj::removeMask(
    '93.015.006/0001-13'
);
```

Resultado:

```
93015006000113
```

---

# Cálculo dos dígitos verificadores

É possível calcular os dois últimos dígitos de um CNPJ.

Exemplo:

```php
echo Cnpj::calculateDv(
    '930150060001'
);
```

Resultado:

```
13
```

Com o resultado, o CNPJ completo fica:

```
93015006000113
```

---

# Estrutura da biblioteca

```
src/
└── Cnpj/
    ├── Cnpj.php
    ├── Validator.php
    ├── Calculator.php
    ├── Converter.php
    └── Formatter.php
```

Responsabilidades:

### Cnpj

Facade pública da biblioteca.

Exemplo:

```php
Cnpj::isValid();
Cnpj::format();
Cnpj::calculateDv();
```

---

### Validator

Responsável por validar o CNPJ informado.

---

### Calculator

Responsável pelo algoritmo de cálculo dos dígitos verificadores.

---

### Converter

Responsável pela conversão de caracteres alfanuméricos:

Exemplo:

```
A = 10
B = 11
Z = 35
```

---

### Formatter

Responsável pela normalização e formatação:

Exemplo:

```
93.015.006/0001-13

↓

93015006000113
```

---

# Testes

A biblioteca utiliza PHPUnit.

Instalar dependências:

```bash
composer install
```

Executar todos os testes:

```bash
composer test
```

ou:

```bash
vendor/bin/phpunit
```

---

## Cobertura de testes

Os testes cobrem:

* Conversão de caracteres
* Formatação
* Remoção de máscara
* Cálculo dos dígitos verificadores
* Validação de CNPJ numérico
* Validação de CNPJ alfanumérico
* Casos inválidos

Exemplo de saída:

```
PHPUnit 11.x

................ 16 / 16

OK (16 tests, 19 assertions)
```

---

# Exemplo completo

```php
<?php

require __DIR__ . '/vendor/autoload.php';

use Avf\Cnpj\Cnpj;

$cnpj = '93.015.006/0001-13';

if (Cnpj::isValid($cnpj)) {
    echo "CNPJ válido";

    echo Cnpj::format(
        Cnpj::removeMask($cnpj)
    );
} else {
    echo "CNPJ inválido";
}
```

---

# Licença

Este projeto está licenciado sob a licença MIT.

Consulte o arquivo `LICENSE` para mais detalhes.

---

# Autor

Arthur Felipe

GitHub:

https://github.com/ArthurVFelipe

---

# Contribuição

Contribuições são bem-vindas.

Para contribuir:

1. Faça um fork do projeto
2. Crie uma branch:

```bash
git checkout -b minha-feature
```

3. Faça suas alterações
4. Execute os testes:

```bash
composer test
```

5. Envie um Pull Request

---

# Repositório

https://github.com/ArthurVFelipe/php-cnpj-validator
