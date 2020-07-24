$(() => {
    $('#login-form-link').click(function(e) {
        $("#login-form").delay(100).fadeIn(100);
        $("#register-form").fadeOut(100);
        $("#news-form").fadeOut(100);
        $('#register-form-link').removeClass('active');
        $('#show-news').removeClass('active');
        $(this).addClass('active');
        e.preventDefault();
    });

    $('#register-form-link').click(function(e) {
        $("#register-form").delay(100).fadeIn(100);
        $("#login-form").fadeOut(100);
        $("#news-form").fadeOut(100);
        $('#login-form-link').removeClass('active');
        $('#show-news').removeClass('active');
        $(this).addClass('active');
        e.preventDefault();
    });

    $('#show-news').click(function(e) {
        $("#news-form").delay(100).fadeIn(100);
        $("#login-form").fadeOut(100);
        $("#register-form").fadeOut(100);
        $('#register-form-link').removeClass('active');
        $('#login-form-link').removeClass('active');
        $(this).addClass('active');
        e.preventDefault();
    });

    document.getElementById("newUsername").onchange = () => {validateUser()};
    function validateUser() {
        var user = $('#newUsername').val();
        const formData = new FormData();
        formData.append('operation', 'validateUser');
        formData.append('user', user.trim());

        fetch('index.php', {
            method: 'POST',
            body: formData//JSON.stringify({ editkeylan:editkeylan,edittittle:edittittle,editsubtittle:editsubtittle,editvideo:editvideo,edittext:edittext,editswname:editswname,editswemail:editswemail,editswtext:editswtext,editswphone:editswphone })
        })
        .then(res => res.text())
        .then(data => {
            if(data==1)
            {
                $('#err-existUser').show(500);
            }
            else
            {
                $('#err-existUser').delay(500);
                $('#err-existUser').animate({ height: 'toggle' }, 500, function () {  });
            }
        });
    }

    $('#register-button').click(function(e) {
        var user = $("#newUsername").val();
        var email = $("#newEmail").val();
        var password = $("#newPassword").val();
        var confirmPassword = $("#confirm-password").val();

        if(user.trim() == "")
        {
            error("Debe ingresar su Nombre de Usuario");
            $('#err-user').show(500);$('#err-user').delay(4000);
            $('#err-user').animate({ height: 'toggle' }, 500, function () {  });
        }
        else
        if(email.trim() == "")
        {
            error("Debe ingresar su Correo");
            $('#err-email').show(500);$('#err-email').delay(4000);
            $('#err-email').animate({ height: 'toggle' }, 500, function () {  });
        }
        else
        if(validarEmail(email.trim()) == false)
        {
            error2("Debe ingresar un Correo válido");
        }
        else
        if(password.trim() == "")
        {
            error("Debe ingresar su Contraseña");
            $('#err-password').show(500);$('#err-password').delay(4000);
            $('#err-password').animate({ height: 'toggle' }, 500, function () {  });
        }
        else
        if(confirmPassword.trim() == "")
        {
            error("Debe confirmar su Contraseña");
            $('#err-confirmPassword').show(500);$('#err-confirmPassword').delay(4000);
            $('#err-confirmPassword').animate({ height: 'toggle' }, 500, function () {  });
        }
        else
        if(password.trim() != confirmPassword.trim())
        {
            error2("Las Contraseñas ingresadas no coinciden");
        }
        else
        {
            const formData = new FormData();
            formData.append('operation', 'newuser');
            formData.append('user', user.trim());
            formData.append('email', email.trim());
            formData.append('password', password.trim());
            $("#register-button").attr('disabled','disabled');
            fetch('index.php', {
                method: 'POST',
                body: formData
            })
            .then(res => res.text())
            .then(data => {
                if(data==1)
                {
                    msnok2("Datos almacenados correctamente");
                }
                else
                if(data==0)
                {
                    msnok("Ocurrio un error al guardar, intentelo de nuevo");
                }
                else
                if(data==-1)
                {
                    error2("El usuario ingresado ya existe");
                    $('#err-existUser').show(500);
                }
                else
                if(data==-2)
                {
                    error2("Debe diligenciar todos los datos");
                }
                $("#register-button").removeAttr('disabled');
            });
        }
    });

    $('#login-button').click(function(e) {
        var user = $("#username").val();
        var password = $("#password").val();

        if(user.trim() == "" || password.trim() == "")
        {
            error2("Debe ingresar su Nombre de Usuario y Contraseña");
        }
        else
        {
            const formData = new FormData();
            formData.append('operation', 'loginuser');
            formData.append('user', user.trim());
            formData.append('password', password.trim());
            $("#login-button").attr('disabled','disabled');
            fetch('index.php', {
                method: 'POST',
                body: formData
            })
            .then(res => res.text())
            .then(data => {
                if(data==1||data=='1')
                {
                    window.location.href = "index.php";
                }
                else
                {
                    error2(data);
                }
                $("#login-button").removeAttr('disabled');
            });
        }
    });
});

