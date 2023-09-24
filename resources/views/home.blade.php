<x-default>
    @auth
        <div class="row">
            <a href="{{ route('user.logout') }}"
               onclick="event.preventDefault(); document.getElementById('delete-form').submit();">
                Hier klicken um den Account zu löschen
            </a>

            <form id="delete-form" action="{{ route('user.delete') }}" method="POST"
                  style="display: none;">
                @csrf
            </form>
        </div>
    @endauth
</x-default>
