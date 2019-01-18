(function($, window) {
  var pluginName = 'mapview';

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

  function toggleBounce(marker, markers) {
    $.each(markers, function(key, marker2) {
      marker2.setAnimation(null);
    });

    marker.setAnimation(google.maps.Animation.BOUNCE);
  }

  var latInit = 16.80299561823568;
  var lngInit = 107.08573669062503;
  var zoomInit = 6;
  var zoom = 12;
  var zoomDetail = 20;
  var iconUrl = '/wp-content/themes/oexpo/app/public/img/map-icon.svg';

  function Plugin(element, options) {
    this.element = $(element);
    this.options = $.extend(
      {},
      $.fn[pluginName].defaults,
      this.element.data(),
      options,
    );

    this.stores = [];
    this.markers = {};
    this.selectedProvince = '';
    this.selectedDistrict = '';
    this.map = this.element.find('#map_canvas');
    this.provincesOptions = this.element.find('#provinces');
    this.districtsOptions = this.element.find('#districts');
    this.listStore = this.element.find('#listStore');
    this.iconUrl = this.element.data('icon') || iconUrl;
    this.titleList = this.element.find('.contact__map__title');
    this.init();
  }

  Plugin.prototype = {
    init: function() {
      var that = this;
      // set map options
      var center = this.getCurrentLocation();
      var mapOptions = {
        zoom: zoomInit,
        center,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
      };

      // display map
      this.mapView = new google.maps.Map(
        document.getElementById('map_canvas'),
        mapOptions,
      );

      this.getStores(1);
      this.getStores(2);
      this.getStores(3);
      this.getStores(4);
      this.getStores(5);
      this.getStores(6);
      this.getStores(7);

      // bind event change province
      this.provincesOptions.on('change', function() {
        that.selectedProvince = $(this).val();
        const label = that.provincesOptions
          .find(`option[value='${$(this).val()}']`)
          .text();
        that.titleList.html(label);
        that.selectedDistrict = '';

        if ($(this).val() === '') {
          that.titleList.html('tất cả các đại lý');
        }
        that.renderDistrictsOptions();
        that.renderListStore();
        that.triggerFilterLocation();
      });
      // bind event change District
      this.districtsOptions.on('change', function() {
        that.selectedDistrict = $(this).val();
        that.renderListStore();
        that.triggerFilterLocation();
      });

      // bind event click store
      this.listStore.on('click', 'li', function() {
        var id = $(this).data('id');
        var marker = that.markers[id];
        that.mapView.panTo(marker.getPosition());
        that.mapView.setZoom(zoomDetail);
        google.maps.event.trigger(marker, 'click');
      });
    },

    getCurrentLocation: function() {
      var that = this;
      var pos = {
        lat: latInit,
        lng: lngInit,
      };
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
          function(position) {
            pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude,
            };
            that.mapView.setCenter(pos);
            that.mapView.setZoom(zoom);
          },
          function(err) {
            console.log('getCurrentPosition', err);
          },
        );
      }
      return pos;
    },

    getStores: function(page) {
      var that = this;
      var url =
        '/wp-json/wp/v2/agency?filter[meta_key]=location&filter[meta_value]=a:0:{}&filter[meta_compare]=!=&per_page=100&page=' +
        page;
      $.get(url, function(data) {
        // that.stores = data;
        that.stores = that.stores.concat(data);
        that.renderMapStore();
        that.renderProvincesOptions();
        that.renderDistrictsOptions();
        that.renderListStore();
      });
    },

    renderMapStore: function() {
      var infoWindow = new google.maps.InfoWindow();
      var that = this;
      var marker;
      $.each(that.stores, function(i, store) {
        if (!that.markers[store.id]) {
          var data = store.metadata || {};
          var location = Array.isArray(data.location) ? {} : data.location;
          marker = new google.maps.Marker({
            position: new google.maps.LatLng(
              parseFloat(location.lat || 0),
              parseFloat(location.lng || 0),
            ),
            title: data.name,
            icon: that.iconUrl,
            map: that.mapView,
          });

          that.markers[store.id] = marker;

          google.maps.event.addListener(
            marker,
            'click',
            (function(marker) {
              return function() {
                infoWindow.setContent(
                  `<h3 class="color-main" style='text-align: center;margin: 0;'>
                    ${data.name}
                    </h3>
                    <p>địa chỉ: ${data.address}</p>`,
                );
                infoWindow.open(that.mapView, marker);
                toggleBounce(marker, that.markers);
              };
            })(marker),
          );
        }
      });
    },

    renderProvincesOptions: function() {
      var that = this;
      var options = '<option value="">Chọn Tỉnh / Thành Phố</option>';
      const uniqueProvince = uniqueBy(that.stores, function(store) {
        return store.metadata.province.value;
      });
      uniqueProvince.forEach(item => {
        options += `<option value="${item.metadata.province.value}">${
          item.metadata.province.label
        }</option>`;
      });
      this.provincesOptions.html(options);
    },

    renderDistrictsOptions: function() {
      var that = this;
      var options = '<option value="">Chọn Quận / Huyện</option>';
      // selected Province
      if (that.selectedProvince && that.selectedProvince !== '') {
        var filteredProvince = this.stores.filter(function(store) {
          return store.metadata.province.value === that.selectedProvince;
        });

        const uniqueDistrict = uniqueBy(filteredProvince, function(store) {
          return store.metadata.district.value;
        });

        uniqueDistrict.forEach(item => {
          options += `<option value="${item.metadata.district.value}">${
            item.metadata.district.label
          }</option>`;
        });
      }
      this.districtsOptions.html(options);
    },

    renderListStore: function() {
      var that = this;
      var list = that.stores;
      var res = '';
      // filter provinces
      if (this.selectedProvince && this.selectedProvince !== '') {
        list = list.filter(function(store) {
          return store.metadata.province.value === that.selectedProvince;
        });
      }

      // filter dictstrict
      if (this.selectedDistrict && this.selectedDistrict !== '') {
        list = list.filter(function(store) {
          return store.metadata.district.value === that.selectedDistrict;
        });
      }
      list.forEach(function(store) {
        var data = store.metadata;
        res += `
        <li class="list_store_item" data-id="${store.id}">
          <div>
            ${data.address}
          </div>
          <div>
             <span>${data.phone}</span>
          </div>      
         </li>   
        `;
      });
      this.listStore.html(res);
    },

    triggerFilterLocation: function() {
      var that = this;
      var id = that.listStore
        .find('li')
        .first()
        .data('id');
      if (id && that.markers[id]) {
        var marker = that.markers[id];
        that.mapView.panTo(marker.getPosition());
        that.mapView.setZoom(zoom);
      }
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

  $.fn[pluginName].defaults = {};

  $(function() {
    $('[data-' + pluginName + ']')[pluginName]();
  });
})(jQuery, window);
