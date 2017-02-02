<!DOCTYPE html>
<html lang="es" class="no-js">

    <head>

        <meta charset="utf-8">
        <title>GIWEPP Login</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta http-equiv="Content-type" content="text/html; charset=utf-8"/>

        <!-- CSS -->
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=PT+Sans:400,700'>
        <link rel="stylesheet" href="assets/css/reset.css">
        <link rel="stylesheet" href="assets/css/supersized.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/remodal.css">
        <link rel="stylesheet" href="assets/css/remodal-default-theme.css">

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <style>
            .remodal-bg.with-red-theme.remodal-is-opening,
            .remodal-bg.with-red-theme.remodal-is-opened {
                filter: none;
            }

            .remodal-overlay.with-red-theme {
                background-color: #f44336;
            }

            .remodal.with-red-theme {
                background: #fff;
            }

            #loading {
                width: 100%;
                height: 100%;
                background-color: #ccc;
                position: fixed;
                top: 0;
                left: 0;
                z-index: 9999;
                opacity: 0.8;
                filter: alpha(opacity=80);
            }
        </style>
        <script src="js/jquery-1.3.min.js" language="javascript"></script>
        <script language="javascript">
            $(document).ready(function () {
                $('#loading').css("display", "none");
                $().ajaxStart(function () {
                    $('#loading').show();
                    //$('#result').hide();
                }).ajaxStop(function () {
                    $('#loading').hide();
                    //$('#result').fadeIn('slow');
                });
                $('#form, #fat, #formLogin').submit(function () {
                    if ($("#txt_username").val().length > 0
                            && $("#txt_password").val().length > 0) {
                        $.ajax({
                            type: 'POST',
                            url: $(this).attr('action'),
                            data: $(this).serialize(),
                            beforeSend: function () {
                                $('#loading').css("display", "block");
                            },
                            complete: function () {
                                $('#loading').css("display", "none");
                            },
                            success: function (data) {
                                if ($.trim(data) === $.trim("success")) {
                                    // do something with response.message or whatever other data on success
                                    $(function () {
                                        // Para Manuel, Oscar y Ricardo: aquí se ponde la redirección a la página de inicio
                                        // del sistema MECSA.
                                        window.location.href = 'org.giwepp_pf.vista/index.html';
                                    });
                                } else if ($.trim(data) === $.trim("error")) {
                                    // do something with response.message or whatever other data on error
                                    $(function () {
                                        // In this case the initialization function returns the already created instance
                                        var inst =
                                                $('[data-remodal-id=modal2]').remodal({
                                            modifier: 'with-red-theme'
                                        });
                                        inst.open();
                                    });
                                }
                            },
                            error: function (XMLHttpRequest, textStatus, errorThrown) {
                                $(function () {
                                    $('#result').html(XMLHttpRequest);
                                    //Se puede obtener informacion útil inspecionando el Objeto XMLHttpRequest
                                    console.log(XMLHttpRequest);
                                });
                            }

                        });
                        return false;
                    }
                    return false;
                });
            })
        </script>
    </head>

    <body>
        <div id='loading'><img src='assets/img/loading.gif'
                               style='margin:0 auto; position: absolute; top: 50%; left: 50%; margin: -30px 0 0 -30px;'></div>
        <div class="page-container">
            <h1>Inicio de sesión Pierre Faure System</h1>

            <form method="POST" action="org.giwepp_pf.controlador/controladorLogin.php" id="formLogin" name="formLogin">
                <input type="text" id="txt_username" name="txt_username" class="username" placeholder="Usuario">
                <input type="password" id="txt_password" name="txt_password" class="password" placeholder="Contraseña">

                <div id="result"></div>
                <button type="submit" name="btn-ingresar">Ingresar</button>
                <div class="error"><span>+</span></div>

            </form>
            <!-- <div class="connect">
               <p>Or connect with:</p>
               <p>
                     <a class="facebook" href=""></a>
                     <a class="twitter" href=""></a>
                 </p>
            </div>-->
        </div>
        <div data-remodal-id="modal2" role="dialog" aria-labelledby="titulo" aria-describedby="errorLoginDesc">
            <div>
                <h2 id="titulo">DATOS INV&AacuteLIDOS</h2>

                <p id="errorLoginDesc">
                    Usuario o Password incorrecto
                </p>
            </div>
            <br>
            <button stye="width:90%" data-remodal-action="confirm" class="remodal-confirm">Aceptar</button>
        </div>
        <!-- You can define the global options -->
        <script>
            window.REMODAL_GLOBALS = {
                NAMESPACE: 'remodal',
                DEFAULTS: {
                    //     hashTracking: true,
                    closeOnConfirm: true,
                    closeOnCancel: true,
                    closeOnEscape: true,
                    closeOnOutsideClick: false
                            //     modifier: ''
                }
            };
        </script>
        <!-- Javascript -->
        <script src="assets/js/jquery-1.8.2.min.js"></script>
        <script src="assets/js/supersized.3.2.7.min.js"></script>
        <script src="assets/js/supersized-init.js"></script>
        <script src="assets/js/scripts.js"></script>
        <script src="libs/zepto.js"></script>
        <script>window.Zepto || document.write('<script src="libs/zepto/zepto.min.js"><\/script>')</script>
        <script src="js/remodal.js"></script>
        <!-- Events -->
        <script>
            $(document).on('opening', '.remodal', function () {
                console.log('opening');
            });

            $(document).on('opened', '.remodal', function () {
                console.log('opened');
            });

            $(document).on('closing', '.remodal', function (e) {
                console.log('closing' + (e.reason ? ', reason: ' + e.reason : ''));
            });

            $(document).on('closed', '.remodal', function (e) {
                console.log('closed' + (e.reason ? ', reason: ' + e.reason : ''));
            });

            $(document).on('confirmation', '.remodal', function () {
                console.log('confirmation');
            });

            $(document).on('cancellation', '.remodal', function () {
                console.log('cancellation');
            });

            //  Usage:
            //  $(function() {
            //
            //    // In this case the initialization function returns the already created instance
            //    var inst = $('[data-remodal-id=modal]').remodal();
            //
            //    inst.open();
            //    inst.close();
            //    inst.getState();
            //    inst.destroy();
            //  });

            //  The second way to initialize:
            $('[data-remodal-id=modal2]').remodal({
                modifier: 'with-red-theme'
            });
        </script>
    </body>

</html>

