   <!-- jQuery 3 -->
   <script src="{{ asset('bower_components') }}/jquery/dist/jquery.min.js"></script>
   <!-- jQuery UI 1.11.4 -->
   <script src="{{ asset('bower_components') }}/jquery-ui/jquery-ui.min.js"></script>
   <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
   <script>
      $.widget.bridge('uibutton', $.ui.button);
   </script>
   <!-- Bootstrap 3.3.7 -->
   <script src="{{ asset('bower_components') }}/bootstrap/dist/js/bootstrap.min.js"></script>
   <!-- Morris.js charts -->
   <script src="{{ asset('bower_components') }}/raphael/raphael.min.js"></script>
   <!-- Sparkline -->
   <script src="{{ asset('bower_components') }}/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
   <!-- jvectormap -->
   <script src="{{ asset('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
   <script src="{{ asset('plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
   <!-- jQuery Knob Chart -->
   <script src="{{ asset('bower_components') }}/jquery-knob/dist/jquery.knob.min.js"></script>
   <!-- daterangepicker -->
   <script src="{{ asset('bower_components') }}/moment/min/moment.min.js"></script>
   <script src="{{ asset('bower_components') }}/bootstrap-daterangepicker/daterangepicker.js"></script>
   <!-- datepicker -->
   <script src="{{ asset('bower_components') }}/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
   <!-- Bootstrap WYSIHTML5 -->
   <script src="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
   <!-- Slimscroll -->
   <script src="{{ asset('bower_components') }}/jquery-slimscroll/jquery.slimscroll.min.js"></script>
   <!-- FastClick -->
   <script src="{{ asset('bower_components') }}/fastclick/lib/fastclick.js"></script>
   <!-- AdminLTE App -->
   <script src="{{ asset('adminlte') }}/js/adminlte.min.js"></script>
   <!-- iCheck -->
   <script src="{{ asset('plugins') }}/iCheck/icheck.min.js"></script>

   <script src="https://www.gstatic.com/firebasejs/7.19.1/firebase-app.js"></script>
   <script src="https://www.gstatic.com/firebasejs/7.19.1/firebase-database.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js" integrity="sha512-lbwH47l/tPXJYG9AcFNoJaTMhGvYWhVM9YI43CT+uteTRRaiLCui8snIgyAN8XWgNjNhCqlAUdzZptso6OCoFQ==" crossorigin="anonymous"></script>
   <script src='{{ asset("") }}js/sweetalert.min.js' ></script>

   <script type="text/javascript">
   $(function () {
      $('.btn-cairkan').on('click', function(e) {
         var id = $(this).attr('data-id');
         var token = $('input[name="_token"]').val()
         var _this = $(this);
         swal({
					title: 'Persetujuan pencairan saldo',
					text: 'Cairkan dana nasabah?',
					icon: 'info',
					buttons: ['Tidak', 'Cairkan']
				}).then((value) => {
					if(value) {
                  $.ajax({
                     url: window.location.origin + '/admin/setuju-cairkan',
                     method: 'POST',
                     dataType: 'json',
                     data: {
                        '_token': token,
                        'id': id
                     }
                  }).done(function(data) {
                     if (data.success) {
                        _this.parent().parent().hide(300);
                        setTimeout(() => {
                           _this.parent().parent().remove();
                        }, 300);
                     } else {
                        swal('Informasi', data.message, 'error');
                     }
                  });
               }
            });
      });
      $('input').iCheck({
         checkboxClass: 'icheckbox_square-blue',
         radioClass: 'iradio_square-blue',
         increaseArea: '20%' /* optional */
      });

      var firebaseConfig = {
         apiKey: "AIzaSyDhz98Zy7yS9Z-asiESdUuCsHLNXHcY6TA",
         authDomain: "banksampahtari.firebaseapp.com",
         databaseURL: "https://banksampahtari.firebaseio.com",
         projectId: "banksampahtari",
         storageBucket: "banksampahtari.appspot.com",
         messagingSenderId: "105927199806",
         appId: "1:105927199806:web:44562c412cdefa9efd556f",
         measurementId: "G-2QR0LZ5KNE"
      };
      var isInit = false;
        // Initialize Firebase
        var fire = firebase.initializeApp(firebaseConfig);
        fire.database().ref('notifikasi').on('value', function(snapshot) {
           if(!isInit) {
              isInit = true
              return true;
           }
            let val = snapshot.val();
            var keys = Object.keys(val)
            let notif = val[keys[keys.length -1]]
            if(notif['tipe'] === 'pencairan') {
               toastr.success('Pengajuan pencairan saldo masuk. Klik notifikasi untuk refresh.','Informasi', {
               onclick: () => window.location.reload()
            })
            }
        })
   });
   </script>

   </body>
</html>