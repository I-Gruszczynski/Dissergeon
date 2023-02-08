

const login = document.querySelector("#header_login_log");
const login_box = document.querySelector("#login_box");
const main = document.querySelector("main");
const login_box_close = document.querySelector("#login_box_close");

const register = document.querySelector("#header_login_register");
const register_box = document.querySelector("#register_box");
const register_box_close = document.querySelector("#register_box_close");

const toggleMenu = document.querySelector("#header_toggle-menu");
const header_list_ul = document.querySelector("#header_list_ul");
const header_list = document.querySelector("#header_list");
const header_login = document.querySelector("#header_login");

const header_list_li = document.querySelectorAll(".header_list_li");

const btn_register = document.querySelector("#register_box_btn");

const page = document.querySelectorAll(".page");

const content = document.querySelector("#content");
const article = document.querySelectorAll("article");

const commentTextButton = document.querySelector("#main_comment_textarea_button");
const commentTextResult = document.querySelector("#main_comment_result");
if(document.querySelector("#main_comment_input") != null)
{
const main_comment_input = document.querySelector("#main_comment_input").value.length;
}
const main_comment_input_button = document.querySelector("#main_comment_input_button");

content.style.height = article.length*1000;
main.style.height = article.length*1000;


login.addEventListener("click", function(){
    login_box.style.display = "block";
    register_box.style.display = "none";
    main.style.opacity = 0.8;
    console.log("Hello worldd!"); 
});


login_box_close.addEventListener("click", function(){
    login_box.style.display = "none";
    main.style.opacity = 1;
});

register.addEventListener("click", function(){
    register_box.style.display = "block";
    login_box.style.display = "none";
    main.style.opacity = 0.8;
});

register_box_close.addEventListener("click", function(){
    register_box.style.display = "none";
    main.style.opacity = 1;
});

if(login_box.style.display == "block")
{
    register_box.style.display = "none";
}
var couter = 1;
toggleMenu.addEventListener("click", function(){

    if(couter%2)
    {
    header_list_ul.style.height="220px";
    header_list.style.height="220px";
    header_login.style.height="60px";
    couter++;
    }
    else
    {
    header_list_ul.style.height="1px";
    header_list.style.height="1px";
    header_login.style.height="0px";
    couter++;
    }
});
/*
btn_register.addEventListener("click", function(){
    login.style.color = "green";
    register_box.style.display = "block";
    login_box.style.display = "none";
    main.style.opacity = 0.8;
    console.log("Btn rejestrujacy");
});*/
for(let i=0;i<page.length;i++)
{
    page[i].addEventListener("click", function()
    {
        console.log("Strona "+[i+1]);
    });
}
function countChars(obj){
    var strLength = obj.value.length;
    if(strLength <=0 )
    {
        main_comment_input_button.style.backgroundColor = "rgb(66, 66, 66)";
        main_comment_input_button.style.color = "rgb(24, 24, 24)";
        main_comment_input_button.style.pointerEvents = true; 
        main_comment_input_button.style.coursor = auto; 
        console.log("Mniejsze lub równe"+main_comment_input);
    }
    else
    {
        main_comment_input_button.style.backgroundColor = "rgb(1, 63, 207)";
        main_comment_input_button.style.color = "rgb(255, 255, 255)";
        main_comment_input_button.style.pointerEvents = false; 
        main_comment_input_button.style.coursor = pointer; 
        console.log("Większe"+main_comment_input);
    }
}
console.log("Input: "+main_comment_input);

