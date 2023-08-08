@extends('layouts.master')

@section('title', 'The Watcher | About')

@section('content')
    <div class="container">
        <div class="about-row">
            <div class="split-section left">
                <!-- Content for left section goes here -->

            </div>
            <div class="split-section right">
                <!-- Content for right section goes here -->
                <p>Kate is an experienced research analyst in higher education development with a remarkable passion for uncovering the secrets held within history and architecture. Armed with a Master's in Historic Preservation from the Boston Architectural College (BAC), she has spent over a decade unraveling the captivating narratives hidden within buildings over time.</p><br>
                <p>Hailing from Northern New Hampshire's White Mountains, Kate's lifelong interests in the paranormal, history, logic, and reason inspired her to create Nightmare Houses. Through this chilling platform, she shares haunting stories of ghostly and chilling homes and invites you to join her on an eerie journey into the mysteries of the past.</p>

            </div>
        </div>
        <div class="contact-row">
            <p class="contact">Got a chilling tale for Nightmare Houses, or want to say hi? Need more information about an episode? Feel free to drop me an email at nightmarehousespod@gmail.com.</p>
            <p class="contact">I welcome all your stories, inquiries, and feedback.</p>
            <p class="contact">Looking forward to connecting with you,</p>
            <p class="contact">Kate</p>
        </div>
        <div class="about-row">
            <div class="split-section right">
            </div>
            <div class="split-section left">
                <button class="listen-now-btn"><a href="{{ url('research') }}">Research Services</a></button>


            </div>
        </div>

    </div>
@endsection