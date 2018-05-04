<link rel="stylesheet" href="{{ asset('/vendor/seo_manager/css/material-them.css') }}">
<link rel="stylesheet" href="{{ asset('/vendor/seo_manager/css/app.css') }}">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
@if(Session::has('msg'))
    <div class="alert alert-info">
        <a class="close" data-dismiss="alert">×</a>
        <strong>Heads Up!</strong> {!!Session::get('msg')!!}
    </div>
@endif
<div class="seo_manager_setting_admin">
    <div class="fixed-action-btn seo_manager_setting_admin_button_group">
        <a class="btn-floating btn-large red" title="click to open seo manager" id="settingAdminButton">
            <i class="large material-icons">mode_edit</i>
        </a>
        <ul>
            <li id="SeoManagerSetting"><a class="btn-floating grey"><i class="material-icons">settings_applications</i></a>
            </li>
            <li id="deleteMetas"><a class="btn-floating red"><i class="material-icons">delete_forever</i></a></li>
            <li id="saveChanges" data-position="top" data-tooltip="click for save your changes" class="tooltipped"><a
                    class="btn-floating blue"><i class="material-icons">save</i></a></li>
        </ul>
    </div>
</div>
<div class="seo_manager_setting_admin seo_manager_setting_admin_start_position seo_manager_setting_div">

    <form action="" method="post" class="seo_manager_display_inline" id="deleteMetasForm">
        {{csrf_field()}}
        {{method_field('delete')}}
    </form>
    <h5 class="seo_manager_text_center">Seo Manager</h5>
    <form action="{{route('seo_manager.store')}}" method="post" enctype="multipart/form-data"
          id="seo_manager_form">
        {{csrf_field()}}
        <input type="hidden" name="url" value="{{Request::getRequestUri()}}" id="SeoManagerUriPage">
        <input type="hidden" name="id" id="idMeta">
        <div class="seo_manager_d_flex">
            <div
                class="seo_manager_form_group {{ $errors->has('title') ? 'has-error' : ''}} seo_manager_p_4 input-field">
                {!! Form::label('title', 'Meta Title', ['class' => 'control-label seo_manager_labels']) !!}
                {!! Form::textarea('title', null, ['class' => 'seo_manager_form_control materialize-textarea']) !!}
                {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="seo_manager_form_group seo_manager_p_4 input-field">
                {!! Form::label('meta_keywords', 'Meta Keywords', ['class' => 'control-label seo_manager_labels']) !!}
                <div class="chips seo_manager_meta_keyword_block" id="meta_keywords">
                    <input name="meta_keywords" id="meta_keywords_input">
                </div>
            </div>

            <div
                class="seo_manager_form_group {{ $errors->has('meta_description') ? 'has-error' : ''}}  seo_manager_p_4 input-field">
                {!! Form::label('meta_description', 'Meta Description', ['class' => 'control-label seo_manager_labels']) !!}
                {!! Form::textarea('meta_description', null, ['class' => 'seo_manager_form_control materialize-textarea']) !!}
                {!! $errors->first('meta_description', '<p class="help-block">:message</p>') !!}
            </div>
            <div
                class="seo_manager_form_group {{ $errors->has('image') ? 'has-error' : ''}} seo_manager_p_4 input-field">
                <img class="seo_manager_image materialboxed">
                <input type="file" name="image" width="150" class="seo_manager_hidden">
                <button class="waves-effect waves-light btn btn-small seo_manager_btn_w_100_cp"
                        id="uploadFile" type="button">
                    Upload Open graph file
                </button>
                {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="seo_manager_form_group_h40 input-field  seo_manager_p_4">
                <select id="selectType" name="opegraph_type" tabindex="-1">
                </select>
                <label>Select og Type</label>
            </div>
            <div class="seo_manager_form_group_h40 input-field  seo_manager_p_4">
                <select id="selectLocales" name="locale" tabindex="-1">
                </select>
                <label>Select Locale</label>
            </div>
            <div class="seo_manager_form_group_h40 input-field  seo_manager_p_4">
                <select id="selectLocalesAlternate" name="locales[]" multiple tabindex="-1">
                </select>
                <label>Select Locales Alternate</label>
            </div>
            <div class="seo_manager_form_group_h40 seo_manager_p_4 input-field  seo_manager_mt-0">
                <div class="switch seo_manager_text_center">
                    <label for="" class="seo_manager_btn_w_100_cp">AWS S3</label>
                    <label>
                        Off
                        <input name="aws_s3" type="checkbox" id="swicher">
                        <span class="lever"></span>
                        On
                    </label>
                </div>
            </div>
            <div
                class="seo_manager_form_group_h40 {{ $errors->has('canonical') ? 'has-error' : ''}}  seo_manager_p_4 input-field seo_manager_w25">
                {!! Form::label('canonical', 'Canonical', ['class' => 'control-label seo_manager_labels']) !!}
                {!! Form::text('canonical', null, ['class' => 'seo_manager_form_control seo_manager_mt_10']) !!}
                {!! $errors->first('canonical', '<p class="help-block">:message</p>') !!}
            </div>
        </div>

    </form>

</div>

<div class="seo_manager_setting_admin seo_manager_setting_admin_start_position seo_manager_setting_div">
    <h5 class="seo_manager_text_center">Seo Manager Settings</h5>
    <form action="{{route('seo_manager.settings')}}" method="post" enctype="multipart/form-data" id="settingForm">
        <div class="seo_manager_d_flex seo_manager_align_self">
            <div class="seo_manager_width_50">
                <h6 class="seo_manager_user_info">User info</h6>
                <div class="seo_manager_form_group_setting">
                    <div
                        class="seo_manager_form_group_setting {{ $errors->has('image') ? 'has-error' : ''}} seo_manager_p_4 input-field">
                        <img src="{{asset('/vendor/seo_manager/images/noavatar.png')}}"
                             class="seo_manager_image materialboxed">
                        <input type="file" name="image" width="150" class="seo_manager_hidden">
                        <button
                            class="waves-effect waves-light btn btn-small seo_manager_btn_w_100_cp"
                            id="uploadAvatar" type="button">
                            Your Avatar image
                        </button>
                        {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
                <div class="seo_manager_form_group_setting">
                    <div
                        class="seo_manager_form_group_setting_h40_f100 {{ $errors->has('user_name') ? 'has-error' : ''}}  seo_manager_p_4 input-field">
                        {!! Form::label('user_name', 'Your Name', ['class' => 'control-label seo_manager_labels']) !!}
                        {!! Form::text('user_name', null, ['class' => 'seo_manager_form_control','placeholder'=>'Seo']) !!}
                        {!! $errors->first('user_name', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div
                        class="seo_manager_form_group_setting_h40_f100 {{ $errors->has('user_surname') ? 'has-error' : ''}}  seo_manager_p_4 input-field">
                        {!! Form::label('user_surname', 'Your Surname', ['class' => 'control-label seo_manager_labels']) !!}
                        {!! Form::text('user_surname', null, ['class' => 'seo_manager_form_control','placeholder'=>'Manger']) !!}
                        {!! $errors->first('user_surname', '<p class="help-block">:message</p>') !!}
                    </div>

                </div>
            </div>
            <div class="seo_manager_width_50">
                <h6 class="seo_manager_user_info">Other Options</h6>

                <div
                    class="seo_manager_form_group_setting_h40 {{ $errors->has('twitter_site') ? 'has-error' : ''}}  seo_manager_p_4 input-field">
                    {!! Form::label('twitter_site', 'Twitter', ['class' => 'control-label seo_manager_labels']) !!}
                    {!! Form::text('twitter_site', null, ['class' => 'seo_manager_form_control','placeholder'=>'@SeoManger']) !!}
                    {!! $errors->first('twitter_site', '<p class="help-block">:message</p>') !!}
                </div>


                <div
                    class="seo_manager_form_group_setting_h40 {{ $errors->has('facebook') ? 'has-error' : ''}}  seo_manager_p_4 input-field">
                    {!! Form::label('facebook', 'Facebook', ['class' => 'control-label seo_manager_labels']) !!}
                    {!! Form::text('facebook', null, ['class' => 'seo_manager_form_control','placeholder'=>'https://www.facebook.com/seo-manger']) !!}
                    {!! $errors->first('facebook', '<p class="help-block">:message</p>') !!}
                </div>

                <div
                    class="seo_manager_form_group_setting_h40 {{ $errors->has('cloud_front_url') ? 'has-error' : ''}}  seo_manager_p_4 input-field">
                    {!! Form::label('cloud_front_url', 'CLOUDFRONT URL', ['class' => 'control-label seo_manager_labels']) !!}
                    {!! Form::text('cloud_front_url', null, ['class' => 'seo_manager_form_control','placeholder'=>'https://seoMnager.cloudfront.net']) !!}
                    {!! $errors->first('cloud_front_url', '<p class="help-block">:message</p>') !!}
                </div>

            </div>
        </div>
        <button class="waves-effect waves-light btn btn-small seo_manager_btn_w_100_cp"
                type="button" id="saveSettings">
            Save Changes
        </button>
    </form>
</div>

<div class="seo_manager_loader_container" id="loader"><span class="seo_manager_image_loader"></span></div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
<script src="{{ asset('/vendor/seo_manager/js/functions.prod.js') }}"></script>
