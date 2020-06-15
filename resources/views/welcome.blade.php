<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Phrase analyser</title>
</head>
<body>
    <h1>write a string Max 255 and the app will analyse it ...</h1>

<form action="{{ route('alalyse') }}" method="POST" value="{{ csrf_token() }}">
    @csrf
  <label for="phrase">Phrase:</label>
<textarea name="phrase" id="phrase" cols="30" rows="10"></textarea> <br><br>

    @if ($errors->first('phrase'))
        <div class="alert alert-danger" role="alert">
        <strong>{{ $errors->first('phrase') }}</strong>
        </div>
        <br>
    @endif
    
 <input type="submit" value="Submit">

</form>

</body>
</html>