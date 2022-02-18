window.addEventListener('scroll', scroll)
mdui.$('.mdui-appbar').addClass('no-shadow');
function scroll() {
    let scrollTop = window.pageYOffset ||document.documentElement.scrollTop|| document.body.scrollTop || 0;
    let Height = window.innerHeight || document.documentElement.clientHeight
    if (scrollTop > 0.05 * Height) 
    {
        if (mdui.$('.mdui-appbar').hasClass('no-shadow'))
        {
            mdui.$('.mdui-appbar').removeClass('no-shadow'); 
        }    
    }
    else
    {
        mdui.$('.mdui-appbar').addClass('no-shadow'); 
    }
}
