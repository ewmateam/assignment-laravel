# Laravel Coding Assignment
![PHP 7.3+](https://img.shields.io/badge/PHP-7.3%2B-informational?style=flat-square)
![Laravel 7.0](https://img.shields.io/badge/Laravel-7.0%2B-informational?style=flat-square)
[![License Unlicense](https://img.shields.io/badge/License-The%20Unlicense-informational?style=flat-square)](LICENSE)

Welcome to the Laravel coding assignment. 
## Overview
This project is an oversimplified sample of how a micro-blog works.
There are two models:
- User: the default user model
- Post: has a `user_id` and `text` (maximum of 255) column

Currently, multiple RESTful APIs are provided:
- `post` API Resource, acting as a sample / sanity check
- `feed` a GET resource similar to post.index, but also contains the user


## Tasks
### Maintenance Tasks
The following tasks are a sample of what maintenance tasks in a Laravel project look like, complete the following tasks based on the Laravel best practices:

1. The `/feed` api is sending too many queries to the database compared to `/post`, implement a fix inside the `FeedController`.
2. We need to store a log inside the system every time a new **Post** is created.

### Analyzer
We would also like to see how you would implement a system from scratch.

We have found that our micro-blog project needs to send analysis data to various systems.

For example, this system could
- send an HTTP request to "internal-analyzer.local"
- send the data to a redis server
- store the data inside a mysql server
- simply add the analysis to its internal array 
In Laravel, these systems are usually called "drivers". 

For this assignment, we need you to:
- Write a concrete implementation of `app/Contracts/Analyzer.php`
- Configure the service container such that `app()->make(Analyzer::class)` resolves to your implementation.
- Write a mock driver for your system which simply stores the value given inside an internal array.
- Write a few tests to demonstrate your ability in writing feature and unit tests

### Usage
```php
use App\Contracts\Analyzer;
// [...]
$analyzer = app(Analyzer::class);
$analyzer::send(["some-key"=> "some-value"]);
```

### Hints & Bonuses
- Refer to the architecture concepts in [Laravel documentation](https://laravel.com/docs/7.x/)
- You are free to use your knowledge of SOLID and implement the design pattern of your choice. Bonus points are awarded if your choice of implementation resembles the common practices in Laravel.

## License
This project is dedicated to the public domain, you may do as you please with the code available in this project. The derivative work you may create is yours to release. See [LICENSE](LICENSE) for more information.