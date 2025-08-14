<form action="{{route('admin.login')}}" method="POST">
    @csrf
    <input type="text" placeholder="Firstname" name="name">
    <input type="password" placeholder="Password" name="password">
    <button>Submit</button>
</form>