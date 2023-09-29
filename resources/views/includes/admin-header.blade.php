<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<nav class="navbar navbar-default mb-xl-5 mb-4">
                <div class="container-fluid">

                    <div class="navbar-header">
                        <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                            <i class="fas fa-bars"></i>
                        </button>
                    </div>
                    
                    <ul class="top-icons-agileits-w3layouts float-right">

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <i class="far fa-bell"></i>
                                @if($numNotifications > 0)
                                <span class="badge">
                                    {{$numNotifications}}
                                </span>
                                @endif
                            </a>
                            <div class="dropdown-menu top-grid-scroll drop-1">
                                <h3 class="sub-title-w3-agileits">
                                @if($numNotifications > 0)
                                    You have {{$numNotifications}} new notification
                                @endif
                                </h3>
                                <a href="#" class="dropdown-item mt-3">
                                    <div class="notif-img-agileinfo">
                                        <img src="{{ asset('images/clone.jpg') }}" alt="Clone Image">
                                    </div>
                                    @if($numNotifications > 0)
                                    @foreach($notifications as $notificationItem)           
                                     <a class="dropdown-item" href="{{route('bookings.details',$notificationItem->id)}}"><i  class="fa fa-bell"  style="color: red;"></i>  #{{$notificationItem->BookingNumber}} Booking Request Received from {{$notificationItem->user->first_name}}  {{$notificationItem->user->last_name}}</a>
                                     @endforeach
                                       @else
                                     <a class="dropdown-item" href="#">No New Booking Received</a>
                                     @endif     
                                <div class="dropdown-divider"></div>                             
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <i class="far fa-user"></i>
                            </a>
                            <div class="dropdown-menu drop-3">
                                <div class="profile d-flex mr-o">
                                    <div class="profile-l align-self-center">
                                    <!-- <img src="{{ asset('images/image.png') }}" alt="Responsive image"> -->
                                    </div>
                                    <div class="profile-r align-self-center">
                                        <h3 class="sub-title-w3-agileits"> </h3>
                                        <a href="mailto:info@example.com"></a>
                                    </div>
                                </div>
                                <a href="{{ route('admin-profile.edit') }}" class="dropdown-item mt-3">
                                    <h4>
                                        <i class="far fa-user mr-3"></i>My Profile</h4>
                                </a>
                                <a href="{{ route('admin.change-password')}}" class="dropdown-item mt-3">
                                    <h4>
                                        <i class="fas fa-link mr-3"></i>Change Password</h4>
                                </a>
                              
                                <div class="dropdown-divider"></div>
                                <form method="POST" action="{{ route('logout') }}">
                            @csrf

                                 <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                               <i class="fa fa-user"></i> Logout
                             </x-dropdown-link>
                                </form>
    
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>