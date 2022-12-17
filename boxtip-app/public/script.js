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

    if (validationField1 || validationField2) {
        values = {};
        values[field1] = fieldInput1.toUpperCase();
        if (validationField2) {
            values[field2] = fieldInput2.toUpperCase();
        }
        $.ajax({
            url: "/customer",
            method: "GET",
            data: values,
            beforeSend: function () {
                $("#app").after(setLoadingScreen());
            },
            success: function (data) {
                var newDoc = document.open("text/html", "replace");
                newDoc.write(data);
                newDoc.close();
            },
            complete: function () {
                $(".loading-screen").remove();
            },
        });
    }
});

$("#btn-delete").click(function () {
    let ids = [];
    $(".check-row:checked").each(function () {
        ids.push($(this).parent().parent().data("id"));
    });
    if (ids.length > 0) {
        $("#form-delete").attr("action", $(this).data("delete") + "/" + ids);
        $("#btn-form-delete").click();
    } else {
        alert("No row to delete");
    }
});

$("#btn-archive").click(function () {
    let ids = [];
    $(".check-row:checked").each(function () {
        ids.push($(this).parent().parent().data("id"));
    });
    if (ids.length > 0) {
        $("#form-archive").attr(
            "action",
            $(this).data("archive") + "/archive/" + ids
        );
        $("#btn-form-archive").click();
    } else {
        alert("No row to archive");
    }
});

$("#btn-unarchive").click(function () {
    let ids = [];
    $(".check-row:checked").each(function () {
        ids.push($(this).parent().parent().data("id"));
    });
    if (ids.length > 0) {
        $("#form-unarchive").attr(
            "action",
            $(this).data("unarchive") + "/unarchive/" + ids
        );
        $("#btn-form-unarchive").click();
    } else {
        alert("No row to unarchive");
    }
});

$("#btn-export").click(function () {
    let ids = [];
    $(".check-row:checked").each(function () {
        ids.push($(this).parent().parent().data("id"));
    });
    if (ids.length > 0) {
        location.href = $(this).data("export") + ids;
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
$(".data-column").dblclick(function () {
    // console.log("Hehe");
    location.href = $(this).parent().data("redirect");
});

// change province -> update city selections -> reset districts
$("#input-province").change(function () {
    // remove selection at city
    $("#input-city").html("<option selected disabled>Select City</option>");

    // append city selection as per province
    $.ajax({
        url: "/data/city/" + $(this).val(),
        beforeSend: function () {
            $("#app").after(setLoadingScreen());
        },
        success: function (data) {
            data.forEach((city) => {
                $("#input-city").append(
                    "<option value='" + city.id + "'>" + city.name + "</option>"
                );
            });
        },
        complete: function () {
            $(".loading-screen").remove();
        },
    });

    // remove selection at district
    $("#input-district").html(
        "<option selected disabled>Select District</option>"
    );
});

// change city -> update districts
$("#input-city").change(function () {
    // remove selection at district
    $("#input-district").html(
        "<option selected disabled>Select District</option>"
    );

    // append district selection as per city
    $.ajax({
        url: "/data/district/" + $(this).val(),
        beforeSend: function () {
            $("#app").after(getLoadingScreen());
        },
        success: function (data) {
            data.forEach((district) => {
                $("#input-district").append(
                    "<option value='" +
                        district.id +
                        "'>" +
                        district.name +
                        "</option>"
                );
            });
        },
        complete: function () {
            $(".loading-screen").remove();
        },
    });
});

// Voucher
// input
$("#customer-search").keyup(function (e) {
    let search = $(this).val();
    $(".customer-row").each(function () {
        let data = $(this)
            .find("label")
            .text()
            .replace(/\W/g, "")
            .toLowerCase();
        if (!search) {
            $(this).removeClass("d-none");
        }
        if (data.includes(search.toLowerCase())) {
            $(this).removeClass("d-none");
        } else {
            $(this).addClass("d-none");
        }
    });
});
$("#customer-search").keydown(function (e) {
    if (e.keyCode == 13) {
        e.preventDefault();
        return false;
    }
});

function setLoadingScreen() {
    return "<div class='loading-screen'><button class='btn btn-primary' type='button' disabled><span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span>Loading...</button></div>";
}
