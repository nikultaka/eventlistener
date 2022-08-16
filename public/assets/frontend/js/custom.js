(function($) {
    $(document).ready(function() {
        // For green checkbox border changing
        $(".green-checkbox .form-check-input").on('click', function() {
            $(this).parent().toggleClass("green-border");
        });

        $(".responsive-header .hamburg-menu").on('click', function() {
            $(".left-sidebar").toggleClass("show");
            $("body").toggleClass("menu-open");
            $(".responisve-header-bg-opacity").toggleClass("show");
        });

        $(".responisve-header-bg-opacity").on('click', function() {
            $(".responsive-header .hamburg-menu").trigger("click");
        });

        // Dark light mode JS
        $(".dark-light-mode").click(function() {
            $("body").toggleClass("dark-mode");
        });

        //$(".checkbox-menu").on("change", "input[type='checkbox']", function() {
        //    $(this).closest("li").toggleClass("active", this.checked);
        // });

        // $(document).on('click', '.allow-focus', function (e) {
        //   e.stopPropagation();
        // });
        $(".dropdown-open-click").click(function(e) {
            e.stopPropagation();
        })

    });
})(jQuery);

function successMsg(msg) {
    toastr.options.progressBar = true;
    toastr.success(msg);
}

function errorMsg(msg) {
    toastr.options.progressBar = true;
    var check = Array.isArray(msg)
    if (check) {
        var msgs = "";
        $.each(msg, function(key, value) {
            msgs += value + '<br/>';
        });
        toastr.error(msgs);
    } else {
        toastr.error(msg);
    }
}

function warningMsg(msg) {
    toastr.options.progressBar = true;
    toastr.warning(msg);
}

function infoMsg(msg) {
    toastr.options.progressBar = true;
    var check = Array.isArray(msg)
    if (check) {
        var msgs = "";
        $.each(msg, function(key, value) {
            msgs += value + '<br/>';
        });
        toastr.info(msgs);
    } else {
        toastr.info(msg);
    }
}