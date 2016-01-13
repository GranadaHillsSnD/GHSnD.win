<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>Verify Your Email Address with GHSnD</h2>

        <div>
            Thanks for subscribing to updates to The Granada Hills Speech &amp; Debate Team.
            Please follow the link below to verify your email address
            <a href="{{ URL::to('verify/' . $code) }}">{{ URL::to('verify/' . $code) }}</a>.<br/>
        </div>

    </body>
</html>
