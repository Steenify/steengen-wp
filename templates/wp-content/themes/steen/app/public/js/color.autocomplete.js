(function($, window) {
  'use strict';

  var pluginName = 'autocomplete';
  var isSending = false;

  function uniqueBy(arr, fn) {
    var unique = {};
    var distinct = [];
    arr.forEach(function(x) {
      var key = fn(x);
      if (!unique[key]) {
        distinct.push(x);
        unique[key] = true;
      }
    });
    return distinct;
  }

  function Plugin(element, options) {
    this.element = $(element);
    this.options = $.extend(
      {},
      $.fn[pluginName].defaults,
      this.element.data(),
      options,
    );
    this.url = this.element.data('url');
    this.input = this.element.find('input[name=q]');
    this.list = this.element.find('[autocomplete-res]');
    this.timeout = null;
    this.init();
  }

  Plugin.prototype = {
    init: function() {
      var that = this;
      var options = this.options;

      that.input.on(options.event, function(event) {
        if (event.keyCode === 38 || event.keyCode === 40) {
          return that.select(event.keyCode);
        } else {
          clearTimeout(that.timeout);
          that.timeout = setTimeout(function() {
            that.loadResult();
          }, options.delay);
        }
      });

      that.input.blur(function() {
        that.list.slideUp();
      });
    },
    select: function(act) {
      var results = this.list.find('li');
      var current = this.list.find('.active').index();
      var length = results.length;
      if (act === 38) {
        if (current === -1 || current === 0) {
          current = length - 1;
        } else {
          current = current - 1;
        }
      }
      if (act === 40) {
        if (current === -1 || current === length - 1) {
          current = 0;
        } else {
          current = current + 1;
        }
      }

      results.removeClass('active');
      results.eq(current).addClass('active');
      this.input.val(results.eq(current).data('title'));
      return false;
    },

    loadResult: function() {
      var that = this;
      var key = that.input.val();
      if (isSending || key === '') {
        return;
      }
      isSending = true;
      $.ajax({
        url: that.url.replace('{key}', key),
        success: function(data) {
          const list = that.mapResult(data);
          that.renderResult(list);
          isSending = false;
        },
        error: function(xhr, ajaxOptions, thrownError) {
          console.log(thrownError);
          isSending = false;
        },
      });
    },

    mapResult: function(arr) {
      if (!arr.length) {
        return [];
      }
      const key = this.input.val();
      let res = [];
      arr.forEach(function(item) {
        let list_color = item.metadata.colors.map(function(color) {
          return {
            ...color,
            link: `${item.link}?color=${color.code.replace('#', '')}`,
            title: item.title.rendered,
          };
        });
        res = res.concat(list_color);
      });

      res = res.filter(function(color) {
        return (
          color.name.toLocaleLowerCase().indexOf(key.toLocaleLowerCase()) !== -1
        );
      });
      return res;
    },

    renderResult: function(list) {
      if (list.length > 5) {
        list.length = 5;
      }
      const html = list.map(function(item) {
        return `
        <li class="auto_complete__item" data-title="${item.name}">
          <a class="auto_complete__link" href="${item.link}">
          <span class="auto_complete__color" style="background: ${item.code}">
          </span>
          <span class="auto_complete__name">
          ${item.name}
          </span>
          <span class="auto_complete__cat">
          ${item.title}
          </span>
          </a>
        </li>
        `;
      });

      this.list.html(html.join('')).show();
    },

    destroy: function() {
      $.removeData(this.element[0], pluginName);
    },
  };

  $.fn[pluginName] = function(options, params) {
    return this.each(function() {
      var instance = $.data(this, pluginName);
      if (!instance) {
        $.data(this, pluginName, new Plugin(this, options));
      } else if (instance[options]) {
        instance[options](params);
      }
    });
  };

  $.fn[pluginName].defaults = {
    event: 'keyup',
    delay: 500,
    view: 'auto',
  };

  $(function() {
    $('[data-' + pluginName + ']')[pluginName]();
  });
})(jQuery, window);
