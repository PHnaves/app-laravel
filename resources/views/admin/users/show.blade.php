<h1>Detalhes do Usuario</h1>
<p>Nome: {{ $user->name }}</p>
<p>Email: {{ $user->email }}</p>

<form action=" {{ route('users.destroy', $user->id )}} " method="post">
    @csrf
    @method('delete')
    <button type="submit">Deletar</button>
</form>