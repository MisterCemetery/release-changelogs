<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Create new changelog</title>
    </head>
    <body>
        <form method="POST" action="/changelogs">
            {{csrf_field()}}
            <div>
                <label>Version</label>
                <input type="text" name="version">
            </div>

            <div>
                <label>Changes</label>
                <textarea name="changes"></textarea>
            </div>

            <div>
                <button type="submit">Save</button>
            </div>
        </form>
    </body>
</html>
