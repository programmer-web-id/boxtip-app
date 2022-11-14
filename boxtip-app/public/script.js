// Control Panel Script
// button
$("#btn-create").click(function () {
    let pathnames = location.pathname.split("/");
    location.href = "/" + pathnames[1] + "/create";
});
$("#btn-edit").click(function () {
    location.href = location.pathname + "/edit";
});
$("#btn-save").click(function () {
    $("#btn-submit").click();
});
$("#btn-discard").click(function () {
    if (location.pathname.includes("/edit")) {
        location.href = location.pathname.replace("/edit", "");
    } else {
        location.href = location.pathname.replace("/create", "");
    }
});
$("#btn-back").click(function () {
    let pathnames = location.pathname.split("/");
    location.href = "/" + pathnames[1];
});
$("#btn-reset-query").click(function () {
    $("#filter-field-1").val("-1");
    $("#filter-field-2").val("-1");
    $("#filter-input-1").val("");
    $("#filter-input-2").val("");
    $(".data-row").removeClass("d-none");
});
$("#btn-query").click(function () {
    let field1 = $("#filter-field-1").val();
    let fieldInput1 = $("#filter-input-1").val();
    let field2 = $("#filter-field-2").val();
    let fieldInput2 = $("#filter-input-2").val();
    let validationField1 = false;
    let validationField2 = false;

    validationField1 = validateColumn(field1, fieldInput1, 1);
    if (validationField1 && field2 != null) {
        validationField2 = validateColumn(field2, fieldInput2, 2);
    }

    if (validationField1 && validationField2) {
        $(".data-row").each(function () {
            let data1 = $(this)
                .find("td[data-column='" + field1 + "']")
                .text()
                .replace(/\W/g, "")
                .toLowerCase();
            let data2 = $(this)
                .find("td[data-column='" + field2 + "']")
                .text()
                .replace(/\W/g, "")
                .toLowerCase();
            if (
                data1.includes(fieldInput1.toLowerCase()) &&
                data2.includes(fieldInput2.toLowerCase())
            ) {
                $(this).removeClass("d-none");
            } else {
                $(this).addClass("d-none");
            }
        });
    } else if (validationField1 && !validationField2) {
        $(".data-row").each(function () {
            let data1 = $(this)
                .find("td[data-column='" + field1 + "']")
                .text()
                .replace(/\W/g, "")
                .toLowerCase();
            if (data1.includes(fieldInput1.toLowerCase())) {
                $(this).removeClass("d-none");
            } else {
                $(this).addClass("d-none");
            }
            console.log(data1);
        });
    } else {
    }
});

$("#btn-delete").click(function () {
    let ids = [];
    $(".check-row:checked").each(function () {
        ids.push($(this).parent().parent().data("id"));
    });
    if (ids.length > 0) {
        $("#form-delete").attr("action", "/customer/" + ids);
        $("#btn-form-delete").click();
    }
});

$("#btn-export").click(function () {
    let ids = [];
    $(".check-row:checked").each(function () {
        ids.push($(this).parent().parent().data("id"));
    });
    if (ids.length > 0) {
        location.href = "/customer/export/" + ids;
    } else {
        alert("No row to export!");
    }
});

$("#btn-close-alert").click(function () {
    $("div").remove(".data-created");
});

function validateColumn(column, columnInput, number) {
    if (column == null) {
        alert("Please select column " + number + " to filter");
    } else if (!columnInput) {
        alert("Please input value " + number + " to filter");
    } else {
        return true;
    }
    return false;
}

$("#filter-field-1").change(function () {
    let selected = $(this).find(":selected").val();
    $("#filter-field-2").val("-1");
    $("#filter-field-2")
        .children()
        .each(function () {
            $(this).removeClass("d-none");
            if ($(this).val() === selected) {
                $(this).addClass("d-none");
            }
        });
});

$(function () {
    $(".filter-option").each(function () {
        let text = $(this).val().replace(/_+/g, " ").replace(" id", "");
        $(this).text(text.charAt(0).toUpperCase() + text.slice(1));
    });
});

// Table Script
// checkbox
$("#check-all").click(function () {
    $(".check-row").prop("checked", this.checked);
});
// detail
$(".data-column").click(function () {
    location.href = $(this).parent().data("redirect");
});
