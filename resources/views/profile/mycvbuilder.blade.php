@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="section-heading">Make <em>My CV</em></h2>

        </div>
    </div>
    <p>Please fill the form to generate your cv</p>
    <div class="row justify-content-center">

        {{-- Form --}}
        <div class="col-md-8">
        <form action="{{route('store.cv')}}" method="POST">
            @csrf

            <input id="user_id" name="user_id" type="hidden" value="{{Auth::user()->id}}">
            <h6 class="section-heading">General<em>Information</em></h6>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="firstname">First Name</label>
                <input type="text" class="form-control" id="inputEmail4" placeholder="First Name" name="first_name">
              </div>
              <div class="form-group col-md-6">
                <label for="lastname">Last Name</label>
                <input type="text" class="form-control" id="inputPassword4" placeholder="Last Name" name='last_name'>
              </div>
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="inputAddress" placeholder="Email" name="email">
            </div>
            <div class="form-row">
            <div class="form-group col-md-6">
              <label for="dob">Date of birth</label>
              <input type="date" class="form-control" id="inputAddress2" placeholder="Date of birth" name="dob">
            </div>
            <div class="form-group col-md-6">
                <label for="phone">Phone</label>
                <input type="text" class="form-control" id="inputAddress2" placeholder="Contact number" name="phone">
              </div>
            </div>
            <div class="form-group ">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="inputAddress2" placeholder="Address" name="address">
              </div>

              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="jobtitle">Your Key Skill</label>
                  <textarea name="Keyskills" class="form-control"></textarea>
                </div>
                <div class="form-group col-md-3">
                  <label for="planguage">Primary language</label>
                  <input type="text" class="form-control" id="inputCity" name="language">
                </div>
                <div class="form-group col-md-3">
                  <label for="slanguage">Seconday language</label>
                  <input type="text" class="form-control" id="inputCity" name="language_two">
                </div>
            </div>
              {{-- Education details --}}
              <hr>
              <h6 class="section-heading">Education<em>Details</em></h6>
            <div class="form-row">
              <div class="form-group col-md-3">
                <label for="schoolname">School Name</label>
                <input type="text" class="form-control" id="inputCity" name="school_name">
              </div>
              <div class="form-group col-md-3">
                <label for="inputState">Exam Board</label>
                <select id="inputState" class="form-control" name="school_exam_board">
                  <option selected>Choose...</option>
                  <option>SLC</option>
                  <option>CBSE</option>
                  <option>SEE</option>
                </select>
              </div>
              <div class="form-group col-md-3">
                <label for="inputZip">Passed Year</label>
                <input type="date" class="form-control" id="inputZip" name="School_end_date">
              </div>
              <div class="form-group col-md-3">
                <label for="schooladdress">School Address</label>
                <input type="text" class="form-control" id="inputCity" name="School_address">
              </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-3">
                  <label for="collegename">College Name</label>
                  <input type="text" class="form-control" id="inputCity" name="colleg_name">
                </div>
                <div class="form-group col-md-3">
                  <label for="inputState">Exam Board</label>
                  <select id="inputState" class="form-control" name="college_exam_board">
                    <option selected>Choose...</option>
                    <option>HSEB</option>
                    <option>CBSE</option>
                    <option>NEB</option>
                  </select>
                </div>
                <div class="form-group col-md-3">
                  <label for="inputZip">Passed Year</label>
                  <input type="date" class="form-control" id="inputZip" name="college_end_date">
                </div>
                <div class="form-group col-md-3">
                  <label for="schooladdress">College Address</label>
                  <input type="text" class="form-control" id="inputCity" name="college_address">
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-3">
                  <label for="schoolname">Udergrad College Name</label>
                  <input type="text" class="form-control" id="inputCity" name="undergrad_uni_name">
                </div>
                <div class="form-group col-md-3">
                  <label for="inputState">Select University</label>
                  <select id="inputState" class="form-control" name="undergrad_uni_address">
                    <option selected>Choose...</option>
                    <option>Tribhuwan University</option>
                    <option>kathmandu University</option>
                    <option>Purbanchal University</option>
                    <option>Pokhara University</option>
                    <option>Leeds Becket University</option>
                  </select>
                </div>
                <div class="form-group col-md-3">
                  <label for="inputZip">Passed Year</label>
                  <input type="date" class="form-control" id="inputZip" name="undergrad_uni_end_date">
                </div>
                <div class="form-group col-md-3">
                  <label for="schooladdress">Subject</label>
                  <input type="text" class="form-control" id="inputCity" name="undergrad_uni_subject">
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-3">
                  <label for="schoolname">University Name</label>
                  <input type="text" class="form-control" id="inputCity" name="postgrad_uni_name">
                </div>

                <div class="form-group col-md-3">
                  <label for="inputState">University Address</label>
                  <input type="text" class="form-control" id="inputCity" name="postgrad_uni_address">
                </div>
                <div class="form-group col-md-3">
                  <label for="inputZip">Passed Year</label>
                  <input type="date" class="form-control" id="inputZip" name="postgrad_uni_end_date">
                </div>
                <div class="form-group col-md-3">
                    <label for="schooladdress">Subject</label>
                    <input type="text" class="form-control" id="inputCity" name="postgrad_uni_subject">
                  </div>

              </div>

              {{-- Education details --}}
              <hr>
              <h6 class="section-heading">Experience<em>Details</em></h6>
              <div class="form-row">
                  <div class="form-group col-md-3">
                    <label for="jobtitle">Job Title *</label>
                    <input type="text" class="form-control" id="inputCity" name="experience_one">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="jobdescription">Job Description *</label>
                    <input type="text" class="form-control" id="inputCity" name="job_description_one">
                  </div>
                  <div class="form-group col-md-3">
                    <label for="schooladdress">Duration period *</label>
                    <input type="text" class="form-control" id="inputCity" name="duration_one">
                  </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-3">
                  <label for="jobtitle">Job Title</label>
                  <input type="text" class="form-control" id="inputCity" name="experience_tow">
                </div>
                <div class="form-group col-md-6">
                  <label for="jobdescription">Job Description</label>
                  <input type="text" class="form-control" id="inputCity" name="job_description_two">
                </div>
                <div class="form-group col-md-3">
                  <label for="schooladdress">Duration period</label>
                  <input type="text" class="form-control" id="inputCity" name="duration_two">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-3">
                  <label for="jobtitle">Job Title</label>
                  <input type="text" class="form-control" id="inputCity" name="experience_three">
                </div>
                <div class="form-group col-md-6">
                  <label for="jobdescription">Job Description</label>
                  <input type="text" class="form-control" id="inputCity" name="job_description_three">
                </div>
                <div class="form-group col-md-3">
                  <label for="schooladdress">Duration period</label>
                  <input type="text" class="form-control" id="inputCity" name="duration_three">
                </div>
            </div>

            <hr>
            <h6 class="section-heading">Recomendation<em>Details</em></h6>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Refrence Person Name</label>
                    <input type="text" class="form-control" id="inputCity" name="refrence_one">
                </div>
                <div class="form-group col-md-6">
                    <label>Refrence Person Post</label>
                    <input type="text" class="form-control" id="inputCity" name="refrence_position">
                </div>
            </div>
            <form-group>
                <label>Organization Name</label>
                    <input type="text" class="form-control" id="inputCity" name="refrence_organization">
            </form-group>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Refrence Person Email</label>
                    <input type="email" class="form-control" id="inputCity" name="refrence_person_email">
                </div>
                <div class="form-group col-md-6">
                    <label>Contact Details</label>
                    <input type="text" class="form-control" id="inputCity" name="refrence_phonenumber">
                </div>
            </div>

            <hr>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Refrence Person Name</label>
                    <input type="text" class="form-control" id="inputCity" name="refrence_two">
                </div>
                <div class="form-group col-md-6">
                    <label>Refrence Person Post</label>
                    <input type="text" class="form-control" id="inputCity" name="refrence_position_two">
                </div>
            </div>
            <form-group>
                <label>Organization Name</label>
                    <input type="text" class="form-control" id="inputCity" name="refrence_organization_two">
            </form-group>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Refrence Person Email</label>
                    <input type="email" class="form-control" id="inputCity" name="refrence_person_email_two">
                </div>
                <div class="form-group col-md-6">
                    <label>Contact Details</label>
                    <input type="text" class="form-control" id="inputCity" name="refrence_phonenumber_two">
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Submit your information</button>
          </form>
        </div>
    </div>
</div>
@endsection
