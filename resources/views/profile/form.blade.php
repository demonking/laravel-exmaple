<div class="row">
    <form action="{{$profile->exists ? route('profile.update',$profile->id) : route('profile.store') }}" method="post" enctype="multipart/form-data" >
        @csrf
        <div class="row mb-3">
            @if ($profile && $profile->avatar)
                <img src="{{ url( Auth::user()->profile->avatar) }}" style="width:120px;">
            @endif
        </div>
        <div class="row mb-3">
            <label for="avatar" class="col-md-4 col-form-label ">Avatar:</label>
            <input id="avatar" type="file" class="form-control @error('avatar') is-invalid @enderror" name="avatar"
                value="{{ old('avatar') }}" autocomplete="avatar">
                @error('avatar')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
        </div>

        <div class="col-md-3 centered">
            <label for="title" class="col-md-3-form-label">Titel:</label>
            <input type="text" class="form-control @error('profile.title') is-invalid @enderror" id="login-title"
                   name="title"
                   value="{{ old('title',$profile->title)}}"/>
            @error('title')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-md-3 centered">
            <label for="salutation" class="col-md-3-form-label">Anrede:</label>
            <select class="form-switch " name="salutation">
                <option value="" >
                    Bitte wählen
                </option>
                @foreach (\App\Enum\Salutation::values() as $key=>$value)
                    <option value="{{ $key }}" @selected(old('salutation', $profile->salutation?->value) == $key)>
                        {{ $key }}
                    </option>
                @endForeach
            </select>
            @error('salutation')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-md-3">
            <label for="firstname" class="col-md-3-form-label">Vorname:</label>
            <input type="text" class="form-control @error('firstname') is-invalid @enderror" id="login-firstname"
                   name="firstname"
                   value="{{old('firstname',$profile->firstname)}}"/>
            @error('firstname')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-md-3">
            <label for="lastname" class="col-md-3-form-label">Nachname:</label>
            <input type="text" class="form-control @error('lastname') is-invalid @enderror" id="login-lastname"
                   name="lastname"
                   value="{{old('lastname',$profile->firstname)}}"/>
            @error('lastname')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-3">
            <input type="submit" class="col-md-3-md-3 btn btn-primary" value="Profil anlegen">
        </div>
    </form>
</div>
