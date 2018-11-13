@extends('layouts.admin')

@section('content')

    <h1>Media</h1>

    @if($photos)

        <form action="delete/media" method="post" class="form-inline">

            {{ csrf_field() }}

            {{ method_field('delete') }}

            <div class="form-group">
                <select name="checkBoxArray" id="" class="form-control">
                    <option value="">Delete</option>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" name="delete_all" class="btn-primary">
            </div>


        <table class="table">
            <thead>
                <tr>
                    <th><input type="checkbox" id="options"></th>
                    <th>Id</th>
                    <th>Photo</th>
                    <th>Createed</th>
                    <th>Updated</th>
                </tr>
            </thead>
            <tbody>

                @foreach($photos as $photo)
                    <tr>
                        <td><input class="checkboxs" type="checkbox" name="checkBoxArray[]" value="{{ $photo->id }}"></td>
                        <td>{{ $photo->id }}</td>
                        <td><img height="50" src="{{ $photo->file}}" alt=""></td>
                        <td>{{ $photo->created_at ? $photo->created_at->diffForHumans() : 'no date' }}</td>
                        <td>{{ $photo->updated_at ? $photo->updated_at->diffForHumans() : 'no date' }}</td>
                        <td><input type="hidden" name="photo" value="{{ $photo->id }}"></td>
                            {{--<div class="form-group">--}}
                                {{--<input type="submit" name="delete_single" value="Delete" class="btn btn-danger">--}}
                            {{--</div>--}}

                    </tr>
                @endforeach

            </tbody>
        </table>
        </form>
    @endif

@stop

@section('scripts')

    <script>

        $(document).ready(function () {

            $('#options').click(function () {

                if(this.checked){

                    $('.checkboxs').each(function(){

                        this.checked = true;
                    });
                }else{
                    $('.checkboxs').each(function(){

                        this.checked = false;
                    });

                }
            })
        })

    </script>

@stop