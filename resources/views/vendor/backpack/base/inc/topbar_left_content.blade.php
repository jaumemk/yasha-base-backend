<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
        <i class="fa fa-globe"></i> {{ __('yasha/backend::sidebar.language') }} <span class="caret"></span>
    </a>
    <ul class="dropdown-menu" role="menu">
        @foreach(Lalo::getSupportedLocales() as $localeCode => $properties)
        <li>
            <a href="{{ route('set-locale', ['locale' => $localeCode]) }}">
                <span class="text-capitalize">
                {{ $properties['native'] }}
                </span>
                @if(config('app.locale') == $localeCode)
                    <i class="fa fa-angle-double-left pull-right" style="margin-top: 3px;"></i>
                @endif
            </a>
        </li>
        @endforeach
    </ul>
</li>