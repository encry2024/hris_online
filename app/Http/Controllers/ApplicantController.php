<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Applicant;
use DB;
use Response;

class ApplicantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applicants = Applicant::all();

        return view('applicant.index', compact('applicants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $applicant                      = new Applicant();
        $applicant->first_name          = strtoupper($request->get('first_name'));
        $applicant->middle_initial      = strtoupper($request->get('middle_initial'));
        $applicant->last_name           = strtoupper($request->get('last_name'));
        $applicant->address             = strtoupper($request->get('address'));
        $applicant->email               = $request->get('email');
        $applicant->gender              = $request->get('gender');
        $applicant->date_of_birth       = $request->get('date_of_birth');
        $applicant->address             = strtoupper($request->get('address'));
        $applicant->mobile_number       = $request->get('mobile_number');
        $applicant->home_number         = "-";
        $applicant->sss                 = $request->get('sss');
        $applicant->philhealth          = $request->get('philhealth');
        $applicant->pag_ibig            = $request->get('pag_ibig');
        $applicant->tin                 = $request->get('tin');
        $applicant->nbi_clearance       = $request->get('nbi_clearance');
        $applicant->age                 = $applicant->getAge($request->get('date_of_birth'));
        $applicant->initial_interview   = 1;
        $applicant->exam_interview      = 1;
        $applicant->final_interview     = 1;
        $applicant->job_position        = strtoupper($request->get('job_position'));
        $applicant->expected_salary     = strtoupper($request->get('expected_salary'));
        $applicant->photo_dir           = "";
        $applicant->type_of_employment  = strtoupper($request->get('type_of_employment'));
        $applicant->employee_id         = 0;
        $applicant->emergency_person    = strtoupper($request->get('emergency_person'));
        $applicant->emergency_person_contact = $request->get('emergency_person_contact');
        $applicant->emergency_person_address = $request->get('emergency_person_address');
        $applicant->resume_path = "";
        $applicant->save();

        return redirect()->to('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function exportToCsv()
    {

        $headers = [
            'Cache-Control'       => 'must-revalidate, post-check=0, pre-check=0',
            'Content-type'        => 'text/csv',
            'Content-Disposition' => 'attachment; filename=APPLICANT_LIST.csv',
            'Expires'             => '0',
            'Pragma'              => 'public'
        ];

        $list = Applicant::all()->toArray();

        # add headers for each column in the CSV download
        array_unshift($list, array_keys($list[0]));

       $callback = function() use ($list) 
        {
            $FH = fopen('php://output', 'w');
            foreach ($list as $row) { 
                fputcsv($FH, $row);
            }
            fclose($FH);
        };

        return Response::stream($callback, 200, $headers);
    }
}
