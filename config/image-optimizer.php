<?php

return [
    'default_quality' => env('IMAGE_OPTIMIZER_QUALITY', 90),
    'storage_disk' => env('IMAGE_OPTIMIZER_STORAGE_DISK', 's3'),  // Example: 'public', 'local', 's3'
    'storage_path' => env('IMAGE_OPTIMIZER_STORAGE_PATH', 'optimized_images'),  // Example: 'images', 'uploads'
    'default_format' => env('IMAGE_OPTIMIZER_FORMAT', 'webp'), // Default format for image conversion
];