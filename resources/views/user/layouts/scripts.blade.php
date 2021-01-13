<!-- Javascript -->

<script src="{{asset('public/user/js/jquery.min.js')}}"></script>
<script src="{{asset('public/user/js/tether.min.js')}}"></script>
<script src="{{asset('public/user/js/bootstrap.min.js')}}"></script>
<script src="{{asset('public/user/js/jquery.easing.js')}}"></script>
<script src="{{asset('public/user/js/jquery-waypoints.js')}}"></script>
<script src="{{asset('public/user/js/jquery-validate.js')}}"></script>
<script src="{{asset('public/user/js/jquery.prettyPhoto.js')}}"></script>
<script src="{{asset('public/user/js/slick.min.js')}}"></script>
<script src="{{asset('public/user/js/numinate.min.js')}}"></script>
<script src="{{asset('public/user/js/imagesloaded.min.js')}}"></script>
<script src="{{asset('public/user/js/jquery-isotope.js')}}"></script>
<script src="{{asset('public/user/js/price_range_script.js')}}"></script>
<script src="{{asset('public/user/js/main.js')}}"></script>


<!-- Revolution Slider -->

<script src="{{asset('public/user/revolution/js/slider.js')}}"></script>

<!-- SLIDER REVOLUTION 6.0 EXTENSIONS  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->

<script src='{{asset('public/user/revolution/js/revolution.tools.min.js')}}'></script>
<script src='{{asset('public/user/revolution/js/rs6.min.js')}}'></script>

<!-- Javascript end-->

{{-- Notifiers --}}
<script src="{{asset('public/notifiers/sweetalert2.min.js')}}"></script>
<script src="{{asset('public/notifiers/toastr.min.js')}}"></script>
<script>
    @if(Session::has('message'))
                    var type = "{{ Session::get('alert-type', 'info') }}";
                    switch(type){
                        case 'info':
                            toastr.info("{{ Session::get('message') }}");
                            break;

                        case 'warning':
                            toastr.warning("{{ Session::get('message') }}");
                            break;

                        case 'success':
                            toastr.success("{{ Session::get('message') }}");
                            break;

                        case 'error':
                            toastr.error("{{ Session::get('message') }}");
                            break;
                    }
                  @endif
</script>
<script>
    $(document).on("click","#delete",function(e){
            e.preventDefault();
            var link = $(this).attr("href");
            Swal.fire({
              title: 'Are you sure?',
              text: "You won't be able to revert this!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
              if (result.value) {
                  window.location.href= link;
              }
            })
            });

</script>
{{-- notifiers --}}

<!-- Datatable-->
<script src="//cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready( function () {
    $('#myTable').DataTable(
        {
        "order": true
        }
    );
    } );
</script>


{{-- Dropify --}}
<script src="{{ asset('public/dropify/dropify.min.js') }}"></script>
<script>
    $(document).ready(function(){
                // Basic
                $('.dropify').dropify();

                // Translated
                $('.dropify-fr').dropify({
                    messages: {
                        default: 'Glissez-déposez un fichier ici ou cliquez',
                        replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                        remove:  'Supprimer',
                        error:   'Désolé, le fichier trop volumineux'
                    }
                });

                // Used events
                var drEvent = $('#input-file-events').dropify();

                drEvent.on('dropify.beforeClear', function(event, element){
                    return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
                });

                drEvent.on('dropify.afterClear', function(event, element){
                    alert('File deleted');
                });

                drEvent.on('dropify.errors', function(event, element){
                    console.log('Has Errors');
                });

                var drDestroy = $('#input-file-to-destroy').dropify();
                drDestroy = drDestroy.data('dropify')
                $('#toggleDropify').on('click', function(e){
                    e.preventDefault();
                    if (drDestroy.isDropified()) {
                        drDestroy.destroy();
                    } else {
                        drDestroy.init();
                    }
                })
            });
</script>