var settingAdminButton = document.querySelector('#settingAdminButton'),
    seoManagerSetting = document.querySelector('#SeoManagerSetting'),
    saveChanges = document.querySelector('#saveChanges'),
    adminContainer = document.getElementsByClassName('seo_manager_setting_div'),
    inputTypeFile = document.getElementsByClassName('seo_manager_hidden'),
    seoManagerImage = document.getElementsByClassName('seo_manager_image'),
    seoForm = document.getElementById('seo_manager_form'),
    seoManagerLoader = document.getElementById('loader'),
    uploadFile = document.getElementById('uploadFile'),
    uploadAvatar = document.getElementById('uploadAvatar'),
    uriPage = document.getElementById('SeoManagerUriPage'),
    fixedActionButton = document.querySelector('.fixed-action-btn'),
    selectType = document.querySelector('#selectType'),
    selectLocales = document.querySelector('#selectLocales'),
    selectLocalesAlternate = document.querySelector('#selectLocalesAlternate'),
    deleteMetasForm = document.querySelector('#deleteMetasForm'),
    deleteMetasButton = document.querySelector('#deleteMetas'),
    idMeta = document.querySelector('#idMeta'),
    metaKeywords = document.querySelector('#meta_keywords'),
    metaKeywordsInput = document.querySelector('#meta_keywords_input'),
    settingForm = document.querySelector('#settingForm'),
    saveSettings = document.querySelector('#saveSettings'),
    swicher = document.querySelector('#swicher'),
    labelForMetaKeyword = document.querySelector('label[for=meta_keywords]'),
    materialBoxed = document.getElementsByClassName('materialboxed'),
    selectLocalesAlternateOptions = selectLocalesAlternate.getElementsByTagName('option'),
    chips = document.querySelector('.chips'),
    chipsOptions = {
        secondaryPlaceholder: '+keyword'
    },
    xhr = new XMLHttpRequest(), ogTypesOptions, img,
    ogTypes = {
        'Web based': {
            0: 'website',
            1: 'article',
            2: 'blog'
        },
        'Entertainment': {
            0: 'book',
            1: 'game',
            2: 'movie',
            3: 'food'
        },
        'Place': {
            0: 'city',
            1: 'country'
        },
        'People': {
            0: 'actor',
            1: 'author',
            2: 'author'
        },
        'Business': {
            0: 'company',
            1: 'hotel',
            2: 'restaurant'
        }
    }, locales = {
        "af": "Afrikaans",
        "sq": "Albanian",
        "am": "Amharic",
        "ar_DZ": "Arabic - Algeria",
        "ar_BH": "Arabic - Bahrain",
        "ar_EG": "Arabic - Egypt",
        "ar_IQ": "Arabic - Iraq",
        "ar_JO": "Arabic - Jordan",
        "ar_KW": "Arabic - Kuwait",
        "ar_LB": "Arabic - Lebanon",
        "ar_LY": "Arabic - Libya",
        "ar_MA": "Arabic - Morocco",
        "ar_OM": "Arabic - Oman",
        "ar_QA": "Arabic - Qatar",
        "ar_SA": "Arabic - Saudi Arabia",
        "ar_SY": "Arabic - Syria",
        "ar_TN": "Arabic - Tunisia",
        "ar_AE": "Arabic - United Arab Emirates",
        "ar_YE": "Arabic - Yemen",
        "hy": "Armenian",
        "as": "Assamese",
        "az_AZ": "Azeri - Cyrillic",
        "eu": "Basque",
        "be": "Belarusian",
        "bn": "Bengali - Bangladesh",
        "bs": "Bosnian",
        "bg": "Bulgarian",
        "my": "Burmese",
        "ca": "Catalan",
        "zh_CN": "Chinese - China",
        "zh_HK": "Chinese - Hong Kong SAR",
        "zh_MO": "Chinese - Macau SAR",
        "zh_SG": "Chinese - Singapore",
        "zh_TW": "Chinese - Taiwan",
        "hr": "Croatian",
        "cs": "Czech",
        "da": "Danish",
        "dv": "Divehi; Dhivehi; Maldivian",
        "nl_BE": "Dutch - Belgium",
        "nl_NL": "Dutch - Netherlands",
        "en_AU": "English - Australia",
        "en_BZ": "English - Belize",
        "en_CA": "English - Canada",
        "en_CB": "English - Caribbean",
        "en_GB": "English - Great Britain",
        "en_IN": "English - India",
        "en_IE": "English - Ireland",
        "en_JM": "English - Jamaica",
        "en_NZ": "English - New Zealand",
        "en_PH": "English - Phillippines",
        "en_ZA": "English - Southern Africa",
        "en_TT": "English - Trinidad",
        "en_US": "English - United States",
        "et": "Estonian",
        "fo": "Faroese",
        "fa": "Farsi - Persian",
        "fi": "Finnish",
        "fr_BE": "French - Belgium",
        "fr_CA": "French - Canada",
        "fr_FR": "French - France",
        "fr_LU": "French - Luxembourg",
        "fr_CH": "French - Switzerland",
        "mk": "FYRO Macedonia",
        "gd_IE": "Gaelic - Ireland",
        "gd": "Gaelic - Scotland",
        "de_AT": "German - Austria",
        "de_DE": "German - Germany",
        "de_LI": "German - Liechtenstein",
        "de_LU": "German - Luxembourg",
        "de_CH": "German - Switzerland",
        "el": "Greek",
        "gn": "Guarani - Paraguay",
        "gu": "Gujarati",
        "he": "Hebrew",
        "hi": "Hindi",
        "hu": "Hungarian",
        "is": "Icelandic",
        "id": "Indonesian",
        "it_IT": "Italian - Italy",
        "it_CH": "Italian - Switzerland",
        "ja": "Japanese",
        "kn": "Kannada",
        "ks": "Kashmiri",
        "kk": "Kazakh",
        "km": "Khmer",
        "ko": "Korean",
        "lo": "Lao",
        "la": "Latin",
        "lv": "Latvian",
        "lt": "Lithuanian",
        "ms_BN": "Malay - Brunei",
        "ms_MY": "Malay - Malaysia",
        "ml": "Malayalam",
        "mt": "Maltese",
        "mi": "Maori",
        "mr": "Marathi",
        "mn": "Mongolian",
        "ne": "Nepali",
        "no_NO": "Norwegian - Bokml",
        "or": "Oriya",
        "pl": "Polish",
        "pt_BR": "Portuguese - Brazil",
        "pt_PT": "Portuguese - Portugal",
        "pa": "Punjabi",
        "rm": "Raeto-Romance",
        "ro_MO": "Romanian - Moldova",
        "ro": "Romanian - Romania",
        "ru": "Russian",
        "ru_MO": "Russian - Moldova",
        "sa": "Sanskrit",
        "sr_SP": "Serbian - Cyrillic",
        "tn": "Setsuana",
        "sd": "Sindhi",
        "si": "Sinhala; Sinhalese",
        "sk": "Slovak",
        "sl": "Slovenian",
        "so": "Somali",
        "sb": "Sorbian",
        "es_AR": "Spanish - Argentina",
        "es_BO": "Spanish - Bolivia",
        "es_CL": "Spanish - Chile",
        "es_CO": "Spanish - Colombia",
        "es_CR": "Spanish - Costa Rica",
        "es_DO": "Spanish - Dominican Republic",
        "es_EC": "Spanish - Ecuador",
        "es_SV": "Spanish - El Salvador",
        "es_GT": "Spanish - Guatemala",
        "es_HN": "Spanish - Honduras",
        "es_MX": "Spanish - Mexico",
        "es_NI": "Spanish - Nicaragua",
        "es_PA": "Spanish - Panama",
        "es_PY": "Spanish - Paraguay",
        "es_PE": "Spanish - Peru",
        "es_PR": "Spanish - Puerto Rico",
        "es_ES": "Spanish - Spain (Traditional)",
        "es_UY": "Spanish - Uruguay",
        "es_VE": "Spanish - Venezuela",
        "sw": "Swahili",
        "sv_FI": "Swedish - Finland",
        "sv_SE": "Swedish - Sweden",
        "tg": "Tajik",
        "ta": "Tamil",
        "tt": "Tatar",
        "te": "Telugu",
        "th": "Thai",
        "bo": "Tibetan",
        "ts": "Tsonga",
        "tr": "Turkish",
        "tk": "Turkmen",
        "uk": "Ukrainian",
        "ur": "Urdu",
        "uz_UZ": "Uzbek - Cyrillic",
        "vi": "Vietnamese",
        "cy": "Welsh",
        "xh": "Xhosa",
        "yi": "Yiddish",
        "zu": "Zulu"
    };

