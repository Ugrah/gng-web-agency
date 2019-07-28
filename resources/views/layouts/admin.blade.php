<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- SEOTools meta -->
    {!! html_entity_decode(SEO::generate()) !!}

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}" />

    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    {!! Html::style('https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css') !!}
    {!! Html::script('https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js') !!}

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=ABeeZee|Lato|PT+Sans|Roboto|Roboto+Condensed" rel="stylesheet">

    <!-- Styles -->
    {!! Html::style('css/app.css') !!}
    {!! Html::style('css/global.min.css') !!}
    {!! Html::style('css/animate.css') !!}

    <style>
      .sidebar {
        width: 14rem;
        z-index: 1;
        overflow-x: hidden;
        transition: 0.5s;
      }

      #mySidebar a.nav-link { color: #d9D9D9 !important; opacity: 0.7; }
      #mySidebar a.nav-link:hover, #mySidebar a.nav-link.active { color: white !important; opacity: 1;}

      #main {
        transition: margin-left .5s;
        margin-left: 14rem;
      }

      .dropdown-toggle::after {
          display:none;
      }

      .badge-notify{
        background:#E74A3B;
        color: white;
        position:relative;
        font-size:9px;
        font-weight: bold;
        top: -10px;
        left: -10px;
      }

	  div#main div.dropdown-menu-alert { min-width: 22rem; }
      div.dropdown-menu a.dropdown-item { font-size: 0.9em; color: #363636 !important; }
      div.dropdown-menu a.dropdown-item:hover { background-color: #F8F9FC !important; color: #363636 !important; }

      /* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
      @media screen and (max-height: 450px) {
        
      }
    </style>

    <style>
      #scroll-to-top {
        display: inline-block;
        width: 50px;
        height: 50px;
        text-align: center;
        border-radius: 8px;
        position: fixed;
        bottom: 30px;
        right: 30px;
        transition: background-color .3s, 
          opacity .2s, visibility .2s;
        opacity: 0;
        visibility: hidden;
        z-index: 1000;
      }
      #scroll-to-top:hover {
        cursor: pointer;
        background-color: #333;
      }
      #scroll-to-top.show {
        opacity: 1;
        visibility: visible;
      }

	  /* user message item (new message style) */
	  li.new-message { font-weight: bold; background-color: #f0f3f7; }

      /* Styles for the content section */

      .content {
        width: 77%;
        margin: 50px auto;
        font-family: 'Merriweather', serif;
        font-size: 17px;
        color: #6c767a;
        line-height: 1.9;
      }
      
      @media (min-width: 500px) {
        .content {
          width: 43%;
        }
        #button {
          margin: 30px;
        }
      }
    </style>

    @yield('styles')

    <!-- Font Awesome -->
    {!! Html::script('https://kit.fontawesome.com/754591c5ca.js') !!}


    @yield('scriptsBefore')
  </head>
  <body>

    <div id="mySidebar" class="sidebar position-fixed vh-100 bg-dark">
      <nav class="navbar navbar-toggleable-xl navbar-light px-0 pt-0">
        <ul class="navbar-nav w-100">
            <a class="navbar-brand mx-auto" href="{{url('/')}}" style="max-width:11rem"><img src="{{asset('img/gng-logo-width.png')}}" alt="GnG Dev Logo" class="img-fluid" /></a>
          
            <hr class="mx-3 my-2" style="border-color: rgba(255, 255, 255,0.3)">

            <li class="nav-item">
                <a class="nav-link px-3" href="{{ url('/dashboard') }}">
                <i class="fas fa-tachometer-alt pr-2"></i> Dashboard</a>
            </li>

            <hr class="mx-3 my-2" style="border-color: rgba(255, 255, 255,0.3)">

            <li class="nav-item">
              <a class="nav-link px-3 text-light" data-toggle="collapse" href="#collapsePortfolio" role="button" aria-expanded="false" aria-controls="collapsePortfolio">
                <i class="fas fa-layer-group pr-2"></i> {{ __('Productions') }}
                <i class="fas fa-angle-right float-right"></i>
                <i class="fas fa-angle-down d-none float-right"></i>
              </a>
              <ul id="collapsePortfolio" class="collapse list-group mx-3">
                <a href="{{route('production.create')}}" class="list-group-item list-group-item-action py-2">{{ __('Ajouter Portfolio') }}</a>
                <a href="{{route('production.index')}}" class="list-group-item list-group-item-action py-2">{{ __('Voir la liste') }}</a>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link px-3 text-light" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                <i class="fas fa-clone pr-2"></i>  {{ __('Template') }}
                <i class="fas fa-angle-right float-right"></i>
                <i class="fas fa-angle-down d-none float-right"></i>
              </a>
              <ul id="collapseExample" class="collapse list-group mx-3">
                <a href="#" class="list-group-item list-group-item-action py-2">Dapibus</a>
                <a href="#" class="list-group-item list-group-item-action py-2">Dapibus</a>
                <a href="#" class="list-group-item list-group-item-action py-2">Dapibus</a>
              </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link px-3 text-light" href="#">
                <i class="fas fa-clone pr-2"></i>  Link</a>
            </li>
        </ul>
      </nav>
    </div>

    <div id="main">
      <nav class="navbar navbar-expand navbar-light bg-white shadow py-0 pl-4">
        <a id="open-sidebar-btn" class="fa-2x d-none" href="#"><i class="fas fa-bars text-secondary"></i></a> 
        <a id="close-sidebar-btn" class="fa-2x" href="#"><i class="fas fa-times text-secondary"></i></a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse h-100 navbar-collapse" id="navbarNavDropdown">
          <!--
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="#">Features</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Pricing</a>
            </li>
          </ul>
          -->

          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown py-1">
              <a class="nav-link pt-3 dropdown-toggle" href="#" id="alertDropdownLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell" style="font-size: 1rem; color: #B7B9CC"></i>
                <span class="badge badge-notify">3+</span>
              </a>
              <div class="dropdown-menu dropdown-menu-right dropdown-menu-alert py-0" aria-labelledby="alertDropdownLink">
                <ul class="list-group">
                  <li class="list-group-item py-1 active">Alerts center</li>
                  <li class="list-group-item p-0"><a class="dropdown-item" href="#">
                    <small class="text-muted">11 Juillet 2019</small>
                    <p class="text-muted mb-1">Donec id elit non mi metus...</p>
                  </a></li>
                  <li class="list-group-item p-0"><a class="dropdown-item" href="#">
                    <small class="text-muted">04 Septembre 2012</small>
                    <p class="text-muted mb-1">Donec id elit non mi metus...</p>
                  </a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item dropdown py-1">
              <a class="nav-link pt-3 dropdown-toggle" href="#" id="messageDropdownLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope" style="font-size: 1rem; color: #B7B9CC"></i>
                <span class="badge badge-notify"></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right dropdown-menu-alert py-0" aria-labelledby="messageDropdownLink">
                <ul id="user-message-list" class="list-group">
                  <li class="list-group-item py-1 active">Message center</li>
                </ul>
              </div>
            </li>
            <li class="nav-item dropdown py-1">
              <a class="nav-link pt-2 dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span>{{ auth()->user()->name }} </span>
                <img src="@if(!isset($user->profile_image)) {{ asset( config('images.profiles').'/profile-empty.jpg' ) }} @else {{ asset( config('images.profiles').'/'.auth()->user()->profile_image ) }} @endif" width="32" alt="" class="img-fluid rounded-circle">
                <!-- <i class="fas fa-user-circle fa-2x"></i> -->
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="#"><i class="fas fa-user"></i> Profile</a>
                <a class="dropdown-item" href="#"><i class="fas fa-cogs"></i> Setting</a>
                @auth
                <hr class="my-2">
                <a class="dropdown-item" href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i> Log out</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
                @endauth
              </div>
            </li>
          </ul>
        </div>
      </nav> 
      @yield('content')
	</div>
	
	<!-- Display Spinner Modal -->
	<div id="spinnerModal" class="modal" tabindex="-1" role="dialog" aria-labelledby="spinnerModalTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div style="background-color:transparent;border:none;" class="modal-content">
				<div class="modal-spinner text-center">
					<div class="spinner-border text-light" role="status">
						<span class="sr-only">Loading...</span>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Display one user message - Modal -->
	<div id="singleUserMessageModal" class="modal" tabindex="-1" role="dialog">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
			</div>
		</div>
	</div>
	
    <!-- Back to top button -->
    <a id="scroll-to-top" class="bg-primary"><i class="fas fa-angle-up text-light fa-3x"></i></a>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

    <!-- <script src="{{asset('js/wow.js')}}"></script> -->
    {!! Html::script('js/wow.js') !!}

    <script type="text/javascript">
    	$(function(){
			/* Sidebar system */ 
			$('#open-sidebar-btn').click(function(e){
				e.preventDefault();
				$(this).addClass('d-none');
				$('#close-sidebar-btn').removeClass('d-none');
				$('#mySidebar').css('width', '14rem');
				$('#main').css('marginLeft', '14rem');
			});
			$('#close-sidebar-btn').click(function(e){
				e.preventDefault();
				$(this).addClass('d-none'); 
				$('#open-sidebar-btn').removeClass('d-none');
				$('#mySidebar').css('width', '0');
				$('#main').css('marginLeft', '0');
			});
			/* End Sidebar system */ 

			/* Aside bar collapse animation */
			$("[data-toggle='collapse']").each(function () {
				$(this).on('click', function () {
					if($(this).find('i.fas.fa-angle-right').hasClass('d-none')){
					$(this).find('i.fas.fa-angle-right').removeClass('d-none');
					$(this).find('i.fas.fa-angle-down').addClass('d-none');
					} else if($(this).find('i.fas.fa-angle-down').hasClass('d-none')) { 
					$(this).find('i.fas.fa-angle-right').addClass('d-none');
					$(this).find('i.fas.fa-angle-down').removeClass('d-none');
					}
				});
			});
			/*End Aside bar collapse animation */

			/* Function of scroll to top button */ 
			var $scrollToTopButton = $('#scroll-to-top');
			$(window).scroll(function() {
				if ($(window).scrollTop() > 300) {
					$scrollToTopButton.addClass('show');
				} else {
					$scrollToTopButton.removeClass('show');
				}
			});
			$scrollToTopButton.on('click', function(e) {
				e.preventDefault();
				$('html, body').animate({scrollTop:0}, '300');
			});
			/* End Function scroll to top button */
      	});
	</script>
	
    <!-- UserMessage Manager -->
	<script type="text/javascript">
    	$(function(){
			/* Function to get user messages informations */
			function getUserMessages(){
				$.ajax({
					headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
					url: '{{ url('get-last-user-message') }}',
					dataType: 'json'
				}).done(function(data) {
					$('#messageDropdownLink span.badge').text(data.numberNewMessage);
					$.each(data.lastMessages, function(key, item){
						var htmlItem = createUserMessageItem(item);
						displayItem('#user-message-list', htmlItem);
					});
					displayItem('#user-message-list', createUserMessageItem());
				}).fail(function(data) {
					console.log('Error, Please retry');
				});
			} /* End Function to get user messages informations */
			// Run function to get user messages informations
			getUserMessages();

			/* Function to create user message item */
			function createUserMessageItem(item = null){
				if(item !== null) {
					var htmlItem = `<li class="list-group-item p-0">
					<a class="dropdown-item user-message-item text-muted" href="#" data-message="${item.id}">
						<div class="d-flex w-100 justify-content-between">
							<small class="text-muted">${item.created_at}</small>`;
					
					if(!item.read)
						htmlItem += `<small class="badge badge-danger badge-new-message py-1">New</small>`;
					
					htmlItem +=	`</div><p class="text-muted mb-1">${item.subject}</p></a></li>`;

					if(!item.read){ $(htmlItem).addClass('new-message') }
					return $(htmlItem);
				}
				else
					return $(`<li class="list-group-item text-center p-0"><a class="dropdown-item" href="#"><small class="text-muted">{{ __('Read More Messages') }}</small></a></li>`);
			}
			/* End Function to create user message item */

      		/* Function to display an item from parent */
      		function displayItem(parent, htmlItem){
				$(parent).append(htmlItem);
      		}
      		/* Function to display user message item */

			/* Event - Click on One user message - ajex request */
			$('#user-message-list').on('click', 'a.user-message-item', function(e){
				e.preventDefault();
				$('#spinnerModal').modal('show');
				var $elt = $(this);
				$.ajax({
					headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                    method: 'post',
					url: '{{ url('single-user-message') }}',
                    data: { user_message: $elt.attr('data-message') },
					dataType: 'json'
				}).done(function(data) {
					$('#spinnerModal').modal('hide');
					$('#singleUserMessageModal div.modal-content').html(createModalMessageContent(data));
					$('#singleUserMessageModal').modal('show');
					messageJustRead($elt, data.read);
				}).fail(function(data) {
					$('#spinnerModal').modal('hide');
					alert('Impossible to display Message');
				});
			});
			/* End Ajex request */

			/* Create modal to show single user message
			 * param message : jsonObject userMessage
			 * return html text
			*/
			function createModalMessageContent(message){
				return $(`<div class="modal-header">
					<h5 class="modal-title">${message.subject}</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div>${message.content}</div>
				</div>`);
			}
			/* End createModalMessageContent */

			/* Create modal to show single user message
			 * param noeud : a.dropdown-item jquery object
			 * param isRead : boolean
			 * return void
			*/
			function messageJustRead(noeud, isRead){
				if(!isRead){
					noeud.find('small.badge-new-message').remove();
					noeud.parent('li.list-group-item').removeClass('new-message');
					var $spanBadge = $('#messageDropdownLink span.badge');
					if( parseInt($spanBadge.text()) > 0 ) {
						$spanBadge.text( parseInt($spanBadge.text()) - 1 );
						if( parseInt($spanBadge.text()) <= 0 ) { $spanBadge.addClass('d-none') }
					}
				}
			}
			/* End messageJustRead */

		});
	</script>

    <!-- Initilise wowjs -->
    <script>
      new WOW().init();
    </script>
    
    @yield('scripts')
  </body>
</html>