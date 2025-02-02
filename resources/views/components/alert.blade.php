@if (session()->has('success'))
        <div class="text-green">
            {{ session('success') }}
        </div>
@endif

@if (session()->has('message'))
        <div class="text-yellow">
            {{ session('success') }}
        </div>
@endif

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li class="text-red"> {{ $error }} </li>
        @endforeach
    </ul>
@endif