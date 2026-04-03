# CPX Seeders

Description:
Forget about db:seed that duplicate records or the fear of running seeders in production. This module adds a tracking layer to your seeders; if it has already been executed, it will not be run again. It is the version control that your initial data needed.

The module is based on the laravel migrations structure to make it simple to understand.

## List of commands:
```bash
php artisan make:cpx-seeder {ModelName}
```
```bash
php artisan cpx-seed
```
```bash
php artisan cpx-seed:status
```
```bash
php artisan cpx-migrate --seed
```
```bash
php artisan cpx-migrate:fresh --seed
```
```bash
php artisan cpx-migrate:status
```

### Command Mapping (The Laravel Way)
#### Seeders-only commands:
Similarities in operation with laravel migrations:
| CPX Seeders | Laravel Migrations |
|-------------|----------------------|
| ```php artisan make:cpx-seeder {ModelName}``` | ```php artisan make:migration {name}``` |
| ```php artisan cpx-seed``` | ```php artisan migrate``` |
| ```php artisan cpx-seed:status``` | ```php artisan migrate:status``` |

#### Laravel Migrations + CPX Seeders:
These commands run laravel migrations and cpx-seeders in one command.
| CPX migrations | CPX Seeders + Laravel Migrations |
|-------------|----------------------|
| ```php artisan cpx-migrate --seed``` | ```php artisan migrate && php artisan cpx-seed``` |
| ```php artisan cpx-migrate:fresh --seed``` | ```php artisan migrate:fresh && php artisan cpx-seed``` |
| ```php artisan cpx-migrate:status``` | ```php artisan migrate:status && php artisan cpx-seed:status``` |

## Usage
1. Install this library.
```bash
composer require cpxproject/seeders
```
2. Run migrations to create the table that registers the seeders in the database.
```bash
php artisan migrate
```
3. Now you can start creating your seeders files. CPXseeders are created at **database/cpx_seeders** directory.
```bash
php artisan make:cpx-seeder User
```
4. After you filled your seeders files, execute the command. This command only runs the seeders that have not been executed.
```bash
php artisan cpx-seed
```

## Example
Path: **database/cpx_seeders/YYYY_MM_DD_HHMMSS_user_seeder.php**
```php
<?php

namespace Database\CpxSeeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        \App\Models\User::create([
            'name' => 'John Doe',
            'email' => [EMAIL_ADDRESS]',
            'password' => bcrypt('password'),
        ]);
    }
}
```

### Note:
If you want to have multiple seeders for the same table, you cannot use the same seeder name. You must use a different name for each seeder.
Example:
- For the first time `User`.
- For the second time `AddUserSeller`.
- For the third time `AddUserAdmin`.