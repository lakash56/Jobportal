<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCVDetail extends Model
{
    use HasFactory;

    protected $fillable = [ 'user_id','first_name','last_name','email',
    'dob','phone',
    "address",
    "Keyskills",
    "language",
    "language_two",
    "school_name",
    "school_exam_board",
    "School_end_date",
    "School_address",
    "colleg_name",
    "college_exam_board",
    "college_end_date",
    "college_address",
    "undergrad_uni_name",
    "undergrad_uni_address",
    "undergrad_uni_end_date",
    "undergrad_uni_subject",
    "postgrad_uni_name",
    "postgrad_uni_address",
    "postgrad_uni_end_date",
    "postgrad_uni_subject",
    "experience_one",
    "job_description_one",
    "duration_one",
    "experience_two",
    "job_description_two",
    "duration_two",
    "experience_three",
    "job_description_three",
    "duration_three",
    "refrence_one",
    "refrence_position",
    "refrence_organization",
    "refrence_person_email",
    "refrence_phonenumber",
    "refrence_tow",
    "refrence_position_two",
    "refrence_organization_two",
    'refrence_person_email_two','refrence_phonenumber_two'];
}
