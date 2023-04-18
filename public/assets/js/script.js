$(document).ready(function () {
    const spinner = $("#spinner");
    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 2500,
    });

    const flashdata = $("#flash-data").data("flash");
    // console.log(flashdata);
    if (flashdata == "Ditambah" || flashdata == "Diubah") {
        setTimeout(() => {
            Toast.fire("", "Data Berhasil " + flashdata, "success");
        }, 1000);
    } else if (flashdata == "Logout") {
        setTimeout(() => {
            // swal("Berhasil!", flashdata + " Berhasil Dihapus!", "success");
            Swal.fire("Anda telah " + flashdata, "", "success");
        }, 1000);
    } else if (flashdata) {
        setTimeout(() => {
            // swal("Berhasil!", flashdata + " Berhasil Dihapus!", "success");
            Toast.fire("", flashdata + " Berhasil Dihapus!", "success");
        }, 1000);
    }

    $("#example").DataTable();

    $("label")
        .children('select[name="example_length"]')
        .attr("class", "form-control form-control-sm");

    $("label")
        .children('select[name="data-serverside_length"]')
        .attr("class", "form-control form-control-sm");

    $("#data-serverside").parent().css({
        flex: "auto",
        margin: "0px 15px 0px 15px",
        padding: "0",
        position: "relative",
        "-ms-flex": "auto",
        "overflow-x": "auto",
    });

    $("#data-serverside_processing").html(spinner);

    $("data-serverside tbody").on("click", "tr", function () {
        $(this).toggleClass("selected");
    });

    $("btn-print").click(function () {
        var allVals = [];
        $(".selected").each(function () {
            allVals.push($(this).attr("data-id"));
        });
        if (allVals.length <= 0) {
            alert("Please select row.");
        } else {
            $("#input-ids").val(allVals);
            $("#form-export").submit();
        }
    });

    $(document).on("click", "#btn-add", function () {
        const url = $(this).data("url");
        $(".modal-title").html("Tambah Data");
        $("#modal-form").attr("action", url);
        $(".modal-body").html(spinner);
        $("#modal-form").removeAttr("target");
        $(".modal-body").load(url + "/create");
        $("#modal-submit").html("Simpan");
    });

    $(document).on("click", "#btn-edit", function () {
        const url = $(this).data("url");
        // console.log(url);
        $(".modal-title").html("Ubah Data");
        $("#modal-form").attr("action", url);
        $(".modal-body").html(spinner);
        $("#modal-form").removeAttr("target");
        $.ajax({
            url: url + "/edit",
            success: function (data) {
                $(".modal-body").html(data);
            },
            error: function (xhr, thrownError) {
                alert(
                    xhr.status + "\n" + xhr.responseText + "\n" + thrownError
                );
            },
        });
        $("#modal-submit").html("Simpan");
    });

    $(document).on("click", ".btn-delete", function (e) {
        e.preventDefault();
        const form = $(this).parent();
        // console.log(form);
        // const href = $(this).attr('href');
        Swal.fire({
            title: "Apakah Anda Yakin?",
            text: "Data Akan Dihapus",
            type: "warning",
            showCancelButton: true,
            // confirmButtonColor: "#3085d6",
            // cancelButtonColor: "#d33",
            confirmButtonText: "Ya!",
            cancelButtonText: "Batal",
        }).then((result) => {
            if (result.value) {
                form.submit();
            }
        });
    });

    //Validation-modal
    $(document).on("click", "modal-submit", function (e) {
        e.preventDefault();
        const url = $("#btn-add").data("url");
        var modalForm = $("#modal-form");
        var formData = modalForm.serialize();
        $.ajax({
            url: url,
            type: "post",
            data: formData,
            success: function (data) {
                if (data.success) {
                    location.reload();
                } else {
                    $(".modal-body").html(data);
                }
            },
            error: function (xhr, thrownError) {
                alert(
                    xhr.status + "\n" + xhr.responseText + "\n" + thrownError
                );
            },
        });
    });

    $(document).on("change", "#toggle-wa", function () {
        const url = $(this).data("url");
        var setting;
        if ($(this).prop("checked")) {
            setting = 0;
        } else {
            setting = 1;
        }
        $.ajax({
            url: url,
            data: { setting_notif: setting },
            // success: function (data) {
            //     console.log(data);
            // },
            error: function (xhr, thrownError) {
                alert(
                    xhr.status + "\n" + xhr.responseText + "\n" + thrownError
                );
            },
        });
    });

    $(document).on("click", "button[data-toggle=modal]", function () {
        const url = $("#toggle-wa").data("url");
        // console.log(url);
        $.ajax({
            url: url,
            data: { check_status: 1 },
            success: function (data) {
                // console.log(data);
                $(".notif").html(data);
            },
            error: function (xhr, thrownError) {
                alert(
                    xhr.status + "\n" + xhr.responseText + "\n" + thrownError
                );
            },
        });
    });
});
