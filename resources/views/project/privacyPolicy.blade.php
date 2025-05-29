@extends('project.layout')
@section('content')

<div class="container-fluid">
    <div class="p-1 mb-2">
<div class="row-md mt-1">
    <h3 class="fw-bold">Introduction</h3>
    <p class="h6">Greetings from Let Me Cook Recipe Guides. We are dedicated to safeguarding your personal information since we respect the privacy of our users. When you visit our website, your information is collected, used, and disclosed in accordance with our Privacy Policy.</p>
</div>
<hr>
<div class="row-md mt-1">
    <h3 class="fw-bold">Data That We Gather</h3>
    <p class="h6"><b>Personal Data:</b> There may gather personal data, including your e-mail address, name, and any additional data you submit, when you register attending the website, sign up for our email list, or complete a form.</p>
    <p class="h6 mt-2"><b>Non-Personal Information:</b> In order to enhance the functionality and user experience of our website, that we may gather general information about you, such as your surfing preferences.</p>
</div>
<hr>
<div class="row-md mt-1">
    <h3 class="fw-bold">How We Utilise the Data You Provide</h3>
    <ol type="I">
        <li><p class="h6">To give you material that is appropriate for your hobbies and to personalise your experience.</p></li>
        <li><p class="h6">To enhance our offerings and website in response to your comments and usage.</p></li>
        <li><p class="h6">To safeguard our website's identity and safety.</p></li>
    </ol>
</div>
<hr>
<div class="row-md mt-1">
    <h3 class="fw-bold">Security of information</h3>
    <p class="h6">To protect your personal information, we put in place a number of security safeguards. We are unable to guarantee total security because there is no totally safe way to transmit data over the internet or store digital information.</p>
</div>
<hr>
<div class="row-md mt-1">
    <h3 class="fw-bold">Contact Us</h3>
    <p class="h6">Please get in touch with us towards <a href="{{ route('contactUs') }}">here</a> if you're experiencing any issues concerning our privacy statement.</p>
</div>


</div>
</div>

@endsection
