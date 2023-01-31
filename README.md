# Project Installation for Developers
1. Install Composer from https://getcomposer.org. Verify it's installed by typing `composer --version` in Terminal/Command Prompt
2. Clone this repository `git clone https://campus.cs.le.ac.uk/gitlab/co2201-2023/group-24/`.
3. Open the folder in VSCode or PHPStorm
4. Open terminal in the project root and run the following commands:
- `composer install`
- `copy .env.example .env` (MacOS) <br>OR 
 <br>`cp .env.example .env` (Windows)
- `php artisan key:generate`
- `php artisan serve`
