"use strict";

window.jQuery = window.$ = require("jquery");
require("bootstrap");
require("block-ui");
require("autosize");
require("clipboard");
window.moment = require("moment");
window.Sticky = require("sticky-js");
window.Chart = require("chart.js");
window.Raphael = require("raphael");
window.Cookies = require("js-cookie");
window.Popper = require("popper.js");
window.swal = require('sweetalert2');
window.Tooltip = require('tooltip.js');
window.DataTable = require('datatables.net-bs4');
window.select2 = require('./select2');
require("jquery-form");
/**
 * Define the output of this file. The output of CSS and JS file will be auto detected.
 *
 * @output js/scripts.bundle
 */
// Keentheme"s plugins
window.KTUtil = require("./assets/js/global/components/base/util");
window.KTApp = require("./assets/js/global/components/base/app");
window.KTAvatar = require("./assets/js/global/components/base/avatar");
window.KTDialog = require("./assets/js/global/components/base/dialog");
window.KTHeader = require("./assets/js/global/components/base/header");
window.KTMenu = require("./assets/js/global/components/base/menu");
window.KTOffcanvas = require("./assets/js/global/components/base/offcanvas");
window.KTPortlet = require("./assets/js/global/components/base/portlet");
window.KTScrolltop = require("./assets/js/global/components/base/scrolltop");
window.KTToggle = require("./assets/js/global/components/base/toggle");
window.KTWizard = require("./assets/js/global/components/base/wizard");
require("./assets/js/global/components/base/datatable/core.datatable");
require("./assets/js/global/components/base/datatable/datatable.checkbox");
require("./assets/js/global/components/base/datatable/datatable.rtl");

// Layout scripts
window.KTLayout = require("./assets/js/global/layout/layout");
window.KTChat = require("./assets/js/global/layout/chat");
require("./assets/js/global/layout/demo-panel");
require("./assets/js/global/layout/offcanvas-panel");
require("./assets/js/global/layout/quick-panel");
require("./assets/js/global/layout/quick-search");


// toastr
require("toastr/build/toastr.css");
window.toastr = require("toastr");

// perfect-scrollbar
require("perfect-scrollbar/css/perfect-scrollbar.css");
window.PerfectScrollbar = require("perfect-scrollbar/dist/perfect-scrollbar");

// owl.carousel
require("owl.carousel/dist/assets/owl.carousel.css");
require("owl.carousel/dist/assets/owl.theme.default.css");
require("owl.carousel");

// daterangepicker
require("bootstrap-daterangepicker/daterangepicker.css");
require("bootstrap-daterangepicker");

// bootstrap-select
require("bootstrap-select/dist/css/bootstrap-select.css");
require("bootstrap-select");

// bootstrap-session-timeout
require("./assets/plugins/bootstrap-session-timeout/dist/bootstrap-session-timeout.js");

// jquery-idletimer
require("./assets/plugins/jquery-idletimer/idle-timer.js");

// bootstrap-switch
require("bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css");
require("bootstrap-switch");
require("./assets/js/global/integration/plugins/bootstrap-switch.init.js");

// sweetalert2
require("sweetalert2/dist/sweetalert2.css");
require("es6-promise-polyfill/promise.min.js");
require("./assets/js/global/integration/plugins/sweetalert2.init");

// bootstrap-notify
require("bootstrap-notify");
require("./assets/js/global/integration/plugins/bootstrap-notify.init.js");

// bootstrap-datepicker
require("bootstrap-datepicker/dist/css/bootstrap-datepicker3.css");
require("bootstrap-datepicker");
require("./assets/js/global/integration/plugins/bootstrap-datepicker.init");

// bootstrap-datetime-picker
require("bootstrap-datetime-picker/css/bootstrap-datetimepicker.css");
require("bootstrap-datetime-picker");

// bootstrap-timepicker
require("bootstrap-timepicker/css/bootstrap-timepicker.css");
require("bootstrap-timepicker");
require("./assets/js/global/integration/plugins/bootstrap-timepicker.init");

// Tagify
require("@yaireo/tagify/dist/tagify.css");
window.Tagify = require("@yaireo/tagify/dist/tagify");
require("@yaireo/tagify/dist/tagify.polyfills.min");

// typeahead
window.Bloodhound = require("typeahead.js");
window.Handlebars = require("handlebars/dist/handlebars.js");

// dropzone
require("dropzone/dist/dropzone.css");
window.Dropzone = require("dropzone");
require("./assets/js/global/integration/plugins/dropzone.init");

// ClipboardJS
window.ClipboardJS = require("clipboard");

// autosize
window.autosize = require("autosize");

// summernote
require("summernote/dist/summernote.css");
require("summernote");

// quill
require("quill/dist/quill.snow.css");
window.Quill = require("quill");

// inputmask
require("inputmask/dist/jquery.inputmask.bundle");
require("inputmask/dist/inputmask/inputmask.date.extensions");
require("inputmask/dist/inputmask/inputmask.numeric.extensions");

// ion-rangeslider
require("ion-rangeslider/css/ion.rangeSlider.css");
require("ion-rangeslider");

// jquery.repeater
require("jquery.repeater");

// nouislider
window.noUiSlider = require("nouislider");

// wnumb
window.wNumb = require("wnumb");

// jquery-validation
require("jquery-validation");
require("jquery-validation/dist/additional-methods.js");
require("./assets/js/global/integration/plugins/jquery-validation.init");

// bootstrap-multiselectsplitter
require("./assets/plugins/bootstrap-multiselectsplitter/bootstrap-multiselectsplitter.min.js");

// bootstrap-maxlength
require("bootstrap-maxlength");

// bootstrap-touchspin
require("bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css");
require("bootstrap-touchspin");

// bootstrap-markdown
require("bootstrap-markdown/css/bootstrap-markdown.min.css");
require("bootstrap-markdown/js/bootstrap-markdown");
require("./assets/js/global/integration/plugins/bootstrap-markdown.init");

// dual-listbox
window.DualListbox = require('dual-listbox');
require("dual-listbox/dist/dual-listbox.css");

// fonts
require("./assets/plugins/line-awesome/css/line-awesome.css");
require("./assets/plugins/flaticon/flaticon.css");
require("./assets/plugins/flaticon2/flaticon.css");
require("@fortawesome/fontawesome-free/css/all.min.css");
require("socicon");

require("./login-general");
require('./form-repeater');
