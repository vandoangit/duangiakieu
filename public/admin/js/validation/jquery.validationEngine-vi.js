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
                //Check input gia tri mac dinh vi du:rong,chua chon option.Call:required.Rules:alertText,alertTextCheckboxMultiple,alertTextCheckboxe
                //Check input vi du:hominhtri:neu gia tri cau no =hominhtri thi flase . Call:exemptString[gia_tri_mac_dinh].Rules:alertText[required]
                "required":{
                    "regex":"none",
                    "alertText":"* Không được để trống...!",
                    "alertTextCheckboxMultiple":"* Please select an option",
                    "alertTextCheckboxe":"* This checkbox is required"
                },
                //Check input gia tri mac dinh vi du:rong.Call:content[cau thong bao].Rules:alertText
                "content":{
                    "regex":"none",
                    "alertText":"* Không được để trống..!"
                },
                //Kiem tra chieu dai chuoi.Vi du:chuoi nam trong khoang.Call:length[begin,end].Rule:alertText,alertText2,alertText3						
                "length":{
                    "regex":"none",
                    "alertText":"* Phải nhập từ ",
                    "alertText2":" đến ",
                    "alertText3":" ký tự"
                },
                //Kiem tra muc select co chon chua.Vi du:value=-1.Call:custom_select[NameRule].Rule:regex,alertText
                "customRegex_select":{
                    "regex":"none",
                    "alertText":"* Chưa chọn danh mục "
                },
                //Chua biet	
                "maxCheckbox":{
                    "regex":"none",
                    "alertText":"* Checks allowed Exceeded"
                },
                //Chua biet 	
                "minCheckbox":{
                    "regex":"none",
                    "alertText":"* Please select ",
                    "alertText2":" options"
                },
                //Check gia tri 2 file co giong nhau khong.Call confirm[ten file 2].Rules:alertText	
                "confirm":{
                    "regex":"none",
                    "alertText":"* "
                },
                //Kiem tra theo chuoi chuan tac.Vi du: chuoi nhap vao khong dung.Call:custom[NameRule].Rule:regex,alertText
                "custom_account":{
                    "regex":"/^[a-zA-Z][\.a-zA-Z0-9_-]{6,}[a-zA-Z0-9]+$/",
                    "alertText":"* Tài khoản ít nhất 8 ký tự<br/>* Chỉ được nhập 0-9,a-z,A-Z,(_),(-),(.)"
                },
                "custom_pass":{
                    "regex":"/^[a-zA-Z0-9]{8,}$/",
                    "alertText":"* Mật khẩu ít nhất 8 ký tự<br/>* Chỉ được nhập 0-9,a-z,A-Z"
                },
                "custom_pass_require":{
                    "regex":"/^([a-zA-Z0-9]{8,})?$/",
                    "alertText":"* Mật khẩu ít nhất 8 ký tự<br/>* Chỉ được nhập 0-9,a-z,A-Z"
                },
                "custom_email":{
                    "regex":"/^([a-zA-Z0-9\+_\-]+)(\.[a-zA-Z0-9\+_\-]+)*@([a-zA-Z0-9\-]+\.)+[a-zA-Z]{2,6}$/",
                    "alertText":"* Địa chỉ email không đúng định dạng!"
                },
                "custom_telephone":{
                    "regex":"/^([0-9]{11}|[0-9]{10})?$/",
                    "alertText":"* Số điện thoại không đúng định dạng!"
                },
                "custom_date":{
                    "regex":"/^[0-9]{1,2}-[0-9]{1,2}-[0-9]{4}$/",
                    "alertText":"*Ngày không đúng định dạng (DD-MM-YYYY)"
                },
                "custom_onlyNumber":{
                    "regex":"/^[0-9]*$/",
                    "alertText":"* Chỉ được nhập số...!"
                },
				"custom_onlyNumber_format":{
                    "regex":"/^[0-9\.\,]*$/",
                    "alertText":"* Chỉ được nhập số...!"
                },
                "custom_support_nick":{
                    "regex":"/^([a-zA-Z0-9\+_\-]+)(\.[a-zA-Z0-9\+_\-]+)*$/",
                    "alertText":"* Nickname không hợp lệ...!"
                },
                "custom_product_id":{
                    "regex":"/^([-a-zA-Z0-9_-])+$/",
                    "alertText":"* Mã Sản Phẩm không hợp lệ...!"
                },
                //Kiem tra theo chuoi chuan tac.Vi du: chuoi nhap vao khong dung.Call:custom[NameRule].Rule:regex,alertText vi

                "custom_vi_user_name":{
                    "regex":"/^[a-zA-Z0-9_-]{4,}$/",
                    "alertText":"* Tên ít nhất 4 ký tự<br/>* Chỉ được nhập 0-9,a-z,A-Z"
                },
                "custom_vi_support_name":{
                    "regex":"/^[a-zA-Z0-9_-]{4,}$/",
                    "alertText":"* Tên ít nhất 4 ký tự<br/>* Chỉ được nhập 0-9,a-z,A-Z"
                },
                "custom_vi_user_group_name":{
                    "regex":"/^[a-zA-Z0-9_-]{4,}$/",
                    "alertText":"* Tên User Group ít nhất 4 ký tự<br/>* Chỉ được nhập 0-9,a-z,A-Z"
                },
                //Thuc hien ajax

                "ajaxAccountUser":{
                    "file":base_url_root_admin + "user/check_user_account",
                    "alertTextOk":"* Có thể sử dụng",
                    "alertTextLoad":"* Đang kiểm tra, hãy đợi...",
                    "alertText":"* Đã tồn tại"
                },
                "ajaxAccountUserExist":{
                    "file":base_url_root_admin + "user/check_user_account_exist",
                    "alertTextOk":"* Có thể sử dụng",
                    "alertTextLoad":"* Đang kiểm tra, hãy đợi...",
                    "alertText":"* Không tồn tại"
                },
                "ajaxProductID":{
                    "file":base_url_root_admin + $('#hidden_input_menu_class').val() + "/check_product_id",
                    "alertTextOk":"* Có thể sử dụng",
                    "alertTextLoad":"* Đang kiểm tra, hãy đợi...",
                    "alertText":"* Đã tồn tại"
                },
                "test":{
                    "regex":"/^[0-9]+$/",
                    "alertText":"* Chỉ được nhập số"
                }
            }
        }
    }
})(jQuery);