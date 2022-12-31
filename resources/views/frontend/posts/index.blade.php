<htm>

<header>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</header>
    <body>
<div align="center">
    <h1>پست های من</h1>
</div>
@if(Session::has('delete_post'))
    <div class="alert alert-danger">
        {{Session('delete_post')}}
    </div>
@endif
<ul>
    @foreach($posts as $value)
        <li>{{$value->title}}({{$value->title_en}}) : {{$value->description}}
            <a href="{{route('post.edit',$value->id)}}">ویرایش</a>
        <form method="post" action="{{route('post.destroy',$value->id)}}">
            @csrf
            <input type="hidden" name="_method" value="DELETE">

            <input type="submit" value="delete">
        </form>

        </li>
    @endforeach
</ul>
<hr/>
@if(Session::has('add_post'))
    <div class="alert alert-success">
    {{Session('add_post')}}
    </div>
    @endif
<form action="{{route('post.store')}}" method="post">
    @csrf
    title
    <input type="text" name="title"><br/><br/>
    title en
    <input type="text" name="title_en"><br/><br/>
    description
    <input type="text" name="description"><br/><br/>
    <input type="submit" value="save">
</form>
    </body>

</htm>
