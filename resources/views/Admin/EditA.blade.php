<!DOCTYPE html>
<html>
<head>
 
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
</head>
<body>
    <form action="{{ route('admin.update',$post->id_assistant) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="">Nom :</label>
        <input type="text" name="nom" value="{{ $post->Nom }}">
        <br>
        <label for="">Prenom :</label>
        <input type="text" name="prenom" value="{{ $post->Prenom }}">
        <br>
        <label for="">Sexe :</label>
        <input type="text" name="sexe" value="{{ $post->Sexe }}">
        <br>
        <label for="">Phone :</label>
        <input type="text" name="phone" value="{{ $post->Phone }}">
        <br>
        <label for="">Email : </label>
        <input type="text" name="email" value="{{ $post->Email }}">
        <br>
        <label for="">Password :</label>
        <input type="password" name="password" value="{{ $post->Password }}">
        <button type="submit">Enregistrer</button>

    </form>

</body>
</html>
