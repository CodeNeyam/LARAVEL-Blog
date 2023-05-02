# Laravel Blogging Application

A simple blogging application built with Laravel, which allows users to register, create, read, update, and delete blog posts, as well as comment on them.

## Features

- User registration and authentication.
- Create, read, update, and delete blog posts.
- Comment on blog posts.
- View a list of all blog posts in the system.
- Search for blog posts by keyword.
- Pagination of blog posts.
- Responsive design using Bootstrap.

## Technologies Used

- Laravel
- MySQL
- Bootstrap
- jQuery
- Font Awesome

## Installation

1. Clone this repository.
2. Navigate to the repository directory in the terminal.
3. Run composer install to install dependencies.
4. Copy .env.example file to .env and update the database connection details.
5. Run php artisan key:generate to generate the application key.
6. Run php artisan migrate to run database migrations.
7. Run php artisan serve to start the development server.

## Usage

1. Navigate to http://localhost:8000 in a web browser to view the home page.
2. Click the Register link to register as a new user.
3. Once registered, log in using your email and password.
4. Click the Create Post button to create a new blog post.
5. Click the Edit button next to a post to update its details.
6. Click the Delete button next to a post to remove it from the system.
7. Click the View button to read a post and view its comments.
8. Use the search bar to search for posts by keyword.
9. Use the pagination links to navigate through the list of posts.

## Contributing

Contributions to the Laravel Blogging Application are welcome! Please follow these steps to contribute:
1. Fork this repository.
2. Create a branch: `git checkout -b my-new-feature`.
3. Make your changes and commit them: `git commit -m 'Add some feature'`.
4. Push to the branch: `git push origin my-new-feature`.
5. Submit a pull request.
