<h1>Configuraçãoes</h1>

<form  method="post" >
    @csrf
    name:
    <input name='nome' type="text">
    idade:
    <input name='idade' type="text">

    <input type="submit">
</form>

<a href="/config/user">Informações</a>