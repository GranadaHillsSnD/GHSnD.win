<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>New Annoucement!</h2>

        <div>
            {{ $admin }} has made a new annoucement! <a href="http://ghsnd.win">Read more</a>.
        </div>
        {!! $post !!}
    </body>
    <footer>
      <p><a href="{{ URL::to('unsubscribe/' . $code) }}">Unsubscribe</a></p>
    </footer>
</html>
