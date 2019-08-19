@extends('layouts.blog-home')


@section('content')

    <div class="row">

        <div class="col-md-8">
            <!-- Blog Post -->

            <!-- Title -->
            <h1>{{ $post->title }}</h1>

            <!-- Author -->
            <p class="lead">
                by <a href="#">{{ $post->user->name }}</a>
            </p>

            <hr>

            <!-- Date/Time -->
            <p><span class="glyphicon glyphicon-time"></span> Posted {{ $post->created_at->diffForHumans() }}</p>

            <hr>

            <!-- Preview Image -->
            <img class="img-responsive" src="{{ $post->photo ? $post->photo->file : $post->photoPlaceholder() }}" alt="">

            <hr>

           

            <!-- Post Content -->
            <p>{!! $post->body !!}</p>
            <hr>

            

            <!-- Blog Comments -->
            <h2> Comments </h2>
            <div class="row">
        <div class="form-group">
        @foreach($comments as $comment)
            <ul>
                <li>{{ $comment->body }}</li>
            </ul>    
        @endforeach
        </div>
    </div>

            <div class="row">

                {!! Form::open(['method'=>'POST', 'action'=>['PostCommentsController@store',$post->id],'files'=>true]) !!}
                

                <div class="form-group">
                    {{ Form::hidden('post_id', $post->id) }}
                </div>

                <div class="form-group">
                    {!! Form::label('body', 'Comment:') !!}
                    {!! Form::text('body', null, ['class'=>'form-control']) !!}
                </div>
        
                <div class="form-group">
                    {!! Form::submit('Post Comment', ['class'=>'btn btn-primary']) !!}
                </div>
        
                {!! Form::close() !!}
        
        
                



            </div>
        
            <div class="row">
                @include('includes.form_error')
            </div>

            <div id="disqus_thread"></div>
            {{-- <script>
                /**
                 *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                 *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
                /*
                var disqus_config = function () {
                this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
                this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                };
                */
                (function() { // DON'T EDIT BELOW THIS LINE
                    var d = document, s = d.createElement('script');
                    s.src = 'https://myhome-4.disqus.com/embed.js';
                    s.setAttribute('data-timestamp', +new Date());
                    (d.head || d.body).appendChild(s);
                })();
            </script>
            <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
            <script id="dsq-count-scr" src="//myhome-4.disqus.com/count.js" async></script> --}}

        </div><!-- div col-md-8 -->
        @include('includes.front_sidebar')
    </div><!-- div row -->
@stop

