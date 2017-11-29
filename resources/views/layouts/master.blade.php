<!DOCTYPE html>
<html>
<head>
    <title>
        @yield('title', 'I-One Inc')
    </title>

    <meta charset='utf-8'>

    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' rel='stylesheet'>
    <link href="/css/ionehvac.css" type='text/css' rel='stylesheet'>

    @stack('head')

</head>
<body>

    @if(session('alert'))
        <div class='alert'>
            {{ session('alert') }}
        </div>
    @endif


    <header>
        <div class="rowTwo">
            <div class="columnTwo">
                <a href='/'><img
                            src='/images/I-One-Inc-logo.png'
                            style='width:300px'
                            alt='I-One Inc logo'>
                </a>

            </div>
            <div class="columnTwo headerContacts">
                <p>Serving  MetroWest</p>
                <h2>617-279-5260<br>
                    617-283-1975
                </h2>


            </div>
        </div>





        @include('modules.nav')
    </header>

    <section id='main'>
        @yield('content')
    </section>

    <footer>

        <div class="footerPhone">
            <h2>617-279-5260<br>
                617-283-1975
            </h2>
        </div>

        <div class="row">
            <div class="column">
                <h2>About Us</h2>
                <p>I-One Inc is a locally owned and operated business that provides a wide range of HVAC services for homes and offices including designing, installation, and maintenance.</p>
                <p>We're a licensed, bonded and insured HVAC company. Call us today!</p>

            </div>
            <div class="column">
                <h2>Our Service Area</h2>
                <img src='/images/Coverage.jpg'
                        style='width:300px'
                        alt='I-One Inc Coverage'>
            </div>
            <div class="column">
                <h2>Contact Us</h2>
                <p>I-One Inc<br>
                    Mailing Address:<br>
                    1 Debra Lane<br>
                    Framingham, MA 01701<br>
                    isorlov@yahoo.com<br>
                    617-279-5260<br>
                    617-283-1975</p>
            </div>
        </div>

        &copy; {{ date('Y') }}

    </footer>


    @stack('body')

</body>
</html>
