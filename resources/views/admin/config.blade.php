<h1>Configuraçãoes</h1>

meu nome é {{$nome}} Eu tenho {{$idade}}
<br>
essa é uma variavel global, versão é {{$versao}}
<form  method="post" >
    @csrf
    name:
    <input name='nome' type="text">
    idade:
    <input name='idade' type="text">

    <input type="submit">
</form>

<a href="/config/user">Informações</a>