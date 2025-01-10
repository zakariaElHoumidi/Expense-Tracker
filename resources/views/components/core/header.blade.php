<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">LOGO</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                @if(!empty($links))
                    @foreach($links as $link)
                        @if($link['is_dropdown'])
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ $user->name }}
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    @if(!empty($link['routes']))
                                        @foreach($link['routes'] as $link_dropdown)
                                            <li>
                                                @if($link_dropdown['route'] === route('logout'))
                                                    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                                                        @csrf
                                                        <button type="submit" class="dropdown-item" style="border: none; background: none;">Logout</button>
                                                    </form>
                                                @else
                                                    <a class="dropdown-item" href="{{ $link_dropdown['route'] }}" wire:navigate>{{ $link_dropdown['label'] }}</a>
                                                @endif
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link {{ $link['active'] }}" href="{{ $link['route'] }}" wire:navigate>{{ $link['label'] }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
</nav>
