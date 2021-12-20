# Kasmee

![Kasmee](public/assets/img/logo-with-text.svg)

## What is Kasmee?

Kasmee is an Android-based cash book recording application that is useful for UMKM players to record finances.

This repository contains the back-end source code of the Kasmee application built using Laravel 8 framework.

This application uses a front-end built using the Kotlin.
You can see the front-end source code [here](https://github.com/AndreSuryana/capstone-project-dicoding).

## Pre-requisites

-   Visual Studio Code or the code editor you have.
-   Composer.
-   XAMPP.

## Getting Started

1. Clone the source locally

    ```sh
    $ git clone https://github.com/iwrrr/kas-mee
    $ cd kas-mee
    ```

2. Download the `.env` file [here](https://drive.google.com/uc?export=download&id=12kd_-puk0747PO5RLsAuQ2AJIbY6WYu7).
3. Download the starter database [here](https://drive.google.com/uc?export=download&id=10AIeZ9eWGLayEm3pHgEh7RFtlWng5wHw).
4. Create a database with the name kas-mee on your web server.
5. Import the database that you have downloaded into the database that you have created.
6. Move file `.env` to the project root.
7. Run this command in terminal/bash:
    ```sh
    $ rm composer.lock
    $ rm -rf vendor
    $ composer install --ignore-platform-reqs
    $ php artisan key:generate
    ```
8. Run this command in terminal/bash to run the App:
    ```sh
    $ php artisan serve
    ```

You can login to the App using this account

Email: `admin@kasmee.com`

Password: `password`

## Contributing

Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

## Credits

-   [Laravel](https://github.com/laravel/framework)
-   [Template Admin Stisla](https://github.com/stisla/stisla)
-   [Response Formatter](https://github.com/belajarkoding/laravel-response-formatter)

## License

[MIT](https://choosealicense.com/licenses/mit/)
