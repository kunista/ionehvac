
@php
# Define a PHP array of links and their labels
# Quite a bit of straight PHP code here, but arguably ok
# because it's display specific and allows you to edit the link
# labels without having to edit a logic file.

if ($user and $user->isAdmin()) {
$nav = [
'product' => 'Products',
'product/create' => 'Add a Product'
];
}
elseif ($user and $user->isUser()) {
$nav = [
'product' => 'Products',
'order' => 'Orders',
'cart' => 'Shopping Cart',
];
}
else {
$nav = [
'register' => 'Register',
'login' => 'Login',
];
}
@endphp

<nav>
    <ul>
        @foreach($nav as $link => $label)

            @if (! Auth::guest())
                <li><a href='/{{ $link }}' class='{{ Request::is($link) ? 'active' : '' }}'>{{ $label }}</a>
            @endif
        @endforeach
        <li>
            @if (! Auth::guest())
                <form method='POST' id='logout' action='/logout'>
                    {{csrf_field()}}
                    <a href='#' onClick='document.getElementById("logout").submit();'>Logout</a>
                </form>
            @endif
        </li>
    </ul>
</nav>

