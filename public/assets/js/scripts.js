"use strict";

!function (Niyam, $) {
  "use strict";

  Niyam.Package.name = "DashLite";
  Niyam.Package.version = "3.2";
  var $win = $(window),
    $body = $('body'),
    $doc = $(document),
    //class names
    _body_theme = 'nio-theme',
    _menu = 'nk-menu',
    _mobile_nav = 'mobile-menu',
    _header = 'nk-header',
    _header_menu = 'nk-header-menu',
    _sidebar = 'nk-sidebar',
    _sidebar_mob = 'nk-sidebar-mobile',
    //breakpoints
    _break = Niyam.Break;
  function extend(obj, ext) {
    Object.keys(ext).forEach(function (key) {
      obj[key] = ext[key];
    });
    return obj;
  }
  // ClassInit @v1.0
  Niyam.ClassBody = function () {
    Niyam.AddInBody(_sidebar);
  };

  // ClassInit @v1.0
  Niyam.ClassNavMenu = function () {
    Niyam.BreakClass('.' + _header_menu, _break.lg, {
      timeOut: 0
    });
    Niyam.BreakClass('.' + _sidebar, _break.lg, {
      timeOut: 0,
      classAdd: _sidebar_mob
    });
    $win.on('resize', function () {
      Niyam.BreakClass('.' + _header_menu, _break.lg);
      Niyam.BreakClass('.' + _sidebar, _break.lg, {
        classAdd: _sidebar_mob
      });
    });
  };

  // Code Prettify @v1.0
  Niyam.Prettify = function () {
    window.prettyPrint && prettyPrint();
  };

  // Copied @v1.0
  Niyam.Copied = function () {
    var clip = '.clipboard-init',
      target = '.clipboard-text',
      sclass = 'clipboard-success',
      eclass = 'clipboard-error';

    // Feedback
    function feedback(el, state) {
      var $elm = $(el),
        $elp = $elm.parent(),
        copy = {
          text: 'کپی',
          done: 'کپی شد',
          fail: 'ناموفق'
        },
        data = {
          text: $elm.data('clip-text'),
          done: $elm.data('clip-success'),
          fail: $elm.data('clip-error')
        };
      copy.text = data.text ? data.text : copy.text;
      copy.done = data.done ? data.done : copy.done;
      copy.fail = data.fail ? data.fail : copy.fail;
      var copytext = state === 'success' ? copy.done : copy.fail,
        addclass = state === 'success' ? sclass : eclass;
      $elp.addClass(addclass).find(target).html(copytext);
      setTimeout(function () {
        $elp.removeClass(sclass + ' ' + eclass).find(target).html(copy.text).blur();
        $elp.find('input').blur();
      }, 2000);
    }

    // Init ClipboardJS
    if (ClipboardJS.isSupported()) {
      var clipboard = new ClipboardJS(clip);
      clipboard.on('success', function (e) {
        feedback(e.trigger, 'success');
        e.clearSelection();
      }).on('error', function (e) {
        feedback(e.trigger, 'error');
      });
    } else {
      $(clip).css('display', 'none');
    }
    ;
  };

  // CurrentLink Detect @v1.0
  Niyam.CurrentLink = function () {
    var _link = '.nk-menu-link, .menu-link, .nav-link',
      _currentURL = window.location.href,
      fileName = _currentURL.substring(0, _currentURL.indexOf("#") == -1 ? _currentURL.length : _currentURL.indexOf("#")),
      fileName = fileName.substring(0, fileName.indexOf("?") == -1 ? fileName.length : fileName.indexOf("?"));
    $(_link).each(function () {
      var self = $(this),
        _self_link = self.attr('href');
      if (fileName.match(_self_link)) {
        self.closest("li").addClass('active current-page').parents().closest("li").addClass("active current-page");
        self.closest("li").children('.nk-menu-sub').css('display', 'block');
        self.parents().closest("li").children('.nk-menu-sub').css('display', 'block');
      } else {
        self.closest("li").removeClass('active current-page').parents().closest("li:not(.current-page)").removeClass("active");
      }
    });
  };

  // Sticky Nav @v1.0
  Niyam.StickyNav = function () {
    var elem = document.querySelectorAll('.' + _header);
    if (elem.length > 0) {
      elem.forEach(function (item) {
        var _item_offset = 30;
        if (window.scrollY > _item_offset) {
          item.classList.add('has-fixed');
        } else {
          item.classList.remove('has-fixed');
        }
      });
    }
  };
  Niyam.StickyNav.init = function () {
    Niyam.StickyNav();
    window.addEventListener("scroll", function () {
      Niyam.StickyNav();
    });
  };

  // PasswordSwitch @v1.0
  Niyam.PassSwitch = function () {
    Niyam.Passcode('.passcode-switch');
  };

  // Toastr Message @v1.0
  Niyam.Toast = function (msg, ttype, opt) {
    var ttype = ttype ? ttype : 'info',
      msi = '',
      ticon = ttype === 'info' ? 'ni ni-info-fill' : ttype === 'success' ? 'ni ni-check-circle-fill' : ttype === 'error' ? 'ni ni-cross-circle-fill' : ttype === 'warning' ? 'ni ni-alert-fill' : '',
      def = {
        position: 'bottom-right',
        ui: '',
        icon: 'auto',
        clear: false
      },
      attr = opt ? extend(def, opt) : def;
    attr.position = attr.position ? 'toast-' + attr.position : 'toast-bottom-right';
    attr.icon = attr.icon === 'auto' ? ticon : attr.icon ? attr.icon : '';
    attr.ui = attr.ui ? ' ' + attr.ui : '';
    msi = attr.icon !== '' ? '<span class="toastr-icon"><em class="icon ' + attr.icon + '"></em></span>' : '', msg = msg !== '' ? msi + '<div class="toastr-text">' + msg + '</div>' : '';
    if (msg !== "") {
      if (attr.clear === true) {
        toastr.clear();
      }
      var option = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": attr.position + attr.ui,
        "closeHtml": '<span class="btn-trigger">Close</span>',
        "preventDuplicates": true,
        "showDuration": "1500",
        "hideDuration": "1500",
        "timeOut": "2000",
        "toastClass": "toastr",
        "extendedTimeOut": "3000"
      };
      toastr.options = extend(option, attr);
      toastr[ttype](msg);
    }
  };

  // Toggle Screen @v1.0
  Niyam.TGL.screen = function (elm) {
    if ($(elm).exists()) {
      $(elm).each(function () {
        var ssize = $(this).data('toggle-screen');
        if (ssize) {
          $(this).addClass('toggle-screen-' + ssize);
        }
      });
    }
  };

  // Toggle Content @v1.0
  Niyam.TGL.content = function (elm, opt) {
    var toggle = elm ? elm : '.toggle',
      $toggle = $(toggle),
      $contentD = $('[data-content]'),
      toggleBreak = true,
      toggleCurrent = false,
      def = {
        active: 'active',
        content: 'content-active',
        "break": toggleBreak
      },
      attr = opt ? extend(def, opt) : def;
    Niyam.TGL.screen($contentD);
    $toggle.on('click', function (e) {
      toggleCurrent = this;
      Niyam.Toggle.trigger($(this).data('target'), attr);
      e.preventDefault();
    });
    $doc.on('mouseup', function (e) {
      if (toggleCurrent) {
        var $toggleCurrent = $(toggleCurrent),
          currentTarget = $(toggleCurrent).data('target'),
          $contentCurrent = $("[data-content=\"".concat(currentTarget, "\"]")),
          $dpd = $('.datepicker-dropdown'),
          $tpc = $('.ui-timepicker-container');
        if (!$toggleCurrent.is(e.target) && $toggleCurrent.has(e.target).length === 0 && !$contentCurrent.is(e.target) && $contentCurrent.has(e.target).length === 0 && $(e.target).closest('.select2-container').length === 0 && !$dpd.is(e.target) && $dpd.has(e.target).length === 0 && !$tpc.is(e.target) && $tpc.has(e.target).length === 0) {
          Niyam.Toggle.removed($toggleCurrent.data('target'), attr);
          toggleCurrent = false;
        }
      }
    });
    $win.on('resize', function () {
      $contentD.each(function () {
        var content = $(this).data('content'),
          ssize = $(this).data('toggle-screen'),
          toggleBreak = _break[ssize];
        if (Niyam.Win.width > toggleBreak) {
          Niyam.Toggle.removed(content, attr);
        }
      });
    });
  };

  // ToggleExpand @v1.0
  Niyam.TGL.expand = function (elm, opt) {
    var toggle = elm ? elm : '.expand',
      def = {
        toggle: true
      },
      attr = opt ? extend(def, opt) : def;
    $(toggle).on('click', function (e) {
      Niyam.Toggle.trigger($(this).data('target'), attr);
      e.preventDefault();
    });
  };

  // Dropdown Menu @v1.0
  Niyam.TGL.ddmenu = function (elm, opt) {
    var imenu = elm ? elm : '.nk-menu-toggle',
      def = {
        active: 'active',
        self: 'nk-menu-toggle',
        child: 'nk-menu-sub'
      },
      attr = opt ? extend(def, opt) : def;
    $(imenu).on('click', function (e) {
      if (Niyam.Win.width < _break.lg || $(this).parents().hasClass(_sidebar)) {
        Niyam.Toggle.dropMenu($(this), attr);
      }
      e.preventDefault();
    });
  };

  // Show Menu @v1.0
  Niyam.TGL.showmenu = function (elm, opt) {
    var toggle = elm ? elm : '.nk-nav-toggle',
      $toggle = $(toggle),
      $contentD = $('[data-content]'),
      toggleBreak = $contentD.hasClass(_header_menu) ? _break.lg : _break.xl,
      toggleOlay = _sidebar + '-overlay',
      toggleClose = {
        profile: true,
        menu: false
      },
      def = {
        active: 'toggle-active',
        content: _sidebar + '-active',
        body: 'nav-shown',
        overlay: toggleOlay,
        "break": toggleBreak,
        close: toggleClose
      },
      attr = opt ? extend(def, opt) : def;
    $toggle.on('click', function (e) {
      Niyam.Toggle.trigger($(this).data('target'), attr);
      e.preventDefault();
    });
    $doc.on('mouseup', function (e) {
      if (!$toggle.is(e.target) && $toggle.has(e.target).length === 0 && !$contentD.is(e.target) && $contentD.has(e.target).length === 0 && Niyam.Win.width < toggleBreak) {
        Niyam.Toggle.removed($toggle.data('target'), attr);
      }
    });
    $win.on('resize', function () {
      if (Niyam.Win.width < _break.xl || Niyam.Win.width < toggleBreak) {
        Niyam.Toggle.removed($toggle.data('target'), attr);
      }
    });
  };

  // Animate FormSearch @v1.0
  Niyam.Ani.formSearch = function (elm, opt) {
    var def = {
      active: 'active',
      timeout: 400,
      target: '[data-search]'
    },
      attr = opt ? extend(def, opt) : def;
    var $elem = $(elm),
      $target = $(attr.target);
    if ($elem.exists()) {
      $elem.on('click', function (e) {
        e.preventDefault();
        var $self = $(this),
          the_target = $self.data('target'),
          $self_st = $('[data-search=' + the_target + ']'),
          $self_tg = $('[data-target=' + the_target + ']');
        if (!$self_st.hasClass(attr.active)) {
          $self_tg.add($self_st).addClass(attr.active);
          $self_st.find('input').focus();
        } else {
          $self_tg.add($self_st).removeClass(attr.active);
          setTimeout(function () {
            $self_st.find('input').val('');
          }, attr.timeout);
        }
      });
      $doc.on({
        keyup: function keyup(e) {
          if (e.key === "Escape") {
            $elem.add($target).removeClass(attr.active);
          }
        },
        mouseup: function mouseup(e) {
          if (!$target.find('input').val() && !$target.is(e.target) && $target.has(e.target).length === 0 && !$elem.is(e.target) && $elem.has(e.target).length === 0) {
            $elem.add($target).removeClass(attr.active);
          }
        }
      });
    }
  };

  // Animate FormElement @v1.0
  Niyam.Ani.formElm = function (elm, opt) {
    var def = {
      focus: 'focused'
    },
      attr = opt ? extend(def, opt) : def;
    if ($(elm).exists()) {
      $(elm).each(function () {
        var $self = $(this);
        if ($self.val()) {
          $self.parent().addClass(attr.focus);
        }
        $self.on({
          focus: function focus() {
            $self.parent().addClass(attr.focus);
          },
          blur: function blur() {
            if (!$self.val()) {
              $self.parent().removeClass(attr.focus);
            }
          }
        });
      });
    }
  };

  // Form Validate @v1.0
  Niyam.Validate = function (elm, opt) {
    if ($(elm).exists()) {
      $(elm).each(function () {
        var def = {
          errorElement: "span"
        },
          attr = opt ? extend(def, opt) : def;
        $(this).validate(attr);
      });
      Niyam.Validate.OnChange('.js-select2');
      Niyam.Validate.OnChange('.date-picker');
      Niyam.Validate.OnChange('.js-tagify');
    }
  };

  //On change validation for third party plugins
  Niyam.Validate.OnChange = function (elm) {
    $(elm).on('change', function () {
      $(this).valid();
    });
  };
  Niyam.Validate.init = function () {
    Niyam.Validate('.form-validate', {
      errorElement: "span",
      errorClass: "invalid",
      errorPlacement: function errorPlacement(error, element) {
        if (element.parents().hasClass('input-group')) {
          error.appendTo(element.parent().parent());
        } else {
          error.appendTo(element.parent());
        }
      }
    });
  };

  // Dropzone @v1.1
  Niyam.Dropzone = function (elm, opt) {
    if ($(elm).exists()) {
      $(elm).each(function () {
        var maxFiles = $(elm).data('max-files'),
          maxFiles = maxFiles ? maxFiles : null;
        var maxFileSize = $(elm).data('max-file-size'),
          maxFileSize = maxFileSize ? maxFileSize : 256;
        var acceptedFiles = $(elm).data('accepted-files'),
          acceptedFiles = acceptedFiles ? acceptedFiles : null;
        var def = {
          autoDiscover: false,
          maxFiles: maxFiles,
          maxFilesize: maxFileSize,
          acceptedFiles: acceptedFiles
        },
          attr = opt ? extend(def, opt) : def;
        $(this).addClass('dropzone').dropzone(attr);
      });
    }
  };

  // Dropzone Init @v1.0
  Niyam.Dropzone.init = function () {
    Niyam.Dropzone('.upload-zone', {
      url: "/images"
    });
  };

  // Wizard @v1.0
  Niyam.Wizard = function () {
    var $wizard = $(".nk-wizard");
    if ($wizard.exists()) {
      $wizard.each(function () {
        var $self = $(this),
          _self_id = $self.attr('id'),
          $self_id = $('#' + _self_id).show();
        $self_id.steps({
          headerTag: ".nk-wizard-head",
          bodyTag: ".nk-wizard-content",
          labels: {
            finish: "ارسال",
            next: "بعدی",
            previous: "قبلی",
            loading: "در حال بارگذاری ..."
          },
          titleTemplate: '<span class="number">0#index#</span> #title#',
          onStepChanging: function onStepChanging(event, currentIndex, newIndex) {
            // Allways allow previous action even if the current form is not valid!
            if (currentIndex > newIndex) {
              return true;
            }
            // Needed in some cases if the user went back (clean up)
            if (currentIndex < newIndex) {
              // To remove error styles
              $self_id.find(".body:eq(" + newIndex + ") label.error").remove();
              $self_id.find(".body:eq(" + newIndex + ") .error").removeClass("error");
            }
            $self_id.validate().settings.ignore = ":disabled,:hidden";
            return $self_id.valid();
          },
          onFinishing: function onFinishing(event, currentIndex) {
            $self_id.validate().settings.ignore = ":disabled";
            return $self_id.valid();
          },
          onFinished: function onFinished(event, currentIndex) {
            window.location.href = "#";
          }
        }).validate({
          errorElement: "span",
          errorClass: "invalid",
          errorPlacement: function errorPlacement(error, element) {
            error.appendTo(element.parent());
          }
        });
      });
    }
  };

  // DataTable @1.1
  Niyam.DataTable = function (elm, opt) {
    if ($(elm).exists()) {
      $(elm).each(function () {
        var auto_responsive = $(this).data('auto-responsive'),
          has_export = typeof opt.buttons !== 'undefined' && opt.buttons ? true : false;
        var export_title = $(this).data('export-title') ? $(this).data('export-title') : 'Export';
        var btn = has_export ? '<"dt-export-buttons d-flex align-center"<"dt-export-title d-none d-md-inline-block">B>' : '',
          btn_cls = has_export ? ' with-export' : '';
        var dom_normal = '<"row justify-between g-2' + btn_cls + '"<"col-7 col-sm-4 text-start"f><"col-5 col-sm-8 text-end"<"datatable-filter"<"d-flex justify-content-end g-2"' + btn + 'l>>>><"datatable-wrap my-3"t><"row align-items-center"<"col-7 col-sm-12 col-md-9"p><"col-5 col-sm-12 col-md-3 text-start text-md-end"i>>';
        var dom_separate = '<"row justify-between g-2' + btn_cls + '"<"col-7 col-sm-4 text-start"f><"col-5 col-sm-8 text-end"<"datatable-filter"<"d-flex justify-content-end g-2"' + btn + 'l>>>><"my-3"t><"row align-items-center"<"col-7 col-sm-12 col-md-9"p><"col-5 col-sm-12 col-md-3 text-start text-md-end"i>>';
        var dom = $(this).hasClass('is-separate') ? dom_separate : dom_normal;
        var def = {
          responsive: true,
          autoWidth: false,
          dom: dom,
          language: {
            search: "",
            searchPlaceholder: "برای جستجو تایپ کنید",
            lengthMenu: "<span class='d-none d-sm-inline-block'>نمایش</span><div class='form-control-select'> _MENU_ </div>",
            info: "_START_ تا _END_ از _TOTAL_",
            infoEmpty: "0",
            infoFiltered: "( کل _MAX_  )",
            paginate: {
              "first": "اول",
              "last": "آخر",
              "next": "بعدی",
              "previous": "قبلی"
            }
          }
        },
          attr = opt ? extend(def, opt) : def;
        attr = auto_responsive === false ? extend(attr, {
          responsive: false
        }) : attr;
        $(this).DataTable(attr);
        $('.dt-export-title').text(export_title);
      });
    }
  };

  // DataTable Init @v1.0
  Niyam.DataTable.init = function () {
    Niyam.DataTable('.datatable-init', {
      responsive: {
        details: true
      }
    });
    Niyam.DataTable('.datatable-init-export', {
      responsive: {
        details: true
      },
      buttons: ['copy', 'excel', 'csv', 'pdf']
    });
    $.fn.DataTable.ext.pager.numbers_length = 7;
  };

  // BootStrap Extended
  Niyam.BS.ddfix = function (elm, exc) {
    var dd = elm ? elm : '.dropdown-menu',
      ex = exc ? exc : 'a:not(.clickable), button:not(.clickable), a:not(.clickable) *, button:not(.clickable) *';
    $(dd).on('click', function (e) {
      if (!$(e.target).is(ex)) {
        e.stopPropagation();
        return;
      }
    });
    if (Niyam.State.isRTL) {
      var $dMenu = $('.dropdown-menu');
      $dMenu.each(function () {
        var $self = $(this);
        if ($self.hasClass('dropdown-menu-end') && !$self.hasClass('dropdown-menu-center')) {
          $self.prev('[data-bs-toggle="dropdown"]').dropdown({
            popperConfig: {
              placement: 'bottom-start'
            }
          });
        } else if (!$self.hasClass('dropdown-menu-end') && !$self.hasClass('dropdown-menu-center')) {
          $self.prev('[data-bs-toggle="dropdown"]').dropdown({
            popperConfig: {
              placement: 'bottom-end'
            }
          });
        }
      });
    }
  };

  // BootStrap Specific Tab Open
  Niyam.BS.tabfix = function (elm) {
    var tab = elm ? elm : '[data-bs-toggle="modal"]';
    $(tab).on('click', function () {
      var _this = $(this),
        target = _this.data('target'),
        target_href = _this.attr('href'),
        tg_tab = _this.data('tab-target');
      var modal = target ? $body.find(target) : $body.find(target_href);
      if (tg_tab && tg_tab !== '#' && modal) {
        modal.find('[href="' + tg_tab + '"]').tab('show');
      } else if (modal) {
        var tabdef = modal.find('.nk-nav.nav-tabs');
        var link = $(tabdef[0]).find('[data-bs-toggle="tab"]');
        $(link[0]).tab('show');
      }
    });
  };

  // Dark Mode Switch @since v2.0
  Niyam.ModeSwitch = function () {
    var toggle = $('.dark-switch');
    if ($body.hasClass('dark-mode')) {
      toggle.addClass('active');
    } else {
      toggle.removeClass('active');
    }
    toggle.on('click', function (e) {
      e.preventDefault();
      $(this).toggleClass('active');
      $body.toggleClass('dark-mode');
    });
  };

  // Knob @v1.0
  Niyam.Knob = function (elm, opt) {
    if ($(elm).exists() && typeof $.fn.knob === 'function') {
      var def = {
        min: 0
      },
        attr = opt ? extend(def, opt) : def;
      $(elm).each(function () {
        $(this).knob(attr);
      });
    }
  };
  // Knob Init @v1.0
  Niyam.Knob.init = function () {
    var knob = {
      "default": {
        readOnly: true,
        lineCap: "round"
      },
      half: {
        angleOffset: -90,
        angleArc: 180,
        readOnly: true,
        lineCap: "round"
      }
    };
    Niyam.Knob('.knob', knob["default"]);
    Niyam.Knob('.knob-half', knob.half);
  };

  // Range @v1.0.1
  Niyam.Range = function (elm, opt) {
    if ($(elm).exists() && typeof noUiSlider !== 'undefined') {
      $(elm).each(function () {
        var $self = $(this),
          self_id = $self.attr('id');
        var _start = $self.data('start'),
          _start = /\s/g.test(_start) ? _start.split(' ') : _start,
          _start = _start ? _start : 0,
          _connect = $self.data('connect'),
          _connect = /\s/g.test(_connect) ? _connect.split(' ') : _connect,
          _connect = typeof _connect == 'undefined' ? 'lower' : _connect,
          _min = $self.data('min'),
          _min = _min ? _min : 0,
          _max = $self.data('max'),
          _max = _max ? _max : 100,
          _min_distance = $self.data('min-distance'),
          _min_distance = _min_distance ? _min_distance : null,
          _max_distance = $self.data('max-distance'),
          _max_distance = _max_distance ? _max_distance : null,
          _step = $self.data('step'),
          _step = _step ? _step : 1,
          _orientation = $self.data('orientation'),
          _orientation = _orientation ? _orientation : 'horizontal',
          _tooltip = $self.data('tooltip'),
          _tooltip = _tooltip ? _tooltip : false;
        console.log(_tooltip);
        var target = document.getElementById(self_id);
        var def = {
          start: _start,
          connect: _connect,
          direction: Niyam.State.isRTL ? "rtl" : "ltr",
          range: {
            'min': _min,
            'max': _max
          },
          margin: _min_distance,
          limit: _max_distance,
          step: _step,
          orientation: _orientation,
          tooltips: _tooltip
        },
          attr = opt ? extend(def, opt) : def;
        noUiSlider.create(target, attr);
      });
    }
  };

  // Range Init @v1.0
  Niyam.Range.init = function () {
    Niyam.Range('.form-control-slider');
    Niyam.Range('.form-range-slider');
  };
  Niyam.Select2.init = function () {
    Niyam.Select2('.js-select2');
  };

  // Slick Slider @v1.0.1
  Niyam.Slick = function (elm, opt) {
    if ($(elm).exists() && typeof $.fn.slick === 'function') {
      $(elm).each(function () {
        var def = {
          'prevArrow': '<div class="slick-arrow-prev"><a href="javascript:void(0);" class="slick-prev"><em class="icon ni ni-chevron-left"></em></a></div>',
          'nextArrow': '<div class="slick-arrow-next"><a href="javascript:void(0);" class="slick-next"><em class="icon ni ni-chevron-right"></em></a></div>',
          rtl: Niyam.State.isRTL
        },
          attr = opt ? extend(def, opt) : def;
        $(this).slick(attr);
      });
    }
  };

  // Slick Init @v1.0
  Niyam.Slider.init = function () {
    Niyam.Slick('.slider-init');
  };

  // Magnific Popup @v1.0.0
  Niyam.Lightbox = function (elm, type, opt) {
    if ($(elm).exists()) {
      $(elm).each(function () {
        var def = {};
        if (type == 'video' || type == 'iframe') {
          def = {
            type: 'iframe',
            removalDelay: 160,
            preloader: true,
            fixedContentPos: false,
            callbacks: {
              beforeOpen: function beforeOpen() {
                this.st.image.markup = this.st.image.markup.replace('mfp-figure', 'mfp-figure mfp-with-anim');
                this.st.mainClass = this.st.el.attr('data-effect');
              }
            }
          };
        } else if (type == 'content') {
          def = {
            type: 'inline',
            preloader: true,
            removalDelay: 400,
            mainClass: 'mfp-fade content-popup'
          };
        } else {
          def = {
            type: 'image',
            mainClass: 'mfp-fade image-popup'
          };
        }
        var attr = opt ? extend(def, opt) : def;
        $(this).magnificPopup(attr);
      });
    }
  };

  // Controls @v1.0.0
  Niyam.Control = function (elm) {
    var control = document.querySelectorAll(elm);
    control.forEach(function (item, index, arr) {
      item.checked ? item.parentNode.classList.add('checked') : null;
      item.addEventListener("change", function () {
        if (item.type == "checkbox") {
          item.checked ? item.parentNode.classList.add('checked') : item.parentNode.classList.remove('checked');
        }
        if (item.type == "radio") {
          document.querySelectorAll('input[name="' + item.name + '"]').forEach(function (item, index, arr) {
            item.parentNode.classList.remove('checked');
          });
          item.checked ? item.parentNode.classList.add('checked') : null;
        }
      });
    });
  };

  // Number Spinner @v1.0
  Niyam.NumberSpinner = function (elm, opt) {
    var plus = document.querySelectorAll("[data-number='plus']");
    var minus = document.querySelectorAll("[data-number='minus']");
    plus.forEach(function (item, index, arr) {
      var parent = plus[index].parentNode;
      plus[index].addEventListener("click", function () {
        var child = plus[index].parentNode.children;
        child.forEach(function (item, index, arr) {
          if (child[index].classList.contains("number-spinner")) {
            var value = !child[index].value == "" ? parseInt(child[index].value) : 0;
            var step = !child[index].step == "" ? parseInt(child[index].step) : 1;
            var max = !child[index].max == "" ? parseInt(child[index].max) : Infinity;
            if (max + 1 > value + step) {
              child[index].value = value + step;
            } else {
              child[index].value = value;
            }
          }
        });
      });
    });
    minus.forEach(function (item, index, arr) {
      var parent = minus[index].parentNode;
      minus[index].addEventListener("click", function () {
        var child = minus[index].parentNode.children;
        child.forEach(function (item, index, arr) {
          if (child[index].classList.contains("number-spinner")) {
            var value = !child[index].value == "" ? parseInt(child[index].value) : 0;
            var step = !child[index].step == "" ? parseInt(child[index].step) : 1;
            var min = !child[index].min == "" ? parseInt(child[index].min) : 0;
            if (min - 1 < value - step) {
              child[index].value = value - step;
            } else {
              child[index].value = value;
            }
          }
        });
      });
    });
  };

  // Stepper @v1.0
  Niyam.Stepper = function (elm, opt) {
    var element = document.querySelectorAll(elm);
    if (element.length > 0) {
      element.forEach(function (item, index) {
        var def = {
          selectors: {
            nav: 'stepper-nav',
            progress: 'stepper-progress',
            content: 'stepper-steps',
            prev: 'step-prev',
            next: 'step-next',
            submit: 'step-submit'
          },
          classes: {
            nav_current: 'current',
            nav_done: 'done',
            step_active: 'active',
            step_done: 'done',
            active_step: 'active'
          },
          current_step: 1
        },
          attr = opt ? extend(def, opt) : def;
        Niyam.Custom.Stepper(item, attr);
        Niyam.Validate.OnChange('.js-select2');
        Niyam.Validate.OnChange('.date-picker');
        Niyam.Validate.OnChange('.js-tagify');
      });
    }
  };
  // Stepper Init @v1.0
  Niyam.Stepper.init = function () {
    Niyam.Stepper('.stepper-init');
  };

  // Tagify @v1.0.1
  Niyam.Tagify = function (elm, opt) {
    if ($(elm).exists() && typeof $.fn.tagify === 'function') {
      var def,
        attr = opt ? extend(def, opt) : def;
      $(elm).tagify(attr);
    }
  };
  // Tagify Init @v1.0
  Niyam.Tagify.init = function () {
    Niyam.Tagify('.js-tagify');
  };

  //Preloader @v1.0.0
  Niyam.Preloader = function () {
    var $preloader = $('.js-preloader');
    if ($preloader.exists()) {
      $body.addClass("page-loaded");
      $preloader.delay(600).fadeOut(300);
    }
  };

  /* Isotope - Filter @v1.0 */
  Niyam.Filter = function (elem, childSelector) {
    var qsRegex;
    var elm = document.querySelectorAll(elem);
    elm.forEach(function (item) {
      if (typeof item != 'undefined' && item != null) {
        var iso = new Isotope(item, {
          itemSelector: childSelector,
          layoutMode: 'fitRows',
          filter: function filter(itemElem) {
            return qsRegex ? itemElem.textContent.match(qsRegex) : true;
          },
          hiddenStyle: {
            opacity: 0,
            transform: 'scale(0.001)'
          },
          visibleStyle: {
            opacity: 1,
            transform: 'scale(1)'
          }
        });
        var filterBtn = document.querySelectorAll('[data-filter]');
        console.log();
        filterBtn.forEach(function (btnItem) {
          btnItem.addEventListener('click', function (event) {
            // only work with buttons
            if (!matchesSelector(event.target, 'button')) {
              return;
            }
            var filterValue = event.target.getAttribute('data-filter');
            iso.arrange({
              filter: filterValue
            });
            filterBtn.forEach(function (allButtons) {
              allButtons.classList.remove('active');
            });
            btnItem.classList.add('active');
          });
        });
      }
    });
  };

  // Extra @v1.1
  Niyam.OtherInit = function () {
    Niyam.ClassBody();
    Niyam.PassSwitch();
    Niyam.CurrentLink();
    Niyam.LinkOff('.is-disable');
    Niyam.ClassNavMenu();
    Niyam.SetHW('[data-height]', 'height');
    Niyam.SetHW('[data-width]', 'width');
    Niyam.NumberSpinner();
    Niyam.Lightbox('.popup-video', 'video');
    Niyam.Lightbox('.popup-iframe', 'iframe');
    Niyam.Lightbox('.popup-image', 'image');
    Niyam.Lightbox('.popup-content', 'content');
    Niyam.Control('.custom-control-input');
    Niyam.Filter('.filter-container', '.filter-item');
  };

  // Animate Init @v1.0
  Niyam.Ani.init = function () {
    Niyam.Ani.formElm('.form-control-outlined');
    Niyam.Ani.formSearch('.toggle-search');
  };

  // BootstrapExtend Init @v1.0
  Niyam.BS.init = function () {
    Niyam.BS.menutip('a.nk-menu-link');
    Niyam.BS.tooltip('.nk-tooltip');
    Niyam.BS.tooltip('.btn-tooltip', {
      placement: 'top'
    });
    Niyam.BS.tooltip('[data-toggle="tooltip"]');
    Niyam.BS.tooltip('[data-bs-toggle="tooltip"]');
    Niyam.BS.tooltip('.tipinfo,.nk-menu-tooltip', {
      placement: 'right'
    });
    Niyam.BS.popover('[data-toggle="popover"]');
    Niyam.BS.popover('[data-bs-toggle="popover"]');
    Niyam.BS.progress('[data-progress]');
    Niyam.BS.fileinput('.form-file-input');
    Niyam.BS.modalfix();
    Niyam.BS.ddfix();
    Niyam.BS.tabfix();
  };

  // Picker Init @v1.0
  Niyam.Picker.init = function () {
    Niyam.Picker.date('.date-picker');
    Niyam.Picker.dob('.date-picker-alt');
    Niyam.Picker.time('.time-picker');
    Niyam.Picker.date('.date-picker-range', {
      todayHighlight: false,
      autoclose: false
    });
    Niyam.Picker.date('.date-picker-ym', {
      format: "yy/mm",
      startView: 2,
      autoclose: true,
      maxViewMode: 2,
      minViewMode: 1
    });
  };

  // Addons @v1
  Niyam.Addons.Init = function () {
    Niyam.Knob.init();
    Niyam.Range.init();
    Niyam.Select2.init();
    Niyam.Dropzone.init();
    Niyam.Slider.init();
    Niyam.DataTable.init();
    Niyam.Tagify.init();
  };

  // Toggler @v1
  Niyam.TGL.init = function () {
    Niyam.TGL.content('.toggle');
    Niyam.TGL.expand('.toggle-expand');
    Niyam.TGL.expand('.toggle-opt', {
      toggle: false
    });
    Niyam.TGL.showmenu('.nk-nav-toggle');
    Niyam.TGL.ddmenu('.' + _menu + '-toggle', {
      self: _menu + '-toggle',
      child: _menu + '-sub'
    });
  };
  Niyam.BS.modalOnInit = function () {
    $('.modal').on('shown.bs.modal', function () {
      Niyam.Select2.init();
      Niyam.Validate.init();
    });
  };

  // Initial by default
  /////////////////////////////
  Niyam.init = function () {
    Niyam.coms.docReady.push(Niyam.OtherInit);
    Niyam.coms.docReady.push(Niyam.Prettify);
    Niyam.coms.docReady.push(Niyam.ColorBG);
    Niyam.coms.docReady.push(Niyam.ColorTXT);
    Niyam.coms.docReady.push(Niyam.Copied);
    Niyam.coms.docReady.push(Niyam.Ani.init);
    Niyam.coms.docReady.push(Niyam.TGL.init);
    Niyam.coms.docReady.push(Niyam.BS.init);
    Niyam.coms.docReady.push(Niyam.Validate.init);
    Niyam.coms.docReady.push(Niyam.Picker.init);
    Niyam.coms.docReady.push(Niyam.Addons.Init);
    Niyam.coms.docReady.push(Niyam.Wizard);
    Niyam.coms.docReady.push(Niyam.Stepper.init);
    Niyam.coms.winLoad.push(Niyam.ModeSwitch);
    Niyam.coms.winLoad.push(Niyam.StickyNav.init);
    Niyam.coms.winLoad.push(Niyam.Preloader);
  };
  Niyam.init();
  return Niyam;
}(Niyam, jQuery);
