<?php

namespace Seo\Manager;

use Seo\Manager\Services\SeoService;

class SeoManager
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public static function generateManager()
    {
        return view('seo-manager::index');

    }

    /**
     * @param $request
     * @param $keywords
     * @param $title
     * @param $description
     * @param $ogType
     * @param null $image
     * @param null $locale
     * @param null $locales
     * @param null $canonical
     * @param int $awsS3
     * @return mixed|void
     */
    public static function seoManager($request, $keywords, $title, $description, $ogType, $image = null, $locale = null, $locales = null, $canonical = null,$awsS3 =0)
    {
        return SeoService::seoManager($request, $keywords, $title, $description, $ogType, $image = null, $locale = null, $locales = null, $canonical = null,$awsS3 =0);
    }

}
