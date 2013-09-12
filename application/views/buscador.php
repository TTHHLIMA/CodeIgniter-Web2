
<html>
    <head>
        <script src=" http://code.jquery.com/jquery-1.9.1.js"></script>
        <script type="text/javascript">
            
            $(document).ready(function(){
                $("#Resultados").load("http://localhost/html5/marqueting/compania/buscar/");
                $("#txtbuscar").keyup (function (e) {
                    //alert ($(this).val());
                    id=$(this).val();
                    var href = "http://localhost/html5/marqueting/compania/buscar/"+id;
                    $("#Resultados").load(href);
                });
            });
        </script>       
    </head>
    <body>
        <div class="modal fade" id="test_modal">
            <div class="modal-header">
                <a class="close" data-dismiss="modal">&times;</a>
                <h3>Modal Header</h3>
            </div>
            <div class="modal-body">
                <label for="txtbuscar">Buscar</label>
                <input tipe="text" name="txtbuscar" id="txtbuscar">
                <div id="Resultados"></div>

            </div>
            <div class="modal-footer">
                <a href="#" class="btn" data-dismiss="modal">Close</a>
                <a href="#" class="btn btn-primary">Save Changes</a>
            </div>
        </div>
    </body>
