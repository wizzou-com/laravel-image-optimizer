# Laravel Image Optimizer

The `wizzou/laravel-image-optimizer` package provides a convenient solution for dynamically resizing and optimizing images in Laravel applications. It automates the process of image resizing, optimizing file sizes, and storing images in different storage backends such as local filesystems or cloud storage services like Amazon S3.

## Installation

You can install the package via Composer. Run the following command in your terminal:

```bash
composer require wizzou/laravel-image-optimizer
```

After installing the package, the ImageOptimizer service will be available for use in your Laravel application.

## Configuration

Publish the configuration file using the following Artisan command:

```bash
php artisan vendor:publish --provider="Wizzou\ImageOptimizer\ImageOptimizerServiceProvider"
```

This will create a `config/image-optimizer.php` file where you can configure the package settings.

### Configuration Options

The configuration file allows you to customize various aspects of the image optimization process:

- **Default Quality**: The default quality setting (0-100) for image compression.
- **Storage Disk**: The disk where optimized images will be stored (e.g., `public`, `s3`).
- **Storage Path**: The directory path within the chosen disk where images will be stored.
- **Default Format**: The default file format for image conversion (e.g., `webp`, `jpg`, `png`).

Modify these settings according to your application's requirements.

## Usage

You can use the `ImageOptimizer` service to resize and optimize images in your Laravel application. Here's how you can use it in your code:

```php
use Wizzou\ImageOptimizer\Facades\ImageOptimizer;

// Resize and optimize an image
$imageUrl = 'example.jpg';
$resizedImageUrl = ImageOptimizer::resize($imageUrl, 800, 600);
```

or

```blade
{{-- Example Blade Template --}}

<img src="{{ ImageOptimizer::resize('example.jpg', 800, 600) }}" alt="Resized Image">
```

The `resize` method accepts the URL of the original image, as well as the desired width and height for the resized image. Optionally, you can specify the desired file format for the resized image as the fourth parameter.

## Contributing

If you have suggestions for how this package could be improved, or if you've found a bug, please open an issue on [GitHub](https://github.com/wizzou-com/laravel-image-optimizer/issues).

Pull requests are also welcome! Please ensure that your code adheres to the [PSR-12](https://www.php-fig.org/psr/psr-12/) coding standard and includes appropriate tests.

## License

The `wizzou/laravel-image-optimizer` package is open-source software licensed under the [BSD-2-Clause](LICENSE.md).
