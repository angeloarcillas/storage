# PHP 
  - PHP (personal homepage) Hypertext preprocessor
  - Zend engine 3

<details>
<summary>Generate hashed password</summary>

```php
$hashed = password_hash($password,PASSWORD_DEFAULT);
while(password_needs_rehash($hashed,PASSWORD_DEFAULT))
{
  password_hash($password,PASSWORD_DEFAULT);
  continue;
}
```
</details>
<details>
<summary>Detect header injection</summary>

```php
$pattern = "(content-type|bcc:|cc:|to:)";
  foreach ( $_POST as $value ) {
  if ( preg_match( "/{$pattern}/i", $value ) ) {
      // detected
    }
  }
```
</details>
<details>
<summary>Functions</summary>

```php
// Set default timezone
date_default_timezone_set("Asia/Manila");
</details>
```
```php
```