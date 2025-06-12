import 'select2/dist/js/select2.min.js'
import 'jquery-mask-plugin'

if ($.mask) {
    $('[data-toggle="input-mask"]').each(function (idx, obj) {
        var maskFormat = $(obj).data("maskFormat");
        var reverse = $(obj).data("reverse");
        if (reverse != null)
            $(obj).mask(maskFormat, { 'reverse': reverse });
        else
            $(obj).mask(maskFormat);
    });
}
