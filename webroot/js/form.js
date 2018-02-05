$(document).on('click', "#signup_button", function(e) {

 console.log(1);  
   
    
$("#signin_form").hide();
$("#signup_form").show();
$("#signup_button").hide();


})

$(document).ready(function() {
 
 $.extend($.validator.messages, {
    required: "<div style='min-width: 1000px;'><span style='color:red '>Это поле обязательно для заполнения  </span></div>",
    maxlength: $.validator.format("<div style='min-width: 1000px;'><span style='color:red'>Максимальная длина  {0} символа.         </span></div>"),
    minlength: $.validator.format("<div style='min-width: 1000px;'><span style='color:red'>Минимальная длина  {0} символов.         </span></div>"),
    email: "<div style='min-width: 1000px;'><span style='color:red'>Введите корректную почту            </span></div>",
});   
   
   
   
    
 $.validator.addMethod("regex", function(value, element, regexpr) {          
     return regexpr.test(value);
   }, "<span style='color:red'>Введите имя без пробелов и спецсимволов</span>");
   
   
$.validator.addMethod("regex_area", function(value, element, regexpr) {
    return regexpr.test(value);
   }, "<span style='color:red'>Введите имя без пробелов и спецсимволов</span>");   

$("#signup_form").validate({
    
   
  rules: {name: {required: true,
                 minlength: 3,
                 maxlength: 30,
                 regex:/(^[A-Za-zа-яёА-ЯЁ0-9]+[\s+]?[A-Za-zа-яёА-ЯЁ0-9\s]+?$)/
  },
          email: {required: true,
                      email: true
          } ,
          password: {required: true,
                    minlength: 3,
                    maxlength: 30,
                    regex_area:/(^[A-Za-zа-яёА-ЯЁ0-9]+[\s+]?[A-Za-zа-яёА-ЯЁ0-9\s]+?$)/
          } ,
          category: {select: true,} 
        },
  
     
    });
  
  
 



 
 
 
}); 
        