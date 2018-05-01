<?php

namespace Seo\Manager\Contracts;


use Illuminate\Http\Request;

interface SeoManager
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request);

    /**
     * @param Request $request
     * @return \Illuminate\Database\Eloquent\Model|null|object|static
     */
    public function getPageMeta(Request $request);

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteMetas($id);

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function settings(Request $request);
}
