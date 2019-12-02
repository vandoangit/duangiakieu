/*******************************************************************************
 
 Ghi chú:hoàn thành ngày 27-07-2015
 Copyright :Hồ Minh Trí
 
 ******************************************************************************/

(function($){
    $.fn.validationEngineLanguage=function(){
    };
    $.validationEngineLanguage={
        newLang:function(){
            $.validationEngineLanguage.allRules={
                "required":{// Add your regex rules here, you can take telephone as an example
                    "regex":"none",
                    "alertText":"* このフィールドが必要です",
                    "alertTextCheckboxMultiple":"* オプションを選択してください",
                    "alertTextCheckboxe":"* このチェックボックスが必要です"
                },
                "length":{
                    "regex":"none",
                    "alertText":"*間 ",
                    "alertText2":" と ",
                    "alertText3":" 文字は許可されて"
                },
                "content":{
                    "regex":"none",
                    "alertText":"* "
                },
                "maxCheckbox":{
                    "regex":"none",
                    "alertText":"* チェックが超過を許可"
                },
                "minCheckbox":{
                    "regex":"none",
                    "alertText":"* 選択してください。 ",
                    "alertText2":" オプション"
                },
                "confirm":{
                    "regex":"none",
                    "alertText":"* あなたのフィールドが一致されていない"
                },
                "telephone":{
                    "regex":"/^[0-9\-\(\)\ ]+$/",
                    "alertText":"* 無効な電話番号"
                },
                "email":{
                    "regex":"/^[a-zA-Z0-9_\.\-]+\@([a-zA-Z0-9\-]+\.)+[a-zA-Z0-9]{2,4}$/",
                    "alertText":"* 無効なメールアドレス"
                },
                "date":{
                    "regex":"/^[0-9]{4}\-\[0-9]{1,2}\-\[0-9]{1,2}$/",
                    "alertText":"* 日付が無効です、YYYY - MM - DDの形式である必要があります"
                },
                "onlyNumber":{
                    "regex":"/^[0-9\ ]+$/",
                    "alertText":"* 数値のみ"
                },
                "noSpecialCaracters":{
                    "regex":"/^[0-9a-zA-Z-]+$/",
                    "alertText":"* 許可されて特殊文字"
                },
                "ajaxUser":{
                    "file":"http://localhost:81/binhminh/account/validateUser",
                    "extraData":"name=eric",
                    "alertTextOk":"* This user is available",
                    "alertTextLoad":"* Loading, please wait",
                    "alertText":"* This user is already taken"
                },
                "ajaxName":{
                    "file":"http://localhost:81/binhminh/account/validateEmail",
                    "alertText":"* This email is already taken",
                    "alertTextOk":"* This email is available",
                    "alertTextLoad":"* Loading, please wait"
                },
                "checkEmail":{
                    "file":"http://giongcaytrongbinhminh.com//binhminh/account/checkEmail",
                    "alertText":"* This email is already taken",
                    "alertTextOk":"* This email is available",
                    "alertTextLoad":"* Loading, please wait"
                },
                "checkQuestion":{
                    "file":"http://giongcaytrongbinhminh.com//binhminh/faq/checkQuestion",
                    "alertText":"* This question is already taken",
                    "alertTextOk":"* This question is available",
                    "alertTextLoad":"* Loading, please wait"
                },
                "ajaxCode":{
                    "file":"http://giongcaytrongbinhminh.com//binhminh/account/validateCode",
                    "alertText":"* Code security is correct",
                    "alertTextOk":"* Code security is available",
                    "alertTextLoad":"* Loading, please wait"
                },
                "onlyLetter":{
                    "regex":"/^[a-zA-Z-\ \']+$/",
                    "alertText":"* 文字のみ"
                },
                "validate2fields":{
                    "nname":"validate2fields",
                    "alertText":"* You must have a firstname and a lastname"
                }
            }

        }
    }
})(jQuery);