function xhrRequest() {
    xhr.open('GET', `/seo-manager/seo/manager/get-page-meta?uri=${uriPage.value}`, false);
    xhr.send();
    if (xhr.status === 200) {
        var response = JSON.parse(xhr.responseText);
        initRequestData(response);
    }
    ;
};

document.addEventListener("DOMContentLoaded", function () {

    ogTypesOptions = '';
    for (var types in ogTypes) {
        if (ogTypes.hasOwnProperty(types)) {
            ogTypesOptions += `<optgroup label="${types}">${addSelectOptions(ogTypes[types])}</optgroup>`;
        }

    }
    selectType.innerHTML = ogTypesOptions;

    function addSelectOptions(options) {
        var option = '';
        for (var items in options) {
            if (options.hasOwnProperty(items)) {
                option += `<option value="${options[items]}">${options[items]}</option>`;
            }
        }
        return option;
    }

    var localesOptions = '',
        localoption = `<option value="" selected disabled>Select locale</option>`,
        localAlternate = `<option value="" selected disabled>Select Alternate locale</option>`;

    for (var locale in locales) {

        localesOptions += `<option value="${locale}">${locales[locale]}</option>`;
    }
    selectLocales.innerHTML = localoption + localesOptions;
    selectLocalesAlternate.innerHTML = localAlternate + localesOptions;

    xhrRequest();
    M.FormSelect.init(selectType);
    M.FormSelect.init(selectLocales);
    M.FormSelect.init(selectLocalesAlternate);
});
settingAdminButton.onclick = function () {
    adminContainer[0].classList.toggle('seo_manager_open_setting_admin');
    if (adminContainer[1].classList.contains('seo_manager_open_setting_admin')) {
        adminContainer[1].classList.toggle('seo_manager_open_setting_admin');
    }
};

