<?php

namespace Seo\Manager\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Manager extends Model
{
    protected $table = 'laravel_seo_managers';
    /**
     * @var string
     */
    protected $primaryKey = 'id';
    protected $casts = [
        'locales' => 'array'
    ];
    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'page',
        'title',
        'meta_keywords',
        'meta_description',
        'image',
        'url',
        'opegraph_type',
        'locale',
        'locales',
        'canonical',
        'aws_s3'
    ];

    /**
     * @param $value
     * @return mixed
     */
    public function getImageAttribute($value)
    {

        if ($value) {
            if ($this->aws_s3 === 1) {

                if (file_exists(public_path('/vendor/seo_manager/seo_manager.json'))) {
                    $userInfo = json_decode(file_get_contents(public_path('/vendor/seo_manager/seo_manager.json')), true);
                }
                if (isset($userInfo['cloud_front_url'])) {

                    return $userInfo['cloud_front_url'] . "/$value";
                }
                try{

                     return Storage::disk('s3')->url($value);
                }catch (\Exception $exception){

                    return asset('/vendor/seo_manager/images/seo-manager-no-image.jpg');
                }

            }

            return Storage::disk('')->url($value);
        }

        return asset('/vendor/seo_manager/images/seo-manager-no-image.jpg');
    }
}
