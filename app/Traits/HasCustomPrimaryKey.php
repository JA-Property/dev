<?php
namespace App\Traits;

trait HasCustomPrimaryKey
{
    /**
     * Boot the trait to hook into model creation.
     */
    public static function bootHasCustomPrimaryKey()
    {
        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = self::generateUniqueId();
            }
        });
    }

    /**
     * Generate a unique random alphanumeric string.
     *
     * @param int $length Length of the string (default is 10).
     * @return string
     */
    protected static function generateUniqueId($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);

        do {
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[random_int(0, $charactersLength - 1)];
            }
        } while (self::where('id', $randomString)->exists());

        return $randomString;
    }
}
