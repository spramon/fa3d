window.addEventListener("load", function() {
  var articles = document.querySelectorAll('article');
  console.log(articles.length);
    // categorias //
    //ver//
    $('.ver-categorias').click(function() {
        var producto_id = $(this).parent().prev().prev().prev().val();
        $.get("/productos/categorias/" + producto_id + "", function(response, ) {
            var categorias = $('.categorias').children('input');
            categorias = Array.from(categorias);
            response = Array.from(response);
            for (var i = 0; i < response.length; i++) {
                for (var j = 0; j < categorias.length; j++) {
                    if (categorias[j].value == response[i].id) {
                        categorias[j].checked = 1;
                    };
                };
            };
            $('.modal-footer').next().val(producto_id);
        });
    });
    //agregar/quitar categorias//
    function editarCategoria() {
        $('.modal-footer').children().click(function() {
            var producto_id = $(this).parent().next().val();
            var categorias = $('.categorias').children('input');
            var formData = new FormData();
            var categoriasForm = [];
            for (var i = 0; i < categorias.length; i++) {
                if (categorias[i].checked) {
                    categoriasForm.push(categorias[i].value)
                }
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "/productos/edit/categorias/" + producto_id + "",
                data: {
                    'categorias': categoriasForm
                },
                type: 'delete',
                dataType: 'JSON',
                success: function(response) {
                    alert('Cambios guardados correctamente');
                    for (var i = 0; i < categorias.length; i++) {
                      categorias[i].checked = 0;
                    }
                    return editarCategoria();
                },
            });
        });
    };
    editarCategoria();
    //

    $('.close').click(function() {
        var categorias = $('.categorias').children('input');
        categorias = Array.from(categorias);
        for (var i = 0; i < categorias.length; i++) {
            categorias[i].checked = 0;
        }
    });
    //

    // agregar o quitar de destacados //
    function destacado() {
        $(".icons i:nth-child(2)").click(function() {
            var producto_id = $(this).parent().parent().prev().prev().prev().val();
            var icono = $(this);
            if (icono.prev().val() == 1) {
                icono.prev().val(0);
                icono.replaceWith("<i class='far fa-heart' style='color:#Faf400'></i>");
            } else {
                icono.prev().val(1);
                icono.replaceWith("<i class='fas fa-heart' style='color:#Faf400'></i>");
            }
            $.get("/productos/edit/destacado/" + producto_id + "", function(response, producto) {
                return destacado();
            });
        });
    }
    destacado();
    //
    // agregar descripcion //
    function agregarDescripcion() {
        $('.agregar-descripcion i:first-child').click(function() {
            var descripciones = $(this).parent().prev().children('input[name=descripciones]');

            $(this).parent().prev().append(`<input type="text" class="descripcion" name='${descripciones.val()}' value=''><input type="text" class="precio" name='${descripciones.val()}' value=''>`);
            var producto_id = $(this).parent().parent().prev().prev().prev().val();
            $(this).parent().html("<i class='fas fa-check' style='color:#fff;'></i><i class='fas fa-times' style='color:#fff;'></i>")

            $('.agregar-descripcion i:nth-child(2)').click(function() {
                $(this).parent().prev().children(`input[name='${descripciones.val()}']`).first().remove();
                $(this).parent().prev().children(`input[name='${descripciones.val()}']`).first().remove();
                $(this).parent().html("<i class='fas fa-plus' style='color:#fff'></i><i class='fas fa-minus' style='color:#fff'></i>");
                return agregarDescripcion();
            });
            $('.agregar-descripcion i:nth-child(1)').click(function() {
                var descripcion = $(this).parent().prev().children(`input[name='${descripciones.val()}']`).first();
                var precio = $(this).parent().prev().children(`input[name='${descripciones.val()}']`).first().next();
                if (descripcion.val() == '') {
                    alert('completa el primer campo');
                } else {
                    descripcion.replaceWith(`<div class='descripcion' name='${descripciones.val()}'>${descripcion.val()}</div>`);
                    if (precio.val() == '') {
                        precio.val() == null;
                        precio.remove();
                    } else {
                        precio.replaceWith(`<div class='precio' name='${descripciones}'>$${precio.val()}</div>`);
                    }
                    var formData = new FormData();
                    formData.append('descripcion', descripcion.val());
                    formData.append('precio', precio.val());
                    $(this).parent().html("<i class='fas fa-plus' style='color:#fff'></i><i class='fas fa-minus' style='color:#fff'></i>");
                    descripciones.val(parseInt(descripciones.val()) + 1);
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "/productos/edit/agregarDescripcion/" + producto_id + "",
                        data: formData,
                        type: 'post',
                        dataType: 'JSON',
                        processData: false,
                        contentType: false,
                        cache: false,
                        success: function(response) {
                            agregarDescripcion();
                            quitarDescripcion();
                        },
                    });
                }
            })
        });
    };
    agregarDescripcion();
    //
    // quitar descripcion //
    function quitarDescripcion() {
        $('.agregar-descripcion i:nth-child(2)').click(function() {
            var descripciones_cantidad = $(this).parent().prev().children('input[name=descripciones]');
            if (descripciones_cantidad.val() == 0) {
                alert('Este producto no tiene descripciones');

            } else {
                var respuesta = confirm('¿Eliminamos la última descripción?');
                if (respuesta) {
                    var producto_id = $(this).parent().parent().prev().prev().prev().val();
                    var descripciones = $(this).parent().prev().children(`div [name=${parseInt(descripciones_cantidad.val())-1}]`);
                    var descripcion = descripciones.first().text();
                    descripciones.fadeOut();

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "/productos/delete/descripcion/" + producto_id + "",
                        data: {
                            'descripcion': descripcion
                        },
                        type: 'delete',
                        dataType: 'JSON',
                        success: function(response) {
                            descripciones_cantidad.val(parseInt(descripciones_cantidad.val()) - 1);
                            setTimeout(function() {
                                descripciones.remove();
                            }, 1000);
                            quitarDescripcion();
                        },
                    });
                };
                quitarDescripcion();
            };
        });
    };
    quitarDescripcion();
    // edicion de imagen de producto //
    $(".icons i:nth-child(3)").click(function() {
        $(this).parent().parent().parent().prev().trigger('click');
    });
    $('.articles input[name=imagen]').change(function() {
        $(this).next().children('.article-hover').unbind("mouseenter mouseleave");
        $(this).next().children('.loading').attr("style", "display:block");
        var imagenFile = $(this).val();
        var productoImagen = $(this).next().children("img").first();
        var producto_id = $(this).next().children("input").val();
        var formData = new FormData();
        var files = $(this)[0].files[0];
        formData.append('file', files);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "/productos/edit/imagen/" + producto_id + "",
            data: formData,
            type: 'post',
            dataType: 'JSON',
            processData: false,
            contentType: false,
            cache: false,
            success: function(response) {
                productoImagen.attr("src", `/storage/${response.storage}`);
                setTimeout(function() {
                    $('.loading').attr("style", "display:none;");
                }, 1000);
            },
        });
    });
    //
    // elimino productos //
    function borrarProducto() {
        $(".icons i:nth-child(4)").click(function() {
            var respuesta = confirm('¿Eliminamos este producto?');
            if (respuesta) {
                $(this).parent().parent().parent().prev().remove();
                var producto = $(this).parent().parent().parent();
                producto.fadeOut();
                var producto_id = $(this).parent().parent().prev().prev().prev().val();
                var formData = new FormData();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "/productos/delete/" + producto_id + "",
                    data: formData,
                    type: 'delete',
                    dataType: 'JSON',
                    processData: false,
                    contentType: false,
                    cache: false,
                    success: function(response) {
                        producto.remove();
                        borrarProducto();
                    },
                });
            };
        });
    };
    borrarProducto();
    //
    // edito nombre //
    function editarNombre() {
        $('.nombre').click(function() {
            var nombre = $(this).text();
            $(this).replaceWith(`<input type="text" class="nombre" name="nombre" value='${nombre}'>`);
            $('.nombre').focusout(function() {
                var nombre = $(this).val();
                var producto_id = $(this).parent().prev().prev().prev().val();
                $(this).replaceWith(`<div class='nombre'>${nombre}</div>`);
                var formData = new FormData();
                formData.append('nombre', nombre);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "/productos/edit/nombre/" + producto_id + "",
                    data: formData,
                    type: 'post',
                    dataType: 'JSON',
                    processData: false,
                    contentType: false,
                    cache: false,
                    success: function(response) {
                        editarNombre();
                    },
                });
            });
        });
    }
    editarNombre();
    //
    // cambiar descripciones //
    function editarDescripcion() {
        $('.descripcion').click(function() {
            var descripcion = $(this).text();
            var pos = $(this).attr('name');
            $(this).replaceWith(`<input type="text" class="descripcion" value='${descripcion}'>`);
            $('.descripcion').focusout(function() {
                var descripcion = $(this).val();
                var producto_id = $(this).parent().parent().prev().prev().prev().val();
                $(this).replaceWith(`<div class='descripcion' name='${pos}'>${descripcion}</div>`);
                var formData = new FormData();
                formData.append('descripcion', descripcion);
                formData.append('posicion', pos);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "/productos/edit/descripcion/" + producto_id + "",
                    data: formData,
                    type: 'post',
                    dataType: 'JSON',
                    processData: false,
                    contentType: false,
                    cache: false,
                    success: function(response) {
                        editarDescripcion();
                    },
                });
            });
        });
    }
    editarDescripcion();
    //
    // editar precio //
    function editarPrecio() {
        $('.precio').click(function() {
            var precio = $(this).text().replace('$', '');
            var pos = $(this).attr('name');
            $(this).replaceWith(`<input type="text" class="precio" value='${precio}'>`);
            $('.precio').focusout(function() {
                var precio = $(this).val();
                var producto_id = $(this).parent().parent().prev().prev().prev().val();
                $(this).replaceWith(`<div class='precio' name='${pos}'>$${precio}</div>`);
                var formData = new FormData();
                formData.append('precio', precio);
                formData.append('posicion', pos);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "/productos/edit/precio/" + producto_id + "",
                    data: formData,
                    type: 'post',
                    dataType: 'JSON',
                    processData: false,
                    contentType: false,
                    cache: false,
                    success: function(response) {
                        editarPrecio();
                    },
                });
            });
        });
    }
    editarPrecio();
    //

});
