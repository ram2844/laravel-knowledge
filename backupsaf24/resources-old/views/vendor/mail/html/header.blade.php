<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="https://laravel.com/img/notification-logo.png" class="logo" alt="Laravel Logo">
@else
<img src="https://serendipityartsfestival.com/media/logos/logo-mail.png" class="logo" alt="{{ env('APP_NAME', 'Laravel') }}" style="height: 60px; width:auto">
@endif
</a>
</td>
</tr>
