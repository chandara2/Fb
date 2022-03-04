@extends('layout.layout_admin')
@section('title', 'ADMIN CV SHOW')

@section('content')
    
    <div class="container my-5">
        @foreach ($cvs as $cv)
            <div class="row">
                <span class="text-center h4">Curriculum Vitae</span>
            </div>
            <div class="row justify-content-start">
                <img src="{{asset('upload/cvprofile/')}}/{{$cv->photo}}" alt="CV Profile" style="width: 100px; height: 100px; object-fit: cover;">
            </div>
            <div class="row">
                <div class="col-md-6">
                    <span>តំណែងស្នើសុំ</span><br>
                    <div class="d-flex">
                        <div class="w-25">Position Apply&nbsp;</div>
                        <div class="w-100 border-bottom">{{ $cv->position_apply }}</div>
                    </div>
                </div>
                <div class="col-md-6">
                    <span>ប្រាក់ខែចង់បាន</span><br>
                    <div class="d-flex">
                        <div class="w-25">Expected Salary&nbsp;</div>
                        <div class="w-100 border-bottom">{{ $cv->expected_salary }}</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <span>ឈ្មោះជាភាសាខ្មែរ</span><br>
                    <div class="d-flex">
                        <div class="w-50">Name in Khmer&nbsp;</div>
                        <div class="w-100 border-bottom">{{ $cv->kname }}</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <span>ឈ្មោះជាភាសាឡាតាំង</span><br>
                    <div class="d-flex">
                        <div class="w-50">Name in LATIN&nbsp;</div>
                        <div class="w-100 border-bottom">{{ $cv->ename }}</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <span>ឈ្មោះហៅក្រៅ</span><br>
                    <div class="d-flex">
                        <div class="w-25">Nickname&nbsp;</div>
                        <div class="w-100 border-bottom">{{ $cv->nname }}</div>
                    </div>
                </div>
                <div class="col-md-2">
                    <span>អាស័យដ្ឋានបច្ចុប្បន្ន</span><br>
                    <div class="d-flex">
                        <div class="w-100">Permanent Address</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <span>ផ្ទះលេខ</span><br>
                    <div class="d-flex">
                        <div class="w-25">House No.&nbsp;</div>
                        <div class="w-100 border-bottom">{{ $cv->house_no }}</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <span>ផ្លូវលេខ</span><br>
                    <div class="d-flex">
                        <div class="w-25">Streat No.&nbsp;</div>
                        <div class="w-100 border-bottom">{{ $cv->streat_no }}</div>
                    </div>
                </div>
                <div class="col-md-2">
                    <span>ក្រុមទី</span><br>
                    <div class="d-flex">
                        <div class="w-50">Group No.&nbsp;</div>
                        <div class="w-75 border-bottom">{{ $cv->group_no }}</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <span>ភូមិ</span><br>
                    <div class="d-flex">
                        <div class="w-25">Village&nbsp;</div>
                        <div class="w-100 border-bottom">{{ $cv->village }}</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <span>ឃុំ/សង្កាត់</span><br>
                    <div class="d-flex">
                        <div class="w-50">Commune/Sangkat&nbsp;</div>
                        <div class="w-100 border-bottom">{{ $cv->commune }}</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <span>ស្រុក/ក្រុង</span><br>
                    <div class="d-flex">
                        <div class="w-25">District/City&nbsp;</div>
                        <div class="w-100 border-bottom">{{ $cv->district }}</div>
                    </div>
                </div>
                <div class="col-md-6">
                    <span>ខេត្ត</span><br>
                    <div class="d-flex">
                        <div class="w-25">Province&nbsp;</div>
                        <div class="w-100 border-bottom">{{ $cv->province }}</div>
                    </div>
                </div>
                <div class="col-md-6">
                    <span>ប្រទេស</span><br>
                    <div class="d-flex">
                        <div class="w-25">Country&nbsp;</div>
                        <div class="w-100 border-bottom">{{ $cv->country }}</div>
                    </div>
                </div>
                <div class="col-md-2">
                    <span>ថ្ងៃខែឆ្នាំកំណើត</span><br>
                    <div class="d-flex">
                        <div class="w-100">Date Of Birth</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="row">
                        <div class="col-md">
                            <span>(ថ្ងៃ)</span><br>
                            <div class="d-flex">
                                <div class="w-50">Day</div>
                                <div class="w-75 border-bottom">28</div>
                            </div>
                        </div>
                        <div class="col-md px-0">
                            <span>(ខែ)</span><br>
                            <div class="d-flex">
                                <div class="w-50">Month&nbsp;</div>
                                <div class="w-50 border-bottom">10</div>
                            </div>
                        </div>
                        <div class="col-md">
                            <span>(ឆ្នាំ)</span><br>
                            <div class="d-flex">
                                <div class="w-50">Year</div>
                                <div class="w-50 border-bottom">2020</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="row">
                        <div class="col-md">
                            <span>ភេទ</span><br>
                            <div class="d-flex">
                                <div class="w-100">Sex</div>
                            </div>
                        </div>
                        <div class="col-md">
                            <span>ប្រុស</span><br>
                            <div class="d-flex position-relative">
                                <div class="w-100 position-absolute" style="left: -15px;">
                                    @if($cv->sex == "Male")
                                    <i class="bi bi-check-square"></i>{{ $cv->sex }}
                                    @else
                                    <i class="bi bi-square"></i>Male
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md">
                            <span>ស្រី</span><br>
                            <div class="d-flex position-relative">
                                <div class="w-100 position-absolute" style="left: -15px;">
                                    @if($cv->sex != "Male")
                                    <i class="bi bi-check-square"></i>
                                    @else
                                    <i class="bi bi-square"></i>Female
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="col-md-4">
                    <span>អ៊ីម៉ែល</span><br>
                    <div class="d-flex">
                        <div class="w-25">Email</div>
                        <div class="w-100 border-bottom">{{ $cv->email }}</div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="row">
                        <div class="col-md">
                            <span>ទូរស័ព្ទលេខ</span><br>
                            <div class="d-flex">
                                <div class="w-100">Tel. No.</div>
                            </div>
                        </div>
                        <div class="col-md">
                            <span>(ខ្មែរ)</span><br>
                            <div class="d-flex">
                                <div class="w-25">Khmer</div>
                                <div class="w-100 border-bottom">{{ $cv->kphone }}</div>
                            </div>
                        </div>
                        <div class="col-md">
                            <span>(ថៃ)</span><br>
                            <div class="d-flex">
                                <div class="w-25">Thai</div>
                                <div class="w-100 border-bottom">{{ $cv->kphone }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <span>កូដប្រទេស</span><br>
                    <div class="d-flex">
                        <div class="w-50">Country Code</div>
                        <div class="w-100 border-bottom">{{ $cv->country_code }}</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <span>លេខលិខិតឆ្លងដែន</span><br>
                    <div class="d-flex">
                        <div class="w-50">Passport No</div>
                        <div class="w-100 border-bottom">{{ $cv->passport }}</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <span>អត្តសញ្ញាណប័ណ្ណ</span><br>
                    <div class="d-flex">
                        <div class="w-50">Identiti Card No</div>
                        <div class="w-100 border-bottom">{{ $cv->id_card }}</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col">
                            <span>កំពស់</span><br>
                            <div class="d-flex">
                                <div class="w-50">Height</div>
                                <div class="w-50 border-bottom text-end">{{ $cv->height }}Cm</div>
                            </div>
                        </div>
                        <div class="col">
                            <span>ទម្ងន់</span><br>
                            <div class="d-flex">
                                <div class="w-50">Weight</div>
                                <div class="w-50 border-bottom text-end">{{ $cv->weight }}Kg</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <span>សញ្ជាតិ</span><br>
                    <div class="d-flex">
                        <div class="w-50">Nationallity</div>
                        <div class="w-100 border-bottom">{{ $cv->nationality }}</div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md">
                            <span>ស្ថានភាពគ្រួសារ</span><br>
                            <div class="d-flex">
                                <div class="w-100">Marital Status</div>
                            </div>
                        </div>
                        <div class="col-md">
                            <span>លីវ</span><br>
                            <div class="d-flex position-relative">
                                <div class="w-100 position-absolute" style="left: -15px;">
                                    @if($cv->marital_status == "Single")
                                    <i class="bi bi-check-square"></i>{{ $cv->marital_status }}
                                    @else
                                    <i class="bi bi-square"></i>Single
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md">
                            <span>រៀបការ</span><br>
                            <div class="d-flex position-relative">
                                <div class="w-100 position-absolute" style="left: -15px;">
                                    @if($cv->marital_status == "Married")
                                    <i class="bi bi-check-square"></i>{{ $cv->marital_status }}
                                    @else
                                    <i class="bi bi-square"></i>Married
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md">
                            <span>លែងលះ</span><br>
                            <div class="d-flex position-relative">
                                <div class="w-100 position-absolute" style="left: -15px;">
                                    @if($cv->marital_status == "Divorced")
                                    <i class="bi bi-check-square"></i>{{ $cv->marital_status }}
                                    @else
                                    <i class="bi bi-square"></i>Divorced
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="text-end">
                    <a href="{{ route('admin.cv.edit', $cv->id) }}" class="btn"><i class="bi bi-pencil-square text-muted pe-0" style="font-size:24px;"></i></a>
                </div>
            </div> <!-- End row -->

        @endforeach

    </div>

@endsection