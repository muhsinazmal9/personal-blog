# Personal Blog

## Table of Contents

- [Personal Blog](#personal-blog)
  - [Table of Contents](#table-of-contents)
  - [Description](#description)
  - [Features](#features)
  - [Getting Started](#getting-started)
    - [Prerequisites](#prerequisites)
    - [Installation](#installation)
  - [Usage](#usage)
    - [Homepage](#homepage)
    - [View Post](#view-post)
    - [Create Post](#create-post)
    - [Edit Post](#edit-post)
    - [Delete Post](#delete-post)
    - [Search](#search)
  - [Built With](#built-with)
  - [License](#license)

## Description

This is a simple personal blog website built using Laravel. It allows users to create posts and share their thoughts and ideas.

## Features

-   Create, edit, and delete blog posts
-   Markdown support for writing posts
-   Simple and clean UI
-   Search posts
-   Pagination

## Getting Started

### Prerequisites

-   PHP >= 8.1
-   Composer
-   MySQL

### Installation

1. Clone the repo
    ```bash
    git clone https://github.com/muhsinazmal9/personal-blog.git
    ```
2. Install composer packages
    ```bash
    composer install
    ```
3. Copy .env.example to .env and update your MySQL credentials
    ```bash
     cp .env.example .env
    ```
4. Generate app key
    ```bash
     php artisan key:generate
    ```
5. Run database migrations
    ```bash
    php artisan migrate
    ```
6. Start local development server
    ```bash
    php artisan serve
    ```

The app will be running at http://localhost:8000

## Usage

### Homepage

The homepage displays a paginated list of blog posts.

### View Post

Click on a post title to view the full post.

### Create Post

Click on "New Post" to create a new blog post. Fill in the title, content in Markdown format, and tags.

### Edit Post

Click on "Edit" on a post to edit the title, content, and tags.

### Delete Post

Click on "Delete" on a post to delete it.

### Search

Use the search bar to search for posts by title or content.

## Built With

-   [Laravel](https://laravel.com/) - The PHP framework used
-   [Tailwind](https://tailwindcss.com/) - CSS framework

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details.
