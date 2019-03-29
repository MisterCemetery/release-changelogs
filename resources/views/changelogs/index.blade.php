<!doctype html>
<html>
    <head>
        <title>Released changes</title>
    </head>
    <body>
        <div>
            <a href="/changelogs/create">Create new</a>
        </div>
        <br />
            <div>
                <h3>Recent logs</h3>
                @foreach($changelogs as $changelog)
                    <div>
                        <li>-----------------------</li>
                        <li>Version: {{ $changelog->version}}</li>
                        <li>Changes: {{ $changelog->changes}}</li>
                        <li>-----------------------</li>
                        <p>
                        <form method="POST" action="/changelogs/{{$changelog->id}}/edit">
                            {{csrf_field()}}
                            <div>
                                <button type="submit">Edit</button>
                            </div>
                        </form>
                        <form method="POST" action="/changelogs/{{$changelog->id}}">
                            {{method_field('DELETE')}}
                            {{csrf_field()}}
                            <div>
                                <button type="submit">Delete</button>
                            </div>
                        </form>
                        <br />
                    </div>
                @endforeach
    </body>
</html>