<x-default>
    <div class="row">
        <h2>Login</h2>
        <form action="{{route('user.authenticate') }}" method="post">
            @csrf
            <div class="col">
                <label for="email" class="col-form-label">Email:</label>
                <input type="text" class="form-control @error('email') is-invalid @enderror" id="login-email" name="email" value="{{old('email')}}" />
                @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div class="col">
                <label for="password" class="col-form-label">Password:</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="login-password" name="password" value="{{old('email')}}" />
                @if ($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
            </div>
            <div class="col">
                <input type="submit" class="col-md-3 btn btn-primary" value="Login">
            </div>
            <div class="mb-3 centered">
                Keinen Zugang? Hier <a href="{{route('user.register')}}">Registrieren</a>
            </div>
        </form>
    </div>
</x-default>
