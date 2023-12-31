@extends('share.main')
@section('content')
    <div class="page_banner bg_cover" style="background-image: url({{ asset('assets/images/page_banner.jpg') }})">

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="banner_content d-sm-flex align-items-center justify-content-between">
                        <div class="content">
                            <h3 class="page_title">Create Resume</h3>
                            <p>More than 6 million jobseekers turn to Fitcareer in their search for work, making over
                                150,000 applications every day.</p>
                        </div> <!-- content -->
                        <div class="banner_btn">
                            <a class="main-btn " href="#">75K JOBS</a>
                        </div> <!-- banner btn -->
                    </div> <!-- banner content -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </div> <!-- page banner -->
    </header>
    <section class="add_resume_area pt-80 pb-80">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-10">
                    <div class="add_resume_form">
                        <form method="POST" action="{{ route('freelancer-resumes.store') }}">
                            @csrf
                            @method('POST')
                         
                            <h4 class="resume_title">Basic information</h4>
<div class="single_resume">
    <label for="Name">Name</label>
    <input type="text" id="Name" name="Name" placeholder="Name" value="{{ old('Name', $existingResume ? $existingResume->Name : '') }}">
</div> <!-- single resume -->

<div class="single_resume">
    <label for="Email">Email</label>
    <input type="email" id="Email" name="Email" placeholder="your@domain.com" value="{{ old('Email', $existingResume ? $existingResume->Email : '') }}">
</div> <!-- single resume -->

<div class="single_resume">
    <label for="Profession_Title">Profession Title</label>
    <input type="text" id="Profession_Title" name="Profession_Title" placeholder="Headline (e.g. Front-end developer)" value="{{ old('Profession_Title', $existingResume ? $existingResume->Profession_Title : '') }}">
</div> <!-- single resume -->

<div class="single_resume">
    <label for="Location">Location</label>
    <input type="text" id="Location" name="Location" placeholder="Location, e.g" value="{{ old('Location', $existingResume ? $existingResume->Location : '') }}">
</div> <!-- single resume -->

<div class="single_resume">
    <label for="Web">Web</label>
    <input type="text" id="Web" name="Web" placeholder="Website address" value="{{ old('Web', $existingResume ? $existingResume->Web : '') }}">
</div> <!-- single resume -->

<div class="single_resume">
    <label for="Per_Hour">Per Hour</label>
    <input type="number" id="Per_Hour" name="Per_Hour" placeholder="Salary, e.g. 85" value="{{ old('Per_Hour', $existingResume ? $existingResume->Per_Hour : '') }}">
</div> <!-- single resume -->

<div class="single_resume">
    <label for="Age">Age</label>
    <input type="number" id="Age" name="Age" placeholder="Years old" value="{{ old('Age', $existingResume ? $existingResume->Age : '') }}">
</div> <!-- single resume -->
<table>
    <thead>
        <tr>
            <th>Company Name</th>
            <th>Title</th>
            <th>Date From</th>
            <th>Date To</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($workExperiences as $workExperience)
            <tr>
                <td>{{ $workExperience->company_name }}</td>
                <td>{{ $workExperience->title }}</td>
                <td>{{ $workExperience->date_from }}</td>
                <td>{{ $workExperience->date_to }}</td>
                <td>{{ $workExperience->description }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<!-- Display skills -->
<table>
    <thead>
        <tr>
            <th>Skill Name</th>
            <th>Proficiency</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($skills as $skill)
            <tr>
                <td>{{ $skill->Skill_Name }}</td>
                <td>{{ $skill->proficiency }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
                           
                            <h4 class="resume_title Work_scroll">Work Experience</h4>
                            <div id="workExperienceFields">

                               
                            </div>
                            <div class="single_resume d-flex justify-content-between">
                                <a class="add_new_work add_new" href="#">Add New Work Experience</a>

                            </div> <!-- single resume -->
                            <div id="skillsFields">
                                <h4 class="resume_title Skills_scroll">Skills</h4>

                            </div>
                            <div class="single_resume d-flex justify-content-between">
                                <a class="add_new add_new_skill" href="#">Add New Skill</a>

                            </div> <!-- single resume -->

                            
                            <label for="resume_pdf">Resume PDF </label>
                            <input type="file" id="resume_pdf" class="form-control" name="resume_pdf"> 


                            <div class="single_resume d-flex justify-content-between">
                                <button class="main-btn">Save</button>
                            </div> <!-- single resume -->
                          
                            
                        </form>
                    </div> <!-- add resume form -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const workExperienceFields = document.getElementById('workExperienceFields');
            const addWorkExperienceButton = document.querySelector('.add_new_work');
            let workExperienceCounter = 1; // Initialize the counter

            addWorkExperienceButton.addEventListener('click', function(e) {
                e.preventDefault();

                const sectionId = `workExperienceSection${workExperienceCounter}`; // Generate a unique ID
                const newWorkExperienceField = document.createElement('div');
                newWorkExperienceField.id = sectionId; // Set the ID for the section
                newWorkExperienceField.innerHTML = `
                <div class="single_resume">
                    <label>Company Name</label>
                    <input type="text" name="work_experience[${sectionId}][company_name]" placeholder="Company Name">
                </div>
                <div class="single_resume">
                    <label>Title</label>
                    <input type="text" name="work_experience[${sectionId}][title]" placeholder="e.g UI/UX Researcher">
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="single_resume">
                            <label>Date From</label>
                            <input type="date" name="work_experience[${sectionId}][date_from]" placeholder="e.g 2014">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="single_resume">
                            <label>Date To</label>
                            <input type="date" name="work_experience[${sectionId}][date_to]" placeholder="e.g 2020">
                        </div>
                    </div>
                </div>
                <div class="single_resume">
                    <label>Description</label>
                    <textarea name="work_experience[${sectionId}][description]" placeholder=""></textarea>
                </div>
                <div class="single_resume d-flex justify-content-between">
                    <a class="delete_work delete" href="#" data-section-id="${sectionId}" onclick="return false;">Delete This</a>
                </div>
            `;

                workExperienceFields.appendChild(newWorkExperienceField);

                // Add event listener for delete button
                const deleteButton = newWorkExperienceField.querySelector('.delete_work');
                deleteButton.addEventListener('click', function(event) {
                    event.preventDefault(); // Prevent the default link behavior
                    const sectionIdToDelete = this.getAttribute('data-section-id');
                    const sectionToDelete = document.getElementById(sectionIdToDelete);
                    workExperienceFields.removeChild(sectionToDelete);
                    const scrollTarget = document.querySelector('.Work_scroll');
                    if (scrollTarget) {
                        scrollTarget.scrollIntoView({
                            behavior: 'smooth'
                        });
                    }
                });

                workExperienceCounter++; // Increment the counter for the next section
            });
        });
    </script>
    <script>
document.addEventListener('DOMContentLoaded', function() {
    const skillsFields = document.getElementById('skillsFields');
    const addSkillButton = document.querySelector('.add_new_skill');
    let skillCounter = 1; // Initialize the counter

    // Function to handle delete button click
    function handleDeleteButtonClick(event) {
        event.preventDefault();
        const sectionIdToDelete = this.getAttribute('data-section-id');
        const sectionToDelete = document.getElementById(sectionIdToDelete);
        skillsFields.removeChild(sectionToDelete);
    }

    addSkillButton.addEventListener('click', function(e) {
        e.preventDefault();

        const sectionId = `skillSection${skillCounter}`; // Generate a unique ID
        const newSkillField = document.createElement('div');
        newSkillField.id = sectionId; // Set the ID for the section
        newSkillField.innerHTML = `
            <div class="row">
                <div class="col-md-6">
                    <div class="single_resume">
                        <label>Skill Name</label>
                        <input type="text" name="skills[Skill_name][]" placeholder="Skill name, e.g. HTML">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="single_resume">
                        <label>% (1-100)</label>
                        <input type="number" name="skills[skill_proficiency][]" placeholder="Skill proficiency, e.g. 90">
                    </div>
                </div>
                <div class="single_resume d-flex justify-content-between">
                    <a class="delete_skill delete" data-section-id="${sectionId}" onclick="return false;">Delete This</a>
                </div>
            </div>
        `;

        skillsFields.appendChild(newSkillField);

        // Add event listener for delete button
        const deleteButton = newSkillField.querySelector('.delete_skill');
        deleteButton.addEventListener('click', handleDeleteButtonClick);

        skillCounter++; // Increment the counter for the next section
    });

    // Event delegation to handle delete button clicks on existing skill fields
    skillsFields.addEventListener('click', function(event) {
        if (event.target.classList.contains('delete_skill')) {
            handleDeleteButtonClick.call(event.target, event);
        }
    });
});

    </script>
@endsection
