class clientChrono
{

	constructor (id)
	{

	}
}
$(document).ready(function (){

    $('#j-file-btn').on({
        click : function()
        {
          $('#j-file-input-ajax').trigger('click');
        },
    });

    $('#j-upload-rlt').css({
        background: 'url"../admin/img/preloader.gif")'
    });

    $('#j-file-input-ajax').on({
        change : function () {
            $.ajax({
                url : 'postuplod',
                data: new FormData($('#postform')[0]),
                type: 'post',
                dataType: 'html',
                processData: false,
                contentType: false,
                xhr: function()
                {
                    var xhr = new XMLHttpRequest();

                    xhr.upload.addEventListener('progress', function (e) {
                        /*$('#j-upload-rlt').css({
                            //background: url("../admin/img/preloader.gif"),
                            width: 50,
                            height: 50
                        });*/
                    }, false);

                    xhr.upload.addEventListener('load', function (e) {
                        /*$('#j-upload-rlt').css({
                            background: ''
                        });*/
                    }, false);

                    return xhr;
                },
                success: function (code, status)
                {
                    $('#j-upload-rlt').html(code);
                },
                error: function (code, status, error)
                {

                }
            });
        },
    });
});


/* ----------------------------------------
/*|----------------------------------------
/*|       Fonctions
/*|--------------------------------------- */



function supprimer(nb)
{
    $.ajax({
        url : 'imgsup',
        data: 'nb='+nb,
        type: 'get',
        dataType: 'html',
        processData: false,
        contentType: false,
        success: function (code, status)
        {
            $('#j-upload-rlt').html(code);
        },
        error: function (code, status, error)
        {

        }
    });
}

function supprimerTout()
{
    supprimer(-1);
}