// head {
var __nodeId__ = "std_data_exchange__main";
var __nodeNs__ = "std_data_exchange";
// }

(function (__nodeNs__, __nodeId__) {
    $.widget(__nodeNs__ + "." + __nodeId__, {
        options: {},

        _create: function () {
            this.bind();
        },

        _setOption: function (key, value) {
            $.Widget.prototype._setOption.apply(this, arguments);
        },

        bind: function () {
            var widget = this;

            $(".perform_import_button", widget.element).rebind("click", function () {
                var input = $("textarea.import", widget.element);

                request(widget.options.paths.import, {
                    value: input.val()
                });
            });

            $(".perform_import_2_level_button", widget.element).rebind("click", function () {
                var input = $("textarea.import", widget.element);

                request(widget.options.paths.import, {
                    value:            input.val(),
                    skip_first_level: true
                });
            });

            $(".copy_button", widget.element).rebind("click", function () {
                var input = $("textarea.export", widget.element);

                input.select();

                document.execCommand("copy");
            });

            $("textarea", widget.element).focus(function () {
                $(this).select();
            });
        }
    });
})(__nodeNs__, __nodeId__);
