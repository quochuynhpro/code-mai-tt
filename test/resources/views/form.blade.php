@extends('dashboard')
@section('content')
  <div class="container" >
    <div class="row justify-content-center">
      <div class="card-header">Quản lý máy tính</div>
        <div class="card-body">
          @if(session('status'))
            <div class="alert alert-success" role="alert">
                {{session('status')}}
            </div>
            @endif
          {!! Form::open(['route'=>'computer.store','method'=>'POST'])!!}
          <div class="form-group">
            {!! Form::label('ComputerID','ComputerID',[])!!}
            {!! Form::text('ComputerID','',['class'=>'form-control','placeholder'=>'Nhập ID máy...','id'=>'ComputerID'])!!}
          </div>
          <div class="form-group">
              {!! Form::label('LabID','LabID ',[])!!}
              {!! Form::text('LabID','',['class'=>'form-control','placeholder'=>'Nhập phòng máy...','id'=>'LabID'])!!}
            </div>
            <div class="form-group">
              {!! Form::label('Name','Name',[])!!}
              {!! Form::text('Name','',['class'=>'form-control','placeholder'=>'Máy số...','id'=>'Name'])!!}
            </div>
            <div class="form-group">
              {!! Form::label('OperatingSystem','OperatingSystem',[])!!}
              {!! Form::text('OperatingSystem','',['class'=>'form-control','placeholder'=>'Hệ điều hành...','id'=>'OperatingSystem'])!!}
            </div>
            <div class="form-group">
              {!! Form::label('Specifications','Specifications',[])!!}
              {!! Form::text('Specifications','',['class'=>'form-control','placeholder'=>'Thông số kỹ thuật...','id'=>'Specifications'])!!}
            </div>
            <div class="form-group">
              {!! Form::label('Status','Status',[])!!}
              {!! Form::text('Status','',['class'=>'form-control','placeholder'=>'Trạng thái...','id'=>'Status'])!!}
            </div>
            {!! Form::submit('Thêm máy',['class'=>'btn btn-succes'])!!}
          {!! Form::close() !!}
        </div>
      </div>
          <table class="table">
            <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">ComputerID </th>
            <th scope="col">LabID </th>
            <th scope="col">Name</th>
            <th scope="col">OperatingSystem</th>
            <th scope="col">Specifications</th>
            <th scope="col">Status</th> </tr>
        </thead>
        <tbody>
            @foreach ($list as  $key => $computer) <tr>
                <th scope="row">{{$key}}</th>
                <td>{{ $computer->ComputerID }}</td>
                <td>{{ $computer->LabID }}</td>
                <td>{{ $computer->Name }}</td>
                 <td>{{ $computer->OperatingSystem }}</td>
                 <td>{{ $computer->Specifications }}</td>
                 <td>
                    {{ !!Form::open(['method'=>'DELETE','route'=>'computer.destroy,$computer->id','onsubmit'=>'return confirm '('Xóa hay không?')])!! }}
                     {{ !!Form::submit('Xóa',['class'=>'btn btn-danger'])!! }}
                    {{ !!Form::close()!! }}
                 </td>
                </tr>
             @endforeach
                </tbody>
             </table>
        </div>
    </div>
  </div>
@endsection
