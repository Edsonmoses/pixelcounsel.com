<div>
    <div class="hookup-actives"><div class="hookup-arrows"></div></div>
   <header class="intro-header intro-hookup">
    <div class="container">
        <div class="row hookup">
            <div class="col-lg-7 col-md-7 col-sm-7">
                <div class="heading-style">
                    <h1>CREATE HOOK UP RESUME</h1>
                    <span class="sub-heading">Collection of career changing jobs in Africa for your picking</span>
                </div>
            </div>
            <div class="col-lg-5 col-md-5 col-sm-5 hook-search heading-mt">
                @if (Auth::check())
                    <a class="btn btn-events" href="{{ route('hookup.addhookup') }}" role="button" style="margin-top: -50px;">SUBMIT A JOB</a>
                @else
                    <a class="btn btn-events" href="{{route('login')}}" title="Login" role="button" style="margin-top: -50px;">SUBMIT A JOB</a>
                @endif
                <div id="custom-search-input">
                    <div class="input-group col-md-12">
                        <input type="text" class="  search-query form-control" placeholder="Find a job"  wire:model="searchTerm"/>
                        <span class="input-group-btn">
                            <button class="btn btn-danger" type="button">
                                <span class=" glyphicon glyphicon-search"></span>
                            </button>
                        </span>
                    </div>
                </div>
                </div>
        </div>
        </div>
    </div>
    </header>
     <!-- CREATE RESUME START -->
     <section class="section apply">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="text-dark">General Information :</h4>
                </div>
 
                <div class="col-12 mt-3">
                    <div class="custom-form p-4 border rounded">
                        <div class="text-center">
                            @if($image)
                                <img src="{{ $image->temporaryUrl() }}" class="img-fluid avatar avatar-medium d-block mx-auto rounded-pill" alt=""/>
                            @else
                                <img src="https://via.placeholder.com/400X400//88929f/5a6270C/O https://placeholder.com/" class="img-fluid avatar avatar-medium d-block mx-auto rounded-pill" alt="">
                            @endif
                            @if (Session::has('message'))
                            <div class="alert alert-success" id="message3" role="alert">{{ Session::get('message') }}</div>
                         @endif
                       </div>
                       <form class="form-horizontal" wire:submit.prevent="addHookup">
                            {{ csrf_field() }}
                            <div class="row mt-4">
                                <div class="col-md-4">
                                    <div class="form-group app-label">
                                        <label class="text-muted">First Name<span class="text-danger">*</span> :</label>
                                        <input id="first-name" type="text" name="name" class="form-control input-md resume" placeholder="First Name :" wire:model="name">
                                        @error('name')<p class="text-danger">{{ $message }}</p>@enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group app-label">
                                        <label class="text-muted">Middle Name<span class="text-danger">*</span> :</label>
                                        <input id="middle-name" type="text" class="form-control input-md resume" name="mname" placeholder="Middle Name :" wire:model="mname">
                                        @error('mname')<p class="text-danger">{{ $message }}</p>@enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group app-label">
                                        <label class="text-muted">Surname<span class="text-danger">*</span> :</label>
                                        <input id="surname-name" type="text" class="form-control input-md resume" name="surname" placeholder="Surname :" wire:model="surname">
                                        @error('surname')<p class="text-danger">{{ $message }}</p>@enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group app-label">
                                        <label class="text-muted">Date Of Birth<span class="text-danger">*</span> :</label>
                                        <input id="date-of-birth" type="text" class="form-control input-md resume" name="dbirth" placeholder="13-02-1999" wire:model="dbirth">
                                        @error('dbirth')<p class="text-danger">{{ $message }}</p>@enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group app-label">
                                        <label class="text-muted">Sex<span class="text-danger">*</span> :</label>
                                        <div class="form-button">
                                            <select class="form-control input-md nice-select rounded" wire:model="sex">
                                                <option data-display="sex">Sex</option>
                                                <option value="1">Male</option>
                                                <option value="2">Female</option>
                                                <option value="3">Other</option>
                                            </select>
                                            @error('sex')<p class="text-danger">{{ $message }}</p>@enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group app-label">
                                        <label class="text-muted">Marital Status</label>
                                        <div class="form-button">
                                            <select class="form-control input-md nice-select rounded" wire:model="marital">
                                                <option data-display="Status">Status</option>
                                                <option value="1">Unmarried</option>
                                                <option value="2">Married</option>
                                            </select>
                                            @error('marital')<p class="text-danger">{{ $message }}</p>@enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group app-label">
                                        <label class="text-muted">Upload Image</label>
                                        <div class="form-button">
                                            <input type="file" name="image" class="form-control input-file" wire:model="image">
                                            @error('image')<p class="text-danger">{{ $message }}</p>@enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-12">
                    <h4 class="text-dark">Contact Information :</h4>
                </div>

                <div class="col-12 mt-3">
                    <div class="custom-form p-4 border rounded">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group app-label">
                                        <label class="text-muted">City</label>
                                        <div class="form-button">
                                            <select class="form-control input-md nice-select rounded" wire:model="city">
                                                <option data-display="City">City</option>
                                                <option value="1">Abilene</option>
                                                <option value="2">Babbitt</option>
                                                <option value="3">Cape Coral</option>
                                                <option value="4">Dallas</option>
                                                <option value="5">Eloy</option>
                                            </select>
                                            @error('city')<p class="text-danger">{{ $message }}</p>@enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group app-label">
                                        <label class="text-muted">State</label>
                                        <div class="form-button">
                                            <select class="form-control input-md nice-select rounded" wire:model="state">
                                                <option data-display="State">State</option>
                                                <option value="1">Alabama</option>
                                                <option value="3">Hawaii</option>
                                                <option value="4">Maine</option>
                                                <option value="5">Oregon</option>
                                            </select>
                                            @error('state')<p class="text-danger">{{ $message }}</p>@enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group app-label">
                                        <label class="text-muted">Country</label>
                                        <div class="form-button">
                                            <select class="form-control input-md nice-select rounded" wire:model="country">
                                                <option data-display="Country">Country</option>
                                                <option value="1">Alabama</option>
                                                <option value="2">Delaware</option>
                                                <option value="3">Iowa</option>
                                                <option value="4">Missouri</option>
                                                <option value="5">New York</option>
                                                <option value="6">Utah</option>
                                            </select>
                                            @error('country')<p class="text-danger">{{ $message }}</p>@enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group app-label">
                                        <label class="text-muted">Phone</label>
                                        <input id="phone" type="number" class="form-control input-md resume" name="phone" placeholder="Phone No. :" wire:model="phone">
                                        @error('phone')<p class="text-danger">{{ $message }}</p>@enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group app-label">
                                        <label class="text-muted">E-mail</label>
                                        <input id="e-mail" type="email" name="email" class="form-control input-md resume" placeholder="Email ID :" wire:model="email">
                                        @error('email')<p class="text-danger">{{ $message }}</p>@enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group app-label">
                                        <label class="text-muted">Website</label>
                                        <input id="website" type="url" name="url" class="form-control input-md resume" placeholder="www.example.com" wire:model="url">
                                        @error('url')<p class="text-danger">{{ $message }}</p>@enderror
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group app-label">
                                        <label>Address :</label>
                                        <textarea id="address" rows="4" class="form-control input-md resume" name="address" placeholder="" wire:model="address"></textarea>
                                        @error('address')<p class="text-danger">{{ $message }}</p>@enderror
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <h4 class="text-dark mt-5">Education Details :</h4>
                </div>

                <div class="col-12 mt-3">
                    <div class="custom-form p-4 border rounded">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group app-label">
                                        <label class="text-muted">Graduation</label>
                                        <input id="graduation" type="text" class="form-control input-md resume" name="graduation" placeholder="" wire:model="graduation">
                                        @error('graduation')<p class="text-danger">{{ $message }}</p>@enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group app-label">
                                        <label class="text-muted">University/College</label>
                                        <input id="university/college" type="text" class="form-control input-md resume" name="university" placeholder="" wire:model="university">
                                        @error('university')<p class="text-danger">{{ $message }}</p>@enderror
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group app-label">
                                        <label class="text-muted">Degree/Certification</label>
                                        <input id="degree/certification" type="text" class="form-control input-md resume" name="certification" placeholder="" wire:model="certification">
                                        @error('certification')<p class="text-danger">{{ $message }}</p>@enderror
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group app-label">
                                                <label class="text-muted">Level</label>
                                                <div class="form-button">
                                                    <select class="form-control input-md nice-select rounded" wire:model="Level">
                                                        <option data-display="Select">Select</option>
                                                        <option value="1">Level-1</option>
                                                        <option value="2">Level-2</option>
                                                        <option value="3">Level-3</option>
                                                        <option value="4">Level-4</option>
                                                    </select>
                                                    @error('Level')<p class="text-danger">{{ $message }}</p>@enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group app-label">
                                                <label class="text-muted">Course Title</label>
                                                <input id="course-title" type="text" class="form-control input-md resume" name="course" placeholder="" wire:model="course">
                                                @error('course')<p class="text-danger">{{ $message }}</p>@enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group app-label">
                                        <label>Additional Information :</label>
                                        <textarea id="addition-information" rows="4" class="form-control input-md resume" placeholder="" wire:model="information"></textarea>
                                        @error('information')<p class="text-danger">{{ $message }}</p>@enderror
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 mt-5">
                    <h4 class="text-dark">Work Experience :</h4>
                </div>

                <div class="col-12 mt-3">
                    <div class="custom-form p-4 border rounded">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group app-label">
                                        <label class="text-muted">Company Name</label>
                                        <input id="company-name" type="text" class="form-control input-md resume" name="company" placeholder="" wire:model="company">
                                        @error('company')<p class="text-danger">{{ $message }}</p>@enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group app-label">
                                        <label class="text-muted">Job Position</label>
                                        <input id="job-position" type="text" class="form-control input-md resume" name="position" placeholder="" wire:model="position">
                                        @error('position')<p class="text-danger">{{ $message }}</p>@enderror
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group app-label">
                                        <label class="text-muted">Location</label>
                                        <div class="form-button">
                                            <select class="form-control input-md nice-select rounded" wire:model="location">
                                                <option data-display="Search">Search</option>
                                                <option value="1">New York</option>
                                                <option value="2">Los Angeles</option>
                                                <option value="3">Chicago</option>
                                                <option value="4">Houston</option>
                                                <option value="5">Indiana</option>
                                            </select>
                                            @error('location')<p class="text-danger">{{ $message }}</p>@enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group app-label">
                                                <label class="text-muted">Date From</label>
                                                <input id="date-from" type="text" class="form-control input-md resume" name="datefrom" placeholder="01-Jan-2018" wire:model="datefrom">
                                                @error('datefrom')<p class="text-danger">{{ $message }}</p>@enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group app-label">
                                                <label class="text-muted">Date To</label>
                                                <input id="date-to" type="text" class="form-control input-md resume" name="dateto" placeholder="31-March-2019" wire:model="dateto">
                                                @error('dateto')<p class="text-danger">{{ $message }}</p>@enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group app-label">
                                        <label>Additional Information :</label>
                                        <textarea id="addition-information-1" rows="4" class="form-control input-md resume" name="information1" placeholder="" wire:model="information1"></textarea>
                                        @error('information1')<p class="text-danger">{{ $message }}</p>@enderror
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            

            <div class="row">
                <div class="col-12 mt-5">
                    <h4 class="text-dark">Skills :</h4>
                </div>
                
                <div class="col-12 mt-3">
                    <div class="custom-form p-4 border rounded">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group app-label">
                                        <label class="text-muted">Skills</label>
                                        <input id="skills" type="text" class="form-control input-md resume" name="skills" placeholder="HTML, CSS, PHP, javascript, ..." wire:model="skills">
                                        @error('skills')<p class="text-danger">{{ $message }}</p>@enderror
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group app-label">
                                        <label class="text-muted">Skill proficiency</label>
                                        <input id="skill_proficiency" type="text" class="form-control input-md resume" name="skill_proficiency" placeholder="75%" wire:model="skill_proficiency">
                                        @error('skill_proficiency')<p class="text-danger">{{ $message }}</p>@enderror
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                
                <div class="col-12 mt-4">
                    <!--<input type="submit" id="submit" name="send" class="submitBnt btn btn-primary" value="Submit Resume">-->
                    <button type="submit" class="btn btn-primary">Submit Resume</button>
                </div>
            </form>
            </div>
        </div>
    </section>
    <!-- CREATE RESUME END -->
</div>