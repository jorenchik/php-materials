# My php materials

## Snippets

### Template rendering 

How you could render templates with prepared variables is shown within a [request
util class](./src/Utils/Request.php).

### Simple uouting system

But for the routes there is the handler in the same
[util class](./src/Utils/Request.php) that matches specified routes in an
[associated array](./src/web.php).


### Autoload

Example of how to setup [autoload setup file](./autoload/autoload.php). 

## External materials

### File handling

#### File system functions

Php offers many [file system
functions](https://www.php.net/manual/en/ref.filesystem.php) option which are
close to GNU utils by their names.

#### Form file handling

Examples with explanation in regards to file [uploading and
handling](https://www.w3schools.com/php/php_file_upload.asp).

#### Serving files

The file access options are modified with [content-disposition
  header](https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Disposition).
That is file can be viewed, downloaded etc.

An [example](./files/servingafile.php) shows how to set this header.

### Database

#### Prepared statements

Mysqli offers [parameter
binding](https://www.php.net/manual/en/mysqli.quickstart.prepared-statements.php)
which is a must for avoiding SQL injections.

#### Transactions

To make a dry run you can either:

- The same query but as a SELECT;
- Use
  [transations](https://stackoverflow.com/questions/12091971/how-to-start-and-end-transaction-in-mysqli).

With this sequence, made changes would not be made in database, even though rows
would be shown as affected:

```php
$mysqli->rollback();
$mysqli->commit();
$stmt->close();
```


#### MariaDB cheatcheet

[Cheatsheet](https://mariadb.com/wp-content/uploads/2021/08/mariadb-standard-developer_cheat-sheet_1113.pdf)
from the official mariadb website.

Also, [SQL cheatsheet](https://www.sqltutorial.org/sql-cheat-sheet/) from SQL
turorial could come in handy.

### Session

Session usage is neatly explained in this [stackoverflow
question](https://stackoverflow.com/questions/2499651/php-login-store-session-variables).

### Time

One good approach of time handling is to use UTC initially and then adjust
it to a relevant timezone if needed. 

This [example](./time/timezone.php) shows how this can be accomplished.

### Popular php functions

The [100 top-most used
functions](https://www.exakat.io/en/the-100-php-functions-in-2022/) in php by
exakat.

### Algorithms

[Most useful
algorithms](https://medium.com/techie-delight/top-25-algorithms-every-programmer-should-know-373246b4881b)
that could be useful.

## Setup

### Making VSCode into vim (:

- Istall & enable vim mode extension, e.g., VSCode neovim.
- Set relative line numbers:
    - Settings (CTRL+comma) > Line Numbers > Change from "On" to
      "relative".
