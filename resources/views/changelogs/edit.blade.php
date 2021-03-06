<!doctype html>
<html>
    <head>
        <title>Edit log</title>
    </head>
    <body>
        <form method="POST" action="/changelogs/{{$changelog->id}}">
        {{method_field('PATCH')}}
        {{csrf_field()}}
            <div>
                <label>Version</label>
                <input type="text" name="version" value={{$changelog->version}} required>
            </div>

            <div>
                <label>Changes</label>
                <textarea name="changes" required>{{$changelog->changes}}</textarea>
            </div>

            <div>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>

            <div>
                <button type="submit">Save</button>
            </div>
        </form>
    </body>
</html>
