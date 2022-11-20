<x-mail::message>
# Processing Complete

Your image is ready!

<x-mail::button :url="$url">
Dowload Image
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
