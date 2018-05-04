<?php

namespace Seo\Manager\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Seo\Manager\Contracts\SeoManager;
use Seo\Manager\Models\Manager;

class SeoManagerController extends Controller implements SeoManager
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {

        $metaKeywords = json_decode($request['meta_keywords'], true);
        $metaKeywordsTags = null;
        if (\count($metaKeywords)) {
            foreach ($metaKeywords as $index => $metaKeyword) {
                $metaKeywordsTags .= $metaKeyword['tag'];
                ($index + 2 <= \count($metaKeywords)) ? $metaKeywordsTags .= ', ' : '';
            }
        }

        $seoAllPages = Manager::updateOrCreate([
            'url' => $request['url'],
        ], [
            'title' => $request['title'],
            'meta_keywords' => $metaKeywordsTags,
            'meta_description' => $request['meta_description'],
            'opegraph_type' => $request['opegraph_type'],
            'locale' => $request['locale'],
            'locales' => json_encode($request['locales']),
            'canonical' => $request['canonical'],
            'aws_s3' => $request['aws_s3'] or 0,

        ]);
        if ($request->hasFile('image')) {
            if ($request['aws_s3']) {
                try {
                    $imagePath = Storage::disk('s3')->put('seoImages', $request->file('image'), 'public');
                } catch (\Exception $exception) {
                    \Session::flash('msg', 'Changes Saved.' );
                    return back();
                }
            } else {
                $imagePath = $request->file('image')->storePublicly('public/seoImages');
            }

            $seoAllPages->image = $imagePath;
            $seoAllPages->save();
        }

        return back();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Database\Eloquent\Model|null|object|static
     */
    public function getPageMeta(Request $request)
    {
        $userInfo = [];
        if (file_exists(public_path('/vendor/seo_manager/seo_manager.json'))) {
            $userInfo = json_decode(file_get_contents(public_path('/vendor/seo_manager/seo_manager.json')), true);
        }
        $seoForPage = Manager::where('url', $request['uri'])->first();
        if ($seoForPage !== null) {
            $response = $seoForPage->toArray();
            if (isset($response['meta_keywords'])) {
                $metaKeywords = explode(',', $response['meta_keywords']);
                $metaKeywordArray = [];
                foreach ($metaKeywords as $index => $metaKeyword) {
                    $metaKeywordArray [] = ['tag' => trim($metaKeyword)];

                }
                $response['meta_keywords'] = json_encode(array_values($metaKeywordArray));

            }
            $response['user_info'] = $userInfo;

            return $response;
        }
        return ['image' => asset('/vendor/seo_manager/images/seo-manager-no-image.jpg'), 'delete_field' => false, 'user_info' => $userInfo];
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteMetas($id)
    {
        Manager::destroy($id);
        return back();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function settings(Request $request)
    {
        $data = $request->all();
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->storePublicly('public/seoImages');
            $imagePath = Storage::disk('')->url($imagePath);
            $data['image'] = $imagePath;
        }
        if (file_exists(public_path('/vendor/seo_manager/seo_manager.json'))) {
            $userInfo = json_decode(file_get_contents(public_path('/vendor/seo_manager/seo_manager.json')), true);
        }
        if (!$request->hasFile('image')) {
            $data['image'] = $userInfo['image'] ?? asset('/vendor/seo_manager/images/noavatar.png');
        }

        $json_data = json_encode($data);
        file_put_contents(public_path('vendor/seo_manager/seo_manager.json'), $json_data);
        return back();
    }
}
