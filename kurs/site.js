$( document ).ready(function() {

    $('#selUser').change(function(){
        window.location.href = 'index.php?u='+$('#selUser').val();
    });

    var mon = ("00" + (parseInt(new Date().getMonth())+1)).slice(-2);
    var day = ("00" + new Date().getDate()).slice(-2);
    $('input:enabled[type="date"]').val(new Date().getFullYear()+'-'+mon+'-'+day);

    //$('.dropdown-menu a.dropdown-toggle').on('click',
    //function(e){
    //    if(!$(this).next().hasClass('show')){
    //        $(this).parents('.dropdown-menu').first().find('.show').removeClass('show');
    //    }
    //    var $subMenu = $(this).next('.dropdown-menu');
    //    $subMenu.toggleClass('show');
//
    //    $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown',
    //    function(e){
    //        $('.dropdown-submenu .show').removeClass('show');
    //    });
    //    return false;
    //});

});

function changeGewinn(index)
{
    var vk = $('#vk_'+index).val();
    var ek = $('#ek_'+index).html();
    var st = $('#stueck_'+index).html();
    var ekp = ek * st;
    var vkp = vk * st;
    var gewinn = vkp - ekp;
    if(vk == ''){
        $('#gewinn_'+index).html('');
    } else {
        $('#gewinn_'+index).html(gewinn.toFixed(3));   
        if(gewinn >= 0 )
        {
            $('#gewinn_'+index).prop('style','color:green;');
        } else {
            $('#gewinn_'+index).prop('style','color:red;');
        }
    }
}