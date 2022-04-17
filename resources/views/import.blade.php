@extends('layout')
@section('content')
    

<div class="card bg-light mt-3" >
    <div class="card-header">
        Laravel 7 Import Export Excel to database 
    </div>
    
    <div class="card-body" >
        
        <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            
              <input type="file" name="file" class="form-control" required>
            <br>
            <button class="btn btn-success">Import User Data</button>
            <a class="btn btn-warning" href="{{ route('report') }}">Report</a>
        </form>
    </div>
</div>
@endsection