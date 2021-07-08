<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>Resume</title>
</head>
<style>
    body {
        font-size: 17px;
    }
    h2 {
        font-weight: 100;
        padding: 20px 0;
        border-top: 1px solid black;
        border-bottom: 1px solid black;
    }
    .container {
        width: 70%;
        margin: 0 auto;
    }
</style>
<body>
    <h2>
        Resume
    </h2>
<div class="container">
    @foreach ($users as $user)
    <section class="heading">
        <h2>{{$user->first_name}}&nbsp;{{$user->last_name}}</h2>
        <h6>Email:{{$user->email}}</h6>
        <h6>DOB:{{$user->dob}}</h6>
        <h6>Address: {{$user->address}}</h6>
    </section>
    <section class="education">
        <h2>
            School
        </h2>
        <h6>School: {{$user->school_name}}</h6>
        <h6>Board: {{$user->school_exam_board}}</h6>
        <h6>School Address: {{$user->School_address}}</h6>
        <h6>Passed year: {{date('F d, Y',strtotime($user->School_end_date))}}</h6>
        <h2>
            College
        </h2>
        <h6>School: {{$user->colleg_name}}</h6>
        <h6>Board: {{$user->college_exam_board}}</h6>
        <h6>School Address: {{$user->college_address}}</h6>
        <h6>Passed year: {{date('F d, Y',strtotime($user->college_end_date))}}</h6>
        <h2>
            Undergrad
        </h2>
        <h6>School: {{$user->undergrad_uni_name}}</h6>
        <h6>Board: {{$user->undergrad_uni_address}}</h6>
        <h6>Subject: {{$user->undergrad_uni_subject}}</h6>
        <h6>Passed year: {{date('F d, Y',strtotime($user->undergrad_uni_end_date))}}</h6>
        <h2>
            PostGrad
        </h2>
        <h6>School: {{$user->postgrad_uni_name}}</h6>
        <h6>Board: {{$user->school_exam_board}}</h6>
        <h6>School Address: {{$user->School_address}}</h6>
        <h6>Passed year: {{date('F d, Y',strtotime($user->School_end_date))}}</h6>
    </section>
    <section class="experience">
        <h2>
            Experience
        </h2>
        <h6>Name: {{$user->refrence_one}}</h6>
        <h6>Post: {{$user->refrence_position}}</h6>
        <h6>Organization: {{$user->refrence_organization}}</h6>
        <h6>Email: {{$user->refrence_person_email}}</h6>
        <h6>Phonenumber: {{$user->refrence_phonenumber}}</h6>
        <br>
        <h6>Name: {{$user->refrence_tow}}</h6>
        <h6>Post: {{$user->refrence_position_two}}</h6>
        <h6>Organization: {{$user->refrence_organization_two}}</h6>
        <h6>Email: {{$user->refrence_person_email_two}}</h6>
        <h6>Phonenumber: {{$user->refrence_phonenumber_two}}</h6>
    </section>
    <section class="summary">
        <h2>
            Skills
        </h2>
        <h6>Skill: {{$user->Keyskills}}</h6>
        <h6>Language: {{$user->language}}</h6>
        <h6>Language: {{$user->language_two}}</h6>
    </section>

    @endforeach
</div>
</body>
</html>
