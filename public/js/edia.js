server = domain+'/';
domain_nohttp = domain.replace('http://', '');

loading = '<div class="wrapper"> <svg class="hourglass" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 120 206" preserveAspectRatio="none"> <path class="middle" d="M120 0H0v206h120V0zM77.1 133.2C87.5 140.9 92 145 92 152.6V178H28v-25.4c0-7.6 4.5-11.7 14.9-19.4 6-4.5 13-9.6 17.1-17 4.1 7.4 11.1 12.6 17.1 17zM60 89.7c-4.1-7.3-11.1-12.5-17.1-17C32.5 65.1 28 61 28 53.4V28h64v25.4c0 7.6-4.5 11.7-14.9 19.4-6 4.4-13 9.6-17.1 16.9z"/> <path class="outer" d="M93.7 95.3c10.5-7.7 26.3-19.4 26.3-41.9V0H0v53.4c0 22.5 15.8 34.2 26.3 41.9 3 2.2 7.9 5.8 9 7.7-1.1 1.9-6 5.5-9 7.7C15.8 118.4 0 130.1 0 152.6V206h120v-53.4c0-22.5-15.8-34.2-26.3-41.9-3-2.2-7.9-5.8-9-7.7 1.1-2 6-5.5 9-7.7zM70.6 103c0 18 35.4 21.8 35.4 49.6V192H14v-39.4c0-27.9 35.4-31.6 35.4-49.6S14 81.2 14 53.4V14h92v39.4C106 81.2 70.6 85 70.6 103z"/> </svg> </div>';

success = '<i class="fa fa-check" aria-hidden="true" style="font-size: 64px;padding-bottom: 20px;"></i>';

function pdf(url) {
    var transfer = $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: server+url,
        type: 'post',
        dataType: 'json',
        data: '',
        beforeSend: function(data) {
        },
        complete: function(data) {
        }
    });
}

function post(url, form) {
    var transfer = $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: server+url,
        type: 'post',
        dataType: 'json',
        data: $(form).serialize(),
        beforeSend: function(data) {
        },
        complete: function(data) {}
    });
}

function hostReachable() {

  // Handle IE and more capable browsers
  var xhr = new ( window.ActiveXObject || XMLHttpRequest )( "Microsoft.XMLHTTP" );
  var status;

  // Open new request as a HEAD to the root hostname with a random param to bust the cache
  xhr.open( "HEAD", "//"+domain_nohttp+"/", false );

  // Issue request and handle response
  try {
    xhr.send();
    return ( xhr.status >= 200 && (xhr.status < 300 || xhr.status === 304) );
} catch (error) {
    return false;
}

}

function viewPanel(url, nav) {
    $('#connect').html( "https://crm.zoho.com/crm/private/xml/");

    $('.view').removeClass('active');
    $('.'+nav).addClass('active');
    
    if(hostReachable() == true) {

        var transfer = $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: server+url,
            type: 'get',
            dataType: 'json',
            data: '',
            beforeSend: function(data) {
                $('#view').html('<div class="wrapper"> <svg class="hourglass" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 120 206" preserveAspectRatio="none"> <path class="middle" d="M120 0H0v206h120V0zM77.1 133.2C87.5 140.9 92 145 92 152.6V178H28v-25.4c0-7.6 4.5-11.7 14.9-19.4 6-4.5 13-9.6 17.1-17 4.1 7.4 11.1 12.6 17.1 17zM60 89.7c-4.1-7.3-11.1-12.5-17.1-17C32.5 65.1 28 61 28 53.4V28h64v25.4c0 7.6-4.5 11.7-14.9 19.4-6 4.4-13 9.6-17.1 16.9z"/> <path class="outer" d="M93.7 95.3c10.5-7.7 26.3-19.4 26.3-41.9V0H0v53.4c0 22.5 15.8 34.2 26.3 41.9 3 2.2 7.9 5.8 9 7.7-1.1 1.9-6 5.5-9 7.7C15.8 118.4 0 130.1 0 152.6V206h120v-53.4c0-22.5-15.8-34.2-26.3-41.9-3-2.2-7.9-5.8-9-7.7 1.1-2 6-5.5 9-7.7zM70.6 103c0 18 35.4 21.8 35.4 49.6V192H14v-39.4c0-27.9 35.4-31.6 35.4-49.6S14 81.2 14 53.4V14h92v39.4C106 81.2 70.6 85 70.6 103z"/> </svg> </div>');
            },
            complete: function(data) {
                var response = data.responseText;

                if (response.indexOf('Unauthenticated') !== -1) {
                    $('#view').html('Sie waren zu lange inaktiv und wurden automatisch abgemeldet.<br>Bitte melden Sie sich neu an: <a href="'+server+'login">Anmelden</a>');
                } else {
                    $('#view').html(response);
                }
            }
        });

    } else {
        $('#view').html('Es besteht anscheinend keine Verbindung zum Internet.');   
    }

    $('.modal-backdrop').remove();
    $('body').removeClass('modal-open');
}

