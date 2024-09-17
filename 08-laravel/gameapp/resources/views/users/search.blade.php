@forelse ($users as $user)
<article>
    <div class="form-group">
        <aside>
            <img class="more11" src="{{asset('../images/btn-more1.svg')}}" alt="">
            <img id="upload" class="squar" src="{{asset('../images/squarsmall.svg')}}" alt="">
            <span class="count-rows">{{ $user->fullname }}</span>
            <strong>{{ $user->role }}</strong>
        </aside>
        @csrf
        <img id="list" class="option" src="{{ asset('images') . '/' . $user->photo }}" alt="">
        <a href="javascript:;" class="delete" data-fullname="{{ $user->fullname }}">
            <img class="delete" src="{{asset('../images/icons-delete.svg')}}" alt="">
        </a>
        <a href="{{ url('users/' . $user->id) }}">
            <img class="search" src="{{asset('../images/icons-search.svg')}}" alt="">
        </a>
        <a href="{{ url('users/' . $user->id . '/edit') }}">
            <img class="add1" src="{{asset('../images/icons-add1.svg')}}" alt="">
        </a>
    </div>
</article>
@empty
    No found 😒
@endforelse
