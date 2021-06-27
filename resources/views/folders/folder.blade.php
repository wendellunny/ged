<ul>
    <form action="{{route('folder.create',$folder->uuid)}}" method="post">@csrf
        <input type="text" name='name'>
        <button>Nova Pasta</button>
    </form>
    @foreach ($folder->childs as $item)
        <li>
            <a href="{{route('folder.view',$item->uuid)}}"><b>{{$item->name}}</b></a>
            <form action="{{route('folder.delete',$item->id)}}" method="post">@csrf @method('delete')
                <button>Apagar</button>
            </form>

        </li>
    @endforeach
</ul>
