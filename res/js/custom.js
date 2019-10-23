$(document).ready(function () {
    $("#dc").keyup(function () {
        $.ajax({
            type: "POST",
            url: "http://localhost/QLNK/admin/GetCountryName",
            data: {
                keyword: $("#dc").val()
            },
            dataType: "json",
            success: function (data) {
                if (data.length > 0) {
                    $('#DropdownCountry').empty();
                    $('#dc').attr("data-toggle", "dropdown");
                    $('#DropdownCountry').dropdown('toggle');
                }
                else if (data.length == 0) {
                    $('#dc').attr("data-toggle", "");
                }
                $.each(data, function (key,value) {
                    if (data.length >= 0)
                        $('#DropdownCountry').append('<li role="displayCountries" ><a role="menuitem dropdownCountryli" class="dropdownlivalue">' + value['tendd'] + '</a></li>');
                });
            }
        });
    });
    $('ul.txtcountry').on('click', 'li a', function () {
        $('#dc').val($(this).text());
    });
// Quê quán
    $("#quequan").keyup(function () {
        $.ajax({
            type: "POST",
            url: "http://localhost/QLNK/admin/GetCountryName",
            data: {
                keyword: $("#quequan").val()
            },
            dataType: "json",
            success: function (data) {
                if (data.length > 0) {
                    $('#DropdownQuequan').empty();
                    $('#quequan').attr("data-toggle", "dropdown");
                    $('#DropdownQuequan').dropdown('toggle');
                }
                else if (data.length == 0) {
                    $('#quequan').attr("data-toggle", "");
                }
                $.each(data, function (key,value) {
                    if (data.length >= 0)
                        $('#DropdownQuequan').append('<li role="displayCountries" ><a role="menuitem dropdownCountryli" class="dropdownlivalue">' + value['tendd'] + '</a></li>');
                });
            }
        });
    });
    $('ul.txtQuequan').on('click', 'li a', function () {
        $('#quequan').val($(this).text());
    });
// Nơi làm việc
    $("#noilamviec").keyup(function () {
        $.ajax({
            type: "POST",
            url: "http://localhost/QLNK/admin/GetCountryName",
            data: {
                keyword: $("#noilamviec").val()
            },
            dataType: "json",
            success: function (data) {
                if (data.length > 0) {
                    $('#DropdownNoilv').empty();
                    $('#noilamviec').attr("data-toggle", "dropdown");
                    $('#DropdownNoilv').dropdown('toggle');
                }
                else if (data.length == 0) {
                    $('#noilamviec').attr("data-toggle", "");
                }
                $.each(data, function (key,value) {
                    if (data.length >= 0)
                        $('#DropdownNoilv').append('<li role="displayCountries" ><a role="menuitem dropdownCountryli" class="dropdownlivalue">' + value['tendd'] + '</a></li>');
                });
            }
        });
    });
    $('ul.txtnoilv').on('click', 'li a', function () {
        $('#noilamviec').val($(this).text());
    });
// Chỗ ở hiện nay
    $("#choohiennay").keyup(function () {
        $.ajax({
            type: "POST",
            url: "http://localhost/QLNK/admin/GetCountryName",
            data: {
                keyword: $("#choohiennay").val()
            },
            dataType: "json",
            success: function (data) {
                if (data.length > 0) {
                    $('#DropdownChoo').empty();
                    $('#choohiennay').attr("data-toggle", "dropdown");
                    $('#DropdownChoo').dropdown('toggle');
                }
                else if (data.length == 0) {
                    $('#choohiennay').attr("data-toggle", "");
                }
                $.each(data, function (key,value) {
                    if (data.length >= 0)
                        $('#DropdownChoo').append('<li role="displayCountries" ><a role="menuitem dropdownCountryli" class="dropdownlivalue">' + value['tendd'] + '</a></li>');
                });
            }
        });
    });
    $('ul.txtchoo').on('click', 'li a', function () {
        $('#choohiennay').val($(this).text());
    });
});