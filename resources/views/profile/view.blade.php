<x-default>

<div id="profile-view">
    <div class="row">
        <a href="{{route('profile.edit',$profile->id)}}">Profil bearbeiten</a>
    </div>
    <div class="row">
        <div class="col-md-3 centered avatar">
            <label for="avatar" class="col-form-label">Avatar:</label>
            <img  src="{{ url(($profile?->avatar ?? ''))}}" ></img>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 centered">
            <label for="title" class="col-form-label">Titel:</label>
            <span>{{$profile->title}}</span>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 centered">
            <label for="salutation" class="col-form-label">Anrede:</label>
            <span>{{$profile->salutation}}</span>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 centered">
            <label for="firstname" class="col-form-label">Vorname:</label>
            <span>{{$profile->firstname}}</span>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 centered">
            <label for="lastname" class="col-form-label">Nachname:</label>
            <span>{{$profile->lastname}}</span>
        </div>
    </div>
</div>
</x-default>
