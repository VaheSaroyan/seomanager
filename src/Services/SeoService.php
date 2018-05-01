<?php

namespace Seo\Manager\Services;

use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\TwitterCard;
use SEO;
use Seo\Manager\Contracts\SeoContact;
use Seo\Manager\Models\Manager;

class SeoService implements SeoContact
{

    /**
     * @param  $request
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
    public static function seoManager($request, $keywords, $title, $description, $ogType, $image = null, $locale = null, $locales = null, $canonical = null,$awsS3 = 0)
    {
        $baseUrlPath = $request->getUriForPath('');
        if (\is_array($keywords)) {
            $keywords = implode(',', $keywords);
        }
        if (file_exists(public_path('/vendor/seo_manager/seo_manager.json'))) {
            $userInfo = json_decode(file_get_contents(public_path('/vendor/seo_manager/seo_manager.json')), true);
        }
        if($awsS3 === 0){
            $image = $baseUrlPath . $image;
        }
        SEO::setTitle($title);
        SEO::setDescription($description);
        SEO::opengraph()->setUrl($baseUrlPath . $request->getRequestUri());
        OpenGraph::addImage($image, ['height' => 300, 'width' => 300]);
        SEO::setCanonical($canonical);
        SEOMeta::addKeyword($keywords);
        OpenGraph::addProperty('locale', $locale);
        OpenGraph::addProperty('locales', $locales);
        TwitterCard::addImage($image);
        SEO::opengraph()->addProperty('type', $ogType);
        isset($userInfo['twitter_site']) ? SEO::twitter()->setSite($userInfo['twitter_site']) : '';
    }

    /**
     * @param $request
     * @return mixed|void
     */
    public static function seoForAllPages($request)
    {
        $uri = $request->getRequestUri();
        $seoManager = Manager::where('url', $uri)->first();
        if (!empty($seoManager)) {
            self::seoManager($request, $seoManager->meta_keywords, $seoManager->title, $seoManager->meta_description, $seoManager->opegraph_type, $seoManager->image, $seoManager->locale, $seoManager->locales, $seoManager->canonical,$seoManager->aws_s3);
        }

    }

}
