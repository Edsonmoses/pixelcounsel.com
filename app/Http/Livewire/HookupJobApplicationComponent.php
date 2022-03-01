<?php

namespace App\Http\Livewire;

use App\Models\Resume;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class HookupJobApplicationComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $mname;
    public $surname;
    public $dbirth;
    public $sex;
    public $marital;
    public $image;
    public $city;
    public $state;
    public $country;
    public $phone;
    public $email;
    public $url;
    public $address;
    public $graduation;
    public $university;
    public $certification;
    public $Level;
    public $course;
    public $information;
    public $company;
    public $position;
    public $location;
    public $datefrom;
    public $dateto;
    public $information1;
    public $skills;
    public $skill_proficiency;

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required',
            'mname' => 'required',
            'surname' => 'required',
            'dbirth' => 'required',
            'sex' => 'required',
            'marital' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required',
            'graduation' => 'required',
            'university' => 'required',
            'certification' => 'required',
            'Level' => 'required',
            'course' => 'required',
            'information' => 'required',
            'company' => 'required',
            'position' => 'required',
            'location' => 'required',
            'datefrom' => 'required',
            'dateto' => 'required',
            'information1' => 'required',
            'skills' => 'required',
            'skill_proficiency' => 'required',
        ]);
    }

    public function addResumes()
    {
        $this->validate([
            'name' => 'required',
            'mname' => 'required',
            'surname' => 'required',
            'dbirth' => 'required',
            'sex' => 'required',
            'marital' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required',
            'graduation' => 'required',
            'university' => 'required',
            'certification' => 'required',
            'Level' => 'required',
            'course' => 'required',
            'information' => 'required',
            'company' => 'required',
            'position' => 'required',
            'location' => 'required',
            'datefrom' => 'required',
            'dateto' => 'required',
            'information1' => 'required',
            'skills' => 'required',
            'skill_proficiency' => 'required',
        ]);

        $resume = new Resume();
        $resume->name= $this->name;
        $resume->mname= $this->mname;
        $resume->surname= $this->surname;
        $resume->dbirth= $this->dbirth;
        $resume->sex= $this->sex;
        $resume->marital= $this->marital;
        $imageName = Carbon::now()->timestamp.'.'.$this->image->extension();
        $this->image->storeAs('resume',$imageName);
        $resume->image= $this->image;
        $resume->city= $this->city;
        $resume->state= $this->state;
        $resume->country= $this->country;
        $resume->phone= $this->phone;
        $resume->email= $this->email;
        $resume->url= $this->url;
        $resume->address= $this->address;
        $resume->graduation= $this->graduation;
        $resume->university= $this->university;
        $resume->certification= $this->certification;
        $resume->Level= $this->Level;
        $resume->course= $this->course;
        $resume->information= $this->information;
        $resume->company= $this->company;
        $resume->position= $this->position;
        $resume->location= $this->location;
        $resume->datefrom= $this->datefrom;
        $resume->dateto= $this->dateto;
        $resume->information1= $this->information1;
        $resume->skills= $this->skills;
        $resume->skill_proficiency= $this->skill_proficiency;
        $resume->save();

        session()->flash('message','Your Resume has been submited successfully!');
    }
    public function render()
    {
        return view('livewire.hookup-job-application-component')->layout('layouts.baseapp');
    }
}