function chipsData() {
    var instance = M.Chips.getInstance(chips), chipsData;
    chipsData = JSON.stringify(instance.chipsData);
    return chipsData;
}

saveChanges.onclick = function () {

    metaKeywordsInput.value = chipsData();
    seoManagerLoader.style.display = 'flex';
    seoForm.submit()
};
saveSettings.onclick = function () {
    seoManagerLoader.style.display = 'flex';
    settingForm.submit()
};
// material them
for (var i = 0; i <= materialBoxed.length; i++) {
    M.Materialbox.init(materialBoxed[i]);
}


M.FloatingActionButton.init(fixedActionButton, {
    direction: 'left'
});
M.Chips.init(chips, chipsOptions);

function initRequestData(response) {
    img = seoManagerImage[0];
    img.src = response['image'];
    img = seoManagerImage[1];

    for (var item in response) {
        if (response.hasOwnProperty(item)) {
            if (item != 'image' && seoForm.querySelector(`[name=${item}]`)){
                seoForm.querySelector(`[name=${item}]`).value = response[item]
            }
        }
    }

    if (response.hasOwnProperty('locales')) {
        for (var opt in selectLocalesAlternateOptions) {
            if (response['locales'].includes(selectLocalesAlternateOptions[opt].value)) {
                selectLocalesAlternateOptions[opt].selected = true
            }
        }
        selectLocalesAlternateOptions[0].removeAttribute('selected');

    }
    if (response['aws_s3'] === 1) {
        swicher.setAttribute("checked", "true");
        swicher.value = response['aws_s3']
    }
    if (response.hasOwnProperty('user_info')) {
        for (var item in response['user_info']) {
            if (item !== 'image') {
                settingForm.querySelector(`input[name=${item}]`).value = response['user_info'][item];
            }
        }
    }
    if (response['user_info'].hasOwnProperty('image')) {
        img.src = response['user_info']['image'];
    }
    if (response['meta_keywords'] != null) {
        chipsOptions.data = JSON.parse(response['meta_keywords']);
        M.Chips.init(chips, chipsOptions);
    }
    if (response['delete_field']) {
        deleteMetasButton.style.display = 'none'

    }
}

uploadFile.onclick = function () {
    inputTypeFile[0].click();
    img = seoManagerImage[0]
};
uploadAvatar.onclick = function () {
    inputTypeFile[1].click();
    img = seoManagerImage[1]
};
inputTypeFile[0].addEventListener('change', handleFiles, false);
inputTypeFile[1].addEventListener('change', handleFiles, false);


function handleFiles() {
    var file = this.files;
    img.src = window.URL.createObjectURL(file[0]);
    img.onload = function () {
        window.URL.revokeObjectURL(this.src);
    }
}

seoManagerSetting.onclick = function () {
    adminContainer[0].classList.toggle('seo_manager_open_setting_admin');
    adminContainer[1].classList.toggle('seo_manager_open_setting_admin');
}
metaKeywords.onclick = function () {
    labelForMetaKeyword.classList.add('active');
};

adminContainer[0].onclick = function (event) {

    var chips = chipsData();
    chips = JSON.parse(chips);

    if (!event.path[0].classList.contains('chips') && chips.length === 0) {
        labelForMetaKeyword.classList.remove('active');
    }
};
deleteMetasButton.onclick = function () {
    deleteMetasForm.setAttribute('action', `/seo-manager-delete-metas/${idMeta.value}`);
    if (confirm('confirm delete this page seo content?')) {
        seoManagerLoader.style.display = 'flex';
        deleteMetasForm.submit()
    }


}
swicher.onclick = function () {

    if (this.checked && confirm(`Change aws s3 cloud?Have you set aws s3;for set up https://aws.amazon.com/s3/?nc1=h_ls`)) {
        this.setAttribute("checked", "true");
        this.value = 1;
    } else {
        this.setAttribute("checked", "false");
        this.value = 0;
    }
}
