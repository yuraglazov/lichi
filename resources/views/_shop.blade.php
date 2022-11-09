@foreach($groups as $group)
    <li class="list-group-item">
        <a href="?group={{$group->id}}">{{$group->name}}</a>
        <span>({{$group->count}})</span>
        @if(isset($group->children))
            <ul class="list-group mt-3">
                @include('_shop', ['groups' => $group->children])
            </ul>
        @endif
    </li>
@endforeach
