<x-mail::message>
# Hi : {{$user->name}}

Welcome to my WebSite

<x-mail::button :url="'http://127.0.0.1:8000/login'">
visit mySite
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
