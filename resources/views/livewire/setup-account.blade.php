<main class="main-content mt-0">
    <section>
        <div class="page-header">
            <div class="container-fluid py-5 py-lg-6 px-lg-8">
                <div class="container px-0 px-lg-auto">
                    <div class="row pt-lg-5">
                        <div class="col-lg-12 col-12">
                            <div class="card z-index-0 fadeIn3 fadeInBottom">
                                <div class="card-body">
                                    <h6 class="text-black font-weight-bolder text-start mt-2 mb-0">Part 1. Personal Information</h6>                                   
                                    <form wire:submit="save">               
                                        <div class="row mt-4">
                                            <div class="col-3-5">
                                                <div class="input-group input-group-outline @if(strlen($last_name ?? '') > 0) is-filled @endif">
                                                    <label class="form-label">Last Name</label>
                                                    <input wire:model.live="last_name" type="text" class="form-control">
                                                </div>
                                                @error('last_name')
                                                <p class='text-danger inputerror'>{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col-3-5">
                                                <div class="input-group input-group-outline @if(strlen($first_name ?? '') > 0) is-filled @endif">
                                                    <label class="form-label">First Name</label>
                                                    <input wire:model.live="first_name" type="text" class="form-control">
                                                </div>
                                                @error('first_name')
                                                <p class='text-danger inputerror'>{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col-3-5">
                                                <div class="input-group input-group-outline @if(strlen($middle_name ?? '') > 0) is-filled @endif">
                                                    <label class="form-label">Middle Name</label>
                                                    <input wire:model.live="middle_name" type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-2-5">
                                                <div class="input-group input-group-outline @if(strlen($middle_name ?? '') > 0) is-filled @endif">
                                                    <label class="form-label">Extension Name</label>
                                                    <input wire:model.live="middle_name" type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-4">
                                                <div class="input-group input-group-outline @if(strlen($street ?? '') > 0) is-filled @endif">
                                                    <label class="form-label">Street</label>
                                                    <input wire:model.live="street" type="text" class="form-control">
                                                </div>
                                                @error('street')
                                                <p class='text-danger inputerror'>{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col-4">
                                                <div class="input-group input-group-outline @if(strlen($barangay ?? '') > 0) is-filled @endif">
                                                    <label class="form-label">Barangay</label>
                                                    <input wire:model.live="barangay" type="text" class="form-control">
                                                </div>
                                                @error('barangay')
                                                <p class='text-danger inputerror'>{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col-4">
                                                <div class="input-group input-group-outline @if(strlen($city ?? '') > 0) is-filled @endif">
                                                    <label class="form-label">City</label>
                                                    <input wire:model.live="city" type="text" class="form-control">
                                                </div>
                                                @error('city')
                                                <p class='text-danger inputerror'>{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-4">
                                                <div class="input-group input-group-outline @if(strlen($province ?? '') > 0) is-filled @endif">
                                                    <label class="form-label">Province</label>
                                                    <input wire:model.live="province" type="text" class="form-control">
                                                </div>
                                                @error('province')
                                                <p class='text-danger inputerror'>{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col-4">
                                                <div class="input-group input-group-outline @if(strlen($contact_number ?? '') > 0) is-filled @endif">
                                                    <label class="form-label">Contact Number</label>
                                                    <input wire:model.live="contact_number" type="text" class="form-control">
                                                </div>
                                                @error('contact_number')
                                                <p class='text-danger inputerror'>{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <h6 class="text-black font-weight-bolder text-start my-4">Part 2. Student Information</h6> 
                                        <div class="row mt-4">
                                            <div class="col-6">
                                                <div class="input-group input-group-outline @if(strlen($campus ?? '') > 0) is-filled @endif">
                                                    <label class="form-label">Campus</label>
                                                    <input wire:model.live="campus" type="text" class="form-control">
                                                </div>
                                                @error('campus')
                                                <p class='text-danger inputerror'>{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col-6">
                                                <div class="input-group input-group-outline @if(strlen($college ?? '') > 0) is-filled @endif">
                                                    <label class="form-label">College</label>
                                                    <input wire:model.live="college" type="text" class="form-control">
                                                </div>
                                                @error('college')
                                                <p class='text-danger inputerror'>{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-6">
                                                <div class="input-group input-group-outline @if(strlen($course ?? '') > 0) is-filled @endif">
                                                    <label class="form-label">Course</label>
                                                    <input wire:model.live="course" type="text" class="form-control">
                                                </div>
                                                @error('course')
                                                <p class='text-danger inputerror'>{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col-6">
                                                <div class="input-group input-group-outline @if(strlen($major ?? '') > 0) is-filled @endif">
                                                    <label class="form-label">Major</label>
                                                    <input wire:model.live="major" type="text" class="form-control">
                                                </div>
                                                @error('major')
                                                <p class='text-danger inputerror'>{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-6">
                                                <div class="input-group input-group-outline @if(strlen($year_level ?? '') > 0) is-filled @endif">
                                                    <label class="form-label">Year Level</label>
                                                    <input wire:model.live="year_level" type="text" class="form-control">
                                                </div>
                                                @error('year_level')
                                                <p class='text-danger inputerror'>{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col-6">
                                                <div class="input-group input-group-outline @if(strlen($status ?? '') > 0) is-filled @endif">
                                                    <label class="form-label">Status</label>
                                                    <input wire:model.live="status" type="text" class="form-control">
                                                </div>
                                                @error('status')
                                                <p class='text-danger inputerror'>{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <h6 class="text-black font-weight-bolder text-start my-4">Part 3. Medical Profile</h6>
                                        <div class="row mt-4">
                                            <div class="col-6">
                                                <div class="input-group input-group-outline @if(!empty($birthdate)) is-filled @endif">
                                                    <label class="form-label">Birthdate</label>
                                                    <input wire:model.live="birthdate" type="date" class="form-control">
                                                </div>
                                                @error('birthdate')
                                                <p class='text-danger inputerror'>{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col-3">
                                                <div class="input-group input-group-outline @if(strlen($gender ?? '') > 0) is-filled @endif">
                                                    <label class="form-label">Gender</label>
                                                    <input wire:model.live="gender" type="text" class="form-control">
                                                </div>
                                                @error('gender')
                                                <p class='text-danger inputerror'>{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col-3">
                                                <div class="input-group input-group-outline @if(strlen($blood_type ?? '') > 0) is-filled @endif">
                                                    <label class="form-label">Blood Type</label>
                                                    <input wire:model.live="blood_type" type="text" class="form-control">
                                                </div>
                                                @error('blood_type')
                                                <p class='text-danger inputerror'>{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mt-4">
                                            <div class="col-6">
                                                <div class="input-group input-group-outline @if(strlen($allergies ?? '') > 0) is-filled @endif">
                                                    <textarea wire:model.live="allergies" class="form-control" rows="4" placeholder="Enter your allergies"></textarea>
                                                </div>
                                                @error('allergies')
                                                <p class='text-danger inputerror'>{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col-6">
                                                <div class="input-group input-group-outline @if(strlen($medical_history ?? '') > 0) is-filled @endif">
                                                    <textarea wire:model.live="medical_history" class="form-control" rows="4" placeholder="Enter your medical history"></textarea>
                                                </div>
                                                @error('medical_history')
                                                <p class='text-danger inputerror'>{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn bg-gradient-primary w-33 my-4 mb-2">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
