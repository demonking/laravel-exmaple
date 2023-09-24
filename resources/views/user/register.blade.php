<x-default>
    <div class="row">
        <h2>Registrierung</h2>
        <form action="{{route('user.store') }}" method="post">
            @csrf
            <div class="col">
                <label for="email" class="col-form-label">Email:</label>
                <input type="text" class="form-control @error('email') is-invalid @enderror" id="login-email" name="email" value="{{old('email')}}" />
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col">
                <label for="password" class="col-form-label">Password:</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="login-password" name="password" />
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col">
                <label for="password_confirmation" class="col-form-label">Password(wiederholen):</label>
                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="login-password_confirmation2" name="password_confirmation" />
                @error('password_confirmation')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col">
                <input type="submit" class="col-md-3 btn btn-primary" value="Register">
            </div>
        </form>
    </div>
</x-default>
