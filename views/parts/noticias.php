<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<div style="float:left;width:30%"><h3>NOTICIAS</h3></div>
<div style="float:left;width:70%" align="right">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#nuevanoticia">
        Nueva Noticia
    </button>
</div>
<hr>
<br><br><br>
<div class="table-responsive">
    <script src="public/js/datatable/datanews.js?<?php echo time(); ?>"></script>
    <table id="tbnews" class="table table-striped">
        <thead class="cf">
        <tr>
            <th></th>
            <th></th>
            <th>Titulo</th>
            <th>Imagen</th>
            <th>Texto</th>
            <th>Palabras</th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <th></th>
            <th></th>
            <th>Titulo</th>
            <th>Imagen</th>
            <th>Texto</th>
            <th>Palabras</th>
        </tr>
        </tfoot>
    </table>
</div>

<!-- Nueva Noticia -->
<div class="modal fade" id="nuevanoticia" tabindex="-1" role="dialog" aria-labellledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Encabezado -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    ×
                </button>
                <h4 style="color: white">Nueva Noticia</h4>
            </div>
            <!-- Cuerpo -->
            <div class="modal-body" id="nuevo">
                <form name="form2" id="form2" class="form-horizontal" method="post" action="_" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="col-xs-12"><strong>Titulo: *</strong>
                            <input type="text" name="titulo" id="titulo" class="form-control" autocomplete="off">
                            <div class="error left-align" id="err-titulo">Debe ingresar un titulo para la noticia.</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12"><strong>Imagen: *</strong>
                            <input type="file" id="imgnoticia" name="imgnoticia" data-allowed-file-extensions="png jpg gif jpge bmp" class="dropify profile-user-img img-responsive img-circle" onChange="setpreview('rutaimagen','imgnoticia','form2')" data-default-file="" data-height="128"  data-min-width="128"  data-show-remove="false">
                            <span id="rutaimagen"></span>
                            <div class="error left-align" id="err-noticia">Debe elegir una imagen para la noticia.</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12"><strong>Texto (Cuerpo de la noticia): *</strong>
                            <textarea name="texto" id="texto" class="form-control" style="padding-left: 25px" cols="5"></textarea>
                            <div class="error left-align" id="err-texto">Debe definir un texto para la noticia.</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12"><strong>Palabras Claves: (Separadas por Coma ",") *</strong>
                            <input type="text" name="palabras" id="palabras" data-role="tagsinput">
                            <div class="error left-align" id="err-palabras">Debe especificar las palabras claves para su noticia.</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div id="statussave"></div>
                            <button type="button" name="btn-newNews" id="btn-newNews" class="btn btn-primary" style="width:100%">
                                Guardar
                            </button>
                        </div>
                    </div>
                    <div id="datos1">
                    </div>
                </form>
                <iframe src="about:blank" name="null" style="display:none"></iframe>
            </div>
            <!-- Pie de pagina -->
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal" aria-hidden="true">
                    Cerrar
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Editar usuario -->
<div class="modal fade" id="miVentana" tabindex="-1" role="dialog" aria-labellledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Encabezado -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    ×
                </button>
                <h4 style="color: white">Editar Noticia</h4>
            </div>
            <!-- Cuerpo -->
            <div class="modal-body" id="editar">
                <form name="form3" id="form3" class="form-horizontal" method="post" action="_" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="col-xs-12"><strong>Titulo: *</strong>
                            <input type="text" name="tituloEdit" id="tituloEdit" class="form-control" autocomplete="off">
                            <div class="error left-align" id="err-tituloEdit">Debe ingresar un titulo para la noticia.</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <img src="" id="oldfoto" class="imagecar" style="width: 40px;height: 40px">
                        <div class="col-xs-12"><strong>Imagen: *</strong>
                            <input type="file" id="imgnoticiaEdit" name="imgnoticiaEdit" data-allowed-file-extensions="png jpg gif jpge bmp" class="dropify profile-user-img img-responsive img-circle" onChange="setpreview('rutaimagenEdit','imgnoticiaEdit','form3')" data-default-file="" data-height="128"  data-min-width="128"  data-show-remove="false">
                            <span id="rutaimagenEdit"></span>
                            <div class="error left-align" id="err-noticiaEdit">Debe elegir una imagen para la noticia.</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12"><strong>Texto (Cuerpo de la noticia): *</strong>
                            <textarea name="textoEdit" id="textoEdit" class="form-control" style="padding-left: 25px" cols="5"></textarea>
                            <div class="error left-align" id="err-textoEdit">Debe definir un texto para la noticia.</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12"><strong>Palabras Claves: (Separadas por Coma ",") *</strong>
                            <input type="text" name="palabrasEdit" id="palabrasEdit" data-role="tagsinput">
                            <div class="error left-align" id="err-palabrasEdit">Debe especificar las palabras claves para su noticia.</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div id="statusedit"></div>
                            <button type="button" name="btn-newNewsEdit" id="btn-newNewsEdit" class="btn btn-primary" style="width:100%">
                                Guardar Edición
                            </button>
                            <input type="hidden" name="idnoticia" id="idnoticia" value="">
                        </div>
                    </div>
                    <div id="datos1">
                    </div>
                </form>
                <iframe src="about:blank" name="null" style="display:none"></iframe>
            </div>
            <!-- Pie de pagina -->
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal" aria-hidden="true">
                    Cerrar
                </button>
            </div>
        </div>
    </div>
</div>

<script src="../../public/js/functions.js?<?php echo time(); ?>" type="text/javascript"></script>

<script type="text/javascript">
    $(document).ready(function(){
        // Basic
        $('.dropify').dropify();

        // Translated
        $('.dropify-fr').dropify({
            messages: {
                default: 'Glissez-déposez un fichier ici ou cliquez',
                replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                remove:  'Supprimer',
                error:   'Désolé, le fichier trop volumineux'
            }
        });

        // Used events
        var drEvent = $('#input-file-events').dropify();

        drEvent.on('dropify.beforeClear', function(event, element){
            return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
        });

        drEvent.on('dropify.afterClear', function(event, element){
            alert('File deleted');
        });

        drEvent.on('dropify.errors', function(event, element){
            console.log('Has Errors');
        });

        var drDestroy = $('#input-file-to-destroy').dropify();
        drDestroy = drDestroy.data('dropify')
        $('#toggleDropify').on('click', function(e){
            e.preventDefault();
            if (drDestroy.isDropified()) {
                drDestroy.destroy();
            } else {
                drDestroy.init();
            }
        })
        $('#texto').wysihtml5();
    });

</script>