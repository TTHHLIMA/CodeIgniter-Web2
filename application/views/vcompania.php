<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
        <meta name="author" content="Heislersin" />
        <script src=" http://code.jquery.com/jquery-1.9.1.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $("#contenedor").load("http://localhost/html5/marqueting/compania/lista");
                 //$("#pag li a").click(function() {
                 //   var href = $(this).attributes("href");
                 //   alert("Handler for .click() called.".href);
                 //   return false;
                 // });

                   /* $("#pagina li a").click(function(event) {
                        //alert("me apretaste");
                        var href = $(this).attr('href');
                        alert(href);
                        event.preventDefault();
                    });
                    */

            $(document).on("click", "#pagina li a", function(e){
                    e.preventDefault();
                    var href = $(this).attr("href");
                    //alert("hola");
                    $("#contenedor").load(href);
                }); 
                
                
            });
        </script>
        <style type="text/css">
            <!--
            /* == Pagination === */
            ul{border:0; margin:0; padding:0;}

            #pagina li{
                border:0; margin:0; padding:0;
                font-size:11px;
                list-style:none;
                margin-right:2px;
            }
            #pagina a{
                border:solid 1px #c6baa4;
                margin-right:2px;
            }
            #pagina .previous-off, #pagina .next-off {
                border:solid 1px #c6baa4;
                color:#222222;
                display:block;
                float:left;
                font-weight:bold;
                margin-right:2px;
                padding:3px 4px;
            }
            #pagina .next a, #pagina .previous a {
                font-weight:bold;
            }
            #pagina .active{
                background:#c6baa4;
                color:#FFFFFF;
                font-weight:bold;
                display:block;
                float:left;
                padding:4px 6px;
            }
            #pagina a:link, #pagina a:visited {
                color:#222222;
                display:block;
                float:left;
                padding:3px 6px;
                text-decoration:none;
            }
            #pagina a:hover{
                border:solid 1px #222222
            }
            -->
        </style>
    </head>
    <body>
     
        <div id="contenedor">
        </div>

    </body>
</html>