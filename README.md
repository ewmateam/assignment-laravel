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
You will have two categories of assignments for this interview: Maintenance Tasks, and Writing your own Analyzer.

### Maintenance Tasks
The following tasks are a sample of what maintenance tasks in a Laravel project look like, complete the following tasks based on the Laravel best practices:

1. The `/feed` api is sending too many queries to the database compared to `/post`, implement a fix inside the `FeedController`.
2. We need to store a log inside the system every time a new **Post** is created.

### Analyzer
We would also like to see how you would implement a system from scratch.

We have found that our micro-blog project needs to send analysis data to various systems.

For this assignment, we need you to:
- Write a concrete implementation of `app/Contracts/AnalyzerDriver.php`
- Write a mock driver for your system which simply stores the value given inside an internal array. You do not need to save this array.
- Write a facade responsible for switching between drivers and getting called

### Usage
```php
use App\Facades\AnalyzerFacade;
// [...]
AnalyzerFacade::send(["some-key"=> "some-value"]);
```

### Hints & Bonuses
- Refer to the architecture concepts in [Laravel documentation](https://laravel.com/docs/7.x/) such as the Facade documentation
- You are free to use your knowledge of SOLID and implement the design pattern of your choice. Bonus points are awarded if your choice of implementation resembles the common practices in Laravel.

## License
This project is available under The Unlicense, see the full [LICENSE](LICENSE) for more information.