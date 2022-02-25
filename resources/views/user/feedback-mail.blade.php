@extends('layout.mail')
<div class="container">
    <div class="row">
        <h3>Hi {{$name}}</h3>
        <h4>Subject: {{$subject}}</h4>
        <p>{{$feedback}}</p><br>
    </div>
</div>
