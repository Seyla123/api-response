# Laravel API Response Trait

A simple trait for consistent API responses in Laravel applications.

## Installation

```bash
composer require seavseyla/laravel-api-response
```

## Usage

Use the trait in your controllers:

```php
use SeavSeyla\ApiResponse\Traits\ApiResponse;

class ApiController extends Controller
{
    use ApiResponse;
    
    public function index()
    {
        return $this->successResponse(['data' => 'value']);
    }
}
```

## Configuration

Publish the config file (optional):

```bash
php artisan vendor:publish --tag=api-response-config
```

## Available Methods

- `successResponse($data, $message = null, $code = 200)`
- `errorResponse($message, $code)`
- `tokenResponse($tokenData, $message = null, $refreshToken = null, $code = 200)`