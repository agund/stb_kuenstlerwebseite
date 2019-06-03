
$(document).ready(function()
{
    if($("#isKuenstler").is(':checked'))
    $('#submenu').removeClass('submenu_hidden').addClass('submenu_show');
    else
    $('#submenu').removeClass('submenu_show').addClass('submenu_hidden');
    $("#isKuenstler").click(function () {
        if ($(this).is(':checked')) 
        $('#submenu').removeClass('submenu_hidden').addClass('submenu_show');
        else 
        $('#submenu').removeClass('submenu_show').addClass('submenu_hidden');
    });

    
});