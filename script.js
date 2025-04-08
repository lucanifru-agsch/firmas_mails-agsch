// Desarrollado por Lu Canifrú
function rand() {
    var caracteres = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    var codigo = '';
    for (var i = 0; i < 6; i++) {
        var indice = Math.floor(Math.random() * caracteres.length);
        codigo += caracteres.charAt(indice);
    }
    return codigo;
}


$(document).ready(function() {
  $('#firmaForm').submit(function(event) {
    event.preventDefault();

    // Obtener valores del formulario
    var nombre = $('#nombre').val();
    var cargo = $('#cargo').val();
    var empresa = $('#empresa').val();
    var telefono = $('#telefono').val();
    var correo = $('#correo').val();
    var facebook = "https://facebook.com/agsch";
    var instagram = "https://instagram.com/agschile";
    var twitter = "https://twitter.com/agschile";
    var enlace_firma = "https://agsch.org/urlFrm";
    
    $('#copyButton').show();
    $('#modalButton').show();
    $('h3#prev').show();
    $('div#preview').show();
    
    

    var firmaHTML = `
      <table border="0" cellpadding="0" cellspacing="0" style="width: fit-content;" >
        <tr>
          <td width="150" style="text-align: center;">
            <img src="https://firmas.agsch.org/agsch_firma.png?`+ rand() +`" alt="Logo" width="130">
             <br />
            <a href="${facebook}" target="_blank"><img src="https://firmas.agsch.org/agsch_facebook.png" alt="Facebook" width="25"></a>
            <a href="${instagram}" target="_blank"><img src="https://firmas.agsch.org/agsch_instagram.png" alt="Instagram" width="25"></a>
            <a href="${twitter}" target="_blank"><img src="https://firmas.agsch.org/agsch_x.png" alt="X" width="25"></a>
        </td>
          <td width="5">&nbsp;</td>
          <td style="padding: 0;margin: 0;display: table-cell;vertical-align: middle;">          
            <strong style="font-size: 15px;display: block;line-height: 1.3;">${nombre}</strong>`;
             // Agregar el campo de teléfono si se proporciona
    if (cargo.length > 0) {
      firmaHTML += `<span style="font-size: 15px;display: block;line-height: 1.3;">${cargo}</span>`;
    }

    firmaHTML += `
             <span style="font-size: 15px;display: block;line-height: 1.3;">${empresa}</span>
            <hr style="border-top: 2px solid #001558;margin: 5px 0;">
             <div style="display:block"><img src="https://firmas.agsch.org/correo.png"  width="20"> <a style="font-size: 15px;line-height: 1.3;" href="mailto:${correo}" target="_blank">${correo}</a></div>`;
             // Agregar el campo de teléfono si se proporciona
    if (telefono.length >= 9) {
      firmaHTML += ` <div style="display:block"><img src="https://firmas.agsch.org/fono.png"  width="20"><span style="font-size: 15px;line-height: 1.3;"> ${telefono}</span></div>`;
    }

    firmaHTML += `
             <div style="display:block"><img src="https://firmas.agsch.org/url.png"  width="20"> <a style="font-size: 15px;line-height: 1.3;" href="https://www.guiasyscoutsdechile.org" target="_blank">www.guiasyscoutsdechile.org</a></div>
            <div style="display:block"><img src="https://firmas.agsch.org/direccion.png"  width="20"> <span style="font-size: 15px;line-height: 1.3;">Dirección: Av. República 97, Santiago</span></div>`;
    
           
         firmaHTML += `
         </td>
        </tr><tr>
        <td colspan="3" style="text-align:center;"><a href="${enlace_firma}" target="_blank"><img src="https://firmas.agsch.org/campana.png" ></a></td>
        </tr>
      </table>
    `;

    

    // Mostrar la firma generada en la previsualización
    $('#firmaPreview').html(firmaHTML);
  });

//   $('#copyButton').click(function() {
//     var range = document.createRange();
//     range.selectNode(document.getElementById('firmaPreview'));
//     window.getSelection().removeAllRanges();
//     window.getSelection().addRange(range);
//     document.execCommand('copy');
//     window.getSelection().removeAllRanges();
//     alert('Firma copiada al portapapeles');
//   });

$('#copyButton').click(function() {
    var range = document.createRange();
    var signaturePreview = document.getElementById('firmaPreview');
    range.selectNode(signaturePreview);
    // Excluir los elementos con la clase 'exclude-copy'
    $(signaturePreview).find('.exclude-copy').remove();
    window.getSelection().removeAllRanges();
    window.getSelection().addRange(range);
    document.execCommand('copy');
    window.getSelection().removeAllRanges();
    // alert('Firma copiada al portapapeles');
    $.confirm({
                    title: 'Copiada!',
                    content: 'Firma copiada al portapapeles.',
                    type: 'green',
                    typeAnimated: true,
                    buttons: {
                        ok: {
                            text: 'OK',
                            btnClass: 'btn-green',
                            keys: ['enter']
                        }
                    }
                });
});

});


    $(document).ready(function() {
        // Aplica el formato deseado al campo de teléfono
        $('#telefono').inputmask('+56 9999 99999', { 
            "onincomplete": function(){ 
                $(this).val(''); 
                $(this).trigger('click');
            }
        });

        // Verifica si el número de teléfono es válido cuando se pierde el foco del campo
        $('#telefono').on('blur', function() {
            var telefono = $(this).val();
            // Verifica si el número de teléfono cumple con el formato deseado
            if (!/^(\+56\s)?\d{4}\s\d{5}$/.test(telefono)) {

                // Muestra una alerta con jQuery Confirm si el número de teléfono no es válido
                $.confirm({
                    title: 'Error',
                    content: 'El número de teléfono ingresado no es válido. Por favor, ingrese un número de teléfono válido en el formato correcto.',
                    type: 'red',
                    typeAnimated: true,
                    buttons: {
                        ok: {
                            text: 'OK',
                            btnClass: 'btn-red',
                            keys: ['enter']
                        }
                    }
                });
            }
        });
    });

    $(document).ready(function() {
        // Verifica si el correo electrónico es válido cuando se pierde el foco del campo
        $('#correo').on('change', function() {
            var email = $(this).val();
            // Expresión regular para validar el formato de correo electrónico
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            // Verifica si el correo electrónico cumple con el formato deseado
            if (!emailRegex.test(email)) {
            $(this).val(''); 
            $(this).select(); 

                // Muestra una alerta con jQuery Confirm si el correo electrónico no es válido
                $.confirm({
                    title: 'Error',
                    content: 'Por favor, ingrese un correo electrónico válido.',
                    type: 'red',
                    typeAnimated: true,
                    buttons: {
                        ok: {
                            text: 'OK',
                            btnClass: 'btn-red',
                            keys: ['enter']
                        }
                    }
                });
            }
        });
    });