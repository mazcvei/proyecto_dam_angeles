{{-- Navbar --}}
    <nav class="navbar navbar-expand-lg shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
               <img width="180" src="{{ asset('images/logo.png') }}">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
  

            <div class="collapse navbar-collapse" id="navbarSupportedContent">            

                <!-- Right Side -->
                <ul class="navbar-nav ms-auto">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar sesión') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-outline-light ms-2" href="{{ route('register') }}">{{ __('Registrarse') }}</a>
                        </li>
                    @else   
                        @if(\App\Http\Helpers\UsersHelper::checkAdmin())
                         <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.index') }}">Usuarios</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('rol.index') }}">Roles</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('orders.index') }}">Pedidos</a>
                        </li>
                         <li class="nav-item">
                            <a class="nav-link" href="{{ route('services.index') }}">Servicios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('contacts.index') }}">Contactos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('setting.show') }}">Configuración</a>
                        </li>
                        
                        @endif
                      
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-black" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="{{route('user.show')}}">Mi perfil</a></li>
                                <li><a class="dropdown-item" href="{{route('my.orders')}}">Mis pedidos</a></li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit"  class="dropdown-item">{{ __('Cerrar sesión') }}</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>