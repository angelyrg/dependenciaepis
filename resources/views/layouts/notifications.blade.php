<li class="nav-item dropdown">

    <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
      <i class="bi bi-bell"></i>
      <span class="badge bg-primary badge-number" id="ctdN"></span>
    </a><!-- End Notification Icon -->

    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
      <li class="dropdown-header">
        <p id="notifyTtitle"></p>
      </li>
      <li>
        <hr class="dropdown-divider">
      </li>

      <div id="notify"></div>

      <li>
        <hr class="dropdown-divider">
      </li>
      <li class="dropdown-footer">
        <a href="{{route('responsable.informes.index')}}">Ver todos los informes</a>
      </li>

    </ul><!-- End Notification Dropdown Items -->

  </li><!-- End Notification Nav -->

  <script>
    $(document).ready(function (){        
        $.ajax({                                      
            url: "{{ route('notifications') }}",              
            type: "GET",
            dataType: "JSON", 
            success: function(resp){

                const total = Object.keys(resp).length;
                var title = `Tienes `+ total +` informes por revisar`;
                var not = '';

                var currentLocation = window.location.href;
                
                resp.forEach(element => {
                    
                    
                    if( currentLocation.includes('responsable/informes') ) {
                        var ruta = "informes/"+element[3];
                    }else{
                        var ruta = "responsable/informes/"+element[3];
                    }
                    
                    var temp = `
                            <a href="` + ruta + `">
                                <li class="notification-item">
                                    <i class="bi bi-exclamation-circle text-info"></i>
                                    <div>
                                        <h4 class="text-dark">`+element[0]+`</h4>
                                        <p>`+element[1]+`</p>
                                        <p>`+element[2]+`</p>
                                    </div>
                                </li>
                            </a>
    
                            <li>
                                <hr class="dropdown-divider">
                            </li>        
                        `;

                    not += temp;
                        
                    });
                    
                    
                $('#notify').html(not);
                $('#notifyTtitle').html(title);
                $('#ctdN').html(total);
            }
         });
    });

  </script>
