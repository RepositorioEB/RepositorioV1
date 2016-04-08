<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    public static function languageCode($code)
    {
    	//$code = strtoupper($code);
        $lenguaje = '';
	    if( $code == 'aa' ) $lenguaje = 'Afar';
	    if( $code == 'ab' ) $lenguaje = 'Abkhaz';
	    if( $code == 'ae' ) $lenguaje = 'Avestan';
	    if( $code == 'af' ) $lenguaje = 'Afrikaans';
	    if( $code == 'ak' ) $lenguaje = 'Akan';
	    if( $code == 'am' ) $lenguaje = 'Amharic';
	    if( $code == 'an' ) $lenguaje = 'Aragonese';
	    if( $code == 'ar' ) $lenguaje = 'Arabic';
	    if( $code == 'as' ) $lenguaje = 'Assamese';
	    if( $code == 'av' ) $lenguaje = 'Avaric';
	    if( $code == 'ay' ) $lenguaje = 'Aymara';
	    if( $code == 'az' ) $lenguaje = 'Azerbaijani';
	    if( $code == 'ba' ) $lenguaje = 'Bashkir';
	    if( $code == 'be' ) $lenguaje = 'Belarusian';
	    if( $code == 'bg' ) $lenguaje = 'Bulgarian';
	    if( $code == 'bh' ) $lenguaje = 'Bihari';
	    if( $code == 'bi' ) $lenguaje = 'Bislama';
	    if( $code == 'bm' ) $lenguaje = 'Bambara';
	    if( $code == 'bn' ) $lenguaje = 'Bengali';
	    if( $code == 'bo' ) $lenguaje = 'Tibetan Standard; Tibetan; Central';
	    if( $code == 'br' ) $lenguaje = 'Breton';
	    if( $code == 'bs' ) $lenguaje = 'Bosnian';
	    if( $code == 'ca' ) $lenguaje = 'Catalan; Valencian';
	    if( $code == 'ce' ) $lenguaje = 'Chechen';
	    if( $code == 'ch' ) $lenguaje = 'Chamorro';
	    if( $code == 'co' ) $lenguaje = 'Corsican';
	    if( $code == 'cr' ) $lenguaje = 'Cree';
	    if( $code == 'cs' ) $lenguaje = 'Czech';
	    if( $code == 'cu' ) $lenguaje = 'Old Church Slavonic; Church Slavic; Church Slavonic; Old Bulgarian; Old Slavonic';
	    if( $code == 'cv' ) $lenguaje = 'Chuvash';
	    if( $code == 'cy' ) $lenguaje = 'Welsh';
	    if( $code == 'da' ) $lenguaje = 'Danish';
	    if( $code == 'de' ) $lenguaje = 'German';
	    if( $code == 'dv' ) $lenguaje = 'Divehi; Dhivehi; Maldivian;';
	    if( $code == 'dz' ) $lenguaje = 'Dzongkha';
	    if( $code == 'ee' ) $lenguaje = 'Ewe';
	    if( $code == 'el' ) $lenguaje = 'Greek; Modern';
	    if( $code == 'en' ) $lenguaje = 'English';
	    if( $code == 'eo' ) $lenguaje = 'Esperanto';
	    if( $code == 'es' ) $lenguaje = 'Spanish; Castilian';
	    if( $code == 'et' ) $lenguaje = 'Estonian';
	    if( $code == 'eu' ) $lenguaje = 'Basque';
	    if( $code == 'fa' ) $lenguaje = 'Persian';
	    if( $code == 'ff' ) $lenguaje = 'Fula; Fulah; Pulaar; Pular';
	    if( $code == 'fi' ) $lenguaje = 'Finnish';
	    if( $code == 'fj' ) $lenguaje = 'Fijian';
	    if( $code == 'fo' ) $lenguaje = 'Faroese';
	    if( $code == 'fr' ) $lenguaje = 'French';
	    if( $code == 'fy' ) $lenguaje = 'Western Frisian';
	    if( $code == 'ga' ) $lenguaje = 'Irish';
	    if( $code == 'gd' ) $lenguaje = 'Scottish Gaelic; Gaelic';
	    if( $code == 'gl' ) $lenguaje = 'Galician';
	    if( $code == 'gn' ) $lenguaje = 'GuaranÃ­';
	    if( $code == 'gu' ) $lenguaje = 'Gujarati';
	    if( $code == 'gv' ) $lenguaje = 'Manx';
	    if( $code == 'ha' ) $lenguaje = 'Hausa';
	    if( $code == 'he' ) $lenguaje = 'Hebrew (modern)';
	    if( $code == 'hi' ) $lenguaje = 'Hindi';
	    if( $code == 'ho' ) $lenguaje = 'Hiri Motu';
	    if( $code == 'hr' ) $lenguaje = 'Croatian';
	    if( $code == 'ht' ) $lenguaje = 'Haitian; Haitian Creole';
	    if( $code == 'hu' ) $lenguaje = 'Hungarian';
	    if( $code == 'hy' ) $lenguaje = 'Armenian';
	    if( $code == 'hz' ) $lenguaje = 'Herero';
	    if( $code == 'ia' ) $lenguaje = 'Interlingua';
	    if( $code == 'id' ) $lenguaje = 'Indonesian';
	    if( $code == 'ie' ) $lenguaje = 'Interlingue';
	    if( $code == 'ig' ) $lenguaje = 'Igbo';
	    if( $code == 'ii' ) $lenguaje = 'Nuosu';
	    if( $code == 'ik' ) $lenguaje = 'Inupiaq';
	    if( $code == 'io' ) $lenguaje = 'Ido';
	    if( $code == 'is' ) $lenguaje = 'Icelandic';
	    if( $code == 'it' ) $lenguaje = 'Italian';
	    if( $code == 'iu' ) $lenguaje = 'Inuktitut';
	    if( $code == 'ja' ) $lenguaje = 'Japanese (ja)';
	    if( $code == 'jv' ) $lenguaje = 'Javanese (jv)';
	    if( $code == 'ka' ) $lenguaje = 'Georgian';
	    if( $code == 'kg' ) $lenguaje = 'Kongo';
	    if( $code == 'ki' ) $lenguaje = 'Kikuyu; Gikuyu';
	    if( $code == 'kj' ) $lenguaje = 'Kwanyama; Kuanyama';
	    if( $code == 'kk' ) $lenguaje = 'Kazakh';
	    if( $code == 'kl' ) $lenguaje = 'Kalaallisut; Greenlandic';
	    if( $code == 'km' ) $lenguaje = 'Khmer';
	    if( $code == 'kn' ) $lenguaje = 'Kannada';
	    if( $code == 'ko' ) $lenguaje = 'Korean';
	    if( $code == 'kr' ) $lenguaje = 'Kanuri';
	    if( $code == 'ks' ) $lenguaje = 'Kashmiri';
	    if( $code == 'ku' ) $lenguaje = 'Kurdish';
	    if( $code == 'kv' ) $lenguaje = 'Komi';
	    if( $code == 'kw' ) $lenguaje = 'Cornish';
	    if( $code == 'ky' ) $lenguaje = 'Kirghiz; Kyrgyz';
	    if( $code == 'la' ) $lenguaje = 'Latin';
	    if( $code == 'lb' ) $lenguaje = 'Luxembourgish; Letzeburgesch';
	    if( $code == 'lg' ) $lenguaje = 'Luganda';
	    if( $code == 'li' ) $lenguaje = 'Limburgish; Limburgan; Limburger';
	    if( $code == 'ln' ) $lenguaje = 'Lingala';
	    if( $code == 'lo' ) $lenguaje = 'Lao';
	    if( $code == 'lt' ) $lenguaje = 'Lithuanian';
	    if( $code == 'lu' ) $lenguaje = 'Luba-Katanga';
	    if( $code == 'lv' ) $lenguaje = 'Latvian';
	    if( $code == 'mg' ) $lenguaje = 'Malagasy';
	    if( $code == 'mh' ) $lenguaje = 'Marshallese';
	    if( $code == 'mi' ) $lenguaje = 'Maori';
	    if( $code == 'mk' ) $lenguaje = 'Macedonian';
	    if( $code == 'ml' ) $lenguaje = 'Malayalam';
	    if( $code == 'mn' ) $lenguaje = 'Mongolian';
	    if( $code == 'mr' ) $lenguaje = 'Marathi (Marāṭhī)';
	    if( $code == 'ms' ) $lenguaje = 'Malay';
	    if( $code == 'mt' ) $lenguaje = 'Maltese';
	    if( $code == 'my' ) $lenguaje = 'Burmese';
	    if( $code == 'na' ) $lenguaje = 'Nauru';
	    if( $code == 'nb' ) $lenguaje = 'Norwegian Bokmål';
	    if( $code == 'nd' ) $lenguaje = 'North Ndebele';
	    if( $code == 'ne' ) $lenguaje = 'Nepali';
	    if( $code == 'ng' ) $lenguaje = 'Ndonga';
	    if( $code == 'nl' ) $lenguaje = 'Dutch';
	    if( $code == 'nn' ) $lenguaje = 'Norwegian Nynorsk';
	    if( $code == 'no' ) $lenguaje = 'Norwegian';
	    if( $code == 'nr' ) $lenguaje = 'South Ndebele';
	    if( $code == 'nv' ) $lenguaje = 'Navajo; Navaho';
	    if( $code == 'ny' ) $lenguaje = 'Chichewa; Chewa; Nyanja';
	    if( $code == 'oc' ) $lenguaje = 'Occitan';
	    if( $code == 'oj' ) $lenguaje = 'Ojibwe; Ojibwa';
	    if( $code == 'om' ) $lenguaje = 'Oromo';
	    if( $code == 'or' ) $lenguaje = 'Oriya';
	    if( $code == 'os' ) $lenguaje = 'Ossetian; Ossetic';
	    if( $code == 'pa' ) $lenguaje = 'Panjabi; Punjabi';
	    if( $code == 'pi' ) $lenguaje = 'Pali';
	    if( $code == 'pl' ) $lenguaje = 'Polish';
	    if( $code == 'ps' ) $lenguaje = 'Pashto; Pushto';
	    if( $code == 'pt' ) $lenguaje = 'Portuguese';
	    if( $code == 'qu' ) $lenguaje = 'Quechua';
	    if( $code == 'rm' ) $lenguaje = 'Romansh';
	    if( $code == 'rn' ) $lenguaje = 'Kirundi';
	    if( $code == 'ro' ) $lenguaje = 'Romanian; Moldavian; Moldovan';
	    if( $code == 'ru' ) $lenguaje = 'Russian';
	    if( $code == 'rw' ) $lenguaje = 'Kinyarwanda';
	    if( $code == 'sa' ) $lenguaje = 'Sanskrit (Saṁskṛta)';
	    if( $code == 'sc' ) $lenguaje = 'Sardinian';
	    if( $code == 'sd' ) $lenguaje = 'Sindhi';
	    if( $code == 'se' ) $lenguaje = 'Northern Sami';
	    if( $code == 'sg' ) $lenguaje = 'Sango';
	    if( $code == 'si' ) $lenguaje = 'Sinhala; Sinhalese';
	    if( $code == 'sk' ) $lenguaje = 'Slovak';
	    if( $code == 'sl' ) $lenguaje = 'Slovene';
	    if( $code == 'sm' ) $lenguaje = 'Samoan';
	    if( $code == 'sn' ) $lenguaje = 'Shona';
	    if( $code == 'so' ) $lenguaje = 'Somali';
	    if( $code == 'sq' ) $lenguaje = 'Albanian';
	    if( $code == 'sr' ) $lenguaje = 'Serbian';
	    if( $code == 'ss' ) $lenguaje = 'Swati';
	    if( $code == 'st' ) $lenguaje = 'Southern Sotho';
	    if( $code == 'su' ) $lenguaje = 'Sundanese';
	    if( $code == 'sv' ) $lenguaje = 'Swedish';
	    if( $code == 'sw' ) $lenguaje = 'Swahili';
	    if( $code == 'ta' ) $lenguaje = 'Tamil';
	    if( $code == 'te' ) $lenguaje = 'Telugu';
	    if( $code == 'tg' ) $lenguaje = 'Tajik';
	    if( $code == 'th' ) $lenguaje = 'Thai';
	    if( $code == 'ti' ) $lenguaje = 'Tigrinya';
	    if( $code == 'tk' ) $lenguaje = 'Turkmen';
	    if( $code == 'tl' ) $lenguaje = 'Tagalog';
	    if( $code == 'tn' ) $lenguaje = 'Tswana';
	    if( $code == 'to' ) $lenguaje = 'Tonga (Tonga Islands)';
	    if( $code == 'tr' ) $lenguaje = 'Turkish';
	    if( $code == 'ts' ) $lenguaje = 'Tsonga';
	    if( $code == 'tt' ) $lenguaje = 'Tatar';
	    if( $code == 'tw' ) $lenguaje = 'Twi';
	    if( $code == 'ty' ) $lenguaje = 'Tahitian';
	    if( $code == 'ug' ) $lenguaje = 'Uighur; Uyghur';
	    if( $code == 'uk' ) $lenguaje = 'Ukrainian';
	    if( $code == 'ur' ) $lenguaje = 'Urdu';
	    if( $code == 'uz' ) $lenguaje = 'Uzbek';
	    if( $code == 've' ) $lenguaje = 'Venda';
	    if( $code == 'vi' ) $lenguaje = 'Vietnamese';
	    if( $code == 'vo' ) $lenguaje = 'Volapük';
	    if( $code == 'wa' ) $lenguaje = 'Walloon';
	    if( $code == 'wo' ) $lenguaje = 'Wolof';
	    if( $code == 'xh' ) $lenguaje = 'Xhosa';
	    if( $code == 'yi' ) $lenguaje = 'Yiddish';
	    if( $code == 'yo' ) $lenguaje = 'Yoruba';
	    if( $code == 'za' ) $lenguaje = 'Zhuang; Chuang';
	    if( $code == 'zh' ) $lenguaje = 'Chinese';
	    if( $code == 'zu' ) $lenguaje = 'Zulu';
	    if( $lenguaje == '') $lenguaje = $code;
    	return $lenguaje;
	}

    public static function languageList()
    {
    	$languages = array(
		    'aa' => 'Afar',
		    'ab' => 'Abkhaz',
		    'ae' => 'Avestan',
		    'af' => 'Afrikaans',
		    'ak' => 'Akan',
		    'am' => 'Amharic',
		    'an' => 'Aragonese',
		    'ar' => 'Arabic',
		    'as' => 'Assamese',
		    'av' => 'Avaric',
		    'ay' => 'Aymara',
		    'az' => 'Azerbaijani',
		    'ba' => 'Bashkir',
		    'be' => 'Belarusian',
		    'bg' => 'Bulgarian',
		    'bh' => 'Bihari',
		    'bi' => 'Bislama',
		    'bm' => 'Bambara',
		    'bn' => 'Bengali',
		    'bo' => 'Tibetan Standard, Tibetan, Central',
		    'br' => 'Breton',
		    'bs' => 'Bosnian',
		    'ca' => 'Catalan; Valencian',
		    'ce' => 'Chechen',
		    'ch' => 'Chamorro',
		    'co' => 'Corsican',
		    'cr' => 'Cree',
		    'cs' => 'Czech',
		    'cu' => 'Old Church Slavonic, Church Slavic, Church Slavonic, Old Bulgarian, Old Slavonic',
		    'cv' => 'Chuvash',
		    'cy' => 'Welsh',
		    'da' => 'Danish',
		    'de' => 'German',
		    'dv' => 'Divehi; Dhivehi; Maldivian;',
		    'dz' => 'Dzongkha',
		    'ee' => 'Ewe',
		    'el' => 'Greek, Modern',
		    'en' => 'English',
		    'eo' => 'Esperanto',
		    'es' => 'Spanish; Castilian',
		    'et' => 'Estonian',
		    'eu' => 'Basque',
		    'fa' => 'Persian',
		    'ff' => 'Fula; Fulah; Pulaar; Pular',
		    'fi' => 'Finnish',
		    'fj' => 'Fijian',
		    'fo' => 'Faroese',
		    'fr' => 'French',
		    'fy' => 'Western Frisian',
		    'ga' => 'Irish',
		    'gd' => 'Scottish Gaelic; Gaelic',
		    'gl' => 'Galician',
		    'gn' => 'GuaranÃ­',
		    'gu' => 'Gujarati',
		    'gv' => 'Manx',
		    'ha' => 'Hausa',
		    'he' => 'Hebrew (modern)',
		    'hi' => 'Hindi',
		    'ho' => 'Hiri Motu',
		    'hr' => 'Croatian',
		    'ht' => 'Haitian; Haitian Creole',
		    'hu' => 'Hungarian',
		    'hy' => 'Armenian',
		    'hz' => 'Herero',
		    'ia' => 'Interlingua',
		    'id' => 'Indonesian',
		    'ie' => 'Interlingue',
		    'ig' => 'Igbo',
		    'ii' => 'Nuosu',
		    'ik' => 'Inupiaq',
		    'io' => 'Ido',
		    'is' => 'Icelandic',
		    'it' => 'Italian',
		    'iu' => 'Inuktitut',
		    'ja' => 'Japanese (ja)',
		    'jv' => 'Javanese (jv)',
		    'ka' => 'Georgian',
		    'kg' => 'Kongo',
		    'ki' => 'Kikuyu, Gikuyu',
		    'kj' => 'Kwanyama, Kuanyama',
		    'kk' => 'Kazakh',
		    'kl' => 'Kalaallisut, Greenlandic',
		    'km' => 'Khmer',
		    'kn' => 'Kannada',
		    'ko' => 'Korean',
		    'kr' => 'Kanuri',
		    'ks' => 'Kashmiri',
		    'ku' => 'Kurdish',
		    'kv' => 'Komi',
		    'kw' => 'Cornish',
		    'ky' => 'Kirghiz, Kyrgyz',
		    'la' => 'Latin',
		    'lb' => 'Luxembourgish, Letzeburgesch',
		    'lg' => 'Luganda',
		    'li' => 'Limburgish, Limburgan, Limburger',
		    'ln' => 'Lingala',
		    'lo' => 'Lao',
		    'lt' => 'Lithuanian',
		    'lu' => 'Luba-Katanga',
		    'lv' => 'Latvian',
		    'mg' => 'Malagasy',
		    'mh' => 'Marshallese',
		    'mi' => 'Maori',
		    'mk' => 'Macedonian',
		    'ml' => 'Malayalam',
		    'mn' => 'Mongolian',
		    'mr' => 'Marathi (Marāṭhī)',
		    'ms' => 'Malay',
		    'mt' => 'Maltese',
		    'my' => 'Burmese',
		    'na' => 'Nauru',
		    'nb' => 'Norwegian Bokmål',
		    'nd' => 'North Ndebele',
		    'ne' => 'Nepali',
		    'ng' => 'Ndonga',
		    'nl' => 'Dutch',
		    'nn' => 'Norwegian Nynorsk',
		    'no' => 'Norwegian',
		    'nr' => 'South Ndebele',
		    'nv' => 'Navajo, Navaho',
		    'ny' => 'Chichewa; Chewa; Nyanja',
		    'oc' => 'Occitan',
		    'oj' => 'Ojibwe, Ojibwa',
		    'om' => 'Oromo',
		    'or' => 'Oriya',
		    'os' => 'Ossetian, Ossetic',
		    'pa' => 'Panjabi, Punjabi',
		    'pi' => 'Pali',
		    'pl' => 'Polish',
		    'ps' => 'Pashto, Pushto',
		    'pt' => 'Portuguese',
		    'qu' => 'Quechua',
		    'rm' => 'Romansh',
		    'rn' => 'Kirundi',
		    'ro' => 'Romanian, Moldavian, Moldovan',
		    'ru' => 'Russian',
		    'rw' => 'Kinyarwanda',
		    'sa' => 'Sanskrit (Saṁskṛta)',
		    'sc' => 'Sardinian',
		    'sd' => 'Sindhi',
		    'se' => 'Northern Sami',
		    'sg' => 'Sango',
		    'si' => 'Sinhala, Sinhalese',
		    'sk' => 'Slovak',
		    'sl' => 'Slovene',
		    'sm' => 'Samoan',
		    'sn' => 'Shona',
		    'so' => 'Somali',
		    'sq' => 'Albanian',
		    'sr' => 'Serbian',
		    'ss' => 'Swati',
		    'st' => 'Southern Sotho',
		    'su' => 'Sundanese',
		    'sv' => 'Swedish',
		    'sw' => 'Swahili',
		    'ta' => 'Tamil',
		    'te' => 'Telugu',
		    'tg' => 'Tajik',
		    'th' => 'Thai',
		    'ti' => 'Tigrinya',
		    'tk' => 'Turkmen',
		    'tl' => 'Tagalog',
		    'tn' => 'Tswana',
		    'to' => 'Tonga (Tonga Islands)',
		    'tr' => 'Turkish',
		    'ts' => 'Tsonga',
		    'tt' => 'Tatar',
		    'tw' => 'Twi',
		    'ty' => 'Tahitian',
		    'ug' => 'Uighur, Uyghur',
		    'uk' => 'Ukrainian',
		    'ur' => 'Urdu',
		    'uz' => 'Uzbek',
		    've' => 'Venda',
		    'vi' => 'Vietnamese',
		    'vo' => 'Volapük',
		    'wa' => 'Walloon',
		    'wo' => 'Wolof',
		    'xh' => 'Xhosa',
		    'yi' => 'Yiddish',
		    'yo' => 'Yoruba',
		    'za' => 'Zhuang, Chuang',
		    'zh' => 'Chinese',
		    'zu' => 'Zulu',
		);
		return $languages;
    }
}
