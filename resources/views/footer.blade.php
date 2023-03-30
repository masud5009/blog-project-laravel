<footer>
    <div class="container">
        <div class="d-flex justify-content-between align-items-center footer-mobail">
            <div class="col-lg-4">
                <h1 class="text-white">About us</h1>
                <div class="text">
                    @if($setting)
                    {{ $setting->about }}
                    @endif
                </div>
            </div>
            <div class="col-lg-4">
                <ul class="navbar-nav d-flex">
                    @foreach ($category as $cat)
                    <li class="nav-item"><a class="nav-link" href="{{ route('view.category', $cat->slug) }}">{{ $cat->name }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="col-lg-4">
                <h3 class="footer-heading mb-4 text-white">Connect With Us</h3>
                <p>
                    <a href="@if($setting) {{ $setting->facebook }} @endif"><span class="icon-facebook pt-2 pr-2 pb-2 pl-0"></span></a>
                    <a href="@if($setting) {{ $setting->twitter }} @endif"><span class="icon-twitter p-2"></span></a>
                    <a href="@if($setting) {{ $setting->instagram }} @endif"><span class="icon-instagram p-2"></span></a>
                    <a href="@if($setting) {{ $setting->reddit }} @endif"><span class="icon-reddit p-2"></span></a>
                    <a href="@if($setting) {{ $setting->email }} @endif"><span class="icon-envelope p-2"></span></a>
                </p>
            </div>
        </div>
    </div>
</footer>
