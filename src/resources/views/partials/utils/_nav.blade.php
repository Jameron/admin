<nav class="navbar navbar-@if($nav['style']=='light')default @elseif($nav['style']=='dark')inverse @endif navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url($nav['logo_route']) }}">
                @if(!empty($nav['logo']))
                    <img src="{{ asset($nav['logo']) }}" class="logo">
                @else
                    {{ config('app.name', 'Laravel') }}
                @endif
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                @if(!Auth::check() && count($nav['left']['list']))
                    @if(count($nav['left']['list']))
                        @foreach($nav['left']['list'] as $list_item)
                            <li><a href="{{ url($list_item['route']) }}">{{ $list_item['title'] }}</a></li>
                        @endforeach
                    @else
                        &nbsp;
                    @endif
                @elseif(Auth::check() && count($nav['left']['list']))
                    @if(count($nav['left']['list']))
                        @foreach($nav['left']['list'] as $list_item)
                            <li><a href="{{ url($list_item['route']) }}">{{ $list_item['title'] }}</a></li>
                        @endforeach
                    @else
                        &nbsp;
                    @endif
                @endif
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    @foreach($nav['right']['list'] as $list_item)
                        <li><a href="{{ url($list_item['route']) }}">{{ $list_item['title'] }}</a></li>
                    @endforeach
                @else
                    @if(Auth::check() && count($nav['right']['list']))
                        @foreach($nav['right']['list'] as $list_item)
                            @if(!isset($list_item['list']) && isset($list_item['url']) && isset($list_item['title']))
                                <li><a href="{{ url($list_item['route']) }}">{{ $list_item['title'] }}</a></li>
                            @elseif(isset($list_item['list']) && isset($list_item['title']))
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        @if (strpos($list_item['title'], 'auth.') !== false) 
                                            <?php $property = substr($list_item['title'], strpos($list_item['title'], ".") + 1); ?>
                                                    {{ Auth::user()->$property  }} <span class="caret"></span>
                                                @else
                                                    {{ $list_item['title'] }} <span class="caret"></span>
                                                @endif
                                    </a>
                                    <ul class="dropdown-menu" role="menu">
                                        @foreach($list_item['list'] as $key1 => $dropdown_list_item)
                                            @if(is_array($dropdown_list_item) && count($dropdown_list_item)===0)
                                                <li role="separator" class="divider"></li>
                                            @elseif(isset($dropdown_list_item['route']) && isset($dropdown_list_item['title']))
                                                <li>
                                                    <a href="{{ url($dropdown_list_item['route']) }}" @if(isset($dropdown_list_item['onclick'])) onclick="{{ $dropdown_list_item['onclick'] }}" @endif>
                                                        {{ $dropdown_list_item['title'] }}
                                                        @if(isset($dropdown_list_item['logoutForm']) && $dropdown_list_item['logoutForm'])
                                                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                                                        @endif
                                                    </a>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </li>
                            @endif
                        @endforeach
                    @endif
                @endif
            </ul>
        </div>
    </div>
</nav>
