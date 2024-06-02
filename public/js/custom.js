window.addEventListener("load", function () {
    $(".loader").addClass('hidden');
});

$('.toggle-password').on('click', function() {
    $(this).html('visibility');
    let input = $($(this).attr('toggle'));

    if (input.attr('type') == 'password') {
        input.attr('type', 'text');
        $(this).html('visibility');
    } else {
        input.attr('type', 'password');
        $(this).html('visibility_off');
    }
});

function showLoaderAnimation(){
    $(".loader").css('background-color', 'rgba(200, 200, 200, 0.319)');
    $(".loader").removeClass('hidden');
}

$('.datatable-pagination-left').html('<span class="material-icons-outlined">arrow_back</span>');
$('.datatable-pagination-right').html('<span class="material-icons-outlined">arrow_forward</span>');

$(document).ready(function (){
    $('#saveChild').on('click', function() {
        let name = $('#new-child-name').val();
        let bday = $('#new-child-bday').val();
        let container = $('#newChildContainer');

        if(name.trim().length > 0 && bday.trim().length > 0){
            container.append(`
                <li>
                    <div class="border-bottom w-100 py-2 d-flex align-items-center justify-content-between">
                        <input value="${ name }" name="childName[]" type="text" class="sr-only" >
                        <input value="${ bday }" name="childBday[]" type="text" class="sr-only" >

                        <div>
                            Name: ${ name }<br>Birthday: ${ bday }
                        </div>

                    <span style="cursor: pointer" class="material-icons-outlined text-danger" onclick="this.parentElement.parentElement.remove()">remove</span>
                    </div>
                </li>
            `);
        } else {
            alert('Please fill all needed info');
        }
    });

    // For Part 3
    $('#saveEduc').on('click', function() {
        let level = $('#level').find(":selected").val();
        let schoolName = $('#new-educ-school-name').val();
        let degree = $('#new-educ-degree').val();
        let periodFrom = $('#new-period-educ-from').find(":selected").val();
        let periodTo = $('#new-period-educ-to').find(":selected").val();
        let units = $('#new-educ-units').val();
        let yearGraduated = $('#new-educ-year-graduated').find(":selected").val();
        let awards = $('#new-educ-awards').val();

        let newEducContainer = $('#newEducContainer');

        if(level == 'no-level' || schoolName.trim().length <= 0 || degree.trim().length <= 0 || periodFrom == 'no-period-from' || periodTo == 'no-period-to'){
            alert('There is something missing from the form');
        } else {
            newEducContainer.append(`
                <li>
                    <div class="border-bottom w-100 py-2 d-flex align-items-center justify-content-between">
                        <input value="${ level }" name="educLevel[]" type="text" class="sr-only" >
                        <input value="${ schoolName }" name="educSchoolName[]" type="text" class="sr-only" >
                        <input value="${ degree }" name="educDegree[]" type="text" class="sr-only" >
                        <input value="${ periodFrom }" name="educPeriodFrom[]" type="text" class="sr-only" >
                        <input value="${ periodTo }" name="educPeriodTo[]" type="text" class="sr-only" >
                        <input value="${ units }" name="educUnits[]" type="text" class="sr-only" >
                        <input value="${ yearGraduated }" name="educYearGraduated]" type="text" class="sr-only" >
                        <input value="${ awards }" name="educAwards[]" type="text" class="sr-only" >

                        <div>
                            Level: ${ level }<br>
                            Name of School: ${ schoolName }<br>
                            Basic Education/Degree/Course: ${ degree } <br>
                            PA From: ${ periodFrom }<br>
                            PA To: ${ periodTo }<br>
                            Highest Level/Units Earned: ${ units }<br>
                            Year Graduated: ${ yearGraduated }<br>
                            Scholarship/Academic Honors Received: ${ awards }
                        </div>

                        <span style="cursor: pointer" class="material-icons-outlined text-danger" onclick="this.parentElement.parentElement.remove()">remove</span>
                    </div>
                </li>
            `);
        }
    });

    // For Part 4
    $('#saveCService').on('click', function() {
        let career = $('#new-cservice-career').val();
        let rating = $('#new-cservice-rating').val();
        let dateExamConf = $('#new-cservice-date').val();
        let placeExamConf = $('#new-cservice-place').val();
        let licenseNo = $('#new-cservice-license-no').val();
        let licenseDate = $('#new-cservice-license-date').val();
        let newCServiceContainer = $('#newCServiceContainer');

        newCServiceContainer.append(`
            <li>
                <div class="border-bottom w-100 py-2 d-flex align-items-center justify-content-between">
                        <input value="${ career }" name="csCareer[]" type="text" class="sr-only" >
                        <input value="${ rating }" name="csRating[]" type="text" class="sr-only" >
                        <input value="${ dateExamConf }" name="csDateExamConf[]" type="text" class="sr-only" >
                        <input value="${ placeExamConf }" name="csPlaceExamConf[]" type="text" class="sr-only" >
                        <input value="${ licenseNo }" name="csLicenseNo[]" type="text" class="sr-only" >
                        <input value="${ licenseDate }" name="csLicenseDate[]" type="text" class="sr-only" >

                        <div>
                            Career Service/RA 1080 (BOARD/BAR) UNDER SPECIAL LAWS/CES/CSEE BARANGAY ELIGIBILITY/ DRIVER'S LICENSE: ${ career }<br>
                            Rating: ${ rating }<br>
                            Date of examination/conferment: ${ dateExamConf } <br>
                            Place of Examination/Conferment: ${ placeExamConf }<br>
                            License No.: ${ licenseNo }<br>
                            License Date of Validity: ${ licenseDate }
                        </div>

                    <span style="cursor: pointer" class="material-icons-outlined text-danger" onclick="this.parentElement.parentElement.remove()">remove</span>
                </div>
            </li>
        `);
    });

    // For part 5
    $('#saveWExp').on('click', function() {
        let incFrom = $('#new-wexp-inc-from').val();
        let incTo = $('#new-wexp-inc-to').val();
        let position = $('#new-wexp-position').val();
        let department = $('#new-wexp-department').val();
        let salary = $('#new-wexp-salary').val();
        let increment = $('#new-wexp-increment').val();
        let status = $('#new-wexp-status').val();
        let isGovtService = $('#new-wexp-govt-service').find(":selected").val();

        let newWExpContainer = $('#newWExpContainer');

        newWExpContainer.append(`
            <li>
                <div class="border-bottom w-100 py-2 d-flex align-items-center justify-content-between">
                    <input value="${ incFrom }" name="wexpIncFrom[]" type="text" class="sr-only" >
                    <input value="${ incTo }" name="wexpIncTo[]" type="text" class="sr-only" >
                    <input value="${ position }" name="wexpPosition[]" type="text" class="sr-only" >
                    <input value="${ department }" name="wexpDepartment[]" type="text" class="sr-only" >
                    <input value="${ salary }" name="wexpSalary[]" type="text" class="sr-only" >
                    <input value="${ increment }" name="wexpIncrement[]" type="text" class="sr-only" >
                    <input value="${ status }" name="wexpStatus[]" type="text" class="sr-only" >
                    <input value="${ isGovtService }" name="wexpIsGovt[]" type="text" class="sr-only" >

                    <div>
                        Inclusive Dates - From: ${ incFrom }<br>
                        Inclusive Dates - To: ${ incTo }<br>
                        Position Title: ${ position }<br>
                        Department/Agency/Office/Company: ${ department } <br>
                        Monthly Salary: ${ salary.toLocaleString('en-US', { style: 'currency' }) }<br>
                        Salary/Job/Pay Grade & Step Increment: ${ increment }<br>
                        Status of Appointment: ${ status }
                        Government Service: ${ isGovtService }
                    </div>

                    <span style="cursor: pointer" class="material-icons-outlined text-danger" onclick="this.parentElement.parentElement.remove()">remove</span>
                </div>
            </li>
        `);
    });

    // For Part 6
    $('#saveVoluntary').on('click', function() {
        let organizationAddress = $('#new-vol-organization').val();
        let incFrom = $('#new-vol-inc-from').val();
        let incTo = $('#new-vol-inc-to').val();
        let hours = $('#new-vol-hours').val();
        let position = $('#new-vol-position').val();

        let newVoluntaryContainer = $('#newVoluntaryContainer');

        newVoluntaryContainer.append(`
            <li>
                <div class="border-bottom w-100 py-2 d-flex align-items-center justify-content-between">
                    <input value="${ organizationAddress }" name="volOrganizationAddress[]" type="text" class="sr-only" >
                    <input value="${ incTo }" name="volIncTo[]" type="text" class="sr-only" >
                    <input value="${ incFrom }" name="volIncFrom[]" type="text" class="sr-only" >
                    <input value="${ hours }" name="volHours[]" type="text" class="sr-only" >
                    <input value="${ position }" name="volPosition[]" type="text" class="sr-only" >

                    <div>
                        Name & Address of organization: ${ organizationAddress }<br>
                        Inclusive Dates - From: ${ incFrom }<br>
                        Inclusive Dates - To: ${ incTo }<br>
                        Number of Hours: ${ hours } <br>
                        Position / Nature of Work: ${ position }
                    </div>

                    <span style="cursor: pointer" class="material-icons-outlined text-danger" onclick="this.parentElement.parentElement.remove()">remove</span>
                </div>
            </li>
        `);
    });

    // For Part 8
    $('#saveLearning').on('click', function() {
        let title = $('#new-learning-title').val();
        let incFrom = $('#new-learning-inc-from').val();
        let incTo = $('#new-learning-inc-to').val();
        let hours = $('#new-learning-hours').val();
        let ld = $('#new-learning-ld').val();
        let sponsored = $('#new-learning-sponsored').val();
        let newLearningContainer = $('#newLearningContainer');

        newLearningContainer.append(`
            <li>
                <div class="border-bottom w-100 py-2 d-flex align-items-center justify-content-between">
                    <input value="${ title }" name="learningOrganizationAddress[]" type="text" class="sr-only" >
                    <input value="${ incTo }" name="learningIncTo[]" type="text" class="sr-only" >
                    <input value="${ incFrom }" name="learningIncFrom[]" type="text" class="sr-only" >
                    <input value="${ hours }" name="learningHours[]" type="text" class="sr-only" >
                    <input value="${ ld }" name="learningLd[]" type="text" class="sr-only" >
                    <input value="${ sponsored }" name="learningSponsored[]" type="text" class="sr-only" >

                    <div>
                        Title of Learning & Development Interventions/Training Programs: ${ title }<br>
                        Inclusive Dates of Attendance - From: ${ incFrom }<br>
                        Inclusive Dates of Attendance - To: ${ incTo }<br>
                        Number of Hours: ${ hours } <br>
                        Type of LD: ${ ld }
                        Conducted/Sponsored By: ${ sponsored }
                    </div>

                    <span style="cursor: pointer" class="material-icons-outlined text-danger" onclick="this.parentElement.parentElement.remove()">remove</span>
                </div>
            </li>
        `);
    });

    $('#saveOtherSkills').on('click', function() {
        let skills = $('#new-skills').val();
        let newOtherSkillsContainer = $('#newOtherSkillsContainer');

        newOtherSkillsContainer.append(`
            <li>
                <div class="border-bottom w-100 py-2 d-flex align-items-center justify-content-between">
                    <input value="${ skills }" name="skills[]" type="text" class="sr-only" >

                    <div>
                        ${ skills }
                    </div>

                    <span style="cursor: pointer" class="material-icons-outlined text-danger" onclick="this.parentElement.parentElement.remove()">remove</span>
                </div>
            </li>
        `);
    });

    $('#saveOtherAcademic').on('click', function() {
        let academic = $('#new-academic').val();
        let newOtherAcademicContainer = $('#newOtherAcademicContainer');

        newOtherAcademicContainer.append(`
            <li>
                <div class="border-bottom w-100 py-2 d-flex align-items-center justify-content-between">
                    <input value="${ academic }" name="academic[]" type="text" class="sr-only" >

                    <div>
                        ${ academic }
                    </div>

                    <span style="cursor: pointer" class="material-icons-outlined text-danger" onclick="this.parentElement.parentElement.remove()">remove</span>
                </div>
            </li>
        `);
    });

    $('#saveOtherMembership').on('click', function() {
        let membership = $('#new-membership').val();
        let newOtherMembershipContainer = $('#newOtherMembershipContainer');

        newOtherMembershipContainer.append(`
            <li>
                <div class="border-bottom w-100 py-2 d-flex align-items-center justify-content-between">
                    <input value="${ membership }" name="membership[]" type="text" class="sr-only" >

                    <div>
                        ${ membership }
                    </div>

                    <span style="cursor: pointer" class="material-icons-outlined text-danger" onclick="this.parentElement.parentElement.remove()">remove</span>
                </div>
            </li>
        `);
    });

    $('#saveReference').on('click', function() {
        let name = $('#new-ref-name').val();
        let address = $('#new-ref-address').val();
        let telephone = $('#new-ref-telephone').val();
        let newReferenceContainer = $('#newReferenceContainer');

        newReferenceContainer.append(`
            <li>
                <div class="border-bottom w-100 py-2 d-flex align-items-center justify-content-between">
                    <input value="${ name }" name="refName[]" type="text" class="sr-only" >
                    <input value="${ address }" name="refAddress[]" type="text" class="sr-only" >
                    <input value="${ telephone }" name="refTelephone[]" type="text" class="sr-only" >

                    <div>
                        Name: ${ name }<br>
                        Address: ${ address }<br>
                        Telephone No.: ${ telephone }<br>
                    </div>

                    <span style="cursor: pointer" class="material-icons-outlined text-danger" onclick="this.parentElement.parentElement.remove()">remove</span>
                </div>
            </li>
        `);
    });
});