function msnok(msn)
{
    toast({
        type: 'success',
        title: msn
    })
}

const toast = swal.mixin({
    toast: true,
    position: 'bottom-end',
    showConfirmButton: false,
    timer: 5000
});

function error(msn)
{
    toast({
        type: 'error',
        title: msn
    })
}
function error2(msn)
{
    swal({
        position: 'center',
        type: 'error',
        title: msn,
        showConfirmButton: true,
        confirmButtonText:"Aceptar"
        //timer: 1500
    })
}



function msnok2(msn)
{
    swal({
        position: 'center',
        type: 'success',
        title: msn,
        showConfirmButton: true,
        confirmButtonText:"Aceptar"
        //timer: 1500
    })
}

function validarEmail(valor) {
    if (/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i.test(valor)){
        return true;
    } else {
        return false;
    }
}

$('#btn-newNews').click(function(e) {
    var titulo = $("#titulo").val();
    var rut = $('#rutaimagen').text();
    var texto = $('#texto').val().replace("&nbsp;", " ").trim();
    var palabras = $("#palabras").val();

    if(titulo.trim() == "")
    {
        error("Debe ingresar un titulo para la noticia");
        $('#err-titulo').show(500);$('#err-titulo').delay(4000);
        $('#err-titulo').animate({ height: 'toggle' }, 500, function () {  });
    }
    else
    if(rut.trim() == "")
    {
        error("Debe elegir una imagen para la noticia");
        $('#err-noticia').show(500);$('#err-noticia').delay(4000);
        $('#err-noticia').animate({ height: 'toggle' }, 500, function () {  });
    }
    else
    if(texto.trim() == "")
    {
        error("Debe definir un texto para la noticia");
        $('#err-texto').show(500);$('#err-texto').delay(4000);
        $('#err-texto').animate({ height: 'toggle' }, 500, function () {  });
    }
    else
    if(palabras.trim() == "")
    {
        error("Debe especificar las palabras claves para su noticia");
        $('#err-palabras').show(500);$('#err-palabras').delay(4000);
        $('#err-palabras').animate({ height: 'toggle' }, 500, function () {  });
    }
    else
    {
        const formData = new FormData();
        formData.append('operation', 'newNews');
        formData.append('titulo', titulo);
        formData.append('rut', rut);
        formData.append('texto', texto);
        formData.append('palabras', palabras.trim());
        $("#btn-newNews").attr('disabled','disabled');
        $('#statussave').innerText = "Guardando...";
        fetch('index.php', {
            method: 'POST',
            body: formData
        })
            .then(res => res.text())
            .then(data => {
                if(data==-2||data==-1)
                {
                    error2("Debe diligenciar todos los datos marcados con *");
                }
                else
                if(data==0)
                {
                    error2("Ocurrio un error al insertar la noticia, intentelo de nuevo");
                }
                else
                {
                    msnok2("Datos almacenados correctamente");
                    $('#tbnews').DataTable().ajax.reload();
                }
                $('#statussave').innerText = "";
                $("#btn-newNews").removeAttr('disabled');
            });
    }
});

$('#btn-newNewsEdit').click(function(e) {
    var titulo = $("#tituloEdit").val();
    var rut = $('#rutaimagenEdit').text();
    var texto = $('#textoEdit').val().replace("&nbsp;", " ").trim();
    var palabras = $("#palabrasEdit").val();
    var id = $('#idnoticia').val();

    if(titulo.trim() == "")
    {
        error("Debe ingresar un titulo para la noticia");
        $('#err-tituloEdit').show(500);$('#err-tituloEdit').delay(4000);
        $('#err-tituloEdit').animate({ height: 'toggle' }, 500, function () {  });
    }
    else
    if(texto.trim() == "")
    {
        error("Debe definir un texto para la noticia");
        $('#err-textoEdit').show(500);$('#err-textoEdit').delay(4000);
        $('#err-textoEdit').animate({ height: 'toggle' }, 500, function () {  });
    }
    else
    if(palabras.trim() == "")
    {
        error("Debe especificar las palabras claves para su noticia");
        $('#err-palabrasEdit').show(500);$('#err-palabrasEdit').delay(4000);
        $('#err-palabrasEdit').animate({ height: 'toggle' }, 500, function () {  });
    }
    else
    {
        const formData = new FormData();
        formData.append('operation', 'editNews');
        formData.append('titulo', titulo);
        formData.append('rut', rut);
        formData.append('texto', texto);
        formData.append('palabras', palabras.trim());
        formData.append('id', id);
        $("#btn-newNewsEdit").attr('disabled','disabled');
        $('#statusedit').innerText = "Editando...";
        fetch('index.php', {
            method: 'POST',
            body: formData
        })
            .then(res => res.text())
            .then(data => {
                if(data==-2)
                {
                    error2("Debe diligenciar todos los datos marcados con *");
                }
                else
                if(data==0)
                {
                    error2("Ocurrio un error al insertar la noticia, intentelo de nuevo");
                }
                else
                {
                    msnok2("Datos editados correctamente");
                    $('#tbnews').DataTable().ajax.reload();
                }
                $("#btn-newNewsEdit").removeAttr('disabled');
                $('#statusedit').innerText = "";
            });
    }
});

function setpreview(rut,inp,formu) // creamos la función
{
    $("#" + formu).attr('target', 'null');
    $("#" + formu).attr('action', 'uploader.php?ruta='+ rut+'&input='+inp);
    $('#rutaimagen').innerText = "Cargando...";
    $('form[name="'+formu+'"]').submit();
}

function CRUDUSUARIOS(option,id)
{
    if(option == "EDITAR")
    {
        $.post('index.php', { operation: 'infoNoticia',id:id }, function(data){
            var titulo = data[0].titulo;
            var imagen = data[0].imagen;
            var texto = data[0].texto;
            var palabras = data[0].palabras;

            $("#tituloEdit").val(titulo);
            $("#textoEdit").val(texto);
            $("#palabrasEdit").val(palabras);
            $('#textoEdit').wysihtml5();
            $('#idnoticia').val(id);
            document.getElementById('oldfoto').src=imagen;
        },"json");
    }
    else
    if(option == "ELIMINAR")
    {
        swal({
            title: "Realmente desea eliminar la noticia seleccionada?",
            text: "",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'SI',
            cancelButtonText: 'NO'
        }).then(function (result) {
            if (result.value) {
                const formData = new FormData();
                formData.append('operation', 'eliminarnoticia');
                formData.append('id', id);
                fetch('index.php', {
                    method: 'POST',
                    body: formData
                })
                .then(res => res.text())
                .then(data => {
                    if(data==1||data=='1')
                    {
                        msnok2("Registro eliminado");
                        $('#tbnews').DataTable().ajax.reload();
                    }
                    else
                    {
                        error2("Ocurrio un error al eliminar, intentelo de nuevo o comuniquese con su proveedor.");
                    }
                });
            }
            else
            {
                msnok('Operacion cancelada con exito.');
            }
        });
    }
}