<?php

namespace Wizzou\ImageOptimizer;

use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class ImageOptimizer
{
    protected $config;

    public function __construct($config)
    {
        $this->config = $config;
    }

    public function resize($url, $width, $height, $format = null)
    {
        if (app()->environment('local')) {
            return $url;
        }

        try {
            $extension = pathinfo(parse_url($url, PHP_URL_PATH), PATHINFO_EXTENSION);
            $extension = $extension ?: 'jpg';

            $filename = md5("{$url}_{$width}_{$height}") . '.' . ($format ?: $this->config['default_format']); // Use specified format or default
            $path = $this->config['storage_path'] . '/' . $filename;

            if (!Storage::disk($this->config['storage_disk'])->exists($path)) {
                $image = Image::make($url)->resize($width, $height, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
                $image->encode($format ?: $this->config['default_format'], $this->config['default_quality']);
                Storage::disk($this->config['storage_disk'])->put($path, $image->getEncoded());
            }

            return Storage::disk($this->config['storage_disk'])->url($path);
        } catch (\Exception $e) {
            return $url;
        }
    }
}