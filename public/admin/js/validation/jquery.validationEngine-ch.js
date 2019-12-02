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
                    "alertText":"* 此字段是必需的",
                    "alertTextCheckboxMultiple":"* 請選擇一個選項",
                    "alertTextCheckboxe":"* 此複選框是必需的"
                },
                "length":{
                    "regex":"none",
                    "alertText":"* 之間 ",
                    "alertText2":" 和 ",
                    "alertText3":" 允許的字符"
                },
                "content":{
                    "regex":"none",
                    "alertText":"* "
                },
                "maxCheckbox":{
                    "regex":"none",
                    "alertText":"* 超出允許檢查"
                },
                "minCheckbox":{
                    "regex":"none",
                    "alertText":"* 請選擇 ",
                    "alertText2":" 選項"
                },
                "confirm":{
                    "regex":"none",
                    "alertText":"* 您的字段不匹配"
                },
                "telephone":{
                    "regex":"/^[0-9\-\(\)\ ]+$/",
                    "alertText":"* 無效的電話號碼"
                },
                "email":{
                    "regex":"/^[a-zA-Z0-9_\.\-]+\@([a-zA-Z0-9\-]+\.)+[a-zA-Z0-9]{2,4}$/",
                    "alertText":"* 電子郵件地址無效"
                },
                "date":{
                    "regex":"/^[0-9]{4}\-\[0-9]{1,2}\-\[0-9]{1,2}$/",
                    "alertText":"* 無效的日期，必須採用 yyyy - MM - DD格式"
                },
                "onlyNumber":{
                    "regex":"/^[0-9\ ]+$/",
                    "alertText":"* 數字只"
                },
                "noSpecialCaracters":{
                    "regex":"/^[0-9a-zA-Z-]+$/",
                    "alertText":"* 沒有特殊字符不允許"
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
                    "alertText":"* 英皇只"
                },
                "validate2fields":{
                    "nname":"validate2fields",
                    "alertText":"* You must have a firstname and a lastname"
                }
            }

        }
    }
})(jQuery);