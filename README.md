# legierski/AES

Perform AES-256 (CBC) encryption/decryption compatible with OpenSSL, CryptoJS, Gibberish AES and possibly other libraries.

Can be used to encrypt data in PHP and decrypt in JavaScript, or vice versa.

Code from here: http://uk3.php.net/manual/en/function.openssl-decrypt.php#107210

## Requirements

- PHP 5.3.3 or later
- OpenSSL extension for PHP

## Installation

In `composer.json`:

``` json
{
    "require": {
        "legierski/aes": "0.1.*"
    }
}
```

## Encrypting data

``` php
$aes = new \Legierski\AES\AES;

$encrypted = $aes->encrypt('Very sensitive data', 'password');

// OpenSSL will truncate rows longer than 76 characters, so let's wrap our encrypted data
$encryptedForOpenSSL = $aes->wrapForOpenSSL($encrypted);
```

## Decrypting data

``` php
$aes = new \Legierski\AES\AES;

$decrypted = $aes->decrypt('U2FsdGVkX1+nnmEfHgoGQpwSPcT+mDZHxhr8XhEsmIvT2JAxsIzsRocO6x1PErrF', 'password');
```

## Encrypting/decrypting with OpenSSL

``` bash
$ echo "Very sensitive data" | openssl enc -aes-256-cbc -a -k password

$ echo "U2FsdGVkX1+nnmEfHgoGQpwSPcT+mDZHxhr8XhEsmIvT2JAxsIzsRocO6x1PErrF" | openssl enc -aes-256-cbc -a -d -k password
```

## Encrypting/decrypting with CryptoJS

``` js
var encrypted = CryptoJS.AES.encrypt('Very sensitive data', 'password').toString();

var decrypted = CryptoJS.AES.decrypt('U2FsdGVkX1+nnmEfHgoGQpwSPcT+mDZHxhr8XhEsmIvT2JAxsIzsRocO6x1PErrF', 'password').toString(CryptoJS.enc.Utf8);
```

## Encrypting/decrypting with Gibberish AES

``` js
var encrypted = GibberishAES.enc('Very sensitive data', 'password');

var decrypted = GibberishAES.dec('U2FsdGVkX1+nnmEfHgoGQpwSPcT+mDZHxhr8XhEsmIvT2JAxsIzsRocO6x1PErrF', 'password');
```

## Testing

Run unit tests:

``` bash
$ ./vendor/bin/phpunit
```

Test compliance with [PSR2 coding style guide](http://www.php-fig.org/psr/psr-2/):

``` bash
$ ./vendor/bin/phpcs --standard=PSR2 ./src
```

## License

The MIT License (MIT)