function vu(url, to) {
    $('.vu-title').text('');
    $(to).html('<h2><div class="spinner"><div class="bounce1"></div><div class="bounce2"></div><div class="bounce3"></div></div></h2><h2></h2>');
    $('#connect').html( "https://crm.zoho.com/crm/private/xml/");
    
    setTimeout(function(){
        if(hostReachable() == true) {

            var transfer = $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: server+url,
                type: 'get',
                dataType: 'json',
                data: '',
                beforeSend: function(data) {
                    $(to).html('<h2><div class="spinner"><div class="bounce1"></div><div class="bounce2"></div><div class="bounce3"></div></div></h2><h2></h2>');
                },
                complete: function(data) {
                    var response = data.responseText;

                    if (response.indexOf('Unauthenticated') !== -1) {
                        $(to).html('Sie waren zu lange inaktiv und wurden automatisch abgemeldet.<br>Bitte melden Sie sich neu an: <a href="'+server+'login">Anmelden</a>');
                    } else {
                        $(to).html(response);
                    }
                }
            });

        } else {
            $(to).html('Es besteht anscheinend keine Verbindung zum Internet.');   
        }
    }, 200);

    $('.modal-backdrop').remove();
    $('body').removeClass('modal-open');
}

function viewPanel(url, nav) {
    $('.vu-title').text('');
    $('#connect').html( "https://crm.zoho.com/crm/private/xml/");

    $('.view').removeClass('active');
    $('.'+nav).addClass('active');
    
    if(hostReachable() == true) {

        var transfer = $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: server+url,
            type: 'get',
            dataType: 'json',
            data: '',
            beforeSend: function(data) {
                $('#view').html('<div class="wrapper"> <svg class="hourglass" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 120 206" preserveAspectRatio="none"> <path class="middle" d="M120 0H0v206h120V0zM77.1 133.2C87.5 140.9 92 145 92 152.6V178H28v-25.4c0-7.6 4.5-11.7 14.9-19.4 6-4.5 13-9.6 17.1-17 4.1 7.4 11.1 12.6 17.1 17zM60 89.7c-4.1-7.3-11.1-12.5-17.1-17C32.5 65.1 28 61 28 53.4V28h64v25.4c0 7.6-4.5 11.7-14.9 19.4-6 4.4-13 9.6-17.1 16.9z"/> <path class="outer" d="M93.7 95.3c10.5-7.7 26.3-19.4 26.3-41.9V0H0v53.4c0 22.5 15.8 34.2 26.3 41.9 3 2.2 7.9 5.8 9 7.7-1.1 1.9-6 5.5-9 7.7C15.8 118.4 0 130.1 0 152.6V206h120v-53.4c0-22.5-15.8-34.2-26.3-41.9-3-2.2-7.9-5.8-9-7.7 1.1-2 6-5.5 9-7.7zM70.6 103c0 18 35.4 21.8 35.4 49.6V192H14v-39.4c0-27.9 35.4-31.6 35.4-49.6S14 81.2 14 53.4V14h92v39.4C106 81.2 70.6 85 70.6 103z"/> </svg> </div>');
            },
            complete: function(data) {
                var response = data.responseText;

                if (response.indexOf('Unauthenticated') !== -1) {
                    $('#view').html('Sie waren zu lange inaktiv und wurden automatisch abgemeldet.<br>Bitte melden Sie sich neu an: <a href="'+server+'login">Anmelden</a>');
                } else {
                    $('#view').html(response);
                }
            }
        });

    } else {
        $('#view').html('Es besteht anscheinend keine Verbindung zum Internet.');   
    }

    $('.modal-backdrop').remove();
    $('body').removeClass('modal-open');
}

function ver(url, form) {
    var transfer = $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: server+url,
        type: 'post',
        dataType: 'json',
        data: $(form).serialize(),
        beforeSend: function(data) {
        },
        complete: function(data) {
            window.location.replace("/reg/pin");
        }
    });
}

function verPin(url, form) {
    var transfer = $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: server+url,
        type: 'post',
        dataType: 'json',
        data: $(form).serialize(),
        beforeSend: function(data) {
        },
        complete: function(data) {
            //window.location.replace("/reg/pin");
            $('.noti').html(data.responseText);
        }
    });
}

function remove(url, form) {
    var transfer = $.ajax({
        url: server+url,
        type: 'get',
        dataType: 'json',
        data: $(form).serialize(),
        beforeSend: function(data) {
        },
        complete: function(data) {
            window.location.replace(server+"pages");
        }
    });
}

function updatePage(url, form) {
    var transfer = $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: server+url,
        type: 'post',
        dataType: 'json',
        data: $(form).serialize(),
        beforeSend: function(data) {
        },
        complete: function(data) {
            location.reload();
        }
    });
}

