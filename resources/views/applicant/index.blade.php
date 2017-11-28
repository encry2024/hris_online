@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row">
      <div class="col-lg-12">
         <div class="panel panel-default">
            <div class="panel-body">
               <a href="{{ route('export_to_csv') }}" class="btn btn-primary">Export to CSV</a>
               <div class="table-responsive">
                  <table class="table table-hover">
                     <thead>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Middle Initial</th>
                        <th>Last Name</th>
                        <th>E-mail</th>
                        <th>Date Added</th>
                        <th>Date Updated</th>
                     </thead>

                     <tbody>
                        @foreach($applicants as $applicant)
                        <tr>
                           <td>{{ $applicant->id }}</td>
                           <td>{{ $applicant->first_name }}</td>
                           <td>{{ $applicant->middle_initial }}</td>
                           <td>{{ $applicant->last_name }}</td>
                           <td>{{ $applicant->email }}</td>
                           <td>{{ $applicant->created_at }}</td>
                           <td>{{ $applicant->updated_at }}</td>
                        </tr>
                        @endforeach
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@stop