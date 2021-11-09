@extends('layout.main')

@section('title','Metabook')

@section('content')

    <div class="text-2xl text-black font-semibold">Content Post</div>

    @foreach($data as $row)
        <div class="my-10">

        
        <div class="font-semibold text-gray-800 text-lg hover:text-blue-500 cursor-pointer">
            <a href="/{{$row['slug']}}">
                {{$row['title']}}
            </a>
        </div>
        <div class="flex flex-row items-center justify-between">
            <div>
                Author: {{$row['name']}}, <span class="text-gray-400 italic">{{$row['email']}}</span>
            </div>
            <div>
                Date Created: {{$row['created_at']}}
            </div>
        </div>
        <div>
            {{$row['content']}} Read More
        </div>
        </div>  
      
    @endforeach
   

@endsection