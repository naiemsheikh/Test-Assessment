{{-- Layout Page --}}
@extends('layout')
{{-- Child Section --}}
@section('content')
    {{-- Report page --}}
    <div class="container">

        <label>In-Time :</label>
        {{-- In-Time Input field --}}
        <input type="time" id="inDateTime" name="inDateTime">
        <a class="btn btn-sm btn-info" onclick="inTimeCheck()"> check</a>
        {{-- In-Time Input field --}}
        <label>Out-Time :</label>
        <input type="time" id="outDateTime" name="outDateTime">
        {{-- OnClick Function to check the IN time & Out time --}}

        <a class="btn btn-sm btn-info" onclick="outTimeCheck()"> check</a>

        <table class="table display nowrap" style="width:100%" id="table_id">
            <thead>
                <tr>
                    <th>Month</th>
                    <th>Date</th>
                    <th>Day</th>
                    <th>ID</th>
                    <th>Employee Name</th>
                    <th>Department</th>
                    <th>First-In Time</th>
                    <th>Last-Out Time</th>
                    <th>Hours of Work</th>
                </tr>
            </thead>
            <tbody>
                {{-- Attendance Collection Table from Controller --}}
                @foreach ($employees as $item)
                    <tr>

                        <td>{{ $item->month }}</td>
                        <td>{{ $item->date }}</td>
                        <td>{{ $item->day }}</td>
                        <td>{{ $item->emp_id }}</td>
                        <td>{{ $item->emp_name }}</td>
                        <td>{{ $item->department }}</td>
                        {{-- Slice time from timstamp fromate --}}
                        <td id="inTime" class="inTime">
                            {{ Carbon\Carbon::parse($item->in_time)->format('H:i:s ') }}
                        </td>

                        <td id="outTime" class="outTime">
                            {{ Carbon\Carbon::parse($item->out_time)->format('H:i:s ') }}
                        </td>
                        {{-- Work hour duration by outTime - InTime and Slice time from timstamp fromate --}}
                        <td>{{ Carbon\Carbon::parse($item->in_time)->diff(Carbon\Carbon::parse($item->out_time))->format('%H:%I') }}
                        </td>

                    </tr>
                @endforeach


            </tbody>
        </table>
    </div>
    <script type="application/javascript">
        // OnClick Function to check the IN time & Out time
        function inTimeCheck() {
            // Select In Time field value by input ID
            var x = document.getElementById("inDateTime").value;
            var elements = document.getElementsByClassName('inTime');
            for (var j = 0; j < elements.length; j++) {

                if (elements[j].innerText > x) {
                    var a = elements[j];
                    // return outElement[j].classList.add('bg-warning');
                    a.style.backgroundColor = "red";
                    a.style.color = "white";

                    // return console.log(element.classList.add('bg-danger'));

                }
            }

        }

       
    </script>
    <script type="application/javascript">
         function outTimeCheck() {
            var z = document.getElementById("outDateTime").value;
            var outElement = document.getElementsByClassName('outTime');

            for (var i = 0; i < outElement.length; i++) {
                if (outElement[i].innerText < z) {
                    var y = outElement[i];
                    // return outElement[j].classList.add('bg-warning');

                    y.style.backgroundColor = "yellow";


                    // return console.log(element.classList.add('bg-danger'));

                }
                    

            }
        }
    </script>
@endsection
