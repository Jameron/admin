<nav class="navbar navbar-expand-md fixed-top @if($nav['style']=='dark') navbar-dark @elseif($nav['style']=='light') navbar-light bg-light @endif">
    <a class="navbar-brand" href="{{ url($nav['logo']['route']) }}">
        @if(!empty($nav['logo']))
            <img src="{{ asset($nav['logo']['image']) }}" class="{{ $nav['logo']['class'] }}">
        @else
            {{ config('app.name', 'Laravel') }}
        @endif
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">

        <!-- Left Side Of Navbar -->
        <ul class="navbar-nav mr-auto">
            @if(!Auth::check())
                @if(count($nav['left']['list']))
                    @foreach($nav['left']['list'] as $list_item)
                        <li class="nav-item"><a href="{{ url($list_item['route']) }}" class="nav-link">{{ $list_item['title'] }}</a></li>
                    @endforeach
                @else
                    &nbsp;
                @endif
            @elseif(Auth::check())
                @if(config('admin.show_collapse'))
                    <li class="nav-item"><a href="#" class="nav-link" id="toggleNav"><i class="fa fa-bars" aria-hidden="true"></i></a></li>
                @endif
                @if(count($nav['left']['list']))
                    @foreach($nav['left']['list'] as $list_item)
                        <li class="nav-item"><a href="{{ url($list_item['route']) }}" class="nav-link">{{ $list_item['title'] }}</a></li>
                    @endforeach
                @else
                    &nbsp;
                @endif
            @endif
        </ul>

        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            @if (Auth::guest())
                @foreach($nav['right']['list'] as $list_item)
                    <li class="nav-item"><a href="{{ url($list_item['route']) }}" class="nav-link">{{ $list_item['title'] }}</a></li>
                @endforeach
            @else
                @if(Auth::check() && count($nav['right']['list']))
                    @foreach($nav['right']['list'] as $list_item)
                        @if(!isset($list_item['list']) && isset($list_item['url']) && isset($list_item['title']))
                            <li class="nav-item"><a href="{{ url($list_item['route']) }}" class="nav-link">{{ $list_item['title'] }}</a></li>
                        @elseif(isset($list_item['list']) && isset($list_item['title']))
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown06" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    @if(is_array($list_item['title']))
                                        @foreach($list_item['title'] as $title)
                                            @if (strpos($title, 'auth.') !== false) 
                                            <?php $property = substr($title, strpos($title, ".") + 1); ?>
                                                {{ Auth::user()->$property  }} <span class="caret"></span>
                                            @else
                                                {{ $title }} <span class="caret"></span>
                                            @endif
                                        @endforeach
                                    @else

                                        @if (strpos($list_item['title'], 'auth.') !== false) 
                                        <?php $property = substr($list_item['title'], strpos($list_item['title'], ".") + 1); ?>
                                            {{ Auth::user()->$property  }} <span class="caret"></span>
                                        @else
                                            {{ $list_item['title'] }} <span class="caret"></span>
                                        @endif

                                    @endif
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdown06">
                                    @foreach($list_item['list'] as $key1 => $dropdown_list_item)
                                        @if(is_array($dropdown_list_item) && count($dropdown_list_item)===0)
                                            <div class="dropdown-divider"></div>
                                        @elseif(isset($dropdown_list_item['route']) && isset($dropdown_list_item['title']))
                                            <a href="{{ url($dropdown_list_item['route']) }}" class="dropdown-item" @if(isset($dropdown_list_item['onclick'])) onclick="{{ $dropdown_list_item['onclick'] }}" @endif>
                                                {{ $dropdown_list_item['title'] }}
                                                @if(isset($dropdown_list_item['logoutForm']) && $dropdown_list_item['logoutForm'])
                                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                                                @endif
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endif
        </ul>
    </div>
</nav>
