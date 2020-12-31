@section("common_head")
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ mix('/js/app.js') }}"></script>
    <script data-ad-client="{{config('services.google')['adsense_id']}}" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
@endsection
