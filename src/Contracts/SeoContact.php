<?php

namespace Seo\Manager\Contracts;


interface SeoContact
{
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
     * @return mixed
     */
    public static function seoManager($request, $keywords, $title, $description, $ogType, $image = null, $locale = null, $locales = null, $canonical = null,$awsS3 = 0);

    /**
     * @param $request
     * @return mixed
     */
    public static function seoForAllPages($request);

}