function sP(url, form) {
    var transfer = $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: server+url,
        type: 'post',
        dataType: 'json',
        data: $(form).serialize(),
        beforeSend: function(data) {
            $('#sP-result').show();
            $('#sP-result').html('<div class="wrapper"> <svg class="hourglass" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 120 206" preserveAspectRatio="none"> <path class="middle" d="M120 0H0v206h120V0zM77.1 133.2C87.5 140.9 92 145 92 152.6V178H28v-25.4c0-7.6 4.5-11.7 14.9-19.4 6-4.5 13-9.6 17.1-17 4.1 7.4 11.1 12.6 17.1 17zM60 89.7c-4.1-7.3-11.1-12.5-17.1-17C32.5 65.1 28 61 28 53.4V28h64v25.4c0 7.6-4.5 11.7-14.9 19.4-6 4.4-13 9.6-17.1 16.9z"/> <path class="outer" d="M93.7 95.3c10.5-7.7 26.3-19.4 26.3-41.9V0H0v53.4c0 22.5 15.8 34.2 26.3 41.9 3 2.2 7.9 5.8 9 7.7-1.1 1.9-6 5.5-9 7.7C15.8 118.4 0 130.1 0 152.6V206h120v-53.4c0-22.5-15.8-34.2-26.3-41.9-3-2.2-7.9-5.8-9-7.7 1.1-2 6-5.5 9-7.7zM70.6 103c0 18 35.4 21.8 35.4 49.6V192H14v-39.4c0-27.9 35.4-31.6 35.4-49.6S14 81.2 14 53.4V14h92v39.4C106 81.2 70.6 85 70.6 103z"/> </svg> </div>');
        },
        complete: function(data) {
            $('#sP-result').html(data.responseText);
        }
    });
}

$( document ).ready(function() {

    /*
    $('.nav-sidebar').css('width', '50px');
    $('.main').css('margin-left', '60px');
    */

    $('body').delegate('.vu','click',function(e) {
        $('.vu-title').text('');
        var me = $(this);

        //$(this).append('#laden..')
        var vu = $(this).attr('vu')+'/';
        if ($(this).attr('vuid')) {
            var vuid = $(this).attr('vuid');
        } else {
            var vuid = '/';
        }

        if ($(this).attr('vunav')) {
            var nav = $(this).attr('vunav');
        } else {
            var nav = 'nav';
        }

        if ($(me).attr('vupage')) {
            var page = $(me).attr('vupage');
            //$('#'+page).hide();
            $('#'+page).html('<h2><div class="spinner"><div class="bounce1"></div><div class="bounce2"></div><div class="bounce3"></div></div></h2><h2></h2>');
        } else {
            var page = 0;
            $('#view').html('<h2><div class="spinner"><div class="bounce1"></div><div class="bounce2"></div><div class="bounce3"></div></div></h2><h2></h2>');
        }

        $('#connect').html( "https://crm.zoho.com/crm/private/xml/");

        $('.view').removeClass('active');
        $('.'+nav).addClass('active');

        setTimeout(function(){
            if(hostReachable() == true) {

                var transfer = $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: server+vu+vuid,
                    type: 'get',
                    dataType: 'json',
                    data: '',
                    beforeSend: function(data) {
                },
                complete: function(data) {
                    var response = data.responseText;
                    if (response.indexOf('Unauthenticated') !== -1) {
                        $('#view').html('Sie waren zu lange inaktiv und wurden automatisch abgemeldet.<br>Bitte melden Sie sich neu an: <a href="'+server+'login">Anmelden</a>');
                    } else {
                        if (page == 0) {
                            $('#view').html(response);
                        } else {
                            $('#'+page).html(response);
                            $('#'+page).fadeIn();
                        }
                    }
                }
            });

            } else {
                $('#view').html('Es besteht anscheinend keine Verbindung zum Internet.');   
            }
        }, 200);


        $('.modal-backdrop').remove();
        $('body').removeClass('modal-open');
    });

$('body').delegate('.cancel-contract','click',function(e) {
    $('body').find('.cancel-contract-box').toggle();
});
$('#view').on("click",".stop-cancel-contract", function(){
    $('.cancel-contract-box').hide();
});

$('body').delegate('.btn-verwalten','click',function(e) {
    var uID = $(this).attr('uID');
    var transfer = $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: server+'/panel/sales/loginAssCustomer/'+uID,
        type: 'post',
        dataType: 'json',
        data: '',
        beforeSend: function(data) {
            $('.overlay-w').fadeIn();
            $('.overlay-w').html('<h2><div class="spinner"><div class="bounce1"></div><div class="bounce2"></div><div class="bounce3"></div></div></h2><h2>Kundenkonto Verwaltung</h2>');
        },
        complete: function(data) {
            setTimeout(function() {
                $('.overlay-w').hide();
                window.location.replace('/panel');
            }, 1500);
        }
    });
});

});


//KD

//Neue Nachricht im Case senden "Note"
$('body').delegate('#Nachricht_Senden','click',function(e) {

    var Nachricht = $(this).attr('Nachricht');
    var Absender = $(this).attr('Absender');
    var transfer = $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: server+'/panel/messages/send/'+Nachricht+'/'+Absender,
        type: 'post',
        dataType: 'json',
        data: $('#newMsg').serialize(),
        beforeSend: function(data) {
        },
        complete: function(data) {
            vu('/spknc/'+Nachricht, '#view');
        }
    });
});