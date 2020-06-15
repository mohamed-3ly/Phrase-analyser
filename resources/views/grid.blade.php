<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Phrase analyser</title>
</head>
<body>
    <h1> Grid overview with character statistics ...</h1>

    <table id="table" class="table table-hover">
        <thead>
        <tr>
          <th scope="col"> symbols    .</th>
          <th scope="col"> times encountered</th>
          <th scope="col">sibling character info</th>
        </tr>
        </thead>
        <tbody>
            @foreach($chars as $key => $value)
              <tr>
                  <td>{{$key}}</td>
                  <td>{{$value}}</td>
                  <td>{{$data[$key]}}</td>
              </tr>
            @endforeach
        </tbody>
        
      </table>

</body>
</html>