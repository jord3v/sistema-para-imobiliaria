const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
})

$(document).ready(function() {
    // page contracts 

    $("#preview").click(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: '/dashboard/contracts/preview',
            data: {
                start_period: $("input[name='start_period']").val(),
                payment: $("select[name='payment']").val(),
                period: $("select[name='period']").val(),
                rental_price: $("input[name='rental_price']").val(),
                condominium_price: $("input[name='condominium_price']").val(),
                administration_fee: $("input[name='administration_fee']").val(),
                _token: $('meta[name="csrf-token"]').attr('content'),
            },
            success: function(result) {
                Toast.fire({
                    icon: 'info',
                    title: 'Simulação gerada'
                });
                var rows = $.map(result['dates'], function(value, index) {
                    return '<tr><td><small>' + value['id'] + 'ª mensalidade </small><br><input type="date" class="form-control form-control-flush" name="payments[' + value['id'] + '][date]" value="' + value['date'] + '" readonly></td><td><input type="number" class="form-control form-control-flush" name="payments[' + value['id'] + '][receipt]" value="' + value['receipt'] + '" readonly></td><td><input type="number" class="form-control form-control-flush" name="payments[' + value['id'] + '][transfer]" value="' + value['transfer'] + '" readonly></td><td><span class="status status-yellow"><span class="status-dot"></span>Em simulação</span></td></tr>';
                });
                $('table tbody').html(rows.join(''));
            },
            error: function(result) {
                Toast.fire({
                    icon: 'error',
                    title: 'Verifique os campos'
                })
            }
        });
    });
    // page properties
    $('#template-wrapper').sortable();
    $("#template-wrapper").sortable({
        update: function(event, ui) {
            var array = [];
            $.each($('.template'), function(index, element) {
                array.push($(element).data('order'))
            });

            console.log(array);

            $.ajax({
                url: '/dashboard/medias/sort',
                method: 'post',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    'array': array
                },
                success: function(response) {
                    Toast.fire({
                        icon: 'info',
                        title: 'Ordenado com sucesso'
                    });
                }
            });
        }
    });
    if ($("select[name=purpose_id]").length > 0) {
        var location = $(location).attr('host');
        $.ajax({
            type: "post",
            url: "/dashboard/properties/categories",
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
            },
            success: function(result) {
                $.each(result['types'], function(index, value) {
                    var purpose_id;
                    $("select[name=purpose_id]").append('<option rel="' + index + '" value="' + value.id + '">' + value.name + '</option>');
                    $("select[name=purpose_id]").change(function() {
                        $("select[name=type_id]").find("option:gt(0)").remove();
                        $("select[name=type_id]").find("option:first").text("Carregando...");
                        purpose_id = $(this).find('option:selected').attr('rel');
                        $.each(result.types[purpose_id].types, function(index1, value1) {
                            $("select[name=type_id]").find("option:first").text("Selecione o tipo");
                            $("select[name=type_id]").append('<option rel="' + index1 + '" value="' + value1.id + '">' + value1.name + '</option>');
                        });
                    });
                });
            },
            error: function(result) {
                alert('error');
            }
        });
    };

    //plugin mask jquery
    
    $('input[name=zipcode]').mask("00000-000", {placeholder: "_____-___"});
    $('.money').mask('000.000.000.000.000,00', {reverse: true});
    $('.percent').mask('##0,00%', {reverse: true});
    $('.clear-if-not-match').mask("00/00/0000", {clearIfNotMatch: true});
    $('.placeholder').mask("00/00/0000", {placeholder: "__/__/____"});
    $('.fallback').mask("00r00r0000", {
        translation: {
            'r': {
            pattern: /[\/]/,
            fallback: '/'
            },
            placeholder: "__/__/____"
        }
        });
    $('.selectonfocus').mask("00/00/0000", {selectOnFocus: true});
    //viacep plugin

    //Quando o campo cep perde o foco.
    $("#searchZipcode").click(function() {
        event.preventDefault();
        var zipcode = $("input[name=zipcode]").val().replace(/\D/g, '');
        if (zipcode != "") {
            var validation = /^[0-9]{8}$/;
            if (validation.test(zipcode)) {
                $("input[name=public_place]").val("...");
                $("input[name=neighborhood]").val("...");
                $("input[name=city]").val("...");
                $("input[name=state]").val("...");
                $.getJSON("https://viacep.com.br/ws/" + zipcode + "/json/?callback=?", function(dados) {

                    if (!("erro" in dados)) {
                        $("input[name=public_place]").val(dados.logradouro);
                        $("input[name=neighborhood]").val(dados.bairro);
                        $("input[name=city]").val(dados.localidade);
                        $("input[name=state]").val(dados.uf);
                        Toast.fire({
                            icon: 'info',
                            title: 'Endereço localizado'
                        });
                    } else {
                        clearForm();
                        Toast.fire({
                            icon: 'error',
                            title: 'CEP não encontrado.'
                        })
                    }
                });
            } else {
                clearForm();
                Toast.fire({
                    icon: 'error',
                    title: 'Formato de CEP inválido.'
                })
            }
        } else {
            clearForm();
        }
    });

    function clearForm() {
        $("input[name=public_place]").val("");
        $("input[name=neighborhood]").val("");
        $("input[name=city]").val("");
        $("input[name=state]").val("");
    }
});

// Example starter JavaScript for disabling form submissions if there are invalid fields
(() => {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    const forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
            if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
            }
            form.classList.add('was-validated')
        }, false)

        window.addEventListener('DOMContentLoaded', (event) => {
            form.querySelectorAll(".next").forEach(el => {
                el.addEventListener('click', function(event) {
                    $(".text-danger").removeClass("text-danger");

                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    $('.tab-pane').each(function(index, obj) {
                        var pane = '#' + $(this).attr('id');
                        var n = $(pane + ' .form-control:invalid').length;
                        if (n > 0) {
                            console.log(pane);
                            console.log(n);
                            $("a[href='" + pane + "']").addClass("text-danger");
                        } else {
                            $("a[href='" + pane + "']").addClass("text-success");
                        }
                    });


                    form.classList.add('was-validated')
                });
            }, false)

        });
    })
    //
})()


var url = document.location.toString();
if (url.match('#')) {
    $('#list-tab a[href="#' + url.split('#')[1] + '"]').tab('show');
}

$('#list-tab a').on('click', function(e) {
    if (history.pushState) {
        history.pushState(null, null, e.target.hash);
    } else {
        window.location.hash = e.target.hash; //Polyfill for old browsers
    }
    e.preventDefault()
    $(this).tab('show')
})
$('.next').click(function() {
    var verification = $("input[required]:visible, select[required]:visible").filter(function() {
        return $.trim($(this).val()) == '';
    }).length;
    if (verification === 0) {
        $('#list-tab > .active').next('a').trigger('click');
    }
});

$('.prev').click(function() {
    $('#list-tab > .active').prev('a').trigger('click');
});

//

$(':checkbox').change(function() {
    var option = $(this).attr('id');
    if ($(this).is(':checked')) {
        $("." + option).removeClass('d-none');
    } else {
        $("." + option).addClass('d-none');
    }
});


$("#list-transactions span.input-group-text :checkbox").each(function() {
    var option = $(this).attr('id');
    if ($(this).is(':checked')) {
        $("." + option).removeClass('d-none');
    } else {
        $("." + option).addClass('d-none');
    }
});


var deleteModal = document.getElementById('modal-small')
deleteModal.addEventListener('show.bs.modal', function (event) {
    var button = event.relatedTarget
    var id = button.getAttribute('data-bs-id')
    var modalTitle = deleteModal.querySelector('#delete').setAttribute("action", window.location.href+"/"+id)
})