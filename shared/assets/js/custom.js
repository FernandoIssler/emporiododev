//URL Config
let url = document.getElementById("url-global").getAttribute("data-url")

//Alert Flash
let alertFlash = document.getElementById("alert-flash").innerHTML
if (alertFlash) {
    let alert = JSON.parse(alertFlash)
    alertRender(alert.type, alert.class, alert.text, alert.title);
}

//Alert Render
function alertRender(type, style, text, title) {

    function icon(style) {
        switch (style) {
            case "danger":
                return "ri-alert-line"
            case "info":
                return "ri-information-line"
            case "warning":
                return "ri-alarm-warning-line"
            case "success":
                return "ri-check-line"
            default:
                return "ri-alert-line"
        }
    }

    if (type === "toast") {
        let id = new Date().getTime();
        let alert = `
                <div id="alertToast${id}" class="bs-toast toast animate__animated animate__tada hide animate__tada" data-bs-delay="15000" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header bg-${style}">
                        <img src="${url}/shared/assets/images/favicon/favicon.ico" class="rounded me-2" height="16">
                        <strong class="me-auto">${(title ?? "Alerta")}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body">
                        ${text}
                    </div>
                </div>
            `;

        $("#alert-container-toast").append(alert);

        new bootstrap.Toast(
            document.getElementById("alertToast" + id)
        ).show();
        return;
    }

    let alert = `
            <div id="alertFixed" class="toast toast-border-${style} overflow-hidden mb-3" data-bs-autohide="false" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-body" data-bs-dismiss="toast" role="button">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0 me-2">
                            <i class="${icon(style)} align-middle"></i>
                        </div>
                        <div class="flex-grow-1"><h6 class="mb-0 text-center">${text}</h6></div>
                    </div>
                </div>
            </div>
        `;

    $("#alert-container-fixed").html(alert);
    new bootstrap.Toast(
        document.getElementById("alertFixed")
    ).show();

}

//AJAX data-post
$("[data-post]").on("click", function (e) {
    e.preventDefault()
    if ($(this).hasClass("ajax-off")) {
        return
    }
    let data = $(this).data()
    let url = $(this).data("post")

    if (data.confirm) {
        swal({
            title: "Atenção!",
            text: data.confirm,
            icon: "warning",
            buttons: ["Cancelar", "Sim"],
            dangerMode: true,
        }).then((confirm) => {
            if (confirm) {
                ajaxPost(data, url)
            }
        });
    } else {
        ajaxPost(data, url)
    }
})

// AJAX Form
$("form:not('.ajax-off')").on("submit", function (e) {
    e.preventDefault()
    // let data = $(this).serialize();
    let data = new FormData(this);
    let url = $(this).attr("action");
    ajaxPost(data, url)
});

//Ajax Post
function ajaxPost(data, url) {

    let loader = $(".loader");

    $.ajax({
        url: url,
        data: data,
        type: "POST",
        dataType: "json",
        cache: false,
        contentType: false,
        processData: false,
        beforeSend: function () {
            loader.fadeIn();
        },
        success: function (response) {

            //redirect
            if (response.redirect) {
                window.location.href = response.redirect;
                console.log("aqui ele faz o redirect")
                return;
            }

            //reload
            if (response.reload) {
                window.location.reload();
                console.log("aqui ele faz o reload")
                return;
            }

            //message
            if (response.message) {
                (response.message.type === "toast" ?
                        alertRender("toast", response.message.class, response.message.text, response.message.title) :
                        alertRender("fixed", response.message.class, response.message.text)
                )
            }

            loader.fadeOut();
        },
        complete: function () {

        },
        error: function (res) {
            let text = "Desculpe, não foi possível processar a requisição. Favor tente novamente!";
            let title = "Oops, nós estamos com problemas!"

            alertRender("toast", "danger", text, title)

            loader.fadeOut();
        },
    });
}