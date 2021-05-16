$(function() {
    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    }); // TO SEND THE CSRF TOKEN WITH AJAX REQUEST

    $(document).ajaxSend(function() {
        $('input[type=file]').attr('disabled', 'disabled');
        $('body').addClass('loading-animation');
    }); // TO MAKE LOAD ANIMATION BEFORE SEND THE AJAX REQUEST

    $(document).ajaxStop(function() {
        $('.btn,input,select').removeAttr('disabled');
        $('.loading-animation').removeClass('loading-animation');
    }); // TO END THE LOAD ANIMATION AFTER SEND THE AJAX REQUEST

    $(document).ajaxError(function(data, textStatus, jqXHR) {
        if (typeof textStatus.responseJSON !== 'undefined' && textStatus.responseJSON.message == 'Unauthenticated.') { location.reload(true); }
    }); // WHEN MAKE REQUEST AND THE RESPONSE IS ERROR THEN MAKE REFRESH THE PAGE

    document.addEventListener('wheel', (e) => (e.ctrlKey || e.metaKey) && e.preventDefault(), { passive: false });

    $('body').on('contextmenu', 'img', function(e) { e.preventDefault(); });

    // VARIABLES
    var text = $('#search-text').val(),
        column = $('#column-name').val(),
        record = $('#record-number').val(),
        url = window.location.href;
    sort = 'id',
        ajax_table_data = { abort: function() {} },
        ajax_load_form = { abort: function() {} },
        ajax_btn_action = { abort: function() {} },
        order = 'desc';

    function rows() {
        ajax_table_data = $.ajax({
            url: url,
            type: "get",
            data: { text: text, column: column, record: record, sort: sort, order: order },
            success: function(data, textStatus, jqXHR) {
                $('#load_data').fadeOut();
                setTimeout(() => {
                    $('#load_data').empty().fadeIn().html(data.view);
                }, 300);
                $('#records-count').text(data.count);
            },
            error: function(jqXHR) {
                if (jqXHR.readyState == 0)
                    return false;
                toastr.error(jqXHR.responseJSON.message);
            },
        });
    } // AJAX CODE TO LOAD THE DATA TABLE

    // THIS FOR CHECK IF THE PAGE HAVE TABLE OR NOT, IF HAVE THEN RUN THE AJAX CODE TO GET THE TABLE DATA
    if ($('#load_data').length) { rows(); }

    $('body').on('click', '.pagination .page-item .page-link', function(e) {
        e.preventDefault();
        ajax_table_data.abort();
        url = $(this).attr('href');
        if ($(this).parent('li').hasClass('active')) { return false; }
        rows();
    }); // LOAD THE DATA BY PAGINATION LINKS

    $('body').on('change', '#record-number', function() {
        ajax_table_data.abort();
        record = $(this).val();
        if (record == -1 || record <= 0)
            record = (parseInt($('#records-count').text()) * 2);
        rows();
    }); // MAKE PAGINATION BY COLUMN RECORDS

    $('body').on('keyup', '#search-text', function(e) {
        if ((e.keyCode >= 48 && e.keyCode <= 90) || (text != '' && e.keyCode == 8)) {
            text = $(this).val();
            ajax_table_data.abort();
            rows();
        } // end of if statement
    }); // MAKE PAGINATION BY COLUMN RECORDS

    $('body').on('change', '#column-name', function() {
        column = $(this).val();
        if (text !== '') {
            ajax_table_data.abort();
            rows();
        } // end of if statement
    }); // MAKE RESEARCH BY COLUMN NAME

    $('body').on('click', '#reset-btn', function(e) {
        e.preventDefault();
        $('#search-text').val('');
        text = $('#search-text').val();
        $('#record-number').prop('selectedIndex', 0);
        column = $('#column-name').val();
        $('#column-name').prop('selectedIndex', 0);
        record = $('#record-number').val();
        url = window.location.href;
        sort = 'id';
        order = 'desc';
        ajax_table_data.abort();
        rows();
    }); // MAKE RESET TO THE SELECTION COLUMNS , RECORDS AND INPUT SEARCH

    $("body").on("click", "tbody tr td.check-item", function() {
        var ele = $(this).find('input[type=checkbox].check-box-id').click(function(e) { e.stopPropagation(); });
        if (ele.prop('checked'))
            return ele.prop("checked", false);
        return ele.prop("checked", true);
    }); // WHEN CLICK ON TR MAKE THE CHILD CHECK-BOX IS TRUE OR FALSE

    $("body").on("change", "input[type=checkbox]#check-all", function() {
        let bool = $(this);
        $('input[type=checkbox].check-box-id').each(function() {
            if (bool.prop('checked')) {
                $(this).prop('checked', true);
            } else {
                $(this).prop('checked', false);
            }
        });
    }); // WHEN CLICK ON TR MAKE THE CHILD CHECK-BOX IS TRUE OR FALSE

    $('thead tr th').each(function() {
        if ($(this).data('sort'))
            $(this).css('cursor', 'pointer');
    }); //  MAKE EACH T-HEAD > TH IS CLICKABLE

    $('body').on('click', 'thead tr th', function() {
        let th = $(this),
            sort_icon;
        if (!th.hasClass('sorting') && th.data('sort'))
            th.addClass('sorting').siblings('th').removeClass('sorting').removeData('order').find('span').remove();
        // end of check if not has class

        if (th.hasClass('sorting') && th.data('sort')) {
            sort = th.data('sort');
            if (order == 'desc') {
                order = 'asc';
                sort_icon = '<i class="fas fa-sort-amount-up"></i>';
            } else if (order == 'asc') {
                order = 'desc';
                sort_icon = '<i class="fas fa-sort-amount-down"></i>';
            }
            ajax_table_data.abort();
            rows();
            th.find('span').remove();
            th.prepend("<span>" + sort_icon + "</span>");
        } // end of check if data sort
    }); // MAKE SORTING USING BY COLUMN NAME

    $("body").on('change', '#image input[type=file]', function() {
        let img = $(this).parent('#image').find('img');
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                img.attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        }
    }); // PREVIEW THE IMAGE WHEN SELECTED

    $('body').on('click', '.load-form', function(e) {
        e.preventDefault();
        ajax_load_form.abort();
        let container = $('body').find('#formModal #form_body');
        $(this).attr('data-toggle', 'modal').attr('data-target', '#formModal');
        container.empty();
        $('#search-text').attr('disabled');
        ajax_load_form = $.ajax({
            url: $(this).attr('href'),
            type: "GET",
            success: function(data, textStatus, jqXHR) {
                container.append(data);
                $('#search-text').removeAttr('disabled');
            },
            error: function(jqXhr) {
                if (jqXhr.readyState == 0)
                    return false;
                container.append('<div class="alert alert-danger">' + jqXhr.responseJSON.message + '</div>');
            },
            complete: function() {
                $(this).removeAttr('data-toggle').removeAttr('data-target');
            }
        });
    }); // LOAD THE FORM ON MODAL

    $('body').on('submit', '.form', function(e) {
        e.preventDefault();
        ajax_load_form.abort();
        let form = $(this),
            msg = form.prev('#message');
        msg.fadeOut(500);
        setTimeout(function() {
            msg.empty();
            form.find('span.error').fadeOut(300).removeClass('px-1');
            form.find(`input`).css('border-color', '#CACFE7');
        }, 300);
        ajax_load_form = $.ajax({
            url: form.attr('action'),
            type: "POST",
            data: new FormData($(this)[0]),
            dataType: 'JSON',
            processData: false,
            contentType: false,
            success: function(data, textStatus, jqXHR) {
                if (data.redirect) {
                    $('.modal').modal("show").find('#form_body').empty().append(data.redirect);
                } else {
                    toastr.success(data.message, data.title);
                    $('.modal').modal("hide");
                    rows();
                }
            },
            error: function(jqXhr, textStatus, errorMessage) {
                if (jqXhr.readyState == 0) { return false; }

                if (jqXhr.status == 422) {
                    $.each(jqXhr.responseJSON.errors, function(key, val) {
                        form.find(`#${key.replace('.', '_')}_error`).text(val[0]).fadeIn(300).addClass('px-1');
                        form.find(`[name=${key.replace('.', '_')}]`).css('border-color', '#f00');
                    });
                } else {
                    msg.append(`<div class="alert bg-danger alert-icon-left alert-arrow-left mb-0 mt-2" role="alert"> <span class="alert-icon"><i class="la la-thumbs-o-down"></i></span> <strong> ${jqXhr.responseJSON} </strong> </div>`);
                }
            },
            complete: function() { msg.fadeIn(500); }
        });
    }); // SUBMIT THE FORM

    $('body').on('click', 'button[type = reset]', function() {
        $('.error').fadeOut(300);
    }); // MAKE RESET TO THE Form

    function actions(action, id) {
        ajax_btn_action = $.ajax({
            url: window.location.href + '/' + action,
            type: "post",
            data: { id: id },
            success: function(data, textStatus, jqXHR) {
                $('#check-all').prop('checked', false);
                if (data.type == 'warning') {
                    toastr.warning(data.message, data.title);
                } else {
                    toastr.success(data.message, data.title);
                    rows();
                }
            },
            error: function(error) {
                if (jqXhr.readyState == 0)
                    return false;
                toastr.error(error.responseJSON.message);
            },
        });
    } // END FUNCTION TO SEND DATA TO CONTROLLER WHEN CLICK ON BUTTONS

    $('body').on('click', '.btn_action', function(e) {
        e.preventDefault();
        ajax_btn_action.abort();
        let id = [];
        let message = '';
        let action = $(this).data('action');

        if ($(this).data('id')) {
            id.push($(this).data('id'));
            message = action + '_message';
        } else {
            $('input[type=checkbox].check-box-id:checked').each(function() { id.push($(this).val()); });
            message = 'multi_' + action + '_message';
        }
        if (id.length == 0) {
            translate('select_some_records_first');
        } else {
            confirmAlert(message, action, id);
        }
    }); // TO MAKE ANY ACTION [ DESTROY, DELETE, RESTORE ]

    function translate(message) {
        $.ajax({
            url: '/translate',
            type: "POST",
            data: { message: message },
            success: function(data) {
                toastr.error(data);
            },
        });
    } // TO MAKE TRANSLATE THE SINGLE MESSAGE

    function confirmAlert(message, action, id) {
        $.ajax({
            url: '/translate',
            type: "POST",
            data: { message: message, title: action, count: id.length, yes_sure: 'yes_sure', no_cancel: 'no_cancel' },
            success: function(data) {
                swal({
                    text: data.message,
                    title: data.title,
                    icon: "warning",
                    buttons: [
                        data.no_cancel,
                        data.yes_sure
                    ],
                    dangerMode: true,
                }).then(function(isConfirm) {
                    if (isConfirm) {
                        actions(action, id);
                    } else {
                        translate('cancelled_message');
                        $('table input[type=checkbox]').prop('checked', false);
                    }
                });
            },
        });
    } // TO MAKE TRANSLATE THE CONFIRM ALERT MESSAGE

    $('body').on('click', '.print', function(e) {
        e.preventDefault();
        let target = $(this).attr('href');
        let table = $('#' + target).html();
        let print = $('#' + target);

        if (target == 'table') {
            print.find('.remove-when-print').remove();
        }
        PrintElem(target);

        if (target == 'table') {
            $('#' + target).empty().append(table);
        }
    }); // TO MAKE PRINT TO SOME ELEMENT

    function PrintElem(elem) {
        let style = document.getElementsByTagName('head')[0].innerHTML,
            body = document.getElementById(elem).parentElement.innerHTML;

        printWindow = window.open('', 'PRINT', 'height=500,width=900', false);
        printWindow.document.write(`<html> ${style} <body> ${body} </body> </html>`);
        printWindow.document.close(); // necessary for IE >= 10
        printWindow.focus(); // necessary for IE >= 10*/
        printWindow.print();
        return true;
    } // FUNCTION TO MAKE PRINT

    $('body').on('change', 'select[name=user_id]', function(e) {
        e.preventDefault();
        var code = $(this).find('option:selected').data('code');
        $(this).parentsUntil('form-body').find('input[name=code_id]').val(code);
    }); // GET CODE OF ABSENCES DEPENDENT OF ID

    $('body').on('click', '.input-group-prepend', function(e) {
        let icon = $(this).find('.toggle-password');
        if (icon.hasClass('toggle-password')) {
            if (icon.hasClass('fa-eye')) {
                icon.removeClass('fa-eye').addClass('fa-eye-slash');
                icon.closest('.input-group').find('input[type=password]').attr('type', 'text');
            } else {
                icon.removeClass('fa-eye-slash').addClass('fa-eye');
                icon.closest('.input-group').find('input[type=text]').attr('type', 'password');
            }
        }
    }); // CHANGE THE TYPE OF INPUT PASSWORD TO TEXT AND BACK AGAIN

}); // end if function jquery
