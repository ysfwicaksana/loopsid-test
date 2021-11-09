@extends('layout.main')

@section('title', $post['title'])

@section('content')

    <!-- <div class="text-2xl text-black font-semibold">Conte</div> -->

    <div class="my-10">

        <div class="font-semibold text-gray-800 text-lg hover:text-blue-500 cursor-pointer">
                {{$post['title']}}
        </div>
        <div class="flex flex-row items-center justify-between">
            <div>
                Author: {{$post['name']}}, <span class="text-gray-400 italic">{{$post['email']}}</span>
            </div>
            <div>
                Date Created: {{$post['created_at']}}
            </div>
        </div>
         
        <div class="my-10">
            {{$post['content']}}
        </div>
    </div>
    
    <div class="font-hairline text-gray-800">
        <div class="my-5">
            <b>Comments</b>
            @foreach($comments_user_regist as $comment)

                <div class="flex flex-row justify-between text-sm my-5">
                    <div>
                        {{$comment['name']}}, <span class="text-gray-400 italic">{{$comment['email']}}</span>
                    </div>
                    <div>
                        {{$comment['created_at']}}
                    </div>
                </div>
                <div>
                    {{$comment['comment']}}
                </div>

            @endforeach
        </div>

        <div class="my-5">
        <b>Comments Guest</b>
            @foreach($comments_user_not_regist as $comment)

                <div class="flex flex-row justify-between text-sm my-5">
                    <div>
                        {{$comment['name']}}, <span class="text-gray-400 italic">{{$comment['email']}}</span>
                    </div>
                    <div>
                        {{$comment['created_at']}}
                    </div>
                </div>
                <div>
                    {{$comment['comment']}}
                </div>

            @endforeach
        </div>
    </div>
      
   

@endsection