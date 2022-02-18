var $ = mdui.$;
$('.night').hide()
let theme = "light";
/**
 * 添加暗色主题
 */
function addDarkTheme() {
$('body').addClass('mdui-theme-layout-dark');
$('.mdui-toolbar').removeClass('mdui-toolbar-light');
$('.mdui-toolbar').addClass('mdui-toolbar-dark');
$('.day').hide();
$('.night').show();
mdui.mutation();
}
/**
 * 移除暗色主题
 */
function removeDarkTheme() {
$('body').removeClass('mdui-theme-layout-dark');
$('.mdui-toolbar').addClass('mdui-toolbar-light');
$('.mdui-toolbar').removeClass('mdui-toolbar-dark');
$('.night').hide();
$('.day').show();
mdui.mutation();
}
/**
 * 切换主题
 */
const changeTheme = () => {
if (theme === "light") {
    addDarkTheme();
    theme = "dark";
} else {
    removeDarkTheme();
    theme = "light";
}
};
let prefersDarkMode = window.matchMedia('(prefers-color-scheme: dark)').matches;
if (prefersDarkMode) {
    changeTheme();
}