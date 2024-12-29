<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary border-radius-lg pt-4 pb-3">
                        <h4 class="text-white mx-3"><strong>Appointment Result</strong></h6>
                    </div>
                </div>  
                <div class="container-fluid mx-2">           
                    <div class="row mt-4">
                        <div class="col-6">
                            <p class="text-black">
                                <span class="font-weight-bolder">Student Number:</span> {{$appointment->user->profile->zppsu_number}} <br>
                                <span class="font-weight-bolder">Student Name:</span> {{$appointment->user->name}} <br>
                                <span class="font-weight-bolder">Birthdate:</span> {{$appointment->user->profile->medical_profile->birthdate}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                @php use Carbon\Carbon; @endphp
                                <span class="font-weight-bolder">Age:</span> {{Carbon::parse($appointment->user->profile->medical_profile->birthdate)->age}}
                            </p>
                        </div>
                        <div class="col-6">
                            <p class="text-black">
                                <span class="font-weight-bolder">Course:</span> {{$appointment->user->student_information->program->name}} <br>
                                <span class="font-weight-bolder">College:</span> {{$appointment->user->student_information->program->college->name}} <br>
                                <span class="font-weight-bolder">Campus:</span> {{$appointment->user->student_information->campus->name}}
                            </p>
                        </div>
                    </div>
                    <form wire:submit="store">  
                        <div class="row mt-2">
                            <div class="col-2">
                                Hematology
                            </div>
                            <div class="col-2">
                                <select wire:model.lazy="hematology" class="form-select border border-1 p-2 ps-2">
                                    <option value="">Select Result</option>
                                    <option value="normal">Normal</option>
                                    <option value="abnormal">Abnormal</option>
                                </select>
                                @error('hematology')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            @if($hematology == 'abnormal')
                            <div class="col-3">
                                <select wire:model.blur="abnormality_hematology" class="form-select border border-1 p-2 ps-2" data-style="select-with-transition" title="" data-size="100" id="abnormality_hematology">
                                    <option value="">Select Abnormality</option>
                                    <option value="low_rbc">Low RBC</option>
                                    <option value="high_wbc">High WBC</option>
                                    <option value="low_wbc">Low WBC</option>
                                    <option value="low_platelets">Low Platelets</option>
                                    <option value="leukemia">Leukemia</option>
                                    <option value="lymphoma">Lymphoma</option>
                                    <!-- Add more options as needed -->
                                </select>
                                @error('abnormality_hematology')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            @endif
                            <div class="col-5">
                                <div class="input-group input-group-outline @if(!empty($remarks_hematology)) is-filled @endif">
                                    <label class="form-label">Remarks</label>
                                    <input wire:model.live="remarks_hematology" type="text" class="form-control">
                                </div>
                                @error('remarks_hematology')
                                <p class='text-danger inputerror'>{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-2">
                                Urinalysis
                            </div>
                            <div class="col-2">
                                <select wire:model.lazy="urinalysis" class="form-select border border-1 p-2 ps-2">
                                    <option value="">Select Result</option>
                                    <option value="normal">Normal</option>
                                    <option value="abnormal">Abnormal</option>
                                </select>
                                @error('urinalysis')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            @if($urinalysis == 'abnormal')
                            <div class="col-3">
                                <select wire:model.blur="abnormality_urinalysis" class="form-select border border-1 p-2 ps-2" data-style="select-with-transition" title="" data-size="100" id="abnormality_urinalysis">
                                    <option value="">Select Abnormality</option>
                                    <option value="uti">UTI</option>
                                    <option value="kidney_disease">Kidney Disease</option>
                                    <option value="diabetes">Diabetes</option>
                                    <option value="dehydration">Dehydration</option>
                                    <option value="kidney_stones">Kidney Stones</option>
                                    <option value="bladder_stones">Bladder Stones</option>
                                    <!-- Add more options as needed -->
                                </select>
                                @error('abnormality_urinalysis')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            @endif
                            <div class="col-5">
                                <div class="input-group input-group-outline @if(!empty($remarks_urinalysis)) is-filled @endif">
                                    <label class="form-label">Remarks</label>
                                    <input wire:model.live="remarks_urinalysis" type="text" class="form-control">
                                </div>
                                @error('remarks_urinalysis')
                                <p class='text-danger inputerror'>{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-2">
                                XRay
                            </div>
                            <div class="col-2">
                                <select wire:model.lazy="xray" class="form-select border border-1 p-2 ps-2">
                                    <option value="">Select Result</option>
                                    <option value="normal">Normal</option>
                                    <option value="abnormal">Abnormal</option>
                                </select>
                                @error('xray')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            @if($xray == 'abnormal')
                            <div class="col-3">
                                <select wire:model.blur="abnormality_xray" class="form-select border border-1 p-2 ps-2" data-style="select-with-transition" title="" data-size="100" id="abnormality_xray">
                                    <option value="">Select Abnormality</option>
                                    <option value="tubercolosis">Tuberculosis</option>
                                    <option value="pneumonia">Pneumonia</option>
                                    <option value="broken_bones">Broken bones</option>
                                    <option value="lung_cancer">Lung cancer</option>
                                    <option value="copd">Chronic Obstructive Pulmonary Disease</option>
                                    <!-- Add more options as needed -->
                                </select>
                                @error('abnormality_xray')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            @endif
                            <div class="col-5">
                                <div class="input-group input-group-outline @if(!empty($remarks_xray)) is-filled @endif">
                                    <label class="form-label">Remarks</label>
                                    <input wire:model.live="remarks_xray" type="text" class="form-control">
                                </div>
                                @error('remarks_xray')
                                <p class='text-danger inputerror'>{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-2">
                                Drug Test
                            </div>
                            <div class="col-2">
                                <select wire:model.lazy="drugtest" class="form-select border border-1 p-2 ps-2">
                                    <option value="">Select Result</option>
                                    <option value="positive">Positive</option>
                                    <option value="negative">Negative</option>
                                </select>
                                @error('drugtest')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            @if($drugtest == 'positive')
                            <div class="col-3">
                                <select wire:model.blur="abnormality_drugtest" class="form-select border border-1 p-2 ps-2" data-style="select-with-transition" title="" data-size="100" id="abnormality_drugtest">
                                    <option value="">Select Abnormality</option>
                                    <option value="substance_abuse">Substance abuse</option>
                                    <option value="drug_abuse">Prescription drug abuse</option>
                                    <option value="alcohol_use">Alcohol use</option>
                                </select>
                                @error('abnormality_drugtest')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            @endif
                            <div class="col-5">
                                <div class="input-group input-group-outline @if(!empty($remarks_drugtest)) is-filled @endif">
                                    <label class="form-label">Remarks</label>
                                    <input wire:model.live="remarks_drugtest" type="text" class="form-control">
                                </div>
                                @error('remarks_drugtest')
                                <p class='text-danger inputerror'>{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        

                        <div class="row mt-4">
                            <div class="col-6">
                                <div class="input-group input-group-outline @if(strlen($condition ?? '') > 0) is-filled @endif">
                                    <textarea wire:model.live="condition" class="form-control" rows="4" placeholder="Enter student's condition"></textarea>
                                </div>
                                @error('condition')
                                <p class='text-danger inputerror'>{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-6">
                                <div class="input-group input-group-outline @if(strlen($additional_comments ?? '') > 0) is-filled @endif">
                                    <textarea wire:model.live="additional_comments" class="form-control" rows="4" placeholder="Additional Comments"></textarea>
                                </div>
                                @error('additional_comments')
                                <p class='text-danger inputerror'>{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-4 px-6">
                            <div class="custom-file-upload">
                                <input 
                                    wire:model="hematology_file" 
                                    type="file" 
                                    class="form-control d-none" 
                                    id="hematology_file"
                                    accept=".pdf,.jpg,.jpeg,.png"
                                >
                                <label for="hematology_file" class="upload-label">
                                    Choose Files
                                </label>
                                <span class="file-name mt-1">
                                    @if($hematology_file)
                                        {{ $hematology_file->getClientOriginalName() }}
                                    @else
                                        No file selected
                                    @endif
                                </span>
                                @error('hematology_file')
                                <p class="text-danger mt-1">{{ $message }}</p>
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