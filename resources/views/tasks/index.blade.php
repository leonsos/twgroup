@extends('layouts.app')

@section('content')
    <div class="main py-4">
        <div class="row">
            <div class="col-12 col-xl-12">
                <div class="col-12 px-0">
                    <div class="card border-1 shadow">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h2 class="fs-5 fw-bold mb-1">{{ __('Tasks') }}</h2>
                            <button class="btn btn-primary animate-up-2" type="button" data-bs-toggle="modal"
                                data-bs-target="#modal-default">New task</button>
                        </div>
                        <div class="card-body">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th class="border-gray-200">{{ __('Id') }}</th>
                                        <th class="border-gray-200">{{ __('Description') }}</th>
                                        <th class="border-gray-200">{{ __('Time') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tasks as $task)                                  
                                    @php
                                        $Object = new DateTime();
                                        $DateAndTime = $Object->format("Y-m-d"); 
                                        // $DateAndTime2 = DateTime($task->timeToExecution); 
                                        //$diff=$DateAndTime->diff($task->created_at);
                                        $d=$task->timeToExecution;
                                        $dire=abs((strtotime($d) - strtotime($DateAndTime))/86400);
                                        //$days   = floor(($dateDifference - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 *24) / (60 * 60 * 24));
                                        //echo "The current date and time are $DateAndTime.$dire";
                                    @endphp     
                                        
                                        @if ($dire==0)
                                        <tr class="table-danger">                                            
                                            <td class="text-primary"><span class="fw-normal">{{ $task->id }}</span></td>
                                            <td><span class="fw-normal">{{ $task->description }}</span></td>
                                            <td><span class="fw-normal">{{ $task->timeToExecution }}</span></td>
                                            <td>
                                                @if (auth()->id() == $task->user_id)
                                                    <a href="{{route('get.commnetsTask',$task->id)}}" class="btn btn-primary animate-up-2 float-end r" 
                                                        id="myTask"
                                                        type="button"
                                                        
                                                        data-bs-toggle="tooltip" data-bs-placement="top" title="My task"  Tooltip on top
                                                        >
                                                        <i class="bi bi-eye"></i>

                                                    </a>
                                                @endif
                                            </td>
                                        </tr>    
                                        @else
                                            
                                        <tr>                                            
                                            <td class="text-primary"><span class="fw-normal">{{ $task->id }}</span></td>
                                            <td><span class="fw-normal">{{ $task->description }}</span></td>
                                            <td><span class="fw-normal">{{ $task->timeToExecution }}</span></td>
                                            <td>
                                                @if (auth()->id() == $task->user_id)
                                                    <a href="{{route('get.commnetsTask',$task->id)}}" class="btn btn-primary animate-up-2 float-end" type="button"
                                                        
                                                        data-bs-toggle="tooltip" data-bs-placement="top" title="My task"  Tooltip on top
                                                        >
                                                        <i class="bi bi-eye"></i>

                                                    </a >
                                                @endif
                                            </td>
                                        </tr>
                                        @endif
                                        {{-- @include('layouts.modal_assign_task') --}}
                                    @endforeach
                                </tbody>                                
                            </table>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.modal_add_task')
@endsection
{{-- @section('scripts')
    
<script type='text/javascript'>
     $(document).ready(function(){
         $("button").click(function(){
            const value=($(this).attr("data-value"));             
            $.ajax({
                url:"{{route('get.commnetsTask')}}",
                method:'GET',
                data:{id:value},
                success:function(response){
                    var html='';
                    html+='<div>';
                        $.each(response.data,function(index,value){
                            html+='<p>'+value.content+'</p>';
                            
                        });
                        html+='</div>';
                        $("#result").append(html);
                    // var dataArray = JSON.parse(response);
                    // data.dataArray.forEach(element => {
                    //     $("#result").html(element.content)
                    // });
                },
                error:function(error){console.log(error)}
            });
         });
     })
    // var button = document.getElementById('myTask');
    // button.addEventListener("click",function(){
    //     alert("sdsa");
    // });

</script>
@endsection --}}